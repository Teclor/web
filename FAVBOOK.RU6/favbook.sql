-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 05 2019 г., 18:09
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
-- База данных: `favbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookinfo`
--

CREATE TABLE `bookinfo` (
  `id` int(4) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Не определена',
  `bookname` varchar(255) DEFAULT NULL,
  `description` text NOT NULL DEFAULT 'Описание отсутствует',
  `price` int(9) DEFAULT 0,
  `pubdate` year(4) DEFAULT 2000,
  `image` varchar(255) NOT NULL DEFAULT 'def.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bookinfo`
--

INSERT INTO `bookinfo` (`id`, `category`, `bookname`, `description`, `price`, `pubdate`, `image`) VALUES
(87, 'Российская художественная литература', 'Дмитрий Глуховский - Метро 2033', 'Невероятная история о приключениях в постапокалиптическом мире.', 890, 2005, '87.jpg'),
(88, 'Российская художественная литература', 'А.С. Грибоедов - Горе от ума', 'Бессмертная классика', 490, 2001, '88.jpg'),
(89, 'Научная литература', 'Зигмунд Фрейд - Введение в психоанализ', 'Лекции Зигмунда Фрейда.', 830, 2008, '89.jpg'),
(90, 'Зарубежная художественная литература', 'Джордж Оурэлл - 1984', 'Последний роман 1984 культового британского писателя Джорджа Оруэлла вышел в 1949 году за год до его смерти. Он имел бешеную популярность в Англии и США, был переведен более чем на шестьдесят языков, неоднократно экранизировался.', 590, 2005, '90.jpg'),
(91, 'Зарубежная художественная литература', 'Рэй Брэдбери - 451 градус по Фаренгейту', 'Увлекательный роман-антиутопия.', 350, 2010, '91.jpg'),
(92, 'Зарубежная художественная литература', 'Гарри Поттер и Философский Камень', 'Продолжение невероятных приключений волшебников. Автор - Дж. Роулинг.', 470, 2015, '92.jpg'),
(93, 'Учебная литература', 'Б.П. Демидович - Сборник задач по математическому анализу', 'Бессмертная классика и универсальное средство как для приобретения знаний, так и депрессии.', 550, 2005, '93.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Российская художественная литература'),
(2, 'Зарубежная художественная литература'),
(3, 'Учебная литература'),
(4, 'Научная литература');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'Аноним',
  `book_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author`, `book_id`, `text`) VALUES
(35, 'Александра', 87, 'Шикарная книга'),
(36, 'Тимур', 92, 'Волшебная история!'),
(37, 'Александра', 92, 'И не поспоришь');

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
  `status` varchar(255) DEFAULT 'Новичок',
  `bought` int(5) DEFAULT 0,
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
(1, 1, 'Александра', 'Книголюб', 100, '2019-10-02 00:22:01', '+7-967-353-08-22', 'passionatereader@yandex.ru', 'Москва, ул. Тимирязевская 5 кв 3', 'bookwarm.jpg'),
(2, 2, 'Тимур', 'Новичок', 1, '2019-10-02 00:26:52', '+7-977-352-51-22', 'timur1234@bk.ru', 'Волгоградская обл., Волгоград, Университетский проспект 100', 'default.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookinfo`
--
ALTER TABLE `bookinfo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `bookinfo`
--
ALTER TABLE `bookinfo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `passinfo`
--
ALTER TABLE `passinfo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `privateinfo`
--
ALTER TABLE `privateinfo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
