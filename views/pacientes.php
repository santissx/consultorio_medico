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
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="pacientes.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../functions/pacientes.js"></script>
</head>
<body>
    <!--NAVEGADOR-->
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
    <h2 class="titulo">PACIENTES</h2>

<!--TABLA-->
    <div class="tabla">
  
      <table class="paciente">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Telefono</th>
            <th>Tipo y N° de Documentos</th>
            <th>Correo</th>
            <th>Medico Encargado</th>
            <th>Informe Medico</th>
            <th>Acciones</th>
          </tr>
        </thead>
  
        <tbody>
        <?php
        include '../config/connection.php';

        $sql = "SELECT
        pacientes.id_paciente,
        registros.nombres AS nombres,
        registros.apellidos AS apellidos,
        personas.id_persona,
        personas.sexo,
        personas.fecha_nacimiento,
        datos_personales.telefonos,
        datos_personales.correo,
        datos_personales.id_personal,
        medicos.id_medico,
        registros.id_registro,
        pacientes.informacion_medica,
        documentaciones.id_documentacion,
        documentaciones.dni,
        tipos_documentos.id_documento,
        tipos_documentos.tipo_documento
    FROM
        pacientes
        INNER JOIN personas ON pacientes.id_persona = personas.id_persona
        INNER JOIN datos_personales ON personas.id_persona = datos_personales.id_persona
        INNER JOIN medicosxpacientes ON pacientes.id_paciente = medicosxpacientes.id_paciente
        INNER JOIN medicos ON medicosxpacientes.id_medico = medicos.id_medico
        INNER JOIN registros ON personas.id_registro = registros.id_registro
        INNER JOIN documentaciones on personas.id_documentacion = documentaciones.id_documentacion
        INNER JOIN tipos_documentos on documentaciones.id_tipos_documentos = tipos_documentos.id_documento";

        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_paciente"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            echo "<td>" . $row["apellidos"] . "</td>";
            echo "<td>" . $row["sexo"] . "</td>";
            echo "<td>" . $row["fecha_nacimiento"] . "</td>";
            echo "<td>" . $row["telefonos"] . "</td>";
            echo "<td>" . $row["tipo_documento"] . '-' . $row["dni"] . "</td>";
            echo "<td>" . $row["correo"] . "</td>";
            echo "<td>" . $row["id_medico"] . "</td>"; 
            echo "<td>" . $row["informacion_medica"] . "</td>";
            echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_paciente"] . '" 
            data-id-Medico="' . $row["id_medico"] . '"
            data-id-persona="' . $row["id_persona"] . '"
            data-id-documento="' . $row["id_documento"] . '"
            data-id-documentacion="' . $row["id_documentacion"] . '"            
            data-id-registro="' . $row["id_registro"] . '"
            data-id-personal="' . $row["id_personal"] . '" class="btn editarBtn btn">Editar</button>
            <a href="../config/eliminar_paciente.php?id=' . $row["id_paciente"] . '&id_persona=' . $row["id_persona"] .  '&id_medico=' . $row["id_medico"] . '&id_documentacion='. $row["id_documentacion"] .  '&id_documento='. $row["id_documento"]  . '" class="eliminarBtn btn" onclick="confirmacion(event)">Eliminar</a>

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

    <!--FORMULARIO PARA agregar datos-->
    <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Paciente</h2>
      <form class="medico-form" action="../config/guardar_pacientes.php" method="post">

        <div class="form-grupo">
          <label for="">Nombres:</label>
          <input type="text" name="nombre" id="nombre">
        </div>

        <div class="form-grupo">
          <label for="">Apellido:</label>
          <input type="text" name="apellido" id="apellido">
        </div>
        <div class="form-grupo">
    <label for="tipo_doc">tipo de documento:</label>
    <select name="id_documento" id="id_documento">
    <?php
    include '../config/connection.php';

    $sql_tipo_documento = "SELECT * FROM tipos_documentos"; 
    
    $result_doc = $conn->query($sql_tipo_documento);

    if ($result_doc === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    while ($row_doc = $result_doc->fetch_assoc()) {
      echo '<option value="' . $row_doc["id_documento"] . '">'
      . $row_doc["tipo_documento"] . '</option>';
    }

    $conn->close();
    ?>
</select>
</div>
        <div class="form-grupo">
          <label for="">N° de documento:</label>
          <input type="int" name="dni" id="dni" placeholder='solo ingresar numeros'>
        </div>

        <div class="form-grupo">
          <label for="">Sexo:</label>
          <input type="text" name="sexo" id="sexo">
        </div>

        <div class="form-grupo">
          <label for="">Fecha Nacimiento :</label>
          <input type="date" name="fechaN" id="fechaN">
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
          <label for="">informacion_medica:</label>
          <input type="text" name="informacion_medica" id="informacion_medica">
        </div>

        <div class="form-grupo">
    <label for="medico">Medico Encargado:</label>
    <select name="id_medico" id="id_medico">
        <?php
        include '../config/connection.php';

        $sql_medicos = "SELECT medicos.id_medico, medicos.id_persona, registros.nombres 
                        FROM medicos 
                        INNER JOIN personas ON medicos.id_persona = personas.id_persona
                        INNER JOIN registros ON personas.id_registro = registros.id_registro";
        
        $result_medicos = $conn->query($sql_medicos);

        if ($result_medicos === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_medico = $result_medicos->fetch_assoc()) {
          echo '<option value="' . $row_medico["id_medico"] . '">'
          . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
</div>
        <input type="submit" name="guardar_pacientes" id="guardar_pacientes" class="guardar" value="Guardar">
      </form>
    </div>
  </div>

<!--FORMULARIO PARA EDITAR DATOS-->
<div id="formularioEditarContainer" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditar" class="cerrar-formulario">&times;</span>
        <h2>Editar paciente</h2>
        <form class="medico-form" action="../config/editar_paciente.php" method="post">
            <!-- Agrega estos campos ocultos con los nombres correctos -->
            <input type="hidden" name="id_paciente" id="id_paciente" value="">
            <input type="hidden" name="id_personal" id="id_personal" value="">
            <input type="hidden" name="id_persona" id="id_persona" value="">
            <input type="hidden" name="id_registro" id="id_registro" value="">
            <input type="hidden" name="id_medico" id="id_medico" value="">
            <input type="hidden" name="id_documentacion" id="id_documentacion" value="">
            <input type="hidden" name="id_documento" id="id_documento" value="">
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
          <input type="date" name="fechaN" id="fechaN">
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
    <label for="medico">tipo de documento:</label>
    <select name="id_documento" id="id_documento">
        <?php
        include '../config/connection.php';

        $sql_tipo_documento = "SELECT tipos_documentos.id_documento, tipos_documentos.tipo_documento FROM tipos_documentos"; 
        
        $result_doc = $conn->query($sql_tipo_documento);

        if ($result_doc === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_doc = $result_docs->fetch_assoc()) {
          echo '<option value="' . $row_doc["id_documento"] . '">'
          . $row_doc["tipo_documento"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
</div>
        <div class="form-grupo">
          <label for="">N° de documento:</label>
          <input type="int" name="dni" id="dni" placeholder='solo ingresar numeros'>
        </div>

        <div class="form-grupo">
          <label for="">informacion_medica:</label>
          <input type="text" name="informacion_medica" id="informacion_medica">
        </div>
        <div class="form-grupo">
    <label for="medico">Medico Encargado:</label>
    <select name="id_medico" id="id_medico">
        <?php
        include '../config/connection.php';

        $sql_medicos = "SELECT medicos.id_medico, medicos.id_persona, registros.nombres 
                        FROM medicos 
                        INNER JOIN personas ON medicos.id_persona = personas.id_persona
                        INNER JOIN registros ON personas.id_registro = registros.id_registro";
        
        $result_medicos = $conn->query($sql_medicos);

        if ($result_medicos === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_medico = $result_medicos->fetch_assoc()) {
          echo '<option value="' . $row_medico["id_medico"] . '">'
          . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
        </select>
        </div>
        <input type="submit" name="editar_pac" id="editar_pac" class="editar" value="editar">

      </form>

    </div>

  </div>
</body>
</html>