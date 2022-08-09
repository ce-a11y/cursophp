<?php


function curl($codigo) {
$ch = curl_init();

$codigo = trim($codigo);
$codigo = stripslashes($codigo);
$codigo = htmlspecialchars($codigo);

curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/$codigo/json/");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$retorno = curl_exec($ch);

curl_close($ch);

$dados = json_decode($retorno);

if ($dados == null) {
    echo "Algo de errado não está certo... Verifique o número digitado e tente novamente.";
} else {

foreach ($dados as $titulo => $informacoes) {

    echo "$titulo: $informacoes<br>";

}
}
}
//ECHO "<pre>$retorno</pre>";

//echo "<br>", var_dump($retorno), "<br><hr>";

//$dados = json_decode($retorno);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post">
        <label>Busque informações de endereço pelo cep!</label>
        <br>
        <br>    
        <input type="number" name="cep" placeholder="Digite seu CEP aqui!" required>
        <button type="submit">Buscar</button>
    </form>
    <br><hr>

<?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//      echo 'post ok';
        if (!empty($_POST['cep'])) {
//          echo 'preenchido ok';
            $cep = $_POST['cep'];
            curl($cep);
//          echo "<pre>$retorno</pre>";
        }
    }
