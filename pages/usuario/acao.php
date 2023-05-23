<?php
    require "../../conf/conexao.php";
    $acao = isset($_POST["acao"]) ? $_POST["acao"] : $_GET["acao"];
    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : $_GET["tipo"];
    switch ($acao) {
        case 'salvar':
            require_once "../../classes/aluno.class.php";
            if ($tipo == 1) {
                $form = formAluno();
                $aluno = new Aluno($form["nome"], $form["rg"], $form["login"], $form["senha"], $form["matricula"], $form["turma"]);
                $aluno->inserir();
                header("location:index.php");
                break;
            }elseif ($tipo == 2) {
                $form = formServidor();
                $servidor = new Servidor($form["nome"], $form["rg"], $form["login"], $form["senha"], $form["siape"], $form["dtAdm"]);
                $servidor->inserir();
                header("location:index.php");
                break;
            }else {
                echo "tipo invalido???";
                die();
            }
            
        
        case 'deletar':
            require_once "../../classes/aluno.class.php";
            if ($tipo == 1) {
                $id = isset($_GET["id"]) ? $_GET["id"] : "0";
                if ($id == 0) {
                    echo "id invalido";
                    die();
                }
                $form = formAluno();
                $aluno = new Aluno($form["nome"], $form["rg"], $form["login"], $form["senha"], $form["matricula"], $form["turma"]);
                $aluno->excluir($id);
                header("location:index.php");
                break;
            }elseif ($tipo == 2) {
                $form = formServidor();
                $servidor = new Servidor($form["nome"], $form["rg"], $form["login"], $form["senha"], $form["matricula"], $form["turma"]);
                $servidor->excluir($id);
                header("location:index.php");
                break;
            }else {
                echo "erro de tipo invalido??? que";
                echo "<a href='index.php'>voltar</a>";
                die();
            }
        case 'editar':
            require_once "../../classes/aluno.class.php";
            if ($tipo == 1) {
                $form = formAluno();
                $aluno = new Aluno($form["nome"], $form["rg"], $form["login"], $form["senha"], $form["matricula"], $form["turma"]);
                $aluno->editar();
                header("location:index.php");
                break;
            }elseif ($tipo == 2) {
                $form = formServidor();
                $servidor = new Servidor($form["nome"], $form["rg"], $form["login"], $form["senha"], $form["matricula"], $form["turma"]);
                $servidor->editar();
                header("location:index.php");
                break;
            }else {
                echo "tipo invalido denovo FSDGBFGSDNV ";
                die();
            }
    }
    function formAluno(){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
        $matricula = isset($_POST["mat"]) ? $_POST["mat"] : "";
        $turma = isset($_POST["turma"]) ? $_POST["turma"] : "";
        $form = array(  
                        "nome" => "$nome", 
                        "rg" => "$rg", 
                        "login" => "$login", 
                        "senha" => "$senha", 
                        "matricula" => "$matricula", 
                        "turma" =>"$turma"
                    );
        return $form;
    }
    function formServidor(){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
        $siape = isset($_POST["siape"]) ? $_POST["siape"] : "";
        $dtAdm = isset($_POST["dtAdm"]) ? $_POST["dtAdm"] : "";
        $form = array(  
                        "nome" => "$nome", 
                        "rg" => "$rg", 
                        "login" => "$login", 
                        "senha" => "$senha", 
                        "siape" => "$siape", 
                        "dtAdm" =>"$dtAdm"
                    );
        return $form;
    }
?>