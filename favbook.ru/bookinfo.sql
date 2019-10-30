-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 30 2019 г., 07:41
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
-- База данных: `crbooks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookinfo`
--

CREATE TABLE `bookinfo` (
  `id` int(4) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Не определена',
  `bookname` varchar(255) DEFAULT NULL,
  `price` int(9) DEFAULT 0,
  `pubdate` year(4) DEFAULT 2000
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bookinfo`
--

INSERT INTO `bookinfo` (`id`, `category`, `bookname`, `price`, `pubdate`) VALUES
(1, 'Российская художественная литература', 'Мертвые программисты', 10, 2019),
(2, 'Российская художественная литература', 'Война и код', 28, 2019),
(3, 'Зарубежная художественная литература', 'Garry Coder', 666, 2001),
(4, 'Зарубежная художественная литература', 'Lord of the cycles', 777, 2000),
(5, 'Учебная литература', 'Демидович', 1999, 1999),
(6, 'Учебная литература', 'Кудрявцев учебник в ста томах том 88', 1771, 2003),
(7, 'Научная литература', 'Демидович 18+', 4550, 2017),
(8, 'Научная литература', 'Как выучить WEB не сломав себе мозг', 31, 2019);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookinfo`
--
ALTER TABLE `bookinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookinfo`
--
ALTER TABLE `bookinfo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
