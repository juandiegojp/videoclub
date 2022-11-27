DROP TABLE IF EXISTS peliculas CASCADE;

CREATE TABLE peliculas (
    id bigserial PRIMARY KEY,
    nombre varchar(255) NOT NULL,
    genero varchar(255) NOT NULL,
    anyo numeric(7) NOT NULL,
    precio numeric(7, 2) NOT NULL
);

-- Carga inicial de datos de prueba:

INSERT INTO peliculas (nombre, genero, anyo, precio)
    VALUES ('Abyss', 'Ciencia ficción', 1989, 9.99),
           ('Blade Runner', 'Ciencia ficción', 1982, 8.99),
           ('Las colinas tienen ojos', 'Terror', 2006, 8.99),
           ('Escupiré sobre tu tumba', 'Terror', 2010, 5.99),
           ('La ciudad de las estrellas', 'Musical', 2016, 12.99),
           ('Cats', 'Musical', 2019, 9.99),
           ('Pink Flamingos', 'Bizarro', 1972, 4.99),
           ('Scary Movie', 'Comedia', 2000, 12.99),
           ('Me llaman Radio', 'Drama', 2003, 15.99),
           ('Los chicos del barrio', 'Drama', 1991, 15.99)
           ;