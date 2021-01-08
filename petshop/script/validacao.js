function validarEspecie(){
    var nome = document.getElementById("nomeEspecie").value
    if(nome == ""){
        alert("nome da especie é obrigatorio")
        return false
    }
    var descricao = document.getElementById("descricao").value
    if(descricao == ""){
        alert("descrição da especie é obrigatorio")
        return false
    }
    return true
}
function validarAnimal(){
    var nome = document.getElementById("nomeAnimal").value
    if(nome == ""){
        alert("nome do animal é obrigatorio")
        return false
    }
    var dono = document.getElementById("nomeDono").value
    if(dono == ""){
        alert("nome do dono é obrigatorio")
        return false
    }
    var raca = document.getElementById("raca").value
    if(raca == ""){
        alert("A raça do animal é obrigatorio")
        return false
    }
    var especie = document.getElementById("especie")
    if(especie == ""){
        alert("não existe especie cadastrada!!")
        return false
    }
    return true
}