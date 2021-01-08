<?php 
    $nome = $_POST["nomeEspecie"];
    $descricao = $_POST["descricao"];
    $id = $_POST["id"];

    $conexao = new mysqli("localhost", "root", "vertrigo", "petshop");

    if($id == 0){
        $sql = $conexao->prepare("INSERT INTO especie(nomeEspecie, descricao) VALUES (?,?)");
        $sql->bind_param("ss", $nome, $descricao);
    } else {
        $sql = $conexao->prepare("UPDATE especie SET nomeEspecie = ?, descricao = ? WHERE idEspecie = ?");
        $sql->bind_param("ssi", $nome, $descricao, $id);
    }

    $sql->execute();

    mysqli_close($conexao);

    header("location: CadastroEspecie.php");
   
?>