<?php

$teste = $_SERVER['REQUEST_METHOD'];

$nome="";
$email="";
$senha="";
$repSenha="";
$erroNome = "";
$erroEmail= "";
$erroSenha="";
$erroRep="";

if ($teste == 'POST') {
    if (empty($_POST['nome'])) {
        $erroNome = "Por favor, preencha um nome. <br>";
    } else{
        $nome = $_POST['nome'];
        $nome = limpar($nome);
        if(!preg_match("/^[a-zA-Z' ]*$/", $nome)) {
            $erroNome = "Use apenas letras e espaços. <br>";
        }
    }

    if (empty($_POST['email'])) {
        $erroEmail = "Por favor, preencha um e-mail. <br>";
    } else{
        $email= $_POST['email'];
        $email = limpar($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroEmail = "Por favor, informe um e-mail válido. <br>";
        }
    }

    if (empty($_POST['senha'])) {
        $erroSenha = "Por favor, preencha uma senha. <br>";
    } else{
        $senha= $_POST['senha'];
        $senha = limpar($senha);
        if(strlen($senha) < 8) {
            $erroSenha = "A senha deve conter, no mínimo, oito caracteres. <br>";
        }
    }

    if (empty($_POST['repSenha'])) {
        $erroRep = "Por favor, repita sua senha.";
    } else{
        $rep= $_POST['repSenha'];
        $rep = limpar($rep);
        if ($rep != $senha) {
            $erroRep = "A senha digitada não é igual a anterior.";
        }
    }
}


function limpar($valor) {
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylef.css">
    <title>Formulário</title>
</head>
<body>
    <div class="conteiner">
     <h1> Validação de Formulário </h1>
       <form method="post">
          <label>Nome completo</label>
          <input <?php if (!$erroNome == "") { echo "id=invalido";}?> <?php if (!empty($nome)) {echo "value = $nome";}?> type="text" name="nome" placeholder="  Digite seu nome!">
          <br><span><?php if (!$erroNome == "") { echo $erroNome;} ?></span>
          <label>E-mail</label>
          <input <?php if (!$erroEmail == "") { echo "id=invalido";}?> <?php if (!empty($email)) {echo "value = $email";}?> type="email" name="email" placeholder="   email@provedor.com">
          <br><span><?php if (!$erroEmail == "") { echo $erroEmail;} ?></span>
          <label>Senha</label>
          <input <?php if (!$erroSenha == "") { echo "id=invalido";}?> <?php if (!empty($senha)) {echo "value = $senha";}?> type="password" name="senha" placeholder="   Digite sua senha!">
          <br><span><?php if (!$erroSenha == "") { echo $erroSenha;} ?></span>
          <label>Repita sua senha</label>
          <input <?php if (!$erroRep == "") { echo "id=invalido";}?> <?php if (!empty($rep)) {echo "value = $rep";}?> type="password" name="repSenha" placeholder="   Repita sua senha!">
          <br><span><?php if (!$erroRep == "") { echo $erroRep;} ?></span> 
          <button type="submit">Enviar formulário</button>    
        </form>



    </div>




</body>
</html>
