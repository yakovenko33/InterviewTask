-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2018 г., 01:07
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `interview`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `article` text NOT NULL,
  `date` datetime NOT NULL,
  `rating` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id_article`, `id_user`, `article`, `date`, `rating`) VALUES
(2, 1, 'Symfony Framework. Symfony — свободный фреймворк, написанный на PHP, который использует паттерн Model-View-Controller.\n\nSymfony предлагает быструю разработку и управление веб-приложениями, позволяет легко решать рутинные задачи веб-программиста. Работает только с PHP 5 и выше. Имеет поддержку множества баз данных (MySQL, PostgreSQL, SQLite или любая другая PDO-совместимая СУБД). Информация о реляционной базе данных в проекте должна быть связана с объектной моделью. Это можно сделать при помощи ORM инструмента. Symfony поставляется с двумя из них: Propel и Doctrine.\n\nSymfony бесплатен и публикуется под лицензией MIT.\n\nПроект спонсируется французской компанией Sensio.', '2018-04-04 15:35:14', 0),
(4, 2, 'Zend Framework — свободный фреймворк на PHP для разработки веб-приложений, разрабатываемый компанией Zend.\r\n\r\nОсновывается на принципах MVC. Помимо MVC-компонентов содержит множество библиотек, полезных для построения приложения, например, реализованы компоненты для интеграции со сторонними сервисами — YouTube, del.icio.us и другими. Начиная с версии 1.6 поставляется с JavaScript-фреймворком Dojo, а также включает в себя компоненты для работы с ним. В сентябре 2012 года вышла версия 2.0 (Zend Framework 2).\r\n\r\nЗаявляются следующие характеристики[3]:\r\n\r\nвсе компоненты написаны на полностью объектно-ориентированном коде PHP 5 и E_STRICT-совместимы;\r\nархитектура «слабого связывания» с минимальными зависимостями между частями проекта (англ. use-at-will architecture with loosely coupled components and minimal interdependencies);\r\nрасширяемая реализация MVC, по умолчанию поддерживающая макеты и PHP-шаблоны;\r\nподдержка различных СУБД, включая MariaDB, MySQL, Oracle Database, IBM DB2, Microsoft SQL Server, PostgreSQL, SQLite и Informix;\r\nформирование, отправка и получение почтовых сообщений по протоколам mbox, Maildir, POP3 и IMAP4;\r\nгибкая система кэширования с поддержкой различных типов — в памяти или в файловой системе.', '2018-04-05 01:10:03', 1),
(5, 1, 'Laravel — бесплатный веб-фреймворк с открытым кодом, предназначенный для разработки с использованием архитектурной модели MVC (англ. Model View Controller — модель-представление-контроллер). Laravel выпущен под лицензией MIT. Исходный код проекта размещается на GitHub[2].\n\nВ результате опроса sitepoint.com в декабре 2013 года о самых популярных PHP-фреймворках Laravel занял место самого многообещающего проекта на 2014 год[3].\n\nВ 2015 году в результате опроса sitepoint.com по использованию PHP-фреймворков среди программистов занял первое место в номинациях:\n\nФреймворк корпоративного уровня\nФреймворк для личных проектов', '2018-04-05 17:42:04', 4),
(6, 4, 'Yii (акроним от «Yes It Is!», произносится как «Yee» или [ji:], на русском «йии»[2]) — объектно-ориентированный компонентный фреймворк, написанный на PHP и реализующий парадигму MVC[3]. История Yii началась 1 января 2008 года, как проект по исправлению некоторых изъянов во фреймворке PRADO[en] (PHP Rapid Application Development Object-oriented), ставшего в 2004 победителем «Zend PHP 5 coding contest»[4][5].\r\n\r\nФреймворк PRADO был попыткой перенести ASP.NET на платформу PHP, включая ViewState, PostBacks, Page_Load и OnClick, вследствие чего встречались участки кода просто скопированные из ASP.NET. Например, разделение на Rare Fields и Occasional Fields в классе Control[6] с целью оптимизации по памяти, которое имеет смысл в .NET, но представляет сомнительную ценность в PHP. PRADO унаследовал от ASP.NET почти все отрицательные стороны: медленно обрабатывал сложные страницы, имел крутую кривую обучения и был довольно труден в настройке[7].\r\n\r\nВ определенный момент основатель и разработчик ядра фреймворка PRADO[8] — Цян Суэ понял, что PHP-фреймворк должен быть построен несколько по-другому. В октябре 2008 года, после более 10 месяцев закрытой разработки, вышла первая альфа-версия. 3 декабря 2008 был выпущен Yii 1.0[3]', '2018-04-05 23:23:38', 2),
(7, 5, 'Phalcon — PHP фреймворк с открытым исходным кодом, написанный на Си. В данный момент поддерживается версия переписанная на Zephir.\r\nОсновывается на идеях MVC. Разрабатывается компанией Phalcon Team. Фреймворк Phalcon PHP распространяется по лицензии BSD с учетом «New BSD License». Phalcon был создан Андресом Гутьеррес и соавторами в процессе поиска нового подхода к традиционным фреймворкам веб-приложений, написанным на PHP. Первоначально предполагалось назвать новый фреймворк «Искра»[1], но сочетание слов «PHP» и названия птицы сокол («Falcon» на английском), которая является одним из самых быстрых животных, в результате и было выбрано в роли наименования фреймворка. Первый выпуск Phalcon был доступен 14 ноября 2012 года.\r\n\r\nВерсия Phalcon 0.3.5 включала в себя ORM, написанный на Си, компоненты MVC и кеширования. Следующим релизом была версия 0.5.0, в котором был реализован высокоуровневый SQL диалект PHQL, а затем Phalcon 0.6.0, привнесший интегрированный шаблонизатор Volt, синтаксически подобный Jinja. Phalcon 1.0 был выпущен 21 марта 2013.[2] В октябре 2014 года вышла бета 3 версия Phalcon 2[3], которая в начале 2015 года получила статус стабильной. Спустя 9 месяцев, в июле 2016 года вышла версия с длительным сроком поддержки Phalcon 3.0.0 LTS[4].', '2018-04-05 23:24:46', 3),
(8, 6, 'Его текст', '2018-04-05 23:34:08', 0),
(9, 7, 'Другой текст', '2018-04-05 23:34:51', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `id_article`, `id_user`, `comment`) VALUES
(1, 5, 3, 'Not interesting!'),
(2, 5, 1, 'It is interesting!'),
(3, 5, 2, 'Good article!'),
(4, 7, 1, 'Not bad!'),
(5, 7, 4, 'Дичь!'),
(6, 5, 2, 'Very good!)'),
(7, 7, 8, 'Ахахаахахахаха'),
(8, 6, 9, 'Интересно)'),
(9, 6, 10, 'Та такое'),
(10, 4, 1, 'Тяжелый framework(((');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name_user`) VALUES
(1, 'Vlad Yakovenko'),
(2, 'Danya Petryk'),
(3, 'Irina Kuklenko'),
(4, 'Denis Grin'),
(5, 'Илья Капков'),
(6, 'Влад Филимонов'),
(7, 'Метревели Михаил'),
(8, 'Георгий'),
(9, 'Влад Молчанов'),
(10, 'Влад Романец');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
