<?php

require_once("Transaccion.php");

    class Venta extends Transaccion{
        
        public function __construct(){
            parent::__construct();
        }

        public function disminuirStock($idRepuesto){
            if($this->verificarRepuesto($idRepuesto)){
                $sql = "SELECT stock FROM Repuestos WHERE idRepuesto = '$idRepuesto'";
                $stock = mysqli_query($this->conecta->conexion, $sql);
                $stock = mysqli_fetch_row($stock);
                $stockNuevo = $stock[0] - 1;
                $sql1 = "UPDATE Repuestos SET stock = '$stockNuevo' WHERE idRepuesto = '$idRepuesto'";
                if(mysqli_query($this->conecta->conexion, $sql1)){
                    echo "Stock actualizado";
                    header('Location: ../index.php');
                }else{
                    echo "Error al actualizar el stock";
                }
            }else{
                echo "<h2 align='center'>El repuesto no existe</h2>";
            }
        }

        public function generarRecibo($idServicio){
            $sql = "SELECT * FROM Servicio WHERE idServicio = '$idServicio'";
            $salida = mysqli_query($this->conecta->conexion, $sql);
            if($salida){
                return $salida;
            }else{
                return "Error en la consulta";
            }
            
        }

    }

    if($_POST['dStock'] == '1'){
        $venta = new Venta();
        $venta->disminuirStock($_POST['id_repuesto']);
    }
?>