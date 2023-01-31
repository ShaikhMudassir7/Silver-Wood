-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 03:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `aboutImage` varchar(200) NOT NULL,
  `aboutContent` text NOT NULL,
  `aboutCardTitle` varchar(199) NOT NULL,
  `aboutCards` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedOn` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `aboutImage`, `aboutContent`, `aboutCardTitle`, `aboutCards`, `createdOn`, `modifiedOn`) VALUES
(1, '5.jpg', '<p class=\"text-indent\">SILVERWOOD Villa is a modern &amp; upscale vacation villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests. We do ordinary things in an extraordinary way – a philosophy\n                        that has defined our brand’s success from the very start.</p>\n                    <p class=\"text-indent\">At SILVERWOOD, we embrace innovation to meet ever-changing guest needs. Our approach to service has remained consistent; warm, intuitive and personal.</p>\n                    <p class=\"text-indent\">We believe our purpose is to create impressions that will stay with you for a lifetime. It comes from our belief that life is richer when we truly connect to the people and the world around us.</p>\n                    <p class=\"text-indent\">From check in to check out and back again, it’s this blend of the indispensable, unexpected, and imperceptible that makes SILVERWOOD Villa a top choice among many, and a destination unto itself.</p>\n                    <p class=\"text-indent\">The primary goal of SILVERWOOD Villa is the complete fulfilment of the guests’ needs and wishes. Whether a business trip, a group stay or a corporate event, we will go the extra mile to make you feel comfortable. Because at SILVERWOOD, we want all our guests to feel totally at ease.</p>\n                    <p class=\"text-indent\">Join a movement of people seeking more than just great accommodation.</p>', 'Teamwork', 'We recognize that superlative performance is always the result of teamwork.', '2022-11-24 08:18:08', '2023-01-19 21:33:09'),
(2, '', '<p class=\"text-indent\">Behind the amenities and beyond the design details lies SILVERWOOD\'s signature service philosophy. At the ready before guests’ call, invisible when privacy is prized, it\'s an intuitive approach with very tangible advantages.</p>\n            <p class=\"text-indent\">Service starts with guest needs innovatively anticipated, then uniquely accommodated. Warmth is a given, discretion an essential. Options for personalizing and streamlining your stay abound, with preferences assured on return visits.</p>\n            <p class=\"text-indent\">With a mission to overlook no detail or desire, the entire SILVERWOOD staff is focused on delivering a seamless experience—for each guest and every request.</p>', 'Ownership', 'We always take responsibility for our actions.', '2022-11-24 08:18:08', '2022-11-24 09:06:19'),
(3, '', '<p class=\"text-indent text-justify\">At SILVERWOOD, we are a professional, passionate, caring and empowering company that encourages innovation and engagement. We are a learning organisation committed to the retention and development of our people as an essential\n                        part of building strong, respectful and enduring guest relationships. Our staff are motivated, friendly and obsessive about enhancing the guest experience through meeting and exceeding expectations for quality service.</p>', 'Respect and Empathy', 'We exhibit respect and concern for colleagues, guests and partners.', '2022-11-24 08:18:08', '2022-11-24 09:07:15'),
(4, '', '', 'Integrity', 'We always maintain the highest standards of fairness and transparency in all our dealings.\r\n\r\n', '2022-11-24 08:29:04', NULL),
(5, '', '', 'Spirited Fun', 'We create an exciting and spirited work environment encouraging our colleagues to think freely.', '2022-11-24 08:29:04', NULL),
(6, '', '', 'Excellence', 'We always drive excellence in what we do.', '2022-11-24 08:29:04', NULL),
(7, '', '', 'Honesty and Integrity', 'At SILVERWOOD, we inspire fairness and trust in our day-to-day dealings with our stakeholders by saying what we mean and synchronizing our words and actions. We take full accountability for our actions.', '2022-11-24 08:29:04', '2023-01-19 21:33:25'),
(8, '', '', 'Interactive yet responsible communication', 'We maintain open communication with each other and consciously communicate in a pleasant manner in order to have a positive impact. Communication at SILVERWOOD is about effectively choosing one’s words, stating one’s purpose and expected outcome, an', '2022-11-24 08:29:04', NULL),
(9, '', '', 'Devotion to Duty', 'At SILVERWOOD, we commit ourselves wholeheartedly towards achieving a common goal reflecting in our actions. We have an objective of building a sense of pride and ownership amongst all the employees. This initiative is about alignment of goals at in', '2022-11-24 08:29:04', '2023-01-19 21:33:35'),
(10, '', '', 'Minimizing Waste', 'At SILVERWOOD, we constantly endeavour to adopt practices that reduce wastage by dispensing with non-value-added activities.', '2022-11-24 08:29:04', '2023-01-19 21:33:51'),
(11, '', '', 'Respect for Individuals', 'At SILVERWOOD, we nurture a transparent and trusting culture by treating every employee with dignity. We also value our employees and endeavour to develop and reward performance. We believe every individual working with us possesses certain strength', '2022-11-24 08:29:04', '2023-01-19 21:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `superAdmin` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `randomString` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`, `superAdmin`, `date`, `randomString`) VALUES
(5731, 'kaif', 'bhujwala', 'kaifbhujwala11@gmail.com', '12572091eb78f57e58c79f186e0a36c2', 1, '2019-12-26', ''),
(5777, 'ezzy', 'test', 'test@gmail.com', '123456', 0, '2023-01-19', '');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`, `image`) VALUES
(6, 'Exterior', 'Exterior1595238434.png'),
(7, 'Swimming Pool', 'Swimming Pool1595238534.png'),
(9, 'Living Room ', 'Living Room 1595238705.png'),
(10, 'Master Bedrooms', 'Master Bedrooms1595238820.png'),
(11, 'Lobby & Passage', 'Lobby & Passage1595417715.png'),
(12, 'Washrooms', 'Washrooms1595417823.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(300) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `contact`, `email`, `subject`, `message`, `createdOn`) VALUES
(1, 'Ezdehaar kazi ', 9004575004, 'ezdehaarkazi215@gmail.com', 'test', 'testing', '2022-11-24 07:42:02'),
(2, 'test', 9004575004, 'ezdehaarkazi215@gmail.com', 'test', 'test', '2023-01-19 20:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_form`
--

