<?php

function imc($alt, $pes) {


    $alta = $alt / 100;

    $altu = $alta * $alta;
 
    $imc = $pes / $altu;

    $number = number_format($imc, 2, '.', '');

    echo "O seu IMC é $number";
    if ($imc < 18.5) {
        echo "<br> <span class='red'> vai comer fdp </span>";
    } else if ($imc < 24.9) {
        echo "<br> <span class='green'> ta suave </span>";
    } else if ($imc < 30) {
        echo "<br> <span class='orange'> suave mas para de comer </span>";
    } else if ($imc < 35) {
        echo "<br> <span class='red'> tá virando o nikocado </span>";
    } else {
        echo "<br> <span class='nikocado'>ta fudido</span>
        <img src='nikocado.gif'>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['peso']) == true and isset($_POST['peso']) == true) {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
//        echo "o peso é $peso e a altura é $altura";

        imc($altura,$peso);

    } 
}



?>
