-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 06 2024 г., 01:07
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Doctor`
--

CREATE TABLE `Doctor` (
  `id` int NOT NULL,
  `first_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `specialty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Patient`
--

CREATE TABLE `Patient` (
  `id` int NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Patient_card`
--

CREATE TABLE `Patient_card` (
  `id` int NOT NULL,
  `diagnosis` varchar(128) DEFAULT NULL,
  `prescribtion` text,
  `complaints` text,
  `lab_tests` text,
  `patient_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Visit`
--

CREATE TABLE `Visit` (
  `id` int NOT NULL,
  `patient_card_id` int NOT NULL,
  `doctor_id` int NOT NULL,
  `cabinet` int NOT NULL,
  `date_time_of_visit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Patient_card`
--
ALTER TABLE `Patient_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Индексы таблицы `Visit`
--
ALTER TABLE `Visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_card_id`),
  ADD KEY `patient_card_id` (`patient_card_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Doctor`
--
ALTER TABLE `Doctor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Patient`
--
ALTER TABLE `Patient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Patient_card`
--
ALTER TABLE `Patient_card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Visit`
--
ALTER TABLE `Visit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Patient_card`
--
ALTER TABLE `Patient_card`
  ADD CONSTRAINT `patient_card_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `Visit`
--
ALTER TABLE `Visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `Doctor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`patient_card_id`) REFERENCES `Patient_card` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
