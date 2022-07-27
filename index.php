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

    















    echo "</div>"

























    

?>