CREATE TABLE `enquiry_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneNumber` bigint(15) NOT NULL,
  `noOfGuests` int(100) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `ameneties` varchar(100) NOT NULL,
  `message` mediumtext NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedOn` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry_form`
--

INSERT INTO `enquiry_form` (`id`, `name`, `phoneNumber`, `noOfGuests`, `checkInDate`, `checkOutDate`, `ameneties`, `message`, `createdOn`, `modifiedOn`) VALUES
(1, 'Ezdehaar kazi ', 9004575004, 5, '0000-00-00', '0000-00-00', 'Meals,Barbeque', 'pls reply', '2022-11-22 08:24:38', NULL),
(2, 'Ezdehaar kazi ', 9004575004, 5, '0000-00-00', '0000-00-00', 'Meals,Barbeque', 'pls reply', '2022-11-22 08:47:27', NULL),
(3, 'Ezdehaar kazi ', 9004575004, 5, '0000-00-00', '0000-00-00', 'Meals,Barbeque', 'pls reply', '2022-11-22 08:48:31', NULL),
(4, 'Ezdehaar kazi ', 9004575004, 5, '0000-00-00', '0000-00-00', 'Meals,Barbeque', 'pls reply', '2022-11-22 08:49:33', NULL),
(5, 'Ezdehaar kazi ', 9004575004, 1, '2022-11-23', '2022-11-23', 'Meals,Barbeque', 'pls reply', '2022-11-22 08:53:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(50) NOT NULL,
  `faq` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `faq`, `time`) VALUES
(6, 'What are your rates?', 'Free', '2020-06-05 17:39:43'),
(7, 'Kitne din reh sakte?', '2 saal', '2020-06-05 17:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(200) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedOn` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `isDeleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `imagePath`, `imageName`, `category`, `createdOn`, `modifiedOn`, `isDeleted`) VALUES
(2, 'wash1.png', 'washroom', 'washrooms', '2022-11-25 11:29:04', NULL, b'0'),
(3, 'lobby1.png', 'lobby', 'lobby And Passage', '2022-11-25 11:29:04', NULL, b'0'),
(4, 'master1.png', 'masterbedroom', 'Master Bedrooms', '2022-11-25 11:29:04', NULL, b'0'),
(5, 'liv1.png', 'living room', 'living room', '2022-11-25 11:29:04', NULL, b'0'),
(6, 'swim1.png', 'swimming pool', 'swimming Pool', '2022-11-25 11:29:04', NULL, b'0'),
(7, 'exeti1.png', 'exterior', 'Exterior', '2022-11-25 11:29:04', NULL, b'0'),
(8, 'exeti2.png', 'exterior', 'Exterior', '2022-11-25 11:29:04', NULL, b'0'),
(9, 'exeti3.png', 'exterior', 'Exterior', '2022-11-25 11:29:04', NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`, `category`, `date`) VALUES
(2, '7_1674165301.png', 7, '2023-01-20 03:25:01'),
(3, '6_1674165319.png', 6, '2023-01-20 03:25:19'),
(4, '9_1674165342.png', 9, '2023-01-20 03:25:42'),
(5, '10_1674165363.png', 10, '2023-01-20 03:26:03'),
(6, '11_1674165377.png', 11, '2023-01-20 03:26:17'),
(7, '12_1674165397.png', 12, '2023-01-20 03:26:37'),
(8, '13_1674165418.png', 13, '2023-01-20 03:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `index_carousel`
--

CREATE TABLE `index_carousel` (
  `id` int(11) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedOn` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `isDeleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_carousel`
--

INSERT INTO `index_carousel` (`id`, `imageName`, `createdOn`, `modifiedOn`, `isDeleted`) VALUES
(1, '1.jpg', '2022-11-21 08:14:18', '2022-11-21 08:29:28', b'0'),
(3, '3.jpg', '2022-11-21 08:14:56', NULL, b'0'),
(4, '4.jpg', '2022-11-21 08:14:56', NULL, b'0'),
(5, '5.jpg', '2022-11-21 08:15:15', '2022-11-21 08:15:29', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `index_iframe`
--

CREATE TABLE `index_iframe` (
  `id` int(11) NOT NULL,
  `iframePath` varchar(150) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedOn` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `isDeleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_iframe`
--

INSERT INTO `index_iframe` (`id`, `iframePath`, `createdOn`, `modifiedOn`, `isDeleted`) VALUES
(1, 'https://www.youtube.com/embed/tafo4v6cJvE', '2022-11-22 08:55:43', '2023-01-21 14:00:38', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `offer` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `title`, `offer`, `time`) VALUES
(1, 'Loyalty Programme:', 'At SILVERWOOD, we appreciate loyalty as much as you do. To acknowledge the same, we offer a discount of &#8377;2,000 on your next booking with us. No questions asked.\r\n', '2020-06-30 21:54:48'),
(2, 'Referral Programme:', 'Loved your stay at SILVERWOOD? Refer us to your family and friends and get a flat discount of &#8377;2,000 on your next booking with us.', '2020-06-30 21:54:48'),
(3, 'Let us serve you longer:', 'Book for a minimum of 3 nights and get a whooping 25% discount on your reservation.', '2020-06-30 21:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `testimonial` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `testimonial`, `time`) VALUES
(1, 'A stay at SILVERWOOD let\'s you experience Lonavala\'s natural beauty in an intimate environment. One of Lonavala\'s most sought-after villas, a stay at SILVERWOOD promises all the comforts of home and the luxury of a hotel. Located amongst greenery, this grand space is replete with amenities. Here, you can spend your days enjoying the soothing mountain breeze as the on-site staff attend to your needs. As the sun sets, take a stroll by the pool, where you can enjoy mouth-watering grilled tandoori dishes.', '2020-06-30 22:03:09'),
(2, 'For those seeking serenity, SILVERWOOD offers a perfect location peacefully nestled in a cozy environment. The villa\'s natural beauty and five star amenities make it an unforgettable place to call your own. Each morning, enjoy the birds chirping while savoring your breakfast.', '2020-06-30 22:03:09'),
(3, 'It is almost too easy to fall in love with the warm and welcoming ambience, great food, hospitality and aminities. While you\'ll have no shortage of options, I recommend the tasty barbecue and sheesha by the poolside. Combine everything SILVERWOOD has to offer and you will have the recipe for an ideal vacation for family and friends alike.', '2020-06-30 22:03:09'),
(4, 'You would never want to leave this tranquil getaway overlooking the mesmerizing tree cover. SILVERWOOD, a luxury boutique villa, embodies peace and serenity. It\'s elegant design blends into the surrounding vistas and landscapes. Enjoy the contemporary comforts of this villa with hours spent relaxing on sun loungers and diving into the refreshing waters of your own private swimming pool.', '2020-06-30 22:03:09'),
(5, 'Whether it\'s your first time visiting or hundredth, SILVERWOOD never fails to impress. From the library to the barbeque and bonfire, from hookah to the games and the music system, there\'s somethWhether it\'s your first time visiting or hundredth, SILVERWOOD never fails to impress. From the library to the barbeque and bonfire, from hookah to the games and bonfire, there\'s something here for everyone.', '2020-06-30 22:03:09'),
(6, 'SILVERWOOD is the ideal destination for your next family reunion. Tucked away behind lush greenery and trees, this villa offers the perfect balance of privacy and accessibility.', '2020-06-30 22:03:09'),
(7, 'Pool parties, barbeque, bonfire and sheesha - all of the above are on the menu at this luxe villa in Lonavla. A stay here is about decadent leisure. It\'s hard to imagine a better vacation without SILVERWOOD.', '2020-06-30 22:03:09'),
(8, 'More than a vacation rental, SILVERWOOD feels like a luxirious hotel. We enjoyed the resort-like amenities and hospitality complimented by the surrounding lush greenery.', '2020-06-30 22:03:09'),
(9, 'Warning: you may never want to leave this jaw-dropping villa.<br>\n                        SILVERWOOD is the ideal retreat when in Lonavala. It will leave you spellbound. The space gives you a fresh modern vibe with loads of coziness that\'s sophisticated and welcoming. The 6 master bedroom villa comes complete with a housekeeper, private swimming pool and an exceptional chef, all waiting to make your stay a memorable one.', '2020-06-30 22:03:09'),
(10, 'Whether is the architecture or location, SILVERWOOD conveys an overall feeling of tranquility. Nestled within Lonavla\'s scenic rolling hills, this villa is a complete package. The impeccable interior design combined with modern comforts and stunning hospitality & service are all anyone could ask for in a vacation rental home.', '2020-06-30 22:03:10'),
(11, 'Luxury at its peak. Went with friends to celebrate a birthday. Extremely courteous staff and management. The rooms area really clean and the food is just spectacular. We also did a barbecue there by the poolside and the food was so good. The pool was really clean and so was the bungalow. Definitely recommend going to this place!\r\n', '2021-01-08 11:39:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_form`
--
ALTER TABLE `enquiry_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_carousel`
--
ALTER TABLE `index_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_iframe`
--
ALTER TABLE `index_iframe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5778;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiry_form`
--
ALTER TABLE `enquiry_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `index_carousel`
--
ALTER TABLE `index_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `index_iframe`
--
ALTER TABLE `index_iframe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
