-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2023 г., 16:52
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT 'white'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `created_at`, `created_by`, `color`) VALUES
(1, 0, 'Основные', '2023-01-23 08:14:58', 1, 'white'),
(2, 2, 'По работе', '2023-01-01 08:14:57', 1, 'white'),
(3, 2, 'Личные', '2023-01-23 08:15:12', 1, 'white'),
(4, 0, 'Оповещения', '2023-01-23 08:15:34', 1, 'white'),
(5, 5, 'Магазины', '2023-01-23 08:34:48', 1, 'white'),
(6, 5, 'Подписки', '2023-01-23 08:35:03', 1, 'white'),
(7, 7, 'Подписка на лекции по PHP', '2023-01-24 08:17:04', 1, 'white'),
(8, 7, 'Подписка на другие лекции ', '2023-01-24 08:17:29', 1, 'white'),
(9, 5, 'Форумы', '2023-01-24 08:18:12', 1, 'white'),
(10, 0, 'Спам', '2023-01-24 08:18:26', 1, 'white');

-- --------------------------------------------------------

--
-- Структура таблицы `category_message`
--

CREATE TABLE `category_message` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `message_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'Зарегистрированный пользователь', 'Группа для зарегистрированных пользователей сайта'),
(2, 'Пользователи с правом писать сообщения', 'Группа для пользователей, имеющих право писать сообщения на форуме сайта');

-- --------------------------------------------------------

--
-- Структура таблицы `group_user`
--

CREATE TABLE `group_user` (
  `id` int NOT NULL,
  `group_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `group_user`
--

INSERT INTO `group_user` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `text` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `sender_user_id` int NOT NULL,
  `recipient_user_id` int NOT NULL,
  `read_mark` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_notifications` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `active`, `name`, `surname`, `patronymic`, `email`, `phone`, `password`, `email_notifications`) VALUES
(1, 1, 'Иван', 'Иванов', 'Иванович', 'ivan@example.com', '+71234567890', '$2y$10$/Op2bt66bmzOoU10ZrWV/OiUVWOaMRUPA94OkglK5Kx9sseSLJwmS', 1),
(2, 1, 'Петр', 'Петров', 'Петрович', 'petr@example.com', '+71234567891', '$2y$10$/Op2bt66bmzOoU10ZrWV/OiUVWOaMRUPA94OkglK5Kx9sseSLJwmS', 0),
(3, 1, 'Мария', 'Сидорова', 'Ивановна', 'maria@example.com', '+71234567892', '$2y$10$/Op2bt66bmzOoU10ZrWV/OiUVWOaMRUPA94OkglK5Kx9sseSLJwmS', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Индексы таблицы `category_message`
--
ALTER TABLE `category_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `category_message`
--
ALTER TABLE `category_message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `category_message`
--
ALTER TABLE `category_message`
  ADD CONSTRAINT `category_message_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_message_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`);

--
-- Ограничения внешнего ключа таблицы `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
