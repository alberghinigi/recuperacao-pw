<?php

require_once("banco_config.php");
    
class Banco{

    protected $mysqli;
    private $clientes;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setClientes($nome,$endereco,$bairro,$cep,$cidade,$estado,$telefone,$celular){
        $stmt = $this->mysqli->prepare("INSERT INTO clientes (`nome`, `endereco`, `bairro`, `cep`, `cidade`,`estado`,`telefone`,`celular`) VALUES (?,?,?,?,?,?,?,?);");
        $stmt->bind_param("ssssssss",$nome,$endereco,$bairro,$cep,$cidade,$estado,$telefone,$celular);
        if( $stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getClientes($id) {
        try {
            if(isset($id) && $id > 0){
                $stmt = $this->mysqli->query("SELECT * FROM clientes WHERE id = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM clientes;");
            }
            
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['endereco'] = $l['endereco'];
                $f_lista[$i]['bairro'] = $l['bairro'];
                $f_lista[$i]['cep'] = $l['cep'];
                $f_lista[$i]['estado'] = $l['estado'];
                $f_lista[$i]['cidade'] = $l['cidade'];
                $f_lista[$i]['telefone'] = $l['telefone'];
                $f_lista[$i]['celular'] = $l['celular'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function getNomeClientes($id,$nome){
        $stmt = $this->mysqli->query("SELECT nome FROM clientes WHERE id = '" . $id . "';");

}

    public function updateClientes($id,$nome,$endereco,$bairro,$cep,$cidade,$estado,$telefone,$celular){
       $stmt = $this->mysqli->query("UPDATE clientes SET `nome` = '" . $nome . "', `endereco` =  '" . $endereco . "', `bairro` =  '" . $bairro . "', `cep` =  '" . $cep . "', `cidade` =   '" . $cidade . "', `estado` = '". $estado . "', `telefone` = '".$telefone."', `celular`='" . $celular ."' WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }

    public function deleteClientes($id){
        $stmt = $this->mysqli->query("DELETE FROM clientes WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }

}    
?>