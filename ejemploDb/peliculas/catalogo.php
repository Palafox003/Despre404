<?php 
require_once("../db/class.db.php");
	$db=new Db();
?>
<!DOCTYPE html>
<html>
<head>
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
      <li class="nav-item">
        <a class="nav-link" href="../">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nuevaPelicula.php">Agregar Pelicula</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="catalogo.php">Catálogo</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php 
  $result=$db->buscar("*","peliculas","1");
    $num_result=$result->num_rows;
?>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php 
            echo '<div class="alert alert-success" role="alert"> Resultados encontrados: '.$num_result.'</div>';
         ?>
      </div>
    </div>
    <div class="row">
      <?php 
        for($i=0;$i<$num_result;$i++){
          $fila=$result->fetch_assoc();
          echo '<div class="col-3">';
             echo '<div class="card">';
                echo '<img class="card-img-top" src="../img/'.$fila["portada"].'" alt="Card image cap">';
                echo '<div class="card-body">';
                  echo '<h4 class="card-title">'.$fila["titulo"].'</h4>';
                  echo '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>';
                  echo '<button type="button" idp="'.$fila["id"].'" class="btn btn-primary btn-card" data-toggle="modal" data-target="#ModalEdit">Editar</button>';
                echo '</div>';
              echo '</div>';
          echo '</div>';
        }
       ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Pelicula</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="actualizarPelicula.php">
              <div class="form-group">
                <label for="titulo">Id</label>
                <input type="text" class="form-control" name="id" id="peli" readonly>
              </div>
              <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título de la Pelicula">
              </div>
              <div class="form-group">
                <label for="genero">Genero</label>
                <select class="form-control" name="genero" id="genero">
                  <option value="Acción">Acción</option>
                  <option value="Acción"></option>
                  <option value="Comedia">Comedia</option>
                  <option value="Terror">Terror</option>
                  <option value="Romance">Romance</option>
                  <option value="Drama">Drama</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sinopsis">Sinopsis</label>
                <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="portada">Cargar Portada</label>
                <input type="file" name="portada" class="form-control-file" id="portada">
              </div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del Modal -->
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/catalogo.js"></script>
</body>
</html>