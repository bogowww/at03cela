<?php
    class Database{

        public function criarConexao(){
            try{
                require_once("../../conf/conexao.php");
                $conexao = Conexao::getInstance();
                return $conexao;
            } catch(PDOException $e){
                echo ('erro ao conectar');
            }
        }

        /* public function inserir($nome, $rg, $login, $senha){
            $conexao = $this->criarConexao();
            $sql = 'INSERT INTO aluno (nome, rg, login, senha)
            VALUES (:nome, :rg, :login, :senha)';
            $params = array(':nome'=>$nome, ':rg'=>$rg, ':login'=>$login, ':senha'=>$senha);
            $this->prepararComando($conexao, $sql, $params);
            $this->executar();
        } */

        public function executar($sql, $par){
            $conexao = $this->criarConexao();
            $comando = $this->prepararComando($conexao, $sql, $par);
            return $comando->execute();
            } 

        public function prepararComando($con, $sql, $par){
            try{
                $comando = $con->prepare($sql);
            foreach($par as $chave=>$valor){
                $comando->bindValue($chave, $valor);
            } return $comando;
        }
            catch(PDOException $e){
            echo "erro: ".$e->errorInfo;
        }
    }
        public function excluir($id){
            
        }
        public function atualizar(){}
        public function listar(){}



    }

?>