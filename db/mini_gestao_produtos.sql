    -- --------------------------------------------------------
-- Banco de dados: mini_gestao_produtos
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS mini_gestao_produtos;
USE mini_gestao_produtos;

-- --------------------------------------------------------
-- Tabela: usuarios
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(64) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dados de teste
INSERT INTO usuarios (nome, email, senha) VALUES
('Gabriel Yoshio', 'gabrielssssk8@hotmail.com', SHA2('123456',256)),
('Teste Usuario', 'teste@teste.com', SHA2('123456',256));

-- --------------------------------------------------------
-- Tabela: fornecedores
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS fornecedores (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20),
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dados de teste
INSERT INTO fornecedores (nome, email, telefone) VALUES
('Laticínios São João', 'contato@laticinios.com.br', '(11) 99999-1111'),
('Padaria Pão Quente', 'contato@paopquente.com.br', '(11) 98888-2222'),
('Leites e Cia', 'vendas@leitesecia.com.br', '(11) 97777-3333'),
('Café do Brasil', 'cafe@cafedobrasil.com.br', '(11) 96666-4444'),
('Arroz Verde', 'contato@arrozverde.com.br', '(11) 95555-5555'),
('Feijão Bom', 'feijao@feijaobom.com.br', '(11) 94444-6666'),
('Açúcar Doce', 'sac@acucardoce.com.br', '(11) 93333-7777'),
('Massas Brasil', 'vendas@massabrasil.com.br', '(11) 92222-8888'),
('Óleos e Temperos', 'contato@oleostemperos.com.br', '(11) 91111-9999'),
('Manteigaria', 'contato@manteigaria.com.br', '(11) 90000-0000');

-- --------------------------------------------------------
-- Tabela: produtos
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS produtos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    fornecedor_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dados de teste
INSERT INTO produtos (nome, descricao, preco, fornecedor_id) VALUES
('Queijo Mussarela', 'Queijo fresco e saboroso', 20.00, 1),
('Pão Francês', 'Pão crocante', 5.00, 2),
('Leite Integral', 'Leite 1L', 6.50, 3),
('Café em Pó', 'Café torrado 250g', 15.00, 4),
('Arroz Branco 5kg', 'Arroz tipo 1', 25.00, 5),
('Feijão Carioca 1kg', 'Feijão saboroso', 12.00, 6),
('Açúcar Refinado 1kg', 'Açúcar cristal', 8.00, 7),
('Macarrão Espaguete 500g', 'Macarrão de trigo', 7.50, 8),
('Óleo de Soja 900ml', 'Óleo vegetal', 9.00, 9),
('Manteiga 500g', 'Manteiga cremosa', 18.00, 10);

-- --------------------------------------------------------
-- Tabela: cestas
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS cestas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    usuario_id INT(11) NOT NULL,
    criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Tabela: cestas_itens
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS cestas_itens (
    id INT(11) NOT NULL AUTO_INCREMENT,
    cesta_id INT(11) NOT NULL,
    produto_id INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (cesta_id) REFERENCES cestas(id) ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
