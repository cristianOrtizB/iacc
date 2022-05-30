<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<?php
$rut = $_GET["rut"];
?>
<body>
 
        <form action="eliminar.php" method="post" action="" name="signup-form">
        <div class="form-element">
            <label>RUT</label>
            <input type="text" name="rut" value=<?php echo $rut; ?> readonly/>
        </div>
        
        <button type="submit" name="modificar" value="modificar">Eliminar</button>
        
        <br/>
        <br/>
        <a href="eliminador.php"> Volver atras</a>
    </form>

    
</body>
<script src="valida.js"></script>
</html>