async function iniciarSesion() {
    const usurario = $("#usuario").val();
    const passsword = $("#password").val();

    let datosLogin = new FormData();
    datosLogin.append("usuario", usurario);
    datosLogin.append("password", passsword);

    let login = await postFetchData(
        "ajaxcall/usuario.ajax.php?funct=iniciarSesion",
        [], datosLogin
    );

    if (login.success) {
        location.href = "home";
    } else {
        alert(login.msg);
    }
}