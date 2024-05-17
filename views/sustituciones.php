
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="sustituciones.css">

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
      <h2 class="titulo">SUSTITUCIONES</h2>

<!--TABLA-->
      <div class="tabla">
  
          <table class="sustitucion">
              <thead>
                  <tr>
                      <th>id</th>
                      <th>Id del Medico</th>
                      <th>Nombre y Apellido del Medico</th>
                      <th>Alta Suplencia</th>
                      <th>Baja Suplencia</th>
                      <th>Estado de la sustitucion</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
  
              <tbody>
              <?php
        include '../config/connection.php';

       $sql = "SELECT
        sustituciones.id_sustitucion,
        sustituciones.alta_suplencia,
        sustituciones.baja_suplencia,
        medicos.id_medico,
        medicos.id_persona,
        registros.nombres AS nombres_medico,
        registros.apellidos AS apellidos_medico,
        estados.id_estado,
        estados.tipo_estado
    FROM
        sustituciones
        INNER JOIN medicos ON sustituciones.id_medico = medicos.id_medico
        INNER JOIN personas ON medicos.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro
        INNER JOIN estados on sustituciones.id_estado = estados.id_estado";
 
       
        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }


        if ($result->num_rows > 0) {


          while ($row = $result->fetch_assoc()) {

            //Registrar los datos
            echo "<tr>";
            echo "<td>" . $row["id_sustitucion"] . "</td>";
            echo "<td>" . $row["id_medico"] . "</td>";
            echo "<td>" . $row["nombres_medico"] . " " . $row["apellidos_medico"] . "</td>";
            echo "<td>" . $row["alta_suplencia"] . "</td>";
            echo "<td>" . $row["baja_suplencia"] . "</td>";
            echo "<td>" . $row["tipo_estado"] .  "</td>";
            echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_sustitucion"] . '" class="btn editarBtn editar">Editar</button>
            <a href="../config/eliminar_sustitucion.php?id_sustitucion=' . $row["id_sustitucion"] . '" class="eliminarBtn btn eliminar" onclick="confirmacion(event)">Eliminar</a>
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
      <h2>Registrar sustituciones</h2>
      <form class="medico-form" action="../config/guardar_sustitucion.php" method="post">

        <div class="form-grupo">
        <label for="">id y nombre del medico:</label>
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
                . $row_medico["id_medico"] . ' ' . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
        </div>

        <div class="form-grupo">
          <label for="">Alta suplencia:</label>
          <input type="date" name="alta_suplencia" id="alta_suplencia">
        </div>

        <div class="form-grupo">
          <label for="">Baja suplencia:</label>
          <input type="date" name="baja_suplencia" id="baja_suplencia">
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
                . $row_tipo["tipo_estado"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
        </div>

        <input type="submit" name="guardar_sustitucion" id="guardar_sustitucion" class="guardar" value="Guardar">

      </form>

    </div>

  </div>
  
  <!--FORMULARIO PARA EDITAR DATOS-->
  <div id="formularioEditarContainer" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditar" class="cerrar-formulario">&times;</span>
        <h2>Editar sustitucion</h2>
        <form class="medico-form" action="../config/guardar_sustitucion.php" method="post">
        <input type="hidden" name="id_sustitucion" id="id_sustitucion" value="">  

        <div class="form-grupo">
        <label for="">id y nombre del medico:</label>
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
                . $row_medico["id_medico"] . ' ' . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
        </select>
        </div>

        <div class="form-grupo">
          <label for="">Alta suplencia:</label>
          <input type="date" name="alta_suplencia" id="alta_suplencia">
        </div>

        <div class="form-grupo">
          <label for="">Baja suplencia:</label>
          <input type="date" name="baja_suplencia" id="baja_suplencia">
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
                . $row_tipo["tipo_estado"] . '</option>';
        }

        $conn->close();
        ?>
        </select>
        </div>
        <input type="submit" name="editar_sustitucion" id="editar_sustitucion" class="editar" value="editar">

      </form>

    </div>

  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../functions/sustituciones.js"></script>
</body>

</html>