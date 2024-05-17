function mostrarTabla(tablaId, event) {
    
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

  var botonesEditarM = document.querySelectorAll(".editarM");
  var contenedorFormularioEditarM = document.getElementById("formularioEditarContainerM");
  var botonCerrarEditarM = document.getElementById("cerrareditarM");


  var botonesEditarE = document.querySelectorAll(".editarE");
  var contenedorFormularioEditarE = document.getElementById("formularioEditarContainerE");
  var botonCerrarEditarE = document.getElementById("cerrareditarE");




  botonesEditarM.forEach(function (boton) {
      boton.addEventListener("click", function () {
          contenedorFormularioEditarM.style.display = "flex";
          var id_documentacion = boton.getAttribute("data-id");
          // Establecer los valores en los campos ocultos del formulario de edición
          document.getElementById("id_documentacion").value = id_documentacion;
          console.log("ID de documentacion es:", id_documentacion);
      });
  });
  
  botonesEditarE.forEach(function (boton) {
    boton.addEventListener("click", function () {
        contenedorFormularioEditarE.style.display = "flex";
        var id_documentacion = boton.getAttribute("data-id");
        document.getElementById("id_documentacion").value = id_documentacion;
        console.log("ID de documentacion es:", id_documentacion);
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

   
  contenedorFormularioEditarM.style.display = "none";
  contenedorFormularioEditarE.style.display = "none";
});

