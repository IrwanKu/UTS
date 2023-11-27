document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    // Ganti nilai username dan password sesuai kebutuhan
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Ganti dengan kondisi yang sesuai dengan nilai yang diinginkan
    if (username === "user" && password === "user") {
        alert("Login berhasil!");
        // Redirect ke halaman dashboard.html setelah login berhasil
        window.location.href = "dasboard.html";
    } else {
        alert("Login gagal. Periksa kembali username dan password Anda.");
    }
});
