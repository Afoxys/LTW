SELECT apelido FROM Utilizador
WHERE nome == "Nelson";

SELECT casa_desc, data_inicio_a, data_fim_a FROM Casa
NATURAL JOIN Arrendamento
WHERE casaID == casa AND utilizador == 'afoxys@gmail.com';

SELECT preco_diario, rua FROM Casa
WHERE proprietario == 'pingdoce23@gmail.com';