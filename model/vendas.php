<?php
require_once("banco_vendas.php");

class Vendas extends Banco_vendas {

    public $id;
    public $cliente;
    public $produto;
    public $data;

    //Metodos Set

    public function setId($string){
        $this->id = $string;
    }
    public function setCliente($string){
        $this->cliente = $string;
    }
    public function setProduto($string){
        $this->produto = $string;
    }
    public function setData($string){
        $this->data = $string;
    }

    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function getProduto(){
        return $this->produto;
    }
    public function getData(){
        return $this->data;
    }

    public function incluir_vendas(){
        return $this->setVendas($this->getCliente(),$this->getProduto(),$this->getData());
    }

    public function listar_vendas($id){
    	return $this->getVendas($id);
    }

    public function editar_vendas(){
        return $this->updateVendas($this->getId(),$this->getCliente(),$this->getProduto(),$this->getData());
    }

    public function excluir_vendas($id){
        return $this->deleteVendas($id);
    }
}
?>