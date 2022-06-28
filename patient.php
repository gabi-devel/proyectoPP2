<?php require 'config.php'; 

$variable = $_POST['id'];

$idPaciente = "SELECT nombre, apellido FROM pacientes WHERE id = '$variable'";
if (($result2 = mysqli_query($conexion, $idPaciente)) === false) {
    die(mysqli_error($conexion));
};

$result =  mysqli_query($conexion, $idPaciente);
$row = mysqli_fetch_assoc($result);

if ($result = $conexion -> query($idPaciente)) {
    while ($row = $result -> fetch_row()) {
        $paciente = $row[0].' '.$row[1];
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
                <span>Informacion del paciente</span>
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
                        <div class="comentario">Tomografia computalizada. Todo Correcto  <br>
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