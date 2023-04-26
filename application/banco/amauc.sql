-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Abr-2023 às 20:50
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `amauc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `age_cod` int(11) NOT NULL,
  `usu_cod` int(11) NOT NULL,
  `age_hora_ini` datetime NOT NULL,
  `age_hora_fim` datetime NOT NULL,
  `age_titulo` varchar(50) NOT NULL,
  `age_descricao` text NOT NULL,
  `age_tipo` int(11) NOT NULL COMMENT 'agenda tipo',
  `vei_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_tipo`
--

CREATE TABLE `agenda_tipo` (
  `agt_cod` int(11) NOT NULL,
  `agt_descricao` text NOT NULL,
  `agt_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `ati_cod` int(11) NOT NULL,
  `ati_data` date NOT NULL,
  `ati_descricao` text NOT NULL,
  `ati_solicitante` varchar(200) NOT NULL,
  `ati_cargo` varchar(200) NOT NULL,
  `ati_tempo` time NOT NULL,
  `ati_situacao` int(11) NOT NULL DEFAULT 1,
  `usu_cod` int(11) NOT NULL,
  `sol_cod` int(11) NOT NULL DEFAULT 1,
  `sol_status` int(11) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `afr_cod` int(11) NOT NULL,
  `atp_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_forma`
--

