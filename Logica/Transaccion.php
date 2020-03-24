<?php

require_once("../Datos/Conexion.php");
require_once("Repuesto.php");

    class Transaccion{

        private $repuesto;

        public $conecta;

        public function __construct(){
            $this->conecta = new Conexion();
            $this->repuesto = new Repuesto();
        }

        public function setRepuesto($repuesto){
            $this->repuesto = $repuesto;
        }

        public function getRepuesto(){
            return $this->repuesto;
        }

        public function verificarRepuesto($idRepuesto){
            $sql = "SELECT idRepuesto FROM Repuestos WHERE idRepuesto = '$idRepuesto'";
            $salida = mysqli_query($this->conecta->conexion, $sql);
            $salida = mysqli_fetch_row($salida);
            if($salida[0] == $idRepuesto){
                return TRUE;
            }else{
                return FALSE;
            }
        }

    }

?>