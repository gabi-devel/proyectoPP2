<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>


<section id="buscar-insertar">    

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="container_buscar-agregar" id="myForm">
    <div class="buscar">
        <label>Buscar paciente: <input type="text" name="nombrePaciente"></label>
        <button type="submit" name="submit" value="Buscar">Buscar</button>
        <button type="submit" name="clear" value="clear" onclick="myFunction()">Borrar</button>
    </div>
    <button type="button" name="agregar" value="agregar" class="agregarPaciente" data-bs-toggle="modal" data-bs-target="#agregarPaciente">Agregar Paciente</button>
<script>
object.onclick = function(){
    var form = document.getElementById("myForm");
form.reset();
};

</script>
</form><br><br>



<?php
if (isset($_POST['nombrePaciente'])){
$nameSQL = $_POST['nombrePaciente'];

$encontrarUser = "SELECT * FROM pacientes WHERE nombre ='$nameSQL'";
if (($result = mysqli_query($conexion, $encontrarUser)) === false) {
    die(mysqli_error($conexion));
};

echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-light"> 
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
      </tr>';

if ($resultadoBusqueda = $conexion->query($encontrarUser)) {
    while ($row = $resultadoBusqueda->fetch_assoc()) {
        $field1name = $row["nombre"];
        $field2name = $row["apellido"];
        $field3name = $row["dni"];
        $field4name = $row["fecha_nac"];
        $field5name = $row["sexo"]; 
        /* $field6name = "Link"; 
        $field7name = "---"; */
        $field8name = $row["tel"]; 
        $field9name = $row["direccion"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>Link</td> 
                  <td>Cobertura</td> 
                  <td>'.$field8name.'</td> 
                  <td>'.$field9name.'</td> 
              </tr>';
    }
    $result->free();
} 
}

?>

<!-- Modal -->
<div class="modal fade" id="agregarPaciente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label class="control-label" for="date">Fecha de Nacimiento</label>
                <input type="text" class="form-control" id="date" name="date" placeholder="Seleccionar fecha">
            </div>
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label class="form-label">Historia Clinica</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label class="form-label">Cobertura</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label class="form-label">Direccion</label>
                <input type="text" class="form-control" id="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>  
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

</section>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> <!-- time picker -->
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

</body>
</html>