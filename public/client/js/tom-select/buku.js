/* GENRE */
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-genre")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});
/* PENULIS */
// @formatter:off
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-penulis")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});
// @formatter:on
// ----------- PENERBIT -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-penerbit")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});

// ----------- KANDANG -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-kandang")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});

// ----------- KESEHATAN -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect(
            (el = document.getElementById("select-labels-kesehatan")),
            {
                copyClassesToDropdown: false,
                render: {
                    item: function (data, escape) {
                        if (data.customProperties) {
                            return (
                                '<div><span class="dropdown-item-indicator">' +
                                data.customProperties +
                                "</span>" +
                                escape(data.text) +
                                "</div>"
                            );
                        }
                        return "<div>" + escape(data.text) + "</div>";
                    },
                    option: function (data, escape) {
                        if (data.customProperties) {
                            return (
                                '<div><span class="dropdown-item-indicator">' +
                                data.customProperties +
                                "</span>" +
                                escape(data.text) +
                                "</div>"
                            );
                        }
                        return "<div>" + escape(data.text) + "</div>";
                    },
                },
            }
        );
});

// ----------- PROGRAM -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-program")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});

// @formatter:off
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-pemilik")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});
// @formatter:on
