<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users2 WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>UNMSM Baños</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilo-facultades.css">
    <link rel="icon" href="assets/imagenes/baños.ico">
  </head>
  
  <body>
  <?php require 'partials/header.php' ?>
    <main>
      <!-- LA OTRA FORMA ES CON SECCION, PERO NO SE LE PUEDE METER COLOR AHI-->
      <div id="bienvenido">
        <h2>FACULTADES EXTERNAS</h2>
      </div>

      <section id="blog">
        <div class="contenido">

          <article>
            <a href="">
                <img src="assets/imagenes/fm.jpg">
            </a>
            <h4>Facultad de Medicina</h4>
          </article>
          <article>
            <a href="">
                <img src="assets/imagenes/ffb.jpg">
            </a>
            <h4>Facultad de Farmacia y Bioquímica</h4>
          </article>
          <article>
            <a href="">
                <img src="assets/imagenes/fmv.jpg">
            </a>
            <h4>Facultad de Medicina Veterinaria</h4>
          </article>
          
        </div>
      </section>

      <div id="retorno">
        <a href="inicio.php"><input type="button" value="Regresar" id="boton-regresar"></a>
      </div>

    </main>
  
  </body>

</html>
