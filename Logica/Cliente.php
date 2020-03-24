<?php

require_once("../Datos/Conexion.php");
require_once("Moto.php");

    class Cliente{

        private $nombre;
        private $identificacion;
        private $moto;

        public $conecta;

        public function __construct(){
            $this->nombre = "";
            $this->identificacion = "";
            $this->conecta = new Conexion();
            $this->moto = new Moto();
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
    
        public function getMoto(){
            return $this->moto;
        }
    
        public function setMoto($moto){
            $this->moto = $moto;
        }

        public function crearCliente(){
            $sql = "INSERT INTO Cliente (documento, nombre) VALUES ('$this->identificacion', '$this->nombre')";
            if(mysqli_query($this->conecta->conexion, $sql)){
                echo "Datos registrados con exito";
                header('Location: ../index.php');
            }else{
                echo "Error en el registro";
            }
        }

        public function verificarCliente($cliente){
            $sql = "SELECT documento FROM Cliente WHERE documento = '$cliente'";
            $salida = mysqli_query($this->conecta->conexion, $sql);
            $salida = mysqli_fetch_row($salida);
            if($salida[0] == $cliente){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function registrarMoto(){
            $placa = $this->getMoto()->getPlacas();
            $sql = "INSERT INTO Motos (placa, documento) VALUES ('$placa', '$this->identificacion')";
            if(mysqli_query($this->conecta->conexion, $sql)){
                echo "Moto registrada";
                header('Location: ../index.php');
            }else{
                echo "Error en el registro de la moto";
            }
        }

    }
//---------Registra y verifica clientes---------
    $cliente = new Cliente();

    if($_POST['verificarCliente'] == '1'){
        if($_POST['Register'] == '1'){
            $id = $_POST['cedula'];
            if(!$cliente->verificarCliente($id)){
                $cliente->setNombre($_POST['nombre']);
                $cliente->setIdentificacion($_POST['cedula']);
                $cliente->crearCliente();
            }else{
                echo "<h2 align='center'>El usuario ya existe, 
                verifique sus datos y vuelva a intentarlo</h2>";         
            }
        }else{
            echo "Error en la transferencia de datos";
        }
    }

//---------------Registra motos------------------

    if($_POST['verificarMoto'] == '2'){
        if($cliente->verificarCliente($_POST['cedulaMoto'])){
            $moto = new Moto();
            if(!$moto->verificarMoto($_POST['placa'])){
                $moto->setPlacas($_POST['placa']);    
                $cliente->setMoto($moto);
                $cliente->setIdentificacion($_POST['cedulaMoto']);
                $cliente->registrarMoto();
            }else{
                echo "<h2 align='center'>La moto ya se encuentra registrada, <br>por favor dirigase a la
                sección de solicitud de servicios</h2>";
            } 
        }else{
            echo "<h2 align='center'>El usuario no existe,<br> Por favor cree uno</h2>";
        }
    }
?>