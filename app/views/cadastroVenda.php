<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro-Venda</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                                    <h4>Formulário de Venda</h4>
                                    <form action="<?= BASE_URL ?>inserirVenda" method="post" style="margin-top: 20px">
                                        <div class="form-group">
                                            <label>Data</label>
                                            <input type="date" class="form-control" name="dtVenda" placeholder="Insira a data do Venda" required autocomplete="off" style="width:50%;border-radius:10rem;height: calc(2em + 0.75rem + 2px);">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-7 mb-2 mb-sm-0">
                                                <label>Produto:</label><br>

                                                <select class="form-control" name="produto" id="produto"
                                                    style="border-radius:10rem;height: calc(2em + 0.75rem + 2px);">
                                                    <option value="0">Produto</option>
                                                    <?php
                                                      foreach ($dadosView['produtos'] as $itens => $value) {
                                                        echo "<option value=".$value['id']." qtd=".$value['quantidade']." valor=".str_replace(',','.', str_replace('.', '', str_replace('R$ ', '', $value['valor']))).">".$value['nome']."</option>";
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <label>Quantidade:</label><br>
                                                <input name="quantidade" type="number" min="1" class="form-control form-control-user" id="qtd" placeholder="quantidade"equired autocomplete="off" maxlength="5" style="border-radius:10rem;height: calc(2em + 0.75rem + 2px);">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Forma de Pagamento:</label><br>

                                            <select class="form-control" name="tpPagamento" style="border-radius:10rem;height: calc(2em + 0.75rem + 2px);">
                                                <option value="0">Selecione</option>
                                                <?php
                                                  foreach ($dadosView['pagamentos'] as $itens => $value) {
                                                    echo "<option value=" . $value['id'] . ">" . $value['nome'] . "</option>";
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Valor Total:</label>
                                            <input 
                                                readonly="true"
                                                type="number" class="form-control" name="valorTotal" id="valorTotal"
                                                placeholder="valor total" step="0.01" required autocomplete="off" maxlength="15"
                                                style="width:50%;border-radius:10rem;height: calc(2em + 0.75rem + 2px);"
                                                maxlength="15">
                                        </div>
                                        <div style="text-align: right">
                                            <a href="<?= BASE_URL ?>listaVendas" role="button"
                                                class="btn btn-sm btn-primary">Voltar</a>
                                            <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
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

    <script>
    var vProduto = document.getElementById('produto');
    var qtd = document.getElementById('qtd');
    var valorTotal = document.getElementById('valorTotal');
    vProduto.onchange = () => {
        qtd.setAttribute("max", vProduto.options[vProduto.selectedIndex].getAttribute("qtd"));
        valorTotal.value = '';
        qtd.value = '';
    }
    qtd.onchange = () => {
        valorTotal.value = qtd.value * vProduto.options[vProduto.selectedIndex].getAttribute("valor");
    }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>