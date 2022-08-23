<?php 
    session_start();
  
    if(!$_SESSION['id']) header('location:index.php');

$conexion = mysqli_connect("localhost", "root", "", "proyecto"); 

$variable = $_POST['id'];
$idC;

$consulta = "SELECT * FROM pacientes WHERE id = '$variable'";
        $resultado = $conexion->query($consulta);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    /* 'identificador' => $row['id'], */
                    'nombre' => $row['nombre'],
                    'apell' => $row['apellido'],
                    'nombre' => $row['nombre'],
                    'dni' => $row['dni'],
                    'nac' => $row['fecha_nac'],
                    's' => $row['sexo'],
                    'tel' => $row['tel'],
                    'dir' => $row['direccion'],
                ];
            }
        }

$consulta2 = "SELECT * FROM coment WHERE paciente_id = '$variable'";
    $resultado2 = $conexion->query($consulta2);
    $datos2 = [];
    if($resultado2->num_rows) {
        while($row = $resultado2->fetch_assoc()) {
            $datos2[] = [/* 
                'idComent' => $row['id'],
                'pacienteID' => $row['paciente_id'],
                'nombre' => $row['nombre'], */
                'esp' => $row['especialidad'],
                'com' => $row['comentario'],
                'fecha' => $row['date'],
            ];
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Historia Clinica</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="bootstrap/node_modules\bootstrap\dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="proyectoPP2/style.css">
        <link rel="stylesheet" href="styleLoginReg.css">
    </head>
    <body class="sb-nav-fixed">
        <!-- Barra superior  -->
        <nav class="sb-topnav navbar navbar-expand colorPrincipal">
            <a class="navbar-brand ps-3 text-dark" href="index.html">Logo</a>
            <!-- Toggle --> <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <h1 class="navbar-brand ms-auto me-md-3">Registro Medico <!-- echo ucfirst($_SESSION['nombre']); ?>--></h1>
            <a href="logout.php?logout=true" class="ms-auto text-dark">Cerrar sesion</a>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>    
        </nav>

        <!-- Barra lateral -->          
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

            <!-- Buscador -->                            
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="myForm">
                <div class="form-inline sb-sidenav-menu-heading">
                    <label class="mb-3">DNI paciente: </label>
                    <div class="input-group bg-light buscar" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" placeholder="Search" type="number" name="dniPaciente">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-grid gap-3 d-md-block mt-3">
                        <button class="col-5" type="submit" name="submit" value="Buscar">Buscar</button>
                        <button class="col-5" type="submit" name="clear" value="clear" onclick="myFunction()" id="clear">Borrar</button>
                    </div>
                </div>
                <div class="sb-sidenav-menu-heading">Acciones</div>
                <button class="mx-3" type="button" name="agregar" value="agregar" id="agregarPaciente">Agregar Paciente</button>
            </form>               

            <!-- Final Barra lateral -->             
                    </div>
                </div>
            </nav>
        </div>

        <!-- Página: Ficha Paciente -->
        <div id="layoutSidenav_content">
            <div class=" container-fluid px-4">
                <!-- Falta que aparezca nombre y apellido de Paciente -->
                <h2 class="mt-4"> Nombre: 
                <?php
                    foreach ($datos2 as $datoPorColumna) { // o while
                        /* echo '<p><data value="'.$datoPorColumna['identificador'].'">'.$datoPorColumna['nombre']." ".$datoPorColumna['apell'].'</data></p>'; */
                    }
                ?>
                </h2>

                <!-- 2 columnas: Datos personales -->
                <div class="row">
                    <!-- Datos personales -->
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                        Datos personales - <?php 
                                                        $variableSinBarra = substr($variable,0,-1);
                                                        echo 'id '.$variableSinBarra;
                                                        ?> 
                            </div>
                            <?php
                                foreach ($datos as $datoPorColumna) { // o while
                                    foreach ($datoPorColumna as $datito){
                                        echo '<p>'.$datito.'</p>';
                                    }
                                }
                            ?>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                    <!-- Otros datos -->
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Otros datos
                            </div>
                            <p class="mb-5"></p>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                </div>
                <!-- Comentarios -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Comentarios
                    </div>
                    <?php
                        foreach ($datos2 as $datoPorColumna) { // o while
                            echo '<div class="border">';
                                foreach ($datoPorColumna as $datito){
                                    echo '<p>'.$datito.'</p>';
                                }
                            echo '</div>';
                        }
                    ?>
                </div>

                <!-- The best Table -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010/10/14</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008/10/16</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>43</td>
                                    <td>2012/12/18</td>
                                    <td>$313,500</td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>19</td>
                                    <td>2010/03/17</td>
                                    <td>$385,750</td>
                                </tr>
                                <tr>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>66</td>
                                    <td>2012/11/27</td>
                                    <td>$198,500</td>
                                </tr>
                                <tr>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>64</td>
                                    <td>2010/06/09</td>
                                    <td>$725,000</td>
                                </tr>
                                <tr>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>59</td>
                                    <td>2009/04/10</td>
                                    <td>$237,500</td>
                                </tr>
                                <tr>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>41</td>
                                    <td>2012/10/13</td>
                                    <td>$132,000</td>
                                </tr>
                                <tr>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>35</td>
                                    <td>2012/09/26</td>
                                    <td>$217,500</td>
                                </tr>
                                <tr>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>30</td>
                                    <td>2011/09/03</td>
                                    <td>$345,000</td>
                                </tr>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>40</td>
                                    <td>2009/06/25</td>
                                    <td>$675,000</td>
                                </tr>
                                <tr>
                                    <td>Vivian Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>San Francisco</td>
                                    <td>62</td>
                                    <td>2009/02/14</td>
                                    <td>$452,500</td>
                                </tr>
                                <tr>
                                    <td>Timothy Mooney</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>37</td>
                                    <td>2008/12/11</td>
                                    <td>$136,200</td>
                                </tr>
                                <tr>
                                    <td>Jackson Bradshaw</td>
                                    <td>Director</td>
                                    <td>New York</td>
                                    <td>65</td>
                                    <td>2008/09/26</td>
                                    <td>$645,750</td>
                                </tr>
                                <tr>
                                    <td>Olivia Liang</td>
                                    <td>Support Engineer</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2011/02/03</td>
                                    <td>$234,500</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>38</td>
                                    <td>2011/05/03</td>
                                    <td>$163,500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-1"><hr>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>

                </div>
            </main>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
