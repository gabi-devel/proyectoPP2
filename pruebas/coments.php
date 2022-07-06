<?php

require_once "pruebas/models/comentarios.php";

$muestraComments = new comentarios();
$todosComen = $muestraComments->commit($idPat);
?>