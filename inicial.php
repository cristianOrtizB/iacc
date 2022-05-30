<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>

<?php
include('bd/conector.php');

 
$rut = $_POST["rut"];
$password = $_POST['password'];

/*
$rut = "15344258-4";
$password = "123456";
*/

$query = $connection->prepare("SELECT * FROM IACC.usuarios, IACC.perfiles 
                                WHERE rut=:rut and password=:password 
                                AND usuarios.perfiles = perfiles.perfil");
$query->bindParam("rut", $rut, PDO::PARAM_STR);
$query->bindParam("password", $password, PDO::PARAM_STR);


$query->execute();

if ($query->rowCount() > 0) {

    while ( $row = $query->fetch( PDO::FETCH_ASSOC ) ){
        $nombre = $row[nombre];
        $apellido = $row[apellido];
        $email = $row[email];
        $perfiles = $row[perfil];
        $vis = $row[select];
        $act = $row[update];
        $crea = $row[insert];
        $borra = $row[delete];

    }

#Intermedia con Links para Visualizador, actualizador, creador de registrsos y eliminador

echo '<div class="form-element">';
if($vis == 1){
   echo '<a class="btn" href="visualizador.php">Visualizar</a>';
}
if($act == 1){
   echo '<a class="btn" href="actualizador.php">Actualizar Usuarios</a>';
}
if($crea == 1){
    echo '<a class="btn" href="registro.php">Agregar Usuarios</a>';
}
if($borra == 1){
   echo '<a class="btn" href="eliminador.php">Eliminar Usuarios</a>';
}
echo '</div>';
?>

<?php   
    }
 
    if ($query->rowCount() == 0) {
        echo '<p class="error">Usuario o Password NO valido</p>';
        echo '<a href="index.php"> Volver a Inicio</a>';
    }

?>
</body>
</html>