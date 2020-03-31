CREATE TABLE IF NOT EXISTS magasin(
    id_magasin integer PRIMARY KEY,
    nom text,
    adresse text,
    descriptionMagasin text
);

CREATE TABLE IF NOT EXISTS licence(
    id_licence integer PRIMARY KEY,
    nom text
);

CREATE TABLE IF NOT EXISTS marque(
    id_marque integer PRIMARY KEY,
    nom text,
    descriptionMarque text,
    photo text;
);

CREATE TABLE IF NOT EXISTS typeDeFigurine(
    id_type integer PRIMARY KEY,
    nom text,
    id_marque integer REFERENCES marque(id_marque)
);

CREATE TABLE IF NOT EXISTS article(
    reference integer PRIMARY KEY,
    intitule text,
    descriptionArticle text,
    prix integer,
    photo text,
    id_typeFigurine integer REFERENCES typeDeFigurine(id_type),
    id_licence integer REFERENCES licence(id_licence)
);

CREATE TABLE IF NOT EXISTS est_disponible(
    id_article integer REFERENCES article(reference),
    id_magasin integer REFERENCES magasin(id_magasin),
    quantite integer,
    PRIMARY KEY(id_article,id_magasin)
);

CREATE TABLE IF NOT EXISTS est_associe(
    id_licence integer REFERENCES licence(id_licence),
    id_typeFigurine integer REFERENCES typeDeFigurine(id_type),
    PRIMARY KEY(id_licence,id_typeFigurine)
);

