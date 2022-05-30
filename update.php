<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>
<?php

include('bd/conector.php');
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $perfiles = $_POST['perfil'];

 


if($password=="") {
    $query = $connection->prepare(" CALL update1(:rut,:nombre,:apellido,:email,:perfiles)");
    $query->bindParam(":rut", $rut, PDO::PARAM_STR);
    $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $query->bindParam(":apellido", $apellido, PDO::PARAM_STR);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->bindParam(":perfiles", $perfiles, PDO::PARAM_STR);
    $result = $query->execute();
}else{
    $query = $connection->prepare(" CALL update2(:rut,:nombre,:apellido,:email,:password,:perfiles)");
    $query->bindParam(":rut", $rut, PDO::PARAM_STR);
    $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $query->bindParam(":apellido", $apellido, PDO::PARAM_STR);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->bindParam(":password", $password, PDO::PARAM_STR);
    $query->bindParam(":perfiles", $perfiles, PDO::PARAM_STR);
    $result = $query->execute();
   }
    if ($result) {
        echo '<p class="success">Modificacion Completa</p>';
        echo '</br>';
        echo '<a href="actualizador.php"> Volver a Inicio</a>';
    } else {
        echo '<p class="error">Algo ha pasado!</p>';
    }

?>
</body>
</html>