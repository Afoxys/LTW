DROP TABLE IF EXISTS Utilizador;
DROP TABLE IF EXISTS Casa;

CREATE TABLE Utilizador (
    utilizadorID INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(16) UNIQUE,
    email TEXT NOT NULL UNIQUE,
    nome TEXT NOT NULL,
    apelido TEXT NOT NULL,
    salt VARCHAR(16) NOT NULL UNIQUE,
    hash VARCHAR(16) NOT NULL
);

CREATE TABLE Casa (
    casaID INTEGER PRIMARY KEY AUTOINCREMENT,
    proprietario INTEGER REFERENCES Utilizador(utilizadorID),

    distrito TEXT NOT NULL,
    concelho TEXT NOT NULL,
    frequesia TEXT NOT NULL,
    rua TEXT NOT NULL,
    porta INTEGER NOT NULL,
    andar TEXT NOT NULL,
    cod_pos_4 INTEGER NOT NULL,
    cod_pos_3 INTEGER NOT NULL,

    titulo VARCHAR(64) NOT NULL,
    preco_diario FLOAT NOT NULL,
    n_quartos INTEGER NOT NULL,
    animais BOOLEAN NOT NULL DEFAULT FALSE,
    imagens TEXT NOT NULL,
    casa_desc TEXT
);

-- CREATE TABLE Endereco (
--     enderecoID INTEGER PRIMARY KEY AUTOINCREMENT,
--     distrito TEXT NOT NULL,
--     concelho TEXT NOT NULL,
--     frequesia TEXT NOT NULL,
--     rua TEXT NOT NULL,
--     porta INTEGER NOT NULL,
--     andar TEXT NOT NULL,
--     cod_pos_4 INTEGER NOT NULL,
--     cod_pos_3 INTEGER NOT NULL
-- );




INSERT INTO Utilizador VALUES 
(NULL, 'Pingdoce', 'pingdoce23@gmail.com', 'Nelson', 'Gregório', 'dlkfh35dsf4g5s4d', 'ds54gfs56g4afd4s');


INSERT INTO Casa VALUES
(NULL, 1, 
'Porto', 'Porto', 'Cedofeita', 'Rua Damiao de Gois', 47, '73', 4050, 225,
'A minha casa', 12.34, 2, 1, 'images/c1', 'A minha casa é barata, mas bonita. Obrigado.');

INSERT INTO Casa VALUES
(NULL, 1,
'Porto', 'Porto', 'Paranhos', 'Rua Dr. Roberto Frias', 123, 'N/A', 4200, 465,
'A minha outra casa', 34.21, 4, 0, 'images/c2', 'A minha outra casa é menos barata, mas mais maior grande. Obrigado.');