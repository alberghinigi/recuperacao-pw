<?php
require_once("banco_produtos.php");

class Produtos extends Banco_produtos {

    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $imagem;
    //Metodos Set

    public function setId($string){
        $this->id = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setDescricao($string){
        $this->descricao = $string;
    }
    public function setPreco($string){
        $this->preco = $string;
    }
    
    public function setImg($string){
        $this->imagem = $string;
    }
    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getPreco(){
        return $this->preco;
    }
    
    public function getImg(){
        return $this->imagem;
    }
    public function incluir_produtos(){
        return $this->setProdutos($this->getNome(),$this->getDescricao(),$this->getPreco(),$this->getImg());
    }

    public function listar_produtos($id){
    	return $this->getProdutos($id);
    }

    public function editar_produtos(){
        return $this->updateProdutos($this->getId(),$this->getNome(),$this->getDescricao(),$this->getPreco(),$this->getImg());
    }

    public function excluir_produtos($id){
        return $this->deleteProdutos($id);
    }
}
?>