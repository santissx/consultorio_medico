function mostrarTabla(tablaId) {
    
    // Ocultar todas las tablas
    var tablas = document.getElementsByClassName('table-container');
    for (var i = 0; i < tablas.length; i++) {
        tablas[i].style.display = 'none';
    }

    // Mostrar la tabla correspondiente
    document.getElementById(tablaId).style.display = 'block';

     // Quitar la clase "active" de todos los enlaces
     var enlaces = document.getElementsByClassName('nav-link');
     for (var i = 0; i < enlaces.length; i++) {
       enlaces[i].classList.remove('active');
     }
 
     // Agregar la clase "active" al enlace seleccionado
     event.currentTarget.classList.add('active');
}

document.addEventListener("DOMContentLoaded", function () {
  var botonAgregar = document.getElementById("agregarM");
  var contenedorFormulariom = document.getElementById("formularioContainerM");
  var botonCerrar = document.getElementById("cerrarM");
    
  var botonesEditarM = document.querySelectorAll(".editarM");
  var contenedorFormularioEditarM = document.getElementById("formularioEditarContainerM");
  var botonCerrarEditarM = document.getElementById("cerrareditarM");
  
  var botonAgregarE = document.getElementById("agregarE");
  var contenedorFormularioE = document.getElementById("formularioContainerE");
  var botonCerrarE = document.getElementById("cerrarE");

  var botonesEditarE = document.querySelectorAll(".editarE");
  var contenedorFormularioEditarE = document.getElementById("formularioEditarContainerE");
  var botonCerrarEditarE = document.getElementById("cerrareditarE");


  botonAgregar.addEventListener("click", function () {
      contenedorFormulariom.style.display = "flex";
  });
  botonAgregarE.addEventListener("click", function () {
    contenedorFormularioE.style.display = "flex";
  });
  botonCerrar.addEventListener("click", function () {
      contenedorFormulariom.style.display = "none";
  });
  botonCerrarE.addEventListener("click", function () {
    contenedorFormularioE.style.display = "none";
  });

  // Cierra el formulario de prescripciones si se hace clic fuera de él
  window.addEventListener("click", function (event) {
    if (event.target == contenedorFormularioE) {
        contenedorFormularioE.style.display = "none";
    }
  });
  // Cierra el formulario si se hace clic fuera de él
  window.addEventListener("click", function (event) {
      if (event.target == contenedorFormulariom) {
          contenedorFormulariom.style.display = "none";
      }
  });
  window.addEventListener("click", function (event) {
    if (event.target == contenedorFormularioE) {
      contenedorFormularioE.style.display = "none";
    }
  });

  // Evita que el clic en el formulario cierre la ventana emergente
  contenedorFormulariom.querySelector(".formulario").addEventListener("click", function (event) {
      event.stopPropagation();
  });
  
  // Evita que el clic en el formulario cierre la ventana emergente
  contenedorFormularioE.querySelector(".formulario").addEventListener("click", function (event) {
    event.stopPropagation();
  });


  botonesEditarM.forEach(function (boton) {
      boton.addEventListener("click", function () {
          contenedorFormularioEditarM.style.display = "flex";
          var id_vacacion = boton.getAttribute("data-id");
          // Establecer los valores en los campos ocultos del formulario de edición
          document.getElementById("id_vacacion").value = id_vacacion;
          console.log("ID del vacacion es:", id_vacacion);
      });
  });
  
  botonesEditarE.forEach(function (boton) {
    boton.addEventListener("click", function () {
        contenedorFormularioEditarE.style.display = "flex";
        var id_vacacion = boton.getAttribute("data-id");
        document.getElementById("id_vacacion").value = id_vacacion;
        console.log("ID de las vacaciones es:", id_vacacion);
    });
});


  botonCerrarEditarM.addEventListener("click", function () {
      contenedorFormularioEditarM.style.display = "none";
  });

  botonCerrarEditarE.addEventListener("click", function () {
    contenedorFormularioEditarE.style.display = "none";
});

  window.addEventListener("click", function (event) {
      if (event.target == contenedorFormularioEditarM) {
          contenedorFormularioEditarM.style.display = "none";
      }
  });

  window.addEventListener("click", function (event) {
    if (event.target == contenedorFormularioEditarE) {
        contenedorFormularioEditarE.style.display = "none";
    }
});

  contenedorFormularioEditarM.querySelector(".formulario").addEventListener("click", function (event) {
      event.stopPropagation();
  });

  contenedorFormularioEditarE.querySelector(".formulario").addEventListener("click", function (event) {
    event.stopPropagation();
});

   

  // Ocultar los formularios al cargar la página
  contenedorFormulariom.style.display = "none";
  contenedorFormularioE.style.display = "none";
  contenedorFormularioEditarM.style.display = "none";
  contenedorFormularioEditarE.style.display = "none";
});

