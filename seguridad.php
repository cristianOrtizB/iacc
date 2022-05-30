<html>
<head><link rel="stylesheet" href="estilo.css"></head>    
<body>

<div class="form-element">
    <label>Seguridad</label>
</div>

<?php

include('bd/db_connect.php');


$query = "select * from IACC.perfiles"; 
    $stmt = $conn->query( $query ); 
echo '<div class="form-element">';
echo '<table class="default">';
echo '<tr>';
echo '<th>Perfil</th>';
echo '<th>Visualiza</th>';
echo '<th>Actualiza</th>';
echo '<th>Eliminador</th>';
echo '<th>Creador</th>';
echo '</tr>';


while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
   $perfil = $row[perfil];
   $select = $row[select];
   $update = $row[update];
   $delete = $row[delete];
   $insert = $row[insert];

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
        echo '<td>'.$perfil.'</td>';
       // echo '<td>'.$select.'</td>';
        if($select == 1){
        ?>
            <td>
                <select name="select" class="seg" id="select" >
                    <option value="0">0</option>
                    <option value="1" selected="selected">1</option>
                </select>    
            </td>
        <?php
        }else{
        ?>
            <td>
                <select name="select" class="seg" id="select">
                <option value="0" selected="selected">0</option>
                <option value="1">1</option>
            </td>
        </select>     
        <?php
        }
        
        
       // echo '<td>'.$update.'</td>';

        if($update == 1){
            ?>
                <td>
                    <select name="update" class="seg" id="update" >
                        <option value="0">0</option>
                        <option value="1" selected="selected">1</option>
                    </select>    
                </td>
            <?php
            }else{
            ?>
                <td>
                    <select name="update" class="seg" id="update">
                    <option value="0" selected="selected">0</option>
                    <option value="1">1</option>
                </td>
            </select>     
            <?php
            }


        //echo '<td>'.$delete.'</td>';

        if($delete == 1){
            ?>
                <td>
                    <select name="delete" class="seg" id="delete" >
                        <option value="0">0</option>
                        <option value="1" selected="selected">1</option>
                    </select>    
                </td>
            <?php
            }else{
            ?>
                <td>
                    <select name="delete" class="seg" id="delete">
                    <option value="0" selected="selected">0</option>
                    <option value="1">1</option>
                </td>
            </select>     
            <?php
            }


        //echo '<td>'.$insert.'</td>';
       
        if($insert == 1){
            ?>
                <td>
                    <select name="insert" class="seg" id="insert" >
                        <option value="0">0</option>
                        <option value="1" selected="selected">1</option>
                    </select>    
                </td>
            <?php
            }else{
            ?>
                <td>
                    <select name="insert" class="seg" id="insert">
                    <option value="0" selected="selected">0</option>
                    <option value="1">1</option>
                </td>
            </select>     
            <?php
            }


        echo '</tr>'; 
}


echo '</table>';
echo '</div>';
?>
<div class="form-element">
    <a class="btn" href="inicial.php">Actualizar</a>
</div>

</body>
</html>
  