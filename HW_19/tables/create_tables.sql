-- создание таблицы 'users'
create table users
(
    id                  int          not null auto_increment,
    active              tinyint(1)   not null default 0,
    name                varchar(100) not null,
    surname             varchar(100) not null,
    patronymic          varchar(100) not null,
    email               varchar(255) not null,
    phone               varchar(255) not null,
    password            varchar(255) not null,
    email_notifications tinyint(1)   not null default 0,
    primary key (id)
);

-- создание таблицы 'groups'
create table `groups`
(
    id          int          not null auto_increment,
    name        varchar(255) not null,
    description text         not null,
    primary key (id)
);

-- создание таблицы 'group_user'
create table group_user
(
    id       int not null auto_increment,
    group_id int not null,
    user_id  int not null,
    primary key (id),
    foreign key (group_id) references `groups` (id),
    foreign key (user_id) references users (id)
);

-- создание таблицы 'categories'
create table categories
(
    id         int          not null auto_increment,
    parent_id  int,
    title      varchar(255) not null,
    created_at datetime     not null,
    created_by int          not null,
    color      varchar(255) not null default 'white',
    primary key (id),
    foreign key (created_by) references users (id)
);

-- создание таблицы 'messages'
create table messages
(
    id                int          not null auto_increment,
    text              text         not null,
    title             varchar(255) not null,
    created_at        datetime     not null,
    sender_user_id    int          not null,
    recipient_user_id int          not null,
    read_mark         tinyint(1)   not null default 0,
    primary key (id),
    foreign key (sender_user_id) references users (id),
    foreign key (recipient_user_id) references users (id)
);

-- создание таблицы 'category_message'
create table category_message
(
    id          int not null auto_increment,
    category_id int not null,
    message_id  int not null,
    primary key (id),
    foreign key (category_id) references categories (id),
    foreign key (message_id) references messages (id)
);
