<?php

require_once("Transaccion.php");

    class Compra extends Transaccion{

        public function __construct(){
            parent::__construct();
        }

        public function verificarStock($idRepuesto){
            $sql = "SELECT stock FROM Repuestos WHERE idRepuesto = '$idRepuesto'";
            $salida = mysqli_query($this->conecta->conexion, $sql);
            $salida = mysqli_fetch_row($salida);
            if($salida[0] > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function crearRepuesto(){
            $idRepuesto = $this->getRepuesto()->getIdentificador();
            $nombre = $this->getRepuesto()->getNombre();
            $stock = $this->getRepuesto()->getStock();
            if(!$this->verificarRepuesto($idRepuesto)){
                $sql = "INSERT INTO Repuestos (idRepuesto, nombre, stock) VALUES ('$idRepuesto', 
                                            '$nombre', '$stock')";
                if(mysqli_query($this->conecta->conexion, $sql)){
                    echo "Repuesto creado";
                    header('Location: ../index.php');
                }else{
                    echo "Error al crear repuesto";
                }
            }else{
                $sql = "SELECT stock FROM Repuestos WHERE idRepuesto = '$idRepuesto'";
                $salida = mysqli_query($this->conecta->conexion, $sql);
                $salida = mysqli_fetch_row($salida);
                $stockNuevo = $salida[0] + $this->getRepuesto()->getStock();
                $sql1 = "UPDATE Repuestos SET stock = '$stockNuevo' WHERE idRepuesto = '$idRepuesto'";
                if(mysqli_query($this->conecta->conexion, $sql1)){
                    echo "Stock Actualizado";
                    header('Location: ../index.php');
                }else{
                    echo "Error actualizando el stock";
                }
            }
        }
    }

    $compra = new Compra();
    $repuesto = new Repuesto();
    
    $repuesto->setIdentificador($_POST['id_repuesto']);
    $repuesto->setNombre($_POST['nombre']);
    $repuesto->setStock($_POST['stock']);

    $compra->setRepuesto($repuesto);
    $compra->crearRepuesto();
?>