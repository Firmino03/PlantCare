<?php
// Inclui o arquivo de conexão com o banco de dados
require 'banco/db.php';

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura os dados enviados pelo formulário salvando nas variáveis, vamos usar para fazer a inclusão dos dados.
    $nome = $_POST['nome'];
    $cuidados = $_POST['cuidados'];
    $adubos = $_POST['adubos'];
    $curiosidades = $_POST['curiosidades'];
    $link = $_POST['link'];


    // Explicando agora as proximas linhas, da 26 até a 29

    // $stmt:
    // É o nome da variável que recebe o "statement" (declaração preparada).
    // Esse objeto $stmt agora representa a query (que é um codigo sql) que foi "preparada", mas ainda não foi executada.
    
    // $pdo:
    // É a variável que contém a conexão com o banco de dados, criada em db.php usando a classe PDO.

    // prepare(...):
    // Esse método prepara uma instrução SQL com parâmetros para ser executada depois com os dados reais.

    // Prepara a query SQL para inserir um novo aluno na tabela
    $stmt = $pdo->prepare("INSERT INTO plantas (nome, cuidados, adubos, curiosidades, link) VALUES (?, ?, ?, ?, ?)");

    // Executa a query passando os valores recebidos do formulário
    $stmt->execute([$nome, $cuidados, $adubos, $curiosidades, $link]);

    // Redireciona o usuário de volta para a página principal após o cadastro
    header("Location: index.html");
    exit;
}
?>

<!-- Formulário HTML para cadastrar um novo aluno -->
<h2>Adicionar Plantas</h2>
<form method="post"> <!-- Envia os dados para esta mesma página usando o método POST -->
    Nome: <input type="text" name="nome" required><br> <!-- definição do tipo do campo, o valor que ele ira receber e definindo como obrigatorio-->
    cuidados: <input type="cuidados" name="cuidados" required><br>
    adubos: <input type="adubos" name="adubos" required><br>
    curiosidades: <input type="curiosidades" name="curiosidades" required><br>
    link: <input type="link" name="link" required><br>
    <button type="submit">Salvar</button> <!-- Botão que envia o formulário -->
</form>
