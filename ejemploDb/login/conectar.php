<?php 
session_start();
require_once("../db/class.db.php");

	$con=new Db();

	$user=$_POST["usuario"];
	$pass=$_POST["password"];

	$result=$con->buscar("*","usuarios","usuario='$user' and password='$pass'");
		$num_result=$result->num_rows;
		if($num_result==1){
			echo "Usuario Conectado. :)";
			$_SESSION["conectado"]=$user;
		}else{
			echo "Error de conexión. :(";
		}
?>