Create Table Player(
id SERIAL PRIMARY KEY,
username varchar(20) NOT NULL UNIQUE,
password varchar(20) NOT NULL,
adminstrator boolean DEFAULT FALSE
);

Create Table Game(
id SERIAL PRIMARY KEY,
started DATE,
status varchar(20) NOT NULL DEFAULT 'To be continued...'
);

Create Table PlaGa(
id SERIAL PRIMARY KEY,
game_id INTEGER REFERENCES Game(id),
player_id INTEGER REFERENCES Player(id)
);

Create Table Country(
id SERIAL PRIMARY KEY,
game_id INTEGER REFERENCES Game(id),
nation varchar(20) NOT NULL,
income INTEGER NOT NULL,
ipc INTEGER NOT NULL
);

Create Table Land(
id SERIAL PRIMARY KEY,
game_id INTEGER REFERENCES Game(id),
country_id INTEGER REFERENCES Country(id),
area varchar(20) NOT NULL,
nation varchar(20) NOT NULL DEFAULT 'NEUTRAL',
soldiers INTEGER NOT NULL DEFAULT 0,
artillery INTEGER NOT NULL DEFAULT 0,
tanks INTEGER NOT NULL DEFAULT 0,
fighters INTEGER NOT NULL DEFAULT 0,
bombers INTEGER NOT NULL DEFAULT 0,
antiair INTEGER NOT NULL DEFAULT 0,
factory INTEGER NOT NULL DEFAULT 0,
ipc INTEGER NOT NULL DEFAULT 0
);

Create Table Water(
id SERIAL PRIMARY KEY,
game_id INTEGER REFERENCES Game(id),
country_id INTEGER REFERENCES Country(id),
area INTEGER NOT NULL,
destroyers INTEGER NOT NULL DEFAULT 0,
submarines INTEGER NOT NULL DEFAULT 0,
transporters INTEGER NOT NULL DEFAULT 0,
carriers INTEGER NOT NULL DEFAULT 0,
battleships INTEGER NOT NULL DEFAULT 0,
soldiers INTEGER NOT NULL DEFAULT 0,
artillery INTEGER NOT NULL DEFAULT 0,
tanks INTEGER NOT NULL DEFAULT 0,
fighters INTEGER NOT NULL DEFAULT 0,
bombers INTEGER NOT NULL DEFAULT 0,
antiair INTEGER NOT NULL DEFAULT 0
);

