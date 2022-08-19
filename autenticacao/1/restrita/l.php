<?php 
require '../db/config.php';
// ↑ Se conecta com o banco de dados

// Verifica se existe uma sessão token iniciada
if (!isset($_SESSION['token'])) {
    header('location:../index.php');
} else {
// Caso haja, quer dizer que a pessoa conseguiu passar pela verificação do login
// Então, busca no banco de dados o usuário que tem esse token
    $tkn = $_SESSION['token'];
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token = ? LIMIT 1");
    $sql->execute([$tkn]);
    $buscaToken = $sql->fetch(PDO::FETCH_ASSOC);
    if ($buscaToken) {
// Caso exista um usuário com esse token, carrega a página normalmente e escreve a mensagem
        $boas_vindas = "Opa, ".$buscaToken['nome'].", seja bem vindo(a) à página restrita";
        
// Caso contrário, manda a pessoa pra página de login
    } else {header('location:../index.php');}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>Document</title>

    <style>
        body {
            display:flex;
            flex-flow: column wrap;
            height: 100vh;
            width: 100vw;
            justify-content: center;
            align-items: center;
        }
        h1 {
            background-color: black;
            color: white;
        }
    </style>


</head>
<body>
    

    <h1> tubarão subterrâneo</h1><br>


    <h2><?php echo $boas_vindas.'<br>'?></h2>

<!-- Esse botão envia pra página k.php que kebra a sessão! -->
    <a href='k.php'>
<div class="sucesso animate__animated animate__zoomInDown">
    Deslogar
</div> 
</a>

</body>
</html>