CREATE TABLE `atividade_forma` (
  `afr_cod` int(100) NOT NULL,
  `afr_descricao` text NOT NULL,
  `afr_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_tipo`
--

CREATE TABLE `atividade_tipo` (
  `atp_cod` int(11) NOT NULL,
  `atp_descricao` varchar(100) NOT NULL,
  `atp_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cid_cod` int(11) NOT NULL,
  `cid_nome` varchar(100) NOT NULL,
  `est_uf` varchar(2) NOT NULL,
  `cid_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cli_cod` int(11) NOT NULL,
  `cli_nome` varchar(100) NOT NULL,
  `cli_cnpj` varchar(20) DEFAULT NULL,
  `cli_tel` varchar(20) DEFAULT NULL,
  `cli_mail` varchar(100) DEFAULT NULL,
  `cli_endereco` varchar(120) DEFAULT NULL,
  `cli_nro_endereco` varchar(11) DEFAULT NULL,
  `cli_bairro` varchar(50) DEFAULT NULL,
  `cli_cep` varchar(20) DEFAULT NULL,
  `cid_cod` int(11) DEFAULT NULL,
  `cli_situacao` int(11) NOT NULL DEFAULT 1,
  `usu_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `con_cod` int(11) NOT NULL,
  `usu_cod` int(11) NOT NULL,
  `con_setor` int(11) NOT NULL,
  `con_data` date NOT NULL,
  `con_veiculo` int(11) NOT NULL,
  `con_vei_placa` varchar(10) NOT NULL,
  `con_vei_cod` int(11) DEFAULT NULL,
  `con_vei_km_ini` float DEFAULT NULL,
  `con_vei_km_fim` float DEFAULT NULL,
  `con_vei_outro` varchar(200) DEFAULT NULL,
  `con_destino` varchar(200) NOT NULL,
  `con_cliente` int(11) DEFAULT NULL,
  `con_solicitacao` int(11) DEFAULT NULL,
  `con_descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_anexo`
--

CREATE TABLE `conta_anexo` (
  `can_cod` int(11) NOT NULL,
  `con_cod` int(11) NOT NULL,
  `can_estab` varchar(200) NOT NULL,
  `can_valor` float NOT NULL,
  `can_anexo` text NOT NULL,
  `can_data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `fun_cod` int(11) NOT NULL,
  `fun_nome` varchar(100) DEFAULT NULL,
  `fun_mail` varchar(100) NOT NULL,
  `set_cod` int(11) NOT NULL,
  `usu_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `passageiros`
--

CREATE TABLE `passageiros` (
  `pas_cod` int(11) NOT NULL,
  `aau_cod` int(11) NOT NULL,
  `func_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `presta_contas`
--

CREATE TABLE `presta_contas` (
  `pco_cod` int(11) NOT NULL,
  `aau_cod` int(11) NOT NULL,
  `arq_nota` varchar(100) NOT NULL,
  `fun_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `set_cod` int(11) NOT NULL,
  `set_nome` varchar(30) NOT NULL,
  `set_responsavel` int(11) NOT NULL,
  `set_descricao` text NOT NULL,
  `set_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `sol_cod` int(11) NOT NULL,
  `set_cod` int(11) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `sol_solicitante` varchar(200) NOT NULL,
  `sol_cargo` varchar(200) NOT NULL,
  `sol_data` date NOT NULL,
  `sol_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pendente, 1-andamento, 2-concluido, 3-cancelado',
  `sol_descricao` text DEFAULT NULL,
  `sol_urgencia` int(11) NOT NULL,
  `sol_anexo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `to_do_list`
--

CREATE TABLE `to_do_list` (
  `td_cod` int(11) NOT NULL,
  `td_texto` text NOT NULL,
  `td_stts` int(11) NOT NULL DEFAULT 0,
  `td_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `usu_nome` varchar(100) NOT NULL,
  `usu_login` varchar(50) NOT NULL,
  `usu_senha` varchar(40) NOT NULL,
  `usu_email` varchar(200) DEFAULT NULL,
  `cli_cod` int(11) NOT NULL,
  `upe_cod` int(11) NOT NULL COMMENT 'usuario_permissao',
  `set_cod` int(11) NOT NULL,
  `usu_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_cod`, `fun_cod`, `usu_nome`, `usu_login`, `usu_senha`, `usu_email`, `cli_cod`, `upe_cod`, `set_cod`, `usu_situacao`) VALUES
(1, 0, 'Administrador Geral', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'contato@raisweb.com.br', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_permissao`
--

CREATE TABLE `usuario_permissao` (
  `upe_cod` int(11) NOT NULL,
  `upe_descricao` varchar(30) NOT NULL,
  `upe_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_permissao`
--

INSERT INTO `usuario_permissao` (`upe_cod`, `upe_descricao`, `upe_situacao`) VALUES
(1, 'Administrador', 1),
(2, 'Funcionário', 1),
(3, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `vei_cod` int(11) NOT NULL,
  `vei_nome` varchar(40) NOT NULL,
  `vei_placa` varchar(7) NOT NULL,
  `vei_situacao` int(11) NOT NULL DEFAULT 1,
  `agt_cod` int(11) NOT NULL DEFAULT 1 COMMENT 'agenda tipo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`age_cod`);

--
-- Índices para tabela `agenda_tipo`
--
ALTER TABLE `agenda_tipo`
  ADD PRIMARY KEY (`agt_cod`);

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`ati_cod`);

--
-- Índices para tabela `atividade_forma`
--
ALTER TABLE `atividade_forma`
  ADD PRIMARY KEY (`afr_cod`);

--
-- Índices para tabela `atividade_tipo`
--
ALTER TABLE `atividade_tipo`
  ADD PRIMARY KEY (`atp_cod`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cid_cod`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cli_cod`);

--
-- Índices para tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`con_cod`);

--
-- Índices para tabela `conta_anexo`
--
ALTER TABLE `conta_anexo`
  ADD PRIMARY KEY (`can_cod`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`fun_cod`);

--
-- Índices para tabela `passageiros`
--
ALTER TABLE `passageiros`
  ADD PRIMARY KEY (`pas_cod`);

--
-- Índices para tabela `presta_contas`
--
ALTER TABLE `presta_contas`
  ADD PRIMARY KEY (`pco_cod`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`set_cod`);

--
-- Índices para tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`sol_cod`);

--
-- Índices para tabela `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`td_cod`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_cod`);

--
-- Índices para tabela `usuario_permissao`
--
ALTER TABLE `usuario_permissao`
  ADD PRIMARY KEY (`upe_cod`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`vei_cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `age_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `agenda_tipo`
--
ALTER TABLE `agenda_tipo`
  MODIFY `agt_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `ati_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atividade_forma`
--
ALTER TABLE `atividade_forma`
  MODIFY `afr_cod` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atividade_tipo`
--
ALTER TABLE `atividade_tipo`
  MODIFY `atp_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cid_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `con_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta_anexo`
--
ALTER TABLE `conta_anexo`
  MODIFY `can_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `fun_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `passageiros`
--
ALTER TABLE `passageiros`
  MODIFY `pas_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `presta_contas`
--
ALTER TABLE `presta_contas`
  MODIFY `pco_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `set_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `sol_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `td_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario_permissao`
--
ALTER TABLE `usuario_permissao`
  MODIFY `upe_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `vei_cod` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
