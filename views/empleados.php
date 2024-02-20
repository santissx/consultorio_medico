<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="empleados.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../functions/empleados.js"></script>
    
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
    <h2 class="titulo">EMPLEADOS</h2>

<!--TABLA-->
  <div class="tabla">
  
    <table class="empleado">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Puesto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php
        include '../config/connection.php';

        $sql =  "SELECT
        empleados.id_empleado,
        registros.nombres AS nombres,
        registros.apellidos AS apellidos,
        personas.id_persona,
        personas.sexo,
        personas.fecha_nacimiento,
        datos_personales.telefonos,
        datos_personales.correo,
        datos_personales.id_personal,
        puestos_trabajos.id_puesto,
        puestos_trabajos.nombre_puesto AS puestos_trabajos,
        registros.id_registro
      FROM
        empleados
        INNER JOIN personas ON empleados.id_persona = personas.id_persona
        INNER JOIN datos_personales ON personas.id_persona = datos_personales.id_persona
        INNER JOIN puestos_trabajos ON puestos_trabajos.id_puesto = empleados.id_puesto
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_empleado"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            echo "<td>" . $row["apellidos"] . "</td>";
            echo "<td>" . $row["sexo"] . "</td>";
            echo "<td>" . $row["fecha_nacimiento"] . "</td>";
            echo "<td>" . $row["telefonos"] . "</td>";
            echo "<td>" . $row["correo"] . "</td>";
            echo "<td>" . $row["puestos_trabajos"] . "</td>";
            echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_empleado"] . '" 
            data-id-puesto="' . $row["id_puesto"] . '"
            data-id-persona="' . $row["id_persona"] . '"
            data-id-registro="' . $row["id_registro"] . '"
            data-id-personal="' . $row["id_personal"] . '" class="btn editarBtn btn">Editar</button>
            <a href="../config/eliminar_empleado.php?id=' . $row["id_empleado"] . '&id_persona=' . $row["id_persona"] . '" class="eliminarBtn btn" onclick="confirmacion(event)">Eliminar</a>

            </td>';
            echo "</tr>";
          }
        } else {
          echo "<tr>";
          echo "<td colspan='9'>No hay registros</td>";
          echo "</tr>";
        }
        $conn->close();
        ?>
      </tbody>
      </table>
  
      <div class="crud-buttons">
        <button id="agregar" class="agregarBtn"> Agregar</button>
      </div>
    </div>

    <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Empleado</h2>
      <form class="medico-form" action="../config/guardar_emp.php" method="post">

        <div class="form-grupo">
          <label for="">Nombres:</label>
          <input type="text" name="nombre" id="nombre">
        </div>

        <div class="form-grupo">
          <label for="">Apellido:</label>
          <input type="text" name="apellido" id="apellido">
        </div>

        <div class="form-grupo">
          <label for="">Sexo:</label>
          <input type="text" name="sexo" id="sexo">
        </div>

        <div class="form-grupo">
          <label for="">Fecha Nacimiento :</label>
          <input type="text" name="fechaN" id="fechaN">
        </div>

        <div class="form-grupo">
          <label for="">Telefono:</label>
          <input type="text" name="telefono" id="telefono">
        </div>

        <div class="form-grupo">
          <label for="">Correo:</label>
          <input type="email" name="correo" id="correo">
        </div>

        <div class="form-grupo">
          <label for="">Puesto:</label>
          <select name="puesto" id="puesto">
          <option value="1">Enfermero/a Jefe</option>
          <option value="2">Asistente Administrativo de Salud</option>
          <option value="3">Técnico de Radiología</option>
          <option value="4">Recepcionista de Consultorio</option>
          <option value="5">Especialista en Informática Médica</option>
          </select>
        </div>


        <input type="submit" name="guardar_emp" id="guardar_emp" class="guardar" value="Guardar">

      </form>

    </div>
  </div>
 <!--FORMULARIO PARA EDITAR DATOS-->
 <div id="formularioEditarContainer" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditar" class="cerrar-formulario">&times;</span>
        <h2>Editar Empleado</h2>
        <form class="medico-form" action="../config/editar_emp.php" method="post">
            <!-- Agrega estos campos ocultos con los nombres correctos -->
            <input type="hidden" name="id_empleado" id="id_empleado" value="">
            <input type="hidden" name="id_personal" id="id_personal" value="">
            <input type="hidden" name="id_persona" id="id_persona" value="">
            <input type="hidden" name="id_registro" id="id_registro" value="">
            <input type="hidden" name="id_puesto" id="id_puesto" value="">
        <div class="form-grupo">
          <label for="">Nombres:</label>
          <input type="text" name="nombre" id="nombre">
        </div>

        <div class="form-grupo">
          <label for="">Apellido:</label>
          <input type="text" name="apellido" id="apellido">
        </div>

        <div class="form-grupo">
          <label for="">Sexo:</label>
          <input type="text" name="sexo" id="sexo">
        </div>

        <div class="form-grupo">
          <label for="">Fecha Nacimiento:</label>
          <input type="text" name="fechaN" id="fechaN">
        </div>

        <div class="form-grupo">
          <label for="">Telefono:</label>
          <input type="text" name="telefono" id="telefono">
        </div>

        <div class="form-grupo">
          <label for="">Correo:</label>
          <input type="email" name="correo" id="correo">
        </div>
        <div class="form-grupo">
          <label for="">Puesto:</label>
          <select name="puesto" id="puesto">
          <option value="1">Enfermero/a Jefe</option>
          <option value="2">Asistente Administrativo de Salud</option>
          <option value="3">Técnico de Radiología</option>
          <option value="4">Recepcionista de Consultorio</option>
          <option value="5">Especialista en Informática Médica</option>
          </select>
        </div>
        <input type="submit" name="editar_emp" id="editar_emp" class="editar" value="editar">

      </form>

    </div>

  </div>
</body>

</html>
