<?php

    class Connection extends Mysqli {
        function __construct() {
            parent::__construct('localhost', 'root', '', 'proyecto');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'DB conectada' : die('Error al conectarse a la base de datos');
        }
    }

?>