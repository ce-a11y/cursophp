<?php
require('db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) and isset($_POST['senha'])) {
        // Verifica se o usuário enviou o post
        if (empty($_POST['email']) or empty($_POST['senha'])) {
            // Verifica se um ou mais campos estão vazios
            $erro_geral = "Todos os campos são necessários!";
            
        } else {
            $email = limpar($_POST['email']);
            $senha = limpar($_POST['senha']);
            if (((!filter_var($email, FILTER_VALIDATE_EMAIL))) or ($senha <=7)) {
               // Campo(s) inválido(s)!
                $erro_geral = 'E-mail ou senha incorretos!';
              
            } else {
            // Começa a fazer a validação com o banco de dados ↓
                $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ? LIMIT 1");
                $sql->execute([$email,$senha]);
                $usuario = $sql->fetch();
                if(!$usuario) {
                    $erro_geral = 'E-mail ou senha incorretos!';
                } else {
                    $token = sha1(uniqid().date('d-m-Y-h-i-s'));

                    $log = $pdo->prepare("UPDATE usuarios SET token = ? WHERE email = ?");
                    $log->execute([$token,$email]);

                    $_SESSION['token'] = $token;
                    header('location:restrita/l.php');
                }
            }            

        }
    }
}


?>






<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>Login</title>
</head>
<body>

 <form method='post'>
    <h1>Login</h1>

    <?php if(isset($_GET['resultado']) and $_GET['resultado'] == 'ok'){ ?>

        <div class="sucesso animate__animated animate__zoomInDown">
    <?php echo "boa caraio" ?>
    </div> 

    <?php } if(isset($erro_geral)) {?>

        <div class="erro-geral animate__animated animate__rubberBand">
    <?php echo "$erro_geral" ?>
    </div> 
    
    <?php }?>





    <div class="grupoInput">
    <img class= "iconeInput" src="imgs/perfil.png">
    <input type="email" name='email' placeholder="Digite seu e-mail" >
    </div>

    <div class="grupoInput">
    <img class= "cadeado" src="imgs/fechadura.png">
    <input type="password" name='senha' placeholder="Digite sua senha" >
    </div>

    <button type='submit' class="botaoAzul">Fazer login</button>

    <a href="cadastro.php" class="cadastro">Ainda não tenho cadastro!</a>
</form>
 

</body>
</html>
