<?php

require_once("banco_config.php");

class Banco_produtos{

    
    protected $mysqli;
    private $produtos;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }


    public function setProdutos($nome,$descricao,$preco,$imagem){
        $stmt = $this->mysqli->prepare("INSERT INTO produtos (`nome`, `descricao`, `preco`, `img`) VALUES (?,?,?,?);");
        $stmt->bind_param("ssss",$nome,$descricao,$preco,$imagem);
        if( $stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getProdutos($id) {
        try {
            if(isset($id) && $id > 0){
                $stmt = $this->mysqli->query("SELECT * FROM produtos WHERE id = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM produtos;");
            }
            
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['descricao'] = $l['descricao'];
                $f_lista[$i]['preco'] = $l['preco'];
                $f_lista[$i]['img'] = $l['img'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function updateProdutos($id,$nome,$descricao,$preco,$imagem){
       $stmt = $this->mysqli->query("UPDATE produtos SET `nome` = '" . $nome . "', `descricao` =  '" . $descricao . "', `preco` =  '" . $preco . "', `img` = '".$imagem."' WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }

    public function deleteProdutos($id){
        $stmt = $this->mysqli->query("DELETE FROM produtos WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }
}
?>