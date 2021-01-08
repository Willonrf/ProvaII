CREATE  DATABASE petshop;

USE petshop;

CREATE TABLE especie(
    idEspecie INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nomeEspecie VARCHAR(100) NOT NULL,
    descricao VARCHAR(500) NOT NULL
);

CREATE TABLE animal(
    idAnimal INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idEspecie INTEGER NOT NULL,
    nomeAnimal VARCHAR(100) NOT NULL,
    nomeDono VARCHAR(100) NOT NULL,
    raca VARCHAR(100) NOT NULL,
    dataNascimento DATE NOT NULL,
    INDEX animalEspecie(idEspecie) USING BTREE,
    CONSTRAINT animalEspecie FOREIGN KEY (idEspecie) REFERENCES especie (idEspecie) ON DELETE RESTRICT ON UPDATE CASCADE
);