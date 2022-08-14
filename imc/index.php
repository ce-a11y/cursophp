<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>

    input {
        margin: 5px;
    }

    body {
        margin:0;
        padding:0;
        display: flex;
        flex-direction: column;
        height:100vh;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .conteiner {
        display:flex;
        flex-direction: column;
        /* border: 1px solid blue; */
        width: 300px;
        max-height: 500px;
        /* padding: 20px; */
        justify-content: center;
        align-items: center;
        padding: 10px 0 10px 0;
        background: #eeeeeea6;
        box-shadow: 5px 5px 15px;
    }
    input {
        border-color: rgba(255, 255, 255, 0.418);
        margin: 5px;
        font-family: 'Segoe UI';
        width: 100%;
    }
    button {
        margin-left: 5px;
        width: 95%;
        font-family: 'Segoe UI';
        border: 1px ; 
        background-color: cadetblue;
    }
    .red {
        font-weight: bold;
        color: red;
    }
    .green {
        font-weight: bold;
        color:green;
    }
    .orange {
        font-weight: bold;
        color: orangered;
    }
    .nikocado {
        font-weight: bold;
        color: red;
    }

</style>



</head>
<body>
    

    <h1>Calculadora de IMC</h1>
<div class='conteiner'>
 
<form method="POST">

    <input type="number" name= 'peso'placeholder="Digite aqui seu peso">
    <br>
    <input type="number" name="altura" placeholder="Digite aqui sua altura (cm)">
    <br>
    <button type="submit">enviar</button>

</form>

    <?php include 'php.php'; ?>

</div>



</body>
</html>


