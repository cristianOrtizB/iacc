<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>

<div class="form-element">
    <label>Actualizador</label>
</div>

<?php

include('bd/db_connect.php');


$query = "select rut,nombre,apellido,email,perfiles from IACC.usuarios"; 
    $stmt = $conn->query( $query ); 

echo '<table class="default">';
echo '<tr>';
echo '<th>Rut</th>';
echo '<th>Nombre</th>';
echo '<th>Apellido</th>';
echo '<th>Email</th>';
echo '<th>Perfil</th>';
echo '<th>Modificar</th>';
echo '</tr>';


while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
   $rut = $row[rut];
   $nombre = $row[nombre];
   $apellido = $row[apellido];
   $email = $row[email];
   $perfiles = $row[perfiles];

    if ($perfiles == 'act'){
        $perfil = 'Actualizador';
    }
    if ($perfiles == 'crea'){
        $perfil = 'Creador';
    }
    if ($perfiles == 'borra'){
        $perfil = 'Eliminador';
    }
    if ($perfiles == 'vis'){
        $perfil = 'Visualizador';
    }
    if ($perfiles == 'admin'){
        $perfil = 'Administrador';
    }

        echo '<tr>';
        echo '<td>'.$rut.'</td>';
        echo '<td>'.$nombre.'</td>';
        echo '<td>'.$apellido.'</td>';
        echo '<td>'.$email.'</td>';
        echo '<td>'.$perfil.'</td>';
        echo '<td><a href="actualiza.php?rut='.trim($rut).'">Actualizar</a>'.'</td>';
        echo '</tr>'; 
}


echo '</table>';

?>
<div class="form-element">
    <a class="btn" href="inicial.php"><-volver</a>
</div>

</body>
</html>
  