-- Таблица "Справочник"
CREATE TABLE Directory (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    PhoneNumber VARCHAR (20) UNIQUE NOT NULL,
    Description VARCHAR(255) UNIQUE NOT NULL,
);