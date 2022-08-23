<?php

require_once "./pruebas/models/datosPersonales.php";

$datoNuevo = new datosPersonales();
$info = $datoNuevo->info_paciente();

?>