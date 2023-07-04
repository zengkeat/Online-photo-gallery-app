-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2023 at 10:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-photo-gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userid`, `postid`) VALUES
(505, 17, 150),
(124, 23, 141),
(126, 15, 141),
(127, 24, 141),
(135, 17, 132),
(167, 15, 151),
(300, 23, 151),
(176, 26, 151),
(180, 26, 132),
(183, 26, 147),
(185, 17, 147),
(191, 23, 147),
(193, 24, 147),
(257, 25, 147),
(258, 25, 132),
(278, 25, 154),
(262, 25, 141),
(269, 25, 144),
(281, 25, 151),
(267, 25, 150),
(268, 25, 152),
(274, 25, 158),
(276, 25, 143),
(277, 25, 156),
(297, 25, 124),
(282, 25, 153),
(317, 29, 166),
(310, 17, 124),
(307, 17, 129),
(295, 17, 131),
(298, 23, 124),
(299, 23, 150),
(301, 24, 124),
(303, 17, 139),
(305, 17, 134),
(314, 17, 133),
(319, 23, 189),
(320, 26, 134),
(321, 26, 192),
(322, 26, 194),
(323, 26, 187),
(324, 26, 189),
(326, 26, 185),
(327, 26, 184),
(328, 26, 179),
(329, 26, 180),
(330, 26, 178),
(331, 26, 171),
(332, 26, 172),
(333, 25, 134),
(334, 25, 133),
(335, 25, 155),
(336, 25, 171),
(337, 25, 172),
(338, 25, 178),
(339, 25, 179),
(340, 25, 180),
(341, 25, 176),
(342, 25, 175),
(343, 25, 177),
(344, 25, 184),
(345, 25, 191),
(346, 25, 190),
(347, 24, 191),
(348, 24, 192),
(349, 24, 194),
(350, 24, 195),
(351, 24, 185),
(352, 24, 186),
(353, 24, 182),
(354, 24, 181),
(355, 24, 179),
(356, 24, 176),
(357, 24, 173),
(358, 24, 174),
(359, 24, 170),
(360, 24, 169),
(361, 24, 168),
(362, 24, 153),
(363, 24, 151),
(364, 24, 166),
(365, 24, 164),
(366, 24, 132),
(367, 24, 130),
(368, 24, 144),
(369, 24, 143),
(370, 24, 159),
(371, 24, 160),
(372, 24, 161),
(373, 24, 158),
(374, 24, 156),
(375, 16, 187),
(376, 16, 188),
(377, 16, 189),
(378, 16, 190),
(379, 16, 191),
(386, 16, 192),
(381, 16, 151),
(382, 16, 129),
(383, 16, 124),
(384, 16, 142),
(385, 16, 134),
(387, 16, 179),
(388, 16, 158),
(389, 16, 156),
(390, 16, 153),
(391, 16, 184),
(392, 16, 185),
(393, 16, 130),
(394, 16, 194),
(395, 16, 170),
(396, 16, 169),
(397, 16, 164),
(398, 16, 186),
(399, 16, 182),
(400, 16, 181),
(401, 15, 150),
(402, 15, 166),
(403, 15, 168),
(404, 15, 153),
(405, 15, 165),
(406, 15, 164),
(407, 15, 161),
(408, 15, 169),
(409, 15, 172),
(410, 15, 176),
(411, 15, 180),
(412, 15, 184),
(413, 15, 183),
(414, 15, 182),
(415, 15, 187),
(416, 15, 188),
(417, 15, 192),
(418, 15, 195),
(419, 15, 194),
(420, 27, 124),
(422, 27, 151),
(423, 27, 150),
(424, 27, 134),
(425, 27, 133),
(426, 27, 132),
(427, 27, 168),
(428, 27, 144),
(429, 27, 138),
(431, 27, 142),
(432, 27, 156),
(433, 27, 154),
(434, 27, 160),
(435, 27, 158),
(436, 27, 167),
(437, 27, 165),
(438, 27, 176),
(439, 27, 175),
(440, 27, 178),
(441, 27, 177),
(442, 27, 184),
(443, 27, 183),
(444, 27, 191),
(445, 27, 190),
(446, 27, 195),
(447, 27, 194),
(448, 28, 133),
(449, 28, 130),
(450, 28, 138),
(451, 28, 152),
(452, 28, 144),
(453, 28, 143),
(454, 28, 159),
(455, 28, 158),
(456, 28, 157),
(457, 28, 154),
(458, 28, 155),
(459, 28, 172),
(460, 28, 171),
(461, 28, 169),
(462, 28, 176),
(463, 28, 175),
(464, 28, 174),
(465, 28, 183),
(466, 28, 182),
(467, 28, 188),
(468, 28, 185),
(469, 28, 195),
(470, 28, 193),
(471, 26, 152),
(472, 26, 144),
(473, 26, 143),
(474, 26, 160),
(475, 26, 159),
(476, 26, 161),
(477, 26, 173),
(478, 26, 176),
(479, 26, 193),
(480, 26, 196),
(481, 26, 197),
(482, 26, 195),
(483, 26, 167),
(484, 25, 196),
(485, 25, 197),
(486, 25, 194),
(487, 17, 153),
(488, 17, 152),
(489, 17, 144),
(490, 17, 155),
(491, 17, 156),
(492, 17, 157),
(493, 23, 167),
(494, 23, 165),
(495, 23, 181),
(496, 23, 180),
(497, 23, 179),
(498, 23, 178),
(499, 23, 187),
(500, 23, 190),
(501, 23, 197),
(502, 23, 195),
(503, 23, 194),
(506, 17, 194);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `file` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `categories` varchar(200) NOT NULL,
  `captions` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `title`, `description`, `file`, `timestamp`, `likes`, `categories`, `captions`) VALUES
(124, 'Giam Zeng Keat', 'Dongyu', 'this is an beautiful women', 'dongyu.jpg', '2018-11-11 17:34:29', 6, 'people', '#mountain'),
(150, 'jonny depp', 'My flower', 'this is a blue flower', 'image-44901080-neon-flower-wallpapers.jpg', '2018-10-06 20:04:42', 6, 'plant', '#beautiful blue #flower'),
(129, 'giam', 'It always seems impossible until its done.', 'Dont talk, just act. Dont say, just show. Dont promise, just prove.', 'cinema 3.gif', '2018-10-07 10:54:19', 12, 'others', '#morning #coffe'),
(130, 'giam', 'nvest the now in tomorrows dream.', 'Marry the right person. This one decision will determine 90% of your happiness or misery.', 'c12.gif', '2018-10-06 20:04:29', 3, 'others', '#what'),
(132, 'giam', 'Some Girls want superman but walk past Clark kent every day!', 'Watch more sunsets than Netflix.', 'php slide3.jpg', '2018-10-06 20:03:27', 5, 'nature', '#what beautiful #view'),
(133, 'dongyu', 'Good things come to those who hustle.', 'this is a long long long long title for testing the text-overflow \r\nthis is a long long long long title for testing the text-overflow ', 'php slide1.jpg', '2018-10-06 20:03:24', 4, 'nature', '#kitten #view'),
(134, 'giam', 'If it doesnt challenge you, it doesnt change you.', 'Hey, I just met you, this is crazy.', 'php slide4.jpg', '2018-10-06 20:03:21', 5, 'nature', '#mountain'),
(138, 'Giam Zeng Keat', 'Do you sit in a pile of sugar? cause you got a pretty sweet ass!', 'I woke up like this.', 'peacock-plumage-bird-peafowl-45911.jpeg', '2018-10-06 20:03:16', 2, 'animal', '#dog #beautiful'),
(166, 'chenwu', 'Did you swallow magnets? cause you are attractive!', 'I must destroy you with hugs and kisses', 'chenwu.jpg', '2018-10-07 14:29:04', 3, 'people', 'chenwu is so #handsome #beautiful #update'),
(141, 'Giam Zeng Keat', 'Kiss me if Im wrong but Dinosaurs still exist? Right?', 'At least this balloon is attracted to me!', 'chip board.jpg', '2018-10-06 20:02:59', 4, 'abstract', '#mountain'),
(142, 'john snow', 'Nice t-shirt. Can I talk you out of it?Proof that I can do selfies better than you', 'Proof that I can do selfies better than you', 'download.gif', '2018-10-06 20:02:53', 5, 'others', '#mountain'),
(143, 'dongyu', 'I dont know whats tighter, our jeans or our friendship!', 'A friend will always make you Smile, especially when you don’t want to…', 'php slide3.jpg', '2018-10-06 20:02:48', 4, 'nature', '#what #peacock #peacock'),
(144, 'dongyu', 'im not perfect but I am Loyal.', 'Life is like a balloon..If you never let go, you will not know how high can you rise.', 'peacock-plumage-bird-peafowl-45911.jpeg', '2018-10-06 20:02:41', 6, 'animal', '#kitten #beautiful'),
(152, 'john snow', 'I love you. Thats all I know.', 'You cant afford my Swag Bitch! #selfie', 'download.gif', '2018-10-06 20:02:36', 5, 'others', '#kitten'),
(153, 'jonny depp', 'Nothing Can replace you!', 'Life isnt perfect But my Hair is! #selfieaddict', 'mountain4k.jpg', '2018-10-06 20:25:02', 5, 'nature', ' thi is a #peacock'),
(154, 'jonny depp', 'If you are Mine, You are Mine. I dont like Sharing', 'Always classy, never trashy, and a little bit sassy.', 'peacock-plumage-bird-peafowl-45911.jpeg', '2018-10-06 20:21:48', 3, 'animal', ' #peacock #bird'),
(155, 'jonny depp', 'It will be Always YOU.', 'Dont talk, just act. Dont say, just show. Dont promise, just prove.', 'peacock-plumage-bird-peafowl-45911.jpeg', '2018-10-06 03:55:55', 3, 'animal', '#peacock'),
(156, 'john snow', 'I want you to be happy, but I want you to be happy with Me.', 'Never stop doing great just because someone doesn’t give you credit.', 'mountain4k.jpg', '2018-10-06 20:02:14', 5, 'nature', '#what #peacock #peacock'),
(157, 'jonny depp', 'When I fell for you, I fell Hard', 'Be honest.', 'peacock-plumage-bird-peafowl-45911.jpeg', '2018-10-06 04:34:06', 2, 'animal', '#what this is so #beautiful'),
(158, 'john snow', 'If we could only turn back time', 'Know yourself, know your worth', 'chenwu.jpg', '2018-10-06 09:50:27', 5, 'people', 'this is a  #chenwu haha #handsome ewqewqewqeqweq'),
(159, 'jonny depp', 'The moment when she says youre cute.', 'Every time you see me I look like I hit the lotto twice', '4493378-hd-wallpapers-1080p.jpg', '2018-10-06 12:14:21', 3, 'abstract', 'this is so #amazing #beautiful'),
(160, 'john snow', 'The worst time to have a heart attack is during a game of charades.', 'Be self-starter.', 'cinema 5.gif', '2018-10-06 12:28:27', 3, 'others', 'qweqwe #fire'),
(164, 'dongyu', 'Today I will be as useless as letter g in lasagna.', 'If it doesnt challenge you, it doesnt change you.', 'cinema 3.gif', '2018-10-06 20:36:16', 3, 'others', 'good #coffe'),
(165, 'dongyu', 'this is a testing for captions ', 'All we want is hot hot boys boys boys', 'peacock-plumage-bird-peafowl-45911.jpeg', '2018-10-06 21:19:55', 3, 'animal', 'this is #beautiful peacock'),
(167, 'giam', 'this is the updated title testing', 'So baby raise a glass to mend all the broken hearts of all my wrecked up friends.', 'IMG_0047.JPG', '2023-07-04 21:02:46', 3, 'plant', '#flower #beautiful'),
(169, 'David', 'â€œYou only live onceâ€', 'â€œIf I die all i know is Iâ€™m a mothafuckinâ€™ legendâ€', 'download.gif', '2018-10-23 13:23:24', 4, 'people', 'this is a #glass'),
(170, 'Giam Zeng Keat', 'I love those who can smile in troubleâ€¦ Leonardo da Vinci', 'life is what happens when youâ€™re busy making other plans. John Lennon', 'pawel-czerwinski-1056851-unsplash.jpg', '2018-11-11 08:01:00', 2, 'others', '#plant #green and #vibrant'),
(171, 'Giam Zeng Keat', 'The purpose of life is to believe, to hope, and to strive. Indira Gandhi', 'Not how long, but how well you have lived is the main thing. Seneca', 'steve-halama-499000-unsplash.jpg', '2018-11-11 08:02:29', 3, 'others', '#building #smile'),
(172, 'enimem', 'wqeqwe', 'wqeqwe', 'caleb-george-536388-unsplash.jpg', '2018-11-11 08:36:48', 4, 'people', 'qweqwe'),
(173, 'enimem', 'qwedasda', 'qwedadsa', 'jimmy-chang-708722-unsplash.jpg', '2018-11-11 08:37:06', 2, 'people', 'dsadsada'),
(174, 'enimem', 'Find ecstasy in life; the mere sense of living is joy enough. Emily Dickinson', 'You have just one life to live. It is yours. Own it, claim it, live it, do the best you can with it. Hillary Clinton', 'gautier-salles-1141807-unsplash.jpg', '2018-11-11 12:13:40', 2, 'nature', 'view from the #sky'),
(175, 'enimem', 'Defeat is simply a signal to press onward. Helen Keller', 'Iâ€™ve failed over and over and over again in my life. And that is why I succeed. Michael Jordan', 'felix-mittermeier-700423-unsplash.jpg', '2018-11-11 12:14:22', 3, 'nature', 'tall green #tree '),
(176, 'enimem', 'hose who realize their folly are not true fools. Zhuangzi', 'the women ', 'dc-lovensky-1141501-unsplash.jpg', '2018-11-11 12:14:46', 6, 'people', '#beautiful women '),
(177, 'cardi B', 'It always seems impossible until itâ€™s done. Nelson Mandela', 'The first step is you have to say that you can. Will Smith', 'wade-lambert-676953-unsplash.jpg', '2018-11-11 12:15:43', 2, 'animal', 'african #lion roar'),
(178, 'cardi B', 'When angry, count to four; when very angry, swear. Mark Twain', 'When life gives you lemons, squirt someone in the eye. Cathy Guisewite', 'fachy-marin-1141135-unsplash.jpg', '2018-11-11 12:20:34', 4, 'animal', '#gooddest boy in the world'),
(179, 'cardi B', 'Life is pain. Anyone who says otherwise is selling something. William Goldman', 'Nobody can predict the future; the idea is to have a firm grasp of the present. Peter F. Drucker', 'jonathan-ford-545844-unsplash.jpg', '2018-11-11 12:20:59', 5, 'abstract', '#jonathan '),
(180, 'cardi B', 'Sometimes the questions are complicated and the answers are simple. Dr. Seuss', 'What do you want a meaning for? Life is a desire, not a meaning. Charlie Chaplin', 'tim-johnson-754969-unsplash.jpg', '2018-11-11 12:21:31', 4, 'abstract', '#black and #white'),
(181, 'cardi B', 'Lifeâ€™s too mysterious to take too serious. Mary Engelbreit Click to tweet', 'The chief danger in life is that you may take too many precautions. Alfred Adler', 'landovan-390576-unsplash.jpg', '2018-11-11 12:22:03', 3, 'people', '#women in the #white dress'),
(182, 'chenwu', 'When it hurts â€“ observe. Life is trying to teach you something. Anita Krizzan', 'If thereâ€™s a single lesson that life teaches us, itâ€™s that wishing doesnâ€™t make it so. Lev Grossman', 'steve-johnson-775369-unsplash.jpg', '2018-11-11 12:27:41', 4, 'abstract', 'the #blue and the #orange'),
(183, 'chenwu', 'Do what is right, not what is easy nor what is popular. Roy T. Bennett', 'the best picture in the world is the view ', 'seth-fink-574722-unsplash.jpg', '2018-11-11 12:28:17', 3, 'nature', '#amazing view '),
(184, 'chenwu', 'lucky four leaf flower', 'Life moves pretty fast. If you donâ€™t stop and look around once in a while you could miss it. Ferris Bueller', 'lawrence-kayku-974651-unsplash.jpg', '2018-11-11 12:29:16', 5, 'plant', '#lucky four love #flower'),
(185, 'chenwu', 'Good judgment comes from experience, and experience comes from bad judgment. Rita Mae Brown', 'playing chess', 'felix-mittermeier-700275-unsplash.jpg', '2018-11-11 12:29:48', 4, 'others', '#black and #white chess'),
(186, 'shelton', 'Love is of all passions the strongest, for it attacks simultaneously the head, the heart and the senses. Lao Tzu', 'view form the air plant is gorgeous', 'steve-halama-499000-unsplash.jpg', '2018-11-11 12:31:02', 2, 'others', '#bluesky and the amazing view'),
(187, 'shelton', 'Love is a better teacher than duty. Albert Einstein', 'Love does not dominate; it cultivates. Johann Wolfgang von Goethe', 'agung-pratamah-681558-unsplash.jpg', '2018-11-11 12:31:46', 4, 'nature', 'in the middle #tree'),
(188, 'shelton', 'A brother may not be a friend, but a friend will always be a brother. Benjamin Franklin', 'Friendship is unnecessary, like philosophy, like artâ€¦ It has no survival value; rather it is one of those things which give value to survival. C.S. Lewis', 'joshua-rawson-harris-781011-unsplash.jpg', '2018-11-11 12:32:24', 3, 'people', 'purple color #dress is gorgeous '),
(189, 'shelton', 'cat at the window', 'who doesnt love the cat at the window', 'wendy-aros-routman-1141049-unsplash.jpg', '2018-11-11 12:32:55', 3, 'animal', '#cutest cat in the world '),
(190, 'shelton', 'Happiness is only real when shared. Jon Krakauer', 'Each day of our lives we make deposits in the memory banks of our children. Charles R. Swindoll', 'jonathan-ford-545844-unsplash.jpg', '2018-11-11 12:34:03', 4, 'abstract', '#purple skull'),
(191, 'David beckam', 'It is not flesh and blood but the heart which makes us fathers and sons. Johann Schiller', 'The most important thing a father can do for his children is to love their mother. Theodore Hesburgh', 'fabien-bazanegue-537574-unsplash.jpg', '2018-11-11 12:35:04', 4, 'nature', '#yellow sign at the road'),
(192, 'David beckam', 'The worst part of success is trying to find someone who is happy for you. Bette Midler', '3 plant in a row', 'daniel-hjalmarsson-269425-unsplash.jpg', '2018-11-11 12:35:47', 4, 'plant', '#plant #treeplant'),
(193, 'David beckam', 'Try not to become a man of success. Rather become a man of value. Albert Einstein', 'Success is stumbling from failure to failure with no loss of enthusiasm. Winston S. Churchill', 'landovan-390576-unsplash.jpg', '2018-11-11 04:46:40', 2, 'others', '#stunning street view '),
(194, 'David beckam', 'All of life is peaks and valleys. Donâ€™t let the peaks get too high and the valleys too low. John Wooden', 'Have no fear of perfection â€“ youâ€™ll never reach it. Salvador Dali', 'julie-johnson-719955-unsplash.jpg', '2018-11-11 12:37:31', 8, 'others', '#art'),
(195, 'David beckam', 'I enjoy life when things are happening. I donâ€™t care if itâ€™s good things or bad things. That means youâ€™re alive. Joan Rivers', 'plant in the white background', 'pawel-czerwinski-1056851-unsplash.jpg', '2018-11-11 12:38:17', 6, 'plant', '#plant in the #white background'),
(199, 'giam', 'this is the testing post', 'testing to upload this post ', 'IMG_0087.JPG', '2023-07-04 12:04:28', 0, 'people', '#hand #plant #bracelet'),
(196, 'enimem', 'Lifeâ€™s under no obligation to give us what we expect. Margaret Mitchell', 'blowing burble', 'cinemagraph 2.gif', '2018-11-11 13:59:05', 2, 'people', '#girl with burble'),
(198, 'Giam Zeng Keat', 'Life is beautiful because it doesnâ€™t last. Brit Marling', 'cutest doggy', 'fachy-marin-1141135-unsplash.jpg', '2018-11-12 01:35:14', 0, 'animal', '#lovedog ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_picture`, `role`) VALUES
(23, 'Giam Zeng Keat', 'giamzengkeat@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'chenwu.jpg', 1),
(26, 'enimem', 'enimem@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'enimem.jpg', 0),
(25, 'cardi B', 'cardiB@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'cardi b.jpg', 1),
(24, 'jonny depp', 'jonny depp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'jonny depp.jpg', 1),
(17, 'giam', 'giam@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'landovan-390576-unsplash.jpg', 0),
(16, 'john snow', 'john snow@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'john snow.jpg', 1),
(15, 'dongyu', 'dongyu@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'dongyu.jpg', 1),
(27, 'chenwu', 'chenwu@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'chenwu.jpg', 1),
(28, 'shelton', 'shelton@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'shelton.jpg', 1),
(29, 'David beckam', 'david@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'david.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
