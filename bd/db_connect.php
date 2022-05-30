<?php
$uid = "root";
$pwd = "root";
$host = "localhost";

$base = "IACC";
try {

      $conn = new PDO( "mysql:host=$host;dbname=$base", $uid, $pwd); 
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
   }
   catch( PDOException $e ) {
      die( "Error al conectar con la base de datos" ); 
   }
?>
