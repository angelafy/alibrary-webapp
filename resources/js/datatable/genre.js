$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var supplierShowUrl = "/admin/genre/{id}/show";

    let table = $("#tableGenre").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        scrollX: false,
        responsive: true,
        pageLength: 10,
        dom: "t", // Remove default search and pagination
        language: {
            lengthMenu: "",
            info: "",
            infoFiltered: "(disaring dari total _MAX_ data)",
            emptyTable: "Tidak ada data",
            infoEmpty: "Menampilkan 0 data",
            zeroRecords: "Data tidak ditemukan",
            pagingType: "simple",
            paginate: {
                previous: "", // Menghilangkan teks "Previous"
                next: "", // Menghilangkan teks "Next"
            },
            processing: "Loading...", // Custom processing message
        },
        ajax: "/admin/genre",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "kode_genre" },
            { data: "nama_genre" },
            { data: "deskripsi" },
            { data: "action", orderable: false, searchable: false },
        ],
        drawCallback: sihubDrawCallback, // Gawe Nyelok Callback
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

    /* sweetalert delete e */
    $(document).ready(function () {
        $(document).on("click", ".delete-genre", function () {
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
                        url: `/admin/genre/${id}`,
                        type: "DELETE",
                        success: function (result) {
                            Swal.fire(
                                "Dihapus!",
                                "Data pengguna telah dihapus.",
                                "success"
                            );

                            setTimeout(function () {
                                location.reload();
                            }, 3000);
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
    });
});
