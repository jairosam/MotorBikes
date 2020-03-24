<?php

require_once("../Datos/Conexion.php");
require_once("Moto.php");

    class Tecnico{

        private $nombre;
        private $identificacion;

        public $conecta;
        
        public function __construct(){
            $this->nombre = "";
            $this->identificacion = "";
            $this->conecta = new Conexion();
        }

        public function getNombre(){
            return $this->nombre;
        }
    
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    
        public function getIdentificacion(){
            return $this->identificacion;
        }
    
        public function setIdentificacion($identificacion){
            $this->identificacion = $identificacion;
        }

        public function realizarMantenimiento($numServicio, $placa, $descripcion, $fecha, $precio){
            $sql = "INSERT INTO Servicio (idServicio, placa, documentoE, descripcion, fechaEntrega, precio)
            VALUES ('$numServicio', '$placa', '$this->identificacion','$descripcion', '$fecha', '$precio')";
            if(mysqli_query($this->conecta->conexion, $sql)){
                echo "Mantenimiento programado";
                header('Location: ../index.php');
            }else{
                echo "Error al programar el mantenimiento";
            }
        }

        public function verificarTecnico($id){
            $sql = "SELECT documentoE FROM Tecnico WHERE documentoE = '$id'";
            $salida = mysqli_query($this->conecta->conexion, $sql);
            $salida = mysqli_fetch_row($salida);
            if($salida[0] == $id){
                return TRUE;
            }else{
                return FALSE;
            }
        }

    }

    $tecnico = new Tecnico();
    $moto = new Moto();
    if($moto->verificarMoto($_POST['placa'])){
        if($tecnico->verificarTecnico($_POST['id_empleado'])){
            $tecnico->setIdentificacion($_POST['id_empleado']);
            $tecnico->realizarMantenimiento($_POST['id_servicio'],$_POST['placa'],$_POST['descripcion'],
                                            $_POST['fecha'], $_POST['precio']);
        }else{
            echo "<h2 align='center'>El empleado no trabaja en la compañia</h2>";
        }
    }else{
        echo "<h2 align='center'>La motocicleta no está registrada, <br>
        por favor verifique los datos</h2>";
    }
?>