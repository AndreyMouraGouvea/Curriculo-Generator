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
    $idade = $_POST['idade']; 
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone']; 
    $cidade = $_POST['cidade'];  
    $estado = $_POST['estado'];
    $estadocivil = $_POST['estadocivil'];
    $filho = $_POST['filho'];
    $experiencias = $_POST['experiencias'];
    $escolaridade = $_POST['escolaridade'];
    $arquivo = $_FILES['foto']['name'];
    
    
    //nome do arquivo
    $a = "$nome.html";
    
    //abrindo/criando o arquivo a ser trabalhado
    $arquivo = fopen($a, 'a+');
    
    //texto a ser escrito no arquivo
    $texto = '<h1>Bem vindo(a) '.$nome. '!</h1>';
    $texto .= '<h3 style="color:red">'.$email.'</h3>';
    // $texto .= '<h4>Você escolheu a cor: '.$cor.'</h4>';
    // $texto .= '<h4>Você nasceu em: '.$data_formatada.'</h4>';
    $texto .= '<h4>Seu telefone é: '.$telefone.'</h4>';
    
    //escrever no arquivo
    fwrite($arquivo,$texto);
    
    //fechar o arquivo
    fclose($arquivo);
    
    // echo '<a href="'.$a.'" download class="button_download"><br>Veja aqui o seu currículo </a>';
    //echo '<h1>'.var_dump($tel).'</h1>';
}


?>

<?php

function calcularIdade($date){
    $date = date('Y-m-d', strtotime(str_replace("/", "-", $idade)));
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