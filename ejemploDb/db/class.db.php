<?php 
class Db{
	private $server="localhost";
	private $user="root";
	private $pass="";
	private $db="peliculas";
	private $con;

	public function __construct(){
		$this->conectar();
	}

	private function conectar(){
		$c=mysqli_connect($this->server,$this->user,$this->pass,$this->db);
		if(mysqli_connect_errno()){
			echo "Error de conexión con la Base de dados.";
			exit;
		}else{
			$this->con=$c;
		}
	}
	public function insertar($tabla,$datos){
		$consulta="insert into $tabla values($datos)";
			$result=$this->con->query($consulta);
			if($result){
				echo '<div class="alert alert-success" role="alert"> Datos Insertados de forma correcta. </div>';
			}else{
				echo '<div class="alert alert-danger" role="alert">
						  Error al Insertar los datos.
						</div>';
				}
	}
	public function buscar($campos,$tabla,$condicion){
		$consulta="select $campos from $tabla where $condicion";
			$result=$this->con->query($consulta);
				return $result;
	}

}
?>