-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 08:58 PM
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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `userID` int(11) NOT NULL,
  `tmdbID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`userID`, `tmdbID`) VALUES
(16, 518764),
(16, 991),
(16, 62),
(16, 62),
(16, 62),
(16, 62),
(16, 62),
(16, 62),
(16, 62),
(16, 13597),
(6, 493922),
(13, 640882),
(13, 703771),
(13, 294963),
(13, 62),
(6, 62),
(17, 62),
(17, 636),
(17, 11864),
(17, 9278),
(17, 9425),
(17, 185),
(6, 78),
(6, 78);

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
(62, '2001: A Space Odyssey', 'Humanity finds a mysterious object buried beneath the lunar surface and sets off to find its origins with the help of HAL 9000, the world\'s most advanced super computer.', '/zmmYdPa8Lxx999Af9vnVP4XQ1V6.jpg'),
(78, 'Blade Runner', 'In the smog-choked dystopian Los Angeles of 2019, blade runner Rick Deckard is called out of retirement to terminate a quartet of replicants who have escaped to Earth seeking their creator for a way to extend their short life spans.', '/vfzE3pjE5G7G7kcZWrA3fnbZo7V.jpg'),
(185, 'A Clockwork Orange', 'In a near-future Britain, young Alexander DeLarge and his pals get their kicks beating and raping anyone they please. When not destroying the lives of others, Alex swoons to the music of Beethoven. The state, eager to crack down on juvenile crime, gives an incarcerated Alex the option to undergo an invasive procedure that\'ll rob him of all personal agency. In a time when conscience is a commodity, can Alex change his tune?', '/4sHeTAp65WrSSuc05nRBKddhBxO.jpg'),
(600, 'Full Metal Jacket', 'A pragmatic U.S. Marine observes the dehumanizing effects the U.S.-Vietnam War has on his fellow recruits from their brutal boot camp training to the bloody street fighting in Hue.', '/kMKyx1k8hWWscYFnPbnxxN4Eqo4.jpg'),
(636, 'THX 1138', 'People in the future live in a totalitarian society. A technician named THX 1138 lives a mundane life between work and taking a controlled consumption of drugs that the government uses to make puppets out of people. As THX is without drugs for the first time he has feelings for a woman and they start a secret relationship.', '/25cQH5gZ60BiA5Y91HxoPpnFiY0.jpg'),
(671, 'Harry Potter and the Philosopher\'s Stone', 'Harry Potter has lived under the stairs at his aunt and uncle\'s house his whole life. But on his 11th birthday, he learns he\'s a powerful wizard -- with a place waiting for him at the Hogwarts School of Witchcraft and Wizardry. As he learns to harness his newfound powers with the help of the school\'s kindly headmaster, Harry uncovers the truth about his parents\' deaths -- and about the villain who\'s to blame.', '/wuMc08IPKEatf9rnMNXvIDxqP4W.jpg'),
(991, 'The Man Who Fell to Earth', 'Thomas Jerome Newton is an alien who has come to Earth in search of water to save his home planet. Aided by lawyer Oliver Farnsworth, Thomas uses his knowledge of advanced technology to create profitable inventions. While developing a method to transport water, Thomas meets Mary-Lou, a quiet hotel clerk, and begins to fall in love with her. Just as he is ready to leave Earth, Thomas is intercepted by the U.S. government, and his entire plan is threatened.', '/gwmPVphE5DMFFGXGMhfEFyxOOYj.jpg'),
(9278, 'Freejack', 'Time-traveling bounty hunters find a doomed race-car driver in the past and bring him to 2009 New York, where his mind will be replaced with that of a terminally ill billionaire.', '/8PPWt5S5Om8OcBbI6n96GkGH5ld.jpg'),
(9425, 'Soldier', 'Sergeant Todd is a veteran soldier for an elite group of the armed forces. After being defeated by a new breed of genetically engineered soldiers, he is dumped on a waste planet and left for dead. He soon interacts with a group of crash survivors who lead out a peaceful existence. The peace is broken as the new soldiers land on the planet to eliminate the colony, which Sergeant Todd must defend.', '/6ZWFvwpnOMcZBtRCjHaT5ozhRKV.jpg'),
(11031, 'This Is Spinal Tap', '', '/z2LA8eBTSuuPC4NBhIZRNIwpimH.jpg'),
(11864, 'Enemy Mine', 'A soldier from Earth crashlands on an alien world after sustaining battle damage. Eventually he encounters another survivor, but from the enemy species he was fighting; they band together to survive on this hostile world. In the end the human finds himself caring for his enemy in a completely unexpected way.', '/a3dr9L8VIjhEvivzQ2M12VQDere.jpg'),
(13597, 'Labyrinth', 'When teen Sarah is forced to babysit Toby, her baby stepbrother, she summons Jareth the Goblin King to take him away. When he is actually kidnapped, Sarah is given just thirteen hours to solve a labyrinth and rescue him.', '/AdWRVEkLV9RlUK8tREclkIIOfjT.jpg'),
(19995, 'Avatar', 'In the 22nd century, a paraplegic Marine is dispatched to the moon Pandora on a unique mission, but becomes torn between following orders and protecting an alien civilization.', '/6EiRUJpuoeQPghrs3YNktfnqOVh.jpg'),
(24428, 'The Avengers', 'When an unexpected enemy emerges and threatens global safety and security, Nick Fury, director of the international peacekeeping agency known as S.H.I.E.L.D., finds himself in need of a team to pull the world back from the brink of disaster. Spanning the globe, a daring recruitment effort begins!', '/RYMX2wcKCBAr24UyPD7xwmjaTn.jpg'),
(75624, 'Naruto Shippuden the Movie: Blood Prison', 'After his capture for attempted assassination of the Raikage, leader of Kumogakure, as well as killing Jōnin from Kirigakure and Iwagakure, Naruto is imprisoned in Hōzukijou: A criminal containment facility known as the Blood Prison. Mui, the castle master, uses the ultimate imprisonment technique to steal power from the prisoners, which is when Naruto notices his life has been targeted. Thus begins the battle to uncover the truth behind the mysterious murders and prove Naruto\'s innocence.', '/4WT7zYFpe0fsbg6TitppiHddWAh.jpg'),
(109445, 'Frozen', 'Young princess Anna of Arendelle dreams about finding true love at her sister Elsa’s coronation. Fate takes her on a dangerous journey in an attempt to end the eternal winter that has fallen over the kingdom. She\'s accompanied by ice delivery man Kristoff, his reindeer Sven, and snowman Olaf. On an adventure where she will find out what friendship, courage, family, and true love really means.', '/kgwjIb2JDHRhNk13lmSxiClFjVk.jpg'),
(157336, 'Interstellar', 'The adventures of a group of explorers who make use of a newly discovered wormhole to surpass the limitations on human space travel and conquer the vast distances involved in an interstellar voyage.', '/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg'),
(246403, 'Tusk', 'When his best friend and podcast co-host goes missing in the backwoods of Canada, a young guy joins forces with his friend\'s girlfriend to search for him.', '/pA2SgITmH0lzet9Nn5cxeinRKMv.jpg'),
(268896, 'Pacific Rim: Uprising', 'It has been ten years since The Battle of the Breach and the oceans are still, but restless. Vindicated by the victory at the Breach, the Jaeger program has evolved into the most powerful global defense force in human history. The PPDC now calls upon the best and brightest to rise up and become the next generation of heroes when the Kaiju threat returns.', '/v5HlmJK9bdeHxN2QhaFP1ivjX3U.jpg'),
(290859, 'Terminator: Dark Fate', 'Decades after Sarah Connor prevented Judgment Day, a lethal new Terminator is sent to eliminate the future leader of the resistance. In a fight to save mankind, battle-hardened Sarah Connor teams up with an unexpected ally and an enhanced super soldier to stop the deadliest Terminator yet.', '/vqzNJRH4YyquRiWxCCOH0aXggHI.jpg'),
(294963, 'Bone Tomahawk', 'During a shootout in a saloon, Sheriff Hunt injures a suspicious stranger. One of the villagers takes care of him in prison. One day they both disappear – only the spear of a cannibal tribe is found. Hunt and a few of his men go in search of the prisoner and his nurse.', '/4MmTHpn2Y8emqvBgvOjufImUmKZ.jpg'),
(335984, 'Blade Runner 2049', 'Thirty years after the events of the first film, a new blade runner, LAPD Officer K, unearths a long-buried secret that has the potential to plunge what\'s left of society into chaos. K\'s discovery leads him on a quest to find Rick Deckard, a former LAPD blade runner who has been missing for 30 years.', '/gajva2L0rPYkEWjzgFlBXCAVBE5.jpg'),
(346910, 'The Predator', 'When a kid accidentally triggers the universe\'s most lethal hunters\' return to Earth, only a ragtag crew of ex-soldiers and a disgruntled female scientist can prevent the end of the human race.', '/wMq9kQXTeQCHUZOG4fAe5cAxyUA.jpg'),
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
(493922, 'Hereditary', 'When Ellen, the matriarch of the Graham family, passes away, her daughter\'s family begins to unravel cryptic and increasingly terrifying secrets about their ancestry.', '/lHV8HHlhwNup2VbpiACtlKzaGIQ.jpg'),
(496243, 'Parasite', 'All unemployed, Ki-taek\'s family takes peculiar interest in the wealthy and glamorous Parks for their livelihood until they get entangled in an unexpected incident.', '/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg'),
(518764, 'Animal World', 'Drifting aimlessly through life, Kaisi (Li Yi Feng) has racked up debts of several million having borrowed money from his friends. Lured with the promise of writing it all off, Kaisi leaves his ailing mother and childhood sweetheart Qing (Zhou Dongyu) to board the ship Destiny and attend a gambling party controlled by the mysterious Anderson (Michael Douglas).  All players join the game with stars. For each game they lose, their opponent captures a star. Everyone is holding daggers behind their backs plotting dirty means by which to overcome their opponents. The game quickly deteriorates into a slaughter and Kaisi must battle save his own skin…', '/kxc25B05Gq4CbCoWbyTFf9iF0wn.jpg'),
(520725, 'The Lost Prince', 'Djibi lives alone with Sofia, his 8-year-old daughter. Every night, he invents a story to put him to sleep. When Sofia falls asleep, these extraordinary stories come to life somewhere in an imaginary world inhabited by knights, pirates and other dragons. In this world that belongs only to them, Sofia is always the princess to save, and the brave Prince is none other than Djibi himself.  But 3 years later, the entry of Sofia to the college will mark the end of her childhood. To the despair of her father, she no longer needs her stories at night. On the one hand, Djibi will have to accept that his daughter will grow up and move away from him. On the other hand, in the World of Stories, the Prince will have to face the most epic of all his adventures. Find your destiny in a world where it no longer has a place.', '/iFcSfoMu9hQIX4t0CxIkDJKgIES.jpg'),
(528085, '2067', 'A lowly utility worker is called to the future by a mysterious radio signal, he must leave his dying wife to embark on a journey that will force him to face his deepest fears in an attempt to change the fabric of reality and save humankind from its greatest environmental crisis yet.', '/7D430eqZj8y3oVkLFfsWXGRcpEG.jpg'),
(530915, '1917', 'At the height of the First World War, two young British soldiers must cross enemy territory and deliver a message that will stop a deadly attack on hundreds of soldiers.', '/iZf0KyrE25z1sage4SYFLCCrMi9.jpg'),
(531299, 'Kill Chain', 'A hotel room shootout between two assassins kicks off a long night where bodies fall like dominoes, as we follow a chain of crooked cops, gangsters, hitmen, a femme Fatale and an ex-mercenary through a relay of murder, betrayal, revenge and redemption.', '/wy0Xs5mGtD92PyKvsl0lxzbzscG.jpg'),
(531876, 'The Outpost', 'A small unit of U.S. soldiers, alone at the remote Combat Outpost Keating, located deep in the valley of three mountains in Afghanistan, battles to defend against an overwhelming force of Taliban fighters in a coordinated attack. The Battle of Kamdesh, as it was known, was the bloodiest American engagement of the Afghan War in 2009 and Bravo Troop 3-61 CAV became one of the most decorated units of the 19-year conflict.', '/hPkqY2EMqWUnFEoedukilIUieVG.jpg'),
(550440, 'Timmy Failure: Mistakes Were Made', 'An 11-year old boy believes that he is the best detective in town and runs the agency Total Failures with his best friend, an imaginary 1,200 pound polar bear.', '/9Ic99kyJewgPHwl4JftJSwzUmtD.jpg'),
(552687, 'Wotakoi: Love is Hard for Otaku', 'An effervescent musical about one of the most unlikely couples seen on screen: two Otaku intent on hiding their nerdiness from their colleagues!', '/9JV0LOcazudqEcz2NNOMqEIzACz.jpg'),
(560050, 'Over the Moon', 'A girl builds a rocket to travel to the moon in hopes of meeting the legendary Moon Goddess.', '/lQfdytwN7eh0tXWjIiMceFdBBvD.jpg'),
(575417, 'On the Rocks', 'Faced with sudden doubts about her marriage, a young New York mother teams up with her larger-than-life playboy father to tail her husband.', '/fcijRCmB7yTtloh4Pumy9b1rkwU.jpg'),
(576393, 'Fall in Love at First Kiss', 'After an earthquake destroys Xiang Qin\'s house, she and her father move in with the family of her father\'s college buddy. To her surprise, her new kind and amicable aunt and uncle are the parents of her cold and distant schoolmate, Jiang Zhi Shu, a genius with an IQ of 200 whom not too long ago rejected her when she confessed her feelings for him. Will the close proximity give her a second chance to win Zhi Shu\'s heart? Or will her love for him end under his cold words?', '/nMNVfz2bmcgj9Du0wywVHjbRIsz.jpg'),
(577922, 'Tenet', 'Armed with only one word - Tenet - and fighting for the survival of the entire world, the Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.', '/k68nPLbIST6NP96JmTxmZijEvCA.jpg'),
(594718, 'Sputnik', 'At the height of the Cold War, a Soviet spacecraft crash lands after a mission gone awry, leaving the commander as its only survivor. After a renowned Russian psychologist is brought in to evaluate the commander’s mental state, it becomes clear that something dangerous may have come back to Earth with him…', '/eAUzmhP54bE1vPXaY7FbuZREJlR.jpg'),
(604578, 'Spontaneous', 'When students in their high school begin inexplicably exploding (literally), seniors Mara and Dylan struggle to survive in a world where each moment may be their last.', '/tewRFdur9P7P5yk9FQJPwSTR55t.jpg'),
(618353, 'Batman: Death in the Family', 'Tragedy strikes the Batman\'s life again when Robin Jason Todd tracks down his birth mother only to run afoul of the Joker. An adaptation of the 1988 comic book storyline of the same name.', '/k8Q9ulyRE8fkvZMkAM9LPYMKctb.jpg'),
(622855, 'Jingle Jangle: A Christmas Journey', 'An imaginary world comes to life in a holiday tale of an eccentric toymaker, his adventurous granddaughter, and a magical invention that has the power to change their lives forever.', '/5RbyHIVydD3Krmec1LlUV7rRjet.jpg'),
(627290, 'Antebellum', 'Successful author Veronica finds herself trapped in a horrifying reality and must uncover the mind-bending mystery before it\'s too late.', '/irkse1FMm9dWemwlxKJ7RINT9Iy.jpg'),
(630566, 'Clouds', 'Young musician Zach Sobiech discovers his cancer has spread, leaving him just a few months to live. With limited time, he follows his dream and makes an album, unaware that it will soon be a viral music phenomenon.', '/2YvT3pdGngzpbAuxamTz4ZlabnT.jpg'),
(631939, 'Legionnaire\'s Trail', 'Noreno, a half-Roman, is entrusted with the mission of crossing the snowy mountains of Armenia, swarming with Parthian patrols, to seek help for his slowly dying men.', '/tKifV12YHiIxVH5z8NiGu0BCYRf.jpg'),
(634524, 'Badland', 'Detective Matthias Breecher, hired to track down the worst of the Confederate war criminals, roams the Old West seeking justice. His resolve is tested when he meets a determined pioneer woman who is far more than she seems.', '/217ddlMrnXll436baw7y5ERmz3x.jpg'),
(640882, '3022', 'A group of astronauts living in the haunting emptiness of deep space awakens to find earth has suffered an extinction-level event.', '/dp1brl24LXGFU3JPFaDoljDONRz.jpg'),
(689249, 'Money Heist: The Phenomenon', 'A documentary on why and how \'Money Heist\' sparked a wave of enthusiasm around the world for a lovable group of thieves and their professor.', '/AboUXTrDWEi0PuZUqaft0iwBTm7.jpg'),
(698410, 'Adventures of Rufus: The Fantastic Pet', 'At his grandmother\'s house, Scott and his friend Emily meet Rufus, a swashbuckling, furry creature who begs them to help restore his fading kingdom. Wizard Abbott\'s spell book contains the magic healing formula--but Abbott\'s ancient nemesis Lilith, posing as Grandmother\'s servant, wants the book, too! In this hilarious, high-flying family adventure, Scott and Emily must confront a gigantic alligator, a vicious dinosaur skeleton, a ruthless owl, and a fire-breathing dragon to rescue Rufus\' magical world.', '/hF5AFDTWEqECQEvqOsFG2FQ6DJM.jpg'),
(703771, 'Deathstroke: Knights & Dragons - The Movie', 'Ten years ago, Slade Wilson-aka the super-assassin called Deathstroke-made a tragic mistake and his wife and son paid a terrible price. Now, a decade later, Wilson\'s family is threatened once again by the murderous Jackal and the terrorists of H.I.V.E. Can Deathstroke atone for the sins of the past-or will his family pay the ultimate price?', '/vFIHbiy55smzi50RmF8LQjmpGcx.jpg'),
(704264, 'Primal: Tales of Savagery', 'Genndy Tartakovsky\'s Primal: Tales of Savagery features a caveman and a dinosaur on the brink of extinction. Bonded by tragedy, this unlikely friendship becomes the only hope of survival.', '/osBa5SDOCyk8DzLcy8Qa3bdwUXu.jpg'),
(722603, 'Battlefield 2025', 'Weekend campers, an escaped convict, young lovers and a police officer experience a night of terror when a hostile visitor from another world descends on a small Arizona town.', '/w6e0XZreiyW4mGlLRHEG8ipff7b.jpg'),
(724989, 'Hard Kill', 'The work of billionaire tech CEO Donovan Chalmers is so valuable that he hires mercenaries to protect it, and a terrorist group kidnaps his daughter just to get it.', '/ugZW8ocsrfgI95pnQ7wrmKDxIe.jpg'),
(726664, 'Fearless', 'A teen gamer is forced to level up to full-time babysitter when his favorite video game drops three superpowered infants from space into his backyard.', '/5oQJ6HeNGWnEtP9Qyt5IZjuKI7j.jpg'),
(733491, 'They Live Inside Us', 'Seeking inspiration for a new writing project, a man spends Halloween night in a notoriously haunted house. He soon realizes he is living in his own horror story.', '/1GJLLFlUaPEok4y8TXk5erbryt9.jpg'),
(738215, 'Barbie: Princess Adventure', 'With new friends in a new kingdom, Barbie learns what it means to be herself when she trades places with a royal lookalike in this musical adventure.', '/AwkmMTKJBAatbeAVhTwhcU3Pyp4.jpg'),
(741067, 'Welcome to Sudden Death', 'Jesse Freeman is a former special forces officer and explosives expert now working a regular job as a security guard in a state-of-the-art basketball arena. Trouble erupts when a tech-savvy cadre of terrorists kidnap the team\'s owner and Jesse\'s daughter during opening night. Facing a ticking clock and impossible odds, it\'s up to Jesse to not only save them but also a full house of fans in this highly charged action thriller.', '/elZ6JCzSEvFOq4gNjNeZsnRFsvj.jpg'),
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
(385687, 53),
(531299, 53),
(741067, 28),
(741067, 53),
(741067, 12),
(741067, 18),
(594718, 878),
(594718, 18),
(594718, 27),
(518764, 18),
(518764, 28),
(518764, 12),
(518764, 53),
(518764, 9648),
(518764, 14),
(13597, 12),
(13597, 10751),
(13597, 14),
(991, 18),
(991, 878),
(62, 878),
(62, 9648),
(62, 12),
(634524, 37),
(493922, 27),
(493922, 9648),
(493922, 53),
(631939, 28),
(631939, 12),
(631939, 36),
(640882, 878),
(703771, 16),
(703771, 28),
(294963, 27),
(294963, 37),
(294963, 36),
(636, 18),
(636, 9648),
(636, 878),
(11864, 18),
(11864, 878),
(9278, 878),
(9425, 28),
(9425, 878),
(185, 878),
(185, 18),
(78, 878),
(78, 18),
(78, 53),
(600, 18),
(600, 10752),
(346910, 878),
(346910, 28),
(346910, 53),
(346910, 12),
(346910, 27),
(346910, 35),
(19995, 28),
(19995, 12),
(19995, 14),
(19995, 878);

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
(447, 16, 246403, '2020-11-24', 10),
(448, 16, 531299, '2020-11-24', 1),
(449, 16, 671, '2020-11-24', 2),
(450, 16, 741067, '2020-11-24', 5),
(451, 16, 13597, '2020-11-25', 10),
(452, 16, 991, '2020-11-25', 10),
(453, 16, 531876, '2020-11-25', 1),
(454, 16, 62, '2020-11-25', 10),
(457, 16, 493922, '2020-12-05', 2),
(459, 13, 640882, '2020-12-06', 9),
(460, 13, 703771, '2020-12-06', 10),
(461, 13, 294963, '2020-12-06', 8),
(463, 17, 62, '2020-12-07', 10),
(464, 17, 636, '2020-12-07', 8),
(465, 17, 11864, '2020-12-07', 10),
(469, 6, 600, '2020-12-08', 8),
(470, 6, 346910, '2020-12-08', 8),
(471, 6, 19995, '2020-12-08', 5),
(472, 6, 62, '2020-12-08', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tmdbID` int(11) NOT NULL,
  `reviewDate` date NOT NULL DEFAULT current_timestamp(),
  `review` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `userID`, `tmdbID`, `reviewDate`, `review`) VALUES
