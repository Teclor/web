-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 27 2019 г., 18:28
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
(63, 'Российская художественная литература', 'Помогите спасите, мой сын - программист, а я гуманитарий', 'Очень интересно, наверн, мы не знаем, не читали', 100, 2019, 'qwbQ8q1i7-w.jpg'),
(64, 'Российская художественная литература', 'Hello world', 'Hello world, или как фраза стала программой богов', 200, 2018, '_SfnYoy0gEs.jpg'),
(65, 'Зарубежная художественная литература', 'DIDIDIDIDIII', 'Uvambaway uvambaway', 2000, 2015, 'DgDlQTcHIxo.jpg'),
(66, 'Зарубежная художественная литература', 'Kurlik-kurlik', 'Отважные голуби снова спасают мир', 300, 2014, '66.jpg'),
(67, 'Учебная литература', 'Математика 5 класс', 'Сложно невозможно', 250, 2015, 'cuYihC1QoD0.jpg'),
(68, 'Учебная литература', 'Математика 6 класс', 'Намного легче, чем в 5-м, честно', 260, 2000, '5UrmU6MXV2o.jpg'),
(69, 'Научная литература', 'Demidovich', 'Мы не знаем что это такое, если бы мы знали что это такое, но мы не знаем что это такое', 1000, 2007, 'z1FHbFpMZzo.jpg');

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
(31, 'Тимур', 64, 'Неплохо');

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
-- Индексы таблицы `bookinfo`
--
ALTER TABLE `bookinfo`
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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
