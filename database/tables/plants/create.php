<?php
require 'banco/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $cuidados = $_POST['cuidados'];
    $adubos = $_POST['adubos'];
    $curiosidades = $_POST['curiosidades'];
    $link = $_POST['link'];

    $stmt = $pdo->prepare("INSERT INTO plantas (nome, cuidados, adubos, curiosidades, link) VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([$nome, $cuidados, $adubos, $curiosidades, $link]);
    header("Location: index.html");
    exit;
}
?>

<h2>Adicionar Plantas</h2>
<form method="post"> 
    Nome: <input type="text" name="nome" required><br> 
    cuidados: <input type="cuidados" name="cuidados" required><br>
    adubos: <input type="adubos" name="adubos" required><br>
    curiosidades: <input type="curiosidades" name="curiosidades" required><br>
    link: <input type="link" name="link" required><br>
    <button type="submit">Salvar</button> 
</form>
