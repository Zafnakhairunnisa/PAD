import { utils, writeFileXLSX } from 'xlsx';

export function paramsToObject(entries) {
    const result = {};
    for (const [key, value] of entries) {
        // each 'entry' is a [key, value] tupple
        result[key] = value;
    }
    return result;
}

export function handleTableChange(p, _filter, sorter) {
    const url = new URL(location.href);
    const params = new URLSearchParams(url.search);
    params.delete("page");
    params.delete("sort");
    params.set("page", p.current);

    if (sorter.order === "ascend") {
        params.set("sort", sorter.field);
    } else if (sorter.order === "descend") {
        params.set("sort", `-${sorter.field}`);
    }

    this.$inertia.get(`${url.origin}${url.pathname}`, paramsToObject(params), {
        preserveState: true,
        preserveScroll: true,
    });
}

export function makeColumn(columns = []) {
    const url = new URL(location.href);
    const sortField = url.searchParams.get("sort");

    const newColumns = [...columns].map((column) => {
        if (sortField) {
            const sortDataIndex = sortField.includes("-")
                ? sortField.slice(1)
                : sortField;

            if (column.dataIndex === sortDataIndex) {
                return {
                    ...column,
                    sortOrder: sortField.includes("-") ? "descend" : "ascend",
                };
            }
        }
        return column;
    });

    return newColumns;
}

export function downloadExcel(filename, table = 'recapitulation') {
    const time = new Date().toISOString().split('T')[0].replaceAll('-', '')
    const tableIndex = table === 'recapitulation' ? 0 : 1
    const tableElement =  document.getElementsByTagName("TABLE")[tableIndex].cloneNode(true)

    const removedIndex = []
    tableElement.querySelectorAll('th').forEach((element, elementIndex) => {
        const tableHeadText = element.textContent
        if (tableHeadText === 'Dokumen' || tableHeadText === 'Foto') {
            element.remove()
            removedIndex.push(elementIndex.toString())
        }
    });

    tableElement.querySelectorAll('tbody tr').forEach((element) => {
        element.querySelectorAll('td').forEach((el, elIndex) => {
            if(removedIndex.includes(elIndex.toString())) {
                el.remove()
            }
        })
    })

    const wb = utils.table_to_book(tableElement)
    let excelFilename = filename
    if (table === 'recapitulation') {
        excelFilename = `${filename} Rekapitulasi`
    }
    
    writeFileXLSX(wb, `${time}_${excelFilename}.xlsx`);
}