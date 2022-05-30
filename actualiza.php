<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>
<?php
include('bd/conector.php');

$rut = $_GET["rut"];

$query = $connection->prepare("SELECT * FROM IACC.usuarios WHERE rut=:rut");
$query->bindParam("rut", $rut, PDO::PARAM_STR);

$query->execute();

if ($query->rowCount() > 0) {

    while ( $row = $query->fetch( PDO::FETCH_ASSOC ) ){
        $nombre = $row[nombre];
        $apellido = $row[apellido];
        $email = $row[email];
        $perfiles = $row[perfiles];
    }
}

?>

        <form action="update.php" method="POST" action="" name="signup-form">
        <div class="form-element">
            <label>RUT</label>
            <input type="text" name="rut" value=<?php echo $rut; ?> readonly />
        </div>
        <div class="form-element">
            <label>Nombre</label>
            <input type="text" name="nombre" value = <?php echo $nombre; ?>  />
        </div>
        <div class="form-element">
            <label>Apellido</label>
            <input type="text" name="apellido" value = <?php echo $apellido; ?>  />
        </div>
        <div class="form-element">
            <label>Email</label>
            <input type="email" name="email" value = <?php echo $email; ?>  />
        </div>
        <div class="form-element">
            <label for="perfil">Tipo</label>
                <select name="perfil" id="perfil">
                    <?php 
                    if($perfiles == "admin"){
                    ?>
                        <option selected="selected" value="admin">Administrador</option>
                        <option value="vis">Visualizador</option>
                        <option value="act">Actualizador</option>
                        <option value="crea">Creador</option>
                        <option value="borra">Eliminador</option>
                    <?php
                    }
                    ?>

                    <?php 
                    if($perfiles == "vis"){
                    ?>
                        <option value="admin">Administrador</option>
                        <option selected="selected" value="vis">Visualizador</option>
                        <option value="act">Actualizador</option>
                        <option value="crea">Creador</option>
                        <option value="borra">Eliminador</option>
                    <?php
                    }
                    ?>

                    <?php 
                    if($perfiles == "act"){
                    ?>
                        <option value="admin">Administrador</option>
                        <option value="vis">Visualizador</option>
                        <option selected="selected" value="act">Actualizador</option>
                        <option value="crea">Creador</option>
                        <option value="borra">Eliminador</option>
                    <?php
                    }
                    ?>

                    <?php 
                    if($perfiles == "crea"){
                    ?>
                        <option value="admin">Administrador</option>
                        <option value="vis">Visualizador</option>
                        <option value="act">Actualizador</option>
                        <option selected="selected" value="crea">Creador</option>
                        <option value="borra">Eliminador</option>
                    <?php
                    }
                    ?>

                    <?php 
                    if($perfiles == "borra"){
                    ?>
                        <option value="admin">Administrador</option>
                        <option value="vis">Visualizador</option>
                        <option value="act">Actualizador</option>
                        <option value="crea">Creador</option>
                        <option selected="selected" value="borra">Eliminador</option>
                    <?php
                    }
                    ?>
                    
                </select>
        </div>


        <div class="form-element">
            <label>Password</label>
            <input type="password" name="password"  />
        </div>
        <button type="submit" name="modificar" value="modificar">Modificar</button>
        
        <br/>
        <br/>
        <a href="actualizador.php"> Volver a Visualizador</a>
    </form>


</body>
</html>