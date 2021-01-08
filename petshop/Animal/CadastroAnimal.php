<!DOCTYPE html>
<html>
    <head>
        <title>Petshop-Cadastro</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <script src="../script/validacao.js"></script>
        <?php
             $conexao = new mysqli("localhost", "root", "vertrigo","petshop");
             if(isset($_GET["id"])){
                $id = $_GET["id"];
                $dados = $conexao->query("SELECT * FROM animal WHERE idAnimal=" . $id);
                $linha = $dados->fetch_assoc();

                $nomeAnimal = $linha["nomeAnimal"];
                $dono = $linha["nomeDono"];
                $raca = $linha["raca"];
                $dataNascimento = $linha["dataNascimento"];
                $idEspecie = $linha["idEspecie"];
             } else { 
                $id = 0;
                $nomeAnimal = "";
                $dono = "";
                $raca = "";
                $dataNascimento = "";
             }
        ?>
    </head>
    <body class="fundo">
        <div class="container">
            <div class="cont col-12">Cadastro Animal</div>
            <form class="row" action="processos.php" method="POST">
                <div class="col-12">
                    <label for="nomeAnimal" class="escrita">Nome do animal</label>
                    <input id="nomeAnimal" type="text" name="nomeAnimal" class="form-control" value="<?=$nomeAnimal;?>" autofocus>
                </div>
                <div class="col-12">
                    <label for="nomeDono" class="escrita">Nome do dono</label>
                    <input id="nomeDono" type="text" name="nomeDono"  class="form-control" value="<?=$dono;?>">
                </div>
                <div class="col-6">
                    <label for="especie" class="escrita">Especie</label>
                    <select class="form-control" id="especie" name="especie">
                            <?php
                                $conexao = new mysqli("localhost", "root", "vertrigo","petshop");
                                $lista = $conexao->query("SELECT * FROM especie");
                                while($linha = $lista->fetch_assoc()){
                                    if($linha["idEspecie"] == $idEspecie){
                            ?>
                                        <option value="<?=$linha["idEspecie"];?>" selected> 
                                            <?=$linha["nomeEspecie"];?>                   
                                        </option>
                            <?php
                                    }else{?>
                                        <option value="<?=$linha["idEspecie"];?>"> 
                                            <?=$linha["nomeEspecie"];?>                   
                                        </option>
                                    <?php
                                    }
                                }
                                mysqli_close($conexao);
                            ?>
                            textObject.autofocus.set
                            <?php?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="raca" class="escrita">Raça</label>
                    <input id="raca" type="text" name="raca" class="form-control" value="<?=$raca;?>">
                </div>
                <div class="col-6">
                    <label for="dataNascimento" class="escrita">Data Nascimento</label>
                    <input id="dataNascimento" value="2015-06-01" type="date" name="dataNascimento" class="form-control" value="<?=$dataNascimento;?>">
                </div>
                <div class="col-6">
                    <input type="hidden" id="idAnimal" name="idAnimal" value="<?=$id;?>" />
                    <button type="button" class="btn btn-primary" id="voltar" onclick="document.location='../index.php'">
                        Voltar
                    </button>
                    <button type="submit" onclick="return validarAnimal()" class="btn btn-success" id="cadastrar">
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
                    <th>Dono</th>
                    <th>Especie</th>
                    <th>Raça</th>
                    <th>Data de Nascimento</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexao = new mysqli("localhost", "root", "vertrigo","petshop");
                    $tabela = $conexao->query("SELECT * FROM animal, especie WHERE especie.idespecie = animal.idespecie");
                    while($linha = $tabela->fetch_assoc()){
                ?>        
                    <tr>
                        <td><?=$linha["nomeAnimal"];?></td>
                        <td><?=$linha["nomeDono"];?></td>
                        <td><?=$linha["raca"];?></td>
                        <td><?=$linha["nomeEspecie"];?></td>
                        <td><?=$linha["dataNascimento"];?></td>
                        <td>
                            <div class="col-4" id="editor">
                                <a class="btn btn-warning" href="CadastroAnimal.php?id=<?=$linha["idAnimal"];?>">
                                    Editar
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="col-4" id="excluir">
                                <a class="btn btn-danger" href="crud/excluir.php?id=<?=$linha["idAnimal"];?>">
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