<?php require 'config.php'; 

$variable = $_GET['id'];

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                        <h3>Historial</h3>
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