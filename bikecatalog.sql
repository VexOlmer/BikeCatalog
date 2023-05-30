-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 30 2023 г., 16:07
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bikecatalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bikeinfo`
--

CREATE TABLE `bikeinfo` (
  `BIKE_ID` int(11) NOT NULL COMMENT 'ID велосипеда',
  `category` varchar(255) NOT NULL COMMENT 'Категория велосипеда',
  `name` varchar(255) NOT NULL COMMENT 'Название велосипеда',
  `tags` varchar(255) NOT NULL COMMENT 'Список\r\nключевых\r\nслов/фраз',
  `description` text NOT NULL COMMENT 'Описание\r\nвелосипеда',
  `type` varchar(255) NOT NULL COMMENT 'Название типа,\r\nк которому\r\nотноситься\r\nэтот велосипед',
  `destination` varchar(255) NOT NULL COMMENT 'Назначение\r\nвелосипеда в\r\nданном типе',
  `level` varchar(255) NOT NULL COMMENT 'Уровень оборудования',
  `BID` int(11) NOT NULL COMMENT 'Номер бренда\r\nв таблице',
  `season` int(11) NOT NULL COMMENT 'Сезон (год)\r\nвелосипеда',
  `tech` int(11) NOT NULL COMMENT 'Техническая\r\nхарактеристик\r\nа и геометрия\r\nрамы',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Статус.\r\n1 - показывать в поиске\r\n0 - не показывать в поиске'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Основная информация о велосипеде';

--
-- Дамп данных таблицы `bikeinfo`
--

INSERT INTO `bikeinfo` (`BIKE_ID`, `category`, `name`, `tags`, `description`, `type`, `destination`, `level`, `BID`, `season`, `tech`, `status`) VALUES
(1, 'bmx', 'Radio ASTRON FS', '', 'Совершенная парковая машина. стремительный как астероид, фаршированный первоклассными компонентами как рождественский гусь и нарядный как модель на показе мод. Полностью хромомолибденовые рама, вилка, руль и полые трехэлементные шатуны. Максимально заниженная верхняя труба 20.6 дюйма и укороченные перья делают ASTRON FS идеальным для выполнения трюков, а комплектующие его гироротор и невесомые покрышки добавляют в это безумие разнообразие и легкость. Бескомпромиссный и техничный как райдер уровня «эксперт», этот байк создан специально для паркового катания, однако не отрицает универсальность и способен вызвать зависть везде, где только появится.', 'Ригид', 'Фристайл', 'Профессиональный', 6, 2022, 1, 1),
(2, 'прогулочный', 'Outleap HARMONY', '', 'Коммутер для тех, кому не нужны лишние \"заморочки\". Легкая в обладании передача, с одной звездой спереди, универсальные покрышки и жесткая вилка. Все просто и удобно. Отличный помощник в городе и за его пределами.', 'Ригид', 'Город', 'Начальный', 2, 2022, 2, 1),
(3, 'шоссейный', 'Mongoose GUIDE SPORT', '', 'Стирающий границы между скоростью шоссейного велосипеда и универсальностью маунтинбайка дорожный «внедорожник» Guide Sport понравится всем, кто не против гладкого покрытия, но уверен, что настоящие приключения начинаются там, где заканчивается асфальт. Легкая алюминиевая рама и вилка с ультра-широкими просветами в перьях, вмещающими покрышки шириной 47с. Спортивная родословная и геометрия, предусматривающая более комфортную, чем у гоночных байков, привлекательны для любителей катания по горным гравийным дорогам и лесным грунтовкам. И особенно замечательно выглядит набор комплектующих Guide Sport компонентов, подобранный по принципу «эконом-вариант, но без компромиссов с практичностью» и включающий в себя стильную подрамную сумку. Достаточно легкий и быстрый, чтобы стать партнером в межсезонных тренировках и достаточно надежный, запасшийся креплениями для багажника и крыльев, чтобы отправиться с вами в поход.', 'Ригид', 'Грэвел', 'Начальный улучшенный ', 4, 2021, 3, 1),
(4, 'шоссейный', 'Jamis RENEGADE S4', '', 'Если вы ищете надежный и комфортный велосипед для путешествий и длительных поездок, цените комфорт и надежность стальных рам, а также предпочитаете классическую шоссейную посадку, Renegade придется вам по вкусу. Велосипед оснащен всеми необходимыми для длительных поездок атрибутами: креплениями для крыльев, багажников и фляг, а также способен вместить покрышки размерностью до 42С или 650х47С.', 'Ригид', 'Грэвел', 'Начальный улучшенный', 1, 2021, 4, 0),
(5, 'горный', 'Jamis DURANGO A2', '', 'Горный велосипед, построенный на легкой алюминиевой раме и укомплектованный большими колесами не обязан быть непременно гоночным и дорогим. Если более расслабленная, чем спортивная, посадка не делает вас намного медленнее, если вы считаете, что дорогие гоночные компоненты не стоят больших вложений, а лучший приз, ожидающий вас в конце поездки – заряд бодрости и удовольствия, Durango А2 полностью оправдает ваши ожидания и приятно обрадует не только своей надежностью и ценой, но и уверенной управляемостью.', 'Хардтейл', 'Кросскантри', 'Начальный', 1, 2021, 5, 1),
(6, 'горный', 'GT 27.5 AGGRESSOR SPORT', '', 'Прогулка в ближайшем парке или исследование около городских окрестностей, утоление ностальгии по собственному детству или «смотри, как папа может, догоняй!» - GT Aggressor Sport сделан для всех, кто не планирует посвящать себя спорту, но ради заряда бодрости и порции удовольствия никогда не откажется от возможности прокатиться с семьёй или друзьями. Этот байк – дверь, открывающаяся для новичка, пришедшего познать мир катания на маунтинбайке чтобы остаться в нем навсегда. Удобный и послушный, он наделен особой миссией – сделать так, чтобы ваше желание кататься стало регулярным, само катание было комфортным, безопасным и приносило удовольствие. Как все трейловые хардтейлы, GT Aggressor Sport представлен в двух колесных версиях.', 'Хардтейл', 'Кросскантри', 'Начальный', 5, 2021, 6, 1),
(7, 'шоссейный', 'Cannondale TOPSTONE 4', '', 'Создан для любителей бросить вызов петляющим по холмам грунтовым дорогам или тем, кто полирует неровный асфальт и ценит удобство и универсальность «гравийника» больше скорости шоссейного велосипеда. Прокачан геометрией и основными технологиями верхних моделей и готов отправиться на маршрут любой длины и сложности. Даже самый младший TOPSTONE достаточно эффективен, чтобы в межсезонье заменить гоночный байк и принять участие в тренировках. А если вы подбираете себе надежного напарника для ежедневного катания, легкого в подъем и отважного на спусках, того кто не будет капризничать и проситься домой, готового к приключениям, неприхотливого и умеющего экономить – поздравляем, вы его нашли!\n', 'Ригид', 'Грэвел', 'Начальный улучшенный', 3, 2022, 7, 1),
(8, 'беговел', 'Cannondale KIDS TRAIL BALANCE', '', 'Для самых маленьких Cannondale создал невероятно легкий и стильный беговел, который позволит быстро научиться балансировать на 2х колесах. Аналогично дорогим моделям для взрослых, он оснащен вилкой Lefty, которая экономит вес и необычно выглядит.', 'Ригид', 'Город', 'Начальный', 3, 2019, 8, 1),
(9, 'электровелосипед', 'Cannondale HABIT NEO 1', '', 'Горный велосипед с электромотором открывает новые, доселе невиданные возможности. Благодаря мотору Bosch последнего поколения, мощность прикладывается максимально плавно и естественно, позволяя вам взбираться в немыслимые градиенты или быстро преодолевать километры, казавшиеся раньше мучительно долгими. Habit Neo доказывает, что маунтинбайк с электромотором управляется не хуже обычного, но главное – позволит оказаться у начала интересного спуска вдвое быстрее. Флагман линейки щеголяет батареей 625Wh, вилкой Rock Shox Pike и мощнейшими тормозами Magura.', 'Двухподвес', 'Эндуро', 'Начальный улучшенный', 3, 2020, 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `BRANDS_ID` int(11) NOT NULL COMMENT 'ID бренда',
  `name_company` varchar(255) NOT NULL COMMENT 'Название компании',
  `description_company` text NOT NULL COMMENT 'Описание компании'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Бренды велосипедов';

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`BRANDS_ID`, `name_company`, `description_company`) VALUES
(1, 'Jamis', 'ВСЕ, ЧТО НАМ ДОРОГО, ЕСТЬ В ВЕЛОСИПЕДАХ JAMIS\r\n\r\nKомпания Jamis никогда не метила в «гиганты» велоиндустрии. Главной задачей было делать отличные велосипеды. И последние 30 лет специалисты Jamis уделили тому, что получается у них лучше всего, проектировать и производить такие велосипеды, на которых им самим хочется кататься.\r\n\r\nВ Jamis знают, что многие люди хотели того же, что и они, практической пользы для жизни, таких велосипедов, которые способны превратить просто хороший день катания в замечательный день. А счастливых владельцев велосипедов сделать еще более счастливыми. И вот, спустя более чем 30 успешных сезонов катания, Jamis обрел силу, достаточную для того, чтобы имя компании узнавали не только в магазинах, и на трейлах.\r\n\r\nJamis – не только райдеры, которые к тому же являются менеджерами, дизайнерами и инженерами. Они увлечены как дети, которых оставили в магазине игрушек и разрешили делать все, что угодно. Это как раз то, что нужно для успеха, и особенно приятно делиться своей работой с людьми, которые предпочитают провести, так же как они, свободное время на двух колесах.\r\n\r\nОдни производители велосипедов известны своими городскими велосипедами, кто-то знаменит горными или шоссейными. Jamis же преуспели во всех видах, какие только существуют. Велосипедные журналы любят Jamis, который зарабатывал свое славное имя годами, каждым выпущенным велосипедом. И это то, что привело к пьедесталу, Jamis получали награды во всех мыслимых категориях: горный велосипед года, лучший шоссейник, комфорт-байк, горный велосипед по мнению редакции. Неоднократно, как в велосипедной прессе, так и в общественной, в конкурсах и выставках по всему миру.\r\n\r\nВелосипеды Jamis получали приз «Выбор редакции» журнала Bicycling, как лучший шоссейный и лучший горный велосипед семь раз, причем номинаций у байков было в два раза больше. На протяжении шести лет Jamis становились велосипедом года в журнале Mountain Biking. В журнале Outside, который в разделе «Гид покупателя» рекомендует своим читателям пять или шесть велосипедов каждый год, Jamis фигурирует постоянно. И это были не только самые высокотехнологичные и дорогие модели, которые обычно собирают все медали и кубки, и не только мнения профессиональных велосипедистов о продукте. Байки хороши настолько, насколько их признают хорошими и обычные люди. Ведь даже журнал AARP (Американская ассоциация пенсионеров) выделил велосипеды Jaimis комфортных серий в качестве «рекомендуемой покупки».\r\n\r\nВсе это сводится к одному. К твоему миру. Это место, где ты катаешься. Место, где ты живешь, где ты выбираешь, каким быть велосипедистом. Выбрать то, что вдохновляет тебя как райдера. Именно это вдохновляло Jamis на протяжении 30-ти лет. И компании нравится признание людей – это значит, что у неё есть друзья по всему миру, что компания делает людей немного счастливее. И наоборот, любовь людей к Jamis позволяет компании вкладывать свои знания и средства в любимый спорт. Jamis создает программы его развития, инвестирует в крупнейшие места катания, как например Diablo Mountain Bike Park, и, конечно, поддерживает профессиональных спортсменов, среди них: Джейсон Сэгер (Jamis/Geax), Кэт Читли (Colavita/Baci), Луи Амаран (Jamis/Sutter Home), Лесли Паттерсон (XTERRA) и олимпийка Лора Беннэ.\r\n\r\nНет, у Jamis никогда не стояло задачи стать «гигантом» велоиндустрии. Они просто хотели и продолжают стремиться делать максимально хорошие велосипеды, на которых самим сотрудникам компании было бы приятно кататься. А выяснилось, что они вполне могут претендовать на звание лучших в мире велосипедов. И вот они, сделанные специально для вас…'),
(2, 'Outleap', 'Созданная в 2011 году канадским энтузиастом велоспорта компания Outleap продолжает постепенно расширять линейку велосипедов. Смысловое значение слова Outleap - прыгать выше, дальше, за пределы своих возможностей и поставленных рамок. Это девиз сотрудников компании. Outleap – команда единомышленников, увлеченных велосипедами и жаждущих развивать велосипедную индустрию. В 2011 году стартовало официальное серийное производство, а в 2012 поступили в продажу первые модели складных городских велосипедов Outleap One и Two. Следуя упомянутому выше девизу компании, было принято решение о расширении ассортиментной линейки и запуске в производство горных велосипедов. В 2014 году модель фэтбайка Hercules стала бестселлером в данной серии. На сегодняшний день компания Outleap продолжает развиваться, выпуская велосипеды нескольких категорий:\r\n- горные,\r\n- прогулочные,\r\n- складные,\r\n- детские,\r\n- BMX,\r\n- шоссейные,\r\n- электровелосипеды.'),
(3, 'Cannondale', 'Компания была основана в 1971 году Джо Монтгомери, Джимом Катрамбоном и Роном Дэвисом. Изначально компания выпускала велосипедные сумки и сумки для кэмпинга, а позже приступила к производству прицепа для туристических велосипедов. Одним из наиболее популярных продуктов стал Bugger — детский прицеп, который также экспортировался в Великобританию. Сегодня, Cannondale выпускает различные типы велосипедов высокого класса. Компания специализируется на производстве рам из алюминиевых сплавов, а также из углепластика (карбон), в технологиях изготовления которых они являются пионерами. Компания получила своё название от железнодорожной станции Cannondale Metro Nord в Вилтоне, Коннектикут.\r\n\r\nCannondale является многочисленным победителем в различных конкурсах в категориях: дизайн, новаторство, технологии и лучший велосипед года.\r\n\r\nНа горных велосипедах Cannondale было выиграно 11 Чемпионатов Мира, 17 Кубков Мира, 16 Национальных Чемпионатов и две Золотые Олимпийские Медали. В шоссейном велоспорте гонщики Cannondale выиграли более 10 этапов Тур де Франс, более 30 этапов на Джиро д’Италия, одержали 5 побед на Джиро д’Италия в общем зачёте, в числе побед также Чемпионат Мира среди Профессионалов.'),
(4, 'Mongoose', 'Добро пожаловать в страну Mongoose, где мы живём, чтобы кататься. Где наши велосипеды царапаются и бьются за наши собственные деньги, где мы катаемся на них жестко – шрамов у нас не меньше чем у них.\r\nЭто были более 35 лет катания, от спокойного городского до гонок мирового уровня. Более 35 лет пульсирования адреналина, острых ощущений на двух колесах Mongoose, и нам всегда нравился этот путь. За эти годы мы получали много прозвищ. Нас, как и наш логотип, называли песчаным, нахальным, и \"синим воротничком\" и что? Всё равно это - мы. Как же мы пришли к этому?\r\n\r\n1974-1976 В начале...\r\nОднажды Skip Hess (Скип Хесс), бывший администратор, превратился увлеченного инженера, проектирующего скутеры. Как-то раз он увидел группу детей, живших по соседству, выполняющих эффектные трюки на велосипедах и обратил внимание на слишком слабые для таких трюков колеса. В свободное от основной работы время он создает свой макет колес и пробивает производство собственно проекта в компании, где работает. Так родилось легендарное колесо Motomag, которое быстро распространилось от гаража Скипа, находящегося на задворках Южной Калифорнии, по всем Штатам.\r\n\r\n1976-1980 Монстра называют Mongoose\r\nСкип и его приятели находятся «на волне» с этими бронебойными колесами. Но он скоро понимает, что его колеса оказываются слишком хороши для рам BMX, производящихся в то время. Старая песня: «Хочешь, чтобы было хорошо – делай сам»… И вскоре Скип и его команда производят рамы тысячами. Название его компании «BMX Products, Inc.» не выглядит уютно на нижней трубе рамы, может «Mongoose»? Процесс смены названия был недолгим…\r\n\r\n1980-1987 Время славы BMX\r\nРамы Mongoose и команда BMX не только делают себе имя, но и правят миром. Просто посмотрите классический фильм 1987 года «Rad».\r\n\r\n1987-2000 Царь Горы\r\nПовальное увлечение горным велосипедом. Компания Mongoose тут же становится производителем одних из самых инновационных велосипедов в мире. В 1992 году появился легендарный байк, модель-двухподвес Amplifier, и список райдеров пополнился. В «цирк» Mongoose были приглашены Джон Томак, Ли Донован, Эрик Картер и Брайан Лопес.\r\n\r\n2000-2004 Тихоокеанский Круиз\r\nВ 2000 году Mongoose присоединяется к холдингу Pacific Cycle, что позволяет ему существенно увеличить производственную линию и войти в массовый рынок. Несомненно, некоторые злопыхатели до сих пор критикуют этот поступок, но у десятков тысяч велосипедистов появилась возможность быть приглашенными на вечеринку Mongoose.\r\n\r\n2004-сегодня и завтра. Вечеринка продолжается\r\nСегодня компания Mongoose все еще остается синонимом BMX, а в MTB их предложения являются одними из лучших в каждом классе, на каждом уровне!!!'),
(5, 'GT', 'Мастерство!\r\n\r\nС ним не рождаются.\r\nЕго оттачивают.\r\nНастоящие райдеры всегда раздвигают границы возможного на двух колесах.\r\nТо же требуется и от их велосипедов.\r\nGT занимается расширением границ с 1972 года, когда Гэри Тернер впервые применил технологии автомобилестроения для производства более легкого, крепкого и быстрого велосипеда BMX. А какой у него был дизайн? Такой, что всколыхнул всю Южную Калифорнию. И, спустя почти 40 лет, все та же концепция: никогда не осторожничать, не идти на компромиссы и творить историю велосипеда – заложена в каждый дизайн GT, будь то BMX, горный или шоссейный велосипед. Все велосипеды GT сделаны лишь для одного: позволять райдерам достигать такого уровня, о котором они и не мечтали. GT делает настолько надежные и крепкие велосипеды, что с ними райдер забывает, что такое опасность, страх и сомнение и может полностью отдаться стихии катания. Это именно то, что GT подразумевает под словом «кататься» и это именно то, что значит Расправить свои крылья.\r\n\r\nДостичь! Улучшить! Повторить!\r\nРайдеры GT постоянно достигают отличных результатов в велоспорте для того, чтобы потом достичь еще больших, будь это «отец фрирайда» Ханс Рэй, молниеносные победители Кубков мира или олимпийские BMX медалисты. Превосходство и стремление двигать вперед себя и свой спорт заложены у них в ДНК. А задача GT – создать велосипеды, на которые они смогут положиться в своем стремлении. В этом деле достигнуто полное взаимопонимание: пока парни будут превосходить невозможное, GT будет делать для них байки, которые невозможно превзойти.'),
(6, 'Radio', 'Radio Bikes\r\nRadio Bikes были представлены в 2011 году и довольно быстро приобрели звание первоклассного BMX-бренда. Здесь, конечно же, не обошлось без более чем 15-летнего опыта компании Wethepeople. Идея проста: сделать надежный, качественный байк, подходящий как для новичков, так и для более опытных райдеров.\r\nИмея за плечами такую историю создания велосипедов, не удивительно, что у комплитов Radio современная проверенная геометрия и максимально качественные компоненты.'),
(23, 'Eastern', 'Eastern – один из самых уважаемых брендов в BMX индустрии. Основатели компании имеют огромный стаж катания, они, как никто другой, знают, что нужно райдерам. В этом году комплиты Eastern выглядят вполне традиционно, но присмотритесь к ним, и вы увидите, как они эволюционировали за последние годы.'),
(25, 'Corratec', 'Konrad Irlbacher, основатель и владелец Corratec:\r\n«C момента основания компании Corratec мы всегда оставались верными нашим корням. Это было больше чем 20 лет назад, когда я вводил на рынок первые велосипеды Corratec и малочисленную спортивную команду. Одним из моих намерений состояло в том, чтобы всегда отличаться от других - однако, не просто всего лишь по-другому выглядеть. Как ранее, так и сегодня, отличаться – значит быть лучше, быть более инновационным, доступным, но не легким для копирования, развиваться и устанавливать тенденции. Если вы оглянетесь назад и посмотрите на то, что Сorratec предложил за прошедшие 20 лет, то вы найдете много продукции, которые составляли коллекцию Сorratec в течение многих лет и которые предлагаются сегодня другими изготовителями, как большая новинка. Поэтому новая коллекция снова будет удивлять, стимулировать и вдохновлять многих. Это и есть Сorratec».\r\n\r\nСorratec всегда оставался и остается преданным Германии. Разработки и внедрение новых моделей и технологий, а также производство и сборка и большей части продукции находится под крышей завода в Раублинге, у подножья Баварских Альп. Это гарантирует качество, внимание к деталям, поэтому, Сorratec с гордостью размещает на каждой модели велосипеда ярлык «German Design & Engineering».');

-- --------------------------------------------------------

--
-- Структура таблицы `tech_spec`
--

CREATE TABLE `tech_spec` (
  `id_tech` int(11) NOT NULL COMMENT 'ID технической спецификации',
  `frame_material` varchar(255) NOT NULL COMMENT 'Материал рамы',
  `frame` varchar(255) NOT NULL COMMENT 'Рама',
  `wheel_mount` varchar(255) NOT NULL COMMENT 'Крепление колеса',
  `fork_design` varchar(255) NOT NULL COMMENT 'Конструкция вилки',
  `fork` varchar(255) NOT NULL COMMENT 'Вилка',
  `front_hub` varchar(255) NOT NULL COMMENT 'Передняя втулка',
  `rear_hub` varchar(255) NOT NULL COMMENT 'Задняя втулка',
  `rims` varchar(255) NOT NULL COMMENT 'Обода',
  `steering_wheel` varchar(255) NOT NULL COMMENT 'Руль',
  `number_speeds` int(11) NOT NULL COMMENT 'Кол-во скоростей',
  `rear_derailleur` varchar(255) NOT NULL COMMENT 'Задний переключатель',
  `front_derailleur` varchar(255) NOT NULL COMMENT 'Передний переключатель',
  `cassette` varchar(255) NOT NULL COMMENT 'Кассета',
  `carriage` varchar(255) NOT NULL COMMENT 'Каретка',
  `system` varchar(255) NOT NULL COMMENT 'Система',
  `shifters` varchar(255) NOT NULL COMMENT 'Манетки',
  `tires` varchar(255) NOT NULL COMMENT 'Покрышки',
  `brake_type` varchar(255) NOT NULL COMMENT 'Тип тормозов',
  `front_brake` varchar(255) NOT NULL COMMENT 'Передний тормоз',
  `rear_brake` varchar(255) NOT NULL COMMENT 'Задний тормоз',
  `pedals` varchar(255) NOT NULL COMMENT 'Педали',
  `seatpost` varchar(255) NOT NULL COMMENT 'Подседельный штырь',
  `saddle` varchar(255) NOT NULL COMMENT 'Седло',
  `wheel_size` int(11) NOT NULL COMMENT 'Размер колеса в дм',
  `BIKE_ID` int(11) NOT NULL COMMENT 'ID велосипеда у которого данная характеристика'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Техническая спецификация к велосипеду';

--
-- Дамп данных таблицы `tech_spec`
--

INSERT INTO `tech_spec` (`id_tech`, `frame_material`, `frame`, `wheel_mount`, `fork_design`, `fork`, `front_hub`, `rear_hub`, `rims`, `steering_wheel`, `number_speeds`, `rear_derailleur`, `front_derailleur`, `cassette`, `carriage`, `system`, `shifters`, `tires`, `brake_type`, `front_brake`, `rear_brake`, `pedals`, `seatpost`, `saddle`, `wheel_size`, `BIKE_ID`) VALUES
(1, 'Сплав Cro-Mo', 'Полностью 4130 хроммолибденовая конструкция, съемные крепления тормоза', 'Эксцентрик', '-', '-', 'RADIO', 'RADIO', 'SALTPLUS', 'RADIO', 1, '-', '-', '-', 'RADIO“MID', 'RADIO', '-', 'SALTPLUS BURN 2.3', '-', '-', '-', 'SALT', '-', 'RADIO', 20, 1),
(2, 'Сталь', 'Стальная сварная конструкция, внутренняя проводка тросов, 135QR ', 'Эксцентрик', 'Жесткая', 'Outleap, сталь ', 'Outleap, стальной корпус, насыпной подшипник ', 'Outleap, стальной корпус, насыпной подшипник, под трещотку ', 'Outleap DS, алюминий, одинарный ', 'Outleap, сталь, ширина 680мм, подъем 30мм ', 6, 'MicroSHIFT M21S ', '-', 'Shimano MF-TZ500 14-28Т, 6скр, трещотка ', 'Kenli KL-08A, картриджный подшипник, ось - \"квадрат\" ', 'Pro Wheel, алюминий, звезда 38Т ', '-', 'Innova City semi-slick 27.5x1.9\" ', 'дисковые механические ', 'Yinxing YX-DB01, механический, диск 160мм ', 'Yinxing YX-DB01, механический, диск 160мм ', 'Outleap PP, пластиковый корпус ', 'Outleap, алюминий, длина 350мм ', ' Outleap Sport ', 27, 2),
(3, 'Алюминий', 'Алюминий Tectonic T2, конусная рулевая, внутренняя проводка рубашек, дропауты под QR ', 'Эксцентрик', 'Жесткая', 'Mongoose, 700c, алюминий, 9x100 мм QR ', 'Xposure, алюминиевый корпус, насыпной подшипник, QR, 32H ', 'Xposure, алюминиевый корпус, насыпной подшипник, QRх135 мм, 32H ', 'WTB ST-19, алюминиевый, двойной, 19 мм ID (внутр. ширина), 32H, можно использовать бескамерно ', 'Xposure, алюминий, 450 мм - 510 мм ширина, 124 мм подъем, под зажим 31.8 мм ', 18, 'Shimano Sora R3000 ', 'Shimano Sora FD-R3000, зажим ', 'Sunrace, 9-скр, 11-34T ', 'Samox, внешние чашки ', 'Samox TAM31-232, алюминий, 46/30T ', 'Shimano Sora ST-R3000, 2х9-скр ', 'Kenda Small Block, 700х47c, стальной корд ', 'дисковые механические ', 'Promax DSK-330 FM, механические, дисковые, 160 мм диск ', 'Promax DSK-330 FM, механические, дисковые, 160 мм диск ', 'Нет', 'Xposure, алюминий, 350 мм, zero offset, 31.6 мм ', 'Mongoose adventure, стальные рамки ', 28, 3),
(4, 'Хромолевая', ' Хромолевая рама специального дизайна Reynolds 520 с двойным баттингом, конусный шток, проушины для установки грязезащитных крыльев. Клиренс - 700x45c и 650x2.0 tires. ', 'Эксцентрик', 'Жесткая', 'Jamis Adventure ECO монокок из углеродного композита (карбон), ось Jamis MTS - 12 мм (модульная сквозная система), конический шток,проушины для крепления грязезащитных крыльев. ', '-', '-', 'Donnelly X Plor MSO, 650 x 36c (44-48) 700 x 36c (51-61), 30TPI with protection belt ', 'Ritchey CurveMax Comp, 6061 aluminum, 73 reach, 118 ergonomic drop with 12° flare, 31.8 x 400 (44) 420 (48-51)440 mm (54-56), 460 mm (56-61) ', 18, 'Shimano Sora-RD-R3000GS ', 'Shimano FD-3000 ', 'Shimano HG400 9-speed, 11-34T ', 'FSA BB-4000 MegaExo ', 'FSA Vero, 50/34T, 165 mm (44/48), 170 mm (51) 172.5 mm (54/56) 175 mm (58/61) ', 'Shimano Sora ST-R3000 Dual Control STI- 18 скоростей ', 'Donnelly X Plor MSO, 650 x 36c (44-48) 700 x 36c (51-61), 30TPI with protection belt ', 'Дисковые-механические', 'Tektro Lyra, мех. 160 mm rotor ', 'Tektro Lyra, мех. 160 mm rotor ', 'Нет', 'Ritchey Road, 27.2 x 300 mm with cromo seat pin ', 'Jamis Sport with SL top ', 28, 4),
(5, 'Алюминий', 'Алюминий 6061. Рулевая труба zero-stack. Крепление дискового тормоза. Сменный держатель заднего переключателя. ', 'Эксцентрик ', 'Пружинная', 'SR Suntour XCE 28 29\", спиральная пружина, наружная регулировка, aluminum lowers, ход - 100 мм. ', 'алюминиевые втулки, конусный подшипник, крепление дискового тормоза 6 болтов. ', 'алюминиевые втулки, конусный подшипник, крепление дискового тормоза 6 болтов. ', 'Alex TD26 29\", 32H ', 'Jamis XC алюминиевый батированый, 31.8 x 20 x 740 мм. ', 16, 'Shimano Tourney 8Скр. ', '-', 'Shimano HG31, 8-speed, 11-32T ', 'Sealed картридж ', 'Forged Alloy, 36/22T ', 'Shimano EF505, 2x8-Скр. ', 'CST Patrol, 29 x 2.25\" ', 'дисковые гидравлические ', 'Shimano MT200 ', 'Shimano MT200 ', 'Нет', 'Jamis алюминиевый, 31.6 x 400 мм. ', 'Jamis ATB Sport ', 29, 5),
(6, 'Алюминий', 'Алюминий 6061. Рулевая труба zero-stack. Крепление дискового тормоза. Сменный держатель заднего переключателя. ', 'Эксцентрик ', 'Пружинная', 'SR Suntour XCE 28 29\", спиральная пружина, наружная регулировка, aluminum lowers, ход - 100 мм. ', 'алюминиевые втулки, конусный подшипник, крепление дискового тормоза 6 болтов. ', 'алюминиевые втулки, конусный подшипник, крепление дискового тормоза 6 болтов. ', 'Alex TD26 29\", 32H ', 'Jamis XC алюминиевый батированый, 31.8 x 20 x 740 мм. ', 16, 'Shimano Tourney 8Скр. ', '-', 'Shimano HG31, 8-speed, 11-32T ', 'Sealed картридж ', 'Forged Alloy, 36/22T ', 'Shimano EF505, 2x8-Скр. ', 'CST Patrol, 29 x 2.25\" ', 'дисковые гидравлические ', 'Shimano MT200 ', 'Shimano MT200 ', 'Нет', 'Jamis алюминиевый, 31.6 x 400 мм. ', 'Jamis ATB Sport ', 29, 6),
(7, 'Хромолевая', ' Хромолевая рама специального дизайна Reynolds 520 с двойным баттингом, конусный шток, проушины для установки грязезащитных крыльев. Клиренс - 700x45c и 650x2.0 tires. ', 'Эксцентрик', 'Жесткая', 'Jamis Adventure ECO монокок из углеродного композита (карбон), ось Jamis MTS - 12 мм (модульная сквозная система), конический шток,проушины для крепления грязезащитных крыльев. ', '-', '-', 'Donnelly X Plor MSO, 650 x 36c (44-48) 700 x 36c (51-61), 30TPI with protection belt ', 'Ritchey CurveMax Comp, 6061 aluminum, 73 reach, 118 ergonomic drop with 12° flare, 31.8 x 400 (44) 420 (48-51)440 mm (54-56), 460 mm (56-61) ', 18, 'Shimano Sora-RD-R3000GS ', 'Shimano FD-3000 ', 'Shimano HG400 9-speed, 11-34T ', 'FSA BB-4000 MegaExo ', 'FSA Vero, 50/34T, 165 mm (44/48), 170 mm (51) 172.5 mm (54/56) 175 mm (58/61) ', 'Shimano Sora ST-R3000 Dual Control STI- 18 скоростей ', 'Donnelly X Plor MSO, 650 x 36c (44-48) 700 x 36c (51-61), 30TPI with protection belt ', 'Дисковые-механические', 'Tektro Lyra, мех. 160 mm rotor ', 'Tektro Lyra, мех. 160 mm rotor ', 'Нет', 'Ritchey Road, 27.2 x 300 mm with cromo seat pin ', 'Jamis Sport with SL top ', 28, 7),
(8, 'Сталь', 'Стальная сварная конструкция, внутренняя проводка тросов, 135QR ', 'Эксцентрик', 'Жесткая', 'Outleap, сталь ', 'Outleap, стальной корпус, насыпной подшипник ', 'Outleap, стальной корпус, насыпной подшипник, под трещотку ', 'Outleap DS, алюминий, одинарный ', 'Outleap, сталь, ширина 680мм, подъем 30мм ', 6, 'MicroSHIFT M21S ', '-', 'Shimano MF-TZ500 14-28Т, 6скр, трещотка ', 'Kenli KL-08A, картриджный подшипник, ось - \"квадрат\" ', 'Pro Wheel, алюминий, звезда 38Т ', '-', 'Innova City semi-slick 27.5x1.9\" ', 'дисковые механические ', 'Yinxing YX-DB01, механический, диск 160мм ', 'Yinxing YX-DB01, механический, диск 160мм ', 'Outleap PP, пластиковый корпус ', 'Outleap, алюминий, длина 350мм ', ' Outleap Sport ', 27, 8),
(9, 'Алюминий', 'Алюминий Tectonic T2, конусная рулевая, внутренняя проводка рубашек, дропауты под QR ', 'Эксцентрик', 'Жесткая', 'Mongoose, 700c, алюминий, 9x100 мм QR ', 'Xposure, алюминиевый корпус, насыпной подшипник, QR, 32H ', 'Xposure, алюминиевый корпус, насыпной подшипник, QRх135 мм, 32H ', 'WTB ST-19, алюминиевый, двойной, 19 мм ID (внутр. ширина), 32H, можно использовать бескамерно ', 'Xposure, алюминий, 450 мм - 510 мм ширина, 124 мм подъем, под зажим 31.8 мм ', 18, 'Shimano Sora R3000 ', 'Shimano Sora FD-R3000, зажим ', 'Sunrace, 9-скр, 11-34T ', 'Samox, внешние чашки ', 'Samox TAM31-232, алюминий, 46/30T ', 'Shimano Sora ST-R3000, 2х9-скр ', 'Kenda Small Block, 700х47c, стальной корд ', 'дисковые механические ', 'Promax DSK-330 FM, механические, дисковые, 160 мм диск ', 'Promax DSK-330 FM, механические, дисковые, 160 мм диск ', 'Нет', 'Xposure, алюминий, 350 мм, zero offset, 31.6 мм ', 'Mongoose adventure, стальные рамки ', 28, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL COMMENT 'ID пользователя',
  `admin` int(11) NOT NULL COMMENT '1 - пользователь админ\r\n0 - обычный пользователь',
  `username` varchar(255) NOT NULL COMMENT 'Никнейм',
  `email` varchar(255) NOT NULL COMMENT 'Почта',
  `password` text NOT NULL COMMENT 'Пароль'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Пользователи сайта';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`USER_ID`, `admin`, `username`, `email`, `password`) VALUES
(2, 1, 'root', 'root@gmail.com', '$2y$10$A3psTlIZHWkBa97g.PaC.O2fWMcHYLO9mbf2NcHqI2go/dxto5Wce'),
(5, 0, 'eolmer', 'dan@gmail.com', '$2y$10$kdmN27rvdyKw52aMHDfUaeWAE8NgWL18e3/tjLLv2P5c1OfwAsT5C'),
(7, 1, 'Петр Петров', 'petr@gmail.com', '$2y$10$e2M6pQdz1DychN0WZyDmHes62jfultTPVpLDL6CLdzX315rHBo.sK');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bikeinfo`
--
ALTER TABLE `bikeinfo`
  ADD PRIMARY KEY (`BIKE_ID`),
  ADD UNIQUE KEY `tech_bike_index` (`tech`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BRANDS_ID`);

--
-- Индексы таблицы `tech_spec`
--
ALTER TABLE `tech_spec`
  ADD PRIMARY KEY (`id_tech`),
  ADD UNIQUE KEY `BIKE_id_tech_index` (`BIKE_ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `email_user_index` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bikeinfo`
--
ALTER TABLE `bikeinfo`
  MODIFY `BIKE_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID велосипеда', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `BRANDS_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID бренда', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `tech_spec`
--
ALTER TABLE `tech_spec`
  MODIFY `id_tech` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID технической спецификации', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя', AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;