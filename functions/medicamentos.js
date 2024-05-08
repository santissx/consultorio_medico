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
  
  var botonAgregarP = document.getElementById("agregarP");
  var contenedorFormulariop = document.getElementById("formularioContainerP");
  var botonCerrarp = document.getElementById("cerrarP");

  botonAgregar.addEventListener("click", function () {
      contenedorFormulariom.style.display = "flex";
  });
  botonAgregarP.addEventListener("click", function () {
    contenedorFormulariop.style.display = "flex";
  });
  botonCerrar.addEventListener("click", function () {
      contenedorFormulariom.style.display = "none";
  });
  botonCerrarp.addEventListener("click", function () {
    contenedorFormulariop.style.display = "none";
  });

  // Cierra el formulario de prescripciones si se hace clic fuera de él
  window.addEventListener("click", function (event) {
    if (event.target == contenedorFormulariop) {
        contenedorFormulariop.style.display = "none";
    }
});
  // Cierra el formulario si se hace clic fuera de él
  window.addEventListener("click", function (event) {
      if (event.target == contenedorFormulariom) {
          contenedorFormulariom.style.display = "none";
      }
  });
  window.addEventListener("click", function (event) {
    if (event.target == contenedorFormulariop) {
      contenedorFormulariop.style.display = "none";
    }
  });

  // Evita que el clic en el formulario cierre la ventana emergente
  contenedorFormulariom.querySelector(".formulario").addEventListener("click", function (event) {
      event.stopPropagation();
  });
  
  // Evita que el clic en el formulario cierre la ventana emergente
  contenedorFormulariop.querySelector(".formulario").addEventListener("click", function (event) {
    event.stopPropagation();
});

  // Ocultar los formularios al cargar la página
  contenedorFormulariom.style.display = "none";
  contenedorFormulariop.style.display = "none";

});
