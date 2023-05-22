<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    require "../../conf/conexao.php";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("select * from aluno where id = $id;"); 
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        $conteudo = $linha;
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CADASTRO</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form action="acao.php" method="post">
                <legend>CADASTRO DE ALUNO</legend>
                <div class="row">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="tipo" value="1">
                    <div class="col-4"><label for="nome">NOME:</label></div>
                    <div class="col-8"><input type="text" name="nome" id="nome" value="<?php if($acao == "editar") echo $conteudo["nome"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="rg">RG:</label></div>
                    <div class="col-8"><input type="text" name="rg" id="rg" value="<?php if($acao == "editar") echo $conteudo["rg"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="login">LOGIN:</label></div>
                    <div class="col-8"><input type="text" name="login" id="login" value="<?php if($acao == "editar") echo $conteudo["login"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="senha">SENHA:</label></div>
                    <div class="col-8"><input type="text" name="senha" id="senha" value="<?php if($acao == "editar") echo $conteudo["senha"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="mat">MATÉRIA:</label></div>
                    <div class="col-8"><input type="text" name="mat" id="mat" value="<?php if($acao == "editar") echo $conteudo["mat"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="turma">TURMA:</label></div>
                    <div class="col-8"><input type="text" name="turma" id="turma" value="<?php if($acao == "editar") echo $conteudo["turma"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><button type="submit" name="acao" id="acao" value="<?php if($acao == "editar") echo "editar"; else  echo "salvar";?>"><?php if($acao == "editar") echo "Editar"; else  echo "Salvar";?></button></div>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>