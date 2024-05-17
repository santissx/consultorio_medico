
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="cronograma.css">
    <script src="../functions/cronogramas.js"></script>
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
    <h2 class="titulo">CRONOGRAMA MEDICOS</h2>

<!--TABLA-->
    <div class="tabla">

        <table class="cronograma">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Día</th>
                    <th>Horario de incio de Consultas</th>
                    <th>Horario de cierre de Consultas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php
        include '../config/connection.php';

       $sql = "SELECT
        cronogramas.id_cronograma,
        cronogramas.dia,
        horarios_entradas.id_horario_entrada,
        horarios_entradas.hora_entrada,
        horarios_salidas.id_horario_salida,
        horarios_salidas.hora_salida,
        medicos.id_medico,
        medicos.id_persona,
        registros.nombres AS nombres_medico,
        registros.apellidos AS apellidos_medico
    FROM
        cronogramas
        INNER JOIN medicos ON cronogramas.id_medico = medicos.id_medico
        INNER JOIN personas ON medicos.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro
        INNER JOIN horarios_salidas on cronogramas.id_horario_salida = horarios_salidas.id_horario_salida
        INNER JOIN horarios_entradas on cronogramas.id_horario_entrada = horarios_entradas.id_horario_entrada";
 
       
        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }


        if ($result->num_rows > 0) {


          while ($row = $result->fetch_assoc()) {

            //Registrar los datos
            echo "<tr>";
            echo "<td>" . $row["id_cronograma"] . "</td>";
            echo "<td>" . $row["nombres_medico"]  . "</td>";
            echo "<td>" . $row["apellidos_medico"] . "</td>";
            echo "<td>" . $row["dia"] . "</td>";
            echo "<td>" . $row["hora_entrada"] . "</td>";
            echo "<td>" . $row["hora_salida"] . "</td>";
            echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_cronograma"] . '" class="btn editarBtn editar">Editar</button>
            <a href="../config/eliminar_cronograma.php?id_cronograma=' . $row["id_cronograma"] . '" class="eliminarBtn btn eliminar" onclick="confirmacion(event)">Eliminar</a>
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
      <h2>Registrar cronograma</h2>
      <form class="medico-form" action="../config/guardar_cronograma.php" method="post">

        <div class="form-grupo">
        <label for="">id y nombre del medico:</label>
          <select name="id_medico" id="id_medico">
        <?php
        include '../config/connection.php';
        echo '<option value="">---</option>';
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
                . $row_medico["id_medico"] . ' - ' . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
        </div>

        <div class="form-grupo">
          <label for="">dia:</label>
          <input type="date" name="dia" id="dia">
        </div>

        <div class="form-grupo">
          <label for="">horario entrada:</label>
          <select name="id_horario_entrada" id="id_horario_entrada">
        <?php
        include '../config/connection.php';

        $sql_horarios1 = "SELECT * FROM horarios_entradas";
        $result_horarios1 = $conn->query($sql_horarios1);

        if ($result_horarios1 === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_horario1 = $result_horarios1->fetch_assoc()) {
            echo '<option value="' . $row_horario1["id_horario_entrada"] . '">'
                . $row_horario1["hora_entrada"] . '</option>';
        }
        $conn->close();
        ?>
    </select>
        </div>
        <div class="form-grupo">
          <label for="">horario salida:</label>
          <select name="id_horario_salida" id="id_horario_salida">
        <?php
        include '../config/connection.php';

        $sql_horarios2 = "SELECT * FROM horarios_salidas";
        $result_horarios2 = $conn->query($sql_horarios2);

        if ($result_horarios2 === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_horario2 = $result_horarios2->fetch_assoc()) {
            echo '<option value="' . $row_horario2["id_horario_salida"] . '">'
                . $row_horario2["hora_salida"] . '</option>';
              }
              $conn->close();
              ?>
          </select>
              </div>
        <input type="submit" name="guardar_cronograma" id="guardar_cronograma" class="guardar" value="Guardar">

      </form>

    </div>

  </div>
      
    
  <!--FORMULARIO PARA EDITAR DATOS-->
  <div id="formularioEditarContainer" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditar" class="cerrar-formulario">&times;</span>
        <h2>Editar cronograma</h2>
        <form class="medico-form" action="../config/guardar_cronograma.php" method="post">
        <input type="hidden" name="id_cronograma" id="id_cronograma" value="">  

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
                . $row_medico["id_medico"] . ' - ' . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
        </div>

        <div class="form-grupo">
          <label for="">dia:</label>
          <input type="date" name="dia" id="dia">
        </div>

        <div class="form-grupo">
          <label for="">horario entrada:</label>
          <select name="id_horario_entrada" id="id_horario_entrada">
        <?php
        include '../config/connection.php';

        $sql_horarios1 = "SELECT * FROM horarios_entradas";
        $result_horarios1 = $conn->query($sql_horarios1);

        if ($result_horarios1 === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_horario1 = $result_horarios1->fetch_assoc()) {
            echo '<option value="' . $row_horario1["id_horario_entrada"] . '">'
                . $row_horario1["hora_entrada"] . '</option>';
        }
        $conn->close();
        ?>
    </select>
        </div>
        <div class="form-grupo">
          <label for="">horario salida:</label>
          <select name="id_horario_salida" id="id_horario_salida">
        <?php
        include '../config/connection.php';

        $sql_horarios2 = "SELECT * FROM horarios_salidas";
        $result_horarios2 = $conn->query($sql_horarios2);

        if ($result_horarios2 === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_horario2 = $result_horarios2->fetch_assoc()) {
            echo '<option value="' . $row_horario2["id_horario_salida"] . '">'
                . $row_horario2["hora_salida"] . '</option>';
              }
              $conn->close();
              ?>
          </select>
              </div>
        <input type="submit" name="editar_cronograma" id="editar_cronograma" class="editar" value="editar">

      </form>

    </div>

  </div>


</body>
</html>