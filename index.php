<link rel="stylesheet" href="style.css">
<body style="font-family:arial">
    
</body>
<?php

echo "<div class='foreach'>";
$bolachas = ["passatempo", "bono", "trakinas", "1", "2", 54, "34"];
sort($bolachas);
    echo "<ul style='font-family:arial'> Essas bolachas são top";
    foreach ($bolachas as $bolachitas) {
        echo "<li> $bolachitas</li>";
    }
echo "</ul>";
echo "</div>";
//____________________________________________________________________
    echo "<div class='assoc'>";
    echo "<hr><h1> Agora são matrizes associativas ↓↓↓</h1><br>";

    $inf = ["bolacha" => "trakinas", "carro" => "corolla",
              "temperatura" => "25º", "bebida" => "água"];

    echo "Meu carro é um $inf[carro], estou comendo
    uma $inf[bolacha] enquanto bebo $inf[bebida] e faz uma
    temperatura de $inf[temperatura].<br><br>";
    echo "</div>";
//_______________________________________________________________
    echo "<div class='fun'>";
    echo "<hr><h1> Agora são funções ↓↓↓</h1><br>";

  //  function escrever($nfode) {
  //      echo "teste $nfode";
  //  }
  //  escrever("");

    class bolacha {
        public $sabor;
        public $recheio;
        public function __construct($sabor,$recheio) {
            $this->sabor = $sabor;
            $this->recheio = $recheio;
    }
        public function retorno(){
            return "O sabor da bolacha é $this->sabor e
                    o recheio dela é $this->recheio!<br><br>";
        }
    }

    $recheadinho = new bolacha("goiaba","doce de goiaba");
    
    echo $recheadinho->retorno();

//    foreach($_SERVER as $chave =>$valor){
//        echo "<strong>$chave</strong> : $valor <br>";
//    }

    class carro {
        public $modelo;
        public $cor;
        public $ano;
        public function __construct($modelo,$cor,$ano) {
            $this->modelo=$modelo;
            $this->cor=$cor;
            $this->ano=$ano;
        }

        public function retorno() {
            return "• O meu novo carro é um $this->modelo de 
            $this->ano da cor $this->cor<br>";
        }
                   
    }

    $gol = new carro("gol","preta","2008");
    $corolla = new carro("corolla","prata","2014");
    $impala = new carro("impala","preta","1967"); 
    $carross = [$gol,$corolla,$impala];
    
    foreach ($carross as $kros) {
        echo $kros->retorno();
    }
    echo "</div>";
//_______________________________________________________________
    echo '<div class="get">';
    echo "<hr><h1> Agora é o método GET ↓↓↓</h1><br>";

// A função get é um array que pega uma informação do url.

    if (isset($_GET['nome']) && isset($_GET['idade']) == true) {
        if (empty($_GET['nome']) or empty($_GET['idade']) == true) {
            echo "Os dados não foram informados corretamente!";
        } else {
        class dadosUrl {
            public $nome;
            public $idade;
            public function __construct($nome,$idade) {
                $this->nome = $nome;
                $this->idade = $idade;
            }
            function retorno() {
                return "O nome é $this->nome e a idade
                é $this->idade";
            }
        }

        $dadosUrl = new dadosUrl($_GET['nome'],$_GET['idade']);

        echo $dadosUrl->retorno();
    }}


  //  $idade = $_GET['idade'];
  //  $país = $_GET['país'];
//    $dadosUrl = [$_GET['nome'], $_GET['idade']];

//    echo "O nome no url é $nome e a idade no url é $idade.";


    echo "<form> 
        <br>
        <input type='text' name='nome' placeholder='Insira aqui o nome'>
        <input type='text' name='idade' placeholder='Insira aqui a idade'>
        <button type=submit method='get'> Enviar </button>
    </form>";
    echo "</div>";
//______________________________________________________________
    echo '<div class="post">';
    echo "<hr><h1> Agora é o método POST ↓↓↓</h1><br>";

    function limpar($valor) {
        $valor = trim($valor);
        $valor = stripslashes($valor);
        $valor = htmlspecialchars($valor);
        return $valor;
    }
    class post {
        public $ocupacao;
        public $salario;
        public function __construct($ocupacao,$salario) {
            $this->ocupacao= limpar($ocupacao);
            $this->salario= limpar($salario);
        }

        function retornar() {
            echo "A ocupação é $this->ocupacao e o salário é
            $this->salario";
        }       
    }

    if (isset($_POST['ocup']) && isset($_POST['sal']) == true) {
        if (empty($_POST['ocup']) || empty($_POST['sal'])) {
            echo "Um ou mais campos estão em branco!";
        } else {
            $ocup = $_POST['ocup'];
            $salar = $_POST['sal'];
            $dadosPost = new post($ocup,$salar);

            $dadosPost->retornar();
        }
    } else {
        echo "n existe porra";
    }

    echo "<form method='post' action=''> 
        <br>
        <input type='text' name='ocup' placeholder='Insira aqui o nome'>
        <input type='text' name='sal' placeholder='Insira aqui a idade'>
        <button type=submit> Enviar </button>
    </form>";
//______________________________________________________________________________________________
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
            return "A distância entre a primeira e a segunda data é $res dia!";
        } else {return "A distância entre a primeira e a segunda data é $res dias!";
        }
    }

        $result = "5";

    echo "</div>";

    















    echo "</div>"

























    

?>

