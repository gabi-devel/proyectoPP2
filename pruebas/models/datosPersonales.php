<?php

require_once "pruebas/conectionPdo.php";

class datosPersonales {

    public function info_paciente() {
        $db = new Connection();
        $consulta = "SELECT * FROM pacientes WHERE id = 1";
        $resultado = $db->query($consulta);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'identificador' => $row['id'],
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
            /* return $datos; */
        }
        /*  [1] => [
            'identificador' => 1,
            'nombre' => 'Hector'
            ],
            [2] => [
                'identificador' => 2,
                'nombre' => 'Florencia'
            ]
         */
        return $datos;
    }
}


?>