$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const table = $("#tablePeminjaman").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        pageLength: 10,
        dom: "t",
        language: {
            processing: "Loading...",
            emptyTable: "Tidak ada data",
            zeroRecords: "Data tidak ditemukan",
            infoEmpty: "Menampilkan 0 data",
            infoFiltered: "(disaring dari total _MAX_ data)"
        },
        ajax: {
            url: "/admin/peminjaman",
            type: "GET",
            data: function(d) {
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    search: d.search,
                    order: d.order,
                    columns: d.columns
                };
            },
            error: function (xhr, error, thrown) {
                console.error("DataTables error:", error);
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Terjadi kesalahan saat mengambil data. " + (thrown || error),
                });
            },
        },
        columns: [
            {
                data: null,
                name: "id",
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: "kode_peminjaman", name: "kode_peminjaman" },
            { data: "user.nama", name: "user.nama" },
            {
                data: "tgl_pinjam",
                name: "tgl_pinjam",
                render: function (data) {
                    if (!data || moment(data).isValid() === false) {
                        return '<span class="badge bg-warning">Belum Disetujui</span>';
                    }
                    return moment(data).format("DD/MM/YYYY");
                },
            },
            {
                data: "status",
                name: "status",
                render: function (data, type, row) {
                    let badge = "";
                    let badgeStyle = "font-size: 12px; padding: 3px 7px; width: 150px; text-align: center; display: inline-block; border-radius: 5px;";
                    switch (parseInt(data)) {
                        case 0:
                            badge = `<span class="badge bg-warning" style="${badgeStyle}">Pending Persetujuan</span>`;
                            break;
                        case 2:
                            badge = `<span class="badge bg-success" style="${badgeStyle}">Dipinjam</span>`;
                            break;
                        case 3:
                            badge = `<span class="badge bg-info" style="${badgeStyle}">Dikembalikan</span>`;
                            break;
                        case 4:
                            badge = `<span class="badge bg-danger" style="${badgeStyle}">Pelanggaran</span>`;
                            break;
                        case 6:
                            badge = `<span class="badge bg-warning" style="${badgeStyle}">Pending Pengembalian</span>`;
                            break;
                        case 7:
                            badge = `<span class="badge bg-danger" style="${badgeStyle}">Ditolak</span>`;
                            break;
                        default:
                            badge = `<span class="badge bg-secondary" style="${badgeStyle}">Unknown</span>`;
                    }
                    return badge;
                },
            },
            {
                data: null,
                name: "action_buttons",
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    let buttons = '<div class="btn-group">';
                    const baseButtonStyle = "padding: 4px 8px; font-size: 12px;";
                    switch (row.status) {
                        case 0:
                        case 6:
                            buttons += `
                                <button type="button" class="btn btn-sm btn-success approve-btn" data-id="${row.id}" style="${baseButtonStyle}">
                                    <i class="fa-solid fa-square-check"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger reject-btn" data-id="${row.id}" style="${baseButtonStyle}">
                                    <i class="fa-solid fa-square-xmark"></i>
                                </button>
                            `;
                            break;
                        default:
                            buttons += `
                                <button type="button" class="btn btn-sm btn-success approve-btn" style="${baseButtonStyle}" disabled>
                                    <i class="fa-solid fa-square-check"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger reject-btn" style="${baseButtonStyle}" disabled>
                                    <i class="fa-solid fa-square-xmark"></i>
                                </button>
                            `;
                            break;
                    }
                    buttons += "</div>";
                    return buttons;
                }
            },
            { 
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ],
        drawCallback: sihubDrawCallback
    });

    $("#searchInput").on("keyup", function () {
        table.search($(this).val()).draw();
    });
    $("#pageLength").on("change", function () {
        table.page.len($(this).val()).draw();
    });
    $(document).on("click", "#tablePagination .page-link", function (e) {
        e.preventDefault();
        if (!$(this).closest("li").hasClass("disabled")) {
            table.page($(this).data("page")).draw("page");
        }
    });

    // Handle button clicks
    $("#tablePeminjaman").on(
        "click",
        ".approve-btn, .reject-btn, .return-btn",
        function (e) {
            e.preventDefault();
            const button = $(this);
            const id = button.data("id");
            const isReject = button.hasClass("reject-btn");
            const isReturn = button.hasClass("return-btn");
            let url, title, text;

            if (isReturn) {
                url = `/admin/peminjaman/${id}/return`;
                title = "Konfirmasi Pengembalian";
                text =
                    "Apakah Anda yakin ingin mengkonfirmasi pengembalian ini?";
            } else {
                url = isReject
                    ? `/admin/peminjaman/${id}/reject`
                    : `/admin/peminjaman/${id}/approve`;
                title = isReject
                    ? "Konfirmasi Penolakan"
                    : "Konfirmasi Persetujuan";
                text = isReject
                    ? "Apakah Anda yakin ingin menolak peminjaman ini?"
                    : "Apakah Anda yakin ingin menyetujui peminjaman ini?";
            }

            Swal.fire({
                title: title,
                text: text,
                icon: isReject ? "warning" : "question",
                showCancelButton: true,
                confirmButtonText: isReject ? "Ya, Tolak" : "Ya, Setuju",
                cancelButtonText: "Batal",
                confirmButtonColor: isReject ? "#dc3545" : "#198754",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _method: "PATCH",
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text:
                                    response.message ||
                                    "Operasi berhasil dilakukan",
                            }).then(() => {
                                table.ajax.reload();
                            });
                        },
                        error: function (xhr) {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text:
                                    xhr.responseJSON?.message ||
                                    "Terjadi kesalahan",
                            });
                        },
                    });
                }
            });
        }
    );

    /* sweetalert delete e */
    $(document).ready(function () {
        $(document).on("click", ".delete-peminjaman", function () {
            const id = $(this).data("id");
            Swal.fire({
                title: "Anda yakin?", 
                text: "Data peminjaman akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batal!",
                reverseButtons: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/peminjaman/${id}`,
                        type: "DELETE",
                        success: function (response) {
                            Swal.fire(
                                "Berhasil!",
                                response.success,
                                "success"
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr) {
                            Swal.fire(
                                "Error!",
                                xhr.responseJSON.error,
                                "error"
                            );
                        },
                    });
                }
            });
        });
     });
});
