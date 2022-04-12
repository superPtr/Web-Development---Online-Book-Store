-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 10:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curiousbooktown`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(8) NOT NULL,
  `history_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `serial_number`, `history_id`) VALUES
(9, 'AE8609', 1),
(10, 'BK8593', 1),
(11, 'DW3548', 1),
(12, 'EE7874', 1),
(13, 'EQ6654', 1),
(14, 'HV8745', 1),
(15, 'BZ6484', 2),
(16, 'CC7029', 2),
(17, 'IA4847', 2),
(18, 'IG4364', 3),
(19, 'CF0864', 3),
(20, 'DP7344', 3),
(21, 'BY3478', 3),
(22, 'IW7331', 4),
(23, 'IT1954', 4),
(24, 'AN3261', 4),
(25, 'DX2017', 4),
(26, 'EO4168', 5),
(27, 'HI6755', 5),
(28, 'BJ2321', 5),
(29, 'BT6548', 5),
(30, 'EZ4462', 6),
(31, 'FQ1032', 6),
(32, 'IV8012', 6),
(33, 'LZ3918', 6),
(34, 'CC8475', 6),
(35, 'BG8261', 7),
(36, 'KQ6440', 7),
(37, 'FB5413', 7),
(38, 'FS4312', 7),
(39, 'CM3438', 8),
(40, 'FN4207', 8),
(41, 'FX8653', 8),
(42, 'EX3823', 8),
(43, 'CE9376', 9),
(44, 'FB4156', 9),
(45, 'OB1105', 9),
(46, 'BV0853', 9),
(47, 'JK6335', 9),
(48, 'CI4592', 10),
(49, 'AI5228', 10),
(50, 'CQ5170', 10),
(51, 'IZ8933', 10),
(52, 'DP4317', 11),
(53, 'BU5546', 12);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publication_date` date NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `name`, `image`, `genre_id`, `author`, `publisher`, `publication_date`, `price`, `description`, `register_date`) VALUES
(1, 'House of Leaves', 'Product1.jpg', 1, 'Mark Z. Danielewski', 'Pantheon, Random House', '2000-07-03', '104.27', 'Truant is searching for a new apartment when his friend Lude tells him about the apartment…', '2022-02-26 21:05:53'),
(2, 'The Shining', 'Product2.jpg', 1, 'Shirley Jackson', 'Doubleday', '1977-01-28', '58.10', 'Jack Torrance, accepts a position as the off-season caretaker of the historic Overlook Hotel…', '2022-02-26 15:58:45'),
(3, 'A Head Full of Ghosts', 'Product3.jpg', 1, 'Paul G. Tremblay', 'HarperCollins', '2015-02-06', '63.40', 'Merry share details of horrific incidents when she was eight years old…', '2022-02-17 21:19:58'),
(4, 'Mexican Gothic', 'Product4.jpg', 1, 'Silvia Moreno-Garcia', 'Del Rey', '2020-06-30', '48.90', 'Noemi Taboada receives letter from her cousin Catalina who begging for help…', '2022-02-24 00:27:49'),
(5, 'The Only Good Indians', 'Product5.jpg', 1, 'Stephen Graham Jones', 'Saga Press', '2020-07-14', '88.50', 'The Only Good Indians follows four American Indian men after a disturbing event from their youth puts them in a desperate struggle for their lives…', '2022-02-18 17:27:43'),
(6, 'Ghost Story', 'Product6.jpg', 1, 'Peter Straub', 'Coward, McCann and Geoghegan', '1979-01-01', '74.60', 'One year earlier Jaffrey had thrown a party at his house in honor of a visiting actress, and their fifth member, Edward Wanderley, had died in an upstairs bedroom during the festivities...', '2022-02-27 10:58:42'),
(7, 'Dracula', 'Product7.jpg', 1, 'Bram Stoker', 'Archibald Constable and Company', '1997-05-26', '69.90', 'Dracula was positively received by reviewers who pointed to its effective use of horror. In contrast, reviewers who wrote negatively of the novel regarded it as excessively frightening…', '2022-02-22 04:01:51'),
(8, 'Bird Box', 'Product8.jpg', 1, 'Josh Malerman', 'Harper Voyager, Ecco', '2014-03-27', '93.70', 'Upon discovering her pregnancy, Malorie is unable to contact her one-night stand.', '2022-02-15 10:03:18'),
(9, 'The Hunger', 'Product9.jpg', 1, 'Alma Katsu', 'Penguin Publishing Group', '2018-06-03', '68.40', 'Tamsen Donner must be a witch. That is the only way to explain the series of misfortunes that have plagued the wagon train known as the Donner Party…', '2022-02-16 11:56:22'),
(10, 'People We Meet on Vacation', 'Product10.jpg', 2, 'Emily Henry', 'Berkley Books', '2021-11-05', '81.10', 'Poppy and Alex. Alex and Poppy. They have nothing in common. She’s a wild child; he wears khakis….', '2022-02-22 19:52:59'),
(11, 'Red, White & Royal Blue', 'Product11.jpg', 2, 'Casey McQuiston', 'St Martin\'s Griffin', '2019-05-14', '56.80', 'First Son Alex Claremont-Diaz is the closest thing to a prince this side of the Atlantic…', '2022-02-17 20:05:17'),
(12, 'The Spanish Love Deception', 'Product12.jpg', 2, 'Elena Armas', 'Simon  Schuster', '2021-02-02', '77.30', 'Catalina Martín, finally, not single. Her family is happy to announce that she will bring her American boyfriend to her sister’s wedding…', '2022-02-17 23:35:21'),
(13, 'The Hating Game:  A Novel', 'Product13.jpg', 2, 'Sally Thorne', 'HarperCollins', '2016-09-08', '93.10', 'Debut author Sally Thorne bursts on the scene with a hilarious and sexy workplace comedy all about that thin, fine line between hate and love…', '2022-02-15 19:31:36'),
(14, 'Seven Days in June', 'Product14.jpg', 2, 'Tia Williams', 'Grand Central Publishing', '2021-01-07', '66.45', 'Brooklynite Eva Mercy is a single mom and bestselling erotica writer, who is feeling pressed from all sides…', '2022-02-19 00:02:34'),
(15, 'One Last Stop', 'Product15.jpg', 2, 'Casey McQuiston', 'St. Martin\'s Publishing Group', '2021-01-06', '71.80', 'For cynical twenty-three-year-old August, moving to New York City is supposed to prove her right…', '2022-02-23 02:20:11'),
(16, 'The Love Hypothesis', 'Product16.jpg', 2, 'Ali Hazelwood', 'Berkley Books', '2021-09-14', '64.20', 'As a third-year Ph.D. candidate, Olive Smith doesn\'t believe in lasting romantic relationships--but her best friend does…', '2022-02-25 16:26:47'),
(17, 'Call Me by Your Name', 'Product17.jpg', 2, 'Andre Aciman', 'Farrar, Straus and Giroux', '2007-01-23', '77.70', 'Call Me by Your Name is the story of a sudden and powerful romance that blossoms between an adolescent boy and a summer guest…', '2022-02-20 13:15:02'),
(18, 'The Ex Talk', 'Product18.jpg', 2, 'Rachel Lynn Solomon', 'Berkley Books', '2021-01-26', '88.80', 'Shay Goldstein has been a producer at her Seattle public radio station for nearly a decade, and she can\'t imagine working anywhere else…', '2022-02-23 20:21:42'),
(19, 'And Then There Were None', 'Product19.jpg', 3, 'Agatha Christie', 'William Morrow; Reissue edition', '2011-03-29', '32.99', 'Ten people, each with something to hide and something to fear, are invited to…', '2022-02-22 17:28:24'),
(20, 'The Sittaford Mystery ', 'Product20.jpg', 3, 'Agatha Christie', 'Berkley', '1987-03-15', '65.30', 'When a blizzard strikes the village of Sittaford, the guests at…', '2022-02-15 04:37:20'),
(21, 'Ordeal by Innocence', 'Product21.jpg', 3, 'Agatha Christie', 'Minotaur Books', '2002-05-19', '32.45', 'The victim was Jacko\'s own mother, and to make matters worse, he died in …', '2022-02-24 04:05:50'),
(22, 'Death Comes As the End ', 'Product22.jpg', 3, 'Agatha Christie', 'Mass Market Paperback', '1992-05-01', '55.99', 'Newly widowed Renisenb comes to her father\'s house, and atfirst it seems…', '2022-02-21 21:40:09'),
(23, 'The Adventure of Sherlock Holmes', 'Product23.jpg', 3, 'Arthur Conan Doyle', 'create space independent publishing platform', '2020-12-07', '72.45', 'The adventure of sherlock holmes is a collection of twelve stories….', '2022-02-27 00:56:15'),
(24, 'Game On: Tempting Twenty-Eight', 'Product24.jpg', 3, 'Janet Evanovich', 'Atria Books', '2021-11-02', '60.90', 'When Stephanie Plum is woken up in the middle of the night by the sound of…', '2022-02-16 21:04:52'),
(25, 'The Maid', 'Product25.jpg', 3, 'Nita Prose', 'Ballanrine Books', '2022-01-04', '82.39', 'Molly Gray is not like everyone else. She struggles with …', '2022-02-26 20:06:45'),
(26, 'Abandoned in Death', 'Product26.jpg', 3, 'J. D. Robb', 'St. Martin\'s Press', '2022-02-08', '72.59', 'The woman’s body was found in the early morning, on a bench in a …', '2022-02-25 17:04:48'),
(27, 'The Quarter Storm', 'Product27.jpg', 3, 'Veronica G. Henry', '47North', '2022-03-01', '31.45', 'Haitian-American Vodou priestess Mambo Reina Dumond runs a …', '2022-02-17 07:00:33'),
(28, 'The Water Dancer ', 'Product28.jpg', 4, 'Ta-Nehisi Coates', 'One World; First Edition ', '2019-11-24', '49.99', 'Young Hiram Walker was born into bondage. When his mother was …', '2022-02-24 18:08:00'),
(29, 'House of Earth and Blood', 'Product29.jpg', 4, 'Sarah J. Maas', 'Bloomsbury Publishing; 1st edition', '2020-03-03', '91.20', 'Half-Fae, half-human Bryce Quinlan loves her life. Every night is …', '2022-02-17 02:33:45'),
(30, 'House of Sky and Breath', 'Product30.jpg', 4, 'Sarah J. Maas', 'Bloomsbury Publishing; 1st edition', '2022-02-15', '82.30', 'Bryce Quinlan and Hunt Athalar are trying to get back to normal…', '2022-02-25 23:21:44'),
(31, 'It Ends with Us', 'Product31.jpg', 4, 'Colleen Hoover', 'Atria ', '2016-08-02', '72.65', 'Lily hasn’t always had it easy, but that’s never stopped her from …', '2022-02-18 19:11:10'),
(32, 'Ugly Love', 'Product32.jpg', 4, 'Colleen Hoover', 'Atria ', '2014-08-05', '99.90', 'When Tate Collins meets airline pilot Miles Archer, she doesn\'t think …', '2022-02-17 20:44:55'),
(33, 'The Midnight Library', 'Product33.jpg', 4, 'Matt Haig', 'Viking; 1st Edition', '2020-09-29', '40.50', 'Somewhere out beyond the edge of the universe there is a library …', '2022-02-21 00:02:01'),
(34, 'The Love Hypothesis ', 'Product34.jpg', 4, 'Ali Hazelwood', 'Penguin Publishing Group', '2021-09-14', '31.99', 'As a third-year Ph.D. candidate, Olive Smith doesn\'t believe in …', '2022-02-15 00:25:45'),
(35, 'People We Met on Vacation', 'Product35.jpg', 4, 'Emily Henry', 'Berkely', '2021-05-11', '63.45', 'Poppy and Alex. Alex and Poppy. They have nothing in common …', '2022-02-26 01:33:09'),
(36, 'The Paris Apartment', 'Product36.jpg', 4, 'Lucy Foley', 'William Morrow', '2022-02-22', '55.50', 'Jess needs a fresh start. She’s broke and alone, and she’s just left ...', '2022-02-26 05:59:37'),
(37, 'Don Quixote ', 'Product37.jpg', 5, 'Miguel De Cervantes Saavedra', 'Penguin Classics', '2003-02-25', '46.99', 'Regarded as one of the greatest works in literature, Don Quixote recounts the adventures of Alonso Quixano: a middle-aged man...', '2022-02-22 09:10:21'),
(38, 'The Three Musketeers', 'Product38.jpg', 5, 'Alexandre Dumas pÃ¨re', 'Wordsworth Editions Ltd', '1997-07-30', '15.99', 'In this classic by Dumas, a young man named d’Artagnan joins the Musketeers of the Guard. In doing so, he befriends Athos, Porthos, and Aramis — the King’s most celebrated musketeers — and embarks on a journey of his own...', '2022-02-16 15:21:39'),
(39, 'King Solomon\'s Mines', 'Product39.jpg', 5, 'H. Rider Haggard', 'Digireads.com Publishing', '2018-06-18', '37.99', 'The first English adventure novel set in Africa, this 1885 book is considered to be the origin of the Lost World literary genre. It boasts six adaptations, including a 1937 British film and a 2004 American television miniseries...', '2022-02-15 03:04:11'),
(40, 'Journey to the Center of the Earth', 'Product40.jpg', 5, 'Jules Verne ', 'Dover Publications', '2005-03-04', '39.99', 'Journey to the Center of the Earth is exactly that: a trip to the inside of the world, which is where German professor Otto Lidenbrock theorizes that volcanic tubes will lead...', '2022-02-26 03:51:57'),
(41, 'The Count of Monte Cristo', 'Product41.jpg', 5, 'Alexandre Dumas Père', 'Penguin Classics', '2003-05-27', '19.99', 'Part adventure story and part revenge thriller, The Count of Monte Cristo is the tale of Edmond Dantès, a man who is falsely imprisoned without trial in an island fortress off France...', '2022-02-22 06:35:16'),
(42, 'Ivanhoe', 'Product42.jpg', 5, 'Sir Walter Scott', 'Penguin Classics', '2000-10-01', '19.99', 'Banished from England for seeking to marry against his father\'s wishes, Ivanhoe joins Richard the Lion Heart on a crusade in the Holy Land...', '2022-02-16 06:30:41'),
(43, 'Tarzan of the Apes', 'Product43.jpg', 5, 'Edgar Rice Burroughs', 'Edgar Rice Burroughs', '2019-12-12', '124.99', 'Orphaned as a babe in the African jungle, tiny John Clayton, the only child of Lord and Lady Greystoke, is rescued by a tribe of great apes. The child, now named \"Tarzan\" ...', '2022-02-19 03:36:06'),
(44, 'Heart of Darkness', 'Product44.jpg', 5, 'Joseph Conrad', 'Independently published', '2019-12-09', '19.99', 'A new edition of Heart of Darkness, the 1899 masterpiece by Polish-British novelist Joseph Conrad about a voyage up the Congo River into the Heart of Africa...', '2022-02-26 19:21:00'),
(45, 'Treasure Island', 'Product45.jpg', 5, 'Robert Louis Stevenson', 'Signet', '2016-05-03', '82.99', '“Fifteen men on a dead man’s chest— Yo-ho-ho, and a bottle of rum!” For sheer storytelling delight and pure adventure, Treasure Island has never been surpassed...', '2022-02-23 16:34:28'),
(46, 'Dune', 'Product46.jpg', 6, 'Frank Herbert', 'Ace Books', '2019-10-01', '113.99', 'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the “spice” melange...', '2022-02-24 06:56:57'),
(47, 'Ender\'s Game', 'Product47.jpg', 6, 'Orson Scott Card', 'Tor', '2004-09-20', '41.99', 'Andrew \"Ender\" Wiggin thinks he is playing computer simulated war games; he is, in fact, engaged in something far more desperate...', '2022-02-26 21:49:13'),
(48, 'I, Robot', 'Product48.jpg', 6, 'Isaac Asimov', 'Bantam Books', '2004-06-01', '39.99', 'They mustn\'t harm a human being, they must obey hitman orders, and they must protect their own existence...but only so long as that doesn\'t violate rules one and two...', '2022-02-21 19:52:43'),
(49, '1984', 'Product49.jpg', 6, 'George Orwell', 'Houghton Mifflin Harcourt', '2013-09-03', '35.99', 'Among the seminal texts of the 20th century, Nineteen Eighty-Four is a rare work that grows more haunting as its futuristic purgatory becomes more real...', '2022-02-26 19:08:29'),
(50, 'Fahrenheit 451', 'Product50.jpg', 6, 'Ray Bradbury', 'Simon & Schuster', '2011-11-29', '36.99', 'Sixty years after its original publication, Ray Bradbury’s internationally acclaimed novel Fahrenheit 451 stands as a classic of world literature set in a bleak, dystopian future...', '2022-02-21 04:10:39'),
(51, 'Foundation', 'Product51.jpg', 6, 'Isaac Asimov', 'Bantam', '2004-06-01', '39.99', 'For twelve thousand years the Galactic Empire has ruled supreme. Now it is dying. But only Hari Seldon, creator of the revolutionary science of psychohistory, can see into the future...', '2022-02-27 11:13:02'),
(52, 'Brave New World', 'Product52.jpg', 6, 'Aldous Huxley', 'Perennial Classics', '1998-09-01', '50.99', 'Brave New World is a dystopian novel by English author Aldous Huxley, written in 1931 and published in 1932. Largely set in a futuristic World State, inhabited by genetically modified citizens....', '2022-02-16 05:42:13'),
(53, 'Hyperion', 'Product53.jpg', 6, 'Dan Simmons', 'Bantam Spectra', '1990-03-01', '51.99', 'On the world called Hyperion, beyond the law of the Hegemony of Man, there waits the creature called the Shrike. There are those who worship it. There are those who fear it. And there are those who have vowed to destroy it...', '2022-02-27 14:28:25'),
(54, 'The Martian', 'Product54.jpg', 6, 'Andy Weir', 'Crown', '2014-02-11', '41.99', 'Six days ago, astronaut Mark Watney became one of the first people to walk on Mars. Now, he’s sure he’ll be the first person to die there...', '2022-02-27 21:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_price` decimal(7,2) DEFAULT NULL,
  `r_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustID`, `Username`, `Email`, `PhoneNo`, `Address`, `Password`) VALUES
(2, 'Henry', 'henrylim326@gmail.com', '0139903874', '122, taman', 'Aa123456'),
(37, 'Teegan', 'dolor.donec.fringilla@gmail.com', '0159765769', '3209 Erat. Av.', 'HvB79772'),
(38, 'Samson', 'ac@gmail.com', '0126560317', '905-8211 Eget, Avenue', 'YhZ02277'),
(39, 'Fletcher', 'ante.nunc@gmail.com', '0138556465', 'P.O. Box 796, 7773 Sit Av.', 'UiZ33835'),
(40, 'Kelly', 'diam.luctus@gmail.com', '0162063536', 'Ap #506-8015 Vitae Av.', 'ZpX66439'),
(41, 'Melvin', 'tellus.aenean@gmail.com', '0145297527', 'Ap #997-7751 Sollicitudin St.', 'YpK27885'),
(42, 'Peter', 'ac.eleifend@gmail.com', '0165943587', 'Ap #861-7455 Leo Road', 'IaI13686'),
(43, 'Addison', 'consectetuer.rhoncus@gmail.com', '0184934178', 'Ap #146-8133 Arcu Avenue', 'GlR79243'),
(44, 'Valentine', 'nunc.sed.libero@gmail.com', '0123158722', '752-471 Dui Road', 'FgL12312'),
(45, 'Demetrius', 'enim.condimentum.eget@gmail.com', '0156676105', 'Ap #863-9676 Sed Av.', 'ArB31859'),
(46, 'Geraldine', 'quis.arcu.vel@gmail.com', '0125416774', '620-990 Vivamus Street', 'KtY23334'),
(47, 'Ruby', 'risus.quis.diam@gmail.com', '0169824088', '507-3566 Et Rd.', 'QzR41760'),
(48, 'Cassidy', 'varius.nam@gmail.com', '0152764815', '976-8156 Interdum. St.', 'TuA32844'),
(49, 'Christopher', 'tincidunt.adipiscing@gmail.com', '0134351528', 'Ap #890-7043 Posuere Rd.', 'TxH87146'),
(50, 'Bert', 'ornare.tortor@gmail.com', '0113713614', 'Ap #518-6762 Ante. Street', 'NdM81492'),
(51, 'Oleg', 'amet.ultricies@gmail.com', '0126082584', '993-8627 Convallis Ave', 'VnE14555'),
(52, 'Karleigh', 'laoreet.ipsum@gmail.com', '0184397665', 'Ap #379-9513 Parturient Avenue', 'LrF83231'),
(53, 'Madison', 'proin.sed.turpis@gmail.com', '0142632923', '5189 Orci Ave', 'YqR60122'),
(54, 'Macaulay', 'mauris.blandit@gmail.com', '0133744807', 'Ap #886-6531 Felis. St.', 'GvQ69479'),
(55, 'Evan', 'ornare.facilisis@gmail.com', '0152746263', '574-7076 Risus Avenue', 'UxY06226'),
(56, 'Michelle', 'phasellus.in.felis@gmail.com', '0172176299', 'P.O. Box 100, 5666 Fusce Ave', 'LmX43547'),
(57, 'Destiny', 'accumsan@gmail.com', '0135346670', 'Ap #310-2031 Fusce Street', 'MoU78865'),
(58, 'Macon', 'venenatis@gmail.com', '0193344485', '622-1161 Imperdiet St.', 'QtO55566'),
(59, 'Jacob', 'aliquet.vel@gmail.com', '0193333394', '567-3956 Sed Ave', 'BgI13583'),
(60, 'Hammett', 'tincidunt.donec@gmail.com', '0146389414', '5578 Nec Avenue', 'DyL13817'),
(61, 'Drew', 'consectetuer@gmail.com', '0130468768', '217-6153 Feugiat Rd.', 'TjA32194'),
(62, 'Thomas', 'quam.elementum.at@gmail.com', '0164967186', '187-1012 Sodales St.', 'PhU22375'),
(63, 'Allistair', 'tempus@gmail.com', '0152999985', '700-2208 Lacus Road', 'PvZ21430'),
(64, 'Brennan', 'dolor@gmail.com', '0114121108', '807-956 Et Avenue', 'VsT37879'),
(65, 'Kathleen', 'eu.ultrices@gmail.com', '0196686371', 'P.O. Box 335, 1081 Lacinia Road', 'YhB74447'),
(66, 'Kylee', 'aliquet.lobortis.nisi@gmail.com', '0120461566', '5341 Tincidunt St.', 'FhR24417'),
(67, 'invalid_user', '-', '-', '-', '-'),
(68, 'invalid_user', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre`) VALUES
(1, 'Horror'),
(2, 'Romance'),
(3, 'Mystery'),
(4, 'Fantasy'),
(5, 'Science Fiction'),
(6, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `CustID` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `r_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `CustID`, `customer_name`, `total_price`, `r_date`) VALUES
(1, 2, 'Henry', '625.62', '2021-11-17 20:00:11'),
(2, 37, 'Teegan', '225.77', '2021-11-16 20:28:36'),
(3, 44, 'Valentine', '290.36', '2021-12-02 20:46:08'),
(4, 58, 'Macon', '216.24', '2021-12-29 20:46:56'),
(5, 60, 'Hammett', '161.96', '2021-12-30 20:51:39'),
(6, 2, 'Henry', '219.48', '2022-01-04 20:55:40'),
(7, 51, 'Oleg', '154.47', '2022-02-22 21:05:03'),
(8, 47, 'Ruby', '274.62', '2022-02-23 21:20:35'),
(9, 2, 'Henry', '366.69', '2022-03-25 21:22:58'),
(10, 2, 'Henry', '282.29', '2022-03-30 10:53:51'),
(11, 2, 'Henry', '74.60', '2022-03-31 13:51:44'),
(12, 2, 'Henry', '69.90', '2022-04-01 12:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `reset _pass`
--

CREATE TABLE `reset _pass` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `serial_number` varchar(8) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`serial_number`, `book_id`, `book_status`) VALUES
('AE8609', 1, 'sold'),
('AI5228', 6, 'sold'),
('AI9613', 32, 'available'),
('AL4644', 13, 'available'),
('AN3261', 54, 'sold'),
('AV5645', 46, 'available'),
('AW8163', 13, 'available'),
('AX3457', 48, 'available'),
('AY1459', 14, 'available'),
('BE0522', 5, 'available'),
('BE3843', 50, 'available'),
('BG8261', 33, 'sold'),
('BJ1061', 25, 'available'),
('BJ2321', 51, 'sold'),
('BJ5758', 20, 'available'),
('BK8593', 1, 'sold'),
('BR6803', 16, 'available'),
('BT3724', 4, 'available'),
('BT6548', 42, 'sold'),
('BU5546', 7, 'sold'),
('BU6747', 25, 'available'),
('BV0853', 29, 'sold'),
('BY3478', 53, 'sold'),
('BZ6484', 2, 'sold'),
('BZ6942', 14, 'available'),
('CC2785', 20, 'available'),
('CC6323', 27, 'available'),
('CC7029', 3, 'sold'),
('CC8475', 19, 'sold'),
('CD7849', 37, 'available'),
('CE9376', 40, 'sold'),
('CF0864', 11, 'sold'),
('CF3941', 15, 'available'),
('CF6680', 26, 'available'),
('CG6146', 48, 'available'),
('CI3124', 35, 'available'),
('CI4592', 53, 'sold'),
('CJ3116', 7, 'available'),
('CL1886', 33, 'available'),
('CL8348', 11, 'available'),
('CM3438', 31, 'sold'),
('CP2405', 22, 'available'),
('CQ3425', 33, 'available'),
('CQ5170', 6, 'sold'),
('CV7675', 50, 'available'),
('CY2321', 54, 'available'),
('CY6425', 26, 'available'),
('DA3487', 38, 'available'),
('DD1768', 46, 'available'),
('DG4862', 17, 'available'),
('DH0436', 53, 'available'),
('DI6263', 8, 'available'),
('DP4317', 6, 'sold'),
('DP4639', 43, 'available'),
('DP7344', 12, 'sold'),
('DR1945', 15, 'available'),
('DR2350', 4, 'available'),
('DR2552', 39, 'available'),
('DS2538', 24, 'available'),
('DW3548', 1, 'sold'),
('DX2017', 44, 'sold'),
('DX5226', 39, 'available'),
('DY0978', 5, 'available'),
('DY7842', 42, 'available'),
('DZ2961', 25, 'available'),
('DZ8618', 14, 'available'),
('EA5007', 37, 'available'),
('EA6288', 3, 'available'),
('EB1982', 32, 'available'),
('ED9254', 30, 'available'),
('EE5658', 7, 'available'),
('EE7874', 1, 'sold'),
('EF1583', 2, 'available'),
('EF4934', 38, 'available'),
('EG2720', 39, 'available'),
('EH8826', 51, 'available'),
('EJ8134', 51, 'available'),
('EK3725', 44, 'available'),
('EK9413', 27, 'available'),
('EN5731', 26, 'available'),
('EO4168', 52, 'sold'),
('EO9638', 44, 'available'),
('EP5960', 6, 'available'),
('EQ1194', 6, 'available'),
('EQ6654', 1, 'sold'),
('ER6116', 15, 'available'),
('ES2637', 37, 'available'),
('ES6511', 27, 'available'),
('ET6565', 4, 'available'),
('EW3457', 47, 'available'),
('EX3823', 49, 'sold'),
('EZ4462', 41, 'sold'),
('FB4156', 18, 'sold'),
('FB5236', 32, 'available'),
('FB5413', 34, 'sold'),
('FC7566', 19, 'available'),
('FE4506', 23, 'available'),
('FG3285', 35, 'available'),
('FI0900', 25, 'available'),
('FI6457', 31, 'available'),
('FL9210', 39, 'available'),
('FN1731', 13, 'available'),
('FN2154', 40, 'available'),
('FN4207', 45, 'sold'),
('FP2617', 35, 'available'),
('FQ1032', 36, 'sold'),
('FS1382', 19, 'available'),
('FS4312', 34, 'sold'),
('FX8653', 45, 'sold'),
('GB0219', 54, 'available'),
('GD4103', 21, 'available'),
('GD6193', 14, 'available'),
('GF8512', 48, 'available'),
('GK5865', 24, 'available'),
('GN3721', 32, 'available'),
('GO3688', 4, 'available'),
('GP5171', 9, 'available'),
('GP6046', 43, 'available'),
('GR3346', 3, 'available'),
('GR6735', 48, 'available'),
('GT5927', 17, 'available'),
('GX6915', 8, 'available'),
('GY7679', 30, 'available'),
('GZ5216', 20, 'available'),
('HA4170', 37, 'available'),
('HB3573', 38, 'available'),
('HD6331', 44, 'available'),
('HE7632', 13, 'available'),
('HG1775', 33, 'available'),
('HH0538', 26, 'available'),
('HI1340', 47, 'available'),
('HI6755', 52, 'sold'),
('HK3577', 32, 'available'),
('HK8655', 52, 'available'),
('HM4162', 44, 'available'),
('HM8786', 5, 'available'),
('HN8116', 7, 'available'),
('HO7373', 11, 'available'),
('HP8771', 5, 'available'),
('HQ2782', 26, 'available'),
('HR1330', 52, 'available'),
('HS2108', 38, 'available'),
('HV8745', 1, 'sold'),
('HW7117', 43, 'available'),
('HX1561', 14, 'available'),
('HY1079', 37, 'available'),
('HY4529', 42, 'available'),
('IA4847', 1, 'sold'),
('IC7075', 19, 'available'),
('ID8582', 32, 'available'),
('IF6255', 17, 'available'),
('IG4364', 1, 'sold'),
('IG4916', 12, 'available'),
('IH8317', 31, 'available'),
('II2593', 21, 'available'),
('II7628', 45, 'available'),
('IK1737', 49, 'available'),
('IK8867', 27, 'available'),
('IM6023', 7, 'available'),
('IO7374', 6, 'available'),
('IQ3539', 40, 'available'),
('IQ6862', 46, 'available'),
('IT1954', 28, 'sold'),
('IU5237', 54, 'available'),
('IV5249', 11, 'available'),
('IV8012', 36, 'sold'),
('IW7331', 1, 'sold'),
('IY4316', 54, 'available'),
('IZ8933', 10, 'sold'),
('JA7167', 21, 'available'),
('JB3422', 16, 'available'),
('JC8117', 22, 'available'),
('JF4712', 5, 'available'),
('JF6477', 16, 'available'),
('JF9582', 43, 'available'),
('JH5485', 14, 'available'),
('JH6573', 48, 'available'),
('JH7731', 10, 'available'),
('JI7847', 48, 'available'),
('JK6335', 29, 'sold'),
('JL0985', 27, 'available'),
('JL5299', 41, 'available'),
('JM9929', 4, 'available'),
('JN2875', 17, 'available'),
('JQ3233', 19, 'available'),
('JQ9591', 23, 'available'),
('JU2288', 34, 'available'),
('JW8714', 41, 'available'),
('JX8520', 22, 'available'),
('KD8723', 1, 'available'),
('KE6554', 22, 'available'),
('KF3969', 29, 'available'),
('KG1666', 17, 'available'),
('KG2044', 16, 'available'),
('KI4212', 1, 'available'),
('KJ8322', 51, 'available'),
('KJ8421', 23, 'available'),
('KJ8797', 1, 'available'),
('KK2662', 24, 'available'),
('KM1538', 35, 'available'),
('KN5455', 38, 'available'),
('KO0527', 20, 'available'),
('KO4672', 27, 'available'),
('KP1857', 42, 'available'),
('KQ5310', 31, 'available'),
('KQ6440', 28, 'sold'),
('KQ6461', 50, 'available'),
('KT6128', 29, 'available'),
('KU7110', 37, 'available'),
('KX3912', 2, 'available'),
('KX6523', 2, 'available'),
('KZ6475', 35, 'available'),
('LC8124', 38, 'available'),
('LC8388', 23, 'available'),
('LC8412', 52, 'available'),
('LE0767', 33, 'available'),
('LK5251', 2, 'available'),
('LL3538', 13, 'available'),
('LN3472', 1, 'available'),
('LN3656', 54, 'available'),
('LN8345', 5, 'available'),
('LP8159', 52, 'available'),
('LR3483', 13, 'available'),
('LS2256', 25, 'available'),
('LS3133', 9, 'available'),
('LU5608', 8, 'available'),
('LU6810', 12, 'available'),
('LW4545', 49, 'available'),
('LW4754', 31, 'available'),
('LX1059', 51, 'available'),
('LX5335', 19, 'available'),
('LY0367', 27, 'available'),
('LZ3918', 36, 'sold'),
('MB3721', 9, 'available'),
('MB9518', 2, 'available'),
('MC4417', 18, 'available'),
('MC7545', 50, 'available'),
('MC9680', 10, 'available'),
('ME2255', 33, 'available'),
('MI8637', 19, 'available'),
('MJ0373', 41, 'available'),
('MJ4614', 49, 'available'),
('MK4842', 42, 'available'),
('ML5355', 17, 'available'),
('MP2241', 4, 'available'),
('MQ9733', 24, 'available'),
('MR4839', 24, 'available'),
('MR6934', 18, 'available'),
('MV7028', 13, 'available'),
('MW2755', 5, 'available'),
('MW5059', 18, 'available'),
('MX3309', 40, 'available'),
('MY6823', 21, 'available'),
('MZ5505', 7, 'available'),
('NA4528', 15, 'available'),
('NB7166', 48, 'available'),
('ND2580', 40, 'available'),
('ND8344', 37, 'available'),
('NE8789', 21, 'available'),
('NF1523', 45, 'available'),
('NG6326', 6, 'available'),
('NH4546', 34, 'available'),
('NI3956', 16, 'available'),
('NJ2771', 1, 'available'),
('NJ5714', 1, 'available'),
('NL1323', 6, 'available'),
('NN5223', 11, 'available'),
('NN8482', 32, 'available'),
('NO4751', 34, 'available'),
('NP6519', 30, 'available'),
('NP7676', 47, 'available'),
('NQ1195', 43, 'available'),
('NQ4936', 37, 'available'),
('NQ6317', 20, 'available'),
('NR2363', 7, 'available'),
('NR2447', 9, 'available'),
('NR4785', 47, 'available'),
('NT0663', 9, 'available'),
('NT5872', 42, 'available'),
('NT9564', 8, 'available'),
('NX9616', 18, 'available'),
('NZ8181', 50, 'available'),
('OB1105', 36, 'sold'),
('OB4660', 47, 'available'),
('OB4871', 11, 'available'),
('OE2814', 44, 'available'),
('OE3036', 1, 'available'),
('OH3049', 40, 'available'),
('OH6285', 36, 'available'),
('OI5363', 30, 'available'),
('OJ3216', 38, 'available'),
('OJ7364', 31, 'available'),
('OL8238', 27, 'available'),
('ON0931', 31, 'available'),
('ON3112', 45, 'available'),
('ON5877', 28, 'available'),
('ON9094', 19, 'available'),
('OS8576', 28, 'available'),
('OW4619', 47, 'available'),
('OY2093', 14, 'available'),
('PA5607', 19, 'available'),
('PD1587', 5, 'available'),
('PD2118', 2, 'available'),
('PF6483', 46, 'available'),
('PG6482', 25, 'available'),
('PJ4611', 1, 'available'),
('PJ6100', 23, 'available'),
('PL3734', 20, 'available'),
('PL7657', 1, 'available'),
('PN3050', 49, 'available'),
('PN5157', 18, 'available'),
('PN8468', 51, 'available'),
('PO8145', 10, 'available'),
('PQ1757', 20, 'available'),
('PR3328', 15, 'available'),
('PR5608', 53, 'available'),
('PS3324', 38, 'available'),
('PY2265', 29, 'available'),
('QA3120', 34, 'available'),
('QD6223', 51, 'available'),
('QD8268', 17, 'available'),
('QE4112', 26, 'available'),
('QE7411', 26, 'available'),
('QE9876', 24, 'available'),
('QG5747', 2, 'available'),
('QG9840', 17, 'available'),
('QI5346', 33, 'available'),
('QJ3156', 43, 'available'),
('QK0770', 10, 'available'),
('QK2261', 2, 'available'),
('QK2551', 13, 'available'),
('QL3382', 15, 'available'),
('QO8082', 9, 'available'),
('QP4613', 22, 'available'),
('QQ6026', 41, 'available'),
('QQ8591', 9, 'available'),
('QT5803', 14, 'available'),
('QV5146', 46, 'available'),
('QW8802', 28, 'available'),
('QX5672', 50, 'available'),
('QZ2456', 16, 'available'),
('QZ4751', 35, 'available'),
('RA1789', 54, 'available'),
('RB0667', 4, 'available'),
('RC5348', 12, 'available'),
('RC7619', 23, 'available'),
('RE3462', 4, 'available'),
('RF9485', 8, 'available'),
('RI7678', 46, 'available'),
('RK3359', 14, 'available'),
('RK7830', 32, 'available'),
('RL1317', 14, 'available'),
('RM1173', 30, 'available'),
('RM7478', 3, 'available'),
('RS5867', 46, 'available'),
('RU6605', 10, 'available'),
('RV1870', 50, 'available'),
('RV7596', 12, 'available'),
('RX9782', 45, 'available'),
('RY0666', 8, 'available'),
('SC5448', 14, 'available'),
('SD1905', 4, 'available'),
('SE3275', 10, 'available'),
('SG2759', 12, 'available'),
('SG9771', 49, 'available'),
('SH4681', 12, 'available'),
('SH8827', 36, 'available'),
('SK6514', 53, 'available'),
('SM0862', 23, 'available'),
('SP3161', 52, 'available'),
('SP5088', 44, 'available'),
('SR1572', 17, 'available'),
('SS8663', 38, 'available'),
('ST3306', 34, 'available'),
('ST6024', 28, 'available'),
('SX3766', 10, 'available'),
('TB4807', 52, 'available'),
('TE1627', 25, 'available'),
('TF2161', 11, 'available'),
('TG3821', 29, 'available'),
('TG4435', 30, 'available'),
('TJ4933', 3, 'available'),
('TM7585', 30, 'available'),
('TM9376', 24, 'available'),
('TP1530', 39, 'available'),
('TQ3331', 40, 'available'),
('TQ8565', 34, 'available'),
('TR4523', 31, 'available'),
('TS9726', 18, 'available'),
('TT0851', 15, 'available'),
('TT1674', 22, 'available'),
('TV6848', 33, 'available'),
('TW7628', 6, 'available'),
('TY5331', 16, 'available'),
('UA1317', 22, 'available'),
('UB6445', 27, 'available'),
('UC4982', 30, 'available'),
('UD8217', 46, 'available'),
('UH0030', 11, 'available'),
('UH5862', 49, 'available'),
('UH9310', 41, 'available'),
('UI6882', 24, 'available'),
('UJ6040', 3, 'available'),
('UK5363', 42, 'available'),
('UK8667', 48, 'available'),
('UM9748', 8, 'available'),
('UN1352', 8, 'available'),
('UO1254', 46, 'available'),
('UQ3737', 53, 'available'),
('US4195', 30, 'available'),
('UT6192', 35, 'available'),
('UU6977', 32, 'available'),
('UV5384', 43, 'available'),
('UY1886', 48, 'available'),
('UY8447', 9, 'available'),
('VC0272', 14, 'available'),
('VD1468', 34, 'available'),
('VG4204', 39, 'available'),
('VG6879', 45, 'available'),
('VI1621', 18, 'available'),
('VI4142', 40, 'available'),
('VM1455', 25, 'available'),
('VM5821', 47, 'available'),
('VN3372', 2, 'available'),
('VO8324', 50, 'available'),
('VP1540', 45, 'available'),
('VR8845', 20, 'available'),
('VS8735', 15, 'available'),
('VS8854', 7, 'available'),
('VW0484', 41, 'available'),
('VX6345', 40, 'available'),
('WA6666', 49, 'available'),
('WB4466', 45, 'available'),
('WB7653', 4, 'available'),
('WC2656', 8, 'available'),
('WC7227', 22, 'available'),
('WC8246', 3, 'available'),
('WD3321', 50, 'available'),
('WE8847', 53, 'available'),
('WK1612', 1, 'available'),
('WM6847', 26, 'available'),
('WO0242', 25, 'available'),
('WO3665', 36, 'available'),
('WP0871', 29, 'available'),
('WP4563', 21, 'available'),
('WP6262', 21, 'available'),
('WQ2234', 24, 'available'),
('WR8711', 28, 'available'),
('WS5012', 31, 'available'),
('WT2585', 20, 'available'),
('WU2412', 10, 'available'),
('WW8137', 7, 'available'),
('WY8326', 1, 'available'),
('WZ2735', 21, 'available'),
('XB3982', 13, 'available'),
('XB5230', 14, 'available'),
('XC9811', 12, 'available'),
('XD8857', 12, 'available'),
('XE2050', 41, 'available'),
('XG3899', 52, 'available'),
('XG6381', 16, 'available'),
('XH5350', 42, 'available'),
('XI3653', 5, 'available'),
('XJ5098', 33, 'available'),
('XK7047', 54, 'available'),
('XO1106', 47, 'available'),
('XP7117', 1, 'available'),
('XQ1866', 51, 'available'),
('XQ3381', 9, 'available'),
('XR5114', 44, 'available'),
('XR6174', 44, 'available'),
('XR7885', 22, 'available'),
('XS1870', 43, 'available'),
('XS8427', 1, 'available'),
('XT3551', 36, 'available'),
('XT6323', 11, 'available'),
('XU0502', 3, 'available'),
('XV9470', 51, 'available'),
('XY2816', 53, 'available'),
('XY5296', 26, 'available'),
('XY7597', 3, 'available'),
('XY9138', 23, 'available'),
('XZ5787', 7, 'available'),
('XZ8359', 29, 'available'),
('YB0513', 35, 'available'),
('YB1543', 3, 'available'),
('YB5837', 28, 'available'),
('YC5186', 54, 'available'),
('YC6161', 43, 'available'),
('YD7353', 1, 'available'),
('YD9554', 15, 'available'),
('YG6152', 5, 'available'),
('YG6343', 23, 'available'),
('YK3227', 10, 'available'),
('YK7617', 28, 'available'),
('YK9482', 39, 'available'),
('YL7136', 11, 'available'),
('YM0702', 1, 'available'),
('YM1814', 42, 'available'),
('YM3172', 8, 'available'),
('YM3218', 39, 'available'),
('YO1035', 39, 'available'),
('YQ3223', 49, 'available'),
('YS8384', 41, 'available'),
('YU0279', 18, 'available'),
('YU4645', 6, 'available'),
('YV5591', 29, 'available'),
('YX7332', 35, 'available'),
('ZB1254', 9, 'available'),
('ZO1715', 47, 'available'),
('ZP0594', 53, 'available'),
('ZR1558', 12, 'available'),
('ZT3340', 16, 'available'),
('ZT4721', 37, 'available'),
('ZX2256', 1, 'available'),
('ZY1679', 21, 'available'),
('ZY7584', 36, 'available'),
('ZZ4321', 7, 'available'),
('ZZ9999', 1, 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_serial` (`serial_number`),
  ADD KEY `bill_history` (`history_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_genre` (`genre_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_bookid` (`book_id`),
  ADD KEY `cart_custid` (`Cust_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `hisory_cust` (`CustID`);

--
-- Indexes for table `reset _pass`
--
ALTER TABLE `reset _pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`serial_number`),
  ADD KEY `stock_bookid` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reset _pass`
--
ALTER TABLE `reset _pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_history` FOREIGN KEY (`history_id`) REFERENCES `history` (`history_id`),
  ADD CONSTRAINT `bill_serial` FOREIGN KEY (`serial_number`) REFERENCES `stock` (`serial_number`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_bookid` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `cart_custid` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`CustID`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `hisory_cust` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_bookid` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
