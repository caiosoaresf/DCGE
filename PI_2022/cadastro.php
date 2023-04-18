<?php
    session_start();

    $host = "localhost:3307";
    $database = "dados";
    $user = "root";
    $password = "";

    $conexao = mysqli_connect($host, $user, $password, $database);
    if (!$conexao){
        die("Não conectou" + mysqli_connect_error());
    }

    $Nome = $_POST["Nome"];
    $Usuario = $_POST['Usuario'];
    $Senha = ($_POST['Senha']);
    $Email = $_POST["Email"];
        
    $VeriUsu = "select * from usuarios where Usuario = '{$Usuario}';";
    $insert = mysqli_query($conexao, $VeriUsu);
    $row = mysqli_num_rows($insert);
    if ($row == 1){
        echo "<script>
        alert('O Usuario se encontra cadastrado em nosso sistema, por favor tente novamente');history.back();
        </script>
        ";
    } else{
     $sql = "insert into usuarios(Nome, Usuario, Senha, Email) values ('{$Nome}', '{$Usuario}', '{$Senha}', '{$Email}');";
     $insert = mysqli_query($conexao, $sql);       
     header('location:pages-login.php');
    
    }


    
    exit;

?>