PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Utilizador;
DROP TABLE IF EXISTS Casa;
DROP TABLE IF EXISTS Arrendamento;

CREATE TABLE Utilizador (
    email TEXT PRIMARY KEY,
    username VARCHAR(16) NOT NULL UNIQUE,
    nome TEXT NOT NULL,
    apelido TEXT NOT NULL,
    salt VARCHAR(16) NOT NULL UNIQUE,
    hash VARCHAR(16) NOT NULL UNIQUE
);

CREATE TABLE Casa (
    casaID INTEGER PRIMARY KEY AUTOINCREMENT,
    proprietario TEXT NOT NULL,
    data_inicio_c DATETIME NOT NULL,
    data_fim_c DATETIME NOT NULL,

    distrito TEXT NOT NULL,
    concelho TEXT NOT NULL,
    freguesia TEXT NOT NULL,
    rua TEXT NOT NULL,
    porta INTEGER NOT NULL,
    andar TEXT NOT NULL,
    cod_pos_4 INTEGER NOT NULL,
    cod_pos_3 INTEGER NOT NULL,

    titulo VARCHAR(64) NOT NULL,
    preco_diario FLOAT NOT NULL,
    n_camas INTEGER NOT NULL,
    cozinha BOOLEAN NOT NULL,
    internet BOOLEAN NOT NULL,
    ar_condicionado BOOLEAN NOT NULL,
    mobilidade_reduzida BOOLEAN NOT NULL,
    animais BOOLEAN NOT NULL DEFAULT FALSE,
    imagens TEXT NOT NULL,
    casa_desc TEXT,

    FOREIGN KEY(proprietario) REFERENCES Utilizador(email),
    CHECK(data_fim_c > data_inicio_c)
);

CREATE TABLE Arrendamento (
    utilizador TEXT NOT NULL,
    casa INTEGER NOT NULL,
    data_inicio_a DATETIME NOT NULL,
    data_fim_a DATETIME NOT NULL,
    rating INTEGER DEFAULT NULL,
    comentario TEXT DEFAULT NULL,
    PRIMARY KEY(casa, data_inicio_a),
    FOREIGN KEY(utilizador) REFERENCES Utilizador(email),
    FOREIGN KEY(casa) REFERENCES Casa(casaID),
    CHECK(data_fim_a > data_inicio_a),
    CHECK(rating BETWEEN 1 AND 5)
);