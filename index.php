<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>
<form action="inicial.php" method="post" action="" name="signin-form">
    <div class="form-element">
        <label>RUT</label>
        <input type="text" name="rut" placeholder="Rut del Usuario" required oninput="checkRut(this)"/>
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password del Usuario" required />
    </div>
    <button type="submit" name="login" value="login">Ingresar</button>
    <br/>
    <br/>
    <a href="registro.php">Registrese aqui</a>
    <br/>
    <br/>
    <a href="baja.php">Darse de baja</a>
   
</form>
</body>
<script src="valida.js"></script>
</html>