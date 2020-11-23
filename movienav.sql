-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 06:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movienav`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genreID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `name`) VALUES
(12, 'Adventure'),
(14, 'Fantasy'),
(16, 'Animation'),
(18, 'Drama'),
(27, 'Horror'),
(28, 'Action'),
(35, 'Comedy'),
(36, 'History'),
(37, 'Western'),
(53, 'Thriller'),
(80, 'Crime'),
(99, 'Documentary'),
(878, 'Science Fiction'),
(9648, 'Mystery'),
(10402, 'Music'),
(10749, 'Romance'),
(10751, 'Family'),
(10752, 'War'),
(10770, 'TV Movie');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `tmdbID` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `overview` varchar(1000) NOT NULL,
  `poster` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`tmdbID`, `title`, `overview`, `poster`) VALUES
(13, 'Forrest Gump', 'A man with a low IQ has accomplished great things in his life and been present during significant historic events—in each case, far exceeding what anyone imagined he could do. But despite all he has achieved, his one true love eludes him.', '/clolk7rB5lAjs41SD0Vt6IXYLMm.jpg'),
(24428, 'The Avengers', 'When an unexpected enemy emerges and threatens global safety and security, Nick Fury, director of the international peacekeeping agency known as S.H.I.E.L.D., finds himself in need of a team to pull the world back from the brink of disaster. Spanning the globe, a daring recruitment effort begins!', '/RYMX2wcKCBAr24UyPD7xwmjaTn.jpg'),
(75624, 'Naruto Shippuden the Movie: Blood Prison', 'After his capture for attempted assassination of the Raikage, leader of Kumogakure, as well as killing Jōnin from Kirigakure and Iwagakure, Naruto is imprisoned in Hōzukijou: A criminal containment facility known as the Blood Prison. Mui, the castle master, uses the ultimate imprisonment technique to steal power from the prisoners, which is when Naruto notices his life has been targeted. Thus begins the battle to uncover the truth behind the mysterious murders and prove Naruto\'s innocence.', '/4WT7zYFpe0fsbg6TitppiHddWAh.jpg'),
(109445, 'Frozen', 'Young princess Anna of Arendelle dreams about finding true love at her sister Elsa’s coronation. Fate takes her on a dangerous journey in an attempt to end the eternal winter that has fallen over the kingdom. She\'s accompanied by ice delivery man Kristoff, his reindeer Sven, and snowman Olaf. On an adventure where she will find out what friendship, courage, family, and true love really means.', '/kgwjIb2JDHRhNk13lmSxiClFjVk.jpg'),
(157336, 'Interstellar', 'The adventures of a group of explorers who make use of a newly discovered wormhole to surpass the limitations on human space travel and conquer the vast distances involved in an interstellar voyage.', '/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg'),
(268896, 'Pacific Rim: Uprising', 'It has been ten years since The Battle of the Breach and the oceans are still, but restless. Vindicated by the victory at the Breach, the Jaeger program has evolved into the most powerful global defense force in human history. The PPDC now calls upon the best and brightest to rise up and become the next generation of heroes when the Kaiju threat returns.', '/v5HlmJK9bdeHxN2QhaFP1ivjX3U.jpg'),
(290859, 'Terminator: Dark Fate', 'Decades after Sarah Connor prevented Judgment Day, a lethal new Terminator is sent to eliminate the future leader of the resistance. In a fight to save mankind, battle-hardened Sarah Connor teams up with an unexpected ally and an enhanced super soldier to stop the deadliest Terminator yet.', '/vqzNJRH4YyquRiWxCCOH0aXggHI.jpg'),
(359724, 'Ford v Ferrari', 'American car designer Carroll Shelby and the British-born driver Ken Miles work together to battle corporate interference, the laws of physics, and their own personal demons to build a revolutionary race car for Ford Motor Company and take on the dominating race cars of Enzo Ferrari at the 24 Hours of Le Mans in France in 1966.', '/6ApDtO7xaWAfPqfi2IARXIzj8QS.jpg'),
(363088, 'Ant-Man and the Wasp', 'Just when his time under house arrest is about to end, Scott Lang once again puts his freedom at risk to help Hope van Dyne and Dr. Hank Pym dive into the quantum realm and try to accomplish, against time and any chance of success, a very dangerous rescue mission.', '/gMEtbUQGgUHwdo8d4ZpdOer3Nxu.jpg'),
(373571, 'Godzilla: King of the Monsters', 'Follows the heroic efforts of the crypto-zoological agency Monarch as its members face off against a battery of god-sized monsters, including the mighty Godzilla, who collides with Mothra, Rodan, and his ultimate nemesis, the three-headed King Ghidorah. When these ancient super-species, thought to be mere myths, rise again, they all vie for supremacy, leaving humanity\'s very existence hanging in the balance.', '/mzOHg7Q5q9yUmY0b9Esu8Qe6Nnm.jpg'),
(385687, 'Fast & Furious 10', 'Tenth and penultimate installment of the Fast and Furious franchise.', '/2DyEk84XnbJEdPlGF43crxfdtHH.jpg'),
(400155, 'Hotel Transylvania 3: Summer Vacation', 'Dracula, Mavis, Johnny and the rest of the Drac Pack take a vacation on a luxury Monster Cruise Ship, where Dracula falls in love with the ship’s captain, Ericka, who’s secretly a descendant of Abraham Van Helsing, the notorious monster slayer.', '/gjAFM4xhA5vyLxxKMz38ujlUfDL.jpg'),
(400160, 'The SpongeBob Movie: Sponge on the Run', 'When his best friend Gary is suddenly snatched away, SpongeBob takes Patrick on a madcap mission far beyond Bikini Bottom to save their pink-shelled pal.', '/jlJ8nDhMhCYJuzOw3f52CP1W8MW.jpg'),
(402900, 'Ocean\'s Eight', 'Debbie Ocean, a criminal mastermind, gathers a crew of female thieves to pull off the heist of the century at New York\'s annual Met Gala.', '/MvYpKlpFukTivnlBhizGbkAe3v.jpg'),
(420634, 'Terrifier', 'A maniacal clown named Art terrorizes three young women and everyone else who stands in his way on Halloween night.', '/4lwh4MX2yCogHflyAYMRbfdnpnm.jpg'),
(420818, 'The Lion King', 'Simba idolizes his father, King Mufasa, and takes to heart his own royal destiny. But not everyone in the kingdom celebrates the new cub\'s arrival. Scar, Mufasa\'s brother—and former heir to the throne—has plans of his own. The battle for Pride Rock is ravaged with betrayal, tragedy and drama, ultimately resulting in Simba\'s exile. With help from a curious pair of newfound friends, Simba will have to figure out how to grow up and take back what is rightfully his.', '/dzBtMocZuJbjLOXvrl4zGYigDzh.jpg'),
(464052, 'Wonder Woman 1984', 'Wonder Woman comes into conflict with the Soviet Union during the Cold War in the 1980s and finds a formidable foe by the name of the Cheetah.', '/di1bCAfGoJ0BzNEavLsPyxQ2AaB.jpg'),
(479259, 'Lost Girls & Love Hotels', 'Searching for escape in Tokyo\'s back alleys, a haunted English teacher explores love and lust with a dashing Yakuza, as their tumultuous affair takes her on a journey through the city\'s dive bars and three-hour love hotels.', '/vQgXwuJrlpzGDI8169tRQRy71Nv.jpg'),
(496243, 'Parasite', 'All unemployed, Ki-taek\'s family takes peculiar interest in the wealthy and glamorous Parks for their livelihood until they get entangled in an unexpected incident.', '/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg'),
(520725, 'The Lost Prince', 'Djibi lives alone with Sofia, his 8-year-old daughter. Every night, he invents a story to put him to sleep. When Sofia falls asleep, these extraordinary stories come to life somewhere in an imaginary world inhabited by knights, pirates and other dragons. In this world that belongs only to them, Sofia is always the princess to save, and the brave Prince is none other than Djibi himself.  But 3 years later, the entry of Sofia to the college will mark the end of her childhood. To the despair of her father, she no longer needs her stories at night. On the one hand, Djibi will have to accept that his daughter will grow up and move away from him. On the other hand, in the World of Stories, the Prince will have to face the most epic of all his adventures. Find your destiny in a world where it no longer has a place.', '/iFcSfoMu9hQIX4t0CxIkDJKgIES.jpg'),
(528085, '2067', 'A lowly utility worker is called to the future by a mysterious radio signal, he must leave his dying wife to embark on a journey that will force him to face his deepest fears in an attempt to change the fabric of reality and save humankind from its greatest environmental crisis yet.', '/7D430eqZj8y3oVkLFfsWXGRcpEG.jpg'),
(530915, '1917', 'At the height of the First World War, two young British soldiers must cross enemy territory and deliver a message that will stop a deadly attack on hundreds of soldiers.', '/iZf0KyrE25z1sage4SYFLCCrMi9.jpg'),
(531876, 'The Outpost', 'A small unit of U.S. soldiers, alone at the remote Combat Outpost Keating, located deep in the valley of three mountains in Afghanistan, battles to defend against an overwhelming force of Taliban fighters in a coordinated attack. The Battle of Kamdesh, as it was known, was the bloodiest American engagement of the Afghan War in 2009 and Bravo Troop 3-61 CAV became one of the most decorated units of the 19-year conflict.', '/hPkqY2EMqWUnFEoedukilIUieVG.jpg'),
(550440, 'Timmy Failure: Mistakes Were Made', 'An 11-year old boy believes that he is the best detective in town and runs the agency Total Failures with his best friend, an imaginary 1,200 pound polar bear.', '/9Ic99kyJewgPHwl4JftJSwzUmtD.jpg'),
(552687, 'Wotakoi: Love is Hard for Otaku', 'An effervescent musical about one of the most unlikely couples seen on screen: two Otaku intent on hiding their nerdiness from their colleagues!', '/9JV0LOcazudqEcz2NNOMqEIzACz.jpg'),
(560050, 'Over the Moon', 'A girl builds a rocket to travel to the moon in hopes of meeting the legendary Moon Goddess.', '/lQfdytwN7eh0tXWjIiMceFdBBvD.jpg'),
(575417, 'On the Rocks', 'Faced with sudden doubts about her marriage, a young New York mother teams up with her larger-than-life playboy father to tail her husband.', '/fcijRCmB7yTtloh4Pumy9b1rkwU.jpg'),
(576393, 'Fall in Love at First Kiss', 'After an earthquake destroys Xiang Qin\'s house, she and her father move in with the family of her father\'s college buddy. To her surprise, her new kind and amicable aunt and uncle are the parents of her cold and distant schoolmate, Jiang Zhi Shu, a genius with an IQ of 200 whom not too long ago rejected her when she confessed her feelings for him. Will the close proximity give her a second chance to win Zhi Shu\'s heart? Or will her love for him end under his cold words?', '/nMNVfz2bmcgj9Du0wywVHjbRIsz.jpg'),
(577922, 'Tenet', 'Armed with only one word - Tenet - and fighting for the survival of the entire world, the Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.', '/k68nPLbIST6NP96JmTxmZijEvCA.jpg'),
(604578, 'Spontaneous', 'When students in their high school begin inexplicably exploding (literally), seniors Mara and Dylan struggle to survive in a world where each moment may be their last.', '/tewRFdur9P7P5yk9FQJPwSTR55t.jpg'),
(618353, 'Batman: Death in the Family', 'Tragedy strikes the Batman\'s life again when Robin Jason Todd tracks down his birth mother only to run afoul of the Joker. An adaptation of the 1988 comic book storyline of the same name.', '/k8Q9ulyRE8fkvZMkAM9LPYMKctb.jpg'),
(622855, 'Jingle Jangle: A Christmas Journey', 'An imaginary world comes to life in a holiday tale of an eccentric toymaker, his adventurous granddaughter, and a magical invention that has the power to change their lives forever.', '/5RbyHIVydD3Krmec1LlUV7rRjet.jpg'),
(627290, 'Antebellum', 'Successful author Veronica finds herself trapped in a horrifying reality and must uncover the mind-bending mystery before it\'s too late.', '/irkse1FMm9dWemwlxKJ7RINT9Iy.jpg'),
(630566, 'Clouds', 'Young musician Zach Sobiech discovers his cancer has spread, leaving him just a few months to live. With limited time, he follows his dream and makes an album, unaware that it will soon be a viral music phenomenon.', '/2YvT3pdGngzpbAuxamTz4ZlabnT.jpg'),
(689249, 'Money Heist: The Phenomenon', 'A documentary on why and how \'Money Heist\' sparked a wave of enthusiasm around the world for a lovable group of thieves and their professor.', '/AboUXTrDWEi0PuZUqaft0iwBTm7.jpg'),
(698410, 'Adventures of Rufus: The Fantastic Pet', 'At his grandmother\'s house, Scott and his friend Emily meet Rufus, a swashbuckling, furry creature who begs them to help restore his fading kingdom. Wizard Abbott\'s spell book contains the magic healing formula--but Abbott\'s ancient nemesis Lilith, posing as Grandmother\'s servant, wants the book, too! In this hilarious, high-flying family adventure, Scott and Emily must confront a gigantic alligator, a vicious dinosaur skeleton, a ruthless owl, and a fire-breathing dragon to rescue Rufus\' magical world.', '/hF5AFDTWEqECQEvqOsFG2FQ6DJM.jpg'),
(704264, 'Primal: Tales of Savagery', 'Genndy Tartakovsky\'s Primal: Tales of Savagery features a caveman and a dinosaur on the brink of extinction. Bonded by tragedy, this unlikely friendship becomes the only hope of survival.', '/osBa5SDOCyk8DzLcy8Qa3bdwUXu.jpg'),
(722603, 'Battlefield 2025', 'Weekend campers, an escaped convict, young lovers and a police officer experience a night of terror when a hostile visitor from another world descends on a small Arizona town.', '/w6e0XZreiyW4mGlLRHEG8ipff7b.jpg'),
(726664, 'Fearless', 'A teen gamer is forced to level up to full-time babysitter when his favorite video game drops three superpowered infants from space into his backyard.', '/5oQJ6HeNGWnEtP9Qyt5IZjuKI7j.jpg'),
(733491, 'They Live Inside Us', 'Seeking inspiration for a new writing project, a man spends Halloween night in a notoriously haunted house. He soon realizes he is living in his own horror story.', '/1GJLLFlUaPEok4y8TXk5erbryt9.jpg'),
(738215, 'Barbie: Princess Adventure', 'With new friends in a new kingdom, Barbie learns what it means to be herself when she trades places with a royal lookalike in this musical adventure.', '/AwkmMTKJBAatbeAVhTwhcU3Pyp4.jpg'),
(749336, 'Star Wars: Wrath of the Mandalorian', 'Years after the Clone Wars end, Darth Vader sends bounty hunter Boba Fett to Kashyyyk to track down the last of the Jedi. Fett, motivated by revenge for his father\'s death, proves effective - but he soon finds out a terrible truth about Vader while on the hunt that gives him a change of heart.', '/ksil1FjB7AfNk34LAti0636pyTd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `moviesgenres`
--

CREATE TABLE `moviesgenres` (
  `movieID` int(11) NOT NULL,
  `genreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moviesgenres`
--

INSERT INTO `moviesgenres` (`movieID`, `genreID`) VALUES
(560050, 16),
(560050, 12),
(560050, 10751),
(560050, 14),
(726664, 16),
(726664, 35),
(75624, 53),
(75624, 16),
(75624, 28),
(75624, 35),
(75624, 27),
(75624, 9648),
(109445, 16),
(109445, 12),
(109445, 10751),
(704264, 28),
(704264, 12),
(704264, 16),
(604578, 35),
(604578, 27),
(530915, 10752),
(530915, 18),
(400160, 14),
(400160, 16),
(400160, 12),
(400160, 35),
(400160, 10751),
(520725, 14),
(520725, 12),
(520725, 35),
(363088, 28),
(363088, 12),
(363088, 878),
(363088, 35),
(722603, 28),
(722603, 27),
(722603, 878),
(575417, 18),
(575417, 35),
(290859, 28),
(290859, 12),
(290859, 878),
(268896, 28),
(268896, 14),
(268896, 878),
(268896, 12),
(496243, 35),
(496243, 53),
(496243, 18),
(359724, 18),
(359724, 36),
(531876, 10752),
(531876, 18),
(531876, 36),
(531876, 28),
(576393, 10749),
(576393, 35),
(464052, 14),
(464052, 28),
(464052, 12),
(577922, 28),
(577922, 53),
(577922, 878),
(627290, 27),
(24428, 878),
(24428, 28),
(24428, 12),
(630566, 10402),
(630566, 18),
(630566, 10749),
(402900, 80),
(402900, 35),
(402900, 28),
(402900, 53),
(552687, 35),
(552687, 10749),
(738215, 16),
(738215, 10402),
(528085, 878),
(528085, 53),
(528085, 18),
(420818, 12),
(420818, 10751),
(420818, 10402),
(420818, 16),
(698410, 12),
(698410, 10751),
(698410, 14),
(733491, 27),
(373571, 878),
(373571, 28),
(618353, 16),
(618353, 28),
(689249, 99),
(622855, 10751),
(622855, 14),
(622855, 10402),
(400155, 10751),
(400155, 14),
(400155, 35),
(400155, 16),
(385687, 28),
(385687, 53);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tmdbID` int(12) NOT NULL,
  `ratingDate` date NOT NULL DEFAULT current_timestamp(),
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratingID`, `userID`, `tmdbID`, `ratingDate`, `rating`) VALUES
(424, 6, 576393, '2020-11-22', 10),
(425, 6, 464052, '2020-11-22', 2),
(426, 6, 577922, '2020-11-22', 5),
(427, 6, 627290, '2020-11-22', 5),
(428, 6, 24428, '2020-11-22', 1),
(429, 6, 630566, '2020-11-22', 1),
(430, 6, 496243, '2020-11-22', 10),
(431, 6, 402900, '2020-11-22', 4),
(432, 6, 552687, '2020-11-22', 1),
(433, 6, 738215, '2020-11-22', 10),
(434, 6, 749336, '2020-11-22', 1),
(435, 6, 528085, '2020-11-22', 6),
(436, 6, 420818, '2020-11-22', 7),
(437, 6, 698410, '2020-11-22', 2),
(438, 6, 733491, '2020-11-22', 7),
(439, 6, 373571, '2020-11-22', 6),
(440, 6, 618353, '2020-11-22', 4),
(441, 6, 689249, '2020-11-22', 6),
(442, 6, 622855, '2020-11-22', 9),
(443, 6, 722603, '2020-11-22', 8),
(444, 6, 400155, '2020-11-22', 8),
(445, 6, 385687, '2020-11-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userrelationships`
--

CREATE TABLE `userrelationships` (
  `userFirstID` int(11) NOT NULL,
  `userSecondID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ;

--
-- Dumping data for table `userrelationships`
--

INSERT INTO `userrelationships` (`userFirstID`, `userSecondID`, `type`) VALUES
(1, 2, 'friends'),
(1, 4, 'friends'),
(1, 5, 'friends'),
(2, 3, 'friends'),
(2, 5, 'friends'),
(6, 7, 'friends');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `proPic` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `username`, `password`, `proPic`) VALUES
(6, 'nluginbill@gmail.com', 'nluginbill', '$2y$10$BuC5M16gUVqCnl.pEaIe6eHq227HXIkxxIGhelV4jE1x7R/pmRb0W', './img/nluginbillunnamed.jpg'),
(7, 'nluginbill2@gmail.com', 'nluginbill2', '$2y$10$zdU0zoHV2GCXx4uwbhCHeu5DvZpu18E/sPZtt.UFi5pvtwEknqhqu', './img/nluginbill2sprinter.jpg'),
(8, 'nluginbill@yahoo.com', 'nluginbill3', '$2y$10$0xufwhFEMe/s9C342sK0xuOqBHYE3unEw8PzK4Sb9NWKyq18g.X02', './img/nluginbill3sprinter.jpg'),
(9, 'nluginbill4@gmail.com', 'nluginbill4', '$2y$10$JT.iAHVKwZo11i9P8dp0ceGyq3NA830sJofk3svq2RZ9UVJnzOV8.', './img/nluginbill4sprinter.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`tmdbID`);

--
-- Indexes for table `moviesgenres`
--
ALTER TABLE `moviesgenres`
  ADD KEY `fk_moviesgenres_movies` (`movieID`),
  ADD KEY `fk_moviesgenres_genres` (`genreID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingID`),
  ADD KEY `fkRatingsUsers` (`userID`),
  ADD KEY `fkRatingsMovies` (`tmdbID`);

--
-- Indexes for table `userrelationships`
--
ALTER TABLE `userrelationships`
  ADD PRIMARY KEY (`userFirstID`,`userSecondID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `tmdbID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=753584;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moviesgenres`
--
ALTER TABLE `moviesgenres`
  ADD CONSTRAINT `fk_moviesgenres_genres` FOREIGN KEY (`genreID`) REFERENCES `genres` (`genreID`),
  ADD CONSTRAINT `fk_moviesgenres_movies` FOREIGN KEY (`movieID`) REFERENCES `movies` (`tmdbID`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fkRatingsMovies` FOREIGN KEY (`tmdbID`) REFERENCES `movies` (`tmdbID`),
  ADD CONSTRAINT `fkRatingsUsers` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
