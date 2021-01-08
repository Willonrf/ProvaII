<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de especie</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <script src="../script/validacao.js"></script>
        <?php
             $conexao = new mysqli("localhost", "root", "vertrigo","petshop");
             if(isset($_GET["id"])){
                $id = $_GET["id"];
                $dados = $conexao->query("SELECT * FROM especie WHERE idEspecie=" . $id);
                $linha = $dados->fetch_assoc();

                $nome = $linha["nomeEspecie"];
                $descricao = $linha["descricao"];
             } else { 
                $id = 0;
                $nome = "";
                $descricao = "";
             }
        ?>
    </head>
    <body class="fundo">
        <div class="container">
            <div class="cont col-12">Cadastro Especie</div>
            <form class="row" action="processos.php" method="POST">
                <div class="col-12">
                    <label for="nomeEspecie" class="escrita">Nome da especie:</label>
                    <input id="nomeEspecie" type="text" name="nomeEspecie" class="form-control" value="<?=$nome;?>" autofocus>
                </div>
                <div class="col-12">
                    <label for="descricao" class="escrita">Descrição:</label>
                    <textarea id="descricao" name="descricao" rows="4" class="form-control" ><?=$descricao;?></textarea>
                </div>
                <div class="col-6">
                    <input type="hidden" id="id" name="id" value="<?=$id;?>" />
                    <button type="button" class="btn btn-primary" id="voltar" onclick="document.location='../index.php'">
                        Voltar
                    </button>
                    <button type="submit" onclick="return validarEspecie()" class="btn btn-success" id="cadastrar">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
        <br/>
        <table class="table table-striped table-dark escrita container">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexao = new mysqli("localhost", "root", "vertrigo","petshop");
                    $tabela = $conexao->query("SELECT * FROM especie");
                    while($linha = $tabela->fetch_assoc()){
                ?>        
                    <tr>
                        <td><?=$linha["nomeEspecie"];?></td>
                        <td><?=$linha["descricao"];?></td>
                        <td>
                            <div class="col-4" id="editor">
                                <a class="btn btn-warning" href="CadastroEspecie.php?id=<?=$linha["idEspecie"];?>">
                                    Editar
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="col-4" id="excluir">
                                <a class="btn btn-danger" href="crud/excluir.php?id=<?=$linha["idEspecie"];?>">
                                    Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php        
                    }
                    mysqli_close($conexao);
                ?>
            </tbody>
        </table>
    </body>
</html>