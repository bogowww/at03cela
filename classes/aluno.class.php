<?php
    require_once('usuario.class.php');

    Class Aluno extends Usuario{
        private $matricula;
        private $turma;

        public function __construct($pnome,$prg,$plogin, $psenha, $pmat, $pturma){
            $this->setMatricula($pmat);
            $this->setTurma($pturma);
            parent::__construct($pnome,$prg,$plogin,$psenha);

        }

    public function getMatricula() {
      return $this->matricula;
    }
    public function setMatricula($value) {
      $this->matricula = $value;
    }

    public function getTurma() {
      return $this->turma;
    }
    public function setTurma($value) {
      $this->turma = $value;
    }
    public function inserir(){
      $sql = 'INSERT INTO aluno (nome, rg, login, senha, matricula, turma)
            VALUES (:nome, :rg, :login, :senha, :matricula, :turma)';
            $params = array(':nome'=>$this->getNome(), ':rg'=>$this->getRg(), ':login'=>$this->getLogin(), 
            ':senha'=>$this->getSenha(),':matricula'=>$this->getMatricula(), ':turma'=>$this->getTurma());
            parent::executar($sql,$params);
    }
    public function excluir($id){
      $conexao = Conexao::getInstance();
      $sql = 'DELETE FROM aluno WHERE id = :id';
      $params = array(':id'=>$GLOBALS['id']);
      $this->prepararComando($conexao, $sql, $params);
      $this->executar($sql, $params);
    }
    public function editar(){
      $sql = 'UPDATE FROM aluno
            SET (nome = :nome, rg = :rg, login = :login, senha = :senha, matricula = :matricula, turma = :turma)';
            $params = array(':nome'=>$this->getNome(), ':rg'=>$this->getRg(), ':login'=>$this->getLogin(), 
            ':senha'=>$this->getSenha(),':matricula'=>$this->getMatricula(), ':turma'=>$this->getTurma());
            parent::executar($sql,$params);
    }
    }

    // $aluno = new Aluno(1,'Maria', '123456','guzica@gmail.com','1234567','324143', '3 agroecologia');
    // echo '<pre>';
    // var_dump($aluno);
    // echo '</pre>';

?>