(1, 16, 671, '2020-11-24', 'Trash.'),
(2, 16, 741067, '2020-11-24', 'Haven\'t actually seen this but I\'m reviewing it.'),
(3, 16, 13597, '2020-11-25', 'I almost found myself rooting for the antagonist. How did he do that with the crystal ball!?'),
(4, 16, 991, '2020-11-25', 'Don\'t remember much of this one... kind of like the recording of Ziggy Stardust'),
(5, 16, 531876, '2020-11-25', '400 years after the destruction of the ring, Legolas makes imperial propaganda for the humans.'),
(6, 16, 62, '2020-11-25', 'It\'s full of 10 stars'),
(9, 16, 493922, '2020-12-05', 'It insists upon itself.'),
(11, 13, 640882, '2020-12-06', 'I\'m not a real reviewer! Feel free to delete this!'),
(12, 13, 703771, '2020-12-06', 'So sick!'),
(13, 13, 294963, '2020-12-06', 'Whoa buddy'),
(19, 17, 62, '2020-12-07', 'Understands that space is silent, +1 science point'),
(20, 17, 636, '2020-12-07', 'Really cool sets'),
(21, 17, 11864, '2020-12-07', 'Inspiration for zoidberg?'),
(23, 6, 346910, '2020-12-08', 'Classic'),
(24, 6, 19995, '2020-12-08', 'Cartoon?'),
(25, 6, 62, '2020-12-08', 'Loved Arthur C Clarke as a teenager, great movie/book pair');

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
(6, 7, 'friends'),
(6, 8, 'pending1'),
(6, 13, 'pending1'),
(6, 14, 'pending1'),
(6, 15, 'pending1'),
(6, 16, 'pending1'),
(6, 17, 'pending1'),
(7, 13, 'pending1'),
(7, 14, 'pending1'),
(8, 13, 'pending1'),
(9, 13, 'pending1');

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
(9, 'nluginbill4@gmail.com', 'nluginbill4', '$2y$10$JT.iAHVKwZo11i9P8dp0ceGyq3NA830sJofk3svq2RZ9UVJnzOV8.', './img/nluginbill4sprinter.jpg'),
(13, 'jsmith@aol.com', 'jsmith', '$2y$10$JN3NeYNAR4Hd18dzf704GeeJhQBLOMZQSkGq2NWJLstSuwBzTbgJ2', './img/jsmithdownload.jpg'),
(14, 'asmith@aol.com', 'asmith', '$2y$10$IF5xpsWB4IKdnR6OXe3Uve69dWTuin3h3ZRtTxC/dAY3JkpG1kyfu', './img/asmithmovieclubpropic.jpg'),
(15, 'bsmith@aol.com', 'bsmith', '$2y$10$nZ6kzU/3dIo.5t4HHIlrHe8jnCLJudqhC2yZqLQ3626LJnxvdJjCm', './img/bsmithmovieclubpropic.jpg'),
(16, 'dbowie@gmail.com', 'dbowie', '$2y$10$ZLk6DzWYy7gip/V6BsWcz./5MQR6m.zai7DD/ciz4XojFA4w7BC8u', './img/dbowiebowie.jpg'),
(17, 'scifiguy@gmail.com', 'scifiguy', '$2y$10$UkUY6hpnamDgt8E8thtjVetrEtpSby5SdBCfGxno2AHAIQ/Jw3S5e', './img/scifiguyscifiguy.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `fk_favorites_users` (`userID`),
  ADD KEY `fk_favorites_movies` (`tmdbID`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `fk_review_user` (`userID`),
  ADD KEY `fk_review_movie` (`tmdbID`);

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
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_favorites_movies` FOREIGN KEY (`tmdbID`) REFERENCES `movies` (`tmdbID`),
  ADD CONSTRAINT `fk_favorites_users` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

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

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_review_movie` FOREIGN KEY (`tmdbID`) REFERENCES `movies` (`tmdbID`),
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
