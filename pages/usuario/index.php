<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <?php
    require "../../conf/conexao.php";
    ?>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>INDEQUES</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" class="form-control" name="filtro" id="filtro"><input type="submit" class="btn btn-success" value="pesquisar">
    </form>
    <?php echo "<table class='table'>"?>
        <legend>ALUNOS</legend>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Rg</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Matricula</th>
            <th>Turma</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    
        <?php
        $filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
            $conexao = Conexao::getInstance();
            $sql = $conexao->query("SELECT * FROM aluno WHERE nome like '$filtro%';");
            while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$linha["id"]}</td>
                    <td>{$linha["nome"]}</td>
                    <td>{$linha["rg"]}</td>
                    <td>{$linha["login"]}</td>
                    <td>{$linha["senha"]}</td>
                    <td>{$linha["matricula"]}</td>
                    <td>{$linha["turma"]}</td>
                    <td><a href='cadaluno.php?acao=editar&id={$linha["id"]}&&tipo=1'>Edit</a></td>
                    <td><a href='acao.php?acao=deletar&id={$linha["id"]}&&tipo=1'>Delete</a></td>
                </tr>";
            }
        ?>
    
    </table>
    <a href="cadaluno.php">cadastro de aluno</a>
    <?php echo "<table class='table'>"?>
        <legend>SERVIDORES</legend>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Rg</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Matricula</th>
            <th>Turma</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        
            <?php
                $filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
                $conexao = Conexao::getInstance();
                $sql = $conexao->query("SELECT * FROM servidor WHERE nome like '$filtro%';");
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                    <tr>
                        <td>{$linha["id"]}</td>
                        <td>{$linha["nome"]}</td>
                        <td>{$linha["rg"]}</td>
                        <td>{$linha["login"]}</td>
                        <td>{$linha["senha"]}</td>
                        <td>{$linha["siape"]}</td>
                        <td>{$linha["dtAdmissao"]}</td>
                        <td><a href='cadservidor.php?acao=editar&id={$linha["id"]}&&tipo=2'>Edit</a></td>
                        <td><a href='acao.php?acao=deletar&id={$linha["id"]}&&tipo=2'>Delete</a></td>
                    </tr>
                    ";
                }
            ?>
    </table>
    <a href="cadservidor.php">Cadstrar</a>
</body>
</html>