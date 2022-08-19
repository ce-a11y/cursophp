<?php
error_reporting(0);
session_start();

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

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Falha ao se conectar com o banco!";
}


function limpar($dados) {
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}

?>
