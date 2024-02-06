let registrarUsuario = async() => {
    let url = '?controlador=usuario&accion=registrar';
    let fd = new FormData();
    fd.append("names", document.getElementById('names').value);
    fd.append("last_names", document.getElementById('last_names').value);
    fd.append("email", document.getElementById('email').value);
    fd.append("telefono", document.getElementById('telefono').value);
    fd.append("password", document.getElementById('password').value);
    fd.append("fecha", document.getElementById('fecha').value);

    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    });

    let info = await respuesta.json();
    console.log(info.status);
    if(info.status = "success") {
        document.getElementById('names').value = ""
        document.getElementById('last_names').value = ""
        document.getElementById('email').value = ""
        document.getElementById('telefono').value = ""
        document.getElementById('password').value = ""
        document.getElementById('fecha').value = ""
    }
    alert(info.status)

}