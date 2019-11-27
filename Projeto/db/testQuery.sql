SELECT apelido FROM Utilizador
WHERE nome == "Nelson";

SELECT apelido, cod_pos_4, casa_desc FROM Utilizador, Casa
WHERE nome == "Nelson" AND proprietario == utilizadorID AND animais == 0;