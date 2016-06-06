Create Table Kayttaja(
id SERIAL PRIMARY KEY,
nimi varchar(50) NOT NULL,
salasana varchar(50) NOT NULL,
admini boolean DEFAULT FALSE
);

Create Table Peli(
id SERIAL PRIMARY KEY,
aloitettu DATE
);

Create Table KaPe(
id SERIAL PRIMARY KEY,
peli_id INTEGER REFERENCES Peli(id),
kayttaja_id INTEGER REFERENCES Kayttaja(id)
);

Create Table Maa(
id SERIAL PRIMARY KEY,
peli_id INTEGER REFERENCES Peli(id),
nimi varchar(50) NOT NULL,
tulot INTEGER NOT NULL,
rahat INTEGER NOT NULL
);

Create Table Maaruutu(
id SERIAL PRIMARY KEY,
peli_id INTEGER REFERENCES Peli(id),
alue varchar(50) NOT NULL UNIQUE,
kenen varchar(50) NOT NULL,
sotilaita INTEGER NOT NULL DEFAULT 0,
tykkeja INTEGER NOT NULL DEFAULT 0,
tankkeja INTEGER NOT NULL DEFAULT 0,
havittajia INTEGER NOT NULL DEFAULT 0,
pommikoneita INTEGER NOT NULL DEFAULT 0,
tehdas INTEGER NOT NULL CHECK(tehdas = 0 OR tehdas = 1) DEFAULT 0
);

Create Table Vesiruutu(
id SERIAL PRIMARY KEY,
peli_id INTEGER REFERENCES Peli(id),
numero INTEGER NOT NULL UNIQUE,
kenen varchar(50) NOT NULL,
destryoereita INTEGER NOT NULL DEFAULT 0,
sukellusveneita INTEGER NOT NULL DEFAULT 0,
transporttereita INTEGER NOT NULL DEFAULT 0,
carriereita INTEGER NOT NULL DEFAULT 0,
battleshippeja INTEGER NOT NULL DEFAULT 0,
sotilaita INTEGER NOT NULL DEFAULT 0,
tykkeja INTEGER NOT NULL DEFAULT 0,
tankkeja INTEGER NOT NULL DEFAULT 0,
havittajia INTEGER NOT NULL DEFAULT 0,
pommikoneita INTEGER NOT NULL DEFAULT 0
);
