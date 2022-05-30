<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>
<?php

include('bd/conector.php');

 
    $rut = $_POST["rut"];
    
    //$query = $connection->prepare(" DELETE FROM  IACC.usuarios WHERE rut =:rut");
    $query = $connection->prepare("CALL eliminar(:rut)");
    $query->bindParam(":rut", $rut, PDO::PARAM_STR);
   
    
    $result = $query->execute();
   

    if ($result) {
        echo '<p class="success">Eliminado corectamente</p>';
        echo '</br>';
        echo '<a href="eliminador.php"> Volver a Inicio</a>';
    } else {
        echo '<p class="error">Algo ha pasado!</p>';
    }

?>
</body>
</html>