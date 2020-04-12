-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 12 2020 г., 18:18
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ibrablog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `data` date NOT NULL,
  `image` text NOT NULL,
  `views` int(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `data`, `image`, `views`) VALUES
(1, 'Линкольн, Авраам', 'Авраа́м Ли́нкольн (англ. Abraham Lincoln [ˈeɪbrəhæm ˈlɪŋkən]) (12 февраля 1809 года, Ходженвилл, штат Кентукки, — 15 апреля 1865 года, Вашингтон) — американский государственный деятель, 16-й президент США (1861—1865) и первый от Республиканской партии, освободитель американских рабов, национальный герой американского народа. Входит в список 100 самых изученных личностей в истории.\n\nВырос в семье бедного фермера. С ранних лет занимался физическим трудом. Из-за тяжёлого материального положения семьи посещал школу не более года, но сумел выучиться грамоте и полюбил книги. Став совершеннолетним, начал самостоятельную жизнь, занимался самообразованием, сдал экзамены и получил разрешение на адвокатскую практику. Во время восстания индейцев в Иллинойсе вступил в ополчение, был избран капитаном, но в боевых действиях не участвовал. Был также членом Законодательного Собрания Иллинойса, Палаты Представителей Конгресса США, в которой выступал против американо-мексиканской войны. В 1858 году стал кандидатом в сенаторы США, но проиграл выборы.\n\nКак противник расширения рабства на новые территории, выступил одним из инициаторов создания Республиканской партии, был выбран её кандидатом в президенты и выиграл выборы 1860 года. Его избрание послужило сигналом к отделению южных штатов и появлению Конфедерации. В своей инаугурационной речи призвал к воссоединению страны, однако не смог предотвратить конфликт.\n\nЛинкольн лично направлял военные действия, которые привели к победе над Конфедерацией во время Гражданской войны 1861—1865 гг. Его президентская деятельность привела к усилению исполнительной власти и отмене рабства на территории США. Линкольн включил в состав правительства своих противников и смог привлечь их к работе над общей целью. Президент на всём протяжении войны удерживал Великобританию и другие европейские страны от интервенции. В его президентство построена трансконтинентальная железная дорога, принят Гомстед-акт, решивший аграрный вопрос. Линкольн был выдающимся оратором, его речи вдохновляли северян и являются ярким наследием до сих пор[3][4]. По окончании войны предложил план умеренной Реконструкции, связанный с национальным согласием и отказом от мести. 14 апреля 1865 года Линкольн был смертельно ранен в театре, став первым убитым президентом США. Согласно общепринятой точке зрения и социальным опросам, он по-прежнему остаётся одним из лучших и самых любимых президентов Америки[5][6][7], хотя во время президентства подвергался суровой критике[8][9][10].', '2016-09-29', '', 17),
(2, 'Черчилль, Уинстон', 'Сэр Уи́нстон Леона́рд Спе́нсер-Че́рчилль (англ. Sir Winston Leonard Spencer-Churchill, МФА [\'ʧɜːʧɪl][3]; 30 ноября 1874, Бленхеймский дворец, Великобритания — 24 января 1965, Лондон) — британский государственный и политический деятель, премьер-министр Великобритании в 1940—1945 и 1951—1955 годах; военный (полковник), журналист, писатель, почётный член Британской академии (1952)[4], лауреат Нобелевской премии по литературе (1953).\r\n\r\nПо данным опроса, проведённого в 2002 году вещательной компанией Би-би-си, был назван величайшим британцем в истории[5].\r\nКритика\r\nПребывание на посту министра стало одним из самых сложных и противоречивых этапов в политической карьере Черчилля. Этот период ознаменовался массовыми выступлениями рабочих и акциями суфражисток. Действия Черчилля по усмирению беспорядков неоднократно подвергались жёсткой критике со всех сторон политического спектра, более того, как министр внутренних дел он нёс ответственность даже в случаях, когда лично никак не вмешивался в происходящее.\r\n\r\nВ ноябре 1910 года стачка в шахтёрском городе Тонипанди в Южном Уэльсе переросла в массовые беспорядки, когда бастующие горняки попытались преградить путь штрейкбрехерам. По требованию местного Главного Констебля Черчилль отдал распоряжение о вводе войск. Хотя приказ Черчилля запрещал войскам вступать в прямой контакт с бунтовщиками, а легенда о стрельбе по мятежникам была неоднократно опровергнута, сам факт использования армии в метрополии вызвал резко негативную общественную реакцию, лейбористы критиковали Черчилля за чересчур жёсткие меры, консерваторы — за нерешительные действия[11]. Другим инцидентом, когда ответственность за жестокость полиции была возложена на Черчилля, стало избиение полицейскими делегации суфражисток 18 ноября того же года.\r\n\r\nОдним из наиболее скандальных эпизодов стало дело об ограблении ювелирного магазина в декабре 1910 года. В ходе ограбления погибло двое полицейских, ещё один был ранен. Черчилль лично посетил похороны погибших. 3 января Черчиллю сообщили, что преступников обнаружили в доме № 100 по Сидней-стрит. Преступники оказали жёсткое сопротивление, один полицейский был убит и двое ранены. Черчилль прибыл на место событий для руководства операцией, на Сидней-стрит были стянуты значительные полицейские силы, из Тауэра прибыло подразделение Шотландской Гвардии. В результате перестрелки в доме, где засели преступники, начался пожар. Черчилль запретил прибывшей пожарной команде тушить огонь. Когда дом догорел, под обломками было обнаружено два обгоревших трупа, главарь банды бежал. На следующий день снимки Черчилля на Сидней-стрит появились в газетах, украшая статьи с язвительными эпитетами. За этот инцидент Черчилль подвергся резкой критике прессы и коллег по парламенту[9]. Бальфур заметил:\r\nОн [Черчилль] и фотограф, оба рисковали своими драгоценными жизнями. Что делал фотограф, я понимаю, но что [там] делал достойный джентльмен?', '2016-09-29', '7c6cf119ef47fda1ac210dab3a1d6479.jpg', 21),
(33, 'Мой топ произведений', 'Доброго времени суток! <br />\r\nХотелось бы сделать свой небольшой топ произведений из разных жанров, что смогли запасть мне в душу. Приведу их в произвольном порядке. <br /> <br />\r\n\r\n1. \"Гордость и предубеждение\" автор Джейн Остин. \r\nКак и следует из названия, книга повествует о возникновения чувства любви между гордыми людьми: Элизабет Беннет - девушки из простой семьи и аристократа мистера Дарси. Книга понравилась. Очень. Рекомендую всем. <br /> <br />\r\n\r\n2. \"Унесенный ветром\", Николай Метельский. Это серия из уже написанных 7 книг. 8 книга начата. Данное произведение считается первым в новом жанре - бояръаниме. Произведение повествует о пути парня, что который проживает свою уже вторую жизнь и идет наверх - к своей цели. С большим нетерпением жду продолжение книги. <br />\r\n<a href=\"https://author.today/u/nickpol/series#734\"> Ссылка на автортудай</a> <br />\r\n<a href=\"http://samlib.ru/m/metelxskij_n_a/mm.shtml\"> Ссылка на самиздат </a> <br /><br />', '2019-09-07', '', 34),
(34, 'Мой топ 1', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2019-09-19', '97477edbb31753cc6253d5d4276c5e95.jpg', 17),
(35, 'Тестовая статья', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-09-21', '2697797a48386a31297d6313a775ce0d.jpg', 163),
(36, 'Test 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', '205ffa27c76f179f6009779cc3bc8637.jpg', 2),
(37, 'Test 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-05', 'b4908a38b92f8c780037f1d14e356694.jpg', 0),
(38, 'Test 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', '5d90bf952861aab9d64cb2f74de80d24.jpg', 0),
(39, 'Test 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', '8a62eae1109e79f57088899a1cd85330.jpg', 1),
(40, 'Test 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', '4244f99ada1845afef2b1ed81100c752.jpg', 4),
(41, 'Test 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', '018709dd9a4c15ef5f39966231f6adfb.jpg', 6),
(42, 'Test 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', 'a9abed346b2bf3a7e97d96b2e4a98b6a.jpg', 38),
(43, 'Test 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', '9415c172363d6339a28ef7d72c14a6a8.jpg', 11),
(44, 'Test 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-07', 'fce75f71b81397626b039dae085f9171.jpg', 212),
(64, 'Стих про маньяка', 'Я знаю точно наперед. \r\nСегодня кто-нибудь умрет.\r\nЯ знаю где, я знаю как.\r\nЯ не гадалка, я - маньяк!', '2020-04-12', '0220093c3e4427c740a69c92032bf0c7.jpg', 30),
(65, 'Стих про гадалку', 'Я знаю точно наперед\r\nСегодня кто-нибудь умрет.\r\nЯ знаю где, я знаю как,\r\nГадалка я, а не маньяк!', '2020-04-12', '793217f332ba101cfea8d0a216992102.jpg', 45);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id_comments` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `comment_time` int(11) NOT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id_comments`, `id_article`, `user`, `comment_time`, `comment_text`) VALUES
(1, 64, 'admin', 1586684339, 'Сделаю-ка я комментарий'),
(2, 64, 'admin', 1586684370, 'Еще один мой комментарий'),
(6, 65, 'admin', 1586698927, '123'),
(7, 65, 'admin', 1586699069, '123'),
(8, 65, 'admin', 1586699073, '12334'),
(9, 44, 'admin', 1586699081, '333'),
(10, 44, 'admin', 1586699085, '4343456345346'),
(11, 44, 'Romeo_06', 1586699102, 'Проверочный комментарий'),
(12, 44, 'admin', 1586700806, 'ООООООООООООООЧччччччччччччееееееееееееееннннннннннннннььььььььььььь дддддддддллллллллллииииииииииннннннннныыыыыыыыййййй кккккккооооооооооммммммммммеееееееенннннтттттт'),
(13, 64, 'Admin', 1586701161, 'Оставлю-ка я еще один такой маааленький комментарий');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `login`, `password`, `status`) VALUES
(33, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(35, '123', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `articles_id` (`id_article`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
