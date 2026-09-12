-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Сен 12 2026 г., 12:19
-- Версия сервера: 8.4.10
-- Версия PHP: 8.3.31

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
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Nick', 'nick@mail.ru', '', '2026-09-11 16:57:02'),
(2, 'Haley Sexton', 'jonusu@mailinator.com', '$2y$12$zEEkuvtV0a76KQxjmJW./uSD1z/gxUKN9htmDkcJyqBwP6wRZAHEK', '2026-09-12 08:43:01'),
(3, 'Boris Barr', 'hulet@mailinator.com', '$2y$12$VH4tAUcM3irGdh.vG2X2v.Unn/UF2BYyPrJnYKHwf2BSR2MOHy11a', '2026-09-12 08:43:11'),
(4, 'Mechelle Dyer', 'tihomukol@mailinator.com', '$2y$12$oqIPOYhfkrHskj.dxn6f6.CaT38NnTzDr7JH7qv55ERgDiU2xHseG', '2026-09-12 08:46:20'),
(5, 'admin', 'admin@mail.ru', '$2y$12$bwxnJYc/aF5BJLo3ZPv37u23rtC7jMJdYg6RP5g8mVQFY9TwsYIvi', '2026-09-12 09:04:45'),
(6, 'Cherokee Hayes', 'para@mailinator.com', '$2y$12$wd/VaaKRxFVzpLgT/q99UebUwBmnDRqunbZhFvwcPzoINHNV6saQC', '2026-09-12 09:25:15');

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
-- AUTO_INCREMENT для таблицы `torrents`
--
ALTER TABLE `torrents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
