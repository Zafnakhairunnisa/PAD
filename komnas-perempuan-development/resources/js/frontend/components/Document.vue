<template>
    <a-table
        :row-class-name="(_record, index) => (index % 2 === 1 ? 'table-striped' : null)"
        :row-key="record => record.id"
        :bordered="true"
        :scroll="{ x: 'max-content' }"
        :columns="columns"
        :dataSource="dataSource"
        :pagination="{
            showSizeChanger: false,
        }"
    />
</template>

<script>
import { defineComponent } from "vue";
import { formatSize } from "@fe/utils";
import dayjs from "dayjs";

const columns = [
    {
        title: "Nama Dokumen",
        dataIndex: "name",
        sorter: true,
        customRender: function ({ value, record }) {
            return <a target="_blank" href={record.path} download={record.name}>{value}</a>;
        },
    },
    {
        title: "Tanggal Unggah",
        dataIndex: "created_at",
        sorter: true,
        width: 190,
        customCell: () => ({
            style: {
                textAlign: "right",
            },
        }),
        customRender: function ({ value }) {
            return dayjs(value).format("DD/MM/YYYY");
        },
    },
    {
        title: "Ukuran",
        dataIndex: "size",
        sorter: true,
        width: 190,
        customCell: () => ({
            style: {
                textAlign: "right",
            },
        }),
        customRender: function ({ value }) {
            return formatSize(value);
        },
    },
];

export default defineComponent({
    props: {
        dataSource: null,
    },
    setup(props) {
        return {
            columns,
            dataSource: props.dataSource,
        };
    },
});
</script>
