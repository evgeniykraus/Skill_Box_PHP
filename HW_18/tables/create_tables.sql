-- Создание таблицы 'countries'
CREATE TABLE countries (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL COMMENT 'название страны',
    code CHAR(3) NOT NULL COMMENT 'символьный код страны',
    PRIMARY KEY (id),
    CONSTRAINT constraint_animal_classes UNIQUE (name)
)COMMENT 'Таблица стран';

-- Создание таблицы 'cities'
CREATE TABLE cities (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL COMMENT 'название города',
    founded_at DATETIME COMMENT 'дата основания города',
    country_id INT NOT NULL COMMENT 'ID страны, в которой находится этот город',
    PRIMARY KEY (id),
    FOREIGN KEY (country_id) REFERENCES countries (id)
)COMMENT 'Таблица городов';

-- Создание таблицы 'animal_classes'
CREATE TABLE animal_classes (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL COMMENT 'название класса животных: млекопитающее, рыба, птица и тому подобное',
    can_flying TINYINT(1) DEFAULT 0 COMMENT 'признак — бывают ли среди них те, кто может летать',
    PRIMARY KEY (id),
    CONSTRAINT constraint_animal_classes UNIQUE (name)
) COMMENT  'Таблица классов животных';

-- Создание таблицы 'animals'
CREATE TABLE animals (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL COMMENT 'название животного: хрюшка, кот, черепаха и тому подобные',
    can_flying TINYINT(1) DEFAULT 0 COMMENT 'признак — умеют ли летать',
    legs_count INT COMMENT 'количество лап',
    class_id INT NOT NULL COMMENT 'ID класса животного',
    PRIMARY KEY (id),
    FOREIGN KEY (class_id) REFERENCES animal_classes (id)
)COMMENT  'Таблица животных';

