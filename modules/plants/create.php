<?php
require '../../database/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $cuidados = $_POST['cuidados'];
    $adubos = $_POST['adubos'];
    $curiosidades = $_POST['curiosidades'];
    $link = $_POST['link'];
    $categoria = $_POST['categoria'];

    $stmt = $pdo->prepare("INSERT INTO plantas (nome, cuidados, adubos, curiosidades, link, categoria) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->execute([$nome, $cuidados, $adubos, $curiosidades, $link, $categoria]);
    header("Location: ../../index.php");
    exit;
}
?>

<h2>Adicionar Plantas</h2>
<form method="post"> 
    Nome: <input type="text" name="nome" required><br> 
    cuidados: <input type="text" name="cuidados" required><br>
    adubos: <input type="text" name="adubos" required><br>
    curiosidades: <input type="text" name="curiosidades" required><br>
    link: <input type="link" name="link" required><br>
    categoria: <input type="text" name="categoria" required><br>
    <button type="submit">Salvar</button> 
</form>
