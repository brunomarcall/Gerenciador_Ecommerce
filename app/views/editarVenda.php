<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edição-Venda</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="app/views/styles/css/sb-admin-2.css" rel="stylesheet">
  <link rel="shortcut icon" href="app/views/styles/img/img/Logo_circle.png">
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">

                <?php 
                  use Config\Modelo;
                  use Models\Venda;

                  $id = $_GET['id'];

                ?>
                <h4>Formulário de Edição</h4>
        <form action="<?=BASE_URL?>updateVenda" method="post" style="margin-top: 20px">
        <div class="form-group">
                <label>Código do Venda</label>
                <input type="text" class="form-control" name="id" value="<?php echo $id?>"  disabled>
                <input type="text" class="form-control" name="idUp" value="<?php echo $id?>"  style="display: none;">
            </div>
            <div class="form-group">
                <label>Valor</label>
                <input type="Number" class="form-control" name="nome" placeholder="Insira o nome do Venda" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Data</label>
                <input type="date" class="form-control" name="categoria" placeholder="Insira a categoria do Venda" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Pagamento: </label><br>
               <select >
                   <option value="1">
                       Cartão
                   </option>
                   <option value="2">
                       Dinheiro
                   </option>
               </select>
            </div>
           
            <div style="text-align: right">
                <a href="<?=BASE_URL?>/listar" role="button" class="btn btn-sm btn-primary">Voltar</a>
                <button type="submit" class="btn btn-sm btn-primary">Recadastrar</button>
            </div>
        </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
