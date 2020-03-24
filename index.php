<!DOCTYPE html>
<meta charset="utf8">
<html>
<head>
    <link rel="stylesheet" href="Logica/Estilos/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <script type="text/javascript" src="app.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="icon" href="Imagenes/Icono.png" />
    <title>Motorbikes</title>
</head>
<body>
<div class="cabecera">
    <header>
        <div class="titulo">
            MotorBikes
        </div>
        <nav>
            <ul>
                <li><a href="#">Servicio al cliente</a></li>
                <li><a href="#">Servicio técnico</a></li>
                <li><a href="#">Repuestos</a></li>
                <li><a href="Logica/Repuesto.php?valida=1">Inventario</a></li>
                <li><a href="#">Información</a></li>
            </ul>
        </nav>
    </header>
</div>
    <section class="contenido">
        <div>
            <h1>
                Servicio al cliente
            </h1>
        </div>
        <div class="servicioCliente">
            <div class="registrarCliente">
            <h2>Registrar cliente</h2> 
                <form method="POST" action="Logica/Cliente.php">
                    <label>Nombre</label></p>
                    <input type="text" name="nombre" id="nombre"></p>
                    <label>Cédula</label></p>
                    <input type="number" name="cedula" id="cedula"></p>
                    <input type="hidden" value="1" name="verificarCliente" id="verificarCliente"></p>
                    <button id="Register" name="Register" value="1" class="btnRegistrarCliente">Registrar cliente</button>
                </form>
            </div>
            <div class="infoCliente">
                <h2>¡IMPORTANTE!</h2>
                <center><img src="Imagenes/infoCliente.png"></center>
                <p>Para una mejor experiencia y por la seguridad de su moto registrese, si ya ha utilizado nuestros servicios y esta registrado por favor omita este paso.</p>
                <p>Si ya finalizó el registro o ya se encuentra registrado, por favor de click en el botón registrar moto.</p>
            </div>
            <div class="registrarMoto">
                <h2>Registrar moto</h2> 
                <form method="POST" action="Logica/Cliente.php">
                    <label>PLACAS</label></p>
                    <input type="text" name="placa" id="placa"></p>
                    <label class="documentoDueno"> NÚMERO DE DOCUMENTO DEL DUEÑO</label></p>
                    <input type="number" name="cedulaMoto" id="cedulaMoto"></p>
                    <input type="hidden" value="2" name="verificarMoto" id="verificarMoto"></p>
                    <button class="botonRegistrarMoto">Registrar moto</button>
                </form>
            </div>
            <img class="imagenMotociclista" src="Imagenes/motociclista.png">
        </div>
        <div>
            <h1 class="tituloServicioTec">
                Servicio técnico
            </h1>
        </div>
        <div class="servicioTecnico">
            <img class="imagenTecnico" src="Imagenes/tecnico.png">
            <div class="infoServicio">
                <h2>¡IMPORTANTE!</h2>
                <center>
                    <img src="Imagenes/infoServicio.png">
                    <p>No olvides generar el recibo del servicio técnico</p>
                </center>
            </div>
            <div class="registrarServicio">
                <h2>Servicio técnico</h2> 
                <form method="POST" action="Logica/Tecnico.php">
                    <label class="lblIDServicio">ID SERVICIO</label></p>
                    <input type="number" name="id_servicio" id="id_servicio"></p>
                    <label class="lblPlacas">PLACAS DE LA MOTO</label></p>
                    <input type="text" name="placa" id="placa"></p>
                    <label class="lblIDEmpleado">ID EMPLEADO</label></p>
                    <input type="number" name="id_empleado"  id="id_empleado"></p>
                    <label class="lblDescripcion">Descripción tecnica del problema</label></p>
                    <input type="text" class="descripcion" name="descripcion" id="descripcion"></p>
                    <label class="lblFecha">Fecha de entrega</label></p>
                    <input type="date" name="fecha" id="fecha"></p>
                    <label class="lblPrecio">Precio del arreglo</label></p>
                    <input type="number" name="precio" id="precio"></p>
                    <button class="btnRegistrarServicio">Registrar servicio</button>
                    <a href="Logica/Recibo.php" class="btnImprimirRecibo">Imprimir recibo</a>
                </form>
            </div>
        </div>
        <div>
            <h1 class="tituloRepuestos">
                Respuestos
            </h1>
        </div>
        <div class="repuestos">
            <img class="imagenLlanta" src="Imagenes/llanta.png">
            <div class="aumentarStock">
                <h2>Registrar repuesto</h2>
                <form method="POST" action="Logica/Compra.php">
                    <label class="idRepuesto">ID Repuesto</label></p>
                    <input type="number" name="id_repuesto" id="id_repuesto"></p>
                    <label>Nombre</label></p>
                    <input type="text" name="nombre" id="nombre"></p>
                    <label>Stock</label></p>
                    <input type="number" name="stock" id="stock"></p>
                    <button href="#" class="btnAumentarStock">Aumentar stock</button>
                </form> 
                </div>
            <div class="disminuirStock">
                <h2>Utilizar repuesto</h2>
                <form method="POST" action="Logica/Venta.php">
                    <label class="idRepuesto">ID Repuesto</label></p>
                    <input type="number" name="id_repuesto" id="id_repuesto"></p>
                    <input type="hidden" name="dStock" id="dStock" value="1">
                    <button class="btnDisminuirStock">ACEPTAR</button>
                </form>
            </div>
        </div>
       <div class="info">
           <h1>
               Desarrollado por
           </h1>
            <h2>
                Jairo Buitrago Villalobos <b>Código:</b> 20171020002 </p>
                Miguel Angel Rodriguez Mendoza <b>Código:</b> 20171020038</p>
                Luz Liliana Herrera Polo <b>Código:</b> 20171020019</p>
            </h2>
       </div>
    </section>
</body>
</html>