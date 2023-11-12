-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 13 2023 г., 00:14
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Младший школьный возраст (7-12 лет)'),
(2, 'Средний школьный возраст (12-15 лет)'),
(3, 'Старший школьный возраст (15-18 лет)');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `body`, `created_at`, `updated_at`, `status`, `user_id`, `section_id`) VALUES
(11, 'отличный кружок', '2023-11-03 15:01:40', '2023-11-12 19:57:40', 1, 4, NULL),
(12, 'Прекрасный кружок! Ребенок в восторге!\r\n', '2023-11-12 19:31:56', '2023-11-12 19:59:22', 2, 4, NULL),
(13, 'Класс!!', '2023-11-12 19:28:03', '2023-11-12 19:58:01', 1, 4, NULL),
(14, 'Очень хороший кружок', '2023-11-12 19:35:42', '2023-11-12 19:35:42', 0, 4, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `day`
--

CREATE TABLE `day` (
  `id` int NOT NULL,
  `day` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `day`
--

INSERT INTO `day` (`id`, `day`) VALUES
(1, 'Понедельник'),
(2, 'Вторник'),
(3, 'Среда'),
(4, 'Четверг'),
(5, 'Пятница'),
(6, 'Суббота');

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE `records` (
  `id` int NOT NULL,
  `surname` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `patronymic` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `child_surname` varchar(256) NOT NULL,
  `child_name` varchar(256) NOT NULL,
  `child_patronymic` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `child_age` varchar(256) NOT NULL,
  `status` int DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `category_id` int NOT NULL,
  `section_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `surname`, `name`, `patronymic`, `phone`, `child_surname`, `child_name`, `child_patronymic`, `child_age`, `status`, `user_id`, `category_id`, `section_id`) VALUES
(13, 'Иванов', 'Иван', 'Иванович', '+7(156)-161-63-01', 'Иванов', 'Петр', 'Петрович', '14', 1, 4, 2, 9),
(14, 'Иванов', 'Иван', 'Иванович', '+7(259)-256-56-21', 'Иванов', 'Петр', 'Петрович', '10', 2, 4, 1, 10),
(15, 'Иванов', 'Иван', 'Иванович', '+7(485)-418-52-30', 'Иванов', 'Петр', 'Петрович', '8', 1, NULL, 1, 9),
(16, 'Иванов', 'Иван', 'Иванович', '+7(111)-111-11-11', 'Иванов', 'Петр', 'Петрович', '8', 1, NULL, 1, 9),
(17, 'Иванов', 'Иван', 'Иванович', '+7(111)-111-11-11', 'Иванов', 'Петр', 'Петрович', '7', 1, 4, 1, 10),
(18, 'Сидоров', 'Василий', 'Николаевич', '+7(996)-514-86-26', 'Сидоров', 'Матвей', 'Васильевич', '9', 1, NULL, 1, 12),
(19, 'Васильев', 'Василий', 'Васильевич', '+7(959)-952-62-62', 'Васильев', 'Егор', 'Васильевич', '15', 2, NULL, 3, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `day_id` int NOT NULL,
  `time_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `section_id`, `teacher_id`, `day_id`, `time_id`) VALUES
(10, 7, 1, 1, 4),
(11, 8, 2, 5, 7),
(12, 9, 4, 2, 3),
(13, 10, 3, 4, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_id` int NOT NULL,
  `teacher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`, `description`, `image`, `category_id`, `teacher_id`) VALUES
(7, 'Живопись и рисование', 'В этом кружке дети будут заниматься живописью и рисованием. Они научатся смешивать цвета, рисовать различные предметы и персонажи, а также экспериментировать с различными материалами и техниками. Результатом занятий могут быть яркие и красочные картины, которые они смогут забрать домой.', '1.jpg', 1, 1),
(8, 'Оригами и рукоделие', 'Оригами и рукоделие — это искусство создания различных фигур и предметов из бумаги и других материалов. В этом кружке дети будут учиться складывать оригами, создавать поделки из бумаги и других материалов, а также экспериментировать с различными техниками и узорами. Результаты их работы могут стать украшением класса или подарками для родственников.', '2.jpg', 1, 2),
(9, 'Театральное искусство', 'В этом кружке дети смогут раскрыть свои актерские способности. Они будут учиться играть различные роли, развивать мимику и жесты, а также создавать собственные сценарии. Кроме того, дети также смогут попробовать себя в роли режиссера и организовать собственное театральное представление.', '4.jpg', 2, 4),
(10, 'Кулинария', 'В кружке «Кулинария» дети смогут научиться готовить различные блюда. Они будут знакомиться с основами кулинарного искусства, изучать различные рецепты и самостоятельно готовить пищу. Это позволит детям развить навыки самостоятельности, творчества и воображения, а также научить их здоровому питанию.', '3.jpg', 2, 3),
(11, 'Скалолазание', 'Альпинизм и скалолазание — немного экстрима с соблюдением всех правил безопасности. Дети занимаются на специальных скалодромах в полной экипировке и под чутким руководством тренера. Развивают координацию, физическую силу, логику и умение продумывать действия на несколько шагов вперед.', '5.jpg', 3, 5),
(12, 'Керамика', 'Запас тарелок и кружек в доме точно пополнится, если отдать ребенка на гончарное дело. Ребята будут лепить из глины изделия на гончарном круге, наблюдать за процессом обжига, глазировать работы и расписывать их. Занятия развивают усидчивость, творческое начало, умение воплощать идеи в реальность. А еще они успокаивают, помогают избавиться от стресса и погрузиться в себя.', '6.jpg', 3, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `id` int NOT NULL,
  `surname` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `patronymic` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`id`, `surname`, `name`, `patronymic`, `image`) VALUES
(1, 'Соколова', 'Вероника', 'Даниловна', '7.jpg'),
(2, 'Левина', 'Софья', 'Михайловна', '9.jpg'),
(3, 'Воробьева ', 'Арина', 'Евгеньевна', '10.jpg'),
(4, 'Виноградов', 'Герман', 'Богданович', '11.jpg'),
(5, 'Прохоров', 'Марк', 'Романович', '12.jpg'),
(6, 'Александрова', 'Елизавета', 'Романовна', '13.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `time`
--

CREATE TABLE `time` (
  `id` int NOT NULL,
  `time` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `time`
--

INSERT INTO `time` (`id`, `time`) VALUES
(1, '12:00-14:00'),
(2, '14:00-16:00'),
(3, '15:00-16:30'),
(4, '14:30-16:00'),
(5, '12:30-13:30'),
(6, '13:00-15:00'),
(7, '17:00-19:00'),
(8, '19:00-20:00'),
(9, '18:00-20:00'),
(10, '17:30-19:30');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `patronymic` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `patronymic`, `email`, `password`, `role`) VALUES
(2, 'admin2', 'Иван', 'Иванов', 'Иванович', 'admin2@mail.ru', '$2y$13$AW.7M5VQoMR4qwhho.VFC.21wy55vazDLO8OhSPoAFLYdL2JaHMNW', 0),
(3, 'admin', 'Админ', 'Админ', 'Админ', 'admin@mail.ru', '$2y$13$R3vpt0wUL3bmJeG6xiL56utIJP0eQ40bgTeGjMoFWVyfsb4Dp7SDi', 1),
(4, 'karina', 'Карина', 'Шибаева', 'Антоновна', 'karinashib@yandex.ru', '$2y$13$IZlYf8nV6xoIjOS6FOnoM.DcwYTQBTnAuwA1cK.atl723ZkF0GiuO', 0),
(5, 'karych', 'Карина', 'Шибаева', 'Антоновна', 'karinashib1@yandex.ru', '$2y$13$FkQVHO8JzR9pFaehVtFfW.1RCwCYSTJHBOLxxMsmsfqt2jJ1jvVVS', 0),
(6, 'nikola', 'Николай', 'Васильев', 'Дмитриевич', 'nikola@mail.ru', '$2y$13$rU6BT/rohYceJc90CwI6/OErKijoix005CKzxl9vFfTox0C8uhoUW', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`section_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Индексы таблицы `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`section_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `day_id` (`day_id`,`time_id`),
  ADD KEY `time_id` (`time_id`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `teacher_id_2` (`teacher_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `day`
--
ALTER TABLE `day`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `records`
--
ALTER TABLE `records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `time`
--
ALTER TABLE `time`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `records_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `records_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`time_id`) REFERENCES `time` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
