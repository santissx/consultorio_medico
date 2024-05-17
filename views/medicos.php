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
  <title>Medicos</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../views/medicos.css">
  <script src="../functions/medicos.js"></script>
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
  <h2 class="titulo">MEDICOS</h2>

  <!--TABLA-->
  <div class="tabla">

    <table class="medico">
      <thead>
        <tr>
          <th>id</th>
          <th>Nombres</th>
          <th>Apellido</th>
          <th>Sexo</th>
          <th>Fecha Nacimiento (A-M-D)</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Tipo de Medico</th>
          <th>Especialidades</th>
          <th>Numero Colegiado</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
      <?php
include '../config/connection.php';

$sql = "SELECT
        medicos.id_medico,
        medicos.nro_colegiado,
        tipos_medicos.id_tipo,
        tipos_medicos.tipo_medico,
        registros.nombres AS nombres,
        registros.apellidos AS apellidos,
        personas.id_persona,
        personas.sexo,
        personas.fecha_nacimiento,
        datos_personales.telefonos,
        datos_personales.correo,
        especialidades.id_especialidad,
        datos_personales.id_personal,
        especialidades.nombre AS especialidad
        
      FROM
        medicos
        INNER JOIN personas ON medicos.id_persona = personas.id_persona
        INNER JOIN tipos_medicos ON medicos.id_tipo = tipos_medicos.id_tipo
        INNER JOIN datos_personales ON personas.id_persona = datos_personales.id_persona
        INNER JOIN medicosXespecialidades ON medicos.id_medico = medicosXespecialidades.id_medico
        INNER JOIN especialidades ON medicosXespecialidades.id_especialidad = especialidades.id_especialidad
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

$result = $conn->query($sql);
if ($result === false) {
  die('Error en la consulta: ' . $conn->error);
}


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //Registrar los datos
        echo "<tr>";
        echo "<td>" . $row["id_medico"] . "</td>";
        echo "<td>" . $row["nombres"] . "</td>";
        echo "<td>" . $row["apellidos"] . "</td>";
        echo "<td>" . $row["sexo"] . "</td>";
        echo "<td>" . $row["fecha_nacimiento"] . "</td>";
        echo "<td>" . $row["telefonos"] . "</td>";
        echo "<td>" . $row["correo"] . "</td>";
        echo "<td>" . $row["tipo_medico"] . "</td>";
        echo "<td>" . $row["especialidad"] . "</td>";
        echo "<td>" . $row["nro_colegiado"] . "</td>";
        echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_medico"] . '" 
            data-id-tipo="' . $row["id_tipo"] . '" 
            data-id-persona="' . $row["id_persona"] . '"
            data-id-personal="' . $row["id_personal"] . '"
            data-id-especialidad="' . $row["id_especialidad"] . '" class="btn editarBtn">Editar</button>
            <a href="../config/eliminar_medico.php?id=' . $row["id_medico"] . '&id_persona=' . $row["id_persona"] . '" class="eliminarBtn btn" onclick="confirmacion(event)">Eliminar</a>
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
      <h2>Registrar Medico</h2>
      <form class="medico-form" action="../config/guardar-medico.php" method="post">

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
          <label for="">tipo de documento:</label>
          <select name="tipo_doc" id="tipo_doc">
        <?php
        include '../config/connection.php';

        $sql_tipos = "SELECT * FROM tipos_documentos";
        $result_tipos = $conn->query($sql_tipos);

        if ($result_tipos === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_tipo = $result_tipos->fetch_assoc()) {
            echo '<option value="' . $row_tipo["id_documento"] . '">'
            . $row_tipo["tipo_documento"] . '</option>';
        }

        $conn->close();
        ?>
        </select>
        </div>

        <div class="form-grupo">
          <label for="">N° DNI:</label>
          <input type="int" name="dni" id="dni" placeholder="inserte solo numeros">
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
          <label for="">tipo de medico:</label>
          <select name="tipo_medico" id="tipo_medico">
          <option value="1">Titular</option>
          <option value="2">Suplente</option>
          <option value="3">Interino</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Especialidad:</label>
          <select name="especialidad" id="especialidad">
          <option value="1">Cardiólogo</option>
          <option value="2">Dermatólogo</option>
          <option value="3">Neurólogo</option>
          <option value="4">Gastroenterólogo</option>
          <option value="5">Pediatra</option>
          <option value="6">Endocrinólogo</option>
          <option value="7">Oftalmólogo</option>
          <option value="8">Cirujano Ortopédico</option>
          <option value="9">Psiquiatra</option>
          <option value="10">Médico de Familia</option>
          </select>
        </div>
        <div class="form-grupo">
          <label for="">N° Colegiado:</label>
          <input type="int" name="num_col" id="num_col" placeholder="inserte solo numeros">
        </div>


        <input type="submit" name="guardar_med" id="guardar_med" class="guardar" value="Guardar">

      </form>

    </div>

  </div>

  <!--FORMULARIO PARA EDITAR DATOS-->
  <div id="formularioEditarContainer" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditar" class="cerrar-formulario">&times;</span>
        <h2>Editar Medico</h2>
        <form class="medico-form" action="../config/editar_medico.php" method="post">
            <!-- Agrega estos campos ocultos con los nombres correctos -->
            <input type="hidden" name="id_documentacion" id="id_documentacion" value="">
            <input type="hidden" name="id_medico" id="id_medico" value="">
            <input type="hidden" name="id_registro" id="id_registro" value="">
            <input type="hidden" name="id_personal" id="id_personal" value="">
            <input type="hidden" name="id_persona" id="id_persona" value="">
            <input type="hidden" name="id_especialidad" id="id_especialidad" value="">
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
          <label for="">tipo de medico:</label>
          <select name="tipo_medico" id="tipo_medico">
          <option value="1">Titular</option>
          <option value="2">Suplente</option>
          <option value="3">Interino</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Especialidad:</label>
          <select name="especialidad" id="especialidad">
          <option value="1">Cardiólogo</option>
          <option value="2">Dermatólogo</option>
          <option value="3">Neurólogo</option>
          <option value="4">Gastroenterólogo</option>
          <option value="5">Pediatra</option>
          <option value="6">Endocrinólogo</option>
          <option value="7">Oftalmólogo</option>
          <option value="8">Cirujano Ortopédico</option>
          <option value="9">Psiquiatra</option>
          <option value="10">Médico de Familia</option>
          </select>
        </div>
        <input type="submit" name="editar_med" id="editar_med" class="editar" value="editar">

      </form>

    </div>

  </div>
</body>

</html>
