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
        console.log("Login exitoso!!");
        // location.href = "inicio";
    } else {
        alert(login.msg);
    }
}