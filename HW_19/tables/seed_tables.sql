# Заполнение таблицы "groups"
INSERT INTO test.GROUPS (NAME, DESCRIPTION)
VALUES ('Зарегистрированный пользователь', 'Группа для зарегистрированных пользователей сайта'),
       ('Пользователи с правом писать сообщения',
        'Группа для пользователей, имеющих право писать сообщения на форуме сайта');

# Заполнение таблицы "users"
INSERT INTO test.USERS (ACTIVE, NAME, SURNAME, PATRONYMIC, EMAIL, PHONE, PASSWORD, EMAIL_NOTIFICATIONS)
VALUES (1, 'Иван', 'Иванов', 'Иванович', 'ivan@example.com', '+71234567890', 'password', 1),
       (1, 'Петр', 'Петров', 'Петрович', 'petr@example.com', '+71234567891', 'password', 0),
       (1, 'Мария', 'Марина', 'Ивановна', 'maria@example.com', '+71234567892', 'password', 1);

# Заполнение таблицы "group_user"
INSERT INTO test.GROUP_USER (GROUP_ID, USER_ID)
VALUES (1, 1),
       (1, 2),
       (1, 3),
       (2, 1);