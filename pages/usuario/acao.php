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
                echo "<H1>ERRO MARCELA DE QUALIDADE: TIPO INVÁLIDO</H1>";
                die();
            }
            
        
        case 'deletar':
            require_once "../../classes/aluno.class.php";
            if ($tipo == 1) {
                $id = isset($_GET["id"]) ? $_GET["id"] : "0";
                if ($id == 0) {
                    echo "<H1>ERRO #DS49NF: ID INVÁLIDO</H1>";
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
                echo "<H1>ERRO MARCELA DE QUALIDADE: TIPO INVÁLIDO</H1>";
                echo "<a href='index.php'>VOLTAR</a>";
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
                echo "<H1>ERRO MARCELA DE QUALIDADE: TIPO INVÁLIDO</H1>";
                die();
            }
    }
    function formAluno(){
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
        $matricula = isset($_POST["mat"]) ? $_POST["mat"] : "";
        $turma = isset($_POST["turma"]) ? $_POST["turma"] : "";
        $form = array(  "nome" => "$nome", 
                        "rg" => "$rg", 
                        "login" => "$login", 
                        "senha" => "$senha", 
                        "matricula" => "$matricula", 
                        "turma" =>"$turma"
                    );
        return $form;
    }
    function formServidor(){
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
        $siape = isset($_POST["siape"]) ? $_POST["siape"] : "";
        $dtAdm = isset($_POST["dtAdm"]) ? $_POST["dtAdm"] : "";
        $form = array(  "nome" => "$nome", 
                        "rg" => "$rg", 
                        "login" => "$login", 
                        "senha" => "$senha", 
                        "siape" => "$siape", 
                        "dtAdm" =>"$dtAdm"
                    );
        return $form;
    }
?>