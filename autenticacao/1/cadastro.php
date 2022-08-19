<?php
//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\Exception;

//  require 'PHPMailer/src/Exception.php';
//  require 'PHPMailer/src/PHPMailer.php';
//  require 'PHPMailer/src/SMTP.php';

require 'db/config.php';

if (isset($_POST['nome']) and isset($_POST['email']) and isset($_POST['senha']) and isset($_POST['rptSenha'])) {
    if (empty($_POST['nome']) or empty($_POST['email']) or empty($_POST['senha']) or empty($_POST['rptSenha'])) {
        $erro_geral = 'Todos os campos são necessários';
        $erroNome='';
        $erroEmail='';
        $erroSenha='';
        $erroRptSenha='';
        $chk = '';
    }else {        
        $nome = limpar($_POST['nome']);
        $email = limpar($_POST['email']);
        $senha = limpar($_POST['senha']);
        $senha_cript = sha1($senha);
        $rptSenha = limpar($_POST['rptSenha']);
        $chk = limpar($_POST['termos']);

        if (!preg_match("/^[a-zA-ZÀ-ú ]*$/",$nome) or empty($nome)) {
            $erroNome = "Insira um nome válido!";

        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroEmail = 'Insira um e-mail válido!';
        }
        if (strlen($senha) <= 7) {
            $erroSenha = 'Insira uma senha de no mínimo 8 caracteres!';
            
        }
        if ($rptSenha != $senha) {
                $erroRptSenha = 'A senha repetida está diferente da senha criada.';
        }

        if (empty($chk)) {
            $erroChk = 'É necessária a autorização!';
        }

        if(!isset($erroNome) and !isset($erroEmail) and !isset($erroSenha) and !isset($erroRptSenha) and !isset($erroChk)) {
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email=? LIMIT 1");
            $sql->execute([$email]);
            $usuario = $sql->fetch();
            
            if(!$usuario) {
                $recuperaSenha = '';
                $token = '';
                $status = '';
                $cod_confirma = uniqid();
                $data = date('d-m-Y');
 
                $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?)");
                $sql->execute([$nome,$email,$senha_cript,$recuperaSenha,$token,$status,$data]);

            if($modo == 'local') {
                header('location: index.php?resultado=ok');
            } 
            
             if($modo == 'producao') {

//                 $mail = new PHPMailer(true);
//  $emailSis = '';
//  $emailUsu = $email;
// try {

//     $mail->setFrom('$emailSis', 'Sistema de E-mail'); // QUEM MANDA
//     $mail->addAddress("$emailUsu", "$nome"); // QUEM RECEBE.

//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Confirmação de cadastro';
//     $mail->Body    = "Por favor confirme o seu e-mail abaixo!<br>
//     <a href='http://cursophpdev.byethost22.com/autenticacao/login/confirma.php?codigo=$cod_confirma'>";
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
     header("location:obrigado.php?nome=$nome");

// } catch (Exception $e) {
//     echo "Houve um prebema!: {$mail->ErrorInfo}";
// }


              }
         }
           else {

            $erro_geral = "Usuário já cadastrado.";
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
    <title>Cadastro</title>
</head>
<body>

 <form method='post'>
    <h1>Cadastro</h1>

    <?php if (isset($erro_geral)) {    ?>
   
     <div class="erro-geral animate__animated animate__rubberBand">
    <?php echo $erro_geral ?>
    </div> 

    <?php } 
    
   
    
    ?>

   
    <div class="grupoInput">
    <img class= "iconeInput" src="imgs/carteira-de-identidade.png">
    <input type="text" <?php if (isset($erroNome)) { echo 'class="erro-input"'; } if (isset($_POST['nome']) and !empty($_POST['nome'])) { echo "value='".$_POST['nome']."'"; } ?> name='nome' placeholder="Digite seu nome completo" required>
    <?php if (isset($erroNome)) { echo "<div class='erro'>$erroNome</div>";}?>
    </div>

    <div class="grupoInput">
        <img class= "iconeInput" src="imgs/perfil.png">
        <input type="text" <?php if (isset($erroEmail)) { echo 'class="erro-input"'; } if (isset($_POST['email']) and !empty($_POST['email'])) { echo 'value='.$_POST['email']; } ?> name='email' placeholder="Digite seu e-mail" required>
        <?php if (isset($erroEmail)) { echo "<div class='erro'>$erroEmail</div>";}?>
    </div>

    <div class="grupoInput">
        <img class= "cadeado" src="imgs/fechadura.png">
        <input type="password"<?php if (isset($erroSenha)) { echo 'class="erro-input"'; } if (isset($_POST['senha']) and !empty($_POST['senha'])) { echo 'value='.$_POST['senha']; } ?> name='senha' placeholder="Crie uma senha" required>
        <?php if (isset($erroSenha)) { echo "<div class='erro'>$erroSenha</div>";}?>
    </div>

    <div class="grupoInput">
    <img class= "cadeado" src="imgs/desbloquear.png">
    <input type="password" <?php if (isset($erroRptSenha)) { echo 'class="erro-input"'; } if (isset($_POST['rptSenha']) and !empty($_POST['rptSenha'])) { echo 'value='.$_POST['rptSenha']; } ?> name='rptSenha' placeholder="Repita a senha criada" required>
    <?php if (isset($erroRptSenha)) { echo "<div class='erro'>$erroRptSenha</div>";}?>
    </div>

    <div class="grupoInput">
        <input type="checkbox" name='termos' id='termos' value='ok'>
        <label for="termos">Ao se cadastrar você concorda com nossa <a href='#'>política de privacidade</a> e nossos <a href='#'>termos de uso</a>.</label>
        <?php if (isset($erroChk)) { echo "<div class='erro'>$erroChk</div>";}?>
    </div>

    <button type='submit' class="botaoAzul">Fazer login</button>

    <a href="index.php" class="cadastro">Já tenho uma conta!</a>
</form>
 

</body>
</html>
