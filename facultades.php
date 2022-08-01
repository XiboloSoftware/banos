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
        <h2>FACULTADES EN LA CIUDAD UNIVERSITARIA</h2>
      </div>

      <section id="blog">
        <div class="contenido">
          <article>
            <a href="servicios_derecho.php">
                <img src="assets/imagenes/fdcp.jpg">
            </a>
            <h4>Facultad de Derecho y Ciencia Politica</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/flch.jpg">
            </a>
            <h4>Facultad de Letras y Ciencias Humanas</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/odonto.jpg">
            </a>
            <h4>Facultad de Odontologia</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/educa.jpg">
            </a>
            <h4>Facultad de Educacion</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fqiq.jpg">
            </a>
            <h4>Facultad de Quimica e Ingenieria Quimica</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fca.jpg">
            </a>
            <h4>Facultad de Ciencias Administrativas</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fcb.jpg">
            </a>
            <h4>Facultad de Ciencias Biologicas</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fcc.jpg">
            </a>
            <h4>Facultad de Ciencias Contables</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fce.png">
            </a>
            <h4>Facultad de Ciencias Economicas</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fcf.jpg">
            </a>
            <h4>Facultad de Ciencias Fisicas</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fcm.jpg">
            </a>
            <h4>Facultad de Ciencias Matematicas</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fcs.jpg">
            </a>
            <h4>Facultad de Ciencias Sociales</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/figmmg.jpg">
            </a>
            <h4>Facultad de Ingenieria Geologica,</h4>
            <h4>Minera, Metalurgica y Geologica</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fii.png">
            </a>
            <h4>Facultad de Ingenieria Industrial</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/psico.jpg">
            </a>
            <h4>Facultad de Psicologia</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fiee.jpg">
            </a>
            <h4>Facultad de Ingenieria electrica</h4>
            <h4>y Electronica</h4>
          </article>
          <article>
            <a href="">
              <img src="assets/imagenes/fisi.jpg">
            </a>
            <h4>Facultad de Ingenieria de Sistemas</h4>
            <h4>e Informatica</h4>
          </article>
        </div>
      </section>

      <div id="retorno">
        <a href="inicio.php"><input type="button" value="Regresar" id="boton-regresar"></a>
      </div>

    </main>
  
  </body>

</html>
