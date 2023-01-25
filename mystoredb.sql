-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2023 às 18:39
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mystoredb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cart_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `detailorders`
--

CREATE TABLE `detailorders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `price` float NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `drawee` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `detailorders`
--

INSERT INTO `detailorders` (`id`, `order_id`, `product_id`, `price`, `quantity`, `drawee`) VALUES
(1, 56, 12, 12000, 3, 0),
(2, 56, 19, 11000, 2, 1),
(3, 57, 23, 12000, 2, 1),
(4, 57, 21, 11000, 3, 1),
(5, 57, 19, 11000, 5, 0),
(6, 58, 12, 12000, 7, 0),
(7, 59, 12, 12000, 1, 0),
(8, 61, 12, 12000, 2, 1),
(9, 61, 19, 11000, 2, 0),
(10, 61, 23, 12000, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `status`, `date`) VALUES
(40, 37, 3, NULL),
(41, 37, 3, NULL),
(42, 37, 3, NULL),
(43, 37, 3, NULL),
(44, 37, 3, NULL),
(45, 37, 3, NULL),
(46, 37, 3, NULL),
(47, 37, 3, NULL),
(48, 37, 3, NULL),
(49, 37, 0, NULL),
(50, 37, 0, NULL),
(51, 37, 0, NULL),
(52, 37, 0, NULL),
(53, 37, 0, NULL),
(54, 37, 0, NULL),
(55, 35, 3, NULL),
(56, 35, 1, NULL),
(57, 35, 2, NULL),
(58, 37, 1, NULL),
(59, 37, 1, '2006-01-23'),
(60, 36, 1, '2011-01-23'),
(61, 36, 0, '2011-01-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `stock`, `available`) VALUES
(12, 'Hp Deskjet i5', 12000, '500GB HDD, SSD 250GB, RAM 12GB', 'uploads/e4271aef0d6df950713160844f08dac3.png', 5, 1),
(13, 'DELL GAMER i5', 32000, 'HD 500GB, RAM 16GB, SSD 200GB', 'uploads/c5f18d1c516df5d031c7234743c96813.jpg', 5, 0),
(14, 'Samsung galaxy note 10.1 n8000', 21000, 'HD 500GB, RAM 16GB, SSD 200GB', 'uploads/0c3fd9d2ac0dfc5d249432bbc81c4cf6.jpg', 6, 0),
(15, 'Acer gamer', 12000, 'HD 500GB, RAM 16GB, SSD 200GB', 'uploads/47c1e43377d849ecb57394912611e65c.jpg', 10, 0),
(16, 'Tablet Huawei', 40000, 'ROM 8GB, RAM 2GB', 'uploads/df237110c775e0bc5b0737222f606d64.jpg', 9, 0),
(17, 'Huawei Tablet', 12000, 'ROM 8GB, RAM 2GB', 'uploads/1c6bd599b98c029b17c7c91e8cf66da5.png', 4, 0),
(18, 'Iphone 4', 50000, 'RAM 4, ROM 100', 'uploads/f4cfa5700537aafd74b4ef8c37671603.jpg', 5, 0),
(19, 'HP Elitbook pro gamer', 11000, 'RAM 36GB, HD 500GB, SSD 250GB', 'uploads/19a2b54ff693bac236f2649a5d855776.jpg', 20000, 1),
(20, 'HP Elitebook pro', 32000, 'SSD 120GB, RAM 8GB, 500HD', 'uploads/53e28e556afc1f540cf5570ad65d1bcf.jpg', 1, 1),
(21, 'HP Elitebook pro', 11000, 'RAM 12GB, HD 1TB, SSD 250GB', 'uploads/30c9047a1f4e8b96564c8f45b33daf6e.jpg', 7, 1),
(22, 'DELL Expirion 12', 12000, 'jsbhfusygfsufisfoisj', 'uploads/11bc0cd79b228ada49daa09e18fbf1eb.jpg', 0, 1),
(23, 'Apple ipod', 12000, 'sdfsidfosigoskdnglsjdbgisug', 'uploads/5c86198da92826040efdda614459bf4b.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `birth` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `birth`, `adress`, `isAdmin`) VALUES
(35, 'admin', 'admin@gmail.com', '123', '+244946642126', 'Masculino', '2023-01-09', 'Luanda/Angola', 1),
(36, 'Filipe Sebastião Sissala', 'filipesissala14@gmail.com', '123', '+244946642126', 'Masculino', '2023-01-18', 'Luanda/Angola', 0),
(37, 'Sebastião Filipe Sissala', 'eyoms.sissala@gmail.com', '123', '923718685', 'Masculino', '2023-01-14', 'Kilamba Kiaxi/Sapú', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `detailorders`
--
ALTER TABLE `detailorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order` (`order_id`),
  ADD KEY `FK_product` (`product_id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user` (`id_user`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `detailorders`
--
ALTER TABLE `detailorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `detailorders`
--
ALTER TABLE `detailorders`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
