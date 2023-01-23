-- создание таблицы 'countries'
create table countries (
    id int not null auto_increment,
    name varchar(255) not null comment 'название страны',
    code char(3) not null comment 'символьный код страны',
    primary key (id),
    constraint unique_countries_class unique (name)
)comment 'таблица стран';

-- создание таблицы 'cities'
create table cities (
    id int not null auto_increment,
    name varchar(255) not null comment 'название города',
    founded_at datetime comment 'дата основания города',
    country_id int not null comment 'id страны, в которой находится этот город',
    primary key (id),
    foreign key (country_id) references countries (id)
)comment 'таблица городов';

-- создание таблицы 'animal_classes'
create table animal_classes (
    id int not null auto_increment,
    name varchar(255) not null comment 'название класса животных: млекопитающее, рыба, птица и тому подобное',
    can_flying tinyint(1) default 0 comment 'признак — бывают ли среди них те, кто может летать',
    primary key (id),
    constraint unique_animal_class unique (name)
) comment  'таблица классов животных';

-- создание таблицы 'animals'
create table animals (
    id int not null auto_increment,
    name varchar(255) not null comment 'название животного: хрюшка, кот, черепаха и тому подобные',
    can_flying tinyint(1) default 0 comment 'признак — умеют ли летать',
    legs_count int comment 'количество лап',
    class_id int not null comment 'id класса животного',
    primary key (id),
    foreign key (class_id) references animal_classes (id)
)comment  'таблица животных';

