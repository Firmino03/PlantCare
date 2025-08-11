<?php
$host = 'localhost:3306'; 
$db = 'plantcare-dev';     
$user = 'root';          
$pass = '';           

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo 'Conexão bem-sucedida!';
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>