<?php
    class Conexion extends PDO{
        private $tipo_de_base='mysql';
        private $host='localhost';
        private $nombre_de_base='9idgsa';
        private $user='root';
        private $contra='';

        public function __construct(){
            try {
                parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base,$this->user,$this->contra);
                

            } catch (PDOException $error) {
                echo "Ha surgido un error y no se pudo conectar a la base de datos. Detalles: ".$error->getMessage();
            }
        }
    }

?>