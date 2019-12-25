-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 20 2019 г., 08:32
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
(87, 'Российская художественная литература', 'Дмитрий Глуховский - Метро 2033', 'Невероятная история о приключениях в постапокалиптическом мире.', 700, 2005, '87.jpg'),
(88, 'Российская художественная литература', 'А.С. Грибоедов - Горе от ума', 'Бессмертная классика', 490, 2001, '88.jpg'),
(89, 'Научная литература', 'Зигмунд Фрейд - Введение в психоанализ', 'Лекции Зигмунда Фрейда.', 830, 2008, '89.jpg'),
(90, 'Зарубежная художественная литература', 'Джордж Оурэлл - 1984', 'Последний роман 1984 культового британского писателя Джорджа Оруэлла вышел в 1949 году за год до его смерти. Он имел бешеную популярность в Англии и США, был переведен более чем на шестьдесят языков, неоднократно экранизировался.', 590, 2005, '90.jpg'),
(91, 'Зарубежная художественная литература', 'Рэй Брэдбери - 451 градус по Фаренгейту', 'Увлекательный роман-антиутопия.', 350, 2010, '91.jpg'),
(92, 'Зарубежная художественная литература', 'Гарри Поттер и Философский Камень', 'Продолжение невероятных приключений волшебников. Автор - Дж. Роулинг.', 400, 2015, '92.jpg'),
(93, 'Учебная литература', 'Б.П. Демидович - Сборник задач по математическому анализу', 'Бессмертная классика и универсальное средство как для приобретения знаний, так и депрессии.', 900, 2005, '93.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Структура таблицы `distribution_points`
--

CREATE TABLE `distribution_points` (
  `id` int(11) NOT NULL,
  `point_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `user_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `distribution_points`
--

INSERT INTO `distribution_points` (`id`, `point_name`, `address`, `user_rating`) VALUES
(1, 'Доставляем вот сюда', 'ул. Карачаевская, д. 2', 4),
(2, 'Сюда тоже доставляем', 'ул. Не найдена, д. 3', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `text`, `date`) VALUES
(1, 1, 'dsadsa', '2019-12-17 20:21:49'),
(2, 1, 'Хороший сайт, прикольно', '2019-12-17 20:24:22'),
(3, 1, 'Еще один отзыв', '2019-12-17 20:31:29'),
(4, 1, 'Норм сайт', '2019-12-20 02:44:58'),
(5, 11, 'Неплохо', '2019-12-20 02:59:46'),
(6, 11, 'аааа', '2019-12-20 03:00:37'),
(7, 1, 'Я пишу здесь свой фидбек', '2019-12-20 11:25:38');

-- --------------------------------------------------------

--
-- Структура таблицы `ordered_books`
--

CREATE TABLE `ordered_books` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ordered_books`
--

INSERT INTO `ordered_books` (`id`, `order_id`, `book_id`) VALUES
(10, 6, 92),
(11, 6, 91),
(12, 7, 89),
(13, 7, 93),
(16, 15, 88),
(17, 15, 90),
(19, 182, 89),
(20, 182, 87),
(21, 182, 90),
(22, 197, 90),
(23, 197, 93),
(24, 216, 90),
(25, 12, 91),
(26, 12, 90),
(27, 20, 93),
(28, 20, 89),
(29, 230, 91);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `delivery_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'На складе',
  `total_price` int(11) NOT NULL,
  `id_distrib_point` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `delivery_date`, `status`, `total_price`, `id_distrib_point`) VALUES
(6, 1, '2019-12-18 16:31:46', '2019-12-18 16:31:46', 'Доставлен', 800, 1),
(7, 1, '2019-12-18 20:33:56', '2019-12-31 04:12:33', 'На складе', 1200, 2),
(8, 1, '2019-12-18 20:33:56', '2019-12-24 04:08:26', 'В пути', 400, 1),
(12, 1, '2019-12-18 21:57:28', '2019-12-18 21:57:28', 'Доставлен', 1000, 1),
(13, 1, '2019-12-18 21:57:30', '2019-12-18 21:57:30', 'Доставлен', 1000, 2),
(15, 2, '2019-12-19 17:22:01', '2019-12-22 14:22:01', 'На складе', 1080, 1);

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
(2, 'amateur', '077d30710117b006e5cd161ec200ab4a'),
(11, 'testuser', 'e16b2ab8d12314bf4efbd6203906ea6c');

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
(0, 0, 'Гость', '0', 0, '2019-12-20 02:27:17', '0', '0', '0', '0'),
(1, 1, 'Александра', 'Книголюб', 100, '2019-10-02 00:22:01', '+7-967-353-08-22', 'passionatereader@yandex.ru', 'Москва, ул. Тимирязевская 5 кв 3', 'bookwarm.jpg'),
(2, 2, 'Тимур', 'Новичок', 1, '2019-10-02 00:26:52', '+7-977-352-51-22', 'timur1234@bk.ru', 'Волгоградская обл., Волгоград, Университетский проспект 100', 'default.png'),
(13, 11, 'Name', 'Новичок', 0, '2019-12-20 02:59:23', '+79218321321', 'test@mail.ru', 'Улица Пушкина, дом 3', '13.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `old_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sale`
--

INSERT INTO `sale` (`id`, `book_id`, `old_price`, `discount`) VALUES
(1, '90', 890, 300),
(7, '92', 450, 50),
(13, '87', 900, 200);

-- --------------------------------------------------------

--
-- Структура таблицы `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_logs`
--

INSERT INTO `user_logs` (`id`, `date`, `user_id`, `action`, `text`) VALUES
(1, '2019-12-20 10:59:14', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(2, '2019-12-20 10:59:16', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(3, '2019-12-20 10:59:17', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(4, '2019-12-20 10:59:18', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(5, '2019-12-20 11:00:24', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(6, '2019-12-20 11:00:27', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(7, '2019-12-20 11:00:30', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(8, '2019-12-20 11:00:30', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(9, '2019-12-20 11:00:39', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(10, '2019-12-20 11:00:40', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(11, '2019-12-20 11:00:43', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(12, '2019-12-20 11:00:46', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'93\')'),
(13, '2019-12-20 11:00:46', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(14, '2019-12-20 11:00:55', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'89\')'),
(15, '2019-12-20 11:00:55', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(16, '2019-12-20 11:00:56', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(17, '2019-12-20 11:00:57', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(18, '2019-12-20 11:01:02', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=90'),
(19, '2019-12-20 11:01:02', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(20, '2019-12-20 11:01:06', 1, 'DB QUERY', 'INSERT INTO `orders` (`user_id`,`delivery_date`,`total_price`) VALUES (\'1\',\'2019-12-23 08:01:06\',\'1330\')'),
(21, '2019-12-20 11:01:06', 1, 'DB QUERY', 'INSERT INTO `ordered_books` (`order_id`,`book_id`) VALUES(\'20\',\'93\')'),
(22, '2019-12-20 11:01:06', 1, 'DB QUERY', 'INSERT INTO `ordered_books` (`order_id`,`book_id`) VALUES(\'20\',\'89\')'),
(23, '2019-12-20 11:01:06', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=\'1\''),
(24, '2019-12-20 11:01:06', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/default_error_handler.php'),
(25, '2019-12-20 11:01:14', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(26, '2019-12-20 11:01:16', 1, 'VISIT', 'http://localhost/favbook.ru/history.php'),
(27, '2019-12-20 11:01:21', 1, 'DB QUERY', 'DELETE FROM `orders` WHERE `id`=\'21\''),
(28, '2019-12-20 11:01:21', 1, 'DB QUERY', 'DELETE FROM `ordered_books` WHERE `order_id`=\'21\''),
(29, '2019-12-20 11:01:21', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/default_error_handler.php'),
(30, '2019-12-20 11:01:23', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(31, '2019-12-20 11:01:26', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(32, '2019-12-20 11:01:33', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(33, '2019-12-20 11:03:39', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(34, '2019-12-20 11:03:42', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(35, '2019-12-20 11:03:42', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(36, '2019-12-20 11:03:43', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(37, '2019-12-20 11:03:46', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(38, '2019-12-20 11:03:51', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(39, '2019-12-20 11:03:53', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(40, '2019-12-20 11:03:54', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(41, '2019-12-20 11:03:56', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(42, '2019-12-20 11:03:57', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(43, '2019-12-20 11:03:57', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(44, '2019-12-20 11:06:43', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(45, '2019-12-20 11:06:44', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'\'.89.\'\')'),
(46, '2019-12-20 11:06:44', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(47, '2019-12-20 11:06:46', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(48, '2019-12-20 11:06:46', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(49, '2019-12-20 11:06:47', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(50, '2019-12-20 11:06:49', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(51, '2019-12-20 11:07:37', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(52, '2019-12-20 11:09:45', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(53, '2019-12-20 11:09:47', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'\'.89.\'\')'),
(54, '2019-12-20 11:09:47', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(55, '2019-12-20 11:09:48', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(56, '2019-12-20 11:09:49', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(57, '2019-12-20 11:09:54', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(58, '2019-12-20 11:09:55', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(59, '2019-12-20 11:09:57', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'89\')'),
(60, '2019-12-20 11:09:57', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(61, '2019-12-20 11:09:58', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(62, '2019-12-20 11:09:59', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(63, '2019-12-20 11:11:11', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(64, '2019-12-20 11:11:18', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(65, '2019-12-20 11:11:27', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(66, '2019-12-20 11:11:29', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'90\')'),
(67, '2019-12-20 11:11:29', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(68, '2019-12-20 11:11:30', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(69, '2019-12-20 11:11:31', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(70, '2019-12-20 11:11:42', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(71, '2019-12-20 11:11:44', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'88\')'),
(72, '2019-12-20 11:11:44', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(73, '2019-12-20 11:11:45', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'92\')'),
(74, '2019-12-20 11:11:45', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(75, '2019-12-20 11:11:48', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'93\')'),
(76, '2019-12-20 11:11:48', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(77, '2019-12-20 11:11:49', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(78, '2019-12-20 11:11:49', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(79, '2019-12-20 11:11:52', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=93'),
(80, '2019-12-20 11:11:52', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(81, '2019-12-20 11:11:53', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=89'),
(82, '2019-12-20 11:11:53', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(83, '2019-12-20 11:11:53', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=88'),
(84, '2019-12-20 11:11:53', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(85, '2019-12-20 11:11:54', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=92'),
(86, '2019-12-20 11:11:54', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(87, '2019-12-20 11:11:54', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=90'),
(88, '2019-12-20 11:11:55', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(89, '2019-12-20 11:13:17', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(90, '2019-12-20 11:13:19', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(91, '2019-12-20 11:13:20', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'90\')'),
(92, '2019-12-20 11:13:20', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(93, '2019-12-20 11:13:21', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(94, '2019-12-20 11:13:21', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(95, '2019-12-20 11:13:27', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=90'),
(96, '2019-12-20 11:13:27', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(97, '2019-12-20 11:13:28', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(98, '2019-12-20 11:16:23', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(99, '2019-12-20 11:16:26', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(100, '2019-12-20 11:16:58', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(101, '2019-12-20 11:17:07', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(102, '2019-12-20 11:17:17', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(103, '2019-12-20 11:17:22', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(104, '2019-12-20 11:17:27', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(105, '2019-12-20 11:17:28', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(106, '2019-12-20 11:17:33', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(107, '2019-12-20 11:17:34', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(108, '2019-12-20 11:17:35', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(109, '2019-12-20 11:17:41', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(110, '2019-12-20 11:18:08', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(111, '2019-12-20 11:18:09', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(112, '2019-12-20 11:18:20', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(113, '2019-12-20 11:18:21', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(114, '2019-12-20 11:18:24', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(115, '2019-12-20 11:18:26', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(116, '2019-12-20 11:18:27', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(117, '2019-12-20 11:18:35', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(118, '2019-12-20 11:18:36', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(119, '2019-12-20 11:18:37', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(120, '2019-12-20 11:18:39', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(121, '2019-12-20 11:18:46', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(122, '2019-12-20 11:18:48', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(123, '2019-12-20 11:18:50', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(124, '2019-12-20 11:18:51', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(125, '2019-12-20 11:18:57', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(126, '2019-12-20 11:18:58', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(127, '2019-12-20 11:18:59', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(128, '2019-12-20 11:19:05', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(129, '2019-12-20 11:19:14', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(130, '2019-12-20 11:19:15', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(131, '2019-12-20 11:19:22', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(132, '2019-12-20 11:19:23', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(133, '2019-12-20 11:19:32', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(134, '2019-12-20 11:19:34', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(135, '2019-12-20 11:20:00', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(136, '2019-12-20 11:20:02', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(137, '2019-12-20 11:20:03', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(138, '2019-12-20 11:20:04', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(139, '2019-12-20 11:20:10', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(140, '2019-12-20 11:20:10', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(141, '2019-12-20 11:20:12', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(142, '2019-12-20 11:20:18', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(143, '2019-12-20 11:20:20', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'91\')'),
(144, '2019-12-20 11:20:20', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(145, '2019-12-20 11:20:21', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(146, '2019-12-20 11:20:22', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(147, '2019-12-20 11:20:25', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(148, '2019-12-20 11:20:26', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(149, '2019-12-20 11:20:28', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'88\')'),
(150, '2019-12-20 11:20:28', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(151, '2019-12-20 11:20:29', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(152, '2019-12-20 11:20:30', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(153, '2019-12-20 11:21:05', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=88'),
(154, '2019-12-20 11:21:05', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(155, '2019-12-20 11:21:06', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=91'),
(156, '2019-12-20 11:21:06', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(157, '2019-12-20 11:21:07', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(158, '2019-12-20 11:21:07', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(159, '2019-12-20 11:21:09', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'91\')'),
(160, '2019-12-20 11:21:09', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(161, '2019-12-20 11:21:09', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(162, '2019-12-20 11:21:10', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(163, '2019-12-20 11:21:11', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=91'),
(164, '2019-12-20 11:21:11', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(165, '2019-12-20 11:21:12', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(166, '2019-12-20 11:21:13', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(167, '2019-12-20 11:21:14', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(168, '2019-12-20 11:21:14', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(169, '2019-12-20 11:21:22', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(170, '2019-12-20 11:21:25', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(171, '2019-12-20 11:21:29', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(172, '2019-12-20 11:21:33', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(173, '2019-12-20 11:21:34', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(174, '2019-12-20 11:21:36', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(175, '2019-12-20 11:21:37', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(176, '2019-12-20 11:21:44', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(177, '2019-12-20 11:21:45', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(178, '2019-12-20 11:21:47', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(179, '2019-12-20 11:21:47', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(180, '2019-12-20 11:21:52', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(181, '2019-12-20 11:21:53', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(182, '2019-12-20 11:21:55', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(183, '2019-12-20 11:22:02', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(184, '2019-12-20 11:22:05', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'91\')'),
(185, '2019-12-20 11:22:05', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(186, '2019-12-20 11:22:06', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(187, '2019-12-20 11:22:07', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(188, '2019-12-20 11:22:26', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(189, '2019-12-20 11:22:27', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(190, '2019-12-20 11:22:29', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(191, '2019-12-20 11:22:33', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(192, '2019-12-20 11:22:37', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'89\')'),
(193, '2019-12-20 11:22:37', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(194, '2019-12-20 11:22:38', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(195, '2019-12-20 11:22:39', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(196, '2019-12-20 11:22:44', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=89'),
(197, '2019-12-20 11:22:44', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(198, '2019-12-20 11:22:44', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=91'),
(199, '2019-12-20 11:22:44', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(200, '2019-12-20 11:22:45', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(201, '2019-12-20 11:22:48', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(202, '2019-12-20 11:22:49', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(203, '2019-12-20 11:22:51', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(204, '2019-12-20 11:22:53', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(205, '2019-12-20 11:22:58', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(206, '2019-12-20 11:23:00', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(207, '2019-12-20 11:23:02', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(208, '2019-12-20 11:23:52', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(209, '2019-12-20 11:24:12', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(210, '2019-12-20 11:24:21', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(211, '2019-12-20 11:24:26', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(212, '2019-12-20 11:24:26', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(213, '2019-12-20 11:24:29', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(214, '2019-12-20 11:24:30', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(215, '2019-12-20 11:24:40', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(216, '2019-12-20 11:24:42', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(217, '2019-12-20 11:24:43', 1, 'VISIT', 'http://localhost/favbook.ru/bookpage.php'),
(218, '2019-12-20 11:24:44', 1, 'VISIT', 'http://localhost/favbook.ru/adminud.php'),
(219, '2019-12-20 11:24:50', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/udhandler.php'),
(220, '2019-12-20 11:24:51', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(221, '2019-12-20 11:24:52', 1, 'VISIT', 'http://localhost/favbook.ru/sale.php'),
(222, '2019-12-20 11:24:58', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'87\')'),
(223, '2019-12-20 11:24:58', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(224, '2019-12-20 11:25:01', 1, 'DB QUERY', 'INSERT INTO `cart` (`user_id`,`book_id`) VALUES (\'1\',\'91\')'),
(225, '2019-12-20 11:25:01', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(226, '2019-12-20 11:25:02', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(227, '2019-12-20 11:25:03', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(228, '2019-12-20 11:25:07', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=1 AND `book_id`=87'),
(229, '2019-12-20 11:25:07', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(230, '2019-12-20 11:25:10', 1, 'DB QUERY', 'INSERT INTO `orders` (`user_id`,`delivery_date`,`total_price`) VALUES (\'1\',\'2019-12-23 08:25:10\',\'350\')'),
(231, '2019-12-20 11:25:10', 1, 'DB QUERY', 'INSERT INTO `ordered_books` (`order_id`,`book_id`) VALUES(\'230\',\'91\')'),
(232, '2019-12-20 11:25:10', 1, 'DB QUERY', 'DELETE FROM `cart` WHERE `user_id`=\'1\''),
(233, '2019-12-20 11:25:10', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/default_error_handler.php'),
(234, '2019-12-20 11:25:15', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(235, '2019-12-20 11:25:16', 1, 'VISIT', 'http://localhost/favbook.ru/history.php'),
(236, '2019-12-20 11:25:20', 1, 'DB QUERY', 'DELETE FROM `orders` WHERE `id`=\'22\''),
(237, '2019-12-20 11:25:20', 1, 'DB QUERY', 'DELETE FROM `ordered_books` WHERE `order_id`=\'22\''),
(238, '2019-12-20 11:25:20', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/default_error_handler.php'),
(239, '2019-12-20 11:25:21', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(240, '2019-12-20 11:25:23', 1, 'VISIT', 'http://localhost/favbook.ru/cart.php'),
(241, '2019-12-20 11:25:26', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(242, '2019-12-20 11:25:38', 1, 'VISIT', 'http://localhost/favbook.ru/handlers/default_error_handler.php'),
(243, '2019-12-20 11:25:40', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(244, '2019-12-20 11:25:48', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(245, '2019-12-20 11:25:50', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(246, '2019-12-20 11:25:52', 1, 'VISIT', 'http://localhost/favbook.ru/distribution_points.php'),
(247, '2019-12-20 11:25:57', 1, 'VISIT', 'http://localhost/favbook.ru/catalogue.php'),
(248, '2019-12-20 11:26:04', 1, 'VISIT', 'http://localhost/favbook.ru/cabinet.php'),
(249, '2019-12-20 11:26:06', 1, 'VISIT', 'http://localhost/favbook.ru/reports.php'),
(250, '2019-12-20 11:26:08', 1, 'VISIT', 'http://localhost/favbook.ru/reports.php'),
(251, '2019-12-20 11:26:12', 1, 'VISIT', 'http://localhost/favbook.ru/reports.php'),
(252, '2019-12-20 11:26:18', 1, 'VISIT', 'http://localhost/favbook.ru/reports.php'),
(253, '2019-12-20 11:26:24', 1, 'VISIT', 'http://localhost/favbook.ru/reports.php'),
(254, '2019-12-20 11:26:30', 1, 'VISIT', 'http://localhost/favbook.ru/reports.php'),
(255, '2019-12-20 11:26:38', 1, 'VISIT', 'http://localhost/favbook.ru/reports.php');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookinfo`
--
ALTER TABLE `bookinfo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
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
-- Индексы таблицы `distribution_points`
--
ALTER TABLE `distribution_points`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ordered_books`
--
ALTER TABLE `ordered_books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- Индексы таблицы `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookinfo`
--
ALTER TABLE `bookinfo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `distribution_points`
--
ALTER TABLE `distribution_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ordered_books`
--
ALTER TABLE `ordered_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `passinfo`
--
ALTER TABLE `passinfo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `privateinfo`
--
ALTER TABLE `privateinfo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
