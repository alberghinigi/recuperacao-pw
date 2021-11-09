<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/recuperacao-PW/model/clientes.php");

class ControllerClientes{

    private $clientes;

    public function __construct(){
        $this->clientes = new Clientes();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "clientes"){
            $this->incluir_clientes();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar"){
            $this->editar_clientes($_GET['id']);
        }
    }

    private function incluir_clientes(){
        $this->clientes->setNome($_POST['txtNome']);
        $this->clientes->setEndereco($_POST['txtEndereco']);
        $this->clientes->setBairro($_POST['txtBairro']);
        $this->clientes->setCEP($_POST['txtCEP']);
        $this->clientes->setCidade($_POST['txtCidade']);
        $this->clientes->setEstado($_POST['txtEstado']);
        $this->clientes->setTelefone($_POST['txtTelefone']);
        $this->clientes->setCelular($_POST['txtCelular']);
        $result = $this->clientes->incluir_clientes();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='consultar_clientes.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');document.location='consultar_clientes.php'</script>";
        }
    }

    public function listar_clientes($id){
        return $result = $this->clientes->listar_clientes($id);
    }

    private function editar_clientes($id){
        $this->clientes->setId($id);
        $this->clientes->setNome($_POST['txtNome']);
        $this->clientes->setEndereco($_POST['txtEndereco']);
        $this->clientes->setBairro($_POST['txtBairro']);
        $this->clientes->setCEP($_POST['txtCEP']);
        $this->clientes->setCidade($_POST['txtCidade']);
        $this->clientes->setEstado($_POST['txtEstado']);
        $this->clientes->setTelefone($_POST['txtTelefone']);
        $this->clientes->setCelular($_POST['txtCelular']);
        $result = $this->clientes->editar_clientes($id);
        if($result >= 1){
            echo "<script>alert('Registro alterado com sucesso!');document.location='consultar_clientes.php'</script>";
        }else{
            echo "<script>alert('Erro ao alterar o registro!');document.location='consultar_clientes.php'</script>";
        }
    }

    public function excluir_clientes($id){
        $result = $this->clientes->excluir_clientes($id);
        if($result >= 1){
            echo "<script>alert('Registro excluido com sucesso!');document.location='consultar_clientes.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o registro!');</script>";
        }
    }
}
new ControllerClientes();


?>