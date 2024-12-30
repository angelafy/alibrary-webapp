$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var bukuShowUrl = "/admin/buku/{id}/show";

    let table = $("#tableBuku").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        scrollX: true,
        responsive: true,
        pageLength: 10,
        dom: "t",
        language: {
            lengthMenu: "",
            info: "",
            infoFiltered: "(disaring dari total _MAX_ data)",
            emptyTable: "Tidak ada data",
            infoEmpty: "Menampilkan 0 data",
            zeroRecords: "Data tidak ditemukan",
            pagingType: "simple",
            paginate: {
                previous: "",
                next: "",
            },
            processing: "Loading...",
        },
        ajax: "/admin/buku",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "title", name: "title" },
            // { data: "penulis_id", name: "penulis_id"},
            // { data: "penerbit_id", name: "penerbit_id" },
            { data: "terbit", name: "terbit" },
            { data: "genre_id", name: "genre_id" },
            // { data: "stock", name: "stock" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
        drawCallback: sihubDrawCallback,
    });

    // Gawe Page Length
    $("#pageLength").on("change", function () {
        table.page.len($(this).val()).draw();
    });

    // Custom search
    $("#searchInput").on("keyup", function () {
        table.search($(this).val()).draw();
    });

    // Custom pagination
    $(document).on("click", "#tablePagination .page-link", function (e) {
        e.preventDefault();
        if (!$(this).closest("li").hasClass("disabled")) {
            table.page($(this).data("page")).draw("page");
        }
    });

    /* gawe sweet alert delete e */
    $(document).ready(function () {
        // Initialize DataTable

        // Delete handler
        $(document).on("click", ".delete-buku", function () {
            const id = $(this).data("id");
            Swal.fire({
                title: "Anda yakin?",
                text: "Data pengguna akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batal!",
                reverseButtons: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/buku/${id}`,
                        type: "DELETE",
                        success: function (result) {
                            Swal.fire(
                                "Dihapus!",
                                "Data pengguna telah dihapus.",
                                "success"
                            );
                            table.ajax.reload();
                        },
                        error: function (err) {
                            Swal.fire(
                                "Error!",
                                "Terjadi kesalahan saat menghapus pengguna.",
                                "error"
                            );
                        },
                    });
                } else {
                    Swal.fire(
                        "Dibatalkan",
                        "Data pengguna tidak dihapus.",
                        "info"
                    );
                }
            });
        });

        // Page length change
        $("#pageLength").on("change", function () {
            table.page.len($(this).val()).draw();
        });

        // Search input
        $("#searchInput").on("keyup", function () {
            table.search($(this).val()).draw();
        });
    });
});
