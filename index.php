<<<<<<< HEAD
<?php
session_start(); /**/
require_once('config.php');
 
if(isset($_POST['submit']))/**/ {
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
 
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$sql = "select * from users where email = :email ";
			$handle = $pdo->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0) {
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['password'])) {
					unset($getRow['password']);
					$_SESSION = $getRow;
					header('location:dashboard.php');
					exit();
				}
				else {
					$errors[] = "Error en  Email o Password";
				}
			}
			else {
				$errors[] = "Error Email o Password";
			}
			
		}
		else {
			$errors[] = "Email no valido";	
		}
	}
	else {
		$errors[] = "Email y Password son requeridos";	
	}
} 
/* header('location:dashboard.php'); */
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-image: url(css/fondo3.jpg); background-size:cover;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <?php
                                        if (isset($errors) && count($errors) > 0) {
                                            foreach ($errors as $error_msg) {
                                                echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                                            }
                                        }
                                    ?>
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Registrese!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

<!-- Footer -->
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
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
        </div>

        <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
=======
<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Buscar - Borrar -->
    <section id="search_clear">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="container_buscar-agregar" id="myForm">
            <div class="buscar">
                <label>DNI paciente: <input type="text" name="dniPaciente"></label>
                <button type="submit" name="submit" value="Buscar">Buscar</button>
                <button type="submit" name="clear" value="clear" onclick="myFunction()" id="clear">Borrar</button>
            </div>
            <button type="button" name="agregar" value="agregar" id="agregarPaciente">Agregar Paciente</button>
        </form><br><br>
        <script>
        document.getElementById("clear").onclick = function() {
            document.getElementById("myForm").reset();
        };

        let add = document.getElementById("agregarPaciente");

        function cambiar() {
            document.getElementById("agregarPaciente_Form").setAttribute("method", "POST");
        }
        add.onclick = cambiar;
        </script>

        <script>
        /* Prueba para q no se siga enviando datos vacios a MySQL */
        document.getElementById("submit").onclick = function() {
            document.getElementById("agregarPaciente_Form").removeAttribute("method");
        };
        </script>

        <!-- Tabla Paciente -->
        <?php 
if(isset($_POST['dniPaciente'])) {
    $dni = $_POST['dniPaciente'];
    $encontrarUser = "SELECT * FROM pacientes WHERE dni ='$dni'";
    $result1 = mysqli_query($conexion, $encontrarUser) or die("Problemas en el select: ".mysqli_error($conexion));

    if (isset($dni)){
        while ($dato=mysqli_fetch_array($result1)) { 
            echo 
                '<table border="0" cellspacing="2" cellpadding="2" class="table table-light"> 
                    <tr> 
                        <td> <font face="Arial">Nombre</font> </td> 
                        <td> <font face="Arial">Apellido</font> </td> 
                        <td> <font face="Arial">DNI</font> </td> 
                        <td> <font face="Arial">Fecha de Nacimiento</font> </td> 
                        <td> <font face="Arial">Sexo</font> </td> 
                        <td> <font face="Arial">Historia clinica</font> </td> 
                        <td> <font face="Arial">Cobertura</font> </td> 
                        <td> <font face="Arial">Telefono</font> </td> 
                        <td> <font face="Arial">Direccion</font> </td> 
                    </tr>
                    <tr>
                        <td>'.$dato["nombre"].'</td> 
                        <td>'.$dato["apellido"].'</td> 
                        <td>'.$dato["dni"].'</td> 
                        <td>'.$dato["fecha_nac"].'</td> 
                        <td>'.$dato["sexo"].'</td> 
                        <td><form action="http://localhost/proyectoPP2/patient.php" method="post">
                            <input type="hidden" name="id" value='.$dato["id"].'/>
                            <input type="submit" value="Info"/>
                            </form></td>                         
                        <td>Cobertura</td> 
                        <td>'.$dato["tel"].'</td> 
                        <td>'.$dato["direccion"].'</td>
                    </tr>
                    </table>';
                    
                }   
    $result1->free();
    } 
} 
?>
    </section>

    <!-- Formulario: Agregar -->
    <nav id="add__container">
        <div class="add__div">
            <div class="add__item">
                <p class="add__title" id="home-page">Página principal</p>
                <div id="add">
                    <form role="form" action="index.php" id="agregarPaciente_Form">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="" name="surname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">DNI</label>
                            <input type="text" class="form-control" name="newDNI">
                        </div>
                        <div class="mb-3">
                            <label class="control-label" for="date">Fecha de Nacimiento</label>
                            <input type="text" class="form-control" id="date" name="date"
                                placeholder="Seleccionar fecha">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sexo</label>
                            <input type="text" class="form-control" name="newGender">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="newTel">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion</label>
                            <input type="text" class="form-control" name="newAddress">
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary" name="submit"
                            value="Submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Javascript para el Modal -->
    <script>
    const botonAgregar = document.querySelector('#agregarPaciente');
    const agregarDiv = document.querySelector('.add__div');
    const modalAparece = () => {
        agregarDiv.classList.toggle('active');
    }
    botonAgregar.addEventListener('click', modalAparece);
    </script>

    <!-- Insertar datos del Form a MySQL -->
    <?php  
if(isset($_POST['name'])) { 
    $fname = $_POST['name'];
    $nAp = $_POST['surname'];
    $nD = $_POST['newDNI'];
    $ndate = $_POST['date'];
    $nnewGender = $_POST['newGender'];
    $nnewTel = $_POST['newTel'];
    $nnewAddress = $_POST['newAddress'];

    $sql = "INSERT INTO pacientes (nombre, apellido, dni, fecha_nac, sexo, tel, direccion) VALUES ('".$fname."', '".$nAp."', '".$nD."', '".$ndate."', '".$nnewGender."', '".$nnewTel."', '".$nnewAddress."')";

    $results = $conexion->query($sql); 
} 
mysqli_close($conexion);   
?>

    <!-- date picker -->
    <script type="text/javascript" src="node_modules\jquery\dist\jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap\datepicker\bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="bootstrap\datepicker\bootstrap-datepicker3.css" />
    <script>
    $(document).ready(function() {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
    </script>


</body>

</html>
>>>>>>> 27e54f204d2510178edd696480df3d420d7836ad
