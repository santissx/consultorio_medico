<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú | Inicio</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="menu.css">
</head>

<body>

  <div class="navegador">
    <nav class="navbar navbar-expand-lg bg-body-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu.html" style="color: white;"><b>MAPRIFOR</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="medicos.html"><b>Medicos</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empleados.html"><b>Empleados</b></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <b>Opciones</b>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cronograma.html">Cronograma Medicos</a></li>
                <li><a class="dropdown-item" href="citas.html">Citas</a></li>
                <li><a class="dropdown-item" href="vacaciones.html">Vacaciones</a></li>
                <li><a class="dropdown-item" href="sustituciones.html">Sustituciones</a></li>
                <li><a class="dropdown-item" href="medicamentos.html">Medicamentos</a></li>
                <li><a class="dropdown-item" href="documentacion.html">Documentación</a></li>
                <li><a class="dropdown-item" href="direcciones.html">Direcciones</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pacientes.html"><b>Pacientes</b></a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit" style="color: white;">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <section class="opciones">

    <div class="tipo-opciones">

      <div class="imagenes">
        <a href="medicos.html">
          <img src="../img/cirugia.jpg" alt="">
          <div class="overlay">
            <h1>Medicos</h1>
          </div>
        </a>
      </div>

      <div class="imagenes">
        <a href="empleados.html">
          <img src="../img/union.jpg" alt="">
          <div class="overlay">
            <h1>Empleados</h1>
          </div>
        </a>
      </div>

      <div class="imagenes">
        <a href="pacientes.html">
          <img src="../img/pacientes.jpg" alt="">
          <div class="overlay">
            <h1>Pacientes</h1>
          </div>
        </a>
      </div>
    </div>

<script src="../js/bootstrap.bundle.min.js"></script>
  </section>
</body>

</html>