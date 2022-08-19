<?php

require ('db/config.php');



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['nome']) and !empty($_GET['nome'])) {
        $nome = limpar($_GET['nome']);
    } else {
        $nome = '';
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
    

    <?php if(isset($_GET['nome'])) {
        echo "<h1>Obrigado por se cadastrar, $nome!!!<h1>";
        } else {
            echo '<h1>Obrigado por se cadastrar!</h1>';
            }
?>

<script>

  setTimeout(() => {
        window.location.replace('index.php?resultado=ok')
    }, 3000);

</script>

</body>
</html>
