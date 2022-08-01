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

  $conexion=mysqli_connect("localhost", "root", "", "users2");
  $conexion2=mysqli_connect("localhost", "root", "", "comentarios");
  mysqli_set_charset($conexion,"utf8");
  mysqli_set_charset($conexion2,"utf8");

  $usuarios="SELECT * FROM users2";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/estilos-fdcp.css">
  <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <title>BañosUNMSM</title>
</head>

<body>
  <?php require 'partials/header.php' ?>
  
  <div id="bienvenido">
    <h2>FACULTAD DE DERECHO Y CIENCIA POLÍTICA</h2>
  </div>
    



    <div class="derecho">
        <img src="assets/imagenes/derechoBR.jpg"> <br><br>
        <form action="servicios_derecho.php" method="POST">
        <div id="nick">
            <!--
            <p>Usuario:</p>
            <input type="text" name="nick" id="nicksito" placeholder="Escribe tu nick:">&nbsp;&nbsp;
            -->
            <p>Comentar:</p>
            <textarea type="text" id="comentarsito"name="comentar" placeholder="Ingres su comentario: "></textarea>
            <br>
            <input type="submit" name="enviar" id="enviar"  value="Enviar">
            <br>
        </div>
        

    </form>
    </div>
    <br><br><br><br><br><br><br>

    <div class="caja-comentar-global">
    <h3>---Sección de comentarios---</h3>
    </div>
    <br>
    <?php
  
    $buscar="SELECT * FROM `comentarios` ORDER BY `fecha` DESC";
    $resultado2=mysqli_query($conexion2,$buscar);
    
    
    while($row=mysqli_fetch_assoc($resultado2)){
        ?> <div class="caja_comentario"> <?php
        ?> <div class="fecha_comentario"> <?php echo "=>&nbsp",$row['fecha'];?> <br> </div><?php
        ?> <div class="comentarios" id="usuario"> <?php    echo $row['nombre'],":"; ?> <br> </div><?php
        ?> <div class="comentarios"> <?php    echo $row['comentario']   ;?> </div> </div><br> <?php
        }
    mysqli_free_result($resultado2);
  
    if(isset($_POST["enviar"])){
        $nick=$user['email'];   //$_POST["nick"];
        $comentario=$_POST["comentar"];
        date_default_timezone_set("America/Lima");
        $fecha=date('h:i:s || d-m-y');
       
        if($nick!="" && $comentario!="" && $fecha!="" ){
        $insertar="INSERT INTO `comentarios`(`nombre`, `comentario`, `fecha`) VALUES ('$nick','$comentario','$fecha')";
        $resultado=mysqli_query($conexion2,$insertar);      
        header("refresh:0.1");
        }
    }
    ?>

</body>
</html>




