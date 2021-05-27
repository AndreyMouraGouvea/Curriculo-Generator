<!--
<style>
    input:invalid + span:after{
        content: 'X';
        color: red;
        padding-left: 5px;
    }
    input: valid + span:after{
        content: '✔';
        color: #26b72b;
        padding-left: 5px;
    }
</style>
-->
<form method="post">
Digite seu nome: <input type="text" name="nome"><br>
Seu email: <input type="text" name="email"><br>
Escolha sua cor favorita: <input type="color" name="cor"><br>
Sua data de nascimento: <input type="date" name="data"><br>
Digite seu telefone: <input type="number" name="tel" 
pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" placeholder="(11)92345-6789"><br>

<button type="submit">Enviar</button>
</form>
<?php
    ini_set('default_charset', 'utf-8');
    if($_POST){
    $nome = $_POST['nome'];   
    $email = $_POST['email'];   
    $cor = $_POST['cor'];    
    $data = $_POST['data']; 
    $tempo = strtotime($data);
    $data_formatada = date('d/m/Y', $tempo);
    
    $tel = $_POST['tel'];
    //nome do arquivo
    $a = "$nome.html";
    
    //abrindo/criando o arquivo a ser trabalhado
    $arquivo = fopen($a, 'a+');
    
    //texto a ser escrito no arquivo
    $texto = '<h1>Bem vindo(a) '.$nome. '!</h1>';
    $texto .= '<h3 style="color:red">'.$email.'</h3>';
    $texto .= '<h4>Você escolheu a cor: '.$cor.'</h4>';
    $texto .= '<h4>Você nasceu em: '.$data_formatada.'</h4>';
    $texto .= '<h4>Seu telefone é: '.$tel.'</h4>';
    
    //escrever no arquivo
    fwrite($arquivo,$texto);
    
    //fechar o arquivo
    fclose($arquivo);
    
    echo '<a href="'.$a.'" download><br>Veja aqui o seu currículo </a>';
    //echo '<h1>'.var_dump($tel).'</h1>';
}


?>