-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 10:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(250) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `details` varchar(5000) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `mail`, `image`, `title`, `description`, `status`, `details`, `reg_date`) VALUES
(17, 'divi21146@gmail.com', '6457303b36331-download (3).jpg', 'Label element', 'At this point, we are done. But there is one more glitch to fix.', 'later', 'Dogs are among the most popular pets in the world. They are known for their loyalty, companionship, and playful nature. Dogs have been domesticated for thousands of years, and their bond with humans has only grown stronger over time. These animals come in many breeds, each with its own unique characteristics and traits. Some dogs are small and can easily be kept in an apartment, while others are larger and require more space to move around.\r\n\r\nOne of the main reasons people love dogs is their ability to form strong bonds with their owners. These bonds are built on trust, affection, and a sense of belonging. Dogs are social creatures and thrive on human interaction. They are always eager to please their owners and will go to great lengths to make them happy.\r\n\r\nAnother reason why dogs are so popular is their versatility. They can be trained to do a wide range of tasks, from herding livestock to serving as therapy animals. Many dogs are also used in law enforcement and search and rescue operations. Their keen sense of smell and hearing make them valuable assets in these fields.\r\n\r\nDespite their many positive qualities, owning a dog is not without its challenges. Dogs require a lot of care and attention, including regular exercise, grooming, and veterinary check-ups. They can also be expensive, with food, toys, and medical bills adding up over time. However, for many people, the rewards of owning a dog far outweigh the challenges.\r\n\r\nIn conclusion, dogs are beloved pets for millions of people around the world. Their loyalty, playful nature, and versatility make them excellent companions and working animals. While they do require a lot of care and attention, the bond that they form with their owners is often worth the effort.', '2023-05-07'),
(19, 'renu@gmail.com', '64575fe6533d1-tree.jpg', 'Tree', 'Lets talk about tree', 'Nature', 'Trees are Natures bounty. Trees are of many different kinds. There are flowering trees, which bear blossoms, and non-flowering ones, which do not bloom into flowers. There are evergreen trees, which stay green through the year. There are also deciduous ones which may shed their leaves during a particular season annually making their branches turn bare. Trees make landscapes beautiful. Trees are invaluable to man and terrestrial life forms. Trees maintain ecological balance and equilibrium. Trees must be protected. The felling of trees must be prevented. Tree plantation activities must be encouraged to make our environment green, beautiful and healthy.\r\n\r\nYou will find here below a number of long and short paragraph on Trees of varying word lengths. We hope these paragraphs on Trees will help students in completing their school assignments. These will also help children write and read out paragraphs in simple words and with small sentences. Students can select any paragraph on Trees according to their particular requirement.', '2023-05-07'),
(20, 'renu@gmail.com', '645760db5d89b-radha.jpg', 'Lord Krishna', 'Krishna is worshipped as the eighth avatar of Vishnu.', 'God', 'Lord Krishna is one of the incarnations of Lord Vishnu. He was born about 5200 years ago on the 8th day of the dark fortnight in the Bhadon month of the Hindu calendar. He is considered as an extremely powerful god. He was born on the Earth with a special purpose of freeing it from the evil clasps. He had a profound influence in the epic, Mahabharata, where he took Pandavas side and guided them to victory in the battle of Kurukshetra. Throughout his life, he preached the concept of Bhakti and Karma. \r\n\r\n\r\nLord Krishna was born in jail since his parents were kept in prison by his uncle Kansha. Kansha feared that the eighth child of their parents would kill him. Although Krishna was the eighth child, his father Vasudev saved him from Kansha by giving him his friend Nand. Krishna grew up in the Gokul society by his foster father, Nand, and foster mother, Yashoda. He showed several magical performances by killing several asuras throughout his childhood and youth, and he grew up to be a strong person. Finally, he and his brother Balaram went to Kansas palace for a fighting tournament, where Krishna killed Kansha. ', '2023-05-07'),
(21, 'renu@gmail.com', '64576141c6289-bridge.jpg', 'Bridge', 'If want to go other side of the road the bridges helps.', 'Daily life', 'A bridge is a structure to cross an open space or gap. Bridges are mostly made for crossing rivers, valleys, or roads. Nowadays most big bridges are made to carry vehicles but people have also walked across bridges for thousands of years. Bridges called highway overpasses carry a road over another road.\r\n\r\nMilitary bridges are portable, so that they may be easily moved to where they are needed. This makes them much more complex than most civilian bridges.', '2023-05-07'),
(22, 'renu@gmail.com', '645762d8ec766-fall.jpg', 'Waterfall', 'A white, frothy cascade of water falling into a plunge pool.', 'Nature', 'A waterfall is a place where water rushes down a steep ledge. The water flows from higher land, then it falls down a big step of rock to lower land of softer rock where it will continue on its journey. Usually the lower land is in a gorge. Waterfalls are usually made when a river is young, in places where softer rock is underneath harder rock in the waterfalls.\r\n\r\nMany people like to visit waterfalls. The roar from a big waterfall is very loud. Some people think it is beautiful music and that a waterfall is one of the most beautiful things in nature.', '2023-05-07'),
(23, 'divi21146@gmail.com', '645763ba7b0a3-drop.jpg', 'Drop', 'The term droplet is a diminutive form of drop.', 'Water', 'A drop or droplet is a small column of liquid, bounded completely or almost completely by free surfaces. A drop may form when liquid accumulates at the lower end of a tube or other surface boundary, producing a hanging drop called a pendant drop. Drops may also be formed by the condensation of a vapor or by atomization of a larger mass of solid. Water vapor will condense into droplets depending on the temperature. The temperature at which droplets form is called the dew point.', '2023-05-07'),
(24, 'divi21146@gmail.com', '645764d10c796-flower.jpg', 'Flower', 'Every time I see these blooms,mind is thinking of you.', 'Nature', 'Flowers carry a lot of importance in our lives. In India, no worship of God is complete without some kind of flower. Devotees make a garland of flowers to dedicate it to God. In addition, we also use flowers for special occasions like weddings.\r\n\r\nThe bride and groom wear garlands of flowers to signify their marriage. In addition, flowers smell so good that we use it in different places by planting them in our garden. This way, the beauty of our place enhances.\r\n\r\nFlowers carry importance in each nook and corner of the world. They also come in use for making medicines. Similarly, we also make difference in fragrance perfumes from the flowers. Further, the butterflies, birds and bees take the flowers as food.', '2023-05-07'),
(25, 'divi21146@gmail.com', '64576594cbdbd-rain.jpg', 'Rain Drops', 'Rain is beautiful and has many good effects on nature.', 'Nature', 'Rainy days are loved by almost everyone. The children love to play in rain; elders like to just look at its beauty from behind the windows. Farmers love it too, for it brings fertility and better yield. Animals depend on natural water reserves to meet their everyday requirements. Rains fill these reserves, making sure that there remains ample water for the animals.\r\n\r\nRain is a beautiful gift of nature to mother earth and her inhabitants. Without rain, there would be no life and people would run looking for water and food. Though you may not sense it, rain is more important than it seems. Imagine a year without rain and the consequences would scare you. Rain is so very essential for sustaining life that even a single rainy day looks like a new lease of life.', '2023-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(250) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `number` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `reg_date` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `mail`, `password`, `confirm_password`, `number`, `address`, `reg_date`) VALUES
(1, 'Divya', 'divi21146@gmail.com', '12', '12', 9876543210, 'Siruganur', 2023),
(3, 'Renu', 'renu@gmail.com', '12', '12', 9876543987, 'Siruganur', 2023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
