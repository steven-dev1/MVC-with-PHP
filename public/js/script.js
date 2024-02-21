let registrarUsuario = async() => {
    let names = document.getElementById('names').value;
    let last_names = document.getElementById('last_names').value;
    let email = document.getElementById('email').value;
    let telefono = document.getElementById('telefono').value
    let password = document.getElementById('password').value
    let fecha = document.getElementById('fecha').value;
    let rol = document.getElementById('rol').value;
    if(names.trim() == "" || last_names.trim() == "" || email.trim() == "" || telefono.trim() == "" || password.trim() == "" || fecha.trim() == ""){
        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500
        })
    }
    let url = '?controlador=usuario&accion=registrar';
    let fd = new FormData();
    fd.append("names", names);
    fd.append("last_names", last_names);
    fd.append("email", email);
    fd.append("telefono", telefono);
    fd.append("password", password);
    fd.append("fecha", fecha);
    fd.append('rol', rol)
    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    });
    let info = await respuesta.json();
    if(info.estado = "success") {
        document.getElementById('names').value = ""
        document.getElementById('last_names').value = ""
        document.getElementById('email').value = ""
        document.getElementById('telefono').value = ""
        document.getElementById('password').value = ""
        document.getElementById('fecha').value = ""
        document.getElementById('rol').value = ""
    }
    Swal.fire({
        position: "center",
        icon: info.icono,
        title: info.mensaje,
        showConfirmButton: false,
        timer: 1500
      });
}
let eliminarUsuario = async (uid,elem) => {
    Swal.fire({
        title: "Estas seguro que deseas eliminar?",
        text: "Esta accion no se puede revertir!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            eliminar(uid, elem)
        }
    });
}
let eliminar = async (uid, elem) => {
    let url = `?controlador=usuario&accion=eliminar&uid=${uid}`;
    let respuesta = await fetch(url)
    let info = respuesta.json();
    Swal.fire({
        title:"Informacion",
        text: "Se eliminó el usuario correctamente",
        icon: info.icono
    });
    $(elem).closest('tr').remove();  
}
function clearform() {
    $('#formReg')[0].reset();
}

let validarUsuario = async() => {
    let url = "?controlador=inicio&accion=validarUsuario"
    let email = document.getElementById("email").value;
    let password = document.getElementById('password').value;
    if (email.trim() != "" || password.trim() != "") {
        let datos = new FormData();
        datos.append("email", email)
        datos.append("password", password)
        let respuesta = await fetch(url, {
            method: "post",
            body: datos,
        })
        let info = await respuesta.json()
        console.log(info)
        if (info.estado == 1){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Correo y contraseña encontrados.",
                showConfirmButton: false,
                timer: 1500
              });
              setInterval(() => {
                window.location.href = '?controlador=inicio&accion=principal'
              },1600)
        } else if(info.estado == 2) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Correo o contraseña incorrectos.",
            })
        }
    } else {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Todos los campos son obligatorios",
        })
    }
}

let editarUsuario = async () => {
    let names = document.getElementById('names').value;
    let last_names = document.getElementById('last_names').value;
    let email = document.getElementById('email').value;
    let telefono = document.getElementById('telefono').value
    let uid = document.getElementById('uid').value
    let fecha = document.getElementById('fecha').value;
    let rol = document.getElementById('rol').value;
    if(names.trim() == "" || last_names.trim() == "" || email.trim() == "" || telefono.trim() == "" || uid.trim() == "" || fecha.trim() == ""){
        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500
        })
    }
    let url = '?controlador=usuario&accion=editar';
    let fd = new FormData();
    fd.append("names", names);
    fd.append("last_names", last_names);
    fd.append("email", email);
    fd.append("telefono", telefono);
    fd.append("uid", uid);
    fd.append("fecha", fecha);
    fd.append('rol', rol)
    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    });
    let info = await respuesta.json();
    Swal.fire({
        position: "center",
        icon: info.icono,
        title: info.mensaje,
        showConfirmButton: false,
        timer: 1500
    });
    setInterval(() => {
        window.location.href = "?controlador=usuario&accion=principal"
    },1600)
}