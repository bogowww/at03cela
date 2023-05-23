<?php
require_once('usuario.class.php');

Class Servidor extends Usuario{
    private $siape;
    private $dtAdmissao;

    public function __construct($psiape,$pnome,$prg,$plogin, $psenha, $pdtAdmissao){
        $this->setSiape($psiape);
        $this->setdtAdmissao($pdtAdmissao);
        parent::__construct($pnome,$prg,$plogin,$psenha);

    }
    
    public function getSiape() {
      return $this->siape;
    }
    public function setSiape($value) {
      $this->siape = $value;
    }

    public function getDtAdmissao() {
      return $this->dtAdmissao;
    }
    public function setDtAdmissao($value) {
      $this->dtAdmissao = $value;
    }
    public function inserir(){
      $sql = 'INSERT INTO servidor (nome, rg, login, senha, siape, dtAdmissao)
            VALUES (:nome, :rg, :login, :senha, :siape, :dtAdmissao)';
            $params = array(':nome'=>$this->getNome(), ':rg'=>$this->getRg(), ':login'=>$this->getLogin(), 
            ':senha'=>$this->getSenha(),':siape'=>$this->getSiape(), ':dtAdmissao'=>$this->getdtAdmissao());
            parent::executar($sql,$params);
    }

    public function editar(){
      $sql = 'UPDATE FROM servidor
            SET (nome = :nome, rg = :rg, login = :login, senha = :senha, siape = :siape, dtAdmissao = :dtAdmissao)';
            $params = array(':nome'=>$this->getNome(), ':rg'=>$this->getRg(), ':login'=>$this->getLogin(), 
            ':senha'=>$this->getSenha(),':siape'=>$this->getSiape(), ':dtAdmissao'=>$this->getdtAdmissao());
            parent::executar($sql,$params);
    }

    public function excluir($id){
      $conexao = Conexao::getInstance();
      $sql = 'DELETE FROM servidor WHERE id = :id';
      $params = array(':id'=>$id);
      $this->prepararComando($conexao, $sql, $params);
      $this->executar($sql, $params);
    }
    }

    $servidor = new servidor(1,'Maria', '123456','guzica@gmail.com','1234567','324143', '3 agroecologia');
    echo '<pre>';
    var_dump($servidor);
    echo '</pre>';

?>