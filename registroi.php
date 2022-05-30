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
    $perfil = $_POST['perfil'];
   
 
    $query = $connection->prepare("SELECT * FROM IACC.usuarios WHERE rut=:rut");
    $query->bindParam("rut", $rut, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">El Rut ya esta registrado</p>';
        echo '<a href="index.php"> Volver a Inicio</a>';
    }
 
    if ($query->rowCount() == 0) {
        //$query = $connection->prepare("INSERT INTO IACC.usuarios(rut,nombre,apellido,email,password,perfiles) 
        //    VALUES (:rut,:nombre,:apellido,:email,:password,:perfiles)");
        $query = $connection->prepare("CALL insertar(:rut,:nombre,:apellido,:email,:password,:perfiles)");
        $query->bindParam("rut", $rut, PDO::PARAM_STR);
        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("password", $password, PDO::PARAM_STR);
        $query->bindParam("perfiles", $perfil, PDO::PARAM_STR);
       
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Su registro esta completo</p><br/>';
            echo '<a href="inicial.php"> Volver a Inicio</a>';
        } else {
            echo '<p class="error">Algo ha pasado!</p>';
        }
    }

?>
    </body>
</html>