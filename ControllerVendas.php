<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/recuperacao-PW/model/vendas.php");

class ControllerVendas{
    private $vendas;

    public function __construct(){
        $this->vendas = new Vendas();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "vendas"){
            $this->incluir_vendas();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar_vendas"){
            $this->editar_vendas($_GET['id']);
        }
    }

    private function incluir_vendas(){
        $this->vendas->setCliente($_POST['txtCliente']);
        $this->vendas->setProduto($_POST['txtProduto']);
        $this->vendas->setData(date('Y-m-d',strtotime($_POST['txtData'])));
        $result = $this->vendas->incluir_vendas();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='consultar_vendas.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');document.location='consultar_vendas.php'</script>";
        }
    }

    public function listar_vendas($id){
        return $result = $this->vendas->listar_vendas($id);
    }

    private function editar_vendas($id){
        $this->vendas->setId($id);
        $this->vendas->setCliente($_POST['txtCliente']);
        $this->vendas->setProduto($_POST['txtProduto']);
        $this->vendas->setData(date('Y-m-d',strtotime($_POST['txtData'])));
        $result = $this->vendas->editar_vendas($id);
        if($result >= 1){
            echo "<script>alert('Registro alterado com sucesso!');document.location='consultar_vendas.php'</script>";
        }else{
            echo "<script>alert('Erro ao alterar o registro!');document.location='consultar_vendas.php'</script>";
        }
    }

    public function excluir_vendas($id){
        $result = $this->vendas->excluir_vendas($id);
        if($result >= 1){
            echo "<script>alert('Registro excluido com sucesso!');document.location='consultar_vendas.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o registro!');document.location='consultar_vendas.php'</script>";
        }
    }
}
new ControllerVendas();

?>