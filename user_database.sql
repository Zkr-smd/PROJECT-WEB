-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 11:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `images` TEXT, -- Multiple image URLs can be stored as a comma-separated string or JSON
    `description` TEXT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `category` ENUM('RARE', 'NORMAL', 'LUXURY') NOT NULL,
    `date_posted` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO users (user_id, unique_id, fname, lname, email, password, img, status) 
VALUES (1, 123456, 'John', 'Doe', 'john.doe@example.com', 'password123', 'default.jpg', 'active');


INSERT INTO products (user_id, price, images, description, title, category, date_posted) VALUES
(1, 20.00, 'product1.jpeg', 'Cette pièce rare est impeccable, sans fissures ni éclats, et a été soigneusement entretenue pour conserver tout son éclat. Idéale pour les collectionneurs ou les amateurs de décoration anglaise, elle constitue un objet indispensable pour créer une ambiance chaleureuse et authentique. Ne passez pas à côté de cette pièce unique !', 'Théière Vintage Anglaise Christophe Wren - Collection Cottage', 'NORMAL', CURRENT_TIMESTAMP),
(1, 34.00, 'product2.jpeg', 'Coffret neuf, jamais servi, contenant 2 tasses à café, 1 sucrier, 2 cuillères à café, en étain 95%', 'coffret 2 tasses vintage', 'NORMAL', CURRENT_TIMESTAMP),
(1, 53.00, 'product3.jpeg', 'Joli miroir Vintage en bronze. Style Art Nouveau. Diamètre 16. Très bon état. Peut servir en cadre photo.', 'Miroir Art Nouveau bronze', 'NORMAL', CURRENT_TIMESTAMP),
(1, 26.00, 'product4.jpeg', 'Verkaufe diese Hemdjacke von Pull&Bear. Die Jacke hat eine rostbraune Farbe und das Material ist eine Art Wildleder. Die Jacke habe ich bestimmt 2/3 mal angehabt und dann nicht mehr.', 'Vintage Hemdjacke', 'NORMAL', CURRENT_TIMESTAMP),
(1, 90.00, 'product5.jpeg', 'Schöne Vintage Art-Deco Pilzlampe. Top Zustand.', 'Vintage Art-Deco Pilzlampe', 'LUXURY', CURRENT_TIMESTAMP),
(1, 250.00, 'product6.jpeg', 'Entièrement dorée, cette montre Art Déco présente une allure élégante et raffinée. Le cadran guilloché ajoute une touche de sophistication. Modèle classique de la marque, toujours en vente. Plaqué or.', 'Montre Michel Herbelin', 'LUXURY', CURRENT_TIMESTAMP),
(1, 460.00, 'product7.jpeg', 'Marque Tissot. Taille 30–38 mm. État Bon état. Couleur Doré. Localisation Brunssum, Pays-Bas. Options de paiement Carte bancaire. Nombre de vues 966.', 'Vintage montre', 'LUXURY', CURRENT_TIMESTAMP),
(1, 300.00, 'product8.jpeg', 'Lustre Art Déco Signé Dégué, Vintage, Ancien. Hauteur: 95 cm. Diam: 60 cm.', 'Lustre Art Déco Signé Dégué, Vintage, Ancien', 'RARE', CURRENT_TIMESTAMP),
(1, 250.00, 'product9.jpeg', 'Très beau pastel original signé ancien avec un petit accroc sur la toile comme vous voyez.', 'Cadre toile ancien vintage antique art 1900', 'RARE', CURRENT_TIMESTAMP),
(1, 300.00, 'product10.jpeg', 'Ensemble vintage années 30 Val Saint Lambert Belgique composé de 3 pièces toutes signées. Modèle Noémie. Grande coupe largeur anses comprises 31cm, hauteur 12cm. Petite coupe largeur anses comprises 22cm, hauteur 9,5cm. Coupe avec couvercle largeur anses comprises 22cm, hauteur bouchon compris 22cm. Excellent état sans aucun fêle ou ébréchure.', 'Ensemble de verrerie', 'LUXURY', CURRENT_TIMESTAMP),
(1, 260.00, 'product11.jpeg', 'Marque Vintage Dressing. État Très bon état. Couleur Marron, Doré. Localisation France.', 'Piatto decorativo da parente con bassorilievo in rame di Benito Mussolini da collezione', 'RARE', CURRENT_TIMESTAMP),
(1, 400.00, 'product12.jpeg', 'Anciennes cuillères en argent ou autre environ 45 cuillères.', 'Cuillères anciennes', 'RARE', CURRENT_TIMESTAMP),
(1, 200.00, 'product13.jpeg', 'Ce pendentif est en or massif 2 tons or blanc or jaune, poinçonné tête d\'aigle au niveau de sa bélière et autre poinçon de son anneau. Il pèse 1,2 grammes et fait 2,8 cm de haut et 1,5 cm de large. Il est orné d\'une pierre de synthèse bleue en son centre et de petites roses de saphir sur les bords.', 'Magnifique pendentif art deco or et pierres', 'RARE', CURRENT_TIMESTAMP),
(1, 375.00, 'product14.jpeg', '3 VINTAGE SEXTON USA MID CENTURY METAL WALL ART SIAMESE CATS ORIGINAL MCM 1960s. Perfect condition!', 'Vintage midcentury modern cats wall art', 'RARE', CURRENT_TIMESTAMP);
