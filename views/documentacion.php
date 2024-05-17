
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="documentacion.css">
    
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../functions/documentacion.js"></script>
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
    <h2 class="titulo">DOCUMENTACIÓN</h2>

    <!--NAVEGADOR DE TABLAS-->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicos', event)">Medicos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"  onclick="mostrarTabla('table-empleados',event)">Empleados</a>
    </ul>

    <!--TABLAS-->
    <div id="table-medicos" class="table-container">

        <div class="tabla">

            <table class="documentacion">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>id del Medico</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo de Documento</th>
                        <th>DNI</th>
                        <th>NIF</th>
                        <th>NSS</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                   
                   <?php
                   include '../config/connection.php';
           
                   
                   $sql = "SELECT
                   medicos.id_medico,
                   documentaciones.id_documentacion,
                   documentaciones.dni,
                   documentaciones.nif,
                   documentaciones.nro_seguridad_social,
                   tipos_documentos.id_documento,
                   tipos_documentos.tipo_documento,
                   personas.id_persona,
                   registros.nombres AS medico_nombre,
                   registros.apellidos AS medico_apellido
                   FROM
                   medicos
                   INNER JOIN personas ON medicos.id_persona = personas.id_persona
                   INNER JOIN documentaciones ON personas.id_documentacion = documentaciones.id_documentacion
                   inner join tipos_documentos on documentaciones.id_tipos_documentos = tipos_documentos.id_documento
                   INNER JOIN registros ON personas.id_registro = registros.id_registro";
        
                      $result = $conn->query($sql);
              
                      if ($result === false) {
                        die('Error en la consulta: ' . $conn->error);
                      }
              
                      if ($result->num_rows > 0) {
              
              
                        while ($row = $result->fetch_assoc()) {
              
                          //Registrar los datos 
                          echo "<tr>";
                          echo "<td>" . $row["id_documentacion"] . "</td>";
                          echo "<td>" . $row["id_medico"] . "</td>";
                          echo "<td>" . $row["medico_nombre"] . "</td>";
                          echo "<td>" . $row["medico_apellido"] . "</td>";
                          echo "<td>" . $row["tipo_documento"] . "</td>";
                          echo "<td>" . $row["dni"] . "</td>";
                          echo "<td>" . $row["nif"] . "</td>";
                          echo "<td>" . $row["nro_seguridad_social"] . "</td>";
                          echo '<td style="white-space: nowrap;">
                          <button data-id="' . $row["id_documentacion"] . '" class="btn editarBtn btn editarM">Editar</button>
                          <a href="../config/eliminar_documentacion.php?id=' . $row["id_documentacion"] . '" class="eliminarBtn btn eliminarM" onclick="confirmacion(event)">Eliminar</a>
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


                <!-- Formulario editar -->
                        
 <div id="formularioEditarContainerM" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditarM" class="cerrar-formulario">&times;</span>
        <h2>Editar documentacion Medico</h2>
        <form class="medico-form" action="../config/editar_documentacion.php" method="post">
            <input type="hidden" name="id_documentacion" id="id_documentacion" value="">
            <div class="form-grupo">
        <label for="">id y nombre del medico:</label>
          <select name="id_medico" id="id_medico">
        <?php
        include '../config/connection.php';
        echo '<option value=""></option>';
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
          <label for="">N° NIF:</label>
          <input type="int" name="nif" id="nif" placeholder="inserte solo numeros">
        </div>
        <div class="form-grupo">
          <label for="">N° NSS:</label>
          <input type="int" name="nss" id="nss" placeholder="inserte solo numeros">
        </div>
      </div>

        <input type="submit" name="editar_vac_M" id="editar_vac_M" class="editar" value="editar">

      </form>

    </div>
    

  </div>



    <div id="table-empleados" class="table-container">

        <div class="tabla">

            <table class="documentacion">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>id del empleado</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo de Documento</th>
                        <th>DNI</th>
                        <th>NIF</th>
                        <th>NSS</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                   
                   <?php
                   include '../config/connection.php';
           
                   
                 $sql = "SELECT
                empleados.id_empleado,
                documentaciones.id_documentacion,
                documentaciones.dni,
                documentaciones.nif,
                documentaciones.nro_seguridad_social,
                tipos_documentos.id_documento,
                tipos_documentos.tipo_documento,
                personas.id_persona,
                registros.nombres AS empleado_nombre,
                registros.apellidos AS empleado_apellido
                FROM
                empleados
                INNER JOIN personas ON empleados.id_persona = personas.id_persona
                INNER JOIN documentaciones ON personas.id_documentacion = documentaciones.id_documentacion
                inner join tipos_documentos on documentaciones.id_tipos_documentos = tipos_documentos.id_documento
                INNER JOIN registros ON personas.id_registro = registros.id_registro";
     
                   $result = $conn->query($sql);
           
                   if ($result === false) {
                     die('Error en la consulta: ' . $conn->error);
                   }
           
                   if ($result->num_rows > 0) {
           
           
                     while ($row = $result->fetch_assoc()) {
           
                       //Registrar los datos 
                       echo "<tr>";
                       echo "<td>" . $row["id_documentacion"] . "</td>";
                       echo "<td>" . $row["id_empleado"] . "</td>";
                       echo "<td>" . $row["empleado_nombre"] . "</td>";
                       echo "<td>" . $row["empleado_apellido"] . "</td>";
                       echo "<td>" . $row["tipo_documento"] . "</td>";
                       echo "<td>" . $row["dni"] . "</td>";
                       echo "<td>" . $row["nif"] . "</td>";
                       echo "<td>" . $row["nro_seguridad_social"] . "</td>";
                       echo '<td style="white-space: nowrap;">
                       <button data-id="' . $row["id_documentacion"] . '" class="btn editarBtn btn editarM">Editar</button>
                       <a href="../config/eliminar_documentacion.php?id=' . $row["id_documentacion"] . '" class="eliminarBtn btn eliminarM" onclick="confirmacion(event)">Eliminar</a>
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


                <!-- Formulario editar -->
                        
 <div id="formularioEditarContainerE" class="formulario-container">
    <div class="formulario">
        <span id="cerrareditarE" class="cerrar-formulario">&times;</span>
        <h2>Editar documentacion</h2>
        <form class="medico-form" action="../config/editar_documentacion.php" method="post">
            <input type="hidden" name="id_documentacion" id="id_documentacion" value="">
            <div class="form-grupo">
        <label for="">id y nombre del empleado:</label>
          <select name="id_empleado" id="id_empleado">
        <?php
        include '../config/connection.php';
        echo '<option value=""></option>';
        $sql_empleados = "SELECT empleados.id_empleado, registros.nombres, registros.apellidos
        FROM empleados 
        INNER JOIN personas ON empleados.id_persona = personas.id_persona
        INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result_empleados = $conn->query($sql_empleados);

        if ($result_empleados === false) {
            die('Error en la consulta: ' . $conn->error);
        }

        while ($row_medico = $result_empleados->fetch_assoc()) {
            echo '<option value="' . $row_empleado["id_empleado"] . '">'
                . $row_empleado["id_empleado"] . ' - ' . $row_empleado["nombres"] . ' ' . $row_empleado["apellidos"] . '</option>';
        }

        $conn->close();
        ?>
    </select>
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
          <label for="">N° NIF:</label>
          <input type="int" name="nif" id="nif" placeholder="inserte solo numeros">
        </div>
        <div class="form-grupo">
          <label for="">N° NSS:</label>
          <input type="int" name="nss" id="nss" placeholder="inserte solo numeros">
        </div>
      </div>
      <input type="submit" name="editar_vac_emp" id="editar_vac_emp" class="editarE" value="editar">

</form>

</div>

</div>

</body>

</html>