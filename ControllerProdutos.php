<?php

require_once("model/produtos.php");


class ControllerProdutos{
    private $produtos;

    public function __construct(){
        $this->produtos = new Produtos();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "produtos"){
            $this->incluir_produtos();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar_produtos"){
            $this->editar_produtos($_GET['id']);
        }
    }

    private function incluir_produtos(){
        $novonome = md5(time()).".jpg";
        $diretorio = "uploads/";
        move_uploaded_file($_FILES['imagem']['tmp_name'],$diretorio.$novonome);
        $this->produtos->setNome($_POST['txtNome']);
        $this->produtos->setDescricao($_POST['txtDescricao']);
        $this->produtos->setPreco($_POST['txtPreco']);
        $this->produtos->setImg($novonome);
        $result = $this->produtos->incluir_produtos();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='consultar_produto.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');</script>";
        }
    }

    public function listar_produtos($id){
        return $result = $this->produtos->listar_produtos($id);
    }


    private function editar_produtos($id){
        $novonome = md5(time()).".jpg";
        $diretorio = "uploads/";
        move_uploaded_file($_FILES['imagem']['tmp_name'],$diretorio.$novonome);
        $this->produtos->setId($id);
        $this->produtos->setNome($_POST['txtNome']);
        $this->produtos->setDescricao($_POST['txtDescricao']);
        $this->produtos->setPreco($_POST['txtPreco']);
        $this->produtos->setImg($novonome);
        $result = $this->produtos->editar_produtos($id);
        if($result >= 1){
            echo "<script>alert('Registro alterado com sucesso!');document.location='consultar_produto.php'</script>";
        }else{
            echo "<script>alert('Erro ao alterar o registro!');</script>";
        }
    }

    public function excluir_produtos($id){
        $result = $this->produtos->excluir_produtos($id);
        if($result >= 1){
            echo "<script>alert('Registro excluido com sucesso!');document.location='consultar_produto.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o registro!');</script>";
        }
    }
}
new ControllerProdutos();

?>