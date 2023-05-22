<?php
    require_once "database.class.php";
    Class Usuario EXTENDS Database{

        private $nome;
        private $rg;
        private $login;
        private $senha;

        public function __construct($pnome,$prg,$plogin, $psenha){
            $this->setNome($pnome);
            $this->setRg($prg);
            $this->setLogin($plogin);
            $this->setSenha($psenha);    
        }
    public function getNome() {
      return $this->nome;
    }
    public function setNome($value) {
      $this->nome = $value;
    }

    public function getRg() {
      return $this->rg;
    }
    public function setRg($value) {
      $this->rg = $value;
    }

    public function getLogin() {
      return $this->login;
    }
    public function setLogin($value) {
      $this->login = $value;
    }

    public function getSenha() {
      return $this->senha;
    }
    public function setSenha($value) {
      $this->senha = $value;
    }
    public function excluir($id){
      
    }
    }
    


?>

	
