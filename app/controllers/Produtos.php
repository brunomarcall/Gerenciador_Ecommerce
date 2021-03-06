<?php

namespace Controllers;


use Config\Modelo;
use Controllers\Controlador;
use Models\Produto;

class Produtos extends Controlador
{


    public function __construct()
    {
        parent::__construct();
    }

    public static function verificarProduto($nome)
    {
        return (Produto::select()->where('nome', $nome)->get()) ?? false;
    }

    public function inserirProdutos()
    {
        $nome = $_POST['nome'] ?? null;
        $categoria = $_POST['categoria'] ?? null;
        $quantidade = $_POST['quantidade'] ?? null;
        $valor = $_POST['valor'] ?? null;

        if ($nome && $categoria && $quantidade && $valor) {
            $produto = Produtos::verificarProduto($nome);
            if (count($produto) <= 0) {

                $_SESSION['codigo_produto'] = Produtos::adicionarProduto($categoria, $nome, $quantidade, $valor);
                $_SESSION['cadastrado'] = 'Produto Cadastrado com Sucesso';
                // $_SESSION['id'] = $id;
                $this->redirecionar('listar');
            } else {
                unset($_SESSION['cadastrado']);
                $_SESSION['erro'] = 'Produto já Cadastrado';
                $this->redirecionar('listar');
            }
        }
        $this->redirecionar();
    }

    public function adicionarProduto($categoria, $nome, $quantidade, $valor)
    {
        try {
            Produto::insert([
                'nome' => $nome,
                'valor' => Controlador::moeda($valor),
                'id_categoria' => $categoria,
                'id_statusproduto' => 1,
                'id_usuario' => $_SESSION['user']['id'],
                'quantidade' => $quantidade
            ])->execute();
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function excluirProduto()
    {
        $id = $_GET['id'];
        Produto::delete()->where('id', $id)->execute();
        $this->redirecionar('listar');
    }

    public function updateProduto()
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];

        Produto::update()
            ->set('nome', $nome)
            ->set('id_categoria', $categoria)
            ->set('quantidade', $quantidade)
            ->set('valor', $valor)
            ->where('id', $id)
            ->execute();

        $this->redirecionar('listar');
    }

    public static function listarProdutos()
    {
        $nomeProdutos = Produto::select(['id', 'nome', 'quantidade', 'valor'])
            ->where('id_usuario', $_SESSION['user']['id'])
            ->get();
        return $nomeProdutos ?? [];
    }
}
