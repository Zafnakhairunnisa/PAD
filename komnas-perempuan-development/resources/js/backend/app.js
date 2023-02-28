import Alpine from "alpinejs";
import mask from "@alpinejs/mask";
import "jquery-mask-plugin";

window.$ = window.jQuery = require("jquery");
window.Swal = require("sweetalert2");
window.Alpine = Alpine;

Alpine.plugin(mask);

// CoreUI
require("@coreui/coreui");

// Boilerplatex
require("../plugins");

Alpine.start();

$(function () {
    // $(".date").mask("00/00/0000");
    $(".money").mask("0.000.000.000.000", { reverse: true });
});

Livewire.on("swal", (deletedId) => {
    Swal.fire({
        title: "Apakah anda yakin ingin menghapus item ini?",
        showCancelButton: true,
        confirmButtonText: "Confirm Delete",
        cancelButtonText: "Cancel",
        icon: "warning",
    }).then((result) => {
        if (result.value) {
            Livewire.emit("delete", deletedId);
        }
    });
});
