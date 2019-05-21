-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 21 May 2019, 01:12:11
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kelimelerproje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `istatistikler`
--

DROP TABLE IF EXISTS `istatistikler`;
CREATE TABLE IF NOT EXISTS `istatistikler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelime` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ogrenimdurumu` int(1) NOT NULL,
  `eklenmetarihi` varchar(10) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ogrenmetarihi` varchar(10) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `istatistikler`
--

INSERT INTO `istatistikler` (`id`, `kelime`, `ogrenimdurumu`, `eklenmetarihi`, `ogrenmetarihi`) VALUES
(160, 'attribute', 0, '2019-05-21', '2019-05-21'),
(159, 'barbarously', 4, '2019-05-21', '2019-08-21'),
(158, 'as good as', 0, '2019-05-21', '2019-05-21'),
(157, 'apple juice', 4, '2019-05-21', '2019-01-21'),
(156, 'battalion', 4, '2019-05-20', '2019-02-20'),
(155, 'bathroom', 0, '2019-05-20', '2019-05-20'),
(154, 'batch', 4, '2019-05-20', '2019-08-20'),
(153, 'artist', 0, '2019-05-21', '2019-05-20'),
(152, 'artless', 0, '2019-05-20', '2019-05-20'),
(151, 'as known', 4, '2019-05-20', '2019-10-20'),
(150, 'as if', 0, '2019-05-20', '2019-05-20'),
(149, 'artilleryman', 4, '2019-05-19', '2019-05-19'),
(148, 'caravan', 0, '2019-05-21', '2019-05-20'),
(147, 'apple', 4, '2019-05-21', '2026-04-20'),
(146, 'carbonate', 0, '2019-05-21', '2019-05-20'),
(145, 'apple cake', 0, '2019-05-21', '2019-05-20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kelimeler`
--

DROP TABLE IF EXISTS `kelimeler`;
CREATE TABLE IF NOT EXISTS `kelimeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelime` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kelimetipi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kelimeninturkcesi` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `cumle` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`) USING BTREE,
  UNIQUE KEY `kelime` (`kelime`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kelimeler`
--

INSERT INTO `kelimeler` (`id`, `kelime`, `kelimetipi`, `kelimeninturkcesi`, `cumle`) VALUES
(25, 'attributive', 'adjective', 'niteleyici', 'In fact, for centuries some of the most influential religions of Christendom have attributed personality to the holy spirit.'),
(26, 'atypical', 'adjective', 'değişik', 'That would be atypical android behavior.'),
(27, 'auctioneer', 'noun', 'açık artırmacı', 'I found the records of an auction.'),
(28, 'banshee', 'noun', 'ölüm perisi', 'The banshee let out a blood-curdling scream.'),
(29, 'banter', 'noun', 'şaka', 'Lucy was bantered by her grandparents.'),
(30, 'barbarian', 'adjective', 'barbar', 'Look under the skin of a civilized man and you will find a barbarian.'),
(32, 'barbecue', 'noun', 'barbekü', 'So we&#39;re gonna have a barbecue party. Tell your parents that my parents are gonna be there.'),
(33, 'barbed', 'adjective', 'dikenli', 'My coat got caught on a barb on the barbed wire.'),
(34, 'bat', 'noun', 'yarasa', 'I bet, tomorrow you&#39;ll find a bad bat in your bed'),
(37, 'baton', 'noun', 'cop', 'But just in case, our security teams will carry stun batons and restraints.'),
(39, 'battery', 'noun', 'pil', 'It doesn&#39;t work so well because the battery is low.'),
(40, 'battery life', 'noun', 'pil ömrü', 'This particular model has a really low battery life.'),
(41, 'battle axe', 'noun', 'Savaş baltası', 'If his battle axe hadn&#39;t cracked your brains would&#39;ve been the ones splattered in the dirt.'),
(42, 'battlefield', 'noun', 'savaş alanı', 'He would still be alive had he refused to go to the battlefield then.'),
(43, 'battleship', 'noun', 'savaş gemisi', 'Tom and Mary are playing battleship.'),
(44, 'be enough', 'verb', 'yetmek', 'I don&#39;t know if this will be enough.'),
(45, 'captured', 'verb', 'yakalanan', 'Please free the captured birds.'),
(46, 'car', 'noun', 'araba', 'I don&#39;t have an opportunity to get a new car.'),
(47, 'car crash', 'noun', 'araba kazası', 'His wife is in the hospital because she was injured in a car crash.'),
(49, 'caraway', 'noun', 'kimyon', 'I miss that venomous disposition and that heart the size of a caraway seed.'),
(51, 'carbonic', 'adjective', 'karbonik', 'Carbonic acid is a product of many chemical reactions.'),
(52, 'carcase', 'noun', 'leş', 'The Valley of Hinnom would then be called “the valley of slaughter,” where “the carcases of this people” would lie unburied.'),
(53, 'card', 'noun', 'kart', 'Tom and Mary played cards together all evening.'),
(54, 'card deck', 'noun', 'kart destesi', 'I bought a card deck.'),
(55, 'cardamom', 'noun', 'kakule', 'Rest it in a little red wine, and add crushed cardamom.'),
(56, 'cardboard', 'noun', 'karton', 'Tom carried the injured bat back to his house in a cardboard box.'),
(57, 'carefully', 'adverb', 'dikkatlice', 'Tom picked up one and looked at it carefully.'),
(58, 'careless', 'adverb', 'dikkatsiz', 'He may be clever, but he often makes careless mistakes.'),
(59, 'cargo ship', 'noun', 'Kargo gemisi', 'This is a cargo ship, not a passenger ship.'),
(60, 'carhop', 'noun', 'garson', 'You couldn&#39;t give up your little carhop.'),
(61, 'caricaturist', 'noun', 'karikatürist', 'I&#39; m the Cheers caricaturist'),
(62, 'carnage', 'noun', 'katliam', 'It escaped the carnage.'),
(63, 'carnal', 'adjective', 'bedensel', 'It&#39;s purely carnal, that&#39;s all you need to know.'),
(64, 'carousel', 'noun', 'atlıkarınca', 'Want to ride carousel?'),
(65, 'carpe diem', 'Proverb', 'anı yaşa', 'Carpe diem, as they say, and I want to dedicate myself to my little family.'),
(66, 'carpet', 'noun', 'halı', 'A green carpet won&#39;t go well with these blue curtains.'),
(67, 'carrot', 'noun', 'havuç', 'I&#39;ll give you the ice cream after you eat all the carrots.'),
(68, 'carton', 'noun', 'karton kutu', 'Tom took the eggs out of the carton one by one.'),
(69, 'cartridge', 'noun', 'fişek', 'I wanted to, but there are few occasions here for which it&#39;s worth wasting cartridges.'),
(70, 'father', 'noun', 'baba', 'Every night when you say a prayer, say a prayer for daddy.'),
(71, 'mad', 'adjective', 'deli', 'He is mad.'),
(72, 'dagger', 'noun', 'hançer', 'You must grip that dagger this way.'),
(73, 'daily', 'adverb', 'günlük', 'Sami was released and went about his daily life.'),
(74, 'damage', 'noun', 'zarar', 'The house did not suffer much damage because the fire was quickly put out.'),
(75, 'damp', 'noun', 'nem', 'The people who had the house before me said they damp-proofed it in the&#39;90s.'),
(76, 'dance', 'noun', 'dans', 'I feel like dancing whenever I hear this song.'),
(77, 'danger', 'noun', 'tehlike', 'I had difficulty convincing her of the dangers of smoking.'),
(78, 'dark', 'noun', 'karanlık', 'The place was empty. She was alone in the darkness, except for a cat hiding behind a box.'),
(79, 'darling', 'noun', 'sevgili', 'Do you want some breakfast, darling?'),
(80, 'data', 'noun', 'veri', 'All the elements of a data structure are public by default.'),
(81, 'delete', 'verb', 'silmek', 'Tom accidentally deleted all the files on one of his external hard disks.'),
(82, 'deliver', 'verb', 'teslim etmek', 'Amazon wants to use drones to deliver packages.'),
(83, 'demolish', 'verb', 'yıkmak', 'It took three weeks to demolish the old house.'),
(84, 'demon', 'noun', 'şeytan', 'You know, you used to be a demon hunter.'),
(85, 'eagle', 'noun', 'kartal', 'As the lion is king of beasts, so is the eagle king of birds.'),
(86, 'ear', 'noun', 'kulak', 'A rabbit has long ears and a short tail.'),
(87, 'earlier', 'adverb', 'daha önce', 'Tom came back from Boston a week earlier than we expected.'),
(88, 'early', 'adverb', 'erken', 'Is it all right if I leave early this afternoon?'),
(89, 'earn', 'verb', 'kazanmak', 'I wanted to earn some money, so I worked part time three days a week.'),
(90, 'earth', 'noun', 'toprak', 'The aardvark has powerful limbs and sharp claws so it can burrow into earth at high speed.'),
(91, 'earthquake', 'noun', 'deprem', 'In the near future, we may have a big earthquake in Japan.'),
(92, 'easy', 'adjective', 'kolay', 'Tom, your handwriting isn&#39;t very good, but it&#39;s easy to read.'),
(93, 'eat', 'verb', 'yemek', 'Tom and Mary went to get something to eat.'),
(94, 'echo', 'noun', 'yankı', 'His compositions represent the last echo of Renaissance music.'),
(95, 'eclipse', 'noun', 'tutulma', 'A lunar eclipse can be seen from anywhere on the night side of the earth.'),
(96, 'ecology', 'noun', 'ekoloji', 'From the standpoint of ecology, Antarctica should be reserved solely for research, not for tourism or for commercial exploration.'),
(97, 'economic', 'adjective', 'ekonomik', 'Along with this increase, there has been a change in the world&#39;s economic organization.'),
(98, 'edge', 'noun', 'kenar', 'Are you sure it&#39;s safe to stand that close to the edge of the cliff?'),
(99, 'edit', 'verb', 'düzenlemek', 'Editing letter is becoming a lost art.'),
(100, 'education', 'noun', 'eğitim', 'The quality of higher education must answer to the highest international standards.'),
(101, 'fat', 'adjective', 'şişman', 'Beth protested, but her mother reminded her that she was incredibly fat.'),
(102, 'fate', 'noun', 'kader', 'He stopped resisting, and resigned himself to his fate.'),
(103, 'fatigue', 'noun', 'bitkinlik', 'The sores will go away, as well as her fatigue and the muscle pain.'),
(104, 'fault', 'noun', 'hata', 'I kind of feel like it&#39;s my fault.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenilecekkelimeler`
--

DROP TABLE IF EXISTS `ogrenilecekkelimeler`;
CREATE TABLE IF NOT EXISTS `ogrenilecekkelimeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelime` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kelimetipi` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kelimeninturkcesi` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `cumle` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ogrenilentarih` varchar(10) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `kelime` (`kelime`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ogrenilecekkelimeler`
--

INSERT INTO `ogrenilecekkelimeler` (`id`, `kelime`, `kelimetipi`, `kelimeninturkcesi`, `cumle`, `ogrenilentarih`) VALUES
(226, 'attribute', 'noun', 'özellik', 'That&#39;s a rare attribute these days, sad to say', '2019-05-21'),
(225, 'barbarously', 'adverb', 'barbarca', 'I was betrayed and treated barbarically.', '2019-05-21'),
(224, 'as good as', 'adverb', 'hemen hemen', 'You&#39;re as good as I am, and I&#39;m as good as you are, ain&#39;t I?', '2019-05-21'),
(223, 'apple juice', 'noun', 'elma suyu', 'I poured myself a tall glass of apple juice.', '2019-05-21'),
(222, 'battalion', 'noun', 'tabur', 'The battalion surrendered to the enemy.', '2019-05-20'),
(221, 'bathroom', 'noun', 'banyo', 'An electric heater warms up the ceramic tiles of the bathroom floor.', '2019-05-20'),
(220, 'batch', 'noun', 'yığın', 'We thought of sending another batch, but there was nothing to send.', '2019-05-20'),
(219, 'artist', 'noun', 'sanatçı', 'The poor young man finally became a great artist.', '2019-05-20'),
(218, 'artless', 'adjective', 'açık sözlü', 'Ah, you make it sound so artless.', '2019-05-20'),
(217, 'as known', 'adverb', 'bilindiği üzere', 'It&#39;s someone quite well-known but not as well-known as that.', '2019-05-20'),
(216, 'as if', 'conjunction', 'sanki', 'It is not rare for girls today to talk as if they were boys', '2019-05-20'),
(215, 'artilleryman', 'noun', 'topçu neferi', 'A soldier enlisted in an artillery unit or who uses artillery.', '2019-05-19'),
(214, 'caravan', 'noun', 'karavan', 'A caravan of fifty camels slowly made its way through the desert.', '2019-05-20'),
(213, 'apple', 'noun', 'elma', 'Tom climbed over the fence and picked some apples from the tree.', '2019-05-20'),
(212, 'carbonate', 'noun', 'karbonat', 'Ammonium carbonate is an organic compound.', '2019-05-20'),
(211, 'apple cake', 'noun', 'elmalı pasta', 'No one can bake apple cake better than Emily.', '2019-05-20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
