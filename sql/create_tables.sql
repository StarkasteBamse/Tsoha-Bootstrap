Create Table Kayttaja(
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
password varchar(50) NOT NULL,
admin boolean DEFAULT FALSE
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
numero INTEGER NOT NULL,
kenen varchar(50) NOT NULL,
sotilaita INTEGER NOT NULL,
tykkeja INTEGER NOT NULL,
tankkeja INTEGER NOT NULL,
havittajia INTEGER NOT NULL,
pommikoneita INTEGER NOT NULL,
tehdas boolean
);

Create Table Vesiruutu(
id SERIAL PRIMARY KEY,
peli_id INTEGER REFERENCES Peli(id),
numero INTEGER NOT NULL,
kenen varchar(50) NOT NULL,
destryoereita INTEGER NOT NULL,
sukellusveneita INTEGER NOT NULL,
transporttereita INTEGER NOT NULL,
carriereita INTEGER NOT NULL,
battleshippeja INTEGER NOT NULL
);
