-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2021 г., 03:28
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `maxscore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category_user`
--

CREATE TABLE `category_user` (
  `cat_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_user`
--

INSERT INTO `category_user` (`cat_name`, `cat_user`) VALUES
('user', 1),
('admin', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `team1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id_history`, `team1`, `team2`, `score`, `date`, `id_user`) VALUES
(16, 'Макартур', 'Гвинея', '2 : 0', '16.06.2021 22:13', 6),
(17, 'Торпедо-БелАЗ', 'Динамо', '2 : 0', '16.06.2021 22:36', 6),
(18, 'Макартур', 'Сентрал', '2 : 1', '17.06.2021 05:12', 6),
(19, 'Манчестер', 'Гвинея', '2 : 0', '17.06.2021 06:07', 6),
(20, 'Виктория', 'Динамо', '2 : 0', '17.06.2021 07:02', 21),
(21, 'Макартур', 'Сентрал', '2 : 1', '17.06.2021 09:36', 20),
(22, 'Аргентина', 'Гояс', '1 : 2', '17.06.2021 09:36', 20),
(23, 'Россия', 'Бельгия', '0 : 3', '17.06.2021 09:36', 20),
(24, 'Гвинея', 'Сентрал', '0 : 1', '17.06.2021 09:56', 20),
(25, 'Торпедо-БелАЗ', 'Франция', '1 : 1', '21.06.2021 14:18', 7),
(26, 'Уачипато', 'Сидней', '1 : 2', '21.06.2021 14:18', 7),
(27, 'Торпедо-БелАЗ', 'Сентрал', '2 : 1', '21.06.2021 14:24', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `statistics`
--

CREATE TABLE `statistics` (
  `id_statistics` int(100) NOT NULL,
  `teams_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teams_logo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wins` int(255) NOT NULL,
  `draws` int(255) NOT NULL,
  `loses` int(255) NOT NULL,
  `wins_first_time` int(255) NOT NULL,
  `draws_first_time` int(255) NOT NULL,
  `loses_first_time` int(255) NOT NULL,
  `wins_sec_time` int(255) NOT NULL,
  `draws_sec_time` int(255) NOT NULL,
  `loses_sec_time` int(255) NOT NULL,
  `goals` double NOT NULL,
  `loses_goals` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statistics`
--

INSERT INTO `statistics` (`id_statistics`, `teams_name`, `teams_logo`, `wins`, `draws`, `loses`, `wins_first_time`, `draws_first_time`, `loses_first_time`, `wins_sec_time`, `draws_sec_time`, `loses_sec_time`, `goals`, `loses_goals`) VALUES
(36, 'Брентфорд', 'images/teams_logo/Брентфорд.png', 6, 3, 1, 2, 8, 2, 4, 1, 2, 1.6, 1.4),
(38, 'Торпедо-БелАЗ', 'images/teams_logo/Торпедо-БелАЗ.png', 2, 5, 3, 1, 5, 4, 2, 5, 3, 1.2, 1.6),
(39, 'БАТЭ', 'images/teams_logo/БАТЭ.png', 7, 2, 1, 5, 3, 5, 3, 7, 5, 2.1, 1.1),
(40, 'Славия Мозырь', 'images/teams_logo/СлавияМозырь.png', 3, 2, 5, 3, 4, 3, 3, 2, 5, 1.6, 1.6),
(41, 'Виктория Пльзень', 'images/teams_logo/ВикторияПльзень.png', 4, 2, 4, 3, 4, 3, 5, 5, 2, 1.4, 1.7),
(42, 'Неман', 'images/teams_logo/Неман.png', 2, 2, 6, 2, 4, 4, 2, 3, 5, 0.8, 1.4),
(43, 'Динамо Ческе-Будеёвице', 'images/teams_logo/ДинамоЧеске-Будеёвице.png', 2, 2, 6, 3, 4, 3, 1, 4, 5, 0.6, 1.4),
(44, 'Манчестер Сити', 'images/teams_logo/МанчестерСити.png', 7, 3, 0, 4, 1, 6, 1, 3, 1, 2.1, 1.1),
(45, 'Алькоркон', 'images/teams_logo/Алькоркон.png', 4, 2, 4, 4, 4, 2, 4, 2, 4, 1.1, 1),
(46, 'Эспаньол', 'images/teams_logo/Эспаньол.png', 6, 3, 1, 6, 2, 2, 6, 3, 1, 2.2, 0.6),
(49, 'Макартур', 'images/teams_logo/Макартур.png', 3, 4, 3, 3, 6, 1, 1, 5, 4, 1.4, 1.4),
(50, 'Ньюпорт Каунти', 'images/teams_logo/НьюпортКаунти.png', 4, 4, 2, 3, 5, 2, 4, 5, 1, 1.3, 0.7),
(51, 'Турция', 'images/teams_logo/Турция.png', 5, 4, 1, 6, 3, 1, 3, 4, 3, 2.2, 1.5),
(52, 'Гвинея', 'images/teams_logo/Гвинея.png', 4, 4, 2, 2, 7, 1, 3, 6, 1, 1.2, 0.7),
(53, 'Уачипато', 'images/teams_logo/Уачипато.png', 3, 3, 4, 4, 2, 4, 1, 3, 6, 1.1, 1.8),
(54, 'Сампайо Корреа', 'images/teams_logo/СампайоКорреа.png', 4, 6, 0, 5, 2, 2, 4, 4, 1, 0.9, 1),
(55, 'Гояс', 'images/teams_logo/Гояс.png', 3, 2, 5, 3, 1, 6, 3, 4, 3, 1.2, 2),
(56, 'Сентрал Кост Маринерс', 'images/teams_logo/СентралКостМаринерс.png', 3, 4, 3, 3, 5, 2, 3, 2, 5, 1, 1.3),
(57, 'Польша', 'images/teams_logo/Польша.png', 5, 2, 3, 5, 2, 3, 6, 2, 2, 2, 1.1),
(58, 'Россия', 'images/teams_logo/Россия.png', 3, 4, 3, 3, 4, 3, 1, 7, 2, 1.1, 1.4),
(59, 'Брисбен Роар', 'images/teams_logo/БрисбенРоар.png', 5, 2, 3, 4, 4, 2, 3, 5, 2, 1.5, 0.9),
(60, 'Перт Глори', 'images/teams_logo/ПертГлори.png', 4, 4, 2, 2, 5, 3, 5, 3, 2, 1.8, 1.3),
(61, 'Гуарани Кампинас', 'images/teams_logo/ГуараниКампинас.png', 3, 2, 5, 2, 7, 1, 1, 4, 5, 1, 1.3),
(71, 'Пеньяроль', 'images/teams_logo/Пеньяроль.png', 6, 3, 1, 7, 2, 1, 6, 3, 1, 2.6, 0.8),
(72, 'Аделаида Юнайтед', 'images/teams_logo/АделаидаЮнайтед.png', 3, 3, 4, 3, 4, 3, 2, 4, 4, 1.1, 1.5),
(73, 'Сидней Уондерерс', 'images/teams_logo/СиднейУондерерс.png', 3, 2, 5, 3, 1, 6, 5, 2, 3, 2, 2),
(74, 'Бельгия', 'images/teams_logo/Бельгия.png', 8, 2, 0, 2, 1, 5, 4, 1, 2, 2.7, 0.7),
(75, 'Греция', 'images/teams_logo/Греция.png', 5, 4, 1, 4, 5, 1, 3, 5, 2, 1.3, 0.7),
(76, 'Аргентина', 'images/teams_logo/Аргентина.png', 6, 2, 2, 5, 3, 2, 4, 3, 3, 1.3, 0.8),
(77, 'Чили', 'images/teams_logo/Чили.png', 3, 2, 5, 3, 4, 3, 2, 4, 4, 1.1, 1.4),
(78, 'Веллингтон Феникс', 'images/teams_logo/ВеллингтонФеникс.png', 5, 5, 0, 6, 4, 4, 2, 4, 1, 1.8, 1),
(79, 'Испания', 'images/teams_logo/Испания.png', 5, 4, 1, 6, 2, 2, 4, 3, 3, 1.9, 0.6),
(80, 'Португалия', 'images/teams_logo/Португалия.png', 6, 3, 1, 5, 4, 1, 5, 3, 2, 2.1, 0.6),
(81, 'Болгария', 'images/teams_logo/Болгария.png', 1, 3, 6, 1, 6, 3, 2, 4, 4, 0.6, 1.2),
(82, 'Хорватия', 'images/teams_logo/Хорватия.png', 3, 2, 5, 4, 1, 5, 3, 5, 2, 1.4, 1.4),
(83, 'Алжир', 'images/teams_logo/Алжир.png', 5, 3, 2, 1, 3, 4, 2, 2, 1, 2.89, 1),
(84, 'Мали', 'images/teams_logo/Мали.png', 5, 3, 2, 4, 6, 2, 6, 2, 2, 0.9, 0.5),
(85, 'Япония', 'images/teams_logo/Япония.png', 7, 1, 2, 4, 5, 1, 7, 1, 2, 3.4, 0.5),
(86, 'Таджикистан', 'images/teams_logo/Таджикистан.png', 2, 3, 5, 3, 4, 3, 2, 5, 3, 1.2, 1.6),
(87, 'Украина', 'images/teams_logo/Украина.png', 3, 4, 3, 3, 4, 3, 3, 3, 4, 1.3, 1.2),
(88, 'Кипр', 'images/teams_logo/Кипр.png', 2, 2, 6, 1, 3, 6, 2, 7, 1, 0.5, 1.3),
(89, 'Франция', 'images/teams_logo/Франция.png', 7, 2, 1, 6, 3, 1, 5, 4, 1, 1.7, 0.6),
(90, 'Мельбурн Сити', 'images/teams_logo/МельбурнСити.png', 6, 3, 1, 4, 4, 2, 7, 2, 1, 2.5, 1.2),
(91, 'Ньюкасл Джетс', 'images/teams_logo/НьюкаслДжетс.png', 1, 4, 5, 2, 3, 5, 2, 4, 4, 1, 1.5),
(92, 'Англия', 'images/teams_logo/Англия.png', 8, 2, 0, 3, 2, 7, 3, 5, 2, 2, 0.5),
(93, 'Швеция', 'images/teams_logo/Швеция.png', 6, 4, 0, 1, 3, 2, 4, 4, 3, 1.5, 1.3),
(94, 'Шотландия', 'images/teams_logo/Шотландия.png', 4, 4, 2, 3, 4, 3, 3, 7, 1, 1.3, 0.8),
(95, 'Чехия', 'images/teams_logo/Чехия.png', 5, 1, 4, 4, 3, 3, 3, 5, 2, 1.5, 1.2),
(96, 'Германия', 'images/teams_logo/Германия.png', 6, 2, 2, 6, 1, 3, 4, 5, 1, 2.2, 1.5),
(97, 'Дания', 'images/teams_logo/Дания.png', 7, 1, 2, 5, 5, 5, 3, 2, 4, 2.4, 0.7),
(98, 'Северная Македония', 'images/teams_logo/СевернаяМакедония.png', 5, 2, 3, 4, 5, 1, 3, 5, 2, 1.9, 1.1),
(99, 'Брейдаблик', 'images/teams_logo/Брейдаблик.png', 5, 1, 4, 4, 2, 4, 4, 5, 1, 2.2, 1.7),
(100, 'Хабнарфьордюр', 'images/teams_logo/Хабнарфьордюр.png', 5, 2, 3, 4, 4, 2, 5, 1, 4, 1.9, 1.1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `cat_user` int(11) NOT NULL,
  `login_user` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ava_user` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `cat_user`, `login_user`, `email_user`, `pass_user`, `ava_user`) VALUES
(1, 2, NULL, 'admin@max.score', '1234', 'https://i.pinimg.com/originals/ff/a0/9a/ffa09aec412db3f54deadf1b3781de2a.png'),
(6, 1, 'Maxim', 'naruto@gmail.com', '1234', 'images/user_logo/16238888130-02-0a-0b73b11dd822fe92fd8c1fc6058b12720c2d9a1bf9f2486af5e67da767183982_5fa78a7c.jpg'),
(7, 1, 'Tarakan', 'maximbarishov06@gmail.com', 'maxim1415', 'https://i.pinimg.com/originals/ff/a0/9a/ffa09aec412db3f54deadf1b3781de2a.png'),
(20, 1, 'Krot', 'krot@gmail.com', '12345', 'images/user_logo/16239117820-02-0a-00c4687b2d16b16c92efd9dcff16429640743ec79171c8dc34d17d80b2d8494f_3d7f3b94.jpg'),
(21, 1, 'Maxim234', 'maxim@gmail.com', 'maxim', 'images/user_logo/16238902640-02-0a-17c9b53e023cdf9930751a5977698f127c72a1d67965dfc2923cef96a90f39e9_4839853f.jpg'),
(23, 1, 'Totoro', 'maksbarishow06@gmail.com', '1234', 'https://i.pinimg.com/originals/ff/a0/9a/ffa09aec412db3f54deadf1b3781de2a.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`cat_user`);

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD UNIQUE KEY `id_history` (`id_history`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id_statistics`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `cat_user` (`cat_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category_user`
--
ALTER TABLE `category_user`
  MODIFY `cat_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id_statistics` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cat_user`) REFERENCES `category_user` (`cat_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
