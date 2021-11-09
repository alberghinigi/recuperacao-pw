<?php
require_once("banco.php");

class Clientes extends Banco {

    private $id;
    private $nome;
    private $endereco;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $telefone;
    private $celular;

    //Metodos Set

    public function setId($string){
        $this->id = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setEndereco($string){
        $this->endereco = $string;
    }
    public function setBairro($string){
        $this->bairro = $string;
    }
    public function setCEP($string){
        $this->cep = $string;
    }
    public function setCidade($string){
        $this->cidade = $string;
    }
    public function setEstado($string){
        $this->estado = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setCelular($string){
        $this->celular = $string;
    }

    //Metodos Get
    public function getId(){
        return $this->id;
    }
        public function getNome(){
        return $this->nome;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCEP(){
        return $this->cep;
    }
    public function getCidade(){
        return $this->cidade;
    }
    
    public function getEstado(){
        return $this->estado;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getCelular(){
        return $this->celular;
    }

    public function incluir_clientes(){
        return $this->setClientes($this->getNome(),$this->getEndereco(),$this->getBairro(),$this->getCEP(),$this->getCidade(),$this->getEstado(),$this->getTelefone(),$this->getCelular());
    }

    public function listar_clientes($id){
    	return $this->getClientes($id);
    }

    public function editar_clientes(){
        return $this->updateClientes($this->getId(),$this->getNome(),$this->getEndereco(),$this->getBairro(),$this->getCEP(),$this->getCidade(),$this->getEstado(),$this->getTelefone(),$this->getCelular());
    }

    public function excluir_clientes($id){
        return $this->deleteClientes($id);
    }
}
?>