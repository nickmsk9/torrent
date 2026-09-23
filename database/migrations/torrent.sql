-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 21 2026 г., 13:37
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `torrent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `torrents`
--

CREATE TABLE `torrents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Nick', 'nick@mail.ru', '', 3, '2026-09-11 16:57:02'),
(2, 'Haley Sexton', 'jonusu@mailinator.com', '$2y$12$zEEkuvtV0a76KQxjmJW./uSD1z/gxUKN9htmDkcJyqBwP6wRZAHEK', 2, '2026-09-12 08:43:01'),
(3, 'Boris Barr', 'hulet@mailinator.com', '$2y$12$VH4tAUcM3irGdh.vG2X2v.Unn/UF2BYyPrJnYKHwf2BSR2MOHy11a', 2, '2026-09-12 08:43:11'),
(4, 'Mechelle Dyer', 'tihomukol@mailinator.com', '$2y$12$oqIPOYhfkrHskj.dxn6f6.CaT38NnTzDr7JH7qv55ERgDiU2xHseG', 2, '2026-09-12 08:46:20'),
(5, 'admin', 'admin@mail.ru', '$2y$12$bwxnJYc/aF5BJLo3ZPv37u23rtC7jMJdYg6RP5g8mVQFY9TwsYIvi', 3, '2026-09-12 09:04:45'),
(6, 'Cherokee Hayes', 'para@mailinator.com', '$2y$12$wd/VaaKRxFVzpLgT/q99UebUwBmnDRqunbZhFvwcPzoINHNV6saQC', 2, '2026-09-12 09:25:15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `torrents`
--
ALTER TABLE `torrents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `torrents`/
--
ALTER TABLE `torrents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE users
    ADD profile_description TEXT NULL,
ADD birthdate DATE NULL,
ADD gender VARCHAR(10) NULL;