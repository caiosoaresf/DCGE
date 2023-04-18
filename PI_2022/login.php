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

    $Usuario = $_POST['Usuario'];
    $Senha = ($_POST['Senha']);

    $query = "select Usuario, Usuario from usuarios where Usuario = '{$Usuario}' and Senha = '{$Senha}';";
    $insert = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($insert);
    
    if($row == 1){
        $_SESSION["usuario"] = $Usuario;
        header('location:index.php');

    } else{
        header('location:pages-login.php');
         
    }
    /* */
?>