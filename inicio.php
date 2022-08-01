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
    <link rel="stylesheet" href="assets/css/estilo-inicio.css">
    <link rel="icon" href="assets/imagenes/baños.ico">
  </head>
  
  <body>
  <?php require 'partials/header.php' ?>
    <div>
      <a href="facultades.php"><input type="button" value="FACULTADES (Ciudad Universitaria)" id="boton"></a>
      <a href="facexternas.php"><input type="button" value="Facultades Externas" id="boton"></a>
      <a href="otros-edificios.php"><input type="button" value="Otros Edificios" id="boton"></a>
      <a href="logout.php"><input type="button" value="SALIR" id="boton-salir"></a>
    </div>
  </body>

</html>
