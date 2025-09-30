-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/09/2025 às 19:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mini_gestao_produtos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cestas`
--

CREATE TABLE `cestas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cestas`
--

INSERT INTO `cestas` (`id`, `usuario_id`, `criado_em`) VALUES
(1, 1, '2025-09-30 17:00:11'),
(2, 1, '2025-09-30 17:00:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cestas_itens`
--

CREATE TABLE `cestas_itens` (
  `id` int(11) NOT NULL,
  `cesta_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cestas_itens`
--

INSERT INTO `cestas_itens` (`id`, `cesta_id`, `produto_id`) VALUES
(7, 1, 7),
(8, 1, 5),
(9, 1, 4),
(11, 2, 5),
(12, 2, 4),
(13, 2, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Laticínios São João', 'contato@laticinios.com.br', '(11) 99999-1111'),
(2, 'Padaria Pão Quente', 'contato@paopquente.com.br', '(11) 98888-2222'),
(3, 'Leites e Cia', 'vendas@leitesecia.com.br', '(11) 97777-3333'),
(4, 'Café do Brasil', 'cafe@cafedobrasil.com.br', '(11) 96666-4444'),
(5, 'Arroz Verde', 'contato@arrozverde.com.br', '(11) 95555-5555'),
(6, 'Feijão Bom', 'feijao@feijaobom.com.br', '(11) 94444-6666'),
(7, 'Açúcar Doce', 'sac@acucardoce.com.br', '(11) 93333-7777'),
(8, 'Massas Brasil', 'vendas@massabrasil.com.br', '(11) 92222-8888'),
(9, 'Óleos e Temperos', 'contato@oleostemperos.com.br', '(11) 91111-9999'),
(10, 'Manteigaria', 'contato@manteigaria.com.br', '(11) 90000-0000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `fornecedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `fornecedor_id`) VALUES
(1, 'Queijo Mussarela', 'Queijo fresco e saboroso', 20.00, 1),
(2, 'Pão Francês', 'Pão crocante', 5.00, 2),
(3, 'Leite Integral', 'Leite 1L', 6.50, 3),
(4, 'Café em Pó', 'Café torrado 250g', 15.00, 4),
(5, 'Arroz Branco 5kg', 'Arroz tipo 1', 25.00, 5),
(6, 'Feijão Carioca 1kg', 'Feijão saboroso', 12.00, 6),
(7, 'Açúcar Refinado 1kg', 'Açúcar cristal', 8.00, 7),
(8, 'Macarrão Espaguete 500g', 'Macarrão de trigo', 7.50, 8),
(9, 'Óleo de Soja 900ml', 'Óleo vegetal', 9.00, 9),
(10, 'Manteiga 500g', 'Manteiga cremosa', 18.00, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Gabriel Yoshio', 'gabrielssssk8@hotmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(2, 'Teste Usuario', 'teste@teste.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cestas`
--
ALTER TABLE `cestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `cestas_itens`
--
ALTER TABLE `cestas_itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cesta_id` (`cesta_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fornecedor_id` (`fornecedor_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cestas`
--
ALTER TABLE `cestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cestas_itens`
--
ALTER TABLE `cestas_itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cestas`
--
ALTER TABLE `cestas`
  ADD CONSTRAINT `cestas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `cestas_itens`
--
ALTER TABLE `cestas_itens`
  ADD CONSTRAINT `cestas_itens_ibfk_1` FOREIGN KEY (`cesta_id`) REFERENCES `cestas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cestas_itens_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
