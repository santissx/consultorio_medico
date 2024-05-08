<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="medicamentos.css">
       
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../functions/medicamentos.js"></script>
</head>
<body>

    <!--NAVEGADOR-->
    <div class="navegador">
        <nav class="navbar navbar-expand-lg bg-body-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="menu.php" style="color: white;"><b>MAPRIFOR</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
    <h2 class="titulo">MEDICAMENTOS</h2>

    <!--NAVEGADOR DE TABLAS-->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicamentos', event)">Medicamentos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"  onclick="mostrarTabla('table-prescripcion',event)">Prescripciones</a>
        
    </ul>

    <!--TABLAS-->
    <div id="table-medicamentos" class="table-container">

        <div class="tabla">

            <table class="medicamento">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre del Medicamento</th>
                        <th>Descripción</th>
                        <th>Ingrediente Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                   
        <?php
        include '../config/connection.php';

        $sql =  "SELECT * from medicamentos";
        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }

        if ($result->num_rows > 0) {


          while ($row = $result->fetch_assoc()) {

            //Registrar los datos
            echo "<tr>";
            echo "<td>" . $row["id_medicamento"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "<td>" . $row["ingrediente_activo"] . "</td>";
            echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_medicamento"] . '" class="btn editarBtn btn editarM">Editar</button>
            <a href="../config/eliminar_medico.php?id=' . $row["id_medicamento"] . '" class="eliminarBtn btn eliminarM" onclick="confirmacion(event)">Eliminar</a>
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
                <button id="agregarM" class="agregarBtn">Agregar</button>
            </div>
        </div>
    </div>

    <!--FORMULARIO PARA AGREGAR DATOS-->
<div id="formularioContainerM" class="formulario-container">
    <div class="formulario">
      <span id="cerrarM" class="cerrar-formulario">&times;</span>
      <h2>Registrar Medicamento</h2>
      <form class="medicamento-form" action="../config/guardar-medicamento.php" method="post">

        <div class="form-grupo">
          <label for="">Nombre:</label>
          <input type="text" name="nombre" id="nombre">
        </div>

        <div class="form-grupo">
          <label for="">Descripción:</label>
          <input type="text" name="descripcion" id="descripción">
        </div>

        <div class="form-grupo">
          <label for="">ingrediente_activo:</label>
          <input type="text" name="ingrediente" id="ingrediente">
        </div>

        <input type="submit" name="guardar-medicamento" id="guardar-medicamento" class="guardarM" value="Guardar">

      </form>

</div>

</div>


    <div id="table-prescripcion" class="table-container">

        <div class="tabla">

            <table class="medicamento">
                <thead>
                    <tr>
                        <th>Id Prescripción</th>
                        <th>Fecha de Prescripción</th>
                        <th>Medicamento</th>
                        <th>Medico Encargado</th>
                        <th>Paciente Recetado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
    
        <?php
        include '../config/connection.php';

       $sql = "SELECT
        prescripciones.id_prescripcion,
        prescripciones.fecha_prescripcion,
        medicamentos.id_medicamento,
        medicamentos.nombre AS nombre_medicamento,
        medicos.id_medico,
        registros.nombres AS medico_nombre,
        pacientes.id_paciente,
        registros.nombres AS nombres_paciente,
        registros.apellidos AS apellidos_paciente
    FROM
        prescripciones
        INNER JOIN medicamentos ON prescripciones.id_medicamento = medicamentos.id_medicamento
        INNER JOIN medicos ON prescripciones.id_medico = medicos.id_medico
        INNER JOIN pacientes ON prescripciones.id_paciente = pacientes.id_paciente
        INNER JOIN personas ON pacientes.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }


        if ($result->num_rows > 0) {


          while ($row = $result->fetch_assoc()) {

            //Registrar los datos
            echo "<tr>";
            echo "<td>" . $row["id_prescripcion"] . "</td>";
            echo "<td>" . $row["fecha_prescripcion"] . "</td>";
            echo "<td>" . $row["nombre_medicamento"] . "</td>";
            echo "<td>" . $row["medico_nombre"] .  "</td>";
            echo "<td>" . $row["nombres_paciente"] . ' '. $row["apellidos_paciente"] ."</td>";
            echo '<td style="white-space: nowrap;">
            <button data-id="' . $row["id_prescripcion"] . '" 
            data-id-persona="' . $row["id_medico"] .  '"
            data-id-personal="' . $row["id_paciente"] . '"
            data-id-especialidad="' . $row["id_medicamento"] . '" class="btn editarBtn editarP">Editar</button>
            <a href="../config/eliminar_prescipcion.php?id=' . $row["id_prescripcion"] . '" class="eliminarBtn btn eliminarM" onclick="confirmacion(event)">Eliminar</a>
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
                <button id="agregarP" class="agregarBtn">Agregar</button>
            </div>
        </div>
    </div>

    <!--FORMULARIO PARA AGREGAR DATOS-->
<div id="formularioContainerP" class="formulario-container">
    <div class="formulario">
      <span id="cerrarP" class="cerrar-formulario">&times;</span>
      <h2>Registrar Prescripción</h2>
      <form class="prescripcion-form" action="../config/guardar-medicamento.php" method="post">

        <div class="form-grupo">
          <label for="">fecha de prescripcion:</label>
          <input type="date" name="fecha" id="fecha">
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
                . $row_medico["nombres"] . ' ' . $row_medico["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
</div>

<div class="form-grupo">
          <label for="">paciente recetado:</label>
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
                . $row_pacientes["nombres"] . ' ' . $row_pacientes["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
         </select>
    </div>
    <div class="form-grupo">
          <label for="">medicamento:</label>
          <select name="id_medicamento" id="id_medicamento">
          <?php
        include '../config/connection.php';

        $sql_medicamentos = "SELECT medicamentos.id_medicamento, medicamentos.nombre FROM medicamentos";

        $result_medicamento = $conn->query($sql_medicamentos);

        if ($result_medicamento === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_medicamento = $result_medicamento->fetch_assoc()) {
            echo '<option value="' . $row_medicamento["id_medicamento"] . '">'
                . $row_medicamento["nombre"] . '</option>';
        }

        $conn->close();
        ?>
         </select>
    </div>
    <div class="form-grupo">
                <input type="submit" name="guardar_prescripcion" id="guardar_prescripcion" class="guardarP" value="Guardar">
            </div>
      </form>

</div>


</div>

 
</body>
</html>