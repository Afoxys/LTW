
-- INSERT INTO Utilizador VALUES 
-- ('email, 'username', 'nome', 'apelido', 'salt', 'hash');

INSERT INTO Utilizador VALUES 
('pingdoce23@gmail.com', 'Pingdoce', 'Nelson', 'Gregório', 'dlkfh35dsf4g5s4d', 'ds54gfs56g4afd4s');

INSERT INTO Utilizador VALUES 
('afoxys@gmail.com', 'Afoxys', 'Afonso', 'Sá', 'dlkfh35dsfdjs4d', 'ds54gfs72g4afd4s');


-- INSERT INTO Casa VALUES (casaID, proprietario, data_inicio_c, data_fim_c,
-- 'distrito', 'concelho', 'frequesia', 'rua', porta, 'andar', cod_pos_4, cod_pos_3
-- 'titulo', preco_diario, n_camas, cozinha, internet, ar_condicionado, mobilidade_reduzida, animais, 'imagens', 'casa_desc');

INSERT INTO Casa VALUES (NULL, 'pingdoce23@gmail.com', 1000, 2000,
'Porto', 'Porto', 'Cedofeita', 'Rua Damiao de Gois', 47, '73', 4050, 225,
'A minha casa', 12.34, 2, 0, 1, 0, 1, 1, 'images/c1', 'A minha casa é barata, mas bonita. Obrigado.');

INSERT INTO Casa VALUES (NULL, 'pingdoce23@gmail.com', 1500, 2500,
'Porto', 'Porto', 'Paranhos', 'Rua Dr. Roberto Frias', 123, 'N/A', 4200, 465,
'A minha outra casa', 34.21, 4, 1, 0, 1, 0, 0, 'images/c2', 'A minha outra casa é menos barata, mas mais maior grande. Obrigado.');



-- INSERT INTO Arrendamento VALUES ('email', casaID, data_inicio_a, data_fim_a, rating, 'comentario');
INSERT INTO Arrendamento VALUES ('afoxys@gmail.com', 1, 1200, 1400, NULL, NULL);