
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacaciones</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="vacaciones.css">
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
  <h2 class="titulo"> VACACIONES</h2>


    <!--NAVEGADOR DE TABLAS-->

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#"
          onclick="mostrarTabla('table-medicos', event)">Medicos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="mostrarTabla('table-empleados',event)">Empleados</a>
    </ul>

    <!--TABLAS-->
<div class="conten-container">
    <div id="table-medicos" class="table-container">

      <div class="tabla">

        <table class="vacaciones">
          <thead>
            <tr>
              <th>id</th>
              <th>ID- Nombre y Apellido</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Fecha Inicialización</th>
              <th>Fecha Finalización</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
                   
                   <?php
                   include '../config/connection.php';
           
                  
       $sql = "SELECT
   vacaciones.id_vacacion,
   vacaciones.fecha_inicio,
   vacaciones.fecha_fin,
   medicos.id_medico,
   personas.id_persona,
   registros.nombres AS medico_nombre,
   registros.apellidos AS medico_apellido,
   datos_personales.id_personal,
   datos_personales.correo,
   datos_personales.telefonos,
   estados.id_estado,
   estados.tipo_estado
              FROM
   vacaciones
   INNER JOIN medicos ON vacaciones.id_medico = medicos.id_medico
   INNER JOIN personas ON medicos.id_persona = personas.id_persona
   INNER JOIN registros ON personas.id_registro = registros.id_registro
   INNER JOIN datos_personales ON personas.id_persona = datos_personales.id_persona
   INNER JOIN estados ON vacaciones.id_estado = estados.id_estado";
  
   $result = $conn->query($sql);

   if ($result === false) {
     die('Error en la consulta: ' . $conn->error);
   }


   if ($result->num_rows > 0) {


     while ($row = $result->fetch_assoc()) {

                       //Registrar los datos
                       echo "<tr>";
                       echo "<td>" . $row["id_vacacion"] . "</td>";
                       echo "<td>" . $row["id_medico"] . ' - ' . $row["medico_nombre"] . ' ' . $row["medico_apellido"] . "</td>";
                       echo "<td>" . $row["correo"] . "</td>";
                       echo "<td>" . $row["telefonos"] . "</td>";
                       echo "<td>" . $row["fecha_inicio"] . "</td>";
                       echo "<td>" . $row["fecha_fin"] . "</td>";
                       echo "<td>" . $row["tipo_estado"] . "</td>";
                       echo '<td style="white-space: nowrap;">
                       <button data-id="' . $row["id_vacacion"] . '" class="btn editarBtn btn editarM">Editar</button>
                       <a href="../config/eliminar_vacaciones.php?id=' . $row["id_vacacion"] . '" class="eliminarBtn btn eliminarM" onclick="confirmacion(event)">Eliminar</a>
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
      <h2>Registrar Vacaciones del medico</h2>
      <form class="medicamento-form" action="../config/guardar_vacaciones.php" method="post">
      <input type="hidden" name="id_empleado" id="id_empleado" value="">
      
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
          <label for="">Fecha de inicializacion:</label>
          <input type="date" name="fecha_inicio" id="fecha_inicio">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de finalizacion:</label>
          <input type="date" name="fecha_fin" id="fecha_fin">
        </div>
        <div class="form-grupo">
          <label for="">Estado de las vacaiones:</label>
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
        
        <input type="submit" name="guardar-vacaciones-medico" id="guardar-vacaciones-medicos" class="guardarM" value="Guardar">

      </form>

  </div>

</div>

 <!--FORMULARIO PARA EDITAR DATOS-->
 <div id="formularioEditarContainerM" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditarM" class="cerrar-formulario">&times;</span>
        <h2>Editar vacaciones</h2>
        <form class="medico-form" action="../config/editar_vacaciones.php" method="post">
            <!-- Agrega estos campos ocultos con los nombres correctos -->
            <input type="hidden" name="id_vacacion" id="id_vacacion" value="">
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
          <label for="">Fecha de inicio:</label>
          <input type="date" name="fecha_inicio" id="fecha_inicio">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de cierre:</label>
          <input type="date" name="fecha_fin" id="fecha_fin">
        </div>
        <div class="form-grupo">
          <label for="">Estado de las vacaiones:</label>
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

        <input type="submit" name="editar_vac_M" id="editar_vac_M" class="editar" value="editar">

      </form>

    </div>

  </div>

    <div id="table-empleados" class="table-container">

      <div class="tabla">

        <table class="vacaciones">
          <thead>
            <tr>
            <th>id</th>
              <th>ID- Nombre y Apellido</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Fecha Inicialización</th>
              <th>Fecha Finalización</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
    
    <?php
    include '../config/connection.php';

   $sql = "SELECT
    vacaciones.id_vacacion,
    vacaciones.fecha_inicio,
    vacaciones.fecha_fin,
    empleados.id_empleado,
    personas.id_persona,
    registros.nombres AS empleado_nombre,
    registros.apellidos AS empleado_apellido,
    datos_personales.id_personal,
    datos_personales.correo,
    datos_personales.telefonos,
    estados.id_estado,
    estados.tipo_estado
    FROM
    vacaciones
    INNER JOIN empleados ON vacaciones.id_empleado = empleados.id_empleado
    INNER JOIN personas ON empleados.id_persona = personas.id_persona
    INNER JOIN registros ON personas.id_registro = registros.id_registro
    INNER JOIN datos_personales ON personas.id_persona = datos_personales.id_persona
    INNER JOIN estados ON vacaciones.id_estado = estados.id_estado";
   
    $result = $conn->query($sql);

    if ($result === false) {
      die('Error en la consulta: ' . $conn->error);
    }


    if ($result->num_rows > 0) {


      while ($row = $result->fetch_assoc()) {

        //Registrar los datos
        echo "<tr>";
        echo "<td>" . $row["id_vacacion"] . "</td>";
        echo "<td>" . $row["id_empleado"] . ' - ' . $row["empleado_nombre"] . ' ' . $row["empleado_apellido"] ."</td>";
        echo "<td>" . $row["correo"] . "</td>";
        echo "<td>" . $row["telefonos"] . "</td>";
        echo "<td>" . $row["fecha_inicio"] . "</td>";
        echo "<td>" . $row["fecha_fin"] . "</td>";
        echo "<td>" . $row["tipo_estado"] . "</td>";
        echo '<td style="white-space: nowrap;">
        <button data-id="' . $row["id_vacacion"] . '" class="btn editarBtn editarE">Editar</button>
        <a href="../config/eliminar_vacaciones.php?id_vacacion=' . $row["id_vacacion"] . '" class="eliminarBtn btn eliminarE" onclick="confirmacion(event)">Eliminar</a>
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
            <button id="agregarE" class="agregarBtn">Agregar</button>
        </div>
    </div>
</div>


   <!--FORMULARIO PARA AGREGAR DATOS-->
   <div id="formularioContainerE" class="formulario-container">
    <div class="formulario">
      <span id="cerrarE" class="cerrar-formulario">&times;</span>
      <h2>Registrar vacaciones del empleado</h2>
      <form class="prescripcion-form" action="../config/guardar_vacaciones.php" method="post">
       
      <div class="form-grupo">
        <label for="">id y nombre del empleado:</label>
          <select name="id_empleado" id="id_empleado">
        <?php
        include '../config/connection.php';
        echo '<option value="">---</option>';
        $sql_empleados = "SELECT empleados.id_empleado, registros.nombres, registros.apellidos
        FROM empleados
        INNER JOIN personas ON empleados.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result_empleados = $conn->query($sql_empleados);

        if ($result_empleados === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_empleado = $result_empleados->fetch_assoc()) {
            echo '<option value="' . $row_empleado["id_empleado"] . '">'
                . $row_empleado["id_empleado"] . ' - ' . $row_empleado["nombres"] . ' ' . $row_empleado["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
        </div>

        <div class="form-grupo">
          <label for="">Fecha de inicializacion:</label>
          <input type="date" name="fecha_inicio" id="fecha_inicio">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de finalizacion:</label>
          <input type="date" name="fecha_fin" id="fecha_fin">
        </div>
        <div class="form-grupo">
          <label for="">Estado de las vacaiones:</label>
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

    <div class="form-grupo">
                <input type="submit" name="guardar_vac_emp" id="guardar_vac_emp" class="guardarE" value="Guardar">
            </div>
      </form>

</div>

</div>


 <!--FORMULARIO PARA EDITAR DATOS-->
 <div id="formularioEditarContainerE" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditarE" class="cerrar-formulario">&times;</span>
        <h2>Editar vacaciones empleado</h2>
        <form class="medico-form" action="../config/editar_vacaciones.php" method="post">
            <!-- Agrega estos campos ocultos con los nombres correctos -->
            <input type="hidden" name="id_vacacion" id="id_vacacion" value="">
            <div class="form-grupo">
        <label for="">id y nombre del empleado:</label>
          <select name="id_empleado" id="id_empleado">
        <?php
        include '../config/connection.php';
        echo '<option value="">---</option>';
        $sql_empleados = "SELECT empleados.id_empleado, registros.nombres, registros.apellidos
        FROM empleados 
        INNER JOIN personas ON empleados.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result_empleados = $conn->query($sql_empleados);

        if ($result_empleados === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_empleado = $result_empleados->fetch_assoc()) {
            echo '<option value="' . $row_empleado["id_empleado"] . '">'
                . $row_empleado["id_empleado"] . ' - ' . $row_empleado["nombres"] . ' ' . $row_empleado["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
        </div>

       
        <div class="form-grupo">
          <label for="">Fecha de inicio:</label>
          <input type="date" name="fecha_inicio" id="fecha_inicio">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de cierre:</label>
          <input type="date" name="fecha_fin" id="fecha_fin">
        </div>
        <div class="form-grupo">
          <label for="">Estado de las vacaiones:</label>
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

        <input type="submit" name="editar_vac_emp" id="editar_vac_emp" class="editarE" value="editar">

      </form>

    </div>

  </div>



  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/vacaciones.js"></script>
</body>
</html>