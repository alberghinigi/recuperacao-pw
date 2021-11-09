<?php

require_once("banco_config.php");

class Banco_vendas{

    
    protected $mysqli;
    private $vendas;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }


    public function setVendas($cliente,$produto,$data){
        $stmt = $this->mysqli->prepare("INSERT INTO vendas (`cliente`, `produto`, `data`) VALUES (?,?,?);");
        $stmt->bind_param("sss",$cliente,$produto,$data);
        if( $stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getVendas($id) {
        try {
            if(isset($id) && $id > 0){
                $stmt = $this->mysqli->query("SELECT * FROM vendas WHERE id = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM vendas;");
            }
            
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['cliente'] = $l['cliente'];
                $f_lista[$i]['produto'] = $l['produto'];
                $f_lista[$i]['data'] = $l['data'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function updateVendas($id,$nome,$descricao,$preco){
       $stmt = $this->mysqli->query("UPDATE vendas SET `cliente` = '" . $this->cliente . "', `produto` =  '" . $this->produto. "', `data` =  '" . $this->data . "' WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }

    public function deleteVendas($id){
        $stmt = $this->mysqli->query("DELETE FROM vendas WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }
}
?>