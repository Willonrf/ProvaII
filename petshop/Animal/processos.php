<?php 
    $nome = $_POST["nomeAnimal"];
    $dono = $_POST["nomeDono"];
    $raca = $_POST["raca"];
    $dataNascimento = $_POST["dataNascimento"];
    $idAnimal = $_POST["idAnimal"];
    $idEspecie = $_POST["especie"];

    $conexao = new mysqli("localhost", "root", "vertrigo", "petshop");

    if($idAnimal == 0){
        $sql = $conexao->prepare("INSERT INTO Animal(nomeAnimal, nomeDono, raca, dataNascimento, idEspecie) VALUES (?,?,?,?,?)");
        $sql->bind_param("ssssi", $nome, $dono, $raca, $dataNascimento, $idEspecie);
    } else {
        $sql = $conexao->prepare("UPDATE Animal SET nomeAnimal = ?, nomeDono = ?, raca = ?, dataNascimento = ?, idEspecie = ? WHERE idAnimal = ?");
        $sql->bind_param("ssssii", $nome, $dono, $raca, $dataNascimento, $idEspecie, $idAnimal);
    }

    $sql->execute();

    mysqli_close($conexao);

    header("location: CadastroAnimal.php");
   
?>