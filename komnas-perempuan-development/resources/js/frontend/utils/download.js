import { saveAs } from "file-saver";

const download = async (url, filename) => {
    const response = await window.axios.get(url, {
        responseType: "blob",
    });

    saveAs(response.data, filename);
};

export const downloadChart = (filename) => {
    const time = new Date().toISOString().split('T')[0].replaceAll('-', '')
    const canvas = document.querySelector("#echarts canvas");
    if (canvas) {
        canvas.toBlob(function (blob) {
            saveAs(blob, `${time}_${filename}.png`);
        });
    }
}

export default download;
