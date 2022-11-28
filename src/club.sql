DROP TABLE IF EXISTS peliculas CASCADE;

CREATE TABLE peliculas (
    id bigserial PRIMARY KEY,
    nombre varchar(255) NOT NULL,
    genero varchar(255) NOT NULL,
    anyo numeric(7) NOT NULL,
    img varchar(255),
    precio numeric(7, 2) NOT NULL
);

-- Carga inicial de datos de prueba:

INSERT INTO peliculas (nombre, genero, anyo, img, precio)
    VALUES ('Abyss', 'Ciencia ficción', 1989, 'abyss.jpg', 9.99),
           ('Blade Runner', 'Ciencia ficción', 1982, 'bladerunner.jpg', 8.99),
           ('Las colinas tienen ojos', 'Terror', 2006, 'colinas2006.jpg', 8.99),
           ('Escupiré sobre tu tumba', 'Terror', 2010, 'tumba.jpg', 5.99),
           ('La ciudad de las estrellas', 'Musical', 2016,  'lalaland.jpg',12.99),
           ('Cats', 'Musical', 2019, 'cats2019.jpg', 9.99),
           ('Pink Flamingos', 'Bizarro', 1972, 'pink.jpg', 4.99),
           ('Scary Movie', 'Comedia', 2000, 'scarymovie.jpg', 12.99),
           ('Me llaman Radio', 'Drama', 2003, 'radio.jpg', 15.99),
           ('La forma del agua', 'Fantasía', 2017, 'agua.jpg', 9.99),
           ('El laberinto del fauno', 'Fantasía', 2006, 'fauno.jpg', 9.99),
           ('Los chicos del barrio', 'Drama', 1991, 'barrio.jpg', 15.99)
           ;