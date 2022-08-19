<?php
error_reporting(0);
session_start();

// Define o modo que o servidor vai operar
// No caso, o impacto disso aqui no projeto seriam só
// os dados pra logar no banco de dados
// e o negócio de enviar o e-mail pra confirmar mesmo

$modo = 'producao';

if ($modo == 'local') {

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'login';

    
} if ($modo == 'producao') {

    $servidor = '**********';
    $usuario = '**********';
    $senha = '**********';
    $banco = '**********';

}

// Aqui tenta se conectar ao banco de dados caso consiga blz, caso n retorna um erro
try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Falha ao se conectar com o banco!";
}

// Aqui é a função de "limpar" os campos lá
function limpar($dados) {
    $dados = trim($dados); // Retira espaços do começo e do fim de uma string
    $dados = stripslashes($dados); // Retira barras invertidas de uma string, por exemplo: \' vira '
    $dados = htmlspecialchars($dados); // Transforma caracteres especiais (tipo < > / ') em texto normal, previnindo inserção de scripts, por exemplo
    return $dados;
}

?>
