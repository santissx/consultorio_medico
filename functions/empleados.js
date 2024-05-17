document.addEventListener("DOMContentLoaded", function () {
    var botonAgregar = document.getElementById("agregar");
    var contenedorFormulario = document.getElementById("formularioContainer");
    var botonCerrar = document.getElementById("cerrar");

    botonAgregar.addEventListener("click", function () {
        contenedorFormulario.style.display = "flex";
    });

    botonCerrar.addEventListener("click", function () {
        contenedorFormulario.style.display = "none";
    });

    // Cierra el formulario si se hace clic fuera de él
    window.addEventListener("click", function (event) {
        if (event.target == contenedorFormulario) {
            contenedorFormulario.style.display = "none";
        }
    });

    // Evita que el clic en el formulario cierre la ventana emergente
    contenedorFormulario.querySelector(".formulario").addEventListener("click", function (event) {
        event.stopPropagation();
    });

    var botonesEditar = document.querySelectorAll(".editarBtn");
    var contenedorFormularioEditar = document.getElementById("formularioEditarContainer");
    var botonCerrarEditar = document.getElementById("cerrareditar");

    botonesEditar.forEach(function (boton) {
        boton.addEventListener("click", function () {
            contenedorFormularioEditar.style.display = "flex";
            var idEmpleado = boton.getAttribute("data-id");
            var idPersona = boton.getAttribute("data-id-persona"); 
            var idPuesto = boton.getAttribute("data-id-puesto");  // Asegúrate de usar el atributo correcto
            var idPersonal = boton.getAttribute("data-id-personal");
            var idregistro = boton.getAttribute("data-id-registro");
            var iddocumentacion = boton.getAttribute("data-id-documentacion");
    
            // Establecer los valores en los campos ocultos del formulario de edición
            document.getElementById("id_empleado").value = idEmpleado;
            document.getElementById("id_persona").value = idPersona;
            document.getElementById("id_puesto").value = idPuesto;
            document.getElementById("id_personal").value = idPersonal;
            document.getElementById("id_registro").value = idregistro;
            document.getElementById("id_documentacion").value = iddocumentacion;
            console.log("ID del Empleado:", idEmpleado);
            console.log("ID del personal:", idPersonal);
            console.log("ID de la Persona:", idPersona);
            console.log("ID de la Puesto:", idPuesto);
            console.log("ID del registro:", idregistro);
        });
    });
    
    botonCerrarEditar.addEventListener("click", function () {
        contenedorFormularioEditar.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target == contenedorFormularioEditar) {
            contenedorFormularioEditar.style.display = "none";
        }
    });

    contenedorFormularioEditar.querySelector(".formulario").addEventListener("click", function (event) {
        event.stopPropagation();
    });

    // Confirmación para eliminar
    function confirmacion(event) {
        if (!confirm("¿Quieres eliminar este registro?")) {
            event.preventDefault();
        }
    }

    let linkdelete = document.querySelectorAll(".eliminarBtn");
    for (var i = 0; i < linkdelete.length; i++) {
        linkdelete[i].addEventListener("click", confirmacion);
    }

    // Ocultar los formularios al cargar la página
    contenedorFormulario.style.display = "none";
    contenedorFormularioEditar.style.display = "none";
});