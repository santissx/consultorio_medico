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
    <link rel="stylesheet" href="direcciones.css">
</head>
<body>
    
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
<h2 class="titulo">DIRECCIÓN</h2>

<!--NAVEGADOR DE TABLAS-->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicos', event)">Medicos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"  onclick="mostrarTabla('table-empleados',event)">Empleados</a>
    <li class="nav-item">
        <a class="nav-link " href="#" onclick="mostrarTabla('table-pacientes', event)">Pacientes</a>
    </li>
</ul>

<!--TABLAS-->
<div id="table-medicos" class="table-container">

    <div class="tabla">

        <table class="documentacion">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo de Residencia</th>
                    <th>Provincia</th>
                    <th>Localidad</th>
                    <th>Código Postal</th>
                    <th>Barrio</th>
                    <th>Calle</th>
                    <th>Id y Nombre del Medico</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                   
                   <?php
                   include '../config/connection.php';
           
                  
       $sql = "SELECT
    direcciones.id_direccion,
    direcciones.tipo_residencia,
    direcciones.altura,
    calles.id_calle,
    calles.nom_calle,
    barrios.id_barrio,
    barrios.nom_barrio,
    localidades.id_localidad,
    localidades.nom_loc,
    localidades.codigo_postal,
    provincias.id_provincia,
    medicos.id_medico,
    personas.id_persona,
    registros.nombres AS medico_nombre,
    registros.apellidos AS medico_apellido
    FROM
    direcciones
   INNER JOIN medicos ON direcciones.id_medico = medicos.id_medico
   INNER JOIN personas ON medicos.id_persona = personas.id_persona
   INNER JOIN registros ON personas.id_registro = registros.id_registro
   INNER JOIN calles ON direcciones.id_calle = calles.id_calle
   INNER JOIN barrios ON calles.id_barrio = barrios.id_barrio
   INNER JOIN localidades ON barrios.id_localidad = localidades.id_localidad
   INNER JOIN provincias ON localidades.id_provincia = provincias.id_provincia";
  
   $result = $conn->query($sql);

   if ($result === false) {
     die('Error en la consulta: ' . $conn->error);
   }


   if ($result->num_rows > 0) {


     while ($row = $result->fetch_assoc()) {

                       //Registrar los datos
                       echo "<tr>";
                       echo "<td>" . $row["id_direccion"] . "</td>";
                       echo "<td>" . $row["tipo_residencia"] . "</td>";
                       echo "<td>" . $row["nom_prov"] . "</td>";
                       echo "<td>" . $row["nom_loc"] . "</td>";
                       echo "<td>" . $row["codigo_postal"] . "</td>";
                       echo "<td>" . $row["nom_barrio"] . "</td>";
                       echo "<td>" . $row["nom_calle"] . "</td>";
                       echo "<td>" . $row["altura"] . "</td>";
                       echo "<td>" . $row["id_medico"] . ' - ' . $row["medico_nombre"] . ' ' . $row["medico_apellido"] . "</td>";
                       echo '<td style="white-space: nowrap;">
                       <button data-id="' . $row["id_direccion"] . '" class="btn editarBtn btn editarM">Editar</button>
                       <a href="../config/eliminar_direcciones.php?id=' . $row["id_direccion"] . '" class="eliminarBtn btn eliminarM" onclick="confirmacion(event)">Eliminar</a>
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
      <h2>Registrar Direccion del medico</h2>
      <form class="medicamento-form" action="../config/guardar_vacaciones.php" method="post">
      <input type="hidden" name="id_empleado" id="id_empleado" value="">
      <input type="hidden" name="id_paciente" id="id_paciente" value="">
      
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
          <label for="">tipo de residencia:</label>
          <input type="text" name="tipo_res" id="tipo_res">
        </div>

        <div class="form-grupo">
        <label for="">provincia:</label>
          <select name="id_provincia" id="id_provincia">
        <?php
        include '../config/connection.php';
        echo '<option value="">---</option>';
        $sql_provincias = "SELECT * FROM provincias"; 
        $result_provincias = $conn->query($sql_provincias);

        if ($result_provincias === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_provincia = $result_provincias->fetch_assoc()) {
            echo '<option value="' . $row_provincia["id_provincia"] . '">'
                . $row_provincia["id_provincia"] . ' - ' . $row_provincia["nom_prov"] . '</option>';
        }
        $conn->close();
        ?>
    </select>
        </div>
        <div class="form-grupo">
        <label for="">localidad:</label>
        <select name="id_localidad" id="id_localidad" onchange="getbarrio()">
            <option value="">Seleccionar</option>
            </select>
        </div>
        <div class="form-grupo">
        <div class="form-grupo">
    <label for="">Barrio:</label>
    <select name="id_barrio" id="id_barrio" onchange="getcalles()">
        <option value="">Seleccionar</option>
        <!-- Aquí se agregarán las opciones de barrio dinámicamente -->
    </select>
</div>
    <div class="form-grupo">
    <label for="">calles:</label>
    <select name="id_calle" id="id_calle">
        <option value="">Seleccionar</option>
    </select>
    </div>
        
        <div class="form-grupo">
          <label for="">Altura:</label>
          <input type="int" name="altura" id="altura">
        </div>
        
        
        <input type="submit" name="guardar_direcciones.php" id="guardar-vacaciones-medicos" class="guardarM" value="Guardar">

      </form>

  </div>

</div>



<div id="table-empleados" class="table-container">

    <div class="tabla">

        <table class="documentacion">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo de Residencia</th>
                    <th>País</th>
                    <th>Provincia</th>
                    <th>Localidad</th>
                    <th>Población</th>
                    <th>Código Postal</th>
                    <th>Barrio</th>
                    <th>Calle</th>
                    <th>Id Empleado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa</td>
                    <td>Argentina</td>
                    <td>Formosa</td>
                    <td>Formosa</td>
                    <td>606.041</td>
                    <td>3600</td>
                    <td>La Nueva Fsa</td>
                    <td>Mz-60 C-19</td>
                    <td>1</td>
                    <td style="white-space: nowrap;">
                        <button class="editarBtn" onclick="">Editar</button>
                        <button class="eliminarBtn" onclick="">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="crud-buttons">
            <button id="agregar" class="agregarBtn">Agregar</button>
        </div>
    </div>
</div>



<div id="table-pacientes" class="table-container">

    <div class="tabla">

        <table class="documentacion">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo de Residencia</th>
                    <th>País</th>
                    <th>Provincia</th>
                    <th>Localidad</th>
                    <th>Población</th>
                    <th>Código Postal</th>
                    <th>Barrio</th>
                    <th>Calle</th>
                    <th>Id Paciente</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa</td>
                    <td>Argentina</td>
                    <td>Formosa</td>
                    <td>Clorinda</td>
                    <td>606.041</td>
                    <td>3610</td>
                    <td>8 de Diciembre</td>
                    <td>Paraguay 1230</td>
                    <td>1</td>
                    <td style="white-space: nowrap;">
                        <button class="editarBtn" onclick="">Editar</button>
                        <button class="eliminarBtn" onclick="">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="crud-buttons">
            <button id="agregar" class="agregarBtn">Agregar</button>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../functions/direcciones.js"></script>
<script src="../functions/peticiones.js"></script>
</body>
</html>