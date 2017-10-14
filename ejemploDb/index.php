<?php 
session_start();
require_once("db/class.db.php");
	$db=new Db();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nueva Pelicula</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="peliculas/nuevaPelicula.php">Agregar Pelicula</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="peliculas/catalogo.php">Catálogo</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
<?php 
$result=$db->buscar("*","peliculas","1");
	$num_result=$result->num_rows;
		for($i=0;$i<$num_result;$i++){
			if($i==0){
				echo ' <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
			}else{
				echo ' <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" ></li>';
			}
		}
		echo '</ol>
			  <div class="carousel-inner">';

		
			for($i=0;$i<$num_result;$i++){
				$fila=$result->fetch_assoc();
			if($i==0){
				echo '<div class="carousel-item active">
			      <img class="d-block w-100" src="img/'.$fila["portada"].'" alt="First slide">
			    </div>';
			}else{
				echo '<div class="carousel-item ">
				      <img class="d-block w-100" src="img/'.$fila["portada"].'" alt="First slide">
				    </div>';
				}
           } 
?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
<?php if(!isset($_SESSION["conectado"])){ ?>
			<h2>Login</h2>
			<form method="post" action="login/conectar.php">
			  <div class="form-group">
			    <label for="usuario">Usuario</label>
			    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">			    
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-primary">Login</button>
			</form>
<?php }else{
	echo "Hola ".$_SESSION["conectado"]." estas conectato. ";
	echo "<a href='login/desconectar.php'>Desconectar</a>";
}
 ?>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>