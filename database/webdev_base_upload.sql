-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 15 mei 2024 om 15:41
-- Serverversie: 5.7.34
-- PHP-versie: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev_base`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_token` varchar(255) DEFAULT NULL,
  `password_changed` timestamp NULL DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `email`, `password`, `password_token`, `password_changed`, `datetime`) VALUES
(1, 'test@test.nl', '$2y$10$3eJXM2NBYpOH8opTNAHVye/uRtxMhWNLS0NX9qpp1WqygPBnX4vjS', '', '2021-02-18 15:06:05', '2021-02-17 14:32:17'),
(2, 'admin@ikbengehackt.nl', '$2y$10$3eJXM2NBYpOH8opTNAHVye/uRtxMhWNLS0NX9qpp1WqygPBnX4vjS', NULL, NULL, '2024-04-22 11:59:42'),
(3, 'officemanager@bedrijf.nl', '$2y$10$3eJXM2NBYpOH8opTNAHVye/uRtxMhWNLS0NX9qpp1WqygPBnX4vjS', NULL, NULL, '2024-04-22 12:00:11');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `last_edited`) VALUES
(1, 'Blauwe trui', 'Comfortabele blauwe trui van 100% katoen. Perfect voor casual wear.', '19.95', '2024-04-22 13:16:26'),
(2, 'Rode gympen', 'Stoere rode gympen met vetersluiting. Ideaal voor sport en vrije tijd.', '49.95', '2024-04-22 13:16:26'),
(3, 'Zwarte smartphone', 'De nieuwste smartphone met krachtige processor en helder display.', '299.00', '2024-04-22 13:16:26'),
(4, 'Boek over programmeren', 'Leer de basisprincipes van programmeren met dit handige boek.', '24.95', '2024-04-22 13:16:26'),
(5, 'Draadloze oordopjes', 'Luister overal naar je favoriete muziek met deze draadloze oordopjes.', '39.95', '2024-04-22 13:16:26'),
(6, 'Plantenpot', 'Mooie plantenpot voor al je kamerplanten. Gemaakt van keramiek.', '14.95', '2024-04-22 13:16:26'),
(7, 'Kopje thee', 'Geniet van een kopje thee uit dit stijlvolle kopje.', '5.95', '2024-04-22 13:16:26'),
(8, 'Bureaustoel', 'Ergonomische bureaustoel voor comfortabel werken.', '99.00', '2024-04-22 13:16:26'),
(9, 'Fietslamp', 'Blijf veilig op de fiets met deze heldere fietslamp.', '12.95', '2024-04-22 13:16:26'),
(10, 'Waterfles', 'Blijf gehydrateerd met deze handige waterfles.', '7.95', '2024-04-22 13:16:26'),
(24, 'test', '12', '12.00', '2024-05-15 13:37:03');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_photos`
--

CREATE TABLE `product_photos` (
  `photo_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product_photos`
--

INSERT INTO `product_photos` (`photo_id`, `url`, `product_id`, `lastupdated`) VALUES
(2, 'rubber eend.jpeg', 24, '2024-05-15 13:37:03'),
(3, 'rubber eend.jpeg', 24, '2024-05-15 13:37:03'),
(4, 'rubber eend.jpeg', 24, '2024-05-15 13:37:03'),
(5, 'rubber eend.jpeg', 24, '2024-05-15 13:37:03');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexen voor tabel `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `products` (`product_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `photo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `product_photos`
--
ALTER TABLE `product_photos`
  ADD CONSTRAINT `products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
