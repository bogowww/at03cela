<!DOCTYPE html>
<html lang="pt-Br">
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
    <title>cadastrp de servidor</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form action="acao.php" method="post">
                <legend>cadastrp de aluno</legend>
                <div class="row">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="tipo" value="2">
                    <div class="col-4"><label for="nome">nome:</label></div>
                    <div class="col-8"><input type="text" name="nome" id="nome" value="<?php if($acao == "editar") echo $conteudo["nome"]; ?>"></div>
                </div>

                <div class="row">
                    <div class="col-4"><label for="rg">Rg:</label></div>
                    <div class="col-8"><input type="text" name="rg" id="rg" value="<?php if($acao == "editar") echo $conteudo["rg"]; ?>"></div>
                </div>

                <div class="row">
                    <div class="col-4"><label for="login">Login:</label></div>
                    <div class="col-8"><input type="text" name="login" id="login" value="<?php if($acao == "editar") echo $conteudo["login"]; ?>"></div>
                </div>

                <div class="row">
                    <div class="col-4"><label for="senha">Senha:</label></div>
                    <div class="col-8"><input type="text" name="senha" id="senha" value="<?php if($acao == "editar") echo $conteudo["senha"]; ?>"></div>
                </div>

                <div class="row">
                    <div class="col-4"><label for="siape">Siape:</label></div>
                    <div class="col-8"><input type="text" name="siape" id="siape" value="<?php if($acao == "editar") echo $conteudo["siape"]; ?>"></div>
                </div>

                <div class="row">
                    <div class="col-4"><label for="dtAdm">Data de admissao:</label></div>
                    <div class="col-8"><input type="text" name="dtAdm" id="dtAdm" value="<?php if($acao == "editar") echo $conteudo["dtAdm"]; ?>"></div>
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