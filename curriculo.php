<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo -  Download</title>
    <link rel="stylesheet" type="text/css" href="css/curriculo.css">
</head>

<?php
    ini_set('default_charset', 'utf-8');
    if($_POST){
    $nome = $_POST['nome'];   
    $email = $_POST['email'];   
    $profissao = $_POST['profissao'];    
    $date = $_POST['idade']; 
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone']; 
    $cidade = $_POST['cidade'];  
    $estado = $_POST['estado'];
    $estadocivil = $_POST['estadocivil'];
    $filho = $_POST['filho'];
    $experiencias = $_POST['experiencias'];
    $escolaridade = $_POST['escolaridade'];
    $arquivo = $_FILES['foto']['name'];
    
    // calcular idade da pessoa

function calcularIdade($date){
    $date = date('Y-m-d', strtotime(str_replace("/", "-", $date)));
            $time = strtotime($date);
            
            if($time === false){
                return '';
            }
            $year_diff = '';
            $date = date('Y-m-d', $time);
            
            list ($year, $month, $day) = explode('-', $date);
            
            $year_diff = date('Y') - $year;
            $month_diff = date('m') - $month;
            $day_diff = date('d') -$day;
            
            if ($day_diff < 0 && $month_diff < 0 || $month_diff < 0){
                $year_diff--;
            }
            return $year_diff;
            
            echo "Seu nome é $nome, você tem ".calcularIdade($date)." anos.";
        }
        
        // capturar imagem
if(isset($_FILES['foto']))
    {
        $ext = strtolower(substr($_FILES['foto']['name'],-4));
        $new_name = $_POST['nome'].$ext;
        $dir = 'img/';

        move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name);
    }
    
    //nome do arquivo
    $a = "$nome.html";
    
    $arquivo = fopen($a, 'a+');
    
    $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo -  Download</title>
    <link rel="stylesheet" type="text/css" href="css/curriculo.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/5d7c26c4ce.js" crossorigin="anonymous"></script>
</head>
<!-- CSS - Curriculo -->
    <style type="text/css">
             * {
                  margin: 0;
                  padding: 0;
                }
                .container {
                  display: grid;
                  grid-template-columns: 1.5fr 2.5fr;
                  grid-template-rows: 10vh 30vh 50vh 10vh;
                  grid-template-areas: "menu menu" "header text" "main div" "footer footer";
                }
                menu {
                  background: rgb(2,0,36);
                  background: linear-gradient(148deg, rgba(2,0,36,1) 0%, rgba(9,38,121,1) 40%, rgba(0,212,255,1) 100%);
                  grid-area: menu;
                  color: white;
                }
                /*centralizar texto*/
                menu h1{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                header {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  background-color: orange;
                  grid-area: header;
                  color: white
                }
                text{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                  background-color: red;
                  grid-area: text;
                  color: white;                
                }
                main {
                    
                  background-color: purple;
                  grid-area: main;
                  color: white;
                }
                div {
                    color: white;
                  background-color: green;
                  grid-area: div;
                }
                footer {
                  color: white;
                  background-color: black;
                  grid-area: footer;
                }
                .image{
                    
                    width: auto;
                    height: 20vh;
                    border-radius: 30%;

                }
                footer h1
                {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    
                }

    </style>
    <body>
    <div class="container">
       <menu>
          <h1>Currículo</h1>
        </menu>
        <header>
          <img src="http://andreyg.profrodolfo.com.br/PHP%20-%20Curriculo/'.$dir.$new_name.'" class="image">
        </header>
        <text>
            <h3>Nome:'.mb_strtoupper($nome).'</h3>
            <br>
            <h3>Idade:'.calcularIdade($date).'</h3>
            <br>
            <h3>E-mail:'.$email.'</h3>
            <br>
            <h3>Telefone:'.$telefone.'</h3>
            <br>
            <h3>Profissão:'.$profissao.'</h3>
        </text>

        <main>
          <h3>Endereço: '.$endereco.'</h3>
          <br>
          <h3>'.$cidade.' - '.$estado.'</h3>
          <br>
          <h3>Estado Civil: '.$estadocivil.'</h3>
          <br>
          <h3>Possui Filhos: '.$filho.'</h3>

        </main>

        <div>
          <h3>Experiências: '.$experiencias.'</h3>
          <br>
          <h3>Escolaridade: '.$escolaridade.'</h3>
          <br>
        </div>

        <footer>
          <h1>Currículo - Download || All rights reserved.</h1>
        </footer>
        
    </div>
</body>
</html>';
            
    //abrindo/criando o arquivo a ser trabalhado
    // $arquivo = fopen($a, 'a+');
    
    // //texto a ser escrito no arquivo
    // $texto = '<h1>Bem vindo(a) '.$nome. '!</h1>';
    // $texto .= '<h3 style="color:red">'.$email.'</h3>';
    // // $texto .= '<h4>Você escolheu a cor: '.$cor.'</h4>';
    // // $texto .= '<h4>Você nasceu em: '.$data_formatada.'</h4>';
    // $texto .= '<h4>Seu telefone é: '.$telefone.'</h4>';
    
    //escrever no arquivo
    fwrite($arquivo,$html);
    
    //fechar o arquivo
    fclose($arquivo);
    
    // echo '<a href="'.$a.'" download class="button_download"><br>Veja aqui o seu currículo </a>';
    //echo '<h1>'.var_dump($tel).'</h1>';
}


?>

<body>
       <div class="container">
             <menu>
                <h1>
                    Currículo  - Página para Download
                </h1>
              </menu>
            <!-- <header>
                header
            </header> -->

              <div>
                    <?php
            echo '<a href="'.$a.'" download class="button_download">Veja aqui o seu currículo </a>';

                    ?>
              </div>

        </div>
        
</body>
</html>