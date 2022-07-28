<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="staile.css">
    <title>Calculadora de dias</title>
</head>
<body style="font-family:arial">
<?php    

echo '<div class="hora">';
    echo "<hr><h1> Agora é manipulação de DATA e HORA ↓↓↓</h1><br>";

    echo "Estamos no dia ". date('d'). " do mês " . date('m') . " do ano " . date('Y');
    echo "<br>";
    echo "Essa é a " . date('W'). "ª semana do ano!";
    echo "<br>";
    echo "A hora atual <i>(do servidor)</i> é " . date('H:i:s');
    
    $hoje = date('Y-m-d');

   
//    echo "<br> Testando String para tempo: $tempo <br>";
    echo "";

    if (!empty($_POST['data1'])) { $data1=$_POST['data1'];} if (!empty($_POST['data2'])) {$data2= $_POST['data2'];}

 //   $tempo = strtotime($amanha) - strtotime($hoje);
    echo "<form method='post'> 
        <br>
        <label> Calculadora de dias <br><!--<i class='data'>Use no formato YYYY-MM-DD</i>--><br></label>
        <input type='date' name='data1'"; if (!empty($data1)) {echo " value='$data1'";}; echo " placeholder='Insira aqui a primeira data'>";

        echo " <input type='date' name='data2'"; if (!empty($data2)) {echo " value='$data2'";}; echo " placeholder='Insira aqui a outra data'>
        <button type=submit> Enviar </button>
        </form>";
    echo "</div>";

    
    echo '<div class="calc">';
    if((isset($_POST['data1']) == true) and (isset($_POST['data2']) == true)) {
        if (!empty($_POST['data1']) and (!empty($_POST['data2']))) {
        $data1 = $_POST['data1'];
        $data2 = $_POST['data2'];
        echo kcalc($data1,$data2);
    }}
        function kcalc($data1, $data2) {
            $res = strtotime($data2) - strtotime($data1);
            $res = floor($res / (60*60*24));
            if ($res == 1) {
            return "<br>A distância entre a primeira e a segunda data é $res dia!";
        } else {return "<br>A distância entre a primeira e a segunda data é $res dias!";
        }
    }

        $result = "5";

    echo "</div>";








?>
</body>
</html>
