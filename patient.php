<?php require 'config.php';

$variable = $_POST['id'];

$idPaciente = "SELECT nombre, apellido FROM pacientes WHERE id = '$variable'";
if (($result2 = mysqli_query($conexion, $idPaciente)) === false) {
    die(mysqli_error($conexion));
};

$result =  mysqli_query($conexion, $idPaciente);
$row = mysqli_fetch_assoc($result);

if ($result = $conexion->query($idPaciente)) {
    while ($row = $result->fetch_row()) {
        $paciente = $row[0] . ' ' . $row[1];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/node_modules\bootstrap\dist\css\bootstrap.min.css">
    <script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>

    <link href="patient.css" rel="stylesheet" type="text/css">
    <title>Historia Clinica</title>
</head>

<body>
    <div class="mainContainer">
        <div class="generalInfo">
            <div class="img-namePatient">
                <img src="./assets/userDefault.svg" class="imgPatient" />
                <h4><?php echo $paciente; ?></h4>
            </div>
            <div class="generalInfoPatient">
                <nav>
                    <fieldset>
                        <legend>
                            <h5>Informacion del paciente</h5>
                        </legend>

                        <div class="infoPaciente">
                            <div>
                                <label for="fecha">Fecha de Nacimiento:</label>
                                <span>09/01/1992</span>
                            </div>
                            <div>
                                <label for="direccion">Dirección:</label>
                                <span>Paraná 593</span>
                            </div>
                        </div>

                        <div class="infoPaciente">
                            <div>
                                <label for="tel">Teléfono:</label>
                                <span> 33364528836 </span>
                            </div>
                            <div>
                                <label for="sexo">Sexo:</label>
                                <span> Femenino </span>
                            </div>
                        </div>

                        <div class="infoPaciente">
                            <div>
                            <label for="obra_social">Obra Social:</label>
                            <span> OSFATLYF </span>
                            </div>
                            
                            <div>
                            <label for="n_afiliado">N° de afiliado:</label>
                            <span> 02545664/001 </span>
                            </div>
                        </div>

                        <div class="infoPaciente">
                            <div>
                            <label for="tel_emerg">Teléfono de emergencia:</label>
                            <span> 33645554564 </span>
                            </div>

                            <div>
                            <label for="alergia">Alergico: </label>
                            <span>-</span>
                            </div>
                        </div>

                        <div class="infoPaciente">
                            <div>
                            <label for="g_sangre">Grupo Sanguineo: </label>
                            <span> 0 </span>
                            </div>

                            <div>
                            <label for="rh">RH:</label>
                            <span> Positivo </span>
                            </div>
                        </div>

                    </fieldset>
                </nav>

            </div>
        </div>
        <div class="medicalInfo">
            <div class="medicalInfoTabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item antecede-tab" role="presentation">
                        <button class="nav-link active" id="antecedentes-tab" data-bs-toggle="tab" data-bs-target="#Antecedentes" type="button" role="tab" aria-controls="Antecedentes" aria-selected="true">Antecedentes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="historial-tab" data-bs-toggle="tab" data-bs-target="#Historial" type="button" role="tab" aria-controls="Historial" aria-selected="false">Historial</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="lab-tab" data-bs-toggle="tab" data-bs-target="#Lab" type="button" role="tab" aria-controls="Lab" aria-selected="false">Lab</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Antecedentes" role="tabpanel" aria-labelledby="antecedentes-tab">
                        <textarea class="form-control" id="antecedentes" placeholder="Antecedentes"></textarea>
                    </div>
                    <div class="tab-pane fade" id="Historial" role="tabpanel" aria-labelledby="historial-tab">
                        <div class="comentario">Tomografia computalizada. Todo Correcto <br>
                            Otro renglon con info</div>
                        <div class="comentario">Tomografia computalizada 2. Todo Correcto</div>
                        <div class="comentario">Tomografia computalizada 3. Todo Correcto</div>
                        <div class="buttonContainer">
                            <button type="button" class="btn btn-primary">Agregar Comentario</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Lab" role="tabpanel" aria-labelledby="lab-tab">Laboratorio</div>
                </div>
            </div>

        </div>

    </div>
    </div>


</body>

</html>