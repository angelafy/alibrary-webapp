$(document).ready(function () {
    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const table = $("#tablePermintaan").DataTable({
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
        ajax: {
            url: "/admin/peminjaman/permintaan",
            type: "GET",
            error: function (xhr, error, thrown) {
                console.error("DataTables error:", error);
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text:
                        "Terjadi kesalahan saat mengambil data. " +
                        (thrown || error),
                });
            },
        },
        columns: [
            { data: "kode_peminjaman", name: "kode_peminjaman" },
            { data: "user.nama", name: "user.nama" },
            {
                data: "tgl_pinjam",
                name: "tgl_pinjam",
                render: function (data) {
                    return moment(data).format("DD/MM/YYYY");
                },
            },
            {
                data: "tgl_kembali",
                name: "tgl_kembali",
                render: function (data) {
                    return moment(data).format("DD/MM/YYYY");
                },
            },
            {
                data: "status",
                name: "status",
                render: function (data, type, row) {
                    let badge = "";
                    switch (parseInt(data)) {
                        case 0:
                            badge =
                                '<span class="badge bg-warning">Pending Persetujuan</span>';
                            break;
                        case 2:
                            badge =
                                '<span class="badge bg-success">Dipinjam</span>';
                            break;
                        case 3:
                            badge =
                                '<span class="badge bg-info">Dikembalikan</span>';
                            break;
                        case 6:
                            badge =
                                '<span class="badge bg-warning">Pending Pengembalian</span>';
                            break;
                        case 7:
                            badge =
                                '<span class="badge bg-danger">Ditolak</span>';
                            break;
                        default:
                            badge =
                                '<span class="badge bg-secondary">Unknown</span>';
                    }
                    return badge;
                },
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    let buttons = '<div class="btn-group">';

                    if (row.status == 0) {
                        // Pending Persetujuan
                        buttons += `
                            <button type="button" class="btn btn-sm btn-success approve-btn" data-id="${row.id}">Setujui</button>
                            <button type="button" class="btn btn-sm btn-danger reject-btn" data-id="${row.id}">Tolak</button>
                        `;
                    } else if (row.status == 6) {
                        // Pending Pengembalian
                        buttons += `
                           <button type="button" class="btn btn-sm btn-success approve-btn" data-id="${row.id}">Setujui</button>
                            <button type="button" class="btn btn-sm btn-danger reject-btn" data-id="${row.id}">Tolak</button>
                        `;
                    } else {
                        // Status lain, tampilkan button disabled sesuai statusnya
                        let statusText = "";
                        let buttonClass = "btn-secondary";

                        switch (parseInt(row.status)) {
                            case 2:
                                statusText = "Telah Disetujui";
                                buttonClass = "btn-success";
                                break;
                            case 3:
                                statusText = "Telah Dikembalikan";
                                buttonClass = "btn-info";
                                break;
                            case 7:
                                statusText = "Telah Ditolak";
                                buttonClass = "btn-danger";
                                break;
                        }
                        buttons += `<button class="btn btn-sm ${buttonClass}" disabled>${statusText}</button>`;
                    }

                    // Detail button selalu ditampilkan
                    // buttons += `
                    //     <a href="/admin/peminjaman/${row.id}" class="btn btn-sm btn-primary ms-2">Detail</a>
                    // </div>`;

                    return buttons;
                },
            },
        ],
        drawCallback: sihubDrawCallback,
    });
    $("#pageLength").on("change", function () {
        table.page.len($(this).val()).draw();
    });

    $("#searchInput").on("keyup", function () {
        clearTimeout($.data(this, "timer"));
        var wait = setTimeout(() => {
            table.search($(this).val()).draw();
        }, 500); // delay 500ms
        $(this).data("timer", wait);
    });

    $(document).on("click", "#tablePagination .page-link", function (e) {
        e.preventDefault();
        if (!$(this).closest("li").hasClass("disabled")) {
            table.page($(this).data("page")).draw("page");
        }
    });

    // Handle button clicks
    $("#tablePermintaan").on(
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
});
