--Player testi data
INSERT INTO Player (username, password) VALUES ('matti', 'matti123');
INSERT INTO Player (username, password, adminstrator) VALUES ('teppo', 'teppo123', TRUE);
--Game testi data
INSERT INTO Game (started) VALUES (NOW());
INSERT INTO Game (started) VALUES ('1111-11-11');
--PlaGa testi data
INSERT INTO PlaGa (game_id, player_id) VALUES (1,1);
INSERT INTO PlaGa (game_id, player_id) VALUES (1,2);
INSERT INTO PlaGa (game_id, player_id) VALUES (2,1);
INSERT INTO PlaGa (game_id, player_id) VALUES (2,2);
--Country testi data
INSERT INTO Country (game_id, nation, income, ipc) VALUES (1, 'USSR', 20, 20);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (1, 'GERMANY', 30, 30);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (1, 'UK', 28, 28);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (1, 'JAPAN', 26, 26);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (1, 'USA', 33, 33);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (1, 'NEUTRAL', -1, -1);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (2, 'USSR', 20, 20);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (2, 'GERMANY', 30, 30);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (2, 'UK', 28, 28);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (2, 'JAPAN', 26, 26);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (2, 'USA', 33, 33);
INSERT INTO Country (game_id, nation, income, ipc) VALUES (1, 'NEUTRAL', -1, -1);
--Land testi data
INSERT INTO Land (game_id, area, nation, soldiers, artillery, tanks,
fighters, bombers, factory, antiair, ipc, country_id) 
VALUES (1, 'NY', 'USA', 3, 2, 1, 0, 0, 0, 0, 3, 5);
INSERT INTO Land (game_id, area, nation, soldiers, artillery, tanks,
fighters, bombers, factory, antiair, ipc, country_id) 
VALUES (1, 'BOSTON', 'USA', 0, 2, 0, 3, 0, 0, 0, 2, 5);
INSERT INTO Land (game_id, area, nation, soldiers, artillery, tanks,
fighters, bombers, factory, antiair, ipc, country_id) 
VALUES (1, 'RUSSIA', 'USSR', 8, 4, 0, 0, 0, 0, 0, 5, 1);
INSERT INTO Land (game_id, area, nation, soldiers, artillery, tanks,
fighters, bombers, factory, antiair, ipc, country_id) 
VALUES (1, 'SIBERIA', 'USSR', 0, 0, 3, 0, 1, 1, 1, 1, 1);
INSERT INTO Land (game_id, area, nation, soldiers, artillery, tanks,
fighters, bombers, factory, antiair, ipc, country_id) 
VALUES (2, 'WEST-GERMANY', 'GERMANY', 3, 2, 1, 2, 1, 0, 0, 6, 8);
INSERT INTO Land (game_id, area, nation, soldiers, artillery, tanks,
fighters, bombers, factory, antiair, ipc, country_id) 
VALUES (2, 'JAPAN', 'JAPAN', 0, 0, 0, 5, 2, 1, 1, 8, 10);
INSERT INTO Land (game_id, area, nation, soldiers, artillery, tanks,
fighters, bombers, factory, antiair, ipc, country_id) 
VALUES (2, 'LENINGRAD', 'USSR', 15, 0, 0, 0, 0, 1, 0, 4, 7);
--Water testi data
INSERT INTO Water (game_id, area, antiair, destroyers, submarines, 
transporters, carriers, battleships, country_id) 
VALUES (1, 8, 0, 0, 0, 0, 0, 0, 6);
INSERT INTO Water (game_id, area, antiair, destroyers, submarines, 
transporters, carriers, battleships, soldiers, tanks, country_id) 
VALUES (1, 9, 0, 0, 0, 3, 0, 0, 2, 1, 5);
INSERT INTO Water (game_id, area, antiair, destroyers, submarines, 
transporters, carriers, battleships, country_id) 
VALUES (1, 10, 0, 2, 1, 0, 0, 0, 5);
INSERT INTO Water (game_id, area, antiair, destroyers, submarines, 
transporters, carriers, battleships, fighters, country_id) 
VALUES (2, 49, 0, 0, 0, 0, 2, 2, 3, 10);

