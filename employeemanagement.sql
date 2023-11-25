-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/11/2023 às 03:13
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `employeemanagement`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `department`
--

CREATE TABLE `department` (
  `Id` int(11) NOT NULL,
  `DepartmentName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `department`
--

INSERT INTO `department` (`Id`, `DepartmentName`) VALUES
(1, 'Desenvolvimento de Software'),
(2, 'Infraestrutura e Redes'),
(3, 'Segurança da Informação'),
(4, 'Análise de Dados'),
(5, 'Suporte Técnico'),
(6, 'Gerenciamento de Projetos'),
(7, 'Engenharia de Sistemas'),
(8, 'Business Intelligence'),
(9, 'Testes e Qualidade'),
(10, 'Arquitetura de Soluções');

-- --------------------------------------------------------

--
-- Estrutura para tabela `employee`
--

CREATE TABLE `employee` (
  `Id` bigint(20) NOT NULL,
  `EmployeeName` varchar(100) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `AdmissionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `DepartmentId` int(11) NOT NULL,
  `Position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `employee`
--

INSERT INTO `employee` (`Id`, `EmployeeName`, `CPF`, `Email`, `DateOfBirth`, `AdmissionDate`, `DepartmentId`, `Position`) VALUES
(11, 'Donathan Ramalho', '632.240.100-96', 'email@email.com', '2023-11-24', '2023-11-24 23:09:07', 3, 'Engenheiro de Software'),
(12, 'Daniel Cepluki', '478.687.670-49', 'email@email.com', '2023-11-24', '2023-11-24 23:09:36', 8, 'Engenheiro de Software'),
(13, 'Joyce Mendes', '046.036.620-33', 'email@email.com', '2023-11-24', '2023-11-24 23:10:01', 6, 'Engenheiro de Software'),
(14, 'Prof. Matheuzin', '362.597.660-92', 'email@email.com', '2023-11-24', '2023-11-24 23:11:29', 10, 'Professor de TI');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`login`, `senha`) VALUES
('donathanramalho@yahoo.com.br', '$argon2i$v=19$m=65536,t=4,p=1$WWliVjFRdkttY2FKaWVFcA$T3A4rniRp0CSRbZfIBv2y72gzeLYqlCkM+20VBHSxZQ');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Id`);

--
-- Índices de tabela `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_DepartmentId` (`DepartmentId`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `department`
--
ALTER TABLE `department`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `employee`
--
ALTER TABLE `employee`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_DepartmentId` FOREIGN KEY (`DepartmentId`) REFERENCES `department` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
