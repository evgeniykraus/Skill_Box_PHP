# Заполнение таблицы "groups"
insert into test.groups (name, description)
values ('Зарегистрированный пользователь', 'Группа для зарегистрированных пользователей сайта'),
       ('Пользователи с правом писать сообщения',
        'Группа для пользователей, имеющих право писать сообщения на форуме сайта');

# Заполнение таблицы "users"
insert into test.users (active, name, surname, patronymic, email, phone, password, email_notifications)
values (1, 'Иван', 'Иванов', 'Иванович', 'ivan@example.com', '+71234567890', '$2y$10$/Op2bt66bmzOoU10ZrWV/OiUVWOaMRUPA94OkglK5Kx9sseSLJwmS', 1),
       (1, 'Петр', 'Петров', 'Петрович', 'petr@example.com', '+71234567891', '$2y$10$/Op2bt66bmzOoU10ZrWV/OiUVWOaMRUPA94OkglK5Kx9sseSLJwmS', 0),
       (1, 'Мария', 'Сидорова', 'Ивановна', 'maria@example.com', '+71234567892', '$2y$10$/Op2bt66bmzOoU10ZrWV/OiUVWOaMRUPA94OkglK5Kx9sseSLJwmS', 1);

# Заполнение таблицы "group_user"
insert into test.group_user (group_id, user_id)
values (1, 1),
       (1, 2),
       (1, 3),
       (2, 1);