<?php 
require '../db/config.php';

if (!isset($_SESSION['token'])) {
    header('location:../index.php');
} else {
    $tkn = $_SESSION['token'];
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token = ? LIMIT 1");
    $sql->execute([$tkn]);
    $buscaToken = $sql->fetch(PDO::FETCH_ASSOC);
    if ($buscaToken) {
        $boas_vindas = "Opa, ".$buscaToken['nome'].", seja bem vindo(a) à página restrita";
} else {header('location:../index.php');}
}


if (isset($_GET['destruir'])) {
    session_unset();
    session_destroy();
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

    <a href='k.php'>
<div class="sucesso animate__animated animate__zoomInDown">
    Deslogar
</div> 
</a>

</body>
</html>
