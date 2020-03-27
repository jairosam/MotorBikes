<?php

	class Conexion{

		private $user;
		private $pass;
		private $server;
		private $dbName;

		public $conexion;

        public function __construct(){
			$this->user = "root";
			$this->pass = "passtoor";
			$this->server = "localhost";
			$this->dbName = "MotorBikes";

			$this->conexion = mysqli_connect($this->server, $this->user, $this->pass,$this->dbName) 
											or die ("No se ha podido realizar la conexión");

        }

	}

	$conecta = new Conexion();

?>
