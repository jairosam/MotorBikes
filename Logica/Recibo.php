<?php

require_once("Venta.php");
$venta = new Venta();
$salida = $venta->generarRecibo($_POST['id_servicio']);
$salida = mysqli_fetch_row($salida);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <script type="text/javascript" src="app.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="icon" href="Imagenes/Icono.png" />
    <title>Recibo</title>
</head>
<body>
    <div>
        <h1 class="tituloRecibo">
            Recibo
        </h1>
    </div>
    <div class="recibo">
        <div class="consultarServicio">
            <h2>Consultar servicio</h2>
            <form method="POST">
                <label class="idServicio">ID Servicio</label></p>
                <input type="number" name="id_servicio" id="id_servicio"></p>
                <button class="btnConsultarServicio">ACEPTAR</button>
            </form>
        </div>
        <div class="imprimirRecibo">
            <h2>Imprimir recibo</h2>
            <label class="lblPlacas">PLACAS DE LA MOTO</label></p>
            <label name="placa" id="placa"><?php echo $salida[1];?></p> 
            <label class="lblIDEmpleado">ID EMPLEADO</label></p>
            <label type="number" name="id_empleado"  id="id_empleado"><?php echo $salida[2];?></p>
            <label class="lblDescripcion">Descripción tecnica del problema</label></p>
            <label type="text" class="descripcion" name="descripcion" id="descripcion"><?php echo $salida[3];?></p>
            <label class="lblFecha">Fecha de entrega</label></p>
            <label type="date" name="fecha" id="fecha"><?php echo $salida[4];?></p>
            <label class="lblPrecio">Precio del arreglo</label></p>
            <label type="number" name="precio" id="precio"><?php echo $salida[5];?></p>
            <button class="btnImprimir">Imprimir</button>
        </div>   
    </div>
</body>
</html>