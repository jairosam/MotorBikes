<?php

require_once("../Datos/Conexion.php");

    class Moto{

        private $placas;
        private $detalle;
        private $estado;
        private $marca;

        public $conecta;
        
        public function __construct(){
            $this->placas = "";
            $this->detalle = "";
            $this->estado = "";
            $this->conecta = new Conexion();
        }

        public function getPlacas(){
            return $this->placas;
        }
    
        public function setPlacas($placas){
            $this->placas = $placas;
        }
    
        public function getDetalle(){
            return $this->detalle;
        }
    
        public function setDetalle($detalle){
            $this->detalle = $detalle;
        }
    
        public function getEstado(){
            return $this->estado;
        }
    
        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function verificarMoto($placa){
            $sql = "SELECT placa FROM Motos WHERE placa = '$placa'";
            $salida = mysqli_query($this->conecta->conexion, $sql);
            $salida = mysqli_fetch_row($salida);
            if($salida[0] == $placa){
                return TRUE;
            }else{
                return FALSE;
            }
        }

    }

?>