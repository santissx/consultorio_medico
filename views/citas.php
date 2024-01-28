
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="citas.css">
</head>

<body>
<!--NAVEGADOR-->
    <div class="navegador">
        <nav class="navbar navbar-expand-lg bg-body-white">
          <div class="container-fluid">
            <a class="navbar-brand" href="menu.php" style="color: white;"><b>MAPRIFOR</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="medicos.php"><b>Medicos</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="empleados.php"><b>Empleados</b></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <b>Opciones</b>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cronograma.php">Cronograma Medicos</a></li>
                    <li><a class="dropdown-item" href="citas.php">Citas</a></li>
                    <li><a class="dropdown-item" href="vacaciones.php">Vacaciones</a></li>
                    <li><a class="dropdown-item" href="sustituciones.php">Sustituciones</a></li>
                    <li><a class="dropdown-item" href="medicamentos.php">Medicamentos</a></li>
                    <li><a class="dropdown-item" href="documentacion.php">Documentación</a></li>
                    <li><a class="dropdown-item" href="direcciones.php">Direcciones</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pacientes.php"><b>Pacientes</b></a>
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

<!--TITULO-->
    <h2 class="titulo">CITAS</h2>

<!--TABLA-->
    <div class="tabla">

        <table class="cita">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Paciente Apellido</th>
                    <th>DNI</th>
                    <th>Sexo</th>
                    <th>Número de Orden</th>
                    <th>Medico encargado</th>
                    <th>Fecha del Turno</th>
                    <th>Horario</th>
                    <th>Estado de la cita</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Reinoso</td>
                    <td>41.351.343</td>
                    <td>Femenino</td>
                    <td>23</td>
                    <td>1</td>
                    <td>20/01/2024</td>
                    <td>17:00:00</td>
                    <td>Completada</td>
                    <td style="white-space: nowrap;">
                        <button class="editarBtn" onclick="">Editar</button>
                        <button class="eliminarBtn" onclick="">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="crud-buttons">
            <button class="agregarBtn" onclick="">Agregar</button>
        </div>
    </div>

    
   <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>