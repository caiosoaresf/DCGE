<!DOCTYPE html>
<html lang="en">
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
    if(!isset($_SESSION["usuario"])){
      header('location:pages-login.php');
    }

    $sql = "select codigo, nome from eletronicos;";
    $dados = mysqli_query($conexao, $sql)
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Calculadora</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!--Bootstap select-->
 
 
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">DCGE</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Calculadora</h5>
                  </div>
                  
                  <form class="row g-3 needs-validation" novalidate>
                    <div>
                      <select class="form-select" size="1" aria-label="size 3 select example">
                        <option selected>Selecione um Componente</option>
                        <?php 
                        while ($linha = mysqli_fetch_array($dados,MYSQLI_NUM)){
                            echo "<option value='{$linha[0]}'>{$linha[1]}</option>";
                        }

                    ?> 
                      </select>
                      
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Uso por dia: </label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">Minutos:</span>
                        <input type="text" name="username" class="form-control" id="uso" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Kw/h do produto:</label>
                      <input type="number" name="password" class="form-control" id="kwh" required>
                    </div>

                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Tarifa da Conta de Luz</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">R$:</span>
                            <input type="text" name="username" class="form-control" id="tarifa" required>
                          </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" onclick="calcKw()">Calcular</button>
                    </div>

                  </form>

                </div>
              </div>

              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Script Da Calculadora -->
  <script src="./assets/js/calc.js"> </script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Script Select -->
  

</body>

</html>