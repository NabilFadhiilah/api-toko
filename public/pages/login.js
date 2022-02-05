document.addEventListener("DOMContentLoaded", (c) => {
    $("button#btn-login").on("click", () => {
        //login di click
        var email = $("input[name=email]").val(); //value email
        var password = $("input[name=password]").val(); //value password

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=”csrf-token”]").attr("content"),
            },
        });

        $.ajax({
            url: "/api/auth",
            dataType: "json",
            method: "GET",
            headers: {
                //kirim header auth jadi base base64encode (email:password)
                Authorization: "basic " + window.btoa(email + ":" + password),
            },
            success: (msg) => {
                alert(
                    "Selamat Datang ${msg.data.first_name} ${msg.data.last_name}"
                );
                window.localStorage.setItem("token", msg.data.token); //simpan token dari server di localstorage
                window.location = "/list-order"; //pindah ke list order
            },
            error: (req, status, err) => {
                console.log(req); //tampilkan log agar dapat dibaca di console
                alert(req.responseJSON.error[0]); //pesan error dari server
            },
        });
    });
});
