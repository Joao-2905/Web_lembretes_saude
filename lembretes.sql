-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2025 às 00:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lembretes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `lembretes`
--

CREATE TABLE `lembretes` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lembretes`
--

INSERT INTO `lembretes` (`id`, `usuario`, `titulo`, `data_hora`) VALUES
(1, 'joao', 'tomar remedio', '2025-12-07 19:45:00'),
(5, 'Nilmo', 'beber agua', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'joao', '$2y$10$.FY3s03CW3rjg19VIWv.VeBdqxXzqIOAouldzIj7d98iMBcWkqECm'),
(2, 'Gomes', '$2y$10$7VvcKbChXsoLieeDqfTuEOAv5myyB3hKm87aoJ9KN8TsZ3HvNhaJ2'),
(3, 'Lopes', '$2y$10$Ufu3W5XDXYGmRN3s.JJ0teBVUm/4F3LKcyKzQp.GHqLh8xN61cA5G'),
(4, 'Mateus', '$2y$10$oE5ZL.RCYX/enW5sPZBlVefOIMJWSg6BJUSk.e1NbQ95iZZnxcRA.'),
(5, 'Nilmo', '$2y$10$TDaKaEzcgQTZzwv.6c0w.eJ8FfU0sdGakMwptIjl7jf6adbTpXD1e');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `lembretes`
--
ALTER TABLE `lembretes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lembretes`
--
ALTER TABLE `lembretes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
