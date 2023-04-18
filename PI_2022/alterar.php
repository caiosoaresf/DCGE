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

    $_SESSION['erro'] = "";

    if (isset ($_POST['email'])){
        $foto = $_FILES['foto'];
        if(!empty ($foto['name'])){           
           $largura = 150;
           $altura = 180;
           $tamanho = 1000;
           if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
            $_SESSION['erro'] = "nfoto";   
           }else{
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            $caminho_imagem = "./Imagens/Fotos_Perfil/" . $nome_imagem;
            echo $caminho_imagem;
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            $sql = mysqli_query($conexao,"update usuarios set foto='{$nome_imagem}' where Usuario = '{$_SESSION['usuario']}';");
           }
        }
         $_SESSION['email'] = $_POST['email'];
         $_SESSION['nome']  = $_POST['nome'];
         $Update = "update usuarios set email='{$_SESSION['email']}' where Usuario = '{$_SESSION['usuario']}';";
         $query = mysqli_query($conexao,$Update);
         $Update = "update usuarios set Nome='{$_SESSION['nome']}' where Usuario = '{$_SESSION['usuario']}';";
         $query = mysqli_query($conexao,$Update);
         header('location:users-profile.php');

    }else{
        $Senha = "select Senha from usuarios where Usuario = '{$_SESSION['usuario']}'; " ;
        $dados = mysqli_query($conexao, $Senha);
        $Senha = mysqli_fetch_array($dados,MYSQLI_NUM)[0];
        $SenhaAtual = $_POST['SenhaAtual'];
        if ($Senha == $SenhaAtual){
            $NovaSenha = $_POST['NovaSenha'];
            $ReSenha = $_POST['Re-Senha'];
            if($NovaSenha != $ReSenha){
                echo"<script>alert('As senhas não coincidem');
                window.location.href='users-profile.php';
                </script>";
            }else{
              $Update = "update usuarios set senha='{$NovaSenha}' where Usuario = '{$_SESSION['usuario']}';";
              $query = mysqli_query($conexao,$Update);
              header('location:users-profile.php');
            }
        }else{
            echo"<script>alert('A senha atual está incorreta');
            window.location.href='users-profile.php';
            </script>";
        }
    }
    
?>