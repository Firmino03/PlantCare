<?php
    require_once '../database/db.php';

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM planta WHERE id = ?");
    $stmt->execute([$id]);
    $planta = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes das plantas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Plantas</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-plantas.php">Listar plantas</a></li>
                <li><a href="create-plantas.php">Adicionar plantas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes das plantas</h2>
        <?php if ($planta): ?>
            <p><strong>ID:</strong> <?= $planta['id'] ?></p>
            <p><strong>Nome:</strong> <?= $planta['nome'] ?></p>
            <p><strong>cuidados:</strong> <?= $planta['cuidados'] ?></p>
            <p><strong>adubos:</strong> <?= $planta['adubos'] ?></p>
            <p><strong>curiosidades:</strong> <?= $planta['curiosidades'] ?></p>
            <p>
                <a href="update-plantas.php?id=<?= $planta['id'] ?>">Editar</a>
                <a href="delete-plantas.php?id=<?= $planta['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Planta não encontrada.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Plantas</p>
    </footer>
</body>
</html>