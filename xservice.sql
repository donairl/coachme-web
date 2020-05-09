-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2019 at 05:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `qty`, `username`) VALUES
(1, 1, 1, 'donny'),
(2, 2, 1, 'donny'),
(3, 6, 1, 'donny'),
(4, 1, 1, 'donny'),
(5, 4, 1, 'donny'),
(6, 5, 1, 'donny'),
(7, 2, 1, 'donny'),
(8, 5, 1, 'donny');

-- --------------------------------------------------------

--
-- Table structure for table `ma_category`
--

CREATE TABLE `ma_category` (
  `category_code` varchar(2) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_category`
--

INSERT INTO `ma_category` (`category_code`, `dept_id`, `category_name`) VALUES
('AD', 1, 'Cleaning '),
('AR', 1, 'Maintenance & Issue hunter'),
('FF', 1, 'Transfer Machines'),
('GE', 2, 'Generator'),
('MN', 1, 'Customization'),
('SS', 6, 'Civil Category A');

-- --------------------------------------------------------

--
-- Table structure for table `ma_content`
--

CREATE TABLE `ma_content` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `content` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ma_department`
--

CREATE TABLE `ma_department` (
  `id` int(11) NOT NULL,
  `sort_no` tinyint(11) DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `menuicon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_department`
--

INSERT INTO `ma_department` (`id`, `sort_no`, `name`, `menuicon`) VALUES
(1, 2, 'Miscellanous', 'misc.jpg'),
(2, 1, 'Elektrikal', 'listrik.jpg'),
(3, 3, 'Instrumen', 'path.jpg'),
(4, 4, 'Kimia & Lingkungan', 'kimia.jpg'),
(5, 5, 'Mekanik', 'mechanic.jpg'),
(6, 6, 'Sipil', 'sipil.jpg'),
(7, 6, 'Engineering', 'engineering.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ma_product`
--

CREATE TABLE `ma_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `note` text NOT NULL,
  `short_description` varchar(80) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `price_unit` decimal(10,0) NOT NULL,
  `picture` varchar(60) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `category_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_product`
--

INSERT INTO `ma_product` (`id`, `product_name`, `note`, `short_description`, `unit`, `price_unit`, `picture`, `dept_id`, `category_id`) VALUES
(1, 'Transfer heavy machines', '<p>Rosemary is an aromatic evergreen shrub with leaves similar to&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tsuga\">hemlock</a>&nbsp;needles. It is native to the Mediterranean and Asia, but is reasonably hardy in cool climates. It can withstand droughts, surviving a severe lack of water for lengthy periods.<a href=\"https://en.wikipedia.org/wiki/Rosemary#cite_note-GardenAction-8\">[8]</a>&nbsp;Forms range from upright to trailing; the upright forms can reach 1.5&nbsp;m (5&nbsp;ft) tall, rarely 2&nbsp;m (6&nbsp;ft 7&nbsp;in). The leaves are evergreen, 2&ndash;4&nbsp;cm (0.8&ndash;1.6&nbsp;in) long and 2&ndash;5&nbsp;mm broad, green above, and white below, with dense, short, woolly hair. The plant flowers in spring and summer in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Temperateness\">temperate</a>&nbsp;climates, but the plants can be in constant bloom in warm climates; flowers are white, pink, purple or deep blue.<a href=\"https://en.wikipedia.org/wiki/Rosemary#cite_note-cabi-2\">[2]</a>&nbsp;Rosemary also has a tendency to flower outside its normal flowering season; it has been known to flower as late as early December, and as early as mid-February (in the northern hemisphere).<a href=\"https://en.wikipedia.org/wiki/Rosemary#cite_note-9\">[9]</a>&nbsp;In some parts of the world, it is considered an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Invasive_species\">invasive species</a>.<a href=\"https://en.wikipedia.org/wiki/Rosemary#cite_note-cabi-2\">[2]</a></p>\r\n', 'Transfer heavy machines to other location', 'pak', '11500', '1.jpg', 1, 'FF'),
(2, 'Check & transfer small machines', '<p>Transfer machines are metal working machine tools&nbsp;with several stations for&nbsp;performing&nbsp;various machining processes.&nbsp;Workpieces are fed into the machine and automatically indexed from station to station. Each station simultaneously performs a different operation on the workpiece and they exit the machine as a&nbsp;partially or completely finished unit. Standard transfer machine systems consist of multiple, sequential mechanical components, such as machining heads, transfer devices, indexing tables, and work. Workpieces are held by stationary or traveling fixtures and indexed in a circular or linear path. In the course of a cycle, components pass through each work station undergoing specific machining operations. The indexing table turns either vertically or horizontally and supports both continuous and intermittent movement. When combined with an automated transfer line for part feeding, transfer machines amplify production rate.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Uses for transfer machines include mass production of metal parts for a variety of industries, such the automotive and industrial machinery industries. Custom systems exist for manufacturing discrete components.</p>\r\n', 'For small machines', 'Days', '1000', 'p_3d-model-of-an-atom.jpg', 1, 'FF'),
(3, 'Custom Test Service 1', '<h2>References[<a href=\"https://en.wikipedia.org/w/index.php?title=Asterids&amp;action=edit&amp;section=3\">edit</a>]</h2>\r\n\r\n<ol>\r\n	<li>^&nbsp;<a href=\"https://en.wikipedia.org/wiki/Asterids#cite_ref-apgiv_1-0\">Jump up to:<em><strong>a</strong></em></a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Asterids#cite_ref-apgiv_1-1\"><em><strong>b</strong></em></a>&nbsp;<cite>Angiosperm Phylogeny Group (2016). &quot;An update of the Angiosperm Phylogeny Group classification for the orders and families of flowering plants: APG IV&quot;.&nbsp;<em>Botanical Journal of the Linnean Society</em>.&nbsp;<strong>181</strong>&nbsp;(1): 1&ndash;20.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Digital_object_identifier\">doi</a>:<a href=\"https://doi.org/10.1111%2Fboj.12385\">10.1111/boj.12385</a>.</cite></li>\r\n	<li>^&nbsp;<a href=\"https://en.wikipedia.org/wiki/Asterids#cite_ref-apgii_2-0\">Jump up to:<em><strong>a</strong></em></a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Asterids#cite_ref-apgii_2-1\"><em><strong>b</strong></em></a>&nbsp;<cite>Angiosperm Phylogeny Group (2003). &quot;An update of the Angiosperm Phylogeny Group classification for the orders and families of flowering plants: APG II&quot;.&nbsp;<em>Botanical Journal of the Linnean Society</em>.&nbsp;<strong>141</strong>&nbsp;(4): 399&ndash;436.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Digital_object_identifier\">doi</a>:<a href=\"https://doi.org/10.1046%2Fj.1095-8339.2003.t01-1-00158.x\">10.1046/j.1095-8339.2003.t01-1-00158.x</a>.</cite></li>\r\n	<li>^&nbsp;<a href=\"https://en.wikipedia.org/wiki/Asterids#cite_ref-apgiii_3-0\">Jump up to:<em><strong>a</strong></em></a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Asterids#cite_ref-apgiii_3-1\"><em><strong>b</strong></em></a>&nbsp;<cite>Angiosperm Phylogeny Group (2009). &quot;An update of the Angiosperm Phylogeny Group classification for the orders and families of flowering plants: APG III&quot;.&nbsp;<em>Botanical Journal of the Linnean Society</em>.&nbsp;<strong>161</strong>&nbsp;(2): 105&ndash;121.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Digital_object_identifier\">doi</a>:<a href=\"https://doi.org/10.1111%2Fj.1095-8339.2009.00996.x\">10.1111/j.1095-8339.2009.00996.x</a>.</cite></li>\r\n</ol>\r\n', 'Custom Test Service Yes', 'kotak', '300', '3.jpg', 1, 'MN'),
(4, 'Custom 2 Name it', '<p>In its early years,&nbsp;<em>Minggu Pagi</em>&nbsp;included articles on a variety of topics, including science, film, traditional culture, tourism, and sports. It also included space for literary works, primarily short stories. Among short story writers and other authors, the magazine was seen as providing an alternative space for publication, one accessible to those who had not yet been recognized by the Jakarta-based &quot;rulers&quot; of the Indonesian literary canon.<a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-FOOTNOTEMinistry_of_Education,_Minggu_Pagi-2\">[2]</a>&nbsp;Given this opportunity, as well as the honorariums paid to authors,&nbsp;<em>Minggu Pagi</em>&nbsp;soon became a popular medium in which local writers could publish their works.<a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-FOOTNOTEDerks2002333-6\">[6]</a></p>\r\n\r\n<p>In the 1950s, the Indonesian author&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Nasjah_Djamin&amp;action=edit&amp;redlink=1\">Nasjah Djamin</a>&nbsp;[<a href=\"https://id.wikipedia.org/wiki/Nasjah_Djamin\">id</a>]&nbsp;described&nbsp;<em>Minggu Pagi</em>, as a &quot;cesspool&quot;, a descriptor that the academic Will Derks characterises as &quot;embracing the low status and insignificance [the magazine] might have had in the eyes of scholars and critics&quot;.<a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-FOOTNOTEDerks2002333-6\">[6]</a>&nbsp;Nevertheless, by 1988 more than four hundred writers had contributed their literary works to the magazine and its successor. These included&nbsp;<a href=\"https://en.wikipedia.org/wiki/Motinggo_Busye\">Motinggo Busye</a>,&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Satyagraha_Hoerip&amp;action=edit&amp;redlink=1\">Satyagraha Hoerip</a>&nbsp;[<a href=\"https://id.wikipedia.org/wiki/Satyagraha_Hoerip\">id</a>],&nbsp;<a href=\"https://en.wikipedia.org/wiki/Rendra\">Rendra</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bakri_Siregar\">Bakri Siregar</a>, and Djamin, who published his novel&nbsp;<em>Hilanglah Si Anak Hilang</em>&nbsp;in&nbsp;<em>Minggu Pagi</em>&nbsp;between 1960 and 1961 on request of the editors.<a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-7\">[a]</a><a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-FOOTNOTEDerks2002333-6\">[6]</a><a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-FOOTNOTEKratz1988158,_862%E2%80%93864-8\">[7]</a></p>\r\n\r\n<p>In the 1990s,&nbsp;<em>Minggu Pagi</em>&nbsp;had a column on sexuality, &quot;Liku-Lika Seksualitas&quot;, managed by a &quot;Dr. Rosi&quot;.<a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-FOOTNOTEBudiman200055-9\">[8]</a>&nbsp;It also regularly featured information on miraculous healing, sacred sites, and invulnerability practices.<a href=\"https://en.wikipedia.org/wiki/Minggu_Pagi#cite_note-FOOTNOTEBrowne199990-10\">[9]</a></p>\r\n', 'Name it babe', 'Days', '34000', '2.jpg', 1, 'MN'),
(5, 'Brain Custom CU', '<p>Trade in stock markets means the transfer (in exchange for money) of a stock or security from a seller to a buyer. This requires these two parties to agree on a price.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Equity_(finance)\">Equities</a>&nbsp;(stocks or shares) confer an ownership interest in a particular company.</p>\r\n\r\n<p>Participants in the stock market range from small individual&nbsp;<a href=\"https://en.wikipedia.org/wiki/Stock_investors\">stock investors</a>&nbsp;to larger investors, who can be based anywhere in the world, and may include&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bank\">banks</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Insurance\">insurance</a>&nbsp;companies,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Pension_fund\">pension funds</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hedge_fund\">hedge funds</a>. Their buy or sell orders may be executed on their behalf by a stock exchange&nbsp;<a href=\"https://en.wikipedia.org/wiki/Trader_(finance)\">trader</a>.</p>\r\n\r\n<p>Some exchanges are physical locations where transactions are carried out on a trading floor, by a method known as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Open_outcry\">open outcry</a>. This method is used in some stock exchanges and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Commodities_exchange\">commodity exchanges</a>, and involves traders shouting bid and offer prices. The other type of stock exchange has a network of computers where trades are made electronically. An example of such an exchange is the&nbsp;<a href=\"https://en.wikipedia.org/wiki/NASDAQ\">NASDAQ</a>.</p>\r\n', 'See U brain', 'Brains', '4000', '3.jpg', 1, 'MN'),
(6, 'Bug hunter', '<p><a href=\"https://en.wikipedia.org/wiki/Market_participant\">Market participants</a>&nbsp;include individual retail investors, institutional investors such as mutual funds, banks, insurance companies and hedge funds, and also publicly traded corporations trading in their own shares. Some studies have suggested that institutional investors and corporations trading in their own shares generally receive higher risk-adjusted returns than retail investors.<a href=\"https://en.wikipedia.org/wiki/Stock_market#cite_note-ssrn.com-12\">[11]</a></p>\r\n\r\n<p>A few decades ago, most buyers and sellers were individual investors, such as wealthy businessmen, usually with long family histories to particular corporations. Over time, markets have become more &quot;institutionalized&quot;; buyers and sellers are largely institutions (e.g.,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Pension_fund\">pension funds</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Insurance_companies\">insurance companies</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mutual_fund\">mutual funds</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Index_fund\">index funds</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Exchange-traded_fund\">exchange-traded funds</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hedge_fund\">hedge funds</a>, investor groups, banks and various other&nbsp;<a href=\"https://en.wikipedia.org/wiki/Financial_institution\">financial institutions</a>).</p>\r\n\r\n<p>The rise of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Institutional_investor\">institutional investor</a>&nbsp;has brought with it some improvements in market operations. There has been a gradual tendency for &quot;fixed&quot; (and exorbitant) fees being reduced for all investors, partly from falling administration costs but also assisted by large institutions challenging brokers&#39; oligopolistic approach to setting standardized fees.[<em><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Citation_needed\">citation needed</a></em>]&nbsp;A current trend in stock market investments includes the decrease in fees due to computerized asset management termed&nbsp;<a href=\"https://en.wikipedia.org/wiki/Robo-advisor\">robo-advisors</a>within the industry. Automation has decreased portfolio management costs by lowering the cost associated with investing as a whole.</p>\r\n\r\n<h3>Trends in market participation[<a href=\"https://en.wikipedia.org/w/index.php?title=Stock_market&amp;action=edit&amp;section=5\">edit</a>]</h3>\r\n\r\n<p>Stock market participation refers to the number of agents who buy and sell equity backed securities either directly or indirectly in a financial exchange. Participants are generally subdivided into three distinct sectors; households, institutions, and foreign traders. Direct participation occurs when any of the above entities buys or sells securities on its own behalf on an exchange. Indirect participation occurs when an institutional investor exchanges a stock on behalf of an individual or household. Indirect investment occurs in the form of pooled investment accounts, retirement accounts, and other managed financial accounts.</p>\r\n\r\n<p>Indirect vs. direct investment[<a href=\"https://en.wikipedia.org/w/index.php?title=Stock_market&amp;action=edit&amp;section=6\">edit</a>]</p>\r\n\r\n<p>The total value of equity-backed securities in the United States rose over 600% in the 25 years between 1989 and 2012 as market capitalization expanded from $2,790 billion to $18,668 billion.<a href=\"https://en.wikipedia.org/wiki/Stock_market#cite_note-13\">[12]</a>&nbsp;Direct ownership of stock by individuals rose slightly from 17.8% in 1992 to 17.9% in 2007, with the median value of these holdings rising from $14,778 to $17,000.<a href=\"https://en.wikipedia.org/wiki/Stock_market#cite_note-:1-14\">[13]</a><a href=\"https://en.wikipedia.org/wiki/Stock_market#cite_note-:0-15\">[14]</a>&nbsp;Indirect participation in the form of retirement accounts rose from 39.3% in 1992 to 52.6% in 2007, with the median value of these accounts more than doubling from $22,000 to $45,000 in that time.<a href=\"https://en.wikipedia.org/wiki/Stock_market#cite_note-:1-14\">[13]</a><a href=\"https://en.wikipedia.org/wiki/Stock_market#cite_note-:0-15\">[14]</a>&nbsp;Rydqvist, Spizman, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Ilya_Strebulaev\">Strebulaev</a>attribute the differential growth in direct and indirect holdings to differences in the way each are taxed in the United States. Investments in pension funds and 401ks, the two most common vehicles of indirect participation, are taxed only when funds are withdrawn from the accounts. Conversely, the money used to directly purchase stock is subject to taxation as are any dividends or capital gains they generate for the holder. In this way the current tax code incentivizes individuals to invest indirectly.<a href=\"https://en.wikipedia.org/wiki/Stock_market#cite_note-16\">[15]</a></p>\r\n', 'The hunter bug', 'kotak', '4800', '4.jpg', 1, 'AR');

-- --------------------------------------------------------

--
-- Table structure for table `ma_users`
--

CREATE TABLE `ma_users` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ma_users`
--

INSERT INTO `ma_users` (`username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
('admin', 'bypass', '$2y$13$OvUL1JUfujfVN4ULN/ilbuC2xCngZO/fTYnLmn9HVrmQmngVPaCaO', '', 'donairlbox@yahoo.com', 1, 1, 0, 1507369201),
('donny', NULL, '$2y$13$vRNAdDviw3gUg/UqdujrKOAmID4lBVRLuGJruRWsgvVLihOk1amQ.', NULL, 'donairlbox@yahoo.com', 2, 1, 1530691695, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ma_users_extra`
--

CREATE TABLE `ma_users_extra` (
  `id` int(11) NOT NULL,
  `username` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(22) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_acc_no` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_acc_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_users_extra`
--

INSERT INTO `ma_users_extra` (`id`, `username`, `bank_name`, `bank_acc_no`, `bank_acc_name`) VALUES
(1, 'budi', 'bca', '3344455', 'budi raharja'),
(2, 'donny', 'bca', '78000202020', 'Donny Airlangga');

-- --------------------------------------------------------

--
-- Table structure for table `sub_product_item`
--

CREATE TABLE `sub_product_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_header`
--

CREATE TABLE `trans_header` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(60) NOT NULL,
  `username` int(11) NOT NULL,
  `total_paid` decimal(10,0) NOT NULL,
  `status_payment` tinyint(1) NOT NULL,
  `type_payment` varchar(3) NOT NULL,
  `ship_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `FK_CartUsername` (`username`);

--
-- Indexes for table `ma_category`
--
ALTER TABLE `ma_category`
  ADD PRIMARY KEY (`category_code`),
  ADD KEY `fk_dept` (`dept_id`);

--
-- Indexes for table `ma_content`
--
ALTER TABLE `ma_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_department`
--
ALTER TABLE `ma_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_product`
--
ALTER TABLE `ma_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_productCategory` (`category_id`);

--
-- Indexes for table `ma_users`
--
ALTER TABLE `ma_users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ma_users_extra`
--
ALTER TABLE `ma_users_extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `sub_product_item`
--
ALTER TABLE `sub_product_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `trans_header`
--
ALTER TABLE `trans_header`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ma_content`
--
ALTER TABLE `ma_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_department`
--
ALTER TABLE `ma_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ma_product`
--
ALTER TABLE `ma_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ma_users_extra`
--
ALTER TABLE `ma_users_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_product_item`
--
ALTER TABLE `sub_product_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_header`
--
ALTER TABLE `trans_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_CartUsername` FOREIGN KEY (`username`) REFERENCES `ma_users` (`username`),
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `ma_product` (`id`);

--
-- Constraints for table `ma_category`
--
ALTER TABLE `ma_category`
  ADD CONSTRAINT `fk_dept` FOREIGN KEY (`dept_id`) REFERENCES `ma_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ma_product`
--
ALTER TABLE `ma_product`
  ADD CONSTRAINT `FK_productCategory` FOREIGN KEY (`category_id`) REFERENCES `ma_category` (`category_code`);

--
-- Constraints for table `sub_product_item`
--
ALTER TABLE `sub_product_item`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `ma_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
