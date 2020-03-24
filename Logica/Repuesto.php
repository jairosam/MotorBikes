<?php

require_once("../Datos/Conexion.php");

    class Repuesto{

        private $identificador;
        private $nombre;
        private $stock;

        public $conecta;

        public function __construct(){
            $this->identificador = "";
            $this->nombre = "";
            $this->stock = 0;
            $this->conecta = new Conexion();
        }

        public function getIdentificador(){
            return $this->identificador;
        }
    
        public function setIdentificador($identificador){
            $this->identificador = $identificador;
        }
    
        public function getNombre(){
            return $this->nombre;
        }
    
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    
        public function getStock(){
            return $this->stock;
        }
    
        public function setStock($stock){
            $this->stock = $stock;
        }

        public function consultar(){
            $sql = "SELECT * FROM Repuestos";
            $retorno = mysqli_query($this->conecta->conexion, $sql);
            return $retorno;
        }

    }

    $repuesto = new Repuesto();
    if($_GET['valida'] == 1){
        $consulta = $repuesto->consultar();    
?>

<!DOCTYPE html>
<html>
    <meta charset="utf8">
    <head>
        <link rel="stylesheet" href="Estilos/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <script type="text/javascript" src="app.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <link rel="icon" href="Imagenes/Icono.png" />
        <title>Repuestos</title>
    </head>
    <body>
    <div>
        <h1 class="tituloInventario">
            Inventario
        </h1>
    </div>
    <div class="inventario">
        <div align="center" class="repuestosDisponibles">
            <h2>Repuestos disponibles</h2> 
            <table align="center" class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($impresion = mysqli_fetch_row($consulta)){?>
                    <tr>
                        <th scope="col"><?php echo $impresion[0];?></th>
                        <th scope="col"><?php echo $impresion[1];?></th>
                        <th scope="col"><?php echo $impresion[2];?></th>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
                    <?php }?>