-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 04 2016 г., 23:13
-- Версия сервера: 10.1.9-MariaDB
-- Версия PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_repka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `TutorAboutPupil1` text NOT NULL,
  `Pupil1AboutTutor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `TutorAboutPupil1`, `Pupil1AboutTutor`) VALUES
(1, 'les1', '', 'pupil'),
(2, 'les2', 'test', ''),
(3, 'les3', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson2`
--

CREATE TABLE `lesson2` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `info` text NOT NULL,
  `pupilsInfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lesson2`
--

INSERT INTO `lesson2` (`id`, `title`, `info`, `pupilsInfo`) VALUES
(1, 'les1', '', ''),
(2, 'les2', '', ''),
(3, 'les3', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson_section`
--

CREATE TABLE `lesson_section` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `pupilsInfo` text NOT NULL,
  `class` int(11) NOT NULL,
  `serialNumber` float NOT NULL,
  `additionalInformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `lesson_topic`
--

CREATE TABLE `lesson_topic` (
  `id` int(11) NOT NULL,
  `lesson_section_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `pupilsInfo` text NOT NULL,
  `info` text NOT NULL,
  `serialNumber` int(11) NOT NULL,
  `additionalInformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1458767479),
('m130524_201442_init', 1458767486);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'halva202', '700MAgJ2Om9W43W-Y-qds62dSJzTGmTO', '$2y$13$x0y4IuIq2bUYZcGskxe2Fulk./i31og3.m.GmY8ZmK7bYYiWBls7S', NULL, 'halva202@gmail.com', 10, 20, 1458997097, 1458997097),
(2, 'user', '2o06cMwHAiMOAnjwga7g1811XR2dZbAu', '$2y$13$RbDD9ybuZfloOvMFQMnb5Ot0v88KOq3uH6EB8EoSpeVNxqJYi7utK', NULL, 'user@email.com', 10, 10, 1459000602, 1459000602),
(3, 'qwe1', 'i797OCHCo8rM2S711blSCia_owbPyBLy', '$2y$13$mZGq8K6YRT86QLKubyjXhOva00J/TzagD8KjjZ.OivUFiUqLxZVpi', NULL, 'qwe1@gmail.com', 10, 10, 1459375923, 1459375923);

-- --------------------------------------------------------

--
-- Структура таблицы `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `TutorAboutPupil` text NOT NULL,
  `PupilAboutTutor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userprofile`
--

INSERT INTO `userprofile` (`id`, `user_id`, `TutorAboutPupil`, `PupilAboutTutor`) VALUES
(1, 1, '', 'pppp'),
(2, 3, '', ''),
(3, 0, '', ''),
(4, 0, '', 'tr'),
(5, 0, '', 'tre');

-- --------------------------------------------------------

--
-- Структура таблицы `userprofile2`
--

CREATE TABLE `userprofile2` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `myOpinion` text NOT NULL,
  `pupilOpinion` text NOT NULL,
  `lesson_1_TutorOpinion` text NOT NULL,
  `lesson_1_PupilOpinion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userprofile2`
--

INSERT INTO `userprofile2` (`id`, `user_id`, `info`, `myOpinion`, `pupilOpinion`, `lesson_1_TutorOpinion`, `lesson_1_PupilOpinion`) VALUES
(1, 1, 'halva', 'my op2', 'new information222', '', ''),
(2, 3, '', '', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lesson2`
--
ALTER TABLE `lesson2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lesson_section`
--
ALTER TABLE `lesson_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Индексы таблицы `lesson_topic`
--
ALTER TABLE `lesson_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_section_id` (`lesson_section_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `userprofile2`
--
ALTER TABLE `userprofile2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `lesson2`
--
ALTER TABLE `lesson2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `lesson_section`
--
ALTER TABLE `lesson_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lesson_topic`
--
ALTER TABLE `lesson_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `userprofile2`
--
ALTER TABLE `userprofile2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lesson_section`
--
ALTER TABLE `lesson_section`
  ADD CONSTRAINT `lesson_section_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lesson2` (`id`);

--
-- Ограничения внешнего ключа таблицы `lesson_topic`
--
ALTER TABLE `lesson_topic`
  ADD CONSTRAINT `lesson_topic_ibfk_1` FOREIGN KEY (`lesson_section_id`) REFERENCES `lesson_section` (`id`);

--
-- Ограничения внешнего ключа таблицы `userprofile2`
--
ALTER TABLE `userprofile2`
  ADD CONSTRAINT `userprofile2_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
