-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 30 2019 г., 07:46
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `usersdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `passinfo`
--

CREATE TABLE `passinfo` (
  `id` int(3) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `passinfo`
--

INSERT INTO `passinfo` (`id`, `login`, `password`) VALUES
(1, 'bookworm', 'fbefee4c07e261b8e5e00eb135b92161'),
(2, 'amateur', '077d30710117b006e5cd161ec200ab4a');

-- --------------------------------------------------------

--
-- Структура таблицы `privateinfo`
--

CREATE TABLE `privateinfo` (
  `id` int(3) NOT NULL,
  `user_id` int(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bought` int(5) DEFAULT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `privateinfo`
--

INSERT INTO `privateinfo` (`id`, `user_id`, `name`, `status`, `bought`, `regdate`, `phone`, `email`, `address`, `avatar`) VALUES
(1, 1, 'Александра', 'Книголюб', 100, '2019-10-02 00:22:01', '+7-967-353-08-22', 'passionatereader@yandex.ru', 'Москва, ул. Тимирязевская 5 кв 3', 'media\\bookwarm.jpg'),
(2, 2, 'Тимур', 'Новичок', 1, '2019-10-02 00:26:52', '+7-977-352-51-22', 'timur1234@bk.ru', 'Волгоградская обл., Волгоград, Университетский проспект 100', 'media\\default.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `passinfo`
--
ALTER TABLE `passinfo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `privateinfo`
--
ALTER TABLE `privateinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `passinfo`
--
ALTER TABLE `passinfo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `privateinfo`
--
ALTER TABLE `privateinfo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
