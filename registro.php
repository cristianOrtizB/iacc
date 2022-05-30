<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>
<form action="registroi.php" method="post" action="" name="signup-form">
    <div class="form-element">
        <label>RUT</label>
        <input type="text" name="rut" placeholder="Rut del Usuario" required oninput="checkRut(this)" />
    </div>
    <div class="form-element">
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre del Usuario" required onkeyup="validarNombre()" onblur="validarNombre()"/>
        <div id="message" hidden>
              Introduzca solo letras (A-Z) o (a-z). Máximo 35 caracteres.
        </div>
    </div>
    <div class="form-element">
        <label>Apellido</label>
        <input type="text" name="apellido" placeholder="Apellido del Usuario" required onkeyup="validarApellido()" onblur="validarApellido()"/>
        <div id="message2" hidden>
              Introduzca solo letras (A-Z) o (a-z). Máximo 35 caracteres.
        </div>
    </div>
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" placeholder="Ingrese Email" required />
    </div>
    <div class="form-element">
        <label for="perfil">Tipo</label>
        
        <select name="perfil" id="perfil">
            <option value="admin">Administrador</option>
            <option value="vis">Visualizador</option>
            <option value="act">Actualizador</option>
            <option value="crea">Creador</option>
            <option value="borra">Eliminador</option>
        </select>


    </div>


    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" placeholder="Ingrese Password" required />
    </div>
    <button type="submit" name="registrar" value="registrar">Registrar</button>
   
    <br/>
    <br/>
    <a href="inicial.php"> Volver a Inicio</a>
</form>
</body>
 <script src="valida.js"></script>


</html>