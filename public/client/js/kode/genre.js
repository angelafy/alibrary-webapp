// Generate kode status
function generateRandomCodeGenre() {
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var result = "";
    for (var i = 0; i < 6; i++) {
        result += characters.charAt(
            Math.floor(Math.random() * characters.length)
        );
    }
    return result;
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("bukuForm");
    const submitButton = document.getElementById("submitButton");
    const kodeInput = document.getElementById("kode_genre");

    // Generate kode saat halaman dimuat
    kodeInput.value = generateRandomCodeGenre();

    // Event listener saat form akan disubmit
    form.addEventListener("submit", function (e) {
        // Buat input hidden untuk mengirim kode
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "kode_genre";
        hiddenInput.value = kodeInput.value;
        form.appendChild(hiddenInput);
    });
});
