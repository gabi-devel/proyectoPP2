<?php 

require_once "pruebas/conectionPdo.php";
require_once "dashboard.php";
require_once "fichaPaciente.php";

echo $variable;


/* <script> console.log($variable); </script> */

class comentarios {

    public function commit($idPat) {
        $db = new Connection();
        $consulta2 = "SELECT * FROM coment WHERE paciente_id = $algo";/* INNER JOIN pacientes ON pacientes.id = coment.paciente_id */
        $resultado2 = $db->query($consulta2);
        $datos2 = [];
        if($resultado2->num_rows) {
            while($row = $resultado2->fetch_assoc()) {
                $datos2[] = [
                    'idComent' => $row['id'],
                    'pacienteID' => $row['paciente_id'],/* 
                    'nombre' => $row['nombre'], */
                    'esp' => $row['especialidad'],
                    'com' => $row['comentario'],
                    'fecha' => $row['date'],
                ];
            }
        }
        return $datos2;
    }
}



?>