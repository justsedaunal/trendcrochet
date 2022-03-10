<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=somine', 'root', '');
   
    }
   
 catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
}
?>

