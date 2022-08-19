<?php

require ('db/config.php');


// Verifica se tem algum nome escrito na URL
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['nome']) and !empty($_GET['nome'])) {
        $nome = limpar($_GET['nome']);
    }
}   



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='estilo.css'>
    <title>Obrigado</title>
</head>
<body>
    
<!-- Verifica se tem a variável nome, se tiver exibe o nome na tela, caso contrário não -->
    <?php if(isset($nome)) {
        echo "<h1>Obrigado por se cadastrar, $nome!!!<h1>";
        } else {
            echo '<h1>Obrigado por se cadastrar!</h1>';
            }
?>

<script>
    
// Depois de 3 seg manda a pessoa pra tela de login
  setTimeout(() => {
        window.location.replace('index.php?resultado=ok')
    }, 3000);

</script>

</body>
</html>
