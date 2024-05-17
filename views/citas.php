<?php
session_start();


if (!isset($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesión para acceder a esta página');</script>";
    header("refresh:1;url=login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="citas.css">
    
  <script src="../functions/citas.js"></script>
   <script src="../js/bootstrap.bundle.min.js"></script>
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
                    <th>ID Paciente - Nombre y Apellido</th>
                    <th>DNI</th>
                    <th>Medico encargado</th>
                    <th>Fecha y Horario del Turno</th>
                    <th>Estado de la cita</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
        <?php
        include '../config/connection.php';
        
        $sql = "SELECT
        citas.id_cita,
        citas.fecha_y_hora,
        estados.id_estado,
        estados.tipo_estado,
        medicos.id_medico,
        pacientes.id_paciente,
        registros.nombres AS nombres_paciente,
        registros.apellidos AS apellidos_paciente,
        documentaciones.id_documentacion,
        documentaciones.dni
    FROM
        citas
        INNER JOIN estados ON citas.id_estado = estados.id_estado
        INNER JOIN medicos ON citas.id_medico = medicos.id_medico
        INNER JOIN pacientes ON citas.id_paciente = pacientes.id_paciente
        INNER JOIN personas ON pacientes.id_persona = personas.id_persona
        INNER JOIN documentaciones ON personas.id_documentacion = documentaciones.id_documentacion
        INNER JOIN registros ON personas.id_registro = registros.id_registro";
        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }

        if ($result->num_rows > 0) {


          while ($row = $result->fetch_assoc()) {

            //Registrar los datos
            echo "<tr>";
            echo "<td>" . $row["id_cita"] . "</td>";
            echo "<td>" .$row["id_paciente"] .'-' .$row["nombres_paciente"] . ' ' . $row["apellidos_paciente"] .  "</td>";
            echo "<td>" . $row["dni"] . "</td>";
            echo "<td>" . $row["id_medico"] . "</td>";
            echo "<td>" . $row["fecha_y_hora"] . "</td>";
            echo "<td>" . $row["tipo_estado"] . "</td>";
            echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_cita"] . '" class="btn editarBtn">Editar</button>
            <a href="../config/eliminar_cita.php?id=' . $row["id_cita"] . '" class="eliminarBtn btn" onclick="confirmacion(event)">Eliminar</a>
            </td>';
            echo "</tr>";
          }
        } else { //No hay registros ingresados
          echo "<tr>";
          echo "<td colspan='9'>No hay registros</td>";
         
          echo "</tr>";
        }
        //Cerrar conexión
        $conn->close();

        ?>
      </tbody>
    </table>

    <div class="crud-buttons">
      <button id="agregar" class="agregarBtn">Agregar</button>
    </div>
  </div>

  <!--FORMULARIO PARA AGREGAR DATOS-->
  <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Cita</h2>
      <form class="medico-form" action="../config/guardar_citas.php" method="POST">
      
      <div class="form-grupo">
          <label for="">paciente:</label>
          <select name="id_paciente" id="id_paciente">
          <?php
        include '../config/connection.php';

        $sql_paciente = "SELECT pacientes.id_paciente, registros.nombres, registros.apellidos
        FROM pacientes
        INNER JOIN personas ON pacientes.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result_paciente = $conn->query($sql_paciente);

        if ($result_paciente === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_pacientes = $result_paciente->fetch_assoc()) {
            echo '<option value="' . $row_pacientes["id_paciente"] . '">'
              . $row_paciente["id_paciente"]  . $row_pacientes["nombres"] . ' ' . $row_pacientes["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
         </select>
    </div>

        <div class="form-grupo">
    <label for="">medico encargado:</label>
    <select name="id_medico" id="id_medico">
        <?php
        include '../config/connection.php';

        $sql_medicos = "SELECT medicos.id_medico, registros.nombres, registros.apellidos
        FROM medicos 
        INNER JOIN personas ON medicos.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result_medicos = $conn->query($sql_medicos);

        if ($result_medicos === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_medico = $result_medicos->fetch_assoc()) {
            echo '<option value="' . $row_medico["id_medico"] . '">'
            . $row_medico["id_medico"].  '-'   . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
</div>

        <div class="form-grupo">
          <label for="">Fecha y hora del turno :</label>
          <input type="datetime-local" name="fecha" id="fecha">
        </div>
        <div class="form-grupo">
          <label for="">Estado de la suplencia:</label>
          <select name="id_estado" id="id_estado">
        <?php
        include '../config/connection.php';

        $sql_tipos = "SELECT * FROM estados";
        $result_tipos = $conn->query($sql_tipos);

        if ($result_tipos === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_tipo = $result_tipos->fetch_assoc()) {
            echo '<option value="' . $row_tipo["id_estado"] . '">'
            .$row_tipo["id_estado"]. '-'  . $row_tipo["tipo_estado"] . '</option>';
        }

        $conn->close();
        ?>
        </select>
        </div>
        

        <input type="submit" name="guardar_cita" id="guardar_cita" class="guardar_cita" value="Guardar">

      </form>

    </div>

  </div>
  
  <!--FORMULARIO PARA EDITAR DATOS-->
  <div id="formularioEditarContainer" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditar" class="cerrar-formulario">&times;</span>
        <h2>Editar cita</h2>
        <form class="medico-form" action="../config/guardar_citas.php" method="post">
            <!-- Agrega estos campos ocultos con los nombres correctos -->
            <input type="hidden" name="id_cita" id="id_cita" value="">
            <div class="form-grupo">
          <label for="">paciente de la cita:</label>
          <select name="id_paciente" id="id_paciente">
          <?php
        include '../config/connection.php';

        $sql_paciente = "SELECT pacientes.id_paciente, registros.nombres, registros.apellidos
        FROM pacientes
        INNER JOIN personas ON pacientes.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result_paciente = $conn->query($sql_paciente);

        if ($result_paciente === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_pacientes = $result_paciente->fetch_assoc()) {
            echo '<option value="' . $row_pacientes["id_paciente"] . '">'
              . $row_paciente["id_paciente"]  . $row_pacientes["nombres"] . ' ' . $row_pacientes["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
         </select>
    </div>


        <div class="form-grupo">
    <label for="">medico encargado:</label>
    <select name="id_medico" id="id_medico">
        <?php
        include '../config/connection.php';

        $sql_medicos = "SELECT medicos.id_medico, registros.nombres, registros.apellidos
        FROM medicos 
        INNER JOIN personas ON medicos.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result_medicos = $conn->query($sql_medicos);

        if ($result_medicos === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_medico = $result_medicos->fetch_assoc()) {
            echo '<option value="' . $row_medico["id_medico"] . '">'
            . $row_medico["id_medico"].  '-'   . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
</div>


        <div class="form-grupo">
          <label for="">Fecha y Horario del turno :</label>
          <input type="datetime-local" name="fecha" id="fecha">
        </div>
        <div class="form-grupo">
          <label for="">Estado de la suplencia:</label>
          <select name="id_estado" id="id_estado">
        <?php
        include '../config/connection.php';

        $sql_tipos = "SELECT * FROM estados";
        $result_tipos = $conn->query($sql_tipos);

        if ($result_tipos === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_tipo = $result_tipos->fetch_assoc()) {
            echo '<option value="' . $row_tipo["id_estado"] . '">'
            .$row_tipo["id_estado"]. '-'  . $row_tipo["tipo_estado"] . '</option>';
        }

        $conn->close();
        ?>
        </select>
        </div>
        

        <input type="submit" name="editar_cita" id="editar_cita" class="guardar" value="Guardar">

      </form>

    </div>

  </div>

</body>

</html>