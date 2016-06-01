--Kayttaja testi data
INSERT INTO Kayttaja (name, password) VALUES ('matti', 'matti123');
INSERT INTO Kayttaja (name, password, admin) VALUES ('teppo', 'teppo123', TRUE);
--Peli testi data
INSERT INTO Peli (aloitettu) VALUES (NOW());
INSERT INTO Peli (aloitettu) VALUES ('1111-11-11');
--KaPE testi data
INSERT INTO KaPe (peli_id, kayttaja_id) VALUES (1,1);
INSERT INTO KaPe (peli_id, kayttaja_id) VALUES (1,2);
INSERT INTO KaPe (peli_id, kayttaja_id) VALUES (2,1);
INSERT INTO KaPe (peli_id, kayttaja_id) VALUES (2,2);
--Maa testi data
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (1, 'USSR', 20, 20);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (1, 'SAKSA', 30, 30);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (1, 'UK', 28, 28);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (1, 'JAPANI', 26, 26);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (1, 'USA', 33, 33);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (2, 'USSR', 20, 20);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (2, 'SAKSA', 30, 30);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (2, 'UK', 28, 28);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (2, 'JAPANI', 26, 26);
INSERT INTO Maa (peli_id, nimi, tulot, rahat) VALUES (2, 'USA', 33, 33);
--Maaruutu testi data
INSERT INTO Maaruutu (peli_id, numero, kenen, sotilaita, tykkeja, tankkeja,
havittajia, pommikoneita, tehdas) VALUES (1, 1, 'USA', 3, 2, 1, 0, 0, TRUE);
INSERT INTO Maaruutu (peli_id, numero, kenen, sotilaita, tykkeja, tankkeja,
havittajia, pommikoneita, tehdas) VALUES (1, 2, 'USA', 0, 2, 0, 3, 0, FALSE);
INSERT INTO Maaruutu (peli_id, numero, kenen, sotilaita, tykkeja, tankkeja,
havittajia, pommikoneita, tehdas) VALUES (1, 30, 'USSR', 8, 4, 0, 0, 0, FALSE);
INSERT INTO Maaruutu (peli_id, numero, kenen, sotilaita, tykkeja, tankkeja,
havittajia, pommikoneita, tehdas) VALUES (1, 31, 'USSR', 0, 0, 3, 0, 1, TRUE);
INSERT INTO Maaruutu (peli_id, numero, kenen, sotilaita, tykkeja, tankkeja,
havittajia, pommikoneita, tehdas) VALUES (2, 12, 'SAKSA', 3, 2, 1, 2, 1, FALSE);
INSERT INTO Maaruutu (peli_id, numero, kenen, sotilaita, tykkeja, tankkeja,
havittajia, pommikoneita, tehdas) VALUES (2, 43, 'JAPANI', 0, 0, 0, 5, 2, TRUE);
INSERT INTO Maaruutu (peli_id, numero, kenen, sotilaita, tykkeja, tankkeja,
havittajia, pommikoneita, tehdas) VALUES (2, 33, 'USSR', 15, 0, 0, 0, 0, TRUE);
--Vesiruutu testi data
INSERT INTO Vesiruutu (peli_id, numero, kenen, destryoereita, sukellusveneita, 
transporttereita, carriereita, battleshippeja) VALUES (1, 8, 'USA', 0, 0, 0, 0, 0);
INSERT INTO Vesiruutu (peli_id, numero, kenen, destryoereita, sukellusveneita, 
transporttereita, carriereita, battleshippeja) VALUES (1, 9, 'USA', 0, 0, 3, 0, 0);
INSERT INTO Vesiruutu (peli_id, numero, kenen, destryoereita, sukellusveneita, 
transporttereita, carriereita, battleshippeja) VALUES (1, 10, 'USA', 2, 1, 0, 0, 0);
INSERT INTO Vesiruutu (peli_id, numero, kenen, destryoereita, sukellusveneita, 
transporttereita, carriereita, battleshippeja) VALUES (2, 49, 'JAPANI', 0, 0, 0, 2, 2);
