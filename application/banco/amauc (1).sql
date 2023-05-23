-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Maio-2023 às 16:14
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

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`age_cod`, `usu_cod`, `age_hora_ini`, `age_hora_fim`, `age_titulo`, `age_descricao`, `age_tipo`, `vei_cod`) VALUES
(2, 9, '2023-05-02 16:00:00', '2023-05-03 08:00:00', 'VIAGEM A FLORIANOPOLIS', 'TREINAMENTO DO SETOR DE TRIBUTOS', 1, 1),
(5, 22, '2023-05-04 07:00:00', '2023-05-05 17:00:00', 'REUNIÃO CIS AMAUC SES FLORIANÓPOLIS ', 'REUNIÃO DE TRABALHO JUNTO A SECRETARIA DE ESTADO DA SAÚDE', 1, 0),
(6, 22, '2023-05-11 14:00:00', '2023-05-11 17:00:00', 'REUNIÃO CIR', 'REUNIÃO COLEGIADO DE SAÚDE', 2, 0),
(7, 22, '2023-06-01 14:00:00', '2023-06-01 17:00:00', 'REUNIÃO CIR', 'REUNIÃO DO COLEGIADO DE SAÚDE', 2, 0),
(8, 22, '2023-07-05 14:00:00', '2023-07-05 17:00:00', 'REUNIÃO CIR', 'REUNIÃO DO COLEGIADO DE SAÚDE', 2, 0),
(9, 22, '2023-08-03 14:00:00', '2023-08-03 17:00:00', 'REUNIÃO CIR', 'RERUNIÃO DO COLEGIADO DE SAÚDE', 2, 0),
(10, 22, '2023-09-06 14:00:00', '2023-09-06 17:00:00', 'REUNIÃO CIR', 'REUNIÃO DO COLEGIADO DE SAÚDE', 2, 0),
(11, 22, '2023-10-05 14:00:00', '2023-10-05 17:00:00', 'REUNIÃO CIR', 'REUNIÃO DO COLEGIADO DE SAÚDE', 2, 0),
(12, 22, '2023-11-01 14:00:00', '2023-11-01 17:00:00', 'REUNIÃO CIR', 'REUNIÃO DO COLEGIADO DE SAÚDE', 2, 0),
(13, 22, '2023-12-07 14:00:00', '2023-12-07 17:00:00', 'REUNIÃO CIR', 'REUNIÃO DO COLEGIADO DE SAÚDE', 2, 0),
(14, 30, '2023-05-08 08:02:00', '2023-05-08 17:00:00', 'IPUMIRIM', 'LEVANTAMENTO DAS DIVISAS DO TERRENO DA PREFEITURA ONDE HOJE É INSTALADO O FÓRUM DO MUNICÍPIO.', 1, 2),
(15, 22, '2023-05-08 13:30:00', '2023-05-08 17:00:00', 'ASSINATURA CONTRATO IPUMIRIM', 'ASSINATURA CONTRATO IPUMIRIM', 1, 1),
(16, 19, '2023-05-11 08:00:00', '2023-05-11 11:30:00', 'REUNIÃO CONSELHO MUNICIPAL DE SANEAMENTO BÁSICO CO', 'REUNIÃO CONSELHO MUNICIPAL DE SANEAMENTO BÁSICO CONCÓRDIA', 2, 0),
(17, 19, '2023-05-15 13:30:00', '2023-05-15 17:00:00', 'CONSELHO MUNICIPAL DE SAÚDE', 'CONSELHO MUNICIPAL DE SAÚDE', 2, 0),
(18, 19, '2023-05-17 13:30:00', '2023-05-17 17:00:00', 'COLEGIADO DE NUTRIÇÃO', 'COLEGIADO DE NUTRIÇÃO', 2, 0),
(19, 19, '2023-05-26 14:00:00', '2023-05-26 17:00:00', 'REUNIÃO VIGILÂNCIA SANITÁRIA', 'REUNIÃO VIGILÂNCIA SANITÁRIA', 2, 0),
(20, 19, '2023-05-16 09:00:00', '2023-05-16 11:30:00', 'COLEGIADO ATENÇÃO PRIMÁRIA DE SAÚDE', 'COLEGIADO ATENÇÃO PRIMÁRIA DE SAÚDE', 2, 0),
(21, 19, '2023-05-16 13:30:00', '2023-05-16 17:00:00', 'CONSÓRCIO LAMBARI', 'CONSÓRCIO LAMBARI', 2, 0),
(22, 29, '2023-05-09 08:00:00', '2023-05-09 17:08:00', 'SEARA ', 'PLANIALTIMETRICO  CADASTRAL LOCAL DE BOTA FORA DE ESCAVACÃO\n', 1, 2),
(23, 28, '2023-05-11 08:00:00', '2023-05-11 17:00:00', 'PREFEITURA MUNICIPAL DE JABORA', 'PROJETO DE RECAPEAMENTO ASFÁLTICO  DAS RUAS SÃO ROQUE E CARDEAL CÂMARA \r\nGUTTEMBERG E VANESSA ', 1, 3),
(24, 14, '2023-05-16 11:00:00', '2023-05-18 23:00:00', 'VIAGEM FLORIANOPOLIS REUNIAO FECAM DIAS 17 E 18', 'VIAGEM FLORIANOPOLIS REUNIAO FECAM DIAS 17 E 18', 1, 1),
(25, 35, '2023-05-17 08:00:00', '2023-05-17 11:30:00', 'REUNIÃO COM EQUIPE CASTELLO BRANCO', 'REUNIÃO COM EQUIPE DE CONSORCIO LAMBARI, ENGENHARIA E TOPOGRAFIA JUNTAMENTE COM EQUIPE DO MUNICÍPIO DE PRESIDENTE CASTELLO BRANCO REFERENTE AO PROJETO DO CONDOMÍNIO INDUSTRIAL.', 2, 0),
(26, 30, '2023-05-10 08:07:00', '2023-05-10 17:00:00', 'IRANI', 'LEVANTAMENTO TOPOGRÁFICO E CADASTRAL VIA IMAGEM DE DRONE DE RUAS E PASSEIOS  PARA FINS DE PROJETO DE CAPEAMENTO ASFÁLTICO. BAIRRO PACÍFICO MATIAS BAIRRO SANTO ANTONIO BAIRRO STO MARCON, CEMITERIO  E CASA MORTUARIA.', 1, 3),
(27, 16, '2023-06-16 08:00:00', '2023-06-16 18:00:00', 'CURSO REDAÇÃO OFICIAL', 'CURSO REDAÇÃOOFICIAL COM ANA KELLY', 2, 0),
(28, 16, '2023-06-15 13:43:00', '2023-06-15 17:10:00', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 2, 0),
(29, 16, '2023-07-19 08:00:00', '2023-07-19 11:30:00', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 2, 0),
(30, 16, '2023-08-17 08:30:00', '2023-08-17 17:00:00', 'REUNIÃO COLEGIADO DE NUTRIÇÃO PRE RESERVA', 'REUNIÃO COLEGIADO DE NUTRIÇÃO PRÉ-RESERVA', 2, 0),
(31, 16, '2023-09-20 13:30:00', '2023-09-20 17:00:00', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 2, 0),
(32, 16, '2023-05-23 08:00:00', '2023-05-26 17:00:00', 'XII SEMINÁRIO ESTAD A.SOCIAL PIRATUBA', 'XII SEMINÁRIO ESTAD A.SOCIAL PIRATUBA - IVANETE E NEUSA', 1, 1),
(33, 16, '2023-10-18 08:30:00', '2023-10-18 11:30:00', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 2, 0),
(34, 16, '2023-11-22 13:30:00', '2023-11-22 17:00:00', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 'REUNIÃO COLEGIADO DE NUTRIÇÃO', 2, 0),
(35, 16, '2023-12-13 08:00:00', '2023-12-13 17:00:00', 'REUNIÃO COLEGIADO DE NUTRIÇÃO PRE RESERVA', 'REUNIÃO COLEGIADO DE NUTRIÇÃO PRE RESERVA', 2, 0),
(36, 13, '2023-05-12 15:00:00', '2023-05-12 17:00:00', 'REUNIÃO INTERNA ', 'REUNIAO INTERNA COM AMAUC, CISAMAUC E CONS. LAMBARI', 2, 0),
(37, 14, '2023-05-22 09:00:00', '2023-05-22 12:00:00', 'REUNIAO DEFESA CIVIL', 'REUNIÃO DEFESA CIVIL ', 2, 0),
(38, 28, '2023-05-15 08:00:00', '2023-05-15 17:00:00', 'PREFEITURA MUNICIPAL DE JABORA', 'RUA SÃO ROQUE E CARDEAL CÂMARA', 1, 3),
(39, 35, '2023-05-15 08:30:00', '2023-05-15 11:30:00', 'LEIS LICENCIAMENTO AMBIENTAL', 'DISCUSSÃO DAS LEIS PARA O LICENCIAMENTO AMBIENTAL', 2, 0),
(42, 37, '2023-05-22 08:00:00', '2023-05-25 18:00:00', 'VIAGEM A FLORIANÓPÓLIS MOVIMENTO ECONÔMICO', 'VIAGEM A FLORIANÓPÓLIS MOVIMENTO ECONÔMICO DIEGO E RENATE ', 1, 6),
(43, 14, '2023-05-24 09:00:00', '2023-05-24 16:00:00', 'ASSEMBLEIA LAMBARI', 'ASSEMBLEIA LAMBARI', 2, 0),
(44, 19, '2023-07-11 13:30:00', '2023-07-11 17:00:00', 'COLEGIADO ATENÇÃO PRIMÁRIA', 'COLEGIADO ATENÇÃO PRIMÁRIA', 2, 0),
(45, 19, '2023-05-24 08:00:00', '2023-05-24 11:30:00', 'ASSEMBLEIA EXTRAORDINÁRIA', 'ASSEMBLEIA EXTRAORDINÁRIA', 2, 0),
(46, 19, '2023-06-30 13:30:00', '2023-06-30 17:00:00', 'REUNIÃO VIGILÂNCIA SANITÁRIA', 'REUNIÃO VIGILÂNCIA SANITÁRIA', 2, 0),
(47, 19, '2023-07-28 13:30:00', '2023-07-28 17:00:00', 'REUNIÃO VIGILÂNCIA SANITÁRIA', 'REUNIÃO VIGILÂNCIA SANITÁRIA', 2, 0),
(48, 19, '2023-05-22 13:30:00', '2023-05-22 17:00:00', 'REUNIÃO ORGANIZAÇÃO DOS JIIDOS', 'REUNIÃO ORGANIZAÇÃO DOS JIIDOS', 2, 0),
(49, 24, '2023-06-27 18:00:00', '2023-06-27 22:00:00', 'SEMINÁRIO E VALORIZAÇÃO PROFISSIONAL - AECOM', 'SEMINÁRIO DE VALORIZAÇÃO PROFISSIONAL EM PARCERIA COM AECOM. PROFISSIONAL DA CASAN TRAZENDO O ASSUNTO SANEAMENTO BÁSICO.', 2, 0),
(51, 29, '2023-05-18 08:00:00', '2023-05-18 17:02:00', 'PIRATUBA ', 'ELABORAÇÃO DE UM PROJETO DE UM CENTRO CULTURAL PARA O MUNICÍPIO.( TOPOGRAFIA )', 1, 2),
(52, 19, '2023-06-02 08:00:00', '2023-06-02 17:00:00', 'COLEGIADO ASSINTÊNCIA SOCIAL', 'COLEGIADO ASSINTÊNCIA SOCIAL', 2, 0),
(53, 35, '2023-05-23 08:30:00', '2023-05-19 11:30:00', 'REUNIÃO COM EQUIPE CASTELLO BRANCO', 'REUNIÃO COM P. CASTELLO BRANCO, TOPOGRAFIA E CONSÓRCIO LAMBARI - COND. INDUSTRIAL', 2, 0),
(54, 16, '2023-06-05 13:00:00', '2023-06-05 18:00:00', 'DESLOCAMENTO PARA JABORÁ RODA CONVERSA HABITAÇÃO', 'DESLOCAMENTO PARA JABORÁ RODA CONVERSA HABITAÇÃO', 1, 1),
(55, 31, '2023-05-19 08:00:00', '2023-05-19 17:00:00', 'PIRATUBA', 'ELABORAÇÃO DE UM PROJETO DE UM CENTRO CULTURAL PARA O MUNICÍPIO.( TOPOGRAFIA (NILSON/MARCIO)', 1, 2),
(56, 31, '2023-05-23 08:00:00', '2023-05-23 17:00:00', 'SEARA', 'LEVAR ASSITENTE SOCIAL REUNIAO ( NEUSA)', 1, 2),
(57, 16, '2023-06-26 08:30:00', '2023-06-26 11:30:00', 'REUNIÃO COLEGIADO DEFESA CIVIL', 'REUNIÃO COLEGIADO DEFESA CIVIL', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_tipo`
--

CREATE TABLE `agenda_tipo` (
  `agt_cod` int(11) NOT NULL,
  `agt_descricao` text NOT NULL,
  `agt_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda_tipo`
--

INSERT INTO `agenda_tipo` (`agt_cod`, `agt_descricao`, `agt_situacao`) VALUES
(1, 'VEÍCULO', 1),
(2, 'SALA DE REUNIÕES', 1);

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

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`ati_cod`, `ati_data`, `ati_descricao`, `ati_solicitante`, `ati_cargo`, `ati_tempo`, `ati_situacao`, `usu_cod`, `sol_cod`, `sol_status`, `cli_cod`, `afr_cod`, `atp_cod`) VALUES
(1, '2023-05-02', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 9, 1, 1, 0, 6, 1),
(2, '2023-05-02', 'Foi formatado o computador da sala do Israel.', '', '', '03:00:00', 1, 9, 1, 2, 2, 4, 3),
(3, '2023-05-02', 'Auxiliado Israel com a criação de um planilha no Excel', 'ISRAEL', 'TI', '02:00:00', 1, 9, 0, 2, 2, 1, 2),
(4, '2023-05-02', 'Estarei indo até a sua cidade no dia 10/05 para realizar este atendimento.', '', '', '00:00:00', 1, 9, 1, 1, 2, 4, 1),
(5, '2023-05-03', 'Conversa e Orientação sobre problemas com DCTF da Secretaria Municipal de Educação - sugerido enviar a DCTF e providencias a alteração da Natureza Juridica da Secretaria para Fundo Municipal', 'LEANDRO', 'CONTADOR', '10:00:00', 1, 14, 0, 2, 3, 1, 5),
(6, '2023-05-03', 'Envio de documentos e copias do Processo Administrativo sobre a auditoria do Tribunal de Contas do Estado, conversa telefônica e repassado informações da situação atual do processo', 'KIKO CANALLE', 'PREFEITO', '15:00:00', 1, 14, 0, 2, 13, 2, 6),
(7, '2023-05-03', 'esclarecimento sobre movimento econômico e pedido de material para suporte ', 'SARA ', 'FISCAL DE TRIBUTOS ', '00:15:00', 1, 37, 0, 2, 4, 2, 5),
(8, '2023-05-03', 'Solicitação de documentos para reunião com Presidente do IMA em Florianópolis', 'PAULO', 'PREFEITO', '01:00:00', 1, 33, 0, 2, 11, 1, 5),
(9, '2023-05-03', 'Resposta referente minuta de Lei do Conselho do meio Ambiente e regimento Interno.', 'BORDIN', 'ADVOGADO', '01:00:00', 1, 33, 0, 2, 14, 3, 5),
(10, '2023-05-03', 'Reunião com Neusa e repasse de Documentos do Consórcio Lambari para captação de recursos para a Cultura através do colegiado.  ', 'NEUSA', 'ASSISTENTE SOCIAL', '01:00:00', 1, 33, 0, 2, 17, 4, 5),
(11, '2023-05-03', 'Solicitar esclarecimentos para o órgão ambiental relativos a informação técnica n° 7932/2022  ', 'CHIARELO', 'ENGENHEIRO CIVIL', '00:15:00', 1, 34, 0, 2, 13, 1, 5),
(12, '2023-05-03', 'Verificação dos documentos junto a empresa GRANOLLA DE PRODUTOS SAUDÁVEIS LTDA.\r\nA empresa caiu na malha de auditoria, abaixo a  solicitação do Auditor :\r\nAnalisando o relatório das NFEs, oriundo do SAT, em anexo, verificou-se erro de digitação na NF 1.707, lançada no CFOP 5.927 no valor de R$78.963.360,00 o que causou a discrepância entre os valores de entradas e os valores de saídas.\r\n', 'RENATE ', 'TÉCNICA TRIBUTÁRIA ', '01:30:00', 1, 37, 0, 2, 4, 4, 5),
(13, '2023-05-03', 'FORMATAÇÃO DE NOTEBOOK COM TROCA DE HD PARA HD SSD - NOTEBOOK ACER PAT: 2356', 'ANDRESSA', 'EDUCAÇÃO', '02:00:00', 1, 13, 0, 2, 12, 6, 3),
(14, '2023-05-03', ' FASE DE AUDITORIA PARA COMPROVAÇÃO DE DOCUMENTOS SOLICITADOS PELO AUDITOR \r\nINÍCIO 03/05/2023 Á 19/05/2023', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '05:00:00', 1, 37, 0, 2, 17, 4, 4),
(15, '2023-05-03', 'Acesso remoto configuração sistema anydesk para acesso de um pc para outro.', 'VANESSA', 'TESOURARIA', '00:15:00', 1, 13, 0, 2, 12, 2, 4),
(16, '2023-05-03', 'ACESSO PORTAL MUNICIPAL ADICIONAR ARQUIVO EM CONCURSO PUBLICO 01/2023 - ', 'MARILENE', 'RH', '00:10:00', 1, 13, 0, 2, 24, 1, 4),
(17, '2023-05-03', 'Envio de certificado do curso sobre retenção IRRF e INSS', 'ARGEU ALBIERO', 'CONTADOR', '05:00:00', 1, 14, 0, 2, 4, 3, 6),
(18, '2023-05-03', 'Acompanhamento e gravação Reunião Educação - Transporte Escolar pelo app ZOOM ', 'NEUSA', 'SOCIAL', '01:00:00', 1, 13, 0, 2, 17, 4, 5),
(19, '2023-05-03', 'Elaboração de Projeto de Recapeamento Asfáltico  das Ruas São Roque e Cardeal Câmara ', 'CLEVSON RODRIGO FREITAS', 'PREFEITO ', '07:00:00', 1, 28, 0, 1, 9, 7, 7),
(20, '2023-05-03', 'Requer relatório do Movimento Econômico referente ao ano base de 2022 de todas as empresas ', 'JAMIR ANTONIO GRISA', 'SECRETÁRIO AGRICULTURA ', '00:30:00', 1, 37, 0, 1, 7, 1, 5),
(21, '2023-05-03', 'Acesso servidor atualização sistema betha tributos.', 'MAIRA', 'TRIBUTOS', '00:20:00', 1, 13, 0, 2, 25, 1, 4),
(22, '2023-05-03', 'PROJETO DE AMPLIAÇÃO DO CENTRO DE EDUCAÇÃO INFANTIL CHAPEUZINHO VERMELHO.CONCLUÍDO PROJETO ELÉTRICO E EM ANDAMENTO PROJETO PREVENTIVO.', 'ROSEMERI', 'ARQUITETA', '00:10:00', 1, 27, 0, 1, 5, 1, 5),
(23, '2023-05-03', 'Atendimento telefônico e transferência ao setor.', 'JESSICA', 'CIEE', '00:05:00', 1, 19, 0, 2, 18, 2, 5),
(24, '2023-05-03', 'Conferência de guias referente a produção Cis Amauc competência 04/2023. Verificação de NFs e boletos e lançamento nas planilhas.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '06:00:00', 1, 19, 0, 1, 16, 4, 5),
(25, '2023-05-03', 'Reunião do Grupo GAAVA com apresentações de dois grupos de trabalho sobre as trading se geram valor adicionado sim ou não \r\ncom votação de todos os integrantes do Grupo do Movimento Econômico ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '02:40:00', 1, 37, 0, 2, 17, 5, 2),
(26, '2023-05-03', 'Contato com IMA - Codan Concórdia referente Licença Loteamento Baixa renda ', 'DAVI', 'SECRETÁRIO', '00:30:00', 1, 33, 0, 1, 9, 1, 5),
(27, '2023-05-03', 'Pagamento de Arts serviços prestados para o Município, geração de novos boletos aditivo. ', 'FABIELE', 'SECRETARIA DE MEIO AMBIENTE', '00:30:00', 1, 33, 0, 2, 4, 1, 5),
(28, '2023-05-03', 'Reunião interna, organização das atividades e atendimento aos Municípios ', 'CLAUDIA', 'DIRETORA', '02:00:00', 1, 33, 0, 2, 18, 4, 2),
(29, '2023-05-03', 'Acesso reinstalação de software de impresspora para scanner ', 'ROSE ', 'IDENTIDADES', '00:20:00', 1, 13, 0, 2, 14, 1, 4),
(30, '2023-05-03', 'Contato para agendamento de visita e reunião referente a solicitação de abertura de Trilha no Centro de Eventos.', 'JABORA', 'PREFEITO', '00:30:00', 1, 35, 0, 1, 9, 1, 5),
(31, '2023-05-03', 'Reunião interna para verificação e levantamento de processos e solicitações em andamento.', 'CONSÓRCIO LAMBARI', 'DIRETORA', '02:00:00', 1, 35, 0, 2, 18, 4, 5),
(32, '2023-05-03', 'SOLICITADO AUXILIO COM DESCRIÇÃO DE EDITAL PARA LICITAÇÃO DE INTERNET NA PREFEITURA E ANEXOS. ENVIADO EDITAL MODELO DE XAVANTINA.', 'ALUISIO', 'SEC ADM', '00:10:00', 1, 13, 0, 2, 7, 1, 4),
(33, '2023-05-03', 'Atendimento e transferência ao setor responsável.', 'ELAINE', 'LIVRARIA PROGRESSO', '00:05:00', 1, 19, 0, 2, 17, 2, 5),
(34, '2023-05-03', 'Levantamento de fauna, para abertura de pavimentação em Três de Outubro.', 'ANDRESSA', 'DIRETORA DO MEIO AMBIENTE', '04:00:00', 1, 36, 0, 1, 4, 4, 8),
(35, '2023-05-03', 'Suporte remoto servidor de internet da prefeitura de Irani, cadastro de dois endereço de Ip e seu endereço de MAC para acesso a rede de internet. ', 'GUSTAVO', 'TI', '00:30:00', 1, 12, 0, 2, 7, 8, 4),
(36, '2023-05-03', 'Acesso portal municipal criação de página \"vagas de emprego\" e incluir banner na pagina inicial.', 'MATHEUS', 'C. INTERNO', '00:10:00', 1, 13, 0, 2, 14, 1, 4),
(37, '2023-05-03', 'Reunião interna para verificação e sugestões  de processos que estão em andamento.', 'CLAUDIA', 'DIRETORA ADMINISTRATIVA', '01:00:00', 1, 36, 0, 2, 18, 4, 10),
(38, '2023-05-03', 'Reunião com técnicas da prefeitura de Irani referente  ao licenciamento do Cemitério Municipal  ', 'TIZA', 'SEC. PLANEJAMENTO', '01:00:00', 1, 33, 0, 2, 7, 4, 5),
(39, '2023-05-03', 'Download dos arquivos transmitidos para Sef das notas digitados dos municípios, para importar em outro sistema para emissão dos relatórios.', 'RENATE', 'MOVIMENTO ECONÔMICO', '00:30:00', 1, 12, 0, 2, 17, 7, 5),
(40, '2023-05-03', 'Reunião no IMA - Codan Concórdia - Referente ao Processo de licenciamento do Cemitério. Arquivamento do processo antigo FCEI: 549359, processo; DIV/23440/CAU. Será iniciado um novo processo de Licenciamento incluindo a área nova do cemitério e a capela mortuária. ', 'TIZA', 'SEC. PLANEJAMENTO', '00:30:00', 1, 33, 0, 2, 7, 4, 10),
(41, '2023-05-03', 'Auxilio para emissão de relatório das notas fiscais eletrônicas dos produtores rurais no site da Sef. ', 'IVO', 'BLOCO DO PRODUTOR', '00:10:00', 1, 12, 0, 2, 15, 8, 4),
(42, '2023-05-03', 'Reunião na sede da AMAUC para alinhamento das pendencias referente ao processo DIV/23440/CAU - FCEI 549359, no mesmo momento conseguimos agendar e nos reunir com o Gerente e técnicos do IMA para determinação do arquivamento deste mesmo processo e posteriormente iniciado um processo novo, com as informações adequadas e corretas.\r\nAguardar Prefeitura fazer a nova solicitação e nos repassar as informações atualizadas pertinentes ao processo.', 'IRANI', 'SECRETARIA DE PLANEJAMENTO', '02:00:00', 1, 35, 0, 2, 7, 4, 10),
(43, '2023-05-03', 'Tentativas de acesso ao Sistema SIGEF para verificação das NF lançadas referente a prestação de contas do Projeto RECUPERAR, bem como, repassar a verificação nos volumes físicos para procurar novas NF não lançadas.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:30:00', 1, 35, 0, 1, 18, 4, 6),
(44, '2023-05-03', 'Início do auxilio ao estudo em andamento - Estudo Ambiental Simplificado - EAS referente a LAO CORRETIVA do Parque de Exposições de Concórdia.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '00:30:00', 1, 35, 0, 1, 4, 4, 7),
(45, '2023-05-03', 'Elaborar relatório qualitativo e ecológico de uma área de Compensação da Prefeitura municipal em Barra do Tigre/ interior, Concórdia/ SC.', 'ANDRESSA ', 'DIRETORA DE MEIO AMBIENTE ', '03:00:00', 1, 34, 0, 2, 4, 4, 8),
(46, '2023-05-03', 'Reunião para atualização de atividades e licenciamentos pendentes. ', 'CLÁUDIA ', 'DIRETORA ADMINISTRATIVA ', '02:00:00', 1, 34, 0, 2, 18, 4, 10),
(47, '2023-05-04', 'Contato, preenchimento dos formulários e envio de documento para o CIEE, para formalizar convenio - contratação de estagiários. ', 'CLAUDIA', 'DIR. ADM', '01:00:00', 1, 33, 0, 1, 18, 3, 6),
(48, '2023-05-04', 'Reunião com todos os auditores convocados pela Secretaria da Fazenda SC para esclarecer dúvidas sobre os trabalhos de Auditoria início 8:30hs ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '01:50:00', 1, 37, 0, 2, 17, 5, 10),
(49, '2023-05-04', 'Conversa e orientação por telefone com Leandro sobre abertura de credito adicional com Superávit de Convenio para devolução dos valores das sobras', 'LEANDRO', 'CONTADOR', '00:05:00', 1, 14, 0, 2, 3, 2, 5),
(50, '2023-05-04', 'Encaminhar ART e boleto do projeto elétrico e PPCi do centro de Educação Infantil Chapeuzinho Vermelho.', 'ROSEMERI', 'ARQUITETA', '00:10:00', 1, 27, 0, 1, 5, 1, 6),
(51, '2023-05-04', 'Votação GAAVA Trading 2023: As operações de importação por conta e ordem de terceiros geram valor adicionado?\r\nApós o resultado da votação a Secretaria da Fazenda encaminhará para o Procurador do Estado para dar parecer', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '00:15:00', 1, 37, 0, 2, 17, 5, 10),
(52, '2023-05-04', 'Acesso servidor para atualização de sistema betha folha.', 'MARILENE', 'RH', '00:20:00', 1, 13, 0, 2, 5, 1, 4),
(53, '2023-05-04', 'Plano de emergência do PPCI do Centro de Educação Infantil Chapeuzinho Vermelho.(detalhamento e distribuição interna).', 'ROSEMERI', 'ARQUITETA', '07:00:00', 1, 27, 0, 1, 5, 7, 7),
(54, '2023-05-04', 'Conversa com os técnicos do Setor sobre Projeto de Engenharia para pavimentação em Jaborá, e Projeto preventivo para para Ginásio de Peritiba', 'SETOR DE ENGENHARIA', 'SETOR DE ENGENHARIIA', '00:30:00', 1, 14, 0, 1, 17, 4, 11),
(55, '2023-05-04', 'Backup do sistema Betha FolhaRh e envio para o FTP da Betha.', 'JACKSON - BETHA SISTEMAS', 'TI', '00:15:00', 1, 12, 0, 2, 9, 8, 4),
(56, '2023-05-04', 'Reunião com Topografia referente a troca de área verde (desafetação) do Loteamento Elizabete Hermes.', 'PAULO', 'PREFEITO', '00:30:00', 1, 33, 0, 1, 11, 4, 5),
(57, '2023-05-04', 'Resposta  e protocolo -   informação técnica 978/2023 - PRAD - Cascalheira linha Acordi - Lindóia do Sul - SC.', 'ALAN', 'TECNICO AGRICULTURA', '02:00:00', 1, 33, 0, 1, 10, 4, 5),
(58, '2023-05-04', 'PDF do Mapa de Supressão do Terreno da Igreja, Seara- SC.', 'MARCELA', 'BIOLOGA', '00:10:00', 1, 30, 0, 2, 18, 7, 9),
(59, '2023-05-04', 'Cadastros dos usuários para acesso ao servidor de dados, após exclusão dos usuários antigos e liberação para acesso as pastas dos usuários do seu departamento.', 'ADRIANO', 'TI', '02:00:00', 1, 12, 0, 2, 11, 8, 4),
(60, '2023-05-04', 'Participação em reunião do Colegiado de Esportes da Amauc para deliberar e decidir sobre os JIDOS - Jogos dos Idosos da Amauc ', 'COLEGIADO DE ESPORTES', 'COLEGIADO', '02:00:00', 1, 14, 0, 2, 17, 4, 10),
(61, '2023-05-04', 'Foi enviado em pdf memorial descritivo e mapa do cemitério do centro com assinatura digital', 'IGORI', 'ENG', '03:00:00', 1, 23, 0, 2, 6, 3, 6),
(62, '2023-05-04', 'Atendimento telefônico e repasse de recado para setor de informática.', 'FLAVIO', 'DESPACHANTE', '00:05:00', 1, 19, 0, 2, 17, 2, 5),
(63, '2023-05-04', 'Verificação do andamento Seminário do Solo, agua e clima - Contatos com palestrantes. ', 'JOÃO NICODEM', 'SE. AGRICULTURA', '00:15:00', 1, 33, 0, 1, 6, 1, 5),
(64, '2023-05-04', 'Encaminhamento de situação de abastecimento provisório, pessoal interno fez pesquisa em 4 postos, levantado o mais barato para abastecer ate novo procedimento de licitação - licitação anterior fracassada sem participantes', 'AMAUC', 'AMAUC', '00:10:00', 1, 14, 0, 1, 17, 4, 11),
(65, '2023-05-04', 'Assessoramento em projeto de acessibilidade do pavimento da AMAUC.', 'SR MOACIR', 'FAZ TUDO', '01:00:00', 1, 25, 0, 1, 17, 4, 11),
(66, '2023-05-04', 'Contato com palestrantes para o Seminário \"Clima, solo e agua\" que será realizado em Setembro no município de Ipumirim', 'JOAO ', 'SEC. AGRICULTURA', '00:30:00', 1, 33, 0, 1, 6, 1, 5),
(67, '2023-05-04', 'Suporte remoto micro da engenharia, ajuste no bat para mapeamento da rede interna da prefeitura para acesso ao departamento de tributos.', 'DANIEL', 'ENGENHEIRO', '00:05:00', 1, 12, 0, 2, 11, 8, 4),
(68, '2023-05-04', 'Continuidade do levantamento de fauna, para abertura de pavimentação em Três de Outubro.', 'ANDRESSA', 'DIRETORA DO MEIO AMBIENTE', '03:00:00', 1, 36, 0, 1, 4, 4, 8),
(69, '2023-05-04', 'Encaminhamento de documentos para assinatura, referente a Licença do Parque de exposições. ', 'ANDRESSA', 'DIR. MEIO AMBIENTE', '00:15:00', 1, 33, 0, 1, 4, 3, 5),
(70, '2023-05-04', 'Solicitação  do Auditor do Movimento Econômico para esclarecer  os lançamentos em CFOP não válido (2949)  nas entradas e justifique onde está a contrapartida do lançamento em CFOP válido esta empresa ficou na malha  de auditoria \r\nenviado pedido de esclarecimento ao contador da empresa  Alécio W. Ferreira Pimenta  ', 'RENATE ', 'TÉCNICA TRIBUTÁRIA ', '00:25:00', 1, 37, 0, 2, 4, 3, 8),
(71, '2023-05-04', 'Estudo em fase de finalização - Estudo Ambiental Simplificado - EAS referente a LAO CORRETIVA do Parque de Exposições de Concórdia.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '04:00:00', 1, 35, 0, 1, 4, 4, 7),
(72, '2023-05-04', 'Coordenação e acompanhamento de  reunião mensal ordinária do Colegiado Regional de Cultura da AMAUC  realizada  de  forma presencial,  no  municipio de Ipira  sob assessoria da  consultora    Roselaine  Vinhas para  fins de  deliberar  sobre:  Informações e organização da  participação regional do  IV  Forum  Catarinense  de Cultura a ser realizado de  10a  12 de maio no  municipio de Lages SC; Conferências Intermunicipais de Cultura;  Explanação sobrea Lei Paulo Gustavo; Premio Boas Práticas de Gestão Municipal e regional da Politica da Cultura-  Nº de  participantes: 23', 'ROSEMERY  SPAZINI', 'SECRETARIO MUNICIPAL', '04:00:00', 1, 18, 0, 2, 17, 4, 10),
(73, '2023-05-04', 'REUNIÃO COM EQUIPE DO CONSÓRCIO LAMBARI, TOPOGRAFIA E GEOLÓGA REFERENTE AOS PROCESSOS À SEREM ENCAMINHADOS AO IMA DA ATIVIDADE DE  CASCALHEIRAS.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:00:00', 1, 35, 0, 2, 18, 5, 10),
(74, '2023-05-04', 'Acesso remoto criação e configuração de e-mail novo infraestrutura@jabora.sc.gov.br em computador, ativação de sistema em notebook, recuperação de senha de email (infrajabora2023@gmailcom).', 'TALITA', 'INFRAESTURURA', '01:00:00', 1, 13, 0, 2, 9, 8, 4),
(75, '2023-05-04', 'Participação em reunião entre equipe técnica do Consorcio Lambari e Topografia da Amauc para delinear sobre a regularização das cascalheiras e traçado o plano de trabalho de como efetuar o inicio dessa regularização', 'AMAUC/LAMBARI', 'SEC EXECUTIVO', '01:30:00', 1, 14, 0, 2, 17, 4, 10),
(76, '2023-05-04', 'Participado de reunião com os técnicos do movimento economico e com Munaretto, onde foram apresentados e discutidos diversos temas', 'MOVIMENTO ECONOMICO', 'MOVIMENTO ECONOMICO', '04:00:00', 1, 14, 0, 2, 17, 4, 10),
(77, '2023-05-04', 'Trabalhos internos na Secretaria Executiva como o contato com técnicos do TCE sobre reunião da segunda-feira dia 08/05, elaborado e repassado pauta da reunião de contadores da terça feira dia 09/05, elaborado oficio para solicitação de terreno para sede da Amauc', 'VANDERLEI', 'SEC EXECUTIVO', '03:30:00', 1, 14, 0, 1, 17, 4, 11),
(78, '2023-05-04', 'Mapa de compensação URB/25675/CAU de Linha Salto da Praia, Presidente Castelo Branco- SC.', 'MARCELA', 'BIOLOGA', '06:00:00', 1, 30, 0, 2, 18, 7, 9),
(79, '2023-05-04', 'Realizado a inscrição da solicitante no XI Fórum Catarinense de Gestores Municipais de Cultura, pois a mesma não estava conseguindo.', 'ROSIMERI', 'SEC CULTURA', '00:20:00', 1, 13, 0, 2, 5, 1, 4),
(80, '2023-05-04', 'Levantamento do terreno da prefeitura onde hoje é instalado o Fórum do município, Ipumirim- SC.\r\nLevantamento finalizado dia 08/05/2023\r\nFuncionario: Marcelo e Marcio', 'MATHEUS', 'FISCAL', '07:00:00', 1, 30, 0, 2, 6, 4, 8),
(81, '2023-05-04', 'Protocolado Declaração ambiental para renovação Certidão  Prainha de Itá.', 'LINDOMAR', 'DIRETOR DO MEIO AMBIENTE', '00:30:00', 1, 36, 0, 2, 8, 9, 5),
(82, '2023-05-04', 'Reunião com Engenharia/ topografia consórcio Lambari e Geóloga referente ao Licenciamento das Cascalheiras dos Municipios da area de abrangência da AMAUC/Consórcio Lambari. ', 'VANDERLEI', 'SEC. EXECUTIVO', '01:00:00', 1, 33, 0, 2, 17, 4, 10),
(83, '2023-05-04', 'Solicitação de atividades ambientais para serem realizadas em Itá durante o ano -  formulário - Certificação Bandeira Azul. Analise dos documentos ', 'LINDOMAR', 'DIRETOR MEIO AMBIENTE', '01:00:00', 1, 33, 0, 1, 8, 1, 5),
(84, '2023-05-04', 'Coordenação da  Reunião  mensal ordinária  do Colegiado de educação da AMAUC, realizada na sala de  reuniões da AMAUC, com a participação do assessor  Humberto Dalpizol  para delibera sobre as  seguintes  questões:  Integração de ações co o Colegiado de  Nutricionistas , Planilha de  Gestão  Transporte Escolar- Airton AMARP CAÇADOR;  Proposta de  trabalho SICRED/ Concórdia- Educação  Financeira´/ Professores Rede de ensino Municipal; Projeto  pela não violência  nas  escolas; Grupos de Trabalho área da  Educação; Planilhas cargos e salários  Professores e auxiliares de Classe- rede Publica  Municipal; Programa  jogos interativos  nas Escolas;  Viagem Brasília.  Número de  PARTICIPANTES:  20', 'LUCIANA  NILSON', 'SECRETÁRIO  MUNICIPAL DE EDUCAÇÃO', '07:00:00', 1, 18, 0, 2, 17, 4, 10),
(85, '2023-05-04', 'Coordenação de  reunião com integrantes do Colegiado  regional de Esportes da AMAUC realizada  na sala de  reuniões em  CONCÓRDIA,  NA DATA DE  04/04 DAS  08:30 ÁS 10;30  horas  para  deliberar  sobre a realização da  data de  realização dos Jogos de Integração dos Idosos da  região AMAUC ,  previstos  para serem realizados  na data de  02 de  junho em Concórdia;  alterações  das regras de algumas das  modalidades;  prazo de  inscrição dos atletas  nas  modalidades  propostas; redefiniçao de programação. municípios participantes:  Concórdia; ARABUTÃ;  Ipumirim; Lindóia; Pres. Castello; Jaborá; Peritiba; Seara;;  Nesta  oportunidade  tambem deliberou-se pela organização da  Mostra  Cultural   Regional da  AMAUC. ', 'ALEXANDRE SCHNEIDER', 'SECRETARIO MUNICIPAL ESPORTES DE CONCÓRDIA', '02:00:00', 1, 18, 0, 2, 17, 4, 10),
(86, '2023-05-04', ' Participação do  Profissional de Serviço Social, de  reunião  ordinária de  foram remota, para obter  informações sobrea  gestão da politica da Assistência  Social, das  10:00 ás  12:30  horas.  ', 'COLEGIADO ESTADUAL DE GESTORES  MUNICIPALIS DE ASSISTENCIA  SOCIAL SC', 'REUNIÃO ON LINE', '02:30:00', 1, 18, 0, 2, 17, 8, 2),
(87, '2023-05-04', 'Levantamento e conferência das notas fiscais da empresa NOMA DO BRASIL S/A referente ao ano base 2022 (empresa auditada ) ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '02:15:00', 1, 37, 0, 2, 4, 7, 5),
(88, '2023-05-04', 'FASE DE AUDITORIA PARA COMPROVAÇÃO DE DOCUMENTOS SOLICITADOS PELO AUDITOR INÍCIO 03/05/2023 Á 19/05/2023', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '01:05:00', 1, 37, 0, 1, 17, 7, 8),
(89, '2023-05-04', 'Conferência de guias referente a produção Cis Amauc competência 04/2023. Lançamento e controle nas planilhas, após conferência de NFs e boletos.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '06:30:00', 1, 19, 0, 1, 16, 4, 5),
(90, '2023-05-04', 'Suporte remoto servidor de internet da prefeitura de Irani, substituição do endereço MAC da placa de rede cadastrada no servidor, mantendo o mesmo endereço de Ip.', 'GUSTAVO', 'TI', '00:05:00', 1, 12, 0, 2, 7, 8, 4),
(91, '2023-05-04', 'Suporte remoto computadores do CRAS, compartilhamento de impressora e configuração nos computadores para imprimir na impressora compartilhada.', 'EDSON', 'TI', '00:30:00', 1, 12, 0, 1, 10, 8, 4),
(92, '2023-05-04', 'Elaboração de Projeto de Recapeamento Asfáltico das Ruas São Roque e Cardeal Câmara', 'CLEVSON RODRIGO FREITAS', 'PREFEITO ', '07:00:00', 1, 28, 0, 1, 9, 7, 7),
(93, '2023-05-04', 'Suporte remoto servidor de dados, configuração dos bat de execução de rotina para mapeamento da rede dos usuários com servidor de dados.', 'ADRIANO', 'TI', '00:30:00', 1, 12, 0, 1, 11, 8, 4),
(94, '2023-05-04', 'Acesso portal municipal adicionar banner e link para processo seletivo 01/2023.', 'ANDREIA', 'PROC SELETIVO', '00:30:00', 0, 13, 0, 2, 17, 3, 5),
(95, '2023-05-04', 'Desenvolvimento de projeto 3D da Rua Coberta de Presidente Castello Branco.', 'VANESSA FRANCZAK', 'ARQUITETA', '06:00:00', 1, 25, 0, 1, 12, 4, 7),
(96, '2023-05-04', 'Reunião com o Consórcio Lambari, Engenharia, Topografia, e Geóloga para definir processos de licenciamentos a serem encaminhados ao IMA sobre cascalheiras. ', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '01:00:00', 1, 36, 0, 2, 17, 4, 10),
(97, '2023-05-04', 'Desenvolvimento de projeto 3D de Piscina comunitária de Peritiba.', 'VANESSA FRANCZAK', 'ARQUITETA', '06:00:00', 1, 25, 0, 1, 11, 4, 7),
(98, '2023-05-04', 'Relatório mensal.', 'AMAUC', 'AMAUC', '00:30:00', 1, 25, 0, 2, 17, 3, 6),
(99, '2023-05-04', 'Desenvolvimento de proposta de projeto Arquitetônico de rua coberta para P.C.B. .', 'VANESSA FRANCZAK', 'ARQUITETA', '07:00:00', 1, 25, 0, 1, 12, 4, 7),
(100, '2023-05-05', 'Esclarecimento de dúvidas referente ao credenciamento junto ao CIS.', 'RAFAEL', 'MEDICO PEDIATRA', '00:10:00', 1, 19, 0, 2, 16, 2, 5),
(101, '2023-05-05', 'Suporte remoto para atualização do sistema Esus para nova versão 5.1.15.', 'TI AMAUC', 'TI', '00:05:00', 1, 12, 0, 2, 9, 8, 3),
(102, '2023-05-05', 'Suporte servidor do sistema Esus, atualização do sistema para nova versão 5.1.15.', 'TI AMAUC', 'TI', '00:15:00', 1, 12, 0, 2, 8, 8, 3),
(103, '2023-05-05', 'Acesso portal municipal, criação e inserir banner com link para processo seletivo 01/2023 - Irani', 'ANDREIA', 'PROC SELETIVO', '00:30:00', 1, 13, 0, 2, 7, 3, 4),
(104, '2023-05-05', 'Acesso remoto, auxilio e configuração de propriedades de scanner.', 'SONIA', 'ABRIGO ANJO GABRIEL', '00:20:00', 1, 13, 0, 2, 4, 1, 4),
(105, '2023-05-05', 'mapa de  compensasao de área verde,  proximo a creche ( enviado por watssap prefeito)', 'PREFEITO', 'PREFEITO', '07:00:00', 0, 29, 0, 1, 11, 7, 9),
(106, '2023-05-05', 'cadastro de cerca no colegio vila eletrosul', 'FRANCIELI', 'ENGENHEIRA CIVIL', '07:00:00', 0, 29, 0, 1, 8, 4, 8),
(107, '2023-05-05', 'Foi solicitada ART da área do cemitério no centro na Rua 07 de abril, feita, mandada em pdf com assin digital Área 2.961,614 m²', 'IGORI', 'ENG', '01:00:00', 1, 23, 0, 2, 6, 3, 13),
(108, '2023-05-05', 'assr', 'AS', 'AS', '00:00:00', 0, 1, 0, 2, 2, 1, 2),
(109, '2023-05-05', 'Formatação notebook da sec de infraesturura de jaborá.', 'EMERSON', 'INFRAESTRUTURA', '01:30:00', 1, 13, 0, 2, 9, 7, 3),
(110, '2023-05-05', 'Acesso remoto atualização de sistema office. \r\nHavia erro em uma planinha excel.', 'TACIANE', 'ENGENHEIRA', '01:00:00', 1, 13, 0, 2, 14, 8, 4),
(111, '2023-05-05', 'Atualização do sistema Betha FolhaRh.', 'KIM', 'RH', '00:10:00', 1, 12, 0, 3, 9, 8, 4),
(112, '2023-05-05', 'PPCI DO CENTRO DE EDUCAÇÃO INFANTIL CHAPEUZINHO VERMELHO( ELABORAÇÃO DE JUSTIFICATIVA,F-2, CADASTRO NO CORPO DE BOMBEIROS RE, CONFERIR  E PASSAR ARQUIVOS PARA PDF).', 'ROSEMERI', 'ARQUITETA', '03:30:00', 1, 27, 0, 1, 5, 7, 7),
(113, '2023-05-05', 'Elaboração de uma proposta de  Programa de educação ambiental para a Prainha. ', 'LINDOMAR', 'DIRETOR MEIO AMBIENTE', '02:00:00', 1, 33, 0, 1, 8, 4, 10),
(114, '2023-05-05', 'Acesso remoto, configuração e limpeza de cabeçote impressora colorida... não estava imprimindo cor magenta.', 'VANESSA ', 'SAUDE ', '00:30:00', 0, 1, 0, 2, 9, 8, 3),
(115, '2023-05-05', 'Acesso remoto, configuração e limpeza de cabeçote impressora colorida... não estava imprimindo cor magenta.', 'VANESSA ', 'SAUDE', '00:30:00', 1, 13, 0, 2, 9, 8, 3),
(116, '2023-05-05', 'Contato solicitando a senha do e-mail do cras@jabroa.sc.gov.br, pois estava dando erro de acesso ao outlook. ', 'MARLI ', 'CRAS ', '00:10:00', 1, 13, 0, 2, 9, 1, 4),
(117, '2023-05-05', 'Acompanhamento da reuniao Amauc/Hacklab pela plataforme do Zoom. ', 'NEUSA', 'SOCIAL', '01:00:00', 1, 13, 0, 2, 17, 7, 10),
(118, '2023-05-05', 'Acesso portal do consorcio lambari, publicação de noticia ( IMA )', 'SABRINE', 'BIOLOGA', '00:10:00', 1, 13, 0, 2, 18, 7, 4),
(119, '2023-05-05', 'Acesso remoto, instalação de versao antiga da dirf 2023 para retificação.', 'ANA SHIRLE', 'RH', '00:30:00', 1, 13, 0, 2, 7, 8, 4),
(120, '0000-00-00', 'Conferencia documentos LAO Corretiva Parque de exposições de Concórdia. ', 'ANDRESSA', 'DIRETOR MEIO AMBIENTE', '01:00:00', 1, 33, 0, 1, 4, 4, 5),
(121, '0000-00-00', 'Solicitação de área de compensação ambiental das ameaçadas de extinção que serão suprimidas para abertura da Rua Osvaldo Aranha na comunidade de 03 de outubro ', 'ANDRESSA', 'DIRETOR MEIO AMBIENTE', '00:15:00', 1, 33, 0, 1, 4, 1, 5),
(122, '2023-05-05', ' AUDITORIA PARA COMPROVAÇÃO DE DOCUMENTOS SOLICITADOS PELO AUDITOR MUNICÍPIO DE CONCÓRDIA ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '03:50:00', 1, 37, 0, 2, 4, 8, 5),
(123, '2023-05-05', 'solicitação relatório das notas fiscais eletrônicas para baixar no programa Consimples do município de Arabutã ', 'RENATE ', 'MOVIMENTO ECONÔMICO ', '00:25:00', 1, 37, 0, 2, 17, 8, 8),
(124, '2023-05-05', 'Trabalhos na Amauc na Secretaria Executiva com preparação de edital 02/2023 para aquisição de combustivel para Amauc e Consórcios. atendimentos Diversos, continuação da Digitação dos Balancetes mensais de Prestação de contas e diversas outras atividades internas', 'VANDERLEI', 'SECRETARIO EXECUTIVO', '04:30:00', 1, 14, 0, 2, 17, 4, 13),
(125, '2023-05-05', 'Atendimento e Reunião com Alexandre - Diretor do Consórcio CIDAUC para ver o andamento das atividades e informações sobre os trabalhos e andamento do Consórcio', 'ALEXANDRE', 'DIRETOR', '00:30:00', 1, 14, 0, 2, 28, 4, 10),
(126, '2023-05-05', 'Acesso servidor atualização sistema betha tributos.', 'MAIRA', 'TRIBUTOS', '00:35:00', 1, 13, 0, 2, 14, 8, 4),
(127, '2023-05-02', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Peritiba.', 'IZABEL', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 11, 1, 5),
(128, '2023-05-02', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 5),
(129, '2023-05-02', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 10, 1, 5),
(130, '2023-05-02', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 12, 1, 5),
(131, '2023-05-02', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Irani.', 'JAÇANÃ', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 7, 1, 5),
(132, '2023-05-02', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Arabutã.', 'CRISTINA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 3, 1, 5),
(133, '2023-05-02', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Ipira.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 5, 1, 5),
(134, '2023-05-02', 'Verificação dos descontos a serem efetuados nas folhas de pagamento, montagem da planilha, atualização do sistema, lançamento das informações no sistema, conferência e geração das folhas de pagamento, lançamentos dos valores na planilha, geração e conferência dos impostos (FGTS, INSS, PIS e IR) da AMAUC.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '02:30:00', 1, 21, 0, 2, 17, 7, 13),
(135, '2023-05-05', 'Acesso servidor de internet da prefeitura de Jaborá, verificação dos log de erro pois a central telefônica não estava recebendo e nem efetuando ligações. Atualização do firewall e da RouterBoard para versão 7.9.', 'TI AMAUC', 'TI', '00:20:00', 1, 12, 0, 2, 9, 8, 4),
(136, '2023-05-02', 'Treinamento com o Israel sobre novo sistema de uso da Amauc/Cis Amauc/Lambari  e municípios para lançamento de atividades, agendamento de veículos, solicitação de serviços, agendamento da sala de reuniões e prestação de constas.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '01:00:00', 1, 21, 0, 2, 17, 4, 2),
(137, '2023-05-05', 'Acesso remoto servidor de internet da prefeitura de Irani, inclusão de um endereço de Mac da placa de rede, vinculado ao endereço de Ip disponível para acesso a rede.', 'GUSTAVO', 'TI', '00:10:00', 1, 12, 0, 2, 7, 8, 4),
(138, '2023-05-02', 'Reunião com empresa executora da 1ª etapa da revitalização do SER Juventude (reunião na Prefeitura Municipal e visita in loco).', 'GABRIELA GRISA ', 'ARQUITETA', '03:00:00', 1, 24, 0, 2, 10, 4, 10),
(139, '2023-05-02', 'Elaboração de proposta de projeto da piscina pública aquecida.', 'PAULO DEITOS', 'PREFEITO', '03:30:00', 1, 24, 0, 1, 11, 7, 7),
(140, '2023-05-03', 'Reunião sobre projeto estrutural e preventivo de incêndio do SER Juventude. Discussões sobre execução de projetos complementares.', 'JULIO RECH', 'EMPRESA TERCEIRIZADA', '02:00:00', 1, 24, 0, 2, 10, 4, 10),
(141, '2023-05-03', 'Discussões sobre a proposta da Rua Coberta de Pres. Castello Branco - Vanessa e Elaine - definições de projeto.', 'AMAUC', 'ARQUITETA', '01:00:00', 1, 24, 0, 2, 12, 4, 10),
(142, '2023-05-03', 'Reunião com técnicos (município, AMAUC e Cons. Lambari) e IMA para resolução do licenciamento do cemitério do centro de Irani.', 'THIZA FERREIRA DA SILVA', 'SEC. PLANEJAMENTO', '03:30:00', 1, 24, 0, 2, 7, 4, 10),
(143, '2023-05-04', 'Assessoria em 3 projetos de adequação de acessibilidade - TAC Ministerio Público - dos 3 postos de saude cadastrados (centro, filadélfia e estudantes).', 'SILVANIA', 'ENG. CIVIL', '07:00:00', 1, 24, 0, 2, 5, 4, 11),
(144, '2023-05-05', 'Reunião com equipe de engenharia do municipio e equipe de arquitetura da AMAUC sobre alteração de projeto e atualização de orçamento do projeto de ampliação do posto de saude. Repasse de informações sobre processos em andamento no municipio e auxílio da AMAUC. ', 'RAFAEL MOTCHE', 'ARQUITETO', '02:00:00', 1, 24, 0, 2, 6, 4, 11),
(145, '2023-05-05', 'Conferencia de medidas do clube SER Juventude - verificação sobre divergencia no local, antes da empresa iniciar a execução.', 'GABRIELA GRISA ', 'ARQUITETA', '01:30:00', 1, 24, 0, 2, 10, 4, 8),
(146, '2023-05-05', 'Relatorios e novo sistema - adequação e cadastro de atividades / projetos.', 'VANESSA', 'ARQUITETA', '03:30:00', 1, 24, 0, 2, 17, 4, 13),
(147, '2023-05-05', 'Plotagem da proposta da piscina pública aquecida de Peritiba - 3 copias A1.', 'PAULO DEITOS', 'PREFEITO', '00:30:00', 1, 24, 0, 2, 11, 7, 14),
(148, '2023-05-05', 'Leitura e acertos finais da Cartilha da Criança e Natureza : E o Objetivos dos ODS - Concórdia 2022. ', 'CLAUDIA', 'DIRETORA', '01:00:00', 1, 33, 0, 1, 18, 4, 7),
(149, '2023-05-05', 'ELABORAÇÃO DE UMA PROPOSTA DE EDUCAÇÃO AMBIENTAL (4 ATIVIDADES CRIADAS) PARA A PRAINHA DE ITÁ.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '02:00:00', 1, 35, 0, 2, 18, 4, 10),
(150, '2023-05-05', 'Suporte remoto no servidor de dados da Prefeitura de Peritiba, problemas com falta de espaço na unidade C:. Transferência dos arquivos da unidade d para outra unidade como backup e após exclusão da unidade d para ampliação da unidade c:, depois inclusão da unidade d: e restauração do backup. ', 'ADRIANO', 'TI', '03:00:00', 1, 12, 0, 1, 11, 8, 4),
(151, '2023-05-05', 'Continuação no Estudo Simplificado Ambiental - EAS referente ao Parque de Exposições de Concórdia.\r\nConferencia das documentações necessárias para protocolo', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '02:00:00', 1, 35, 0, 1, 4, 4, 7),
(152, '2023-05-05', 'Vanessa e eu, tivemos com Sr. Rafael para atendimento e assessoramento e projeto de ampliação de posto de saúde.', 'RAFAEL MOTHCY', 'ARQUITETO', '02:00:00', 1, 25, 0, 2, 6, 4, 5),
(153, '2023-05-05', 'Vanessa e eu, fomos ao local para conferir medidas da quadra do Ser Juventude.', 'VANESSA FRANCZAK', 'ARQUITETA', '01:30:00', 1, 25, 0, 2, 10, 4, 8),
(154, '2023-05-05', 'Atendimento e explicações de algumas dúvidas da equipe do município de Arabutã (Edinan) ', 'TÉCNICO', 'MEIO AMBIENTE', '00:40:00', 1, 35, 0, 2, 3, 4, 5),
(155, '2023-05-05', 'Conferência de todos as notas fiscais da GRAFOPEL ETIQUETAS LTDA, empresa que ficou na malha de auditoria, contato com o contador para explicações sobre os lançamentos equivocados. ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '02:15:00', 1, 37, 0, 2, 13, 7, 8),
(156, '2023-05-05', 'Conferência de montagem de móveis e fotos para relatório.', 'AMAUC', 'AMAUC', '00:30:00', 1, 25, 0, 2, 18, 4, 6),
(157, '2023-05-05', 'Desenvolvimento de projeto 3D da rua coberta de P.C.B.', 'VANESSA FRANCZAK', 'ARQUITETA', '03:00:00', 1, 25, 0, 1, 12, 4, 7),
(158, '2023-05-05', 'Elaboração de  proposta para projeto de Educação Ambiental com 4 propostas para prainha de itá', 'LINDOMAR', 'DIRETOR DO MEIO AMBIENTE', '02:00:00', 1, 36, 0, 2, 18, 4, 10),
(159, '2023-05-05', 'Reunião referente aos processos de licenciamento em andamento - Município de Arabutã', 'EDINAN', 'DIRETOR MEIO AMBIENTE', '01:00:00', 1, 33, 0, 2, 3, 4, 10),
(160, '2023-05-05', 'Atendimento presencial para discutir duvidas sobre os licenciamentos do município. ', 'EDINAM', 'DIRETOR DO MEIO AMBIENTE', '00:30:00', 1, 36, 0, 2, 3, 4, 5),
(161, '0000-00-00', 'Levantamento arquitetônico da escola de Linha Araraquara - Vanessa Franczak e Elaine Bezerra.', 'VINICIUS FAZOLO', 'ENG. CIVIL', '00:00:00', 1, 24, 1, 2, 2, 7, 0),
(162, '0000-00-00', 'Conferência de guias referente a produção Cis Amauc competência 04/2023. Lançamento em planilhas.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '06:00:00', 1, 19, 0, 1, 16, 4, 15),
(163, '2023-05-05', 'Conferência de guias referente a produção Cis Amauc competência 04/2023. Lançamento em planilhas.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '06:15:00', 1, 19, 0, 1, 16, 4, 15),
(164, '2023-05-05', 'Resposta do IMA referente Desafetação de áreas verdes. ', 'PAULO', 'PREFEITO', '00:15:00', 1, 33, 0, 2, 11, 1, 5),
(165, '2023-05-05', 'Elaboração de Projeto de Recapeamento Asfáltico  das Ruas São Roque e Cardeal Câmara ', 'CLEVSON RODRIGO FREITAS', 'PREFEITO ', '07:00:00', 1, 28, 0, 1, 9, 7, 7),
(166, '2023-05-05', 'Acesso portal municipal cadastrar edital chamada publica N°03/2023 - fisioterapeuta', 'GRACIELI', 'SAUDE', '00:30:00', 0, 1, 0, 2, 15, 1, 4),
(167, '2023-05-05', 'Acesso portal municipal cadastrar edital chamada publica N°03/2023 - fisioterapeuta', 'GRACIELI', 'SAUDE', '00:20:00', 1, 13, 0, 2, 15, 1, 4),
(168, '2023-05-05', 'Contato para configuração de impressora pois não estava imprimindo.', 'ROSE', 'IDENTIDADES', '00:10:00', 1, 13, 0, 2, 14, 1, 4),
(169, '2023-05-05', 'Acesso portal municipal inserir arquivo de errara edital 01/2023- eleiçoes do conselho tutelar 2023.', 'ANDREIA', 'PREC. SELETIVO', '00:10:00', 1, 13, 0, 2, 10, 7, 4),
(170, '2023-05-05', 'Publicação em portal do Cons. Lambari, O Jornal e portal do DOM, do novo edital de pregão 02/203 para aquisição de combustível para as entidades Amauc, Cons. Lambari e Cisamauc.', 'VANDERLEI', 'SEC. EXECUTIVO ', '00:20:00', 1, 13, 0, 2, 18, 7, 4),
(171, '2023-05-08', 'Contato pelo WhatzApp, sobre como baixar uma video do youtube para a escola.', 'EDUARDA', 'ASSESSORA', '00:10:00', 1, 13, 0, 2, 14, 1, 4),
(172, '2023-05-08', 'Acesso retomo ativação sistema.', 'RENAN', 'ENGENHEIRO', '00:15:00', 1, 13, 0, 2, 12, 8, 4),
(173, '2023-05-08', 'Organização da semana conforme demanda necessitada pelos municípios.', 'CLAUDIA', 'DIRETORA ADMINISTRATIVA', '00:30:00', 1, 36, 0, 2, 18, 4, 13),
(174, '2023-05-03', 'Atualização do Gabarito do Concurso da Câmara de Vereadores de Concórdia que teve alterações após os recursos.\r\nAtualização das notas dos candidatos após alteração do gabarito.\r\nGerar PDF dos recursos.\r\nConferência do PDF  dos recursos com as alterações do gabarito.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '02:00:00', 1, 20, 0, 2, 17, 7, 13),
(175, '2023-05-03', 'Ajudar o Cis Amauc na Conferência das Guias vindas dos prestadores, referente a produção do Cis Amauc no mês de Abril.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '03:00:00', 1, 20, 0, 2, 16, 7, 13),
(176, '2023-05-04', 'Conferência Guias Prestadores Cis Amauc', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '03:00:00', 1, 20, 0, 2, 16, 7, 13),
(177, '2023-05-05', 'Conferência Guias Prestadores Cis Amauc', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '03:30:00', 1, 20, 0, 2, 16, 7, 13),
(178, '2023-05-05', 'Formatação e preenchimento das planilhas com o levantamento da remuneração de Professores e Auxiliares conforme encaminhado pelos municípios.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '03:30:00', 1, 20, 0, 1, 17, 7, 13),
(179, '2023-05-02', 'MAPA PERMUTA ÁREA  VERDE  (CRECHE)', 'PREFEITO', 'PREFEITO', '07:00:00', 1, 29, 0, 1, 11, 1, 9),
(180, '2023-05-03', 'CADASTRO CERCAS NA ESCOLA DA VILA DA ELETROSUL', 'FRANCIELI', 'ENGENHEIRA CIVIL', '07:00:00', 1, 29, 0, 2, 8, 4, 8),
(181, '2023-05-04', 'CADASTRO CERCA NA ESCOLA DA VILA DA ELETROSUL', 'FRANCIELI', 'ENGENHEIRA CIVIL', '07:00:00', 1, 29, 0, 2, 8, 4, 8),
(182, '2023-05-05', 'MAPA ESCOLA  VILA DA ELETROSUL', 'FRANCIELI', 'ENGENHEIRA CIVIL', '07:00:00', 1, 29, 0, 1, 17, 7, 9),
(183, '2023-05-08', 'Acesso remoto atualização de sistema office.', 'GIOVANI', 'TESOURARIA', '00:10:00', 1, 13, 0, 2, 12, 8, 4),
(184, '2023-05-08', 'Acesso remoto atualização de sistemas Betha, ( compras/sapo e tributos) .', 'CLEIDE', 'CONTABILIDADE', '00:30:00', 1, 13, 0, 2, 9, 8, 3),
(185, '2023-05-08', 'Acesso remoto atualização e ativação de sistema office.', 'LUCIANE', 'SAUDE', '00:10:00', 1, 13, 0, 2, 14, 8, 4),
(186, '2023-05-08', 'PROJETO ARQUITETÔNICO DO CENTRO EDUCAÇÃO INFANTIL CHAPEUZINHO VERMELHO, ALTERAÇÃO E ENQUADRAMENTO, ASSINATURA , PROTOCOLO NO CORPO DE BOMBEIROS  PARA ANALISE. ', 'ROSEMERI', 'ARQUITETA', '03:30:00', 1, 27, 0, 1, 5, 7, 7),
(187, '2023-05-08', 'Elaboração de Projeto de Recapeamento Asfáltico  das Ruas São Roque e Cardeal Câmara ', 'CLEVSON RODRIGO FREITAS', 'PREFEITO ', '03:30:00', 1, 28, 0, 1, 9, 7, 7),
(188, '2023-05-08', 'Suporte remoto servidor de internet da Escola CEPJAW, atualização do Firewall e do software da Routerboard. Acompanhamento via registro de log a conexão com a internet nos roteadores Wifi.', 'LUANA', 'PROFESSORA', '00:15:00', 1, 12, 0, 2, 11, 8, 4),
(189, '2023-05-08', 'Suporte via WhatsApp referente a relatório de notas em aberto referente ao ano de 2023, no sistema Ruralweb. Sistema não gera relatório quando informado o ano 2023, abri um chamado solicitando ajuste no relatório. ', 'GILMAR', 'BLOCO DE NOTAS', '00:10:00', 1, 12, 0, 2, 13, 1, 5),
(190, '2023-05-08', 'Apresentação do Tribunal de contas sobre o ICMS Educação na Câmara de Vereadores de Concórdia  no período da manhã das 8:30hs  ás 11:30 hs ', 'AMAUC', 'MOVIMENTO ECONÔMICO ', '03:00:00', 1, 37, 0, 2, 17, 4, 2),
(191, '2023-05-08', 'Manutenção em computador, troca de HD para HH SSD e formatação do mesmo.', 'CRISTINA', 'EDUCAÇÃO', '03:00:00', 1, 13, 0, 2, 12, 7, 3),
(192, '2023-05-08', 'CONTATO POR TELEFONE , JUNTO AO CORPO DE BOMBEIROS, SOLICITAÇÃO DE LIBERAÇÃO DA TAXA , PARA QUE O PROJETO POSSA ENTRAR NA FILA PARA ANÁLISE DE PROJETO.', 'ROSEMERI', 'ARQUITETA', '00:30:00', 1, 27, 0, 1, 5, 2, 5),
(193, '2023-05-08', 'mapa cadastral cercas colegio vila eletrosul', 'FRANCIELI', 'ENGENHEIRA CIVIL', '04:00:00', 1, 29, 0, 2, 8, 7, 9),
(194, '2023-05-08', 'PPCI DO GINÁSIO DE ESPORTES (BAIXAR OS ARQUIVOS DO PROJETO APROVADO JUNTO AO CORPO DE BOMBEIROS).', 'DANIEL', 'ENGENHEIRO', '03:00:00', 1, 27, 0, 1, 11, 7, 7),
(195, '2023-05-08', 'Atualização, impressão e envio via email das faturas de contribuição mensal da Amauc, Cis Amauc, Consórcio Lambari, Abrigo Institucional, Casa Lar, Cidauc e Integrar.', 'PREFEITURAS', 'N/I', '02:00:00', 1, 19, 0, 2, 17, 3, 6),
(196, '2023-05-08', 'Término de conferência de guias da produção do mês de abril de 2023. Lançamento e controle em planilhas.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '02:00:00', 1, 19, 0, 2, 16, 4, 15),
(197, '2023-05-05', 'Projeto complementado da Rua Floriano Bender com as observações na prancha 03 repassadas por Gutemberg (Irene)', 'LIA', 'ENG', '08:00:00', 1, 23, 0, 2, 15, 7, 7),
(198, '2023-05-08', 'Plotagens Rua Floriano Bender', 'LIA', 'ENG', '01:00:00', 1, 23, 0, 2, 15, 4, 14),
(199, '2023-05-01', 'Complementações e modificações no orçamento da Rua Floriano Bender', 'LIA', 'ENG', '04:00:00', 1, 23, 0, 2, 15, 4, 5),
(200, '2023-05-08', 'Feito pdf e assinado digitalmente 02 processos de acesso a Linha Canhada em 17 pranchas', 'EDMILSON CANALLE', 'PREFEITO', '04:00:00', 1, 23, 0, 2, 13, 7, 14),
(201, '2023-05-08', 'Atendimento na Amauc pela manha com inicio as 07 horas, a partir das 08:30 reunião na Câmara Municipal de Vereadores de Concórdia com o TCE participando em evento sobre ICMS educação, as 10 horas atendimento com pessoal da Advocacia para tratar de defesa da Amauc junto ao TCE e atendimentos diversos.', 'AMAUC', 'AMAUC', '05:00:00', 1, 14, 0, 1, 17, 5, 5),
(202, '2023-05-03', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Arabutã.', 'CRISTINA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 3, 1, 5),
(203, '2023-05-03', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 4),
(204, '2023-05-03', 'Prestação de informações e orientações para a Coordenadora referente ao Edital do Concurso Público Nº 01/2021, sobre validade do concurso, envio do edital em PDF e envio dos dados dos candidatos aprovados neste edital. Repasse de informação sobre documentação a ser emitida para solicitação de prorrogação da validade do edital.', 'SIMONE', 'COORDENADORA', '00:30:00', 1, 21, 0, 2, 19, 1, 11),
(205, '2023-05-08', 'Criação dos usuários para o acesso ao serviço.amauc: usuário: aline.irani / usuário: tais.irani  / usuário: thalia.irani / usuário: thiza.irani\r\n', 'THIZA ', 'ENGENHARIA', '00:30:00', 1, 13, 0, 2, 7, 1, 4),
(206, '2023-05-08', 'Criação dos usuários para o acesso ao serviço.amauc: usuário: lindomar.ita / usuário: marta.ita', 'LINDOMAR ', 'MEIO AMBIENTE', '00:20:00', 1, 13, 0, 2, 8, 3, 4),
(207, '2023-05-08', 'Acesso configuração navegador para emissão de IPTU em portal da Betha.', 'SUELI', 'CRAS', '00:10:00', 1, 13, 0, 2, 5, 8, 4),
(208, '2023-05-08', 'Acesso remoto instalação de impressora ( recepção)...', 'CLAUCI', 'EDUCACAO', '00:10:00', 1, 13, 0, 2, 12, 8, 4),
(209, '2023-05-03', 'Cadastro de informações bancárias repassadas pelo município para geração de boletos referentes ao Edital de Processo Seletivo Simplificado Nº 01/2023. Teste junto no sistema ProSeleta com cadastro e configuração dos dados com o sistema e o banco (Sicredi) . Geração de boleto teste e feito teste de pagamento para ver se os dados cadastrados estão de acordo. ', 'NILSON', 'TESOUREIRO', '02:00:00', 1, 21, 0, 2, 6, 1, 4),
(210, '2023-05-03', 'Verificação dos descontos a serem efetuados nas folhas de pagamento, montagem da planilha, atualização do sistema, lançamento das informações no sistema, conferência e geração das folhas de pagamento, lançamentos dos valores na planilha, geração e conferência dos impostos (FGTS, INSS, PIS e IR) do CISAMAUC.', 'MARLON', 'DIRETOR', '01:30:00', 1, 21, 0, 2, 16, 4, 13),
(211, '2023-05-03', 'Verificação dos descontos a serem efetuados nas folhas de pagamento, montagem da planilha, atualização do sistema, lançamento das informações no sistema, conferência e geração das folhas de pagamento, lançamentos dos valores na planilha, geração e conferência dos impostos (FGTS, INSS, PIS e IR) do Consórcio LAMBARI.', 'CLÁUDIA', 'DIRETORA', '01:30:00', 1, 21, 0, 2, 18, 4, 12),
(212, '2023-05-03', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 12, 1, 5),
(213, '2023-05-04', 'Orientação e esclarecimento sobre algumas dúvidas referente as inscrições do Edital de Eleição Pública Nº 01/2023, do Conselho Tutelar do Município de Concórdia.', 'ALINE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 4, 1, 11),
(214, '2023-05-08', 'Inclusão de novo prestador (TC082 - HUMANITÁ ODONTOLOGIA HUMANIZADA) no sistema CELK, e envio via email de orientações referente ao sistema. Envio para publicação DOM e atualização nas planilhas.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '01:30:00', 1, 19, 0, 2, 16, 4, 13),
(215, '2023-05-08', 'Conversa interna para verificação de demandas da agenda da semana.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '00:40:00', 1, 35, 0, 2, 18, 4, 11),
(216, '2023-05-08', 'Conferência de documentações da Informação Técnica 2411/2022 do Condomínio Industrial de Presidente Castello Branco, organização de documentos e interpretação de como esta o MAPA da área.', 'PRESIDENTE CASTELLO BRANCO', 'TÉCNICO', '04:00:00', 1, 35, 0, 1, 12, 4, 7),
(217, '2023-05-04', 'Concurso Público - Edital Nº 1/2023 - Câmara Municipal de Vereadores de Concórdia. Geração, formatação de arquivo com os recursos apresentados em relação as questões da prova escrita. Montagem e publicação do gabarito definitivo. Correção via sistema dos cartões resposta. Aplicação dos critérios de desempate. Geração e conferência da lista de classificados. Publicação no sistema, no site da Amauc e da Câmara dos recursos apresentados, gabarito definitivo e lista de classificados. Envio por e-mail para o presidente da Comissão do Concurso a lista dos classificados. Atualização e conferência das publicações e divulgações para os candidatos. ', 'JAIME', 'PRESIDENTE COMISSÃO', '02:00:00', 1, 21, 0, 2, 27, 4, 6),
(218, '2023-05-04', 'Conferência e correção de informações bancárias cadastradas e repassadas pelo município para geração de boleto referente ao Edital de Processo Seletivo Simplificado Nº 01/2023. Teste junto no sistema ProSeleta (Hugo) com cadastro e configuração dos dados com o sistema e o banco (Sicredi). Geração de boleto teste. Pagamento efetuado do boleto teste e desta forma forma confirmando que os dados estão de acordo e o sistema está apto para ser usado.', 'NILSON', 'TESOUREIRO', '01:00:00', 1, 21, 0, 2, 7, 1, 4),
(219, '2023-05-04', 'Verificação dos descontos a serem efetuados nas folhas de pagamento, montagem da planilha, atualização do sistema, lançamento das informações no sistema, conferência e geração das folhas de pagamento, lançamentos dos valores na planilha, geração e conferência dos impostos (FGTS, INSS, PIS e IR) do Consórcio INTEGRAR.', 'NILTON', 'COORDENADOR', '01:00:00', 1, 21, 0, 2, 21, 4, 13),
(220, '2023-05-08', 'Acesso remoto servidor,atualização de sistemas Betha Sapo / Folha e Compras - Camara de Vereadores', 'VANESSA', 'CAMARA', '00:20:00', 0, 69, 0, 2, 12, 8, 3),
(221, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Peritiba.', 'IZABEL', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 11, 1, 5);
INSERT INTO `atividade` (`ati_cod`, `ati_data`, `ati_descricao`, `ati_solicitante`, `ati_cargo`, `ati_tempo`, `ati_situacao`, `usu_cod`, `sol_cod`, `sol_status`, `cli_cod`, `afr_cod`, `atp_cod`) VALUES
(222, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 12, 1, 5),
(223, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Arabutã.', 'CRISTINA', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 3, 1, 5),
(224, '2023-05-08', 'Acesso remoto servidor,atualização de sistemas Betha Sapo / Folha e Compras - Câmara de Vereadores', 'VANESSA', 'FINANCEIRO', '00:20:00', 1, 13, 0, 2, 37, 8, 4),
(225, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Irani.', 'JAÇANÃ', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 7, 1, 5),
(226, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:45:00', 1, 21, 0, 2, 13, 1, 5),
(227, '2023-05-08', 'Suporte remoto micro do controle interno de Pres. Castello Branco, instalação e configuração de sistema.', 'GUILHERME', 'CONTROLE INTERNO', '00:30:00', 1, 12, 0, 2, 12, 8, 4),
(228, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 10, 1, 5),
(229, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Ipira.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 4, 1, 5),
(230, '2023-05-08', 'Suporte via WhatsApp referente ao sistema RuralWeb, auxilio para informar no sistema as notas do produtor que foram perdidas. ', 'JULIANA', 'BLOCO DO PRODUTOR', '00:10:00', 1, 12, 0, 2, 13, 1, 4),
(231, '2023-05-04', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 15, 1, 5),
(232, '2023-05-08', 'Publicação de Termo de Credenciamento em portal do DOM e CisAmauc,', 'LUCIANE', 'RECEPÇÃO', '00:10:00', 1, 13, 0, 2, 16, 3, 4),
(233, '2023-05-08', 'Suporte remoto servidor de internet da Saúde de Lindóia do Sul, verificação dos eventos registrados no servidor para identificar se há perde de conexão de internet, pois o ao abrir o sistema Esus ocorria erro de página. \r\n', 'EDSON', 'TI', '00:10:00', 1, 12, 0, 2, 10, 8, 4),
(234, '2023-05-08', 'Reunião equipe técnica para organização das atividades da semana. ', 'CLAUDIA', 'DIR. ADM', '02:00:00', 1, 33, 0, 2, 18, 4, 10),
(235, '2023-05-08', 'Atualização de Software, mapas, aletas de lombadas e radares GPS Gamin da Sec. saúde de Peritiba.  ', 'JULIANA', 'SEC. SAÚDE', '01:00:00', 1, 12, 0, 2, 11, 7, 3),
(236, '2023-05-08', 'Backup dos arquivos dos departamentos para unidade externa. ', 'AMAUC', 'TI', '01:00:00', 1, 12, 0, 2, 11, 8, 4),
(237, '2023-05-08', 'Revisão e organização de documentos para resposta de informação técnica - IMA - referente ao Loteamento Industrial de Presidente Castello Branco         ', 'LUCI', 'ARQUITETA', '03:00:00', 1, 33, 0, 1, 12, 4, 5),
(238, '2023-05-08', 'Demandas do Município de Peritiba', 'PAULO', 'PREFEITO', '00:15:00', 1, 33, 0, 1, 11, 4, 10),
(239, '2023-05-08', 'Leitura do Laudo da Geóloga de descaracterização de recurso Hídrico. ', 'PAULO', 'PREFEITO', '01:00:00', 1, 33, 0, 2, 11, 4, 5),
(240, '2023-05-05', 'Conferência de boleto teste pago referente ao Edital de Processo Seletivo Simplificado Nº 01/2023, se valor creditou na conta do município. Valor creditado, recebido arquivo de retorno e lançado no sistema para baixa do pagamento.', 'NILSON', 'TESOUREIRO', '00:30:00', 1, 21, 0, 2, 7, 1, 5),
(241, '2023-05-08', 'Orientações e contatos para solicitar as licenças de Poços tubulares profundos do município de Peritiba, junto ao IMA, para responder solicitação do Ministério público. ', 'DANIEL ', 'ENGENEHIRO', '00:15:00', 1, 33, 0, 2, 11, 1, 5),
(242, '2023-05-08', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 35, 5, 1, 36, 6, 1),
(243, '2023-05-08', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 33, 4, 1, 31, 6, 1),
(244, '2023-05-08', 'FASE DE AUDITORIA PARA COMPROVAÇÃO DE DOCUMENTOS município de Seara ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '02:15:00', 1, 37, 0, 2, 17, 7, 5),
(245, '2023-05-08', 'FASE DE AUDITORIA PARA COMPROVAÇÃO DE DOCUMENTOS município de Concórdia ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '01:30:00', 1, 37, 0, 2, 17, 7, 5),
(246, '2023-05-08', 'Inclusão de novos credenciados no CNES.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '01:00:00', 1, 19, 0, 2, 16, 4, 13),
(247, '2023-05-08', 'Execução da rotina de backup do banco de dados do sistema sapo e posterior envio dos dados para o Ftp da Betha.', 'VILMAR', 'CONTADOR', '00:20:00', 1, 12, 0, 1, 12, 8, 4),
(248, '2023-05-05', 'Edital Nº 01/2023 - Processo Seletivo Simplificado Nº 01/2023, cadastro do edital no sistema ProSeleta, de todas as informações: período das inscrições, formas de isenção de taxa, cargos, envio de documentos seguindo as regras publicadas em Edital. Publicação no site da Amauc e da Prefeitura do Edital e do Decreto da Comissão.', 'DENISE', 'MEMBRO COMISSÃO', '02:00:00', 1, 21, 0, 2, 7, 4, 5),
(249, '2023-05-05', 'Orientação e esclarecimento sobre algumas dúvidas referente as inscrições do Edital de Eleição Pública Nº 01/2023, do Conselho Tutelar do Município de Concórdia.', 'KELI', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 4, 1, 5),
(250, '2023-05-08', 'Pedido da solicitação aceito.\r\nDurante esta semana inicia-se o preenchimento da documentação e elaboração de estudos.', '', '', '00:00:00', 1, 35, 5, 1, 36, 15, 16),
(251, '2023-05-08', 'Revisão e correção do projeto de revitalização do Clube Juventude de Lindóia do Sul.', 'GABRIELA GRISA ', 'ARQUITETA', '06:30:00', 1, 24, 0, 2, 10, 7, 7),
(252, '2023-05-08', 'Conversa com prefeito sobre projeto de piscina aquecida pública - possíveis alterações de projeto.', 'PAULO DEITOS', 'PREFEITO', '00:30:00', 1, 24, 0, 2, 11, 4, 11),
(253, '2023-05-05', 'Concurso Público - Edital Nº 1/2023 - Câmara Municipal de Vereadores de Concórdia. Visita presencial junto a Câmara para conversa com a comissão sobre situação ocorrida, explanação e explicação sobre a correção do gabarito definitivo do cargo de agente legislativo. Republicação do gabarito definitivo do cargo de agente legislativo. Correção no sistema e geração da nova lista de classificados do cargo de agente legislativo. Publicação no gabarito corrigido, lista de classificados corrigida e nota de esclarecimento fornecida pela banca (Probanca). Envio por e-mail para o presidente da Comissão do Concurso a lista dos classificados corrigida.', 'JAIME', 'PRESIDENTE COMISSÃO', '01:30:00', 1, 21, 0, 2, 27, 4, 11),
(254, '2023-05-08', 'Será agendado levantamento de campo para os próximos dias. ', '', '', '00:15:00', 1, 33, 4, 1, 31, 14, 16),
(255, '2023-05-04', 'Conferência e protocolo do processo administrativo de licenciamento ambiental para o conjunto habitacional:  Loteamento Morada dos Sonhos (FCEi 616636). Ação final: encaminhar ao órgão ambiental. ', 'CHIARELLO ', 'ENGENHEIRO CIVIL ', '01:00:00', 1, 34, 0, 2, 13, 9, 12),
(256, '2023-05-04', 'Elaborar relatório qualitativo e ecológico de uma área de Compensação da Prefeitura municipal em Barra do Tigre/ interior, Concórdia/ SC. ', 'ANDRESSA ', 'DIRETORA DE MEIO AMBIENTE ', '03:00:00', 1, 34, 0, 2, 4, 4, 16),
(257, '2023-05-05', 'Elaborar o relatório da compensação ambiental pela supressão de espécies ameaçadas de extinção para a abertura da Rua Osvaldo Aranha, localizada em  em 3 de Outubro.  ', 'ANDRESSA ', 'DIRETORA DE MEIO AMBIENTE ', '02:00:00', 1, 34, 0, 2, 4, 4, 16),
(258, '2023-05-08', 'Elaborar o relatório da compensação ambiental pela supressão de espécies ameaçadas de extinção para a abertura da Rua Osvaldo Aranha, localizada em  em 3 de Outubro.  ', 'ANDRESSA ', 'DIRETORA DE MEIO AMBIENTE ', '03:00:00', 1, 34, 0, 2, 4, 4, 16),
(259, '2023-05-08', 'Levantamento de compensações pendentes, para solicitar documentação ao IMA.  ', 'MARCELA ', 'BIÓLOGA ', '01:00:00', 1, 34, 0, 2, 18, 4, 8),
(260, '0000-00-00', 'Elaborar atividades de educação ambiental que possam ser executadas na Prainha do município de Itá. ', 'LINDOMAR ', 'ACESSOR DE GESTÃO ADMINISTRATIVA ', '03:00:00', 1, 34, 0, 2, 8, 4, 17),
(261, '2023-05-08', 'Continuação da Planilha de Remuneração dos Professores e Auxiliares.\r\nEdital Conselho Tutelar Arabutã - Confirmar e cancelar as inscrições no sistema dos candidatos conforme repasse da tabela feita pelo município com verificação do cumprimento dos requisitos do edital.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '03:00:00', 1, 20, 0, 1, 17, 7, 13),
(262, '2023-05-09', 'Suporte remoto ao computador da Engenharia e ao servidor de dados para liberação de acesso a pastinha engenharia e a pasta patrimônio no servidor de dados. ', 'DANIEL', 'ENGENHEIRO', '00:30:00', 1, 12, 0, 2, 11, 8, 4),
(263, '2023-05-09', 'Suporte via WhatsApp, referente ao computador do Rh que não estava conectado a rede, problema resolvido.', 'EDSON', 'TI', '00:10:00', 1, 12, 0, 2, 10, 1, 4),
(264, '2023-05-09', 'Solicitação da senha para acesso as contas de e-mail do compras e compras\r\n2. ', 'EDSON', 'TI', '00:05:00', 1, 12, 0, 2, 10, 1, 5),
(265, '2023-05-09', 'Separação de guias por município e conferência de NF e boletos.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '01:00:00', 1, 19, 0, 2, 16, 4, 13),
(266, '2023-05-08', 'Desenvolvimento de projeto 3D da rua coberta de P.C.B.\r\n', 'VANESSA FRANCZAK', 'ARQUITETA', '07:00:00', 1, 25, 0, 1, 12, 4, 9),
(267, '2023-05-09', 'Acompanhamento em fiscalização na reforma da sala nova do Consórcio Lambari.\r\nOrçamento de Persianas', 'CLAUDIA', 'DIRETORA', '02:30:00', 1, 25, 0, 1, 18, 4, 4),
(268, '2023-05-09', 'Organização detalhes finais nova sala ', 'CLAUDIA', 'DIR. ADM', '01:00:00', 1, 33, 0, 2, 18, 4, 10),
(269, '2023-05-09', 'Reunião com Topografia AMAUC, plotagem de mapa/levantamento centro de eventos e local destinado para Trilha ecológica. ', 'CLAUDIA', 'DIR. ADM', '00:30:00', 1, 33, 0, 2, 9, 4, 10),
(270, '2023-05-09', 'Organização de material e atividades da semana. ', 'CLAUDIA', 'DIR. ADM', '01:00:00', 1, 33, 0, 2, 18, 15, 13),
(271, '2023-05-09', 'Reunião com prefeito e visita a campo  - trilha no CTG- Centro de eventos', 'CLEVSON', 'PREFEITO', '03:00:00', 1, 33, 0, 2, 9, 4, 10),
(272, '2023-05-09', 'RELATÓRIO E CLASSIFICAÇÃO MOVIMENTO ECONÔMICO DE TODO ESTADO  REFERENTE AO PERÍODO DE 2006 Á 2022', 'PREFEITO ', 'PREFEITO', '01:30:00', 1, 37, 0, 2, 13, 3, 5),
(273, '2023-05-09', 'Auditoria movimento econômico 2022 do município de Ipuaçú ', 'RENATE ', 'MOVIMENTO ECONÔMICO ', '03:10:00', 1, 37, 0, 1, 17, 8, 15),
(274, '2023-05-09', 'Assinados pdfs digitalmente, impressos,18 pranchas , memorial descritivo, declaração  e Art de 02 processos de Acesso a Linha Canhada Grande Rodovia SEZ 253 com áreas de 2.964,61 m² e 24.633,00 m²', 'EDMILSON CANALLE', 'PREFEITO', '02:30:00', 1, 23, 0, 2, 13, 3, 6),
(275, '2023-05-09', 'Levantamento topográfico e cadastral via imagem de drone de ruas e passeios (projeto arquitetônico) para fins de projeto de capeamento asfáltico. Bairro Pacífico Matias Bairro Santo Antonio Bairro Sto Marcon Conforme as ruas passadas para Guttemberg em 03/05.', '', '', '00:00:00', 1, 23, 7, 0, 36, 0, 0),
(276, '2023-05-09', 'Configuração para funcionamento da planilha orçamentária da caixa, no micro computador da engenharia.\r\n', 'VANESSA', 'ARQUITETA', '00:50:00', 1, 12, 0, 2, 17, 7, 4),
(277, '2023-05-09', 'Reenvio de documentos - minutas de Leis do Licenciamento ambiental para revisão. ', 'CLAUDIA', 'DIR. ADM', '00:15:00', 1, 33, 0, 2, 18, 3, 6),
(278, '2023-05-09', 'Suporte via WhatsApp, auxilio pra restaurar configurações de fabrica no setup. ', 'RITA', 'SECRETÁRIA', '00:10:00', 1, 12, 0, 2, 38, 1, 4),
(279, '2023-05-09', 'Acesso retono ajuda com acesso ao portal do tce virtual, certificados e acesso manual.', 'CAMILA', 'CI', '00:20:00', 1, 13, 0, 2, 9, 8, 4),
(280, '2023-05-09', 'Recebimento de notebook e conferencia de modelo de tela para orçamento de tela nova para notebook samsung (Pat:2510).\r\nEnvio de modelo de tela para cotação para 03 empresas.', 'ANDRESSA', 'EDUCAÇÃO', '00:30:00', 1, 13, 0, 2, 12, 7, 3),
(281, '2023-05-09', 'Acompanhamento e gravação da reuniao Pesquisa Univale Educação pela plataforme do Zoom.	', 'NEUSA', 'SOCIAL', '01:00:00', 1, 13, 0, 2, 17, 5, 10),
(282, '2023-05-09', 'Acesso servidor atualização sistea betha sapo.', 'VILMAR ', 'CONTABILIDADE', '00:30:00', 1, 13, 0, 2, 12, 8, 4),
(283, '2023-05-09', 'Acesso servidor atualização sistemas betha folha e compras.	', 'VANESSA', 'CONTABILIDADE', '00:30:00', 1, 13, 0, 2, 37, 8, 4),
(284, '2023-05-09', 'Instalação de certificados digitais.', 'ANDREIA', 'RH', '00:30:00', 1, 13, 0, 2, 17, 7, 3),
(285, '2023-05-09', 'Participação e coordenação de reunião com o Colegiado de Contadores da Amauc com elaboração de minutas de documentos e apresentação de materiais para a reunião do Colegiado de Contadores e controladores internos da Amauc', 'COLEGIADO DE CONTADORES', 'CONTADOR', '03:30:00', 1, 14, 0, 2, 17, 4, 10),
(286, '2023-05-09', 'Elaborado processos de licitação 01 e 02/2023 do consórcio lambari com a autuação do processo onde foram impressos e juntado as pastas para arquivo', 'LAMBARI', 'PREGOEIRO', '02:00:00', 1, 14, 0, 2, 17, 4, 13),
(287, '2023-05-09', 'Edital do Conselho Tutelar de Irani - Confirmar e Cancelar as Inscrições conforme relação repassada pelo município. ', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '01:00:00', 1, 20, 0, 2, 17, 7, 13),
(288, '2023-05-09', 'Acesso portal municipal, criação de nova pagina para balancetes 2023 - Ass. de Bombeiros Comunitários de Piratuba e ipira', 'JULIANO', 'COMUNICAÇÃO', '00:10:00', 0, 1, 0, 2, 15, 1, 3),
(289, '2023-05-09', 'Acesso portal municipal, criação de nova pagina para balancetes 2023 - Ass. de Bombeiros Comunitários de Piratuba e ipira', 'JULIANO', 'COMUNICAÇÃO', '00:15:00', 1, 13, 0, 2, 15, 1, 4),
(290, '2023-05-09', 'Revisão e envio dos relatórios de atividades referente ao Contrato de Rateio 02/2023 (Capacitações) da Amauc, dos meses de janeiro, fevereiro e março.', 'PREFEITURAS', 'N/I', '03:00:00', 1, 19, 0, 2, 17, 3, 6),
(291, '2023-05-09', 'Criação de banner ( folder/convite ) para XII Seminário Estadual de Assit. Social em Piratuba. ', 'IVANETE', 'SECRETARIA', '00:20:00', 1, 13, 0, 2, 17, 7, 5),
(292, '2023-05-09', 'Cadastro de um usuário para acesso remoto ao servidor de dados, configuração dos sistemas Betha, permissão de usuário para acessar as pastas compras, administração e e leis. Configuração de horário de acesso ao servidor, direcionamento de porta no Firewall do servidor de internet. ', 'ARIEL', 'COMPRAS', '02:00:00', 1, 12, 0, 2, 9, 8, 4),
(293, '2023-05-09', 'Atendimento e transferência ao setor de informática.', 'PATRÍCIA', 'N/I', '00:05:00', 1, 19, 0, 2, 14, 2, 5),
(294, '2023-05-09', 'Organização e impressão de etiquetas de faturas de contribuição mensal Amauc e CIS, e protocolos de entregas de guias para posterior envio ao municípios.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '01:00:00', 1, 19, 0, 2, 17, 4, 13),
(295, '2023-05-09', 'Levantamento de materiais de expediente para nova sala do Consórcio Lambari.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:30:00', 1, 35, 0, 2, 18, 4, 8),
(296, '2023-09-08', 'Levantamento de materiais de expediente que serão necessários para nova sala do Consórcio Lambari.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:30:00', 1, 36, 0, 2, 18, 4, 8),
(297, '2023-05-09', 'Análise do projeto de Educação Ambiental da escola Grupo Paulo Freire, com considerações e sugestões.', 'MARLENE', 'DIRETORA', '01:00:00', 1, 35, 0, 2, 3, 15, 11),
(298, '2023-05-09', 'Análise do Projeto de Educação ambiental da escola Grupo Paulo Freire com considerações e sugestões.', 'MARLENE', 'DIRETORA', '01:00:00', 1, 36, 0, 2, 3, 15, 11),
(299, '2023-05-09', 'Orçamentos de materiais e equipamentos que serão comprados para utilização na nova sala do Consórcio.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '03:00:00', 1, 36, 0, 2, 18, 1, 8),
(300, '2023-05-09', 'CONVERSA PARA ESCLARECIMENTO DE ALGUMAS DÚVIDAS E ALINHAMENTOS ENTRE EQUIPE DO CONSÓRCIO LAMBARI, TOPOGRAFIA E ENGENHARIA.\r\n REFERENTE DEMANDAS DE PRESIDENTE CASTELLO BRANCO, IRANI E CASCALHEIRAS DOS MUNICÍPIOS', 'CONSÓRCIO LAMBARI', 'EQUIPE TÉCNICA', '00:40:00', 1, 35, 0, 2, 18, 7, 11),
(301, '2023-05-09', 'Acesso portal municipal criaçãod e banner e página para chamada publicao 01/2023.', 'MARIELENE', 'RH', '00:30:00', 1, 13, 0, 2, 5, 1, 4),
(302, '2023-05-09', 'Acesso remoto ativação de sistemas office e windows computador da vig. sanitaria.', 'PATRICIA', 'VIG. SANITARIA ', '00:10:00', 1, 13, 0, 2, 14, 8, 4),
(303, '2023-05-09', 'Criação e organização de pastas para os processos de Licitação de Combustível.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '00:30:00', 1, 35, 0, 2, 18, 4, 13),
(304, '2023-05-09', 'Elaboração de orçamento previo e orientações de projeto para José Guttemberg - engenheiro civil - para dar inicio a elaboração de projetos - projeto de recapeamento das ruas São Roque e Cardela Câmara de Jaborá.', 'CLEVSON RODRIGO FREITAS', 'PREFEITO', '07:00:00', 1, 24, 0, 2, 9, 4, 7),
(305, '2023-05-09', 'Acesso remoto para realizar backup de sistema SIOPE, para troca de computador.', 'SUSI', 'CONTABILIDADE', '00:20:00', 0, 1, 0, 2, 7, 8, 4),
(306, '2023-05-09', 'Acesso remoto para realizar backup de sistema SIOPE, para troca de computador.	', 'SUZI', 'CONTABILIDADE', '00:00:00', 1, 13, 0, 2, 7, 8, 4),
(307, '2023-05-09', 'Elaboração junto com a Vanessa o Orçamento do Recapeamento Asfáltico das Ruas São Roque e Cardeal Câmara ', 'CLEVSON RODRIGO FREITAS', 'PREFEITO ', '07:00:00', 1, 28, 0, 1, 9, 7, 18),
(308, '2023-05-09', 'Desenvolvimento de projeto 3D da Rua Coberta de P.C.B.', 'VANESSA FRANCZAK', 'ARQUITETA', '05:00:00', 1, 25, 0, 1, 12, 4, 9),
(309, '2023-05-10', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 30, 8, 1, 36, 6, 1),
(310, '2023-05-10', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 30, 7, 1, 36, 6, 1),
(311, '2023-05-09', 'LEVANTAMENTO NA ESCOLA AMÉLIA POLETTO HEPP E DOCUMENTOS JUNTO AO CORPO DE BOMBEIROS DE PIRATUBA.', 'SERGIO', 'ENGENHEIRO', '07:00:00', 1, 27, 0, 1, 15, 14, 8),
(312, '2023-05-10', 'ELABORAÇÃO DE ESCANEAMENTO DE PROJETOS APROVADO NO CORPO DE BOMBEIROS, PARA ANEXAR JUNTO AO PROJETO PPCI , DA ESCOLA AMÉLIA POLETTO HEPP.', 'SERGIO', 'ENGENHEIRO', '03:30:00', 1, 27, 0, 1, 15, 7, 14),
(313, '2023-05-10', 'ATENDIMENTO REFERENTE AO PROJETO PPCI DO GINÁSIO DE ESPORTES APROVADO. ENCAMINHAR PROJETO APROVADO.', 'DANIEL', 'ENGENHEIRO', '00:15:00', 1, 27, 0, 2, 11, 1, 5),
(314, '2023-05-10', 'Suporte telefonico para auxilio no envio do e-sfinge com inconsistencia no Fundo de saude com restos a pagar de 2008 e na Prefeitura sobre um empenho de consórcios ', 'VILMAR', 'CONTADOR', '15:00:00', 1, 14, 0, 2, 12, 2, 4),
(315, '2023-05-10', 'ENTRAR NO SISTEMA DO CREA E DIRECIONAR NOVAMENTE BOLETO DA EXPOSIÇÃO DA INDUSTRIA E COMÉRCIO DE ANIMAIS E ENCAMINHAR NO SETOR TÉCNICO.', 'POLYANA', 'ENGENHEIRO', '00:30:00', 1, 27, 0, 2, 3, 1, 6),
(316, '2023-05-10', 'Acesso remoto instalação de sistema betha patrominio.', 'CRISTINA', 'EDUCAÇÃO', '00:20:00', 1, 13, 0, 2, 12, 1, 4),
(317, '2023-05-10', 'Formação de computador com troca de HD para HD SSD - Micro Edemias - PAT.3744', 'ADANE', 'EDEMIAS SAUDE', '02:00:00', 1, 13, 0, 2, 14, 7, 3),
(318, '2023-05-10', 'Encaminhamento de Listas de Presença no Curso Nova Lei de Licitações realizada dos dias 15 a 17 de março de 2023 com a participação dos servidores da Prefeitura Municipal de Alto Bela Vista', 'VÂNIA PEDROSO', 'CHEFE GABINETE', '00:15:00', 1, 20, 0, 2, 2, 1, 6),
(319, '2023-05-10', 'Formação de computador com troca de HD para HD SSD - Micro Odonto - PAT.3714	', 'PATRICIA', 'SAUDE', '02:00:00', 1, 13, 0, 2, 14, 7, 3),
(320, '2023-05-10', 'Acesso servidor realizar backup do sistema betha sapo para envio do FTP da Betha.', 'CLEIDE', 'CONTABILIDADE', '00:30:00', 1, 13, 0, 2, 9, 1, 4),
(321, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Peritiba.', 'IZABEL', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 11, 1, 22),
(322, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Arabutã.', 'CRISTINA', 'PRES COMISSÃO ELEIÇÃO CT', '00:15:00', 1, 21, 0, 2, 3, 1, 22),
(323, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:20:00', 1, 21, 0, 2, 13, 1, 22),
(324, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Irani.', 'JAÇANÃ', 'PRES COMISSÃO ELEIÇÃO CT', '00:20:00', 1, 21, 0, 2, 7, 1, 22),
(325, '2023-05-10', 'Acesso portal municipal adicionar errata na página chamada publica 01/2023.	', 'MARILENE', 'RH', '00:10:00', 1, 13, 0, 2, 5, 1, 4),
(326, '2023-05-10', 'Organização nos envelopes das faturas e guias Cis Amauc, prontas para retirada dos municípios.', 'LUCIANE', 'N/I', '02:00:00', 1, 19, 0, 2, 16, 4, 13),
(327, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Ipira. Orientação de elaboração de errata de prorrogação do período das inscrições dos membros do conselho e publicação da mesma no sistema e site da Amauc e da Prefeitura.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:20:00', 1, 21, 0, 2, 5, 1, 22),
(328, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Piratuba. Orientação de elaboração de errata de prorrogação do período das inscrições dos membros do conselho e publicação da mesma no sistema e site da Amauc e da Prefeitura.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:20:00', 1, 21, 0, 2, 15, 1, 22),
(329, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul. Orientação de elaboração de errata de prorrogação do período das inscrições dos membros do conselho e publicação da mesma no sistema e site da Amauc e da Prefeitura.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:20:00', 1, 21, 0, 2, 10, 1, 22),
(330, '2023-05-05', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco. Orientação de elaboração de errata de prorrogação do período das inscrições dos membros do conselho e publicação da mesma no sistema e site da Amauc e da Prefeitura.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:20:00', 1, 21, 0, 2, 12, 1, 22),
(331, '2023-05-10', 'Atualização CNES (inclusões e exclusões de profissionais).', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '01:00:00', 1, 19, 0, 2, 16, 4, 22),
(332, '2023-05-10', 'Dúvida a respeito ART não paga e enviado contato p esclarecer dúvidas', 'POLYANA', 'ENG', '00:20:00', 1, 23, 0, 2, 3, 1, 4),
(333, '2023-05-10', 'Acesso servidor atualização sistema betha folha.', 'HIAGO', 'RH', '00:10:00', 1, 13, 0, 2, 9, 8, 3),
(334, '2023-05-10', 'ELABORAÇÃO DE ORÇAMENTO PREVIO DA PAVIMENTAÇÃO ASFALTICA DA RUAS SÃO ROQUE E CORDEAL CÂMARA', 'CLEVSON RODRIGO FREITAS', 'PREFEITO', '03:00:00', 1, 24, 0, 2, 9, 4, 18),
(335, '2023-05-10', 'PLOTAGEM DO PROJETO DE REFORMA DA DELEGACIA - 3 COPIAS PRANCHA A1 - 2 PRANCHAS, TOTAL=6 PRANCHAS A1', 'LEILA ANA MATIELLO', 'ENG. CIVIL', '00:30:00', 1, 24, 0, 2, 3, 1, 14),
(336, '2023-05-10', 'FINALIZAÇÃO DE PROJETO E ORÇAMENTO DA AMPLIAÇÃO DA CRECHE CINDERELA DE IPIRA.', 'ROSIMERI SPAZINI', 'SEC. PLANEJAMENTO', '03:30:00', 1, 24, 0, 2, 5, 4, 18),
(337, '2023-05-10', 'TREINAMENTO PRESENCIAL (ENGENHARIA DA AMAUC) PARA PROGRAMA EBERIK - CONSTRUÇÃO CIVIL - ESTRUTURAS.', 'VANDERLEI PICININ', 'SECRETARIO EXECUTIVO', '02:00:00', 1, 24, 0, 2, 17, 4, 2),
(338, '2023-05-10', 'Conversa sobre dúvidas da Regularização pertile qto aos lotes 01,04,05 e 07', 'CARINE', 'ADMINISTRATIVO', '00:40:00', 1, 23, 0, 2, 5, 1, 22),
(339, '2023-05-10', 'PLOTAGEM DA PRANCHA ONDE CONSTA MATRICULAS 585 E 8264 DOS LOTES 01,04,05 E 07 QUE DÃO FRENTE PARA RUA GOVERNADOR COLOMBO MACHADO SALLES P ANALISE DO QUE DEVERÁ SER FEITO COM ADVOGADO DIOGENES P DAR ANDAMENTO NO PROCESSO.', 'CARINE', 'ADMINISTRATIVO', '00:30:00', 1, 23, 0, 2, 5, 4, 14),
(340, '2023-05-08', 'Geração de arquivo em PDF e Excel com informações dos candidatos inscritos e envio do mesmo para a Comissão elaborar a lista de publicação dos candidatos inscritos deferidos e indeferidos do Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Peritiba. Publicação da lista no sistema e no site da Amauc e da Prefeitura.', 'IZABEL', 'PRES COMISSÃO ELEIÇÃO CT', '00:45:00', 1, 21, 0, 2, 11, 1, 22),
(341, '2023-05-10', 'Contato por telefone com orientações sobre classificação de convenios para o SIOPS', 'CRISTIANE', 'CONTADORA', '00:05:00', 1, 14, 0, 2, 5, 2, 4),
(342, '2023-05-10', 'Acesso servidor improtar relatorio de marcações de pontos das entidadas... o mesmo está com problemas na unidade pc local.', 'HIAGO', 'RH', '00:30:00', 1, 13, 0, 2, 9, 8, 4),
(343, '2023-05-10', 'Acesso ativação sistema em computador da Sec. de Educação.', 'CRISTINA', 'EDUCAÇÃO', '00:20:00', 1, 13, 0, 2, 12, 8, 4),
(344, '2023-05-02', 'Organização para conciliação bancária ref mês de abril (extratos bancários e conferências).\r\nOrganização da reunião do Movimento econômico, no período da manhã, com a participação do Assessor do Movimento Econômico - Valdecir Munaretto.\r\nAnálise de material gráfico para divulgação da semana de aniversário da Amauc.\r\nTreinamento de utilização do sistema de gestão para Amauc., no período da tarde.\r\n', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(345, '2023-05-03', 'Atendimento às Nutricionistas para participação na reunião do Colegiado de Educação.\r\nParticipação na reunião do Colegiado de Educação, juntamente com as Nutricionistas, em torno de 1h20.\r\nAnálise, juntamente com as Nutricionistas, da participação delas na reunião e encaminhamentos necessários.\r\nConciliação bancária do mês de abril das contas da Amauc e do CIS Amauc - conclusão.\r\nContatos para orçamentos para seguro da sede da Amauc.\r\n', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(346, '2023-05-10', 'Suporte remoto servidor de dados da prefeitura de Peritiba, liberação de usuário a acessar pasta compartilhada no servidor.', 'ADRIANO', 'TI', '00:15:00', 1, 12, 0, 2, 11, 8, 4),
(347, '2023-05-10', 'Configuração do usuário para acesso via WTS ao servidor.', 'MARINES', 'ADMINISTRATIVO', '00:30:00', 1, 12, 0, 2, 15, 1, 5),
(348, '2023-05-10', 'Envio de arquivo para atualização de sistema siops.', 'CRISTIANE', 'CONTABILIDADE', '00:10:00', 1, 13, 0, 2, 5, 1, 4),
(349, '2023-05-04', 'Financeiro: pagamento das contas e da folha dos funcionários da Amauc e do CIS Amauc.\r\nEmissão dos comprovantes, organização e lançamentos nas planilhas.\r\nControle financeiro dos pagamentos dos municípios e lançamentos nas planilhas.\r\nEmissão de ofício para Governador do Estado com solicitação de cessão de uso de terreno para construção da sede da Amauc e dos consórcios.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 5),
(350, '2023-05-10', 'Configuração de bloqueio de portas USB, quando conectado ao servidor via conexão WTS. Instalação do drive da placa de vídeo e execução de teste com o aplicativo Eberick no usuário da engenharia, configuração de permissão de acesso a pastas ao departamento engenharia.', 'DIEGO', 'TI', '02:00:00', 1, 12, 0, 2, 17, 7, 4),
(351, '2024-05-10', 'Atualização do sistema Esus para a versão 5.1.16, servidor de dados da prefeitura.  ', 'EDSON', 'TI', '00:15:00', 1, 12, 0, 2, 10, 8, 4),
(352, '2023-05-05', 'Conferência de extratos bancários e lançamentos nas planilhas.\r\nConferência e separação das notas de lanches ref mês de abril para emissão de notas fiscais.\r\nOrganização dos pagamentos efetuados e lançamentos nas planilhas.\r\nOrganização para o dia 8 de maio, segunda-feira, da reunião com TCE-SC, reunião sobre ICMS Educação.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(353, '2023-05-09', 'Reunião com o pessoal da Unifiqui, onde apresentaram planos de internet com Ip fixo, e planos de telefonia (DDR) discagem direta por ramais via internet.', 'DIEGO', 'TI', '00:30:00', 1, 12, 0, 2, 17, 4, 10),
(354, '2023-05-08', 'Organização e acompanhamento da reunião do TCE sobre ICMS Educação, no período da manhã, no Plenário da Câmara de Vereadores.\r\nOrganização dos atendimentos individuais, por município, pelos técnicos do TCE, na Sala de Reuniões da Amauc.\r\nOrganização, emissão e envio das faturas do CIS, juntamente com os relatórios de atendimento, para os municípios.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(355, '2023-05-09', 'Contatos com CIEE sobre processo de seleção para estagiário.\r\nConclusão da prova e texto para leitura para seleção de estagiário.\r\nContatos e serviços para Colegiado de Nutrição, emissão de ofício para Banco de Leite do Hospital São Francisco e organização da pauta para reunião do dia 15.\r\nContatos para organização do Curso de Redação Oficial para o mês de junho.\r\nElaboração e montagem de convite, juntamente com Setor de TI, direcionado aos Prefeitos e Prefeitas, para abertura oficial do XII Seminário Estadual de Assistência Social, evento que se realizará de 24 a 26 de maio, no Centro de Eventos de Piratuba. Este convite será utilizado pela Fecam/Egem para todos os Prefeitos e Prefeitas do Estado de SC;', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(356, '2023-05-10', 'Controle financeiro dos pagamentos dos municípios e lançamentos nas planilhas.\r\nCadastramento de constas para confirmação.\r\nConclusão da pauta da reunião do Colegiado de Nutrição.\r\nTarefas administrativas como organização de documentos, arquivamento, monitoramento dos grupos de whats e dos e-mails, responder mensagens e transmissão de informações para setores da Amauc.\r\nContatos com Egem para organização do Curso \"A importância da Língua Portuguesa no ambiente de trabalho\"´.\r\nContato com CIEE referente seleção de estagiário.\r\n', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(357, '2023-05-10', 'Acesso configuração sistema para leitura de arquivos em PDF', 'KELIM', 'SECRETARIA', '00:10:00', 1, 13, 0, 2, 37, 8, 4),
(358, '2023-05-10', 'Acesso portal da Câmara, alterações de páginas, inclusão de novas pastar dentro do menu legislação.. ( Decretos / Projetos de Lei )', 'RAMIRO', 'SECRETARIO', '02:00:00', 1, 13, 0, 2, 40, 1, 3),
(359, '2023-05-10', 'Análise documental para novos credenciamentos.\r\nConversas via Whatsapp com psicólogos.\r\nOrganização de Termos de Credenciamentos já ativos.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '04:00:00', 1, 19, 0, 1, 16, 4, 13),
(360, '2023-05-10', 'Acesso remoto para tentar corrigir erros no preenchimento do SIOPS mas acreditamos que seja erro do proprio aplicativo', 'CRISTIANE', 'CONTADORA', '00:15:00', 1, 14, 0, 2, 5, 8, 4),
(361, '2023-05-10', 'Levantamento de fauna para construção de ponte divisa Itá e Seara.', 'LINDOMAR', 'DIRETOR DO MEIO AMBIENTE', '05:00:00', 1, 36, 0, 2, 8, 14, 8),
(362, '2023-05-10', 'Levantamento de campo para licenciamento - Levantamento de fauna, inventário florestal, florístico e fitos sociológico', '', '', '05:00:00', 1, 33, 4, 1, 31, 14, 8),
(363, '2023-05-10', 'Levantamento de fauna, inventário florestal, florístico e fitossociologia da área do empreendimento para licenciamento', 'LINDOMAR', 'DIRETOR MEIO AMBIENTE', '05:00:00', 1, 33, 0, 2, 8, 14, 8),
(364, '2023-05-10', 'Reunião com secretaria de Educação no Município de Seara  que será município sede do  Projeto a Criança e Natureza em 2023 ', 'CLAUDIA', 'DIR. ADM', '02:00:00', 1, 33, 0, 1, 18, 4, 7),
(365, '2023-05-10', 'Reunião para decidir quais pontos de visitação serão utilizados para iniciar o Projeto a Criança e a Natureza no município.', 'FABIANE', 'SECRETÁRIA EDUCAÇÃO', '01:30:00', 1, 36, 0, 2, 13, 4, 10),
(366, '2023-05-10', 'Baixado fotos do levantamento de fauna feito pela manhã, para construção de ponte na divisa Itá e Seara.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '00:30:00', 1, 36, 0, 2, 18, 4, 13),
(367, '2023-05-10', 'Shapefile para licenciamento ambiental da área de supressão de vegetação - ponte sobre o rio Engano entre Ita e Seara', 'LINDOMAR', 'DIRETOR MEIO AMBIENTE', '10:00:00', 1, 33, 0, 1, 8, 15, 7),
(368, '2023-05-10', 'Acesso portal municipal adicionar arquivo ( relação de inscritos ) em pagina de eleição do conselho tutelar 2023.', 'ADRIANE', 'COMPRAS', '00:10:00', 1, 13, 0, 2, 14, 1, 5),
(369, '2023-05-10', 'Inicio da elaboração do Estudo Ambiental Simplificado - EAS.', 'THIZA', 'ENGENHEIRA', '05:30:00', 1, 35, 0, 1, 7, 4, 7),
(370, '2023-05-11', 'Conferência e organização das NFs para cadastramento no gerenciador Banco do Brasil;\r\nTarefas administrativas em geral como leitura e encaminhamento de mensagens eletrônicas e monitoramento dos grupos de whatsapp;\r\nConferência planilha levantamento de remuneração Professores e Auxiliares;\r\nLançamentos nas despesas de abril dos Colegiados nas planilhas de controle do CR 2 2023.\r\nConferência NFS dos prestadores do CIS Amauc ref produção do mês de abril, para cadastramento no gerenciador financeiro do Bco Brasil.\r\nContatos com Colegiado de Nutricionistas para reunião da próxima semana.\r\nConferência de números de contas bancárias para pagamentos de honorários de evento da Assistência Social.\r\nNegociação valor seguro para sede da Amauc.\r\nAcompanhamento na montagem de baner para eventos da Amauc (Fabiola).\r\nCadastramento de contas da Amauc no gerenciador financeiro para pagamento.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(371, '2023-05-11', 'orçamento do ppci do ginásio de esportes, contato com empresa e repasse de dados para realização do orçamento para o sistema de alarme.', 'DANIEL', 'ENGENHEIRO', '00:30:00', 1, 27, 0, 1, 11, 1, 18),
(372, '2023-05-10', 'Atualização do sistema Esus para a versão 5.1.16, execução de backup e instalação da versão.', 'AMAUC', 'TI', '00:15:00', 1, 12, 0, 2, 8, 8, 4),
(373, '2023-05-10', 'Atualização do sistema Esus para a versão 5.1.16, execução de backup e instalação da versão.', 'AMAUC', 'TI', '00:20:00', 1, 12, 0, 2, 10, 8, 4),
(374, '2023-05-10', 'Levantamento de Fauna, florístico, fitossociologico e caracterização ecológica do local de supressão nas  bordas do Rio Engano com o objetivo de obter a AUC  de  supressão  de vegetação para implantar uma galeria de acesso sobre o recurso hídrico.  ', 'LINDOMAR ', 'ACESSOR DE GESTÃO ADMINISTRATIVA ', '05:00:00', 1, 34, 0, 2, 8, 14, 8),
(375, '0000-00-00', 'Reunião para articular os tramites do projeto A Criança e a Natureza que Este ano será no município de Seara. ', 'FABIANA ', 'SECRETARIA DE EDUCAÇÃO', '01:30:00', 1, 34, 0, 2, 13, 4, 10),
(376, '2023-05-10', 'Informações sobre a forma de licenciamento destinado ao funcionamento da Balsa da comunidade de Volta Grande. Foi efetivado contato com técnicos do IMA e orientado o município. ', 'VINICIUS ', 'ENGENHEIRO CIVIL ', '00:30:00', 1, 34, 0, 2, 2, 1, 5),
(377, '2023-05-11', 'Esclarecimento de dúvidas referente a prestação de contas de notas apresentadas fora do ano vigente.', 'FERNANDO', 'NOTA PRODUTOR', '00:05:00', 1, 12, 0, 2, 14, 1, 5),
(378, '2023-05-11', 'Acesso portal de licitações CINCatarina para consulta de disponibilidade de produtos para nova sede do Lambari.', 'SABRINE', 'BIOLOGA', '00:30:00', 1, 13, 0, 2, 18, 7, 5),
(379, '2023-05-11', 'Em contato com a prestadora de serviços de internet e telefonia para renovar os planos de internet e telefonia.', 'DIEGO', 'TI', '01:00:00', 1, 12, 0, 2, 17, 1, 5),
(380, '2023-05-10', 'Passado na Amauc as 8:30 da noite para acompanhar o treinamento sobre o uso do software Eberick para setor de engenharia', 'AMAUC', 'AMAUC', '00:45:00', 1, 14, 0, 1, 17, 4, 2),
(381, '2023-05-11', 'Acesso remoto ativação de sistema office .', 'ERICA', 'RH', '00:10:00', 1, 13, 0, 2, 9, 8, 4),
(382, '2023-05-11', 'Publicação de Termo de Credenciamento 164 em portais do DOM e CisAmauc.', 'LUCIANE', 'RECEPÇÃO', '00:10:00', 1, 13, 0, 2, 16, 7, 5),
(383, '2023-05-11', 'relação de material e orçamento do ppci do ginásio de esportes.', 'DANIEL', 'ENGENHEIRO', '02:30:00', 1, 27, 0, 1, 11, 7, 18),
(384, '2023-05-11', 'encaminhar projetos no mundo das cópias para realizar escaneamento.', 'SERGIO', 'ENGENHEIRO', '00:30:00', 1, 27, 0, 1, 15, 7, 7),
(385, '2023-05-11', 'Suporte remoto micro do bloco do produtor, execução de aplicação para limpeza de arquivos temporários para melhor funcionamento do navegador onde não atualizava as informações quando gerando o relatórios no sistema ruralweb.', 'VALDECIR', 'BLOCO DO PRODUTOR', '00:20:00', 1, 12, 0, 2, 10, 8, 4),
(386, '2023-05-11', 'Solicitado troca de senha de e-mail ( idosos@seara ).', 'THAIGO', 'TI', '00:10:00', 1, 13, 0, 2, 13, 1, 4),
(387, '2023-05-11', 'Informação sobre manutenção de impressora e troca de fusor.  ', 'EDSON', 'TI', '00:05:00', 1, 12, 0, 2, 10, 1, 5),
(388, '2023-05-11', 'Servidor de dados, inclusão de regras de política de grupo de usuários para gerenciamento de tarefas no servidor de dados. ', 'AMAUC', 'TI', '02:00:00', 1, 12, 0, 2, 17, 7, 3),
(389, '2023-05-10', 'Imagem com o Drone e GPS no Bairro Santo Antônio, Pacifico Matias, Santo Marcon e Levantamento Georeferenciado do Cemitério e Casa Mortuária\r\nGuttemberg e Marcelo  ', 'THIZA ', 'ENGENHEIRA CIVIL', '07:00:00', 1, 28, 0, 1, 7, 4, 8),
(390, '2023-05-11', 'Reunião para mostrar o projeto da Rua São Roque e Cardeal Câmara e Orçamento \r\nGuttemberg e Vanessa ', 'CLEVSON RODRIGO FREITAS', 'PREFEITO ', '03:30:00', 1, 28, 0, 1, 9, 4, 10),
(391, '2023-05-11', 'Levantamento de todos os termos de compensação (dos municípios que tinham termos) para listagem de solicitação ao IMA.', 'CONSÓRCIO LAMBARI', 'EQUIPE', '02:30:00', 1, 35, 0, 2, 18, 15, 13),
(392, '2023-05-11', 'Seleção e inclusão de fotos no levantamento de fauna para o projeto da ponte entre Itá e Seara.', 'CONSÓRCIO LAMBARI', 'EQUIPE', '02:00:00', 1, 35, 0, 2, 18, 15, 13),
(393, '2023-05-11', 'Continuação da elaboração do Estudo Ambiental Simplificado - EAS para licenciamento do cemitério municipal de Irani-SC.', 'TÉCNICO', 'EQUIPE', '01:00:00', 1, 35, 0, 1, 7, 15, 7),
(394, '2023-05-11', 'Reunião com prefeito e secretario sobre obras de pavimentação - acompanhamento engenheiro - Ruas Cordeal Camara e São Roque.', 'CLEVSON RODRIGO FREITAS', 'PREFEITO', '07:00:00', 1, 24, 0, 2, 9, 4, 10),
(395, '2023-05-11', 'Mapa de Uso de Solo Numero do Processo VEG/85932/CAU', 'MARCELA CONSORCIO LAMBARI', 'BIOLOGA ', '01:30:00', 1, 28, 0, 1, 17, 7, 9),
(396, '2023-05-11', 'Acesso remoto configuração de e-mail ( engeharia@arabuta ).', 'POLYANA', 'ENGENHARIA', '00:10:00', 1, 13, 0, 2, 3, 8, 4),
(397, '2023-05-11', 'Inclusão de procedimentos na especialidade de Ortopedia e Traumatologia (TA 164) no sistema CELK (Hospital São Francisco);\r\nRedação TA 166 - Alteração de Razão Social (Clinica Steiner);\r\nParticipação Reunião CIR período da tarde;\r\nAtendimento telefônico e ao público em geral;\r\nAtendimento interno.\r\n\r\n', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '07:00:00', 1, 19, 0, 2, 16, 4, 13),
(398, '2023-05-11', 'organização do II seminário de solo, clima e agua. que será realizado no dia 07 de junho ', 'JOAO NICODEN', 'SEC.AGRICULTURA', '03:00:00', 1, 33, 0, 1, 6, 4, 10),
(399, '2023-05-11', 'Definição de pendencia de área de compensação ambiental. ', 'EDINAN', 'DIRETOR MEIO AMBIENTE', '02:00:00', 1, 33, 0, 2, 3, 4, 10),
(400, '2023-05-11', 'Envio de documentos e materiais para o seminário Solo Clima e agua', 'JOÃO NICODEM', 'SEC. AGRICULTURA', '00:30:00', 1, 33, 0, 2, 6, 3, 6),
(401, '2023-05-11', 'Assinatura do Convenio com o CIEE para contratação de estagiário. ', 'CLAUDIA', 'DIR. ADM', '00:30:00', 1, 33, 0, 2, 18, 4, 5),
(402, '2023-05-11', 'Atendimento de expediente normal na Amauc com inicio as 07 horas ate as 17 horas - rotinas normais de trabalho, participação em reunião com Secretários de Saúde, recebido prefeito de Piratuba para orientação e trabalhos junto ao ICMS educação, encaminhamentos junto a equipe, reunioes e atendimentos diversos', 'AMAUC', 'AMAUC', '10:00:00', 1, 14, 0, 2, 17, 4, 13),
(403, '2023-05-12', 'Informações para cotação de aéreos e hospedagem em Brasília, para organização de viagem técnica da Educação (reunião na segunda-feira).\r\nOrganização de documentos (modelo ofício para indicação de representantes, regimento interno e edital de convocação) para reunião da Defesa Civil, agendada para o dia 22 de maio/2023.\r\nConferência contas da MHNet referente valores cobrados nas faturas de internet e telefonia, visando renovação do contrato de prestação de serviços.\r\nCartão para Dia das Mães (pesquisa por modelo). Edição Cícero Magarinos - TI.\r\nTarefas administrativas em geral como leitura e encaminhamento de mensagens eletrônicas e monitoramento dos grupos de whatsapp;\r\nFinanceiro Amauc e CIS Amauc: extrato bancário, impressão de comprovantes de pagamento e organização dos pagamentos, lançamento dos pagamentos recebidos dos municípios).\r\n\r\n', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 1, 17, 4, 13),
(404, '2023-05-09', 'planialtimétrico de aterro loteamento  morada do sol ', 'PREFEITO', 'PREFEITO', '07:00:00', 1, 29, 0, 1, 13, 4, 8),
(405, '2023-05-09', 'planialtimétrico de aterro loteamento  morada do sol ', 'PREFEITO', 'PREFEITO', '07:00:00', 1, 29, 0, 2, 13, 4, 8),
(406, '2023-05-10', 'calculo com secoes transversais e perfil , para delimitar volume de aterro situado no loteamento mora do sol', 'PREFEITO', 'PREFEITO', '07:00:00', 1, 29, 0, 2, 13, 7, 9),
(407, '2023-05-12', 'Publicação e nova resolução 04/2023 nos portais do DOM e Consorcio Lambari.', 'ANREIA', 'RH', '00:10:00', 1, 13, 0, 2, 18, 7, 4),
(408, '2023-05-12', 'Ligação Telefonica e acesso remoto com contadora para auxilio em planilhas de apresentação da Audiência Publica do quadrimeste', 'CRISTIANE', 'CONTADORA', '00:20:00', 1, 14, 0, 2, 5, 2, 4),
(409, '2023-05-12', 'Publicação e nova resolução 05/2023 nos portais do DOM e CisAmauc', 'MARLON', 'DIRETOR', '00:10:00', 1, 13, 0, 2, 16, 7, 4),
(410, '2023-05-12', 'Reunião com representante da Defesa Civil de Concórdia sobre agenda de reunião e contatos com Ronaldo Coutinho sobre palestra e evento de Climatologia a ser realizada futuramente...agendado reunião para dia 22/05 com o colegiado da Defesa Civil', 'MIRO', 'DEFESA CIVIL', '00:30:00', 1, 14, 0, 2, 17, 4, 10),
(411, '2023-05-09', 'Desenho finalizado do terreno da prefeitura onde hoje é instalado o Fórum do município, Ipumirim- SC.\r\n', 'MATHEUS', 'FISCAL', '07:00:00', 1, 30, 0, 2, 6, 7, 9),
(412, '2023-05-10', 'Imagem com o Drone e GPS no Bairro Santo Antônio, Pacifico Matias, Santo Marcon e \r\nLevantamento Georeferenciado do Cemitério e Casa Mortuária, Funcionario: Marcelo e Guttemberg', 'THIZA FERREIRA ', 'SECRETARIA DE URBANISMO E OBRAS', '07:00:00', 1, 30, 0, 2, 7, 4, 8),
(413, '2023-05-11', 'Desenho finalizado e Transferido para Guttemberg, Ruas do  Bairro Santo Antônio, Bairro Pacifico Matias, Bairro Santo Marcon, Levantamento Georeferenciado e Processamento das imagens do Drone.', 'THIZA FERREIRA ', 'SECRETARIA DE URBANISMO E OBRAS', '07:00:00', 1, 30, 0, 2, 7, 7, 9),
(414, '2023-05-12', 'ESCAMEAMENTO DE MEMORIAIS E  SALVAMENTO DE ARQUIVOS ESCANEADOS , DO PROJETO DA ESCOLA AMÉLIA POLETTO.', 'SERGIO', 'ENGENHEIRO', '01:30:00', 1, 27, 0, 1, 15, 7, 14),
(415, '2023-05-12', 'ESCLARECIMENTO REFERENTE PPCI DO GINÁSIO DE ESPORTES, INCLUSÃO OU NÃO DOS CORRIMÃO E GUARDA CORPO E ESCLARECIMENTO REFERENTE AO PROJETO.', 'LUAN', 'ENGENHEIRO', '00:20:00', 1, 27, 0, 1, 11, 1, 5),
(416, '2023-05-12', 'ENCAMINHAR NAS EMPRESAS DE MATERIAL ELÉTRICO PARA ORÇAMENTO E CONTINUAÇÃO DO ORÇAMENTO DO PPCI DO GINÁSIO DE ESPORTES.', 'DANIEL', 'ENGENHEIRO', '03:30:00', 1, 27, 0, 1, 11, 7, 18),
(417, '2023-05-10', 'Levantamento dos repasses de ICMS e FPM dos municípios da Amauc, do período de  2021, 2022 e 2023 meses de janeiro á abril', 'VANDERLEI', 'PREFEITO', '03:15:00', 1, 37, 0, 2, 7, 1, 8),
(418, '2023-05-10', 'Auditoria das empresas do município de Xanxerê , crescimento Valor Adicionado excessivo', 'RENATE ', 'TÉCNICA TRIBUTÁRIA ', '04:10:00', 1, 37, 0, 2, 17, 8, 15),
(419, '2023-05-12', 'Auditoria município de Urussanga e Abdon Batista , crescimento Valor Adicionado excessivo (dias 11 e 12)', 'RENATE ', 'MOVIMENTO ECONÔMICO ', '10:00:00', 1, 37, 0, 2, 17, 8, 15),
(420, '2023-05-02', 'Apresentação do “VAM – Valor Adicionado Municipal” e “IPM – Índice de Participação Municipal”,\r\ndos Municípios da Região da AMAUC – Agregado por Município Ano Base de 2021 e 2022, válido\r\npara retorno do ICMS de 2023 e 2024;\r\nAssuntos:  Quadro 47, Transportes Intermunicipal “Q48”, Empresas de Energia, Trading, e outras atividades\r\nnormatizadas pela Portaria nº 233/2012 (pontos positivos e negativos);\r\n Debates sobre: ICMS ST e efeitos no cálculo do VA; falta de acesso a dados do S@T;\r\ngestão do Movimento Econômico; Exportações e  Energia Elétrica:\r\n', 'MUNARETTO/RENATE', 'MOVIMENTO ECONÔMICO ', '03:10:00', 1, 37, 0, 2, 17, 11, 10),
(421, '2023-05-12', 'Abertura de trilha para a Escola de Taquaral', 'EDINÉIA', 'DIRETORA', '04:00:00', 1, 36, 0, 2, 12, 14, 5),
(422, '2023-05-12', '10/05/2023 Levantamento Georeferenciado e Imagem com o Drone do Cemitério e Casa Mortuária. Funcionario: Guttemberg e Marcelo\r\n11/05/2023  Desenho finalizado e Transferido para Guttemberg do Cemitério e Casa Mortuária, Levantamento Georeferenciado e das imagens do Drone. Funcionário:Marcelo.\r\n', '', '', '00:00:00', 1, 30, 8, 0, 36, 0, 0),
(423, '2023-05-12', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 30, 8, 1, 0, 6, 1),
(424, '2023-05-12', '.', '', '', '00:00:00', 1, 30, 8, 0, 36, 0, 0),
(425, '2023-05-12', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 30, 8, 1, 0, 6, 1),
(426, '2023-05-12', '.', '', '', '00:00:00', 1, 30, 8, 0, 36, 0, 0),
(427, '2023-05-12', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 28, 8, 1, 36, 6, 1),
(428, '2023-05-12', 'Finalização de orçamento do projeto de ampliação da creche municipal (compatibilização de projeto e orçamento). Envio para solicitante para analise de valor. Processo não finalizado para avaliação da documentação que vai para licitação.', 'ROZIMERI SPAZINI', 'SEC. PLANEJAMENTO', '07:00:00', 1, 24, 0, 2, 5, 7, 18),
(429, '2023-05-12', 'Substituição do roteador Wifi da sala de reuniões.', 'TI AMAUC', 'TI', '00:10:00', 1, 12, 0, 2, 17, 4, 3),
(430, '2023-05-12', 'Suporte remoto servidor de internet da Amauc, inclusão de um range de Ip, vinculado a uma Vlan para ser configurado no roteador Wifi para sala de reuniões.', 'TI AMAUC', 'TI', '01:00:00', 1, 12, 0, 2, 17, 4, 4),
(431, '2023-05-12', 'Dúvidas referente emissão de relatório de declaração de vendas de produtor no sistema RuralWeb. ', 'JULIANA', 'BLOCO DO PRODUTOR', '00:10:00', 1, 12, 0, 2, 13, 1, 5),
(432, '2023-05-12', 'Acesso remoto ativação de sistema office.', 'JUSSARA', 'SAUDE', '00:15:00', 1, 13, 0, 2, 9, 8, 4),
(433, '2023-05-12', 'Desenvolvimento de video para o dia das Mães.', 'VANDERLEI/ANDREIA', 'SECRETARIO', '03:00:00', 1, 13, 0, 2, 17, 7, 4);
INSERT INTO `atividade` (`ati_cod`, `ati_data`, `ati_descricao`, `ati_solicitante`, `ati_cargo`, `ati_tempo`, `ati_situacao`, `usu_cod`, `sol_cod`, `sol_status`, `cli_cod`, `afr_cod`, `atp_cod`) VALUES
(434, '2023-05-12', 'Publicação de editais e tabelas nos portais do CisAmauc e DOM.', 'LUCIANE', 'SECRETARIA', '00:30:00', 1, 13, 0, 2, 16, 7, 4),
(435, '2023-05-12', '10/05/2023 Imagem com o Drone e GPS no Bairro Santo Antônio, Pacifico Matias, Santo Marcon. Funcionario: Guttemberg e Marcelo\r\n12/02/2023 Desenho finalizado e Transferido para Guttemberg, Ruas do  Bairro Santo Antônio, Bairro Pacifico Matias, Bairro Santo Marcon, Levantamento Georeferenciado e Processamento das imagens do Drone.\r\n', '', '', '00:00:00', 1, 30, 7, 0, 36, 0, 0),
(436, '2023-05-12', 'Verificação do mapa para compensação de área da Linha 03 de Outubro e conversa com equipe da Prefeitura - Concórdia.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:00:00', 1, 35, 0, 2, 18, 15, 13),
(437, '2023-05-12', 'Conversa via WhatsApp com diretora do CMEI Bairro dos Estados para alinhar tarefa do dia da família na escola que acontecerá dia 20/05 com participação da equipe do Consórcio Lambari - Cores da Terra.', 'CMEI DO BAIRRO DOS ESTADOS', 'DIRETORA', '00:30:00', 1, 35, 0, 2, 4, 1, 11),
(438, '2023-05-12', 'Tentativa de cadastro para estagiário no programa do CIEE.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '02:00:00', 1, 35, 0, 1, 18, 15, 13),
(439, '2023-05-12', 'Conversa via WhatsApp referente ao Seminário que acontecerá em Ipumirim -SC.', 'TÉCNICO', 'EQUIPE', '00:40:00', 1, 35, 0, 2, 6, 1, 4),
(440, '2023-05-12', 'Redação do Termo Aditivo 167 - Hospital São Francisco - Neurologia;\r\nEnvio do TA 166 e TA 167 para assinatura do Presidente;\r\nOrganização de pastas de prestadores;\r\nAtualização das tabelas de procedimentos e editais do CIS para posterior publicação.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '06:15:00', 1, 19, 0, 2, 16, 4, 13),
(441, '2023-05-12', 'mandado orçamento para empresas para definição de compra de materiais de expediente para sala nova do Consórcio.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:30:00', 1, 36, 0, 2, 18, 1, 5),
(442, '2023-05-15', 'Projeto urbanístico e outros para complementação do licenciamento ambiental do cemitério municipal, conforme alinhado em reunião no dia 03/05/2023', '', '', '00:00:00', 1, 23, 6, 0, 36, 0, 0),
(443, '2023-05-15', 'Acesso remoto ativação de sistema office em notebook professora.	', 'JULIETE', 'PROFESSORA', '00:15:00', 1, 13, 0, 2, 12, 8, 4),
(444, '2023-05-15', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 24, 6, 1, 36, 6, 1),
(445, '2023-05-15', 'Scanner de memoriais descritivo e passar em PDF, anexar ao projeto PPCI da  Escola Amélia Poletto Hepp.', 'SERGIO', 'ENGENHEIRO', '01:30:00', 1, 27, 0, 1, 15, 7, 13),
(446, '2023-05-10', 'Desenvolvimento de projeto 3D da Rua Coberta de P.C.B.', 'VANESSA FRANCZAK', 'ARQUITETA', '07:00:00', 1, 25, 0, 1, 12, 4, 9),
(447, '2023-05-10', 'Treinamento de software Eberick para melhoramento do setor, na sede AMAUC.', 'VANDERLEI', 'SECRETÁRIO', '02:00:00', 1, 25, 0, 1, 17, 4, 2),
(448, '2023-05-11', 'Desenvolvimento de projeto 3D  e renderização das imagens da Rua Coberta de P.C.B.', 'VANESSA FRANCZAK', 'ARQUITETA', '06:30:00', 1, 25, 0, 1, 12, 4, 9),
(449, '2023-05-12', 'Renderização de imagens e montagem de prancha de projeto 3D da Rua Coberta de P.C.B.', 'VANESSA FRANCZAK', 'ARQUITETA', '07:00:00', 1, 25, 0, 2, 12, 4, 9),
(450, '2023-05-15', 'Auxílio a Neusa em relação aos e-mail e abrir formulário para responder. Conversa com Neusa referente ao evento estadual da Cultura, realizado em Lages.\r\nAcesso às mensagens de e-mail e de whatsapp, leitura para responder e encaminhar aos setores responsáveis.\r\nPreenchimento e encaminhamento do formulário de inscrição do Sicredi para solicitação de acesso ao Fundo Social para patrocínio dos JIIDOS, que se realizará em 29 de junho.\r\nConferência cadastramentos da produção do CIS Amauc ref abril 2023, e outro pagamento necessários, para pagamento no dia de hoje 15 de maio.\r\nOrganização dos comprovantes de pagamentos com as NFs e lançamentos nas planilhas de controle bancário.\r\nAtendimento às demandas das Nutricionistas, como Certificado de cursos e regimento.\r\nReunião on line, com o grupo de organização do Seminário Estadual de Assistência Social.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(451, '2023-05-15', 'Acesso remoto instalação de sistema betha sapo em notebook da prefeitura..', 'CLEIDE', 'CONTABILIDADE', '00:30:00', 1, 13, 0, 2, 9, 8, 4),
(452, '2023-05-15', 'Suporte remoto micro computador do posto de saúde de Lindóia do Sul, configuração para acessar sistema E-Sus, micro do posto de saúde de Lindóia do Sul.', 'EDSON', 'TI', '00:10:00', 1, 12, 0, 2, 10, 8, 4),
(453, '2023-05-15', 'Atualização dos sistemas Betha, servidor de dados.', 'DIEGO', 'TI', '01:00:00', 1, 12, 0, 2, 17, 7, 4),
(454, '2023-05-15', 'Em contato com a empresa MhNet via chat, solicitei uma cópia do contrato da telefonia DDR. ', 'DIEGO', 'TI', '01:00:00', 1, 12, 0, 2, 17, 1, 3),
(455, '2023-05-15', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 25, 10, 1, 0, 6, 1),
(456, '2023-05-15', 'Será necessário agendamento de visita técnica e levantamento topográfico do terreno.', '', '', '00:00:00', 1, 25, 10, 1, 39, 1, 5),
(457, '2023-05-15', 'Conferencia das notas digitadas no período de 2022, com o relatório de declaração de venda para o produtor, sistema RuralWeb.', 'MARTA', 'BLOCO DO PRODUTOR', '00:10:00', 1, 12, 0, 2, 11, 1, 4),
(458, '2023-05-15', 'Acesso remoto servidor, atualizar integrador sapo/compras.', 'BIANCA', 'COMPRAS', '00:20:00', 1, 13, 0, 2, 9, 8, 4),
(459, '2023-05-15', 'Suporte via WhatsApp, conferencia de uma nota digitada que apresentou erros na hora da gravação, sistema RuralWeb. ', 'JULIANA', 'BLOCO DO PRODUTOR', '00:10:00', 1, 12, 0, 2, 13, 1, 4),
(460, '2023-05-15', 'Relatório dos valores do movimento econômico por segmento (comércio, indústria, prestação de serviço e agricultura) ', 'VINICIUS', 'SECRETÁRIO IND E COM ', '01:30:00', 1, 37, 0, 2, 4, 3, 8),
(461, '2023-05-15', 'Declarações de atingimento de matrícula do processo de Regularização de Imóveis da Cidade de Ipira,loteamento Pertile, com memoriais das 13 áreas , geral e declaração de matrícula e transformados em pdf e enviadas ao escrit de adv na pessoa da Dra Vanessa com assin digitais em todos memoriais, projetos e declaração 6.810,48 m²  (Irene)', 'CARINE', 'ADMINISTRATIVO', '04:00:00', 1, 23, 0, 2, 5, 3, 19),
(462, '2023-05-05', 'plotagem da Regularização de Imóveis da Cidade de Ipira,loteamento Pertile,  13 áreas ,  com assin digitais em todos memoriais, projetos e declaração 6.810,48 m² (Irene)', 'CARINE', 'ADMINISTRATIVO', '00:40:00', 1, 23, 0, 2, 5, 4, 14),
(463, '2023-05-15', 'Acesso portal municipal, criação de novas pastas do ano 2023, \"Termos de colaboração /fomento\".', 'PAMELA', 'CI', '02:00:00', 1, 13, 0, 2, 7, 3, 4),
(464, '2023-05-15', 'Pesquisar e fazer uma tabela com a relação da data de comemoração do Dia dos Profissionais que trabalham na Amauc, Cis Amauc e Consórcio Lambari', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '01:00:00', 1, 20, 0, 2, 17, 7, 13),
(465, '2023-05-15', 'Contato por telefone com Vilmar contador sobre envio de contrato sem registro no e-sfinge e orientação a cadastro de contratos o e-sfinge', 'VILMAR ', 'CONTADOR', '00:05:00', 1, 14, 0, 2, 12, 2, 3),
(466, '2023-05-15', 'Elaboração das DCTFs da Amauc, Consorcio Lambari, CIS AMAUC, Consórcio Integrar, Consórcio CasaLar e Consórcio Abrigo Institucional e CIDAUC relativo aos meses de março/2023 e enviado a Receita Federal', 'RAFAEL', 'CONTABILIDADE', '02:00:00', 1, 14, 0, 2, 17, 4, 13),
(467, '2023-05-15', 'Organização da semana conforme demanda necessitada pelos municípios.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '03:30:00', 1, 36, 0, 2, 18, 15, 10),
(468, '2023-05-15', 'Acesso remoto configuração de certificado para envio de DCTF da Câmara.', 'ALINE', 'CONTADORA', '00:20:00', 1, 13, 0, 2, 44, 8, 4),
(469, '2023-05-15', 'Solicitação/compra de produtos para nova sede do Consórcio Lambari.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:00:00', 1, 36, 0, 2, 18, 15, 5),
(470, '2023-05-15', 'Acesso portal do CINCATARINA para pedidos de produtos para a nova sede do consórcio lambari.', 'SABRINE', 'BIOLOGA', '00:30:00', 1, 13, 0, 2, 18, 7, 5),
(471, '2023-05-15', 'Contato do setor de compras ( Ana ), confirmando o orçamento para nova tela de notebook da Educação.', 'ANA', 'COMPRAS', '00:10:00', 1, 13, 0, 2, 12, 1, 5),
(472, '2023-05-15', 'Reunião interna para verificação de demandas para semana e distribuições de funções.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '02:30:00', 1, 35, 0, 2, 18, 15, 10),
(473, '2023-05-15', 'PROCURA DE MATERIAL PARA SER UTILIZADO NA ATIVIDADE DE EDUCAÇÃOAMBIENTAL DO DIA 20/05/2023.', 'CMEI DO BAIRRO DOS ESTADOS', 'DIRETORIA', '01:00:00', 1, 35, 0, 1, 18, 1, 17),
(474, '2023-05-15', 'Reunião referente as cascalheiras com a Geóloga.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:00:00', 1, 35, 0, 2, 18, 15, 10),
(475, '2023-05-15', 'Configuração de impressora em rede.', 'SCHEILA', 'EDUCAÇÃO', '00:15:00', 1, 12, 0, 2, 14, 1, 4),
(476, '2023-05-15', 'Configuração de impressora em rede.', 'MARCIA', 'CRAS', '00:30:00', 1, 12, 0, 1, 10, 8, 4),
(477, '2023-05-15', 'Acesso portal municipal ajustar agenda de serviços 2023/2022/202.', 'VANESSA', 'TESOURARIA', '00:10:00', 1, 13, 0, 2, 12, 1, 4),
(478, '2023-05-15', 'Redação e envio ao prestador do Termo Aditivo 169 - Cerebrum;\r\nAtualização planilha IR;\r\nAtendimento telefônico e ao público em geral;\r\nAtendimento interno.\r\n\r\n', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '05:00:00', 1, 19, 0, 2, 16, 4, 13),
(479, '2023-05-15', 'Detalhamento do projeto de revitalização do parque de exposições de Jabora. Projeto e orçamento.', 'CLEVSON RODRIGO FREITAS', 'PREFEITO', '07:00:00', 1, 24, 0, 2, 9, 7, 7),
(480, '2023-05-15', 'Reunião com equipe técnica referente as atividades desenvolvidas na semana anterior e as atividades que serão desenvolvidas essa semana', 'CLAUDIA', 'DIR. ADM', '03:00:00', 1, 33, 0, 2, 18, 4, 10),
(481, '2023-05-15', 'Reunião referente ao seminário Clima, solo e água ', 'JOÃO NICODEM', 'SEC. AGRICULTURA', '00:30:00', 1, 33, 0, 2, 6, 4, 10),
(482, '2023-05-15', 'Processos de licenciamentos das cascalheiras', 'BRUNA', 'GEÓLOGA', '01:00:00', 1, 33, 0, 2, 18, 4, 10),
(483, '2023-05-15', 'Shapefile do empreendimento e de supressão para construção de galeria no Rio engano entre Itá e seara', 'LINDOMAR', 'DIRETOR MEIO AMBIENTE', '01:00:00', 1, 33, 0, 1, 8, 15, 16),
(484, '2023-05-16', 'Leitura do regimento interno do Colegiado de Nutrição, com a finalidade de verificar processo de eleição da Diretoria.\r\nElaboração de nova pauta para reunião do dia 17,tendo em vista que o regimento prevê eleição da Diretoria no mês de maio.\r\nLeitura e encaminhamentos das mensagens eletrônicas - e-mail e whatsapp.\r\nPedido da Ticket Alimentação para servidores da Amauc e CIS Amauc, o qual passa, a partir deste mês, a ser pré-pago.\r\nConferência do texto  referente ao Curso \"Importância da Língua Portuguesa ....\" para postagem no site da Egem, início da divulgação e das inscrições.\r\nCadastramento de contas da Amauc e CIS Amauc para confirmação.\r\nLançamentos nas planilhas de controle bancário, nas planilhas de controle dos valores de cada Colegiado e no controle de pagamento dos municípios.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(485, '2023-05-16', 'Ajuste para alterações das leis de de delegação do Serviço de licenciamento ambiental, para enviar para as camaras Municiapis para aprovação. ', 'CLAUDIA', 'DIR. ADM', '04:00:00', 1, 33, 0, 1, 18, 15, 16),
(486, '2023-05-16', 'contato com o setor de engenharia referente a solicitação para elaborar o projeto preventivo do Centro administrativo e Posto de Saúde.', 'POLYANA', 'ENGENHEIRA', '03:30:00', 1, 27, 0, 1, 3, 2, 5),
(487, '2023-05-16', 'Solicitação para alterar senha do seguinte endereço de e-mail agente.edinan@arabuta.sc.gov.br.\r\n', 'MARCELO', 'TI', '00:05:00', 1, 12, 0, 2, 3, 1, 4),
(488, '2023-05-16', 'Acesso portal municipal adicionar arquivo ( ato 05 homologação provisória ) em pagina de concurso público 2023.	', 'ADRIANE', 'COMPRAS', '00:10:00', 1, 13, 0, 2, 14, 1, 4),
(489, '2023-05-16', 'Levantamento de Informações repassadas pelos municípios em relação a realização dos Jogos de Integração dos Idosos, com posterior tabulação dos dados em uma planilha para melhor visualização e análise.', 'NEUSA', 'ASSISTENTE SOCIAL', '01:30:00', 1, 20, 0, 1, 17, 7, 8),
(490, '2023-05-15', 'A pedido da SEF/SC solicitação para conferência de todas as hidrelétricas do estado valores a serem conferidos com o que está lançado no site CCEE com os dados lançados na DIME ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '04:50:00', 1, 37, 0, 2, 17, 8, 5),
(491, '2023-05-16', 'Fazer levantamento Topográfico do terreno para a construção do Centro Cultural.', '', '', '00:00:00', 1, 25, 10, 0, 39, 0, 0),
(492, '2023-05-15', 'Auxiliando no cadastro de projeto do novo sistema.', 'LIANA', 'ENGENHEIRA', '00:30:00', 1, 25, 0, 1, 15, 1, 7),
(493, '2023-05-16', 'Acesso servidor liberação para técnico da Betha \"Samuel\" - manutenção betha Tributos.', 'MANUELLI', 'TRIBUTOS', '00:15:00', 1, 13, 0, 2, 9, 1, 4),
(494, '2023-05-15', 'Solicitação de orçamentos para instalação de novas persianas na sede AMAUC e Consórcio Lambari, via Whatsapp.', 'AMAUC', 'AMAUC', '00:30:00', 1, 25, 0, 1, 17, 1, 18),
(495, '2023-05-15', 'Desenvolvimento de desenho de árvore para projeto \"Cores da Terra\".', 'FERNANDA', 'ENGENHEIRA', '05:00:00', 1, 25, 0, 1, 18, 4, 9),
(496, '2023-05-16', 'Edital do Conselho Tutelar de Presidente Castello Branco  - Confirmar e Cancelar as Inscrições conforme relação repassada pelo município.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '00:45:00', 1, 20, 0, 1, 17, 7, 13),
(497, '2023-05-16', 'Edital do Conselho Tutelar de Lindóia do Sul - Confirmar e Cancelar as Inscrições conforme relação repassada pelo município.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '00:45:00', 1, 20, 0, 2, 17, 7, 13),
(498, '2023-05-15', 'Desenvolvimento de planilha de checklist para levantamento em campo.', 'ELAINE', 'ARQUITETA', '01:00:00', 1, 25, 0, 2, 17, 7, 13),
(499, '2023-05-16', 'Desenvolvimento e plotagem de desenho de árvore que será utilizada em projeto \"Cores da Terra\".', 'FERNANDA', 'ENGENHEIRA', '02:00:00', 1, 25, 0, 1, 18, 4, 9),
(500, '2023-05-16', 'Solicitação de novos orçamentos  de instalação de persiana para sede Amauc e Consórcio Lambari.', 'AMAUC', 'AMAUC', '01:00:00', 1, 25, 0, 1, 17, 1, 18),
(501, '2023-05-16', 'Encaminhado em pdf com assin digit área cemitério SC 154 com curvas de nivel e área verde (Irene)', 'POLYANA', 'ENG', '00:30:00', 1, 23, 0, 2, 3, 1, 6),
(502, '2023-05-16', 'Publicação de edital de assembleia nos portais do Consórcio e DOM.	', 'CLAUDIA', 'DIRETORA', '00:20:00', 1, 13, 0, 2, 18, 7, 4),
(503, '2023-05-16', 'Capacitação programa \"Penso, logo destino\" - IMA', 'CLAUDIA', 'DIR. ADM', '03:00:00', 1, 33, 0, 1, 18, 12, 2),
(504, '2023-05-16', 'Edital de convoção assembleia extraordinária ', 'CLAUDIA', 'DIR. ADM', '00:30:00', 1, 33, 0, 2, 18, 15, 10),
(505, '2023-05-16', 'Cadastro de vaga de estagio no programa do CIEE.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '00:40:00', 1, 35, 0, 2, 18, 15, 13),
(506, '2023-05-16', 'Atualização do Declarante no sistema do IBAMA.\r\nE verificação de atualização do representante Legal (Presidente do Consórcio Lambari), porém o mesmo esta com pendências, e entramos em contato com a Equipe para regularização.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:00:00', 1, 35, 0, 2, 18, 15, 13),
(507, '2023-05-16', 'Capacitação com os representantes dos municípios no Programada Penso Logo Destino.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '03:00:00', 1, 35, 0, 1, 18, 4, 2),
(508, '2023-05-16', 'Acesso remoto, configuração portal TCE Virtual.', 'SUSI', 'CONTABILIDADE', '00:20:00', 1, 13, 0, 2, 7, 8, 4),
(509, '2023-05-16', 'Envio do novo boleto de ART do cemiterio de Ipumirim.(Irene)', 'IGORI', 'ENG', '00:15:00', 1, 23, 0, 2, 6, 1, 20),
(510, '2023-05-16', 'ALTERAÇÃO DO PROJETO ARQUITETÔNICO DA ESCOLA DE PRIMEIRO GRAU AMÉLIA POLEETO HEPP.(MODIFICAÇÃO DA PLANTA BAIXA DA ESCOLA ANTIGA E DE USO INSTITUCIONAL CORREÇÃO EM COTAS DO TERRENO, ALTERAÇÃO NO PREVENTIVO).', 'SERGIO', 'ENGENHEIRO', '03:30:00', 1, 27, 0, 1, 15, 7, 7),
(511, '2023-05-16', 'Acesso remoto realização de backup e atualização sistema SIOPE.', 'CLEIDE', 'CONTABILIDADE', '00:20:00', 1, 13, 0, 2, 9, 8, 4),
(512, '2023-05-16', 'Suporte remoto micro do controle interno, configuração certificado digital.', 'ADRIANA', 'CONTROLE INTERNO', '00:10:00', 1, 12, 0, 2, 11, 8, 4),
(513, '2023-05-16', 'Solicitante envio lista e produtos do CIN Catarina para escolher de 05 notebooks e 02 computadores da lista disponivel para o setor Social e Conselho Tutelar.', 'MAISA', 'SOCIAL', '00:20:00', 1, 13, 0, 2, 12, 1, 4),
(514, '2023-05-16', 'Manutenção servidor de dados da prefeitura de Peritiba, unidade C, está sem espaço para instalação de atualizações dos aplicativos. \r\nBackups das informações da unidade D para em hd externo e na unidade E. Unidade D será excluída para poder fazer ampliação da unidade C, após será criada uma nova unidade D e será restaurado os arquivos de backup.', 'AMAUC', 'TI', '04:00:00', 1, 12, 0, 1, 11, 8, 3),
(515, '2023-05-16', 'Publicação termo aditivo em portal do CisAmauc e DOM.', 'LUCIANE', 'SECRETARIA', '00:10:00', 1, 13, 0, 2, 16, 3, 4),
(516, '2023-05-16', 'Acesso portal municipal inserir arquivo referente ao processo seletivo Cons. Tutelar 2023.', 'MARILENE', 'RH', '00:10:00', 1, 13, 0, 2, 5, 1, 4),
(517, '2023-05-16', 'Backup do sistema FolhaRh e envio para o Ftp da Betha.', 'ZENI', 'RH', '00:15:00', 1, 12, 0, 2, 12, 8, 4),
(518, '2023-05-16', 'Acesso remoto ativação sistema em notebook da educação.', 'ERICA', 'PROFESSORA', '00:10:00', 1, 13, 0, 2, 12, 8, 4),
(519, '2023-05-08', 'Repasse de informações e orientações para a Coordenadora referente ao Edital do Concurso Público Nº 01/2021, sobre validade do concurso e esclarecimento de algumas dúvidas sobre tempo limite para o candidato responder se assume ou não a vaga, informações repassadas com base no que consta no Edital.', 'SIMONE', 'COORDENADORA', '00:30:00', 1, 21, 0, 2, 19, 1, 5),
(520, '2023-05-16', 'Suporte remoto servidor de dados da prefeitura, configuração de usuário para acesso via conexão de área de trabalho remoto.', 'EDSON', 'TI', '00:20:00', 1, 12, 0, 2, 10, 8, 4),
(521, '2023-05-16', 'Atualizações de CNES;\r\nConferência inconsistências BPA;\r\nRedação TA 170 Hospital São Francisco - Ginecologia e Obstetrícia;\r\nAtendimento telefônico e ao público em geral;\r\nAtendimento interno.', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '06:30:00', 1, 19, 0, 2, 16, 4, 13),
(522, '2023-05-16', 'Acompanhamento em medições das janelas para orçamento de persianas, desenho de janelas e persianas pra orçamento, e orçamentos de serviços para sala nova.', 'CLAUDIA', 'DIRETORA', '03:30:00', 1, 25, 0, 1, 18, 4, 5),
(523, '2023-05-16', 'Orçamento de manutenção e novas persianas para sede AMAUC.', 'AMAUC', 'AMAUC', '00:30:00', 1, 25, 0, 1, 17, 4, 18),
(524, '2023-05-17', 'Leitura de mensagens eletrônicas e encaminhamentos.\r\nLançamentos nas planilhas de controle bancário das contas da Amauc.\r\nRedação da ata da reunião de formação do Colegiado de Proteção e Defesa Civil, realizada no dia 9 de março Iniciada).\r\nPeríodo da tarde reunião do Colegiado de Nutrição.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(525, '2023-05-17', 'Acesso remoto servidor de internet da Prefeitura de Irani, pesquisa de endereço de Mac cadastrado no sistema para identificar qual ip está relacionado ao Mac. ', 'GUSTAVO', 'TI', '00:10:00', 1, 12, 0, 2, 7, 8, 4),
(526, '2023-05-17', 'Acesso remoto servidor de dados da Prefeitura, inclusão de um novo usuário para acesso remoto ao servidor. Configuração da área de trabalho do usuário, definição de acesso a pastas dos departamentos que o usuário terá acesso.', 'EDSON', 'TI', '00:30:00', 1, 12, 0, 2, 10, 8, 4),
(527, '2023-05-17', 'Edital do Conselho Tutelar de Ipira - Confirmar e Cancelar as Inscrições conforme relação repassada pelo município.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '00:30:00', 1, 20, 0, 2, 17, 7, 13),
(528, '2023-05-17', 'Acesso portal inserir noticia sobre capacitação do programa do IMA.', 'SABRINE', 'BIOLOGA', '00:10:00', 1, 13, 0, 2, 18, 1, 4),
(529, '2023-05-17', 'Envio de e-mail para empresas para cotação de HD ssd 480GB para substituição em um Notebook da Educação (Carme)', 'CLEIDE', 'CONTABILIDADE', '00:20:00', 1, 13, 0, 2, 9, 3, 4),
(530, '2023-05-16', 'Expediente na Amauc com inicio as 7 horas da manha ate as 11 horas com trabalhos e tarefas de setor, encaminhamento de Assembleia Concorcio Lambari e CIS AMAUC, encaminhamentos diversos e prestações de contas', 'AMAUC', 'SEC EXECUTIV', '04:00:00', 1, 14, 0, 2, 17, 4, 13),
(531, '2023-05-16', 'Deslocamento a cidade de Florinopolis para participar em reunião com os Presidentes e Secretários Executivos das Associações de Municípios nos dias 17 e 18/05', 'FECAM', 'SEC EXECUTIVA', '06:30:00', 1, 14, 0, 2, 17, 7, 1),
(532, '2023-05-17', 'Participação em reunião na Fecam com os Secretarios Executivos, Presidentes de Associações de Municípios e Diretoria Executiva da Fecam conforme pauta', 'VANDERLEI', 'SEC EXECUTIVA', '04:00:00', 1, 14, 0, 1, 17, 4, 10),
(533, '2023-05-16', 'Levantamento de materiais de escritório que serão necessários para utilização do Consórcio Lambari para nova sede.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '02:00:00', 1, 36, 0, 2, 18, 1, 8),
(534, '2023-05-16', 'Capacitação para os coordenadores e suplentes dos municípios que aderiram ao Programa Penso, logo destino- IMA.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '03:00:00', 1, 36, 0, 2, 18, 11, 2),
(535, '2023-05-17', 'Conversa com Suzi sobre envio da DCTF Web e Reinf de Fundos e CNPJs sem movimentações para a Receita Federal - sugerido conversar com Rosi do INSS Joaçaba', 'SUZI', 'CONTADORA', '00:05:00', 1, 14, 0, 2, 7, 1, 4),
(536, '2023-05-16', 'Revisado Minuta das Legislações para Programa de Licenciamento-PROLAI que será aderido pelos municípios. ', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:30:00', 1, 36, 0, 2, 18, 4, 13),
(537, '2023-05-17', 'Acesso portal do turismo para criação de novo usuário ( Thiago )', 'THIAGO', 'TI', '00:10:00', 1, 13, 0, 2, 13, 1, 4),
(538, '2023-05-16', 'Auditoria Movimento Econômico ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '07:50:00', 1, 37, 0, 1, 17, 8, 15),
(539, '2023-05-17', 'Auditoria Movimento Econômico ', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '07:00:00', 1, 37, 0, 1, 17, 8, 15),
(540, '2023-05-17', 'ELABORAÇÃO DE JUSTIFICATIVA DE PROJETO, ELABORAÇÃO DE FORMULÁRIOS F-2, PARA SHP,ENCAMINHAMENTO,SAÍDAS DE EMERGÊNCIAS,COMPROVAÇÃO DO TEMPO DE EDIFICAÇÃO EXISTENTE,ELABORAÇÃO DE RELATÓRIO FOTOGRAFICO DA LOCAÇÃO JUNTO O GOOGLE .', 'SERGIO', 'ENGENHEIRO', '07:00:00', 1, 27, 0, 1, 15, 7, 7),
(541, '2023-05-16', 'Detalhamento do projeto de revitalização do parque de exposições de Jabora. Projeto e orçamento.', 'CLEVSON RODRIGO FREITAS', 'PREFEITO', '07:00:00', 1, 24, 0, 2, 9, 7, 7),
(542, '2023-05-17', 'Alteração do desenho do levantamento e projeto de revitalização do clube SER Juventude. Correção do projeto que foi licitado.', 'GABRIELA GRISA ', 'ARQUITETA', '03:30:00', 1, 24, 0, 2, 10, 7, 7),
(543, '2023-05-17', 'Acesso portal municipal inserir arquivo (homologação) referente ao processo chamada publicada 01/2023 Educação.', 'MARILENE', 'RH', '00:10:00', 1, 13, 0, 2, 5, 1, 4),
(544, '2023-05-17', 'Contado telefonico para auxilio em edição do portal de turismo.', 'THIAGO', 'TI', '00:20:00', 1, 13, 0, 2, 13, 2, 5),
(545, '2023-05-17', 'Contato para verificação de relogio ponto no Cras.', 'KIMBERLY', 'RH', '00:10:00', 1, 13, 0, 2, 9, 1, 4),
(546, '2023-05-17', 'Envio pelo whatsapp de arquivo executavel da ultima versao do siops 64bits.', 'SUSI', 'CONTABILIDADE', '00:10:00', 1, 13, 0, 2, 7, 1, 4),
(547, '2023-05-17', 'Realizado protocolo do pedido de Licenciamento para regularização do cemitério municipal de Irani.', 'THIZA', 'SECRETARIA DE PLANEJAMENTO', '00:40:00', 1, 35, 0, 1, 7, 9, 16),
(548, '2023-05-17', 'Conferência de todos Presidentes das Câmaras de vereadores dos municípios para notificação das Leis para Licenciamento Ambiental.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:00:00', 1, 35, 0, 2, 18, 15, 13),
(549, '2023-05-17', 'Acesso portal municipal de LDS para add banner e link para Processo Seletivo 01/2023 -  saude', 'ANDREIA ', 'PROCESSO SELETIVO', '00:20:00', 1, 13, 0, 2, 10, 3, 4),
(550, '2023-05-17', 'Pintura do painel com cores da Terra para utilização da tarefa de educação ambiental que será aplicada dia 20/05/2023.', 'CMEI DO BAIRRO DOS ESTADOS', 'DIRETORIA', '03:30:00', 1, 35, 0, 2, 4, 15, 17),
(551, '2023-05-17', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 29, 10, 1, 39, 6, 1),
(552, '2023-05-17', 'Acesso remoto configuração e-mail ve@ipumirim.sc.gov.br no sistema outlook.', 'MILANIA', 'VE', '00:20:00', 1, 13, 0, 2, 6, 8, 4),
(553, '2023-05-17', 'Contato com IMA para atualização do processo de Supressão de vegetação da Linha 03 Barras do município de Concórdia.', 'CONSÓRCIO LAMBARI', 'EQUIPE', '00:30:00', 1, 35, 0, 2, 4, 1, 12),
(554, '2023-05-17', 'Verificação e indicação/orientação para resposta a ARIS referente ao Projeto TRATASAN.', 'LINDOMAR', 'EQUIPE', '01:00:00', 1, 35, 0, 1, 8, 1, 5),
(555, '2023-05-17', 'Publicação termo aditivo 169 do TC 69, em portal do CisAmauc e DOM.', 'MARLON', 'DIRETOR', '00:15:00', 1, 13, 0, 2, 16, 3, 4),
(556, '2023-05-17', 'Elaboração de orçamento para pavimentação asfáltica (recape) de 2 ruas do municipio - Rua São Roque e Rua Cardeal Camara.', 'CLEVSON RODRIGO FREITAS', 'PREFEITO', '03:30:00', 1, 24, 0, 2, 9, 7, 18),
(557, '2023-05-17', 'Organização do relatório de atividades AMAUC comp. 04/2023;\r\nOrganização do relatório de atividades AMAUC comp. 04/2023 (capacitações);\r\nContato via whats com prestadores Cis Amauc;\r\nAtualização planilha de prestadores;\r\nAtendimento telefônico e ao público em geral;\r\nAtendimento interno.\r\n', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '07:00:00', 1, 19, 0, 2, 16, 4, 13),
(558, '2023-05-18', 'Leitura e encaminhamentos de mensagens eletrônicas (e-mail e whatsapp).\r\nContinuidade de audição do áudio da reunião da Defesa Civil do dia 9 de março, para redação da ata a ser apreciada na reunião do dia 22 de maio.\r\nDemandas internas.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(559, '2023-05-10', 'Elaborar atividades de educação ambiental que possam ser executadas na Prainha do município de Itá.', 'LINDOMAR ', 'DIRETOR DE MEIO AMBIENTE ', '03:00:00', 1, 34, 0, 2, 8, 4, 8),
(560, '2023-05-10', 'Reunião para articular os tramites do projeto A Criança e a Natureza que Este ano será no município de Seara.', 'FABIANA ', 'SECRETARIA DE EDUCAÇÃO', '01:30:00', 1, 34, 0, 2, 13, 4, 10),
(561, '2023-05-18', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 26, 7, 1, 36, 6, 1),
(562, '2023-05-18', 'transferindo para setor responsavel', '', '', '00:00:00', 1, 26, 7, 0, 36, 0, 0),
(563, '2023-05-12', 'Implantação da trilha ecológica na escola de Taquaral. ', 'LUCIMARA ', 'DIRETORA DE EDUCAÇÃO ', '04:00:00', 1, 34, 0, 2, 12, 14, 5),
(564, '2023-05-09', 'projeto de implantação da trilha ecológica no Centro de eventos de Jaborá. ', 'CLEVSON ', 'PREFEITO MUNICIPAL ', '03:00:00', 1, 34, 0, 2, 9, 4, 7),
(565, '2023-05-18', 'Acesso remoto atualizção de sistema betha e instalação betha PDF.', 'ANA', 'COMPRAS', '00:20:00', 1, 13, 0, 2, 12, 8, 4),
(566, '2023-05-08', 'Geração de arquivo em PDF e Excel com informações dos candidatos inscritos e envio do mesmo para a Comissão elaborar a lista de publicação dos candidatos inscritos deferidos e indeferidos do Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Arabutã. Orientação e esclarecimento de dúvidas referente a publicação da lista. Publicação da lista no sistema e no site da Amauc e da Prefeitura.', 'CRISTINA', 'PRES COMISSÃO ELEIÇÃO CT', '01:00:00', 1, 21, 0, 2, 3, 1, 22),
(567, '2023-05-08', 'Orientação e esclarecimento de dúvidas referente a publicação da lista de inscritos. Auxílio na geração de arquivo em PDF e Excel com informações dos candidatos inscritos. Envio dos arquivos para a Comissão realizar a conferência da lista de publicação dos candidatos inscritos no Edital de Eleição Pública Nº 01/2023, referente ao processo de escolha dos membros do Conselho Tutelar do Município de Concórdia. Publicação da lista no sistema e no site da Amauc e da Prefeitura.', 'KELI', 'PRES COMISSÃO ELEIÇÃO CT', '01:00:00', 1, 21, 0, 2, 4, 1, 22),
(568, '2023-05-08', 'Orientação sobre elaboração de Errata de prorrogação do período das inscrições. Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Ipira. ', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:45:00', 1, 21, 0, 2, 5, 1, 11),
(569, '2023-05-08', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara. Orientação sobre prorrogação do período das inscrições, sobre documentação necessária para publicação e reabertura do período das inscrições.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '01:00:00', 1, 21, 0, 2, 13, 1, 11),
(570, '2023-05-08', 'Orientação sobre elaboração de Errata de prorrogação do período das inscrições. Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:45:00', 1, 21, 0, 2, 15, 1, 11),
(571, '2023-05-18', 'CONTATO JUNTO AS EMPRESAS PARA OBTER VALORES DE MATERIAL PARA ELABORAÇÃO DE ORÇAMENTO DO PROJETO PREVENTIVO DO GINÁSIO DE ESPORTES.CÓPIAS DO PROJETO PREVENTIVO E DOCUMENTOS E ASSINATURAS.', 'DANIEL', 'ENGENHEIRO', '07:00:00', 1, 27, 0, 1, 11, 7, 18),
(572, '2023-05-18', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 23, 2, 1, 31, 6, 1),
(573, '2023-05-17', 'Feito mapa, impressão de 02 pranchas, memorial descritivo , documentação para retificação parcial da área do município em Lajeado Acídio área 205947,70 m²', 'ALAN', 'ENG', '08:30:00', 1, 23, 0, 2, 10, 4, 19),
(574, '2023-05-18', 'Feito mapa, impressão de 02 pranchas, memorial descritivo , documentação para desmembramento de 04 áreas para área industrial com doctção p Incra  da área do município em Lajeado Acídio de 30.390,82 m²', 'ALAN', 'ENG', '06:00:00', 1, 23, 0, 2, 10, 4, 5),
(575, '2023-05-18', 'Conversa com Carine e envio por email do processo REURB Petter enviado em word a pedido para cartório digitar os memoriais dos lotes e da área total', 'CARINE', 'ADMINISTRATIVO', '01:00:00', 1, 23, 0, 2, 5, 3, 19),
(576, '2023-05-18', 'Finalização de projeto e orçamento (material para licitação) do projeto de ampliação da creche municipal Chapeuzinho Vermelho.', 'ROZIMERI SPAZINI', 'ARQUITETA', '03:30:00', 1, 24, 0, 2, 5, 7, 7),
(577, '2023-05-08', 'Orientação e esclarecimento de dúvidas referente a publicação da lista de inscritos. Auxílio na geração de arquivo em PDF e Excel com informações dos candidatos inscritos. Envio dos arquivos para a Comissão realizar a conferência da lista de publicação dos candidatos inscritos no Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar do Município de Irani. Publicação da lista no sistema e no site da Amauc e da Prefeitura.', 'JAÇANÃ', 'PRES COMISSÃO ELEIÇÃO CT', '01:00:00', 1, 21, 0, 2, 7, 1, 22),
(578, '2023-05-08', 'Orientação sobre elaboração de Errata de prorrogação do período das inscrições. Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:45:00', 1, 21, 0, 2, 10, 1, 11),
(579, '2023-05-08', 'Acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco. ', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:45:00', 1, 21, 0, 2, 12, 1, 11),
(580, '2023-05-09', 'Solicitação de atendimento junto ao Sistema SCI - Ana Manoele, para atualização de certificado digital do Cis Amauc que estava vencido, correção dos erros, envio da folha para o eSocial, geração do imposto INSS.', 'MARLON', 'DIRETOR', '01:30:00', 1, 21, 0, 2, 16, 8, 4),
(581, '2023-05-09', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:40:00', 1, 21, 0, 2, 15, 1, 22),
(582, '2023-05-09', 'Atendimento, orientação e esclarecimento de dúvidas referente ao Edital Nº 001/2023 CMDCA, processo de escolha dos membros do Conselho Tutelar da prefeitura municipal de Arabutã.', 'FERNANDA', 'MEMBRO COMISSÃO', '00:30:00', 1, 21, 0, 2, 3, 2, 11),
(583, '2023-05-09', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Mildred. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Ipira.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:40:00', 1, 21, 0, 2, 5, 1, 22),
(584, '2023-05-09', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Giovana. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:40:00', 1, 21, 0, 2, 10, 1, 22),
(585, '2023-05-09', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Maisa. Esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:40:00', 1, 21, 0, 2, 12, 1, 22),
(586, '2023-05-09', 'Orientação sobre elaboração de Errata de prorrogação do período das inscrições e errata de alteração do cronograma. Acompanhamento, conferência, geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara. Publicação da errata de reabertura das inscrições e da errata de alteração do cronograma do Edital.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '02:00:00', 1, 21, 0, 2, 13, 1, 22),
(587, '2023-05-10', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Giovana. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 10, 1, 22),
(588, '2023-05-10', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Mildred. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Ipira.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 5, 1, 22),
(589, '2023-05-10', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 15, 1, 22),
(590, '2023-05-10', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Maisa. Esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 12, 1, 21),
(591, '2023-05-10', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22),
(592, '2023-05-10', 'Verificação de acesso ao sistema, onde os arquivos anexados pelos candidatos inscritos no Edital de Eleição Pública Nº 01/2023, referente ao processo de escolha dos membros do Conselho Tutelar do Município de Concórdia, não estavam baixando. Solicitação de suporte ao sistema ProSeleta para verificação do problema.', 'ALINE', 'MEMBRO COMISSÃO', '01:00:00', 1, 21, 0, 2, 4, 1, 4),
(593, '2023-05-10', 'Reunião presencial junto aos membros da Comissão Organizadora do Concurso Público - Edital Nº 1/2023 - Câmara Municipal de Vereadores de Concórdia, referente a publicação da homologação final, onde houve a apresentação de recurso referente a questão em segunda instância. Publicação de de cronograma de prorrogação da homologação final. Elaboração de comunicado relatando o acontecido em relação ao recurso apresentado para protocolo junto a Comissão, para análise e perecer jurídico da Comissão Coordenado do Concurso Público - Edital Nº 1/2023 - Câmara Municipal de Vereadores de Concórdia.', 'JAIME', 'MEMBRO COMISSÃO', '03:30:00', 1, 21, 0, 2, 27, 4, 11),
(594, '2023-05-18', 'Arquivamento de toda documentação referente ao Concurso Público da Câmara de Vereadores de Concórdia -  Homologação Final feita no dia 17/05/2023.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '01:00:00', 1, 20, 0, 2, 17, 7, 13),
(595, '2023-05-11', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Maisa. Esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 12, 1, 22),
(596, '2023-05-11', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Mildred. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Ipira.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 5, 1, 22),
(597, '2023-05-11', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22),
(598, '2023-05-11', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 15, 1, 22),
(599, '2023-05-17', 'Atualização das minutas de leis de delegação de serviço de licenciando ao Consórcio  dos 14 Municípios, para encaminhar para as câmaras de vereadores . Elaboração das minutas de mensagem.  ', 'CLAUDIA', 'DIR. ADM', '04:00:00', 1, 33, 0, 1, 18, 15, 22),
(600, '2023-05-11', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Giovana. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 10, 1, 22),
(601, '2023-05-17', 'Organização  doc. para realização da assembleia extraordinária', 'CLAUDIA', 'DIR. ADM', '02:00:00', 1, 33, 0, 2, 18, 15, 5),
(602, '2023-05-17', 'Reunião com geóloga referente a situação das cascalheiras. ', 'CLAUDIA', 'DIR. ADM', '01:00:00', 1, 33, 0, 2, 18, 15, 10),
(603, '2023-05-11', 'Elaboração, impressão e recorte de cartão para homenagem aos Dias das Mães. Contato com os filhos de cada mãe para gravação de mensagem em formato de vídeo, bem curtinho falando sobre o que sua mãe significa. O objetivo dos vídeos é para fazer uma montagem com todos os filhos e apresentar para as mamães em homenagem aos dia delas que acontece no próximo dia 14/05/2023.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '03:00:00', 1, 21, 0, 2, 17, 4, 13),
(604, '2023-05-18', 'Reorganização da programação do Seminário Clima, solo e agua.', 'LEILA', 'AGRICULTURA', '01:00:00', 1, 33, 0, 1, 6, 1, 22),
(605, '2023-05-18', 'Elaboração  - compensação ambiental e reposição florestal - processo para  construção de  galeria no Rio Engano - itá e SEARA\r\nElaboração do termo de compensação ambiental\r\n', 'LINDOMAR', 'DIRETOR MEIO AMBIENTE', '03:00:00', 1, 33, 0, 1, 8, 4, 7),
(606, '2023-05-12', 'Elaboração de Resolução de troca de cargos do Consórcio Lambari. Busca pelas resoluções antigas que vinculavam o cargo ao colaborador, para constar na nova resolução. ', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '00:40:00', 1, 21, 0, 2, 18, 4, 13),
(607, '2023-05-12', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 15, 1, 22),
(608, '2023-05-12', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22),
(609, '2023-05-12', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Giovana. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 10, 1, 22),
(610, '2023-05-12', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Mildred. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Ipira.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 5, 1, 22),
(611, '2023-05-12', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Maisa. Esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 12, 1, 22),
(612, '2023-05-12', 'Elaboração, montagem, de Edital para realização de Processo Seletivo para a Amauc.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '03:30:00', 1, 21, 0, 1, 17, 4, 13),
(613, '2023-05-12', 'Homenagem aos Dia das Mães as mamães da Amauc, Cis Amauc e Lambari. Apresentação do vídeo feito pelos filhos e montado pelo nosso colaborador Cícero.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '00:30:00', 1, 21, 0, 2, 17, 4, 10),
(614, '2023-05-15', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 15, 1, 22),
(615, '2023-05-15', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Mildred. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Ipira.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 5, 1, 22),
(616, '2023-05-15', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Giovana. Esclarecimento de dúvidas referente ao Edital Nº 01/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Lindóia do Sul.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 10, 1, 22),
(617, '2023-05-15', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para a Maisa. Esclarecimento de dúvidas referente ao Edital Nº 001/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Presidente Castello Branco.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 12, 1, 22),
(618, '2023-05-15', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22),
(619, '2023-05-15', 'Atendimento, orientação e esclarecimento de dúvidas referente ao Edital Nº 001/2023 CMDCA, processo de escolha dos membros do Conselho Tutelar da prefeitura municipal de Arabutã.', 'FERNANDA', 'MEMBRO COMISSÃO', '00:15:00', 1, 21, 0, 2, 3, 2, 11),
(620, '2023-05-15', 'Recepção de arquivo de retorno referente aos pagamentos das inscrições do Edital Nº 01/2023 - Processo Seletivo Simplificado Nº 01/2023, da Prefeitura Municipal de Irani, baixa via sistema, conferência de relatório do banco se está de acordo com os pagamentos baixados e relatório do banco.', 'NILSON', 'TESOUREIRO', '00:15:00', 1, 21, 0, 2, 7, 3, 22),
(621, '2023-05-15', 'Pesquisa de regimentos internos e estatutos de outras associações para base de atribuições de cargos, tarefas desenvolvidas como base de ideia para a elaboração e montagem de Edital para realização de Processo Seletivo para a Amauc.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '03:00:00', 1, 21, 0, 1, 17, 4, 13),
(622, '2023-05-18', 'Organização dia de campo e da ciência', 'MARIISA', 'EMBRAPA', '00:30:00', 1, 33, 0, 2, 18, 5, 10),
(623, '2023-05-18', 'Oficio e encaminhamento de pedido de sementes ao CDA para serem distribuídas no seminário :Clima, solo e agua ', 'JOÃO NICODEM', 'SEC. AGRICULTURA', '01:00:00', 1, 33, 0, 2, 6, 15, 6),
(624, '2023-05-15', 'Conversa sobre Edital de Processo Seletivo, necessidade urgente do município. Ajuda na leitura e ajustes no Edital quanto ao cronograma, normas de aplicação da prova, prazos a serem cumpridos, período de inscrições e demais informações necessárias para a elaboração do Edital.', 'SANDRA', 'ANALISTA ADM - RH', '01:00:00', 1, 21, 0, 2, 10, 2, 11),
(625, '2023-05-18', 'Análise do Projeto TRATASAN que foi elaborado para o município de Itá para possíveis sugestões para adequação e apresentação ao MP.\r\nAguardando o Lindomar passar mapa atualizado do sistema de tratamento para verificarmos a melhor alternativa.', 'LINDOMAR', 'SECRETARIA DE PLANEJAMENTO', '02:00:00', 1, 35, 0, 1, 8, 1, 11),
(626, '2023-05-18', 'Reunião para primeiras definições do DIa de Campo da EMBRAPA.', 'EMBRAPA', 'DIRETORIA', '00:40:00', 1, 35, 0, 2, 18, 5, 10),
(627, '2023-05-18', 'Identificação da fauna para estudo faunístico do processo de supressão para a ponte de divisa entre Itá e Seara.', 'MARCELA', 'COOD.LICEN.AMBIENTAL', '04:00:00', 1, 35, 0, 1, 18, 4, 7),
(628, '2023-05-18', 'foram realizados os levantamentos de campo  no dia 10 de maio', '', '', '04:00:00', 1, 33, 4, 1, 31, 14, 8),
(629, '2023-05-18', 'Auditoria Movimento Econômico', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '07:30:00', 1, 37, 0, 2, 17, 8, 15),
(630, '2023-05-16', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22);
INSERT INTO `atividade` (`ati_cod`, `ati_data`, `ati_descricao`, `ati_solicitante`, `ati_cargo`, `ati_tempo`, `ati_situacao`, `usu_cod`, `sol_cod`, `sol_status`, `cli_cod`, `afr_cod`, `atp_cod`) VALUES
(631, '2023-05-18', 'Relatório comparativo dos anos de 2018 a 2022 das empresas do município de Itá para o Movimento Econômico solicitado pelo prefeito ', 'VILMARIZE ', 'SECRETÁRIA', '01:30:00', 1, 37, 0, 2, 8, 1, 5),
(632, '2023-05-16', 'Geração de arquivo em PDF e Excel com informações dos candidatos inscritos e envio do mesmo para a Comissão elaborar a lista de publicação dos candidatos inscritos deferidos e indeferidos do Edital Nº 001/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar da prefeitura municipal de Presidente Castello Branco. Orientação e esclarecimento de dúvidas referente a publicação da lista. Publicação da lista no sistema e no site da Amauc e da Prefeitura.', 'MAISA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 12, 1, 22),
(633, '2023-05-16', 'Geração de arquivo em PDF e Excel com informações dos candidatos inscritos e envio do mesmo para a Comissão elaborar a lista de publicação dos candidatos inscritos deferidos e indeferidos do Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar da prefeitura municipal de Lindóia do Sul. Orientação e esclarecimento de dúvidas referente a publicação da lista. Publicação da lista no sistema e no site da Amauc e da Prefeitura.', 'GIOVANA', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 10, 1, 22),
(634, '2023-05-16', 'Geração de arquivo em PDF e Excel com informações dos candidatos inscritos e envio do mesmo para a Comissão elaborar a lista de publicação dos candidatos inscritos deferidos e indeferidos do Edital Nº 01/2023/CMDCA, referente ao processo de escolha dos membros do Conselho Tutelar da prefeitura municipal de Ipira. Orientação e esclarecimento de dúvidas referente a publicação da lista. Publicação da lista no sistema e no site da Amauc e da Prefeitura.', 'MILDRED', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 5, 1, 22),
(635, '2023-05-16', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba. Orientação sobre elaboração de Errata de prorrogação do período das inscrições.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 15, 1, 11),
(636, '2023-05-16', 'Recepção de arquivo de retorno referente aos pagamentos das inscrições do Edital Nº 01/2023 - Processo Seletivo Simplificado Nº 01/2023, da Prefeitura Municipal de Irani, baixa via sistema, conferência de relatório do banco se está de acordo com os pagamentos baixados e relatório do banco.', 'NILSON', 'TESOUREIRO', '00:15:00', 1, 21, 0, 2, 7, 3, 22),
(637, '2023-05-16', 'Concurso Público - Edital Nº 1/2023 - Câmara Municipal de Vereadores de Concórdia. Geração, formatação de arquivo com os recursos apresentados em relação as questões da prova escrita em segunda instância. Geração e conferência da lista de candidatos a serem publicado na homologação final. Geração de arquivo dos dados dos aprovados e formatação da planilha para envio a Câmara. ', 'JAIME', 'MEMBRO COMISSÃO', '03:30:00', 1, 21, 0, 2, 27, 4, 13),
(638, '2023-05-17', 'Recepção de arquivo de retorno referente aos pagamentos das inscrições do Edital Nº 01/2023 - Processo Seletivo Simplificado Nº 01/2023, da Prefeitura Municipal de Irani, baixa via sistema, conferência de relatório do banco se está de acordo com os pagamentos baixados e relatório do banco.', 'NILSON', 'TESOUREIRO', '00:15:00', 1, 21, 0, 2, 7, 3, 22),
(639, '2023-05-17', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:45:00', 1, 21, 0, 2, 13, 1, 22),
(640, '2023-05-17', 'Edital de Processo Seletivo Nº 01/2023, da Prefeitura Municipal de Lindóia do Sul, cadastro do edital no sistema ProSeleta, de todas as informações: período das inscrições, formas de isenção de taxa, cargos, envio de documentos seguindo as regras publicadas em Edital. Publicação no site da Amauc e da Prefeitura do Edital, Decreto da Comissão e Extrato.', 'SANDRA', 'ANALISTA ADM - RH', '02:00:00', 1, 21, 0, 2, 10, 4, 13),
(641, '2023-05-17', 'Conferência de informações bancárias repassadas pelo município para geração de boletos referentes ao Edital de Processo Seletivo Nº 01/2023, da prefeitura Municipal de Lindóia do Sul. Geração de boleto teste e efetuado o pagamento para ver se os dados cadastrados estão de acordo.', 'DIEGO', 'TESOUREIRO', '00:30:00', 1, 21, 0, 2, 10, 1, 22),
(642, '2023-05-17', 'Concurso Público - Edital Nº 1/2023 - Câmara Municipal de Vereadores de Concórdia. Publicação da homologação final no site da Amauc e da Câmara. Envio por e-mail para o presidente da Comissão do Concurso a Homologação Final e do arquivo dos dados dos aprovados. Criação de acesso ao sistema ProSeleta para acesso ao sistema para a migração dos dados do concurso para o sistema do RH e da Contabilidade da Câmara.', 'JAIME', 'MEMBRO COMISSÃO', '02:00:00', 1, 21, 0, 2, 27, 4, 13),
(643, '2023-05-17', 'Orientação sobre a elaboração da Errata de reabertura das inscrições do Edital da Eleição do Conselho Tutelar e da errata de alteração do cronograma. Publicação das Erratas no sistema e site da Amauc e da Prefeitura. Atualização no sistema do Edital. ', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '01:00:00', 1, 21, 0, 2, 15, 1, 22),
(644, '2023-05-17', 'Conversa de tira dúvidas sobre editais do cargo de agente de saúde.', 'VERÔNICA', 'ADVOGADA', '00:30:00', 1, 21, 0, 2, 8, 1, 11),
(645, '2023-05-18', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22),
(646, '2023-05-18', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 15, 1, 22),
(647, '2023-05-18', 'Conferência de documentação de novo prestador;\r\nRedação TC 083/2013 - Olhar ao Sol - Clínica de Psicologia e Práticas Integrativas;\r\nRedação TC 084/2013 - Clínica de Reabilitação e Neuroaprendizagem  - NeuroSeara LTDA;\r\nAtualização planilhas CIS;\r\nAtendimento telefônico e ao público em geral;\r\nAtendimento interno.	\r\n', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '07:00:00', 1, 19, 0, 2, 16, 4, 13),
(648, '2023-05-18', 'ELABORAÇÃO DE ORÇAMENTO DE RECAPEAMENTO (COMPOSIÇÕES E COTAÇÕES) PARA RUAS SAO ROQUE E CAPITÃO CÂMARA.', 'CLEVSON RODRIGO FREITAS', 'PREFEITO', '03:30:00', 1, 24, 0, 2, 9, 7, 18),
(649, '2023-05-18', 'Recepção de arquivo de retorno referente aos pagamentos das inscrições do Edital Nº 01/2023 - Processo Seletivo Simplificado Nº 01/2023, da Prefeitura Municipal de Irani, baixa via sistema, conferência de relatório do banco se está de acordo com os pagamentos baixados e relatório do banco.', 'NILSON', 'TESOUREIRO', '00:15:00', 1, 21, 0, 2, 7, 3, 22),
(650, '2023-05-18', 'Recepção de arquivo de retorno referente ao pagamento do boleto teste do Edital de Processo Seletivo Nº 01/2023, da Prefeitura Municipal de Lindóia do Sul, baixa via sistema, conferência de relatório do banco se está de acordo.', 'DIEGO', 'TESOUREIRO', '00:15:00', 1, 21, 0, 2, 10, 3, 22),
(651, '2023-05-18', 'Identificação de levantamento de fauna para implantação de calha a divisa de Itá e Seara', 'LINDOMAR', 'DIRETOR DO MEIO AMBIENTE', '02:30:00', 1, 36, 0, 2, 8, 4, 8),
(652, '2023-05-18', 'Reunião online com Embrapa para definir o que será utilizado de material na semana do meio ambiente.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '00:30:00', 1, 36, 0, 2, 18, 5, 5),
(653, '2023-05-18', 'Levantamento de orçamentos com empresas que prestam serviços de limpeza, para a sede nova do Consórcio.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '02:00:00', 1, 36, 0, 2, 18, 1, 18),
(654, '2023-05-18', 'Conversa com Marivone - Betha Sistemas, referente a troca de sistema de folha, envios de dados ao eSocial e tribunal de contas para o Cis Amauc. Envio de documentação para início do cadastro de todas as etapas necessária para a troca do sistema. ', 'MARIVONE', 'BETHA SISTEMAS', '01:00:00', 1, 21, 0, 1, 16, 2, 4),
(655, '2023-05-18', 'Conversa com Marivone - Betha Sistemas, referente a troca de sistema de folha, envios de dados ao eSocial e tribunal de contas para o Consórcio Lambari. Envio de documentação para início do cadastro de todas as etapas necessária para a troca do sistema. ', 'MARIVONE', 'BETHA SISTEMAS', '01:00:00', 1, 21, 0, 1, 18, 2, 4),
(656, '2023-05-18', 'Conversa com Marivone - Betha Sistemas, referente a troca de sistema de folha, envios de dados ao eSocial e tribunal de contas para o Consórcio Integrar. Envio de documentação para início do cadastro de todas as etapas necessária para a troca do sistema. ', 'MARIVONE', 'BETHA SISTEMAS', '01:00:00', 1, 21, 0, 1, 21, 2, 4),
(657, '2023-05-18', 'Atualização e lançamento de tarefas executas no período do dia 08/05 até hoje (18/05) no sistema de relatório de atividades.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '02:00:00', 1, 21, 0, 2, 17, 4, 13),
(658, '2023-05-19', 'cópias de todo o projeto preventivo de incêndio do ginásio de esportes.', 'DANIEL', 'ENGENHEIRO', '03:30:00', 1, 27, 0, 1, 11, 7, 7),
(659, '2023-05-19', 'Verador Comassetto, buscou orientação sobrea Lei PAULO GUSTAVO buscando encontrar elementos para  viabilizar recursos federais para  a área da cultura  do  município.\r\nNo legislativo, apoia  a  execução  de  politicas  culturais  municipais como forma de desenvolvimento local.', 'VILMAR  COMASSETTO', 'VEREADOR  CONCÓRDIA', '02:00:00', 1, 18, 0, 2, 4, 4, 11),
(660, '2023-05-19', 'Implantação de  questionário  no ISTEMA mapa  Cultural  AMAUC  para  realizar  consulta  publica Lei  Paulo  Gustavo', 'HACLAB   E EMPRESA  VINHAS', 'CONSULTORES DA CULTURA', '02:00:00', 1, 18, 0, 1, 17, 5, 10),
(661, '2023-05-19', 'Edição de todas as minutas de lei de delegação do serviço de licenciamento ao consórcio Lambari', 'CLAUDIA', 'DIR. ADM', '02:00:00', 1, 33, 0, 1, 18, 15, 13),
(662, '2023-05-19', 'Construção da agenda  de  reunião  mensal ordinária  do colegiado,a  realizar-se  no dia 02 de junho, na AMAUC', 'JAÇANÃ', 'COORDENADORA DO COLEGIADO  REGIONAL DE AS AMAUC', '00:30:00', 1, 18, 0, 2, 7, 2, 5),
(663, '2023-05-19', 'Organização do material para oficina Cores da terra - CMEI Bairro do Estados  - Concórdia', 'PROF. MARCIA', 'PROFE', '00:30:00', 1, 33, 0, 1, 4, 15, 13),
(664, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(665, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(666, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(667, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(668, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(669, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(670, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(671, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(672, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(673, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(674, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(675, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(676, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(677, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(678, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(679, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(680, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(681, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(682, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(683, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(684, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(685, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(686, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(687, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(688, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(689, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(690, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(691, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(692, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(693, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(694, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(695, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(696, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(697, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(698, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(699, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(700, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(701, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(702, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(703, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(704, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:00', 1, 18, 0, 2, 4, 5, 13),
(705, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(706, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(707, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(708, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(709, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(710, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(711, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(712, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(713, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(714, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(715, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(716, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(717, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(718, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(719, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(720, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(721, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(722, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(723, '2023-05-19', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '04:00:00', 1, 18, 0, 2, 4, 5, 13),
(724, '2023-05-19', '\r\nPrestação de  Contad  da  viagem Forum  Catarinense de Cultura de  LAGES  \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'BRUNO DARIVA ', 'COORDENADOR DO COLEGIADO DE CULTURA', '00:00:30', 1, 18, 0, 2, 4, 5, 13),
(725, '2023-05-19', 'Solicitação de férias da colaborado Vanessa, geração da mesma, conferência e lançamento na planilha de controle e envio para o financeiro efetuar o pagamento.', 'VANESSA', 'ARQUITETA', '00:15:00', 1, 21, 0, 2, 17, 4, 13),
(726, '2023-05-19', 'Conferência e lançamentos dos gastos estimados X executados do Concurso Público Edital Nº 1/2023, da Câmara Municipal de Vereadores. Elaboração de planilha de prestação de contas dos valores orçados e valores gastos efetivamente. Envio da planilha por e-mail para o presidente da comissão (Jaime) e para a Contabilidade. Envio de relatório físico para a Ivanete fazer a emissão da nota fiscal para cobrança.', 'JAIME', 'MEMBRO COMISSÃO', '01:30:00', 1, 21, 0, 2, 27, 4, 13),
(727, '2023-05-18', 'Pela parte da Manhã participação em reunião da Sede da Fecam com os Secretários Executivos da Fecam com diversas atividades e apresetações de pautas', 'FECAM', 'SEC EXECUTIVO', '03:00:00', 1, 14, 0, 2, 17, 4, 10),
(728, '2023-05-18', 'Viagem de deslocamento de volta da Cidade de Florianópolis até concordia após conclusão da reunião convocada pela Fecam', 'VANDERLEI', 'SEC EXECUTIVO', '06:00:00', 1, 14, 0, 2, 17, 7, 1),
(729, '2023-05-19', 'Acesso remoto a base de dados da Camara para ajuste de erro de encerramento mensal abril da Camara', 'HENRY', 'CONTADOR', '00:15:00', 1, 14, 0, 2, 15, 8, 4),
(730, '2023-05-19', 'Acesso remoto a pedido de Diego sobre questão de contrapartida de obras, analise de possibilidade e analisado valores de superavit, excesso e outros', 'DIEGO', 'SECRETARIO DE ADMINISTRAÇÃO', '01:00:00', 1, 14, 0, 2, 6, 8, 4),
(731, '2023-05-19', 'Pré memorial de uma área  para Loteamento Popular para inserir no perimetro urbano de Peritiba, enviado p Eng Luan p fornecer os confrontantes da mesma para finalizar o processo.', 'LUAN', 'ENG', '02:00:00', 1, 23, 0, 1, 11, 4, 19),
(732, '2023-05-18', 'Formula no excel para calculo de IR a devolver para os municpios do CIS AMAUC.', 'LU', 'MEMBRO', '01:00:00', 1, 23, 0, 2, 16, 4, 11),
(733, '2023-05-19', 'Solicitação de orçamento recebida por e-mail da Jussimara, da Prefeitura Municipal de Irani, para orçamento de Concurso Público. Elaborada planilha de custo estimada com base nos cargos e níveis de ensino repassados pelo município. Envio da planilha de custo por e-mail para a Jussimara.', 'JUSSIMARA', 'DIRETORA', '01:30:00', 1, 21, 0, 2, 7, 3, 18),
(734, '2023-05-19', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 15, 1, 22),
(735, '2023-05-19', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22),
(736, '2023-05-19', 'Leitura e encaminhamentos de mensagens eletrônicas (e-mail e whatsapp).\r\nConclusão da ata da reunião do Colegiado de Defesa Civil e envio através do whats para leitura prévia.\r\nDemandas internas de atendimentos interno e documentação.\r\nInformações e contatos sobre a possível capacitação para Nutricionistas, se através do Colegiado ou através da EGEM.\r\nLançamentos nas planilhas financeiras.\r\nCadastramento de contas da Amauc para confirmação.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(737, '2023-05-18', 'Suporte remoto servidor de dados da Prefeitura, inclusão de usuários, cadastro de permissão de usuário, tempo limite de acesso organização das pastas por departamento.\r\nConfiguração dos computadores, alteração do nome de usuário e inclusão do bat de execução de mapeamento para o usuário do departamento.\r\n', 'DIEGO', 'TI', '05:00:00', 1, 12, 0, 2, 11, 8, 4),
(738, '2023-05-18', 'Posto de Saúde de Pres. Castello Branco, instalação de rack, Switch, DVR, servidor de Internet, ONU e Nobreak. Ajustes dos cabos de rede no Rack, identificação de alguns cabos de rede e configuração de roteadores WIFI.', 'PABLO', 'SAÚDE', '05:00:00', 1, 12, 0, 2, 12, 4, 3),
(739, '2023-05-19', 'Manutenção de hardware, computador da agricultura de Jaborá.', 'REALINO', 'AGRICULTURA', '01:00:00', 1, 12, 0, 1, 9, 7, 3),
(740, '2023-05-19', 'Esclarecimento sobre o cadastro do produtor no sistema Sat, inclusão de documentos digitalizados.', 'FERNANDO ', 'BLOCO PRODUTOR', '00:05:00', 1, 12, 0, 2, 14, 1, 5),
(741, '2023-05-19', 'Acompanhamento na execução de backup no servidor de dados. ', 'DIEGO', 'TI', '03:00:00', 1, 12, 0, 2, 17, 7, 3),
(742, '2023-05-19', 'Recepção de arquivo de retorno referente aos pagamentos das inscrições do Edital Nº 01/2023 - Processo Seletivo Simplificado Nº 01/2023, da Prefeitura Municipal de Irani, baixa via sistema, conferência de relatório do banco se está de acordo com os pagamentos baixados e relatório do banco.', 'NILSON', 'TESOUREIRO', '00:15:00', 1, 21, 0, 2, 7, 3, 22),
(743, '2023-05-19', 'Organização JIIDOS, com Neusa e pessoal do Esporte de Concórdia.', 'AMAUC', 'AUXILIAR DE ESCRITÓRIO', '01:00:00', 1, 20, 0, 2, 17, 7, 11),
(744, '2023-05-19', 'Término do relatório faunístico da Calha entre Itá e Seara.', 'LINDOMAR', 'DIRETORIA', '02:00:00', 1, 36, 0, 2, 8, 15, 8),
(745, '2023-05-19', 'Atualização da planilha de controle dos licenciamentos ambientais que estão em andamento.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:30:00', 1, 36, 0, 2, 18, 15, 13),
(746, '2023-05-19', 'Documentação de projeto para licitação - ampliação da creche - projetos completos.', 'ROZIMERI SPAZINI', 'ARQUITETA', '03:30:00', 1, 24, 0, 2, 5, 7, 6),
(747, '2023-05-19', 'medição / fiscalização da adequação da Sala do Consorcio Lambari - planilha parte eletrica / equipamentos. Acompanhamento da licitação.', 'CLAUDIA SCHIAVINI', 'DIRETORA EXECUTIVA', '03:30:00', 1, 24, 0, 2, 18, 7, 6),
(748, '2023-05-19', 'Impressão e revisão das minutas de lei para assembléia', 'CLAUDIA', 'DIR. ADM', '03:00:00', 1, 33, 0, 1, 18, 15, 16),
(749, '2023-05-19', 'A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO', '', '', '00:00:00', 1, 33, 11, 1, 0, 6, 1),
(750, '2023-05-19', 'Organização dos documentos inicio do processo e encaminhamento para o município providenciar as assinaturas', '', '', '02:00:00', 1, 33, 11, 1, 42, 4, 16),
(751, '2023-05-19', 'Auditoria Movimento Econômico', 'SEF/SC', 'MOVIMENTO ECONÔMICO ', '07:25:00', 1, 37, 0, 2, 17, 7, 15),
(752, '2023-05-19', 'Conversa com CIEE para processo de contratação de estágiário', 'CLAUDIA', 'DIR. ADM', '00:15:00', 1, 33, 0, 2, 18, 2, 10),
(753, '2023-05-19', 'Lançamentos de NF do projeto Recuperar que estavam faltando para prestação de contas', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '04:00:00', 1, 35, 0, 1, 18, 15, 12),
(754, '2023-05-17', 'Desenvolvimento de desenho, medida em loco e orçamento de persianas para a sala nova do Consórcio Lambari.', 'CLAUDIA', 'DIRETORA', '05:00:00', 1, 25, 0, 1, 18, 4, 9),
(755, '2023-05-19', 'Atualização de tabelas de serviços Edital 01/2005 e 01/2013 Cis Amauc;\r\nEnvio para assinaturas TC 083;\r\nAtendimento telefônico e ao público em geral;\r\nAtendimento interno.\r\n', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '07:00:00', 1, 19, 0, 2, 16, 4, 13),
(756, '2023-05-18', 'Visita em campo, para conhecimento de terreno, levantamento fotográfico e reunião com secretária da Cultura sobre programa de necessidades, para desenvolvimento de projeto arquitetônico de novo Centro Cultural para o Município de Piratuba.', 'LIANA', 'ENGENHEIRA', '06:00:00', 1, 25, 0, 1, 15, 14, 7),
(757, '2023-05-18', 'Plotagem de projeto PPCI para o munícipio.', 'VINÍCIUS', 'ENGENHEIRO', '01:00:00', 1, 25, 0, 2, 2, 1, 14),
(758, '2023-05-18', 'Organização de documentos, fotos e mapas para desenvolvimento de projeto Arquitetônico de Centro Cultural de Piratuba.', 'LIANA', 'ENGENHEIRA', '02:00:00', 1, 25, 0, 1, 15, 4, 7),
(759, '2023-05-19', 'Organização de documentos, fotos e mapas para desenvolvimento de projeto Arquitetônico de Centro Cultural de Piratuba.\r\n', 'LIANA', 'ENGENHEIRA', '06:00:00', 1, 25, 0, 1, 15, 4, 7),
(760, '2023-05-19', 'Montagem de termo aditivo referente aos Editais para o processo de escolha dos membros do Conselho Tutelar dos municípios de: Peritiba, Seara, Concórdia, Piratuba, Irani, Arabutã, Presidente Castello Branco, Lindóia do Sul e Ipira.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '02:00:00', 1, 21, 0, 1, 17, 4, 13),
(761, '2023-05-19', 'Suporte remoto micro da engenharia, configuração de permissão de acesso para execução da planilha da caixa salvo no servidor.', 'LUAN', 'ENGENHEIRO', '00:30:00', 1, 12, 0, 2, 11, 8, 4),
(762, '2023-05-19', 'Suporte remoto micro da contabilidade, configuração do site para acesso ao Siops.', 'MARTA', 'CONTADORA', '00:20:00', 1, 12, 0, 2, 14, 8, 4),
(763, '2023-05-22', 'Organização para realização da reunião do Colegiado de Proteção e Defesa Civil, hoje, período da manhã.\r\nAcesso aos e-mail e mensagens de whats para encaminhamentos necessários.\r\nOrganização material pós reunião do Colegiado de Proteção e Defesa Civil.\r\nOrganização dos boletos e NFs para cadastramento no Gerenciamento do Bco Brasil para confirmação.\r\nImpressão dos comprovantes de pagamento e organização para lançamento nas planilhas de controle bancário, das contas da Amauc.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 2, 17, 4, 13),
(764, '2023-05-22', 'Acesso portal municipal configuração link para benner de \"Pesquisa de Satisfação eOuv\"', 'ADRIANA', 'CI', '00:10:00', 1, 13, 0, 2, 11, 1, 4),
(765, '2023-05-22', 'Conferência, acompanhamento, geração de arquivo com informações dos candidatos inscritos e envio do mesmo para o Paulo. Esclarecimento de dúvidas referente ao Edital Nº 02/2023/CMDCA, edital este que refere-se ao processo de escolha dos membros do Conselho Tutelar de Piratuba.', 'PAULO', 'PRES COMISSÃO ELEIÇÃO CT', '00:20:00', 1, 21, 0, 2, 15, 1, 22),
(766, '2023-05-22', 'Acompanhamento, conferência e geração de arquivo com informações dos candidatos inscritos e envio do mesmo, baixa dos documentos anexados pelos candidatos inscritos e envio dos mesmos, esclarecimento de dúvidas referente ao Edital/CEPE/CMDCA Nº 01 de 31 de Março de 2023, referente ao processo de escolha dos membros do Conselho Tutelar de Seara.', 'JORDANE', 'PRES COMISSÃO ELEIÇÃO CT', '00:30:00', 1, 21, 0, 2, 13, 1, 22),
(767, '2023-05-22', 'Publicação de resolução N°06/2023 em portal do CisAmauc e DOM.', 'MARLON', 'DIRETOR', '00:15:00', 1, 13, 0, 2, 16, 3, 4),
(768, '2023-05-22', 'Acesso servidor atrualização sistema betha Sapo.', 'CLEIDE', 'CONTABILIDADE', '00:20:00', 1, 13, 0, 2, 9, 8, 4),
(769, '2023-05-22', 'Contato para verificar se houve alguma solicitação de impugnação do Edital de Processo Seletivo Nº 01/2023, da Prefeitura Municipal de Lindóia do Sul - SC. Verificação de importação de outros editais já encerrados para o sistema Betha Cloud. Para tal fiz um chamado para o suporte do sistema ProSeleta, falei com a Taís, onde me informou que esta versão está disponível. Enviei print da conversa com o sistema para a Sandra.', 'SANDRA', 'ANALISTA ADM - RH', '00:40:00', 1, 21, 0, 2, 10, 1, 4),
(770, '2023-05-19', 'atendimento ao contador Leandro onde foi feito acompanhamento e orientação no preenchimento das planilhas para audiência publica, com analise de informações e orientações diversas', 'LEANDRO', 'CONTADOR', '03:00:00', 1, 14, 0, 2, 3, 4, 2),
(771, '2023-05-19', 'Atendimento ao Secretário Giovani para tratar de assuntos sobre situação financeira e fontes para alteração orçamentaria', 'GIOVANI', 'SECRETARIO DE ADMINISTRAÇÃO', '00:20:00', 1, 14, 0, 2, 15, 4, 10),
(772, '2023-05-22', 'Acesso remoto para rodar anti-virus e limpeza geral de arquivos temporarios e algumas configurações.', 'MILDRED', 'SOCIAL', '00:30:00', 1, 13, 0, 2, 5, 8, 4),
(773, '2023-05-22', 'Publicação de editais e tabelas de procedimentos em portal do CisAmauc e DOM.', 'LUCIANE', 'RECEPÇÃO', '00:30:00', 1, 13, 0, 2, 16, 3, 4),
(774, '2023-05-22', 'participação em reunião com o Colegiado Regional de Defesa Civil com a discussão de vários assuntos conforme ata', 'COLEGIADO DE DEFESA CIVIL', 'COLEGIADO', '03:00:00', 1, 14, 0, 2, 17, 4, 10),
(775, '2023-05-22', 'Organização das atividades semanais. ', 'CLAUDIA', 'DIR. ADM', '03:00:00', 1, 33, 0, 2, 18, 15, 10),
(776, '2023-05-22', 'Contato com todos os municípios - referente a assembléia extraordinária', 'CLAUDIA', 'DIR. ADM', '02:00:00', 1, 33, 0, 1, 18, 15, 10),
(777, '2023-05-22', 'contato com o setor técnico referente solicitação , para realização de preventivo do posto de saúde.', 'POLYANA', 'ENGENHEIRA', '00:30:00', 1, 27, 0, 1, 3, 1, 11),
(778, '2023-05-22', 'PPCI DA ESCOLA AMÉLIA POLETTO HEPP, RELATÓRIO TÉCNICO )PASSAR ARQUIVO EM PDF E ORGANIZAÇÃO DOS ARQUIVOS.', 'SERGIO', 'ENGENHEIRO', '06:00:00', 1, 27, 0, 1, 15, 7, 7),
(779, '2023-05-02', 'Enviado mapa,  com assinat digital área 09 Movéis Sebem corrigido no selo e enviadas p Eng Cristina (Irene)', 'CRISTINA', 'ENG', '03:30:00', 1, 23, 0, 2, 4, 3, 6),
(780, '2023-05-04', 'Atendimento tel sobre a matricula faltante p Reurb lote 01 de Loreci Salete de Souza -conversa c Adv Vanessa e Carine da pref - Irene', 'CARINE', 'ADMINISTRATIVO', '00:40:00', 1, 23, 0, 2, 5, 1, 5),
(781, '2023-05-02', 'Descrição das 04 áreas da supressão vegetal das Torres de Itá (Irene)', 'MARCELA', 'BIOLOGA', '02:00:00', 1, 23, 0, 2, 8, 4, 19),
(782, '2023-05-03', 'Passado para pdf 04 áreas da supressão vegetal das Torres de Itá memorial e mapa com assinat digitais(Irene)', 'MARCELA', 'BIOLOGA', '01:30:00', 1, 23, 0, 2, 8, 4, 19);
INSERT INTO `atividade` (`ati_cod`, `ati_data`, `ati_descricao`, `ati_solicitante`, `ati_cargo`, `ati_tempo`, `ati_situacao`, `usu_cod`, `sol_cod`, `sol_status`, `cli_cod`, `afr_cod`, `atp_cod`) VALUES
(783, '2023-05-03', 'Adaptações da Rua Floriano Bender do existente e a construir (Irene)', 'LIA', 'ENG', '02:00:00', 1, 23, 0, 2, 15, 4, 5),
(784, '2023-05-08', 'Complementações e modificações no orçamento da Rua Floriano Bender (Irene)', 'LIA', 'ENG', '05:00:00', 1, 23, 0, 2, 15, 4, 18),
(785, '2023-05-03', 'Memorial Área Compensação Ambiental L Salto da Praia de uma área de 10.600,00m² URB 25.675 CAU com pdfs e assinatura digital (Irene)', 'MARCELA', 'BIOLOGA', '02:00:00', 1, 23, 0, 2, 12, 4, 19),
(786, '2023-05-08', 'Impressão acesso a Linha Canhada em 17 pranchas (Irene)', 'EDMILSON CANALLE', 'PREFEITO', '03:00:00', 1, 23, 0, 2, 13, 4, 14),
(787, '2023-05-22', 'reunião com representante da Crediauc para discussão de valores e forma de metodologia da participação financeira e patrocinio para os JIIDOS', 'NEUSA', 'ASSIST. SOCIAL', '01:00:00', 1, 14, 0, 2, 17, 4, 10),
(788, '2023-05-22', 'Atendimento por telefone para orientações de ter 03 avaliações de Imobiliárias com o CRECi para fazer desapropriações de áreas ', 'LINDOMAR', 'SECRET', '00:15:00', 1, 23, 0, 2, 8, 1, 11),
(789, '2023-05-22', 'Continuação mapa ampliação perímetro urbano ', 'LUAN', 'ENG', '01:30:00', 1, 23, 0, 1, 11, 4, 19),
(790, '2023-05-22', 'Organização da semana conforme demanda necessitada pelos municípios.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '03:00:00', 1, 36, 0, 2, 18, 4, 10),
(791, '2023-05-22', 'Definição de materiais para compra da nova sede do Consórcio.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '01:30:00', 1, 36, 0, 2, 18, 15, 13),
(792, '2023-05-22', 'Reunião com os vereadores Andre Rizello e Margarete Poleto da Costa e Marlon Candeia do CIS AMAUC sobre audiência publica da Saude a ser realizada no dia 29/05/2023 na Camara de Veradores de Concordia', 'ANDRE REZELO', 'VEREADOR - CONCORDIA ', '01:00:00', 1, 14, 0, 2, 17, 4, 10),
(793, '2023-05-22', 'CONCLUIDO A PARTE DO LEVANTAMENTO TOPOGRAFICO EM CAMPO.', '', '', '00:00:00', 1, 29, 10, 0, 39, 0, 0),
(794, '2023-05-22', 'MAPA COM IMAGEM LINHA RIO DO ENGANO PONTE DIVISA ITA SEARA ', 'CLAUDIA', 'BIOLOGA', '04:00:00', 1, 29, 0, 2, 18, 7, 9),
(795, '2023-05-19', 'CADASTRO PLANIALTIMÉTRICO ÁREA CENTRO DE CULTURA', 'VANESSA - AMAUC', 'ARQUITETA', '07:00:00', 1, 29, 0, 2, 15, 4, 8),
(796, '2023-05-18', 'LEVANTAMENTO PLANIALTIMÉTRICO AREA CENTRO DE CULTURA', 'VANESSA - AMAUC', 'ARQUITETA', '07:00:00', 1, 29, 0, 1, 15, 4, 8),
(797, '2023-05-22', 'Cadastro de novo prestador no CELk;\r\nInclusão de novo prestador (TC 83) nas planilhas de controle CIS;\r\nCriação de login e senha;\r\ninclusão do \"Convênio SES VIGENTE\" para os prestadores no sistema CELK;\r\nAtendimento telefônico e ao público em geral;\r\nAtendimento interno.\r\n\r\n', 'LUCIANE', 'ASSESSORA DE CREDENCIAMENTOS', '07:00:00', 1, 19, 0, 2, 16, 4, 13),
(798, '2023-05-22', 'Levantamento de despesas, montagem de planilhas com o valor das despesas rateadas referente aos Editais para o Processo de Escolha dos membros Conselho Tutelar dos municípios de: Peritiba, Seara, Concórdia, Piratuba, Irani, Arabutã, Presidente Castello Branco, Lindóia do Sul e Ipira. Elaboração, montagem de termo aditivo referente aos Editais para o processo de escolha dos membros do Conselho Tutelar dos municípios de: Peritiba, Seara, Concórdia, Piratuba, Irani, Arabutã, Presidente Castello Branco, Lindóia do Sul e Ipira.', 'VANDERLEI', 'SECRETÁRIO EXECUTIVO', '04:00:00', 1, 21, 0, 1, 17, 4, 13),
(799, '2023-05-23', 'Analise e revisão de minuta de Edital de Processo Seletivo para Amauc visando a contratação de pessoal interno (Engenheiro Civil, Area de Comunicação e Area Administrativa) - realizado a noite ', 'ANDREIA', 'RECURSOS HUMANOS', '02:00:00', 1, 14, 0, 2, 17, 4, 22),
(800, '2023-05-11', 'AREA Nº 3 MURARO ÁREA MINISTERIO PUBLICO LOCALIZACAO CORRETA', 'ALAN', 'ENGENHARIA', '07:00:00', 1, 29, 0, 1, 10, 7, 9),
(801, '2023-05-12', 'INSERSAO DE COORDENADAS MAPA AREA MURARO ( GARAGEM PREFEITURA)', 'ALAN', 'ENGENHARIA', '07:00:00', 1, 29, 0, 2, 10, 7, 9),
(802, '2023-05-23', 'MAPA COM CURVAS DE NIVEL , AREA LOTE CENTRO CULTURAL', 'VANESSA - AMAUC', 'ARQUITETA', '07:00:00', 1, 29, 0, 2, 15, 7, 9),
(803, '2023-05-22', 'Reunião interna para verificação das demandas e agendamentos.', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '03:00:00', 1, 35, 0, 2, 18, 4, 10),
(804, '2023-05-22', 'Lançamentos de mais NF do Projeto Recuperar no sistema do Estado - SIGEF', 'CONSÓRCIO LAMBARI', 'DIRETORIA', '03:00:00', 1, 35, 0, 1, 18, 4, 13),
(805, '2023-05-23', 'Leitura de mensagens eletrônicas para encaminhamentos.\r\nContatos referente ao estagio para Recepção.', 'GERAL', 'SECRETARIA ADMINISTRATIVA', '07:00:00', 1, 16, 0, 1, 17, 4, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_forma`
--

CREATE TABLE `atividade_forma` (
  `afr_cod` int(100) NOT NULL,
  `afr_descricao` text NOT NULL,
  `afr_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividade_forma`
--

INSERT INTO `atividade_forma` (`afr_cod`, `afr_descricao`, `afr_situacao`) VALUES
(1, 'WHATSAPP', 1),
(2, 'TELEFONE', 1),
(3, 'EMAIL', 1),
(4, 'PRESENCIAL', 1),
(5, 'VIDEO-CHAMADA', 1),
(6, 'MANUTENÇÃO AMAUC', 0),
(7, 'AMAUC', 1),
(8, 'ACESSO REMOTO', 1),
(9, 'PROTOCOLO', 1),
(10, 'SEMINÁRIO', 1),
(11, 'PALESTRA', 1),
(12, 'CAPACITAÇÃO', 1),
(13, 'OFICINA', 1),
(14, 'CAMPO', 1),
(15, 'CONSÓRCIO LAMBARI', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_tipo`
--

CREATE TABLE `atividade_tipo` (
  `atp_cod` int(11) NOT NULL,
  `atp_descricao` varchar(100) NOT NULL,
  `atp_situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividade_tipo`
--

INSERT INTO `atividade_tipo` (`atp_cod`, `atp_descricao`, `atp_situacao`) VALUES
(1, 'VIAGEM', 1),
(2, 'TREINAMENTO', 1),
(3, 'MANUTENÇÃO', 1),
(4, 'SUPORTE', 1),
(5, 'ATENDIMENTO', 1),
(6, 'ENVIO DE DOCUMENTO/MODELO', 1),
(7, 'PROJETO', 1),
(8, 'LEVANTAMENTO', 1),
(9, 'DESENHO', 1),
(10, 'REUNIÃO', 1),
(11, 'CONVERSA/ORIENTAÇÃO', 1),
(12, 'PROTOCOLO', 1),
(13, 'TAREFAS DE SETOR', 1),
(14, 'PLOTAGENS', 1),
(15, 'AUDITORIA / RECURSOS MOVIMENTO ECONÔMICO', 1),
(16, 'LICENCIAMENTO', 1),
(17, 'EDUCAÇÃO AMBIENTAL', 1),
(18, 'ORÇAMENTO ', 1),
(19, 'MEMORIAL DESCRITIVO', 1),
(20, 'EMISSÃO ART', 1),
(21, 'EMISSÃO DE RRT', 1),
(22, 'ATUALIZAÇÃO / INFORMAÇÃO', 1);

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

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cid_cod`, `cid_nome`, `est_uf`, `cid_situacao`) VALUES
(1, 'ALTO BELA VISTA', 'SC', 1),
(2, 'ARABUTÃ', 'SC', 1),
(3, 'CONCÓRDIA', 'SC', 1),
(4, 'IPIRA', 'SC', 1),
(5, 'IPUMIRIM', 'SC', 1),
(6, 'IRANI', 'SC', 1),
(7, 'ITÁ', 'SC', 1),
(8, 'JABORÁ', 'SC', 1),
(9, 'LINDÓIA DO SUL', 'SC', 1),
(10, 'PERITIBA', 'SC', 1),
(11, 'PIRATUBA', 'SC', 1),
(12, 'PRESIDENTE CASTELLO BRANCO', 'SC', 1),
(13, 'SEARA', 'SC', 1),
(14, 'XAVANTINA', 'SC', 1);

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

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cli_cod`, `cli_nome`, `cli_cnpj`, `cli_tel`, `cli_mail`, `cli_endereco`, `cli_nro_endereco`, `cli_bairro`, `cli_cep`, `cid_cod`, `cli_situacao`, `usu_cod`) VALUES
(1, 'RAISWeb', '21.787.139/0001-05', '(49) 9189-9035', 'contato@raisweb.com.br', 'RUA QUINTINO BOCAIÚVA', '419E', 'CENTRO', '89802-250', 1, 1, 1),
(2, 'PREFEITURA MUNICIPAL DE ALTO BELA VISTA ', '01.614.374/0001-60', '(49) 3455-9022', 'prefeitura@altobelavista.sc.gov.br', 'RUA DO COMÉRCIO ', '1015', 'CENTRO', '89730-000', 1, 1, 1),
(3, 'PREFEITURA MUNICIPAL DE ARABUTA', '95.995.221/0001-53', '(49) 3448-0048', 'administracao@arabuta.sc.gov.br', 'AVENIDA LAURO MULLER ', '210', 'CENTRO', '89740-000', 2, 1, 1),
(4, 'PREFEITURA MUNICIPAL DE CONCÓRDIA', '83.024.257/0001-00', '(49) 3441-2000', 'solicitacao@concordia.sc.gov.br', 'RUA LEONEL MOSELE', '62', 'CENTRO', '89700-176', 3, 1, 1),
(5, 'PREFEITURA MUNICIPAL DE IPIRA', '82.814.260/0001-65', '(49) 3558-0451', 'prefeitura@ipira.sc.gov.br', 'RUA 15 DE AGOSTO', '342', 'CENTRO', '89669-000', 4, 1, 1),
(6, 'PREFEITURA MUNICIPAL DE IPUMIRIM', '82.814.575/0001-02', '(49) 3438-3400', 'prefeitura@ipumirim.sc.gov.br', 'AVENIDA DOM POEDRO II', '230', 'CENTRO', '89790-000', 5, 1, 1),
(7, 'PREFEITURA MUNICIPAL DE IRANI', '82.939.455/0001-31', '(49) 3432-3200', 'prefeitura@irani.sc.gov.br', 'RUA EILIRIO DE GREGORI', '207', 'CENTRO', '89680-000', 6, 1, 1),
(8, 'PREFEITURA MUNICIPAL DE ITÁ', '83.024.240/0001-53', '(49) 3458-9500', 'ita@ita.sc.gov.br', 'PRAÇA DR. ALDO IVO STUMPF', '100', 'CENTRO', '89760-000', 7, 1, 1),
(9, 'PREFEITURA MUNICIPAL DE JABORÁ', '82.939.463/0001-88', '(49) 3526-2000', 'prefeitura@jabora.sc.gov.br', 'RUA ANGELO POYER', '320', 'CENTRO', '89677-000', 8, 1, 1),
(10, 'PREFEITURA MUNICIPAL DE LINDOIA DO SUL', '78.510.112/0001-80', '(49) 3446-1177', 'prefeiturea@lindoiadosul.sc.gov.br', 'RUA TAMANDUA ', '98', 'CENTRO', '89735-000', 9, 1, 1),
(11, 'PREFEITURA MUNICIPAL DE PERITIBA', '82.815.085/0001-20', '(49) 3453-1122', 'prefeitura@peritiba.sc.gov.br', 'RUA FREI BONIFÁCIO ', '63', 'CENTRO', '89750-000', 10, 1, 1),
(12, 'PREFEITURA MUNICIPAL DE PRESIDENTE CASTELLO BRANCO', '82.777.244/0001-40', '(49) 3457-1122', 'prefeitura@castellobranco.sc.gov.br', 'RUA ALBERTO ERNESTO LANG ', '29', 'CENTRO', '89745-000', 12, 1, 1),
(13, 'PREFEITURA MUNICIPAL DE SEARA', '73.024.505/0001-13', '(49) 3452-8300', 'contato@seara.sc.gov.br', 'AV. ANITA GARIBALDI ', '371', 'CENTRO', '89770-000', 13, 1, 1),
(14, 'PREFEITURA MUNICIPAL DE XAVANTINA', '83.009.878/0001-15', '(49) 3454-3100', 'prefeitura@xavantina.sc.gov.br', 'RUA PREFEITO OCTÁVIO URBANO SIMON', '163', 'CENTRO', '89780-000', 14, 1, 1),
(15, 'PREFEITURA MUNICIPAL DE PIRATUBA', '82.815.481/0001-58', '(49) 3553-0146', 'prefeitura@piratuba.sc.gov.br', 'RUA GOVERNADOR JORGE LACERDA', '133', 'CENTRO', '89667-000', 11, 1, 1),
(16, 'CISAMAUC', '07.654.807/0001-97', '(49) 3482-3525', 'saude@cisamauc.sc.gov.br', 'RUA ', '772', 'CENTRO', '89700-905', 3, 1, 1),
(17, 'AMAUC', '83.222.034/0001-58', '(49) 3482-3500', 'secretaria@amauc.org.br', 'RUA MARECHAL DEODORO', '772', 'CENTRO', '89700-905', 3, 1, 1),
(18, 'CONSORCIO LAMBARI', '04.536.794/0001-63', '(49) 3482-3515', 'lambari@consorciolambari.sc.gov.br', 'RUA MARECHAL DEODORO', '772', 'CENTRO', '89700-905', 3, 1, 1),
(19, 'ABRIGO INSTITUCIONAL - ITÁ', '23.095.152/0001-10', '(49) 3482-3505', 'acolhimento@seara.sc.gov.br', 'RUA MARECHAL DEODORO', '772', 'CENTRO', '89700-905', 3, 1, 1),
(20, 'ABRIGO CASA LAR', '11.177.407/0001-05', '(49) 9840-95599', 'rh@amauc.org.br', 'CAMINHO LINHA MARIA GUNTHER ', 'sn', 'INTERIOR', '89735-000', 9, 1, 1),
(21, 'CONSORCIO INTERGRAR', '09.477.210/0001-40', '(49) 3482-3500', 'rh@amauc.org.br', 'RUA MARECHAL DEODORO', '772', 'CENTRO', '89700-905', 3, 1, 1),
(22, 'PCB - VANESSA CERVELIN ', '82.777.244/0001-40', '(49) 3457-1122', 'financeiro@castellobranco.sc.gov.br', 'RUA ALBERTO ERNESTO LANG ', '29', 'CENTRO', '89745-000', 12, 1, 1),
(23, 'PCB - VILMAR SECO', '82.777.244/0001-40', '(49) 3457-1122', 'vilmar@castellobranco.s.gov.br', 'RUA ALBERTO ERNESTO LANG ', '29', 'CENTRO', '89745-000', 12, 1, 1),
(24, 'IPIRA - MARILENE', '82.814.260/0001-65', '(49) 3558-0451', 'rh@ipira.sc.gov.br', 'RUA 15 DE AGOSTO', '342', 'CENTRO', '89669-000', 4, 1, 1),
(25, 'XAVANTINA - MAIRA ', '83.009.878/0001-15', '(49) 3454-3100', 'tributacao@xavantina.sc.gov.br', 'RUA PREFEITO OCTÁVIO URBANO SIMON', '163', 'CENTRO', '89780-000', 14, 1, 1),
(26, 'PCB - RENAM MARCOS MURARO', '82.777.244/0001-40', '(49) 3457-1122', 'engenharia@castellobranco.sc.gov.br', 'RUA ALBERTO ERNESTO LANG ', '29', 'CENTRO', '89745-000', 12, 1, 1),
(27, 'CÂMARA MUNICIPAL DE VEREADORES DE CONCÓRDIA', '75.321.406/0001-75', '(49) 3441-2500', 'cvc@cvc.sc.gov.br', 'RUA LEONEL MOSELE', '96', 'CENTRO', '89700-176', 3, 1, 1),
(28, '', '26.210.117/0001-93', '(49) 3482-3500', 'cidauc@cidauc.org.br', 'PRAÇA DR ALDO IVO STUMPF', '90', 'CENTRO', '89770-000', 13, 1, 14),
(29, 'PCB - LUCILEI GROTO', '82.777.244/0001-40', '(49) 3457-1122', 'projetos@castellobranco.sc.gov.br', 'RUA ALBERTO ERNESTO LANG', '29', 'CENTRO', '89745-000', 12, 0, 1),
(30, 'PCB - LUCILEI GROTO', '82.777.244/0001-40', '(49) 3457-1122', 'projetos@castellobranco.sc.gov.br', 'RUA ALBERTO ERNESTO LANG', '29', 'CENTRO', '89745-000', 12, 1, 1),
(31, 'ITÁ - LINDOMAR PRITSCH', '83.024.240/0001-53', '(49) 3458-9500', 'engenharia@ita.sc.gov.br', 'PRAÇA DR. ALDO IVO STUMPF', '100', 'CENTRO', '89760-000', 7, 1, 1),
(32, 'ITÁ - MARTA BENDER SARTORETTO', '83.024.240/0001-53', '(49) 3458-9500', 'engenharia@ita.sc.gov.br', 'PRAÇA DR. ALDO IVO STUMPF', '100', 'CENTRO', '89760-000', 7, 1, 1),
(33, 'IRANI - ALINE VARGAS', '82.939.455/0001-31', '(49) 3432-3200', 'planejamento@irani.sc.gov.br', 'RUA EILIRIO DE GREGORI', '207', 'CENTRO', '89680-000', 6, 1, 1),
(34, 'IRANI - TAÍS SHNEIDER', '82.939.455/0001-31', '(49) 3432-3200', 'plan', 'RUA EILIRIO DE GREGORI', '207', 'CENTRO', '89680-000', 6, 1, 1),
(35, 'IRANI - THALIA DE MARCO', '82.939.455/0001-31', '(49) 3432-3200', 'planejamento@irani.sc.gov.br', 'RUA EILIRIO DE GREGORI', '207', 'CENTRO', '89680-000', 6, 1, 1),
(36, 'IRANI - THIZA FERREIRA', '82.939.455/0001-31', '(49) 3432-3200', 'planejamento@irani.sc.gov.br', 'RUA EILIRIO DE GREGORI', '207', 'CENTRO', '89680-000', 6, 1, 1),
(37, 'CÂMARA MUNICIPAL DE PRESIDENTE CASTELLO BRANCO ', '22.191.905/0001-29', '(49) 3457-1077', 'camara@castellobranco.sc.gov.br', 'RUA PARANÁ', '453', 'CENTRO', '89745-000', 12, 1, 1),
(38, 'CÂMARA MUNICIPAL DE JABORÁ', '07.733.746/0001-53', '(49) 3526-1359', 'camara@jabora.sc.gov.br', 'RUA DA CIDADANIA', '221', 'CENTRO', '89677-000', 8, 1, 1),
(39, 'PIRATUBA - LIANA CRISTINA FREITAG', '82.815.481/0001-58', '(49) 9553-0146', 'liana@piratuba.com.br', 'RUA GOVERNADOR JORGE LACERDA', '133', 'CENTRO', '89667-000', 11, 1, 1),
(40, 'CÂMARA MUNICIPAL DE IPIRA', '23.907.532/0001-02', '(49) 3558-0016', 'camara@ipira.sc.gov.br', 'RUA AVENIDA BRASIL', '123', 'CENTRO ', '89669-000', 4, 1, 1),
(41, 'ALTO BELA VISTA - VINI', '01.614.374/0001-60', '(49) 3455-9022', 'prefeitura@altobelavista.sc.gov.br', 'RUA DO COMÉRCIO', '1015', 'CENTRO', '89730-000', 1, 0, 1),
(42, 'ALTO BELA VISTA - VINI', '01.614.374/0001-60', '(49) 3455-9022', 'vinicius.fazolo@hotmail.com', 'RUA DO COMÉRCIO', '1015', 'CENTRO', '89730-000', 1, 1, 1),
(43, 'ARABUTA - POLYANA M. FEIOCK', '95.995.221/0001-53', '(49) 3448-0048', 'engenharia@arabuta.sc.gov.br', 'AVENIDA LAURO MULLER ', '210', 'CENTRO', '89740-000', 2, 1, 1),
(44, 'CÂMARA MUNICIPAL DE ALTO BELA VISTA ', '11.493.326/0001-14', '(49) 3090-0390', 'legislativo@camaraaltobelavista.sc.gov.br', 'RUA DO COMÉRCIO ', '1015', 'CENTRO', '89730-000', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `con_cod` int(11) NOT NULL,
  `usu_cod` int(11) NOT NULL,
  `con_setor` int(11) NOT NULL,
  `con_data_ini` datetime NOT NULL,
  `con_data_fim` datetime NOT NULL,
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

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`con_cod`, `usu_cod`, `con_setor`, `con_data_ini`, `con_data_fim`, `con_veiculo`, `con_vei_placa`, `con_vei_cod`, `con_vei_km_ini`, `con_vei_km_fim`, `con_vei_outro`, `con_destino`, `con_cliente`, `con_solicitacao`, `con_descricao`) VALUES
(1, 24, 0, '2023-04-03 08:00:00', '2023-04-03 14:30:00', 1, '', 3, 0, 0, '', 'ALTO BELA VISTA', 2, 1, 'Levantamento arquitetônico da escola de Linha Araraquara - Vanessa Franczak e Elaine Bezerra.'),
(2, 24, 0, '2023-05-04 08:00:00', '2023-05-04 16:00:00', 1, '', 1, 228605, 228712, '', 'IPIRA', 5, 0, 'Assessoria sobre adequação de acessibilidade dos postos de saude (centro, filadelfia e estudantes) de Ipira. '),
(3, 24, 0, '2023-05-05 08:00:00', '2023-05-05 13:30:00', 1, '', 1, 228712, 228796, '', 'IPUMIRIM E LINDOIA DO SUL', 6, 0, 'Reunião com equipe técnica da prefeitura de Ipumirim sobre alteração de projetos. Conferencia de medidas para projeto do SER Juventude de Lindoia do Sul. Vanessa Franczak e Elaine Bezerra.');

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

--
-- Extraindo dados da tabela `conta_anexo`
--

INSERT INTO `conta_anexo` (`can_cod`, `con_cod`, `can_estab`, `can_valor`, `can_anexo`, `can_data`) VALUES
(1, 1, 'ESTABELECIMENTO 1', 200, 'arquivos/prestacao-de-contas/_20230505090325teste.txt', '2023-05-05 19:03:25'),
(2, 1, 'JARDIM RESTAURANTE - PERITIBA', 64.8, 'arquivos/prestacao-de-contas/_20230505091333nota almoço 03-04.jpeg', '2023-05-05 19:13:33'),
(3, 2, 'SULAVINHO REST. E LANCH.', 37.9, 'arquivos/prestacao-de-contas/_20230505091717nota almoço 04-05.jpeg', '2023-05-05 19:17:17'),
(4, 3, 'BAR E RESTAURANTE PAGLIOCHI', 49.46, 'arquivos/prestacao-de-contas/_20230505092045nota almoço 05-05.jpeg', '2023-05-05 19:20:45');

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

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`fun_cod`, `fun_nome`, `fun_mail`, `set_cod`, `usu_cod`) VALUES
(1, 'ADM CONTABILIDADE', 'contabilidade@amauc.com.br', 1, 1),
(2, 'ADM PROCESSOS SELETIVOS E CONCURSOS', 'processoseletivo@amauc.com.br', 2, 1),
(3, 'ADM SERVIÇO SOCIAL', 'servicosocial@amauc.com.br', 3, 1),
(4, 'ADM COMUNICAÇÃO', 'comunicacao@amauc.com.br', 4, 1),
(5, 'ADM ENGENHARIA', 'engenharia@amauc.com.br', 5, 1),
(6, 'ADM ARQUITETURA', 'arquitetura@amauc.com.br', 6, 1),
(7, 'ADM TOPOGRAFIA', 'topografia@amauc.com.br', 7, 1),
(8, 'ADM INFORMÁTICA', 'informatica@amauc.com.br', 8, 1),
(9, 'MOVIMENTO ECONÔMICO', 'movimentoeconomico@amauc.com.br', 9, 1),
(10, 'ADM FINANCEIRO', 'SECRETARIA@AMAUC.ORG.BR', 1, 1),
(11, 'IVANETE PEREIRA GRENDENE', 'SECRETARIA@AMAUC.ORG.BR', 72, 1),
(12, 'RAFAEL NICOLLI', 'rh@amauc.org.br', 1, 1),
(13, 'NEUSA POLETTO PUCCI', 'social@amauc.org.br', 3, 1),
(14, 'LUCIANE VERONA ROTTA', 'recepcao@amauc.org.br', 1, 1),
(15, 'ROSÂNGELA ZANELLA', 'rosangela@amauc.org.br', 2, 1),
(16, 'ANDREIA DALBOSCO', 'andreia@amauc.org.br', 2, 1),
(17, 'MARLON CANDEIA', 'saude@cisamauc.org.br', 72, 1),
(18, 'IRENE M. G. HEPP', 'irene@amauc.org.br', 5, 1),
(19, 'VANESSA FRANCZACK', 'vanessa@amauc.org.br', 6, 1),
(20, 'ELAINE DE SOUZA BEZERRA', 'elaine@amauc.org.br', 6, 1),
(21, 'RAPHAEL PARODE', 'raphael@amauc.org.br', 5, 1),
(22, 'EDILSON BIANCHI', 'edilson@amauc.org.br', 5, 1),
(23, 'JOSÉ GUTTEMBERG', 'guttemberg@amauc.org.br', 5, 1),
(24, 'NILSON KLITCHE', 'nilson.klitche@amauc.org.br', 7, 1),
(25, 'MARCELO SCHUMANN', 'marcelo@amauc.org.br', 7, 1),
(26, 'MARCIO DA SILVA', 'marcio@amauc.org.br', 7, 1),
(27, 'CLAUDIA ELIS SCHIAVINI', 'lambari@consorciolambari.sc.gov.br', 73, 1),
(28, 'MARCELA ADRIANA DE SOUZA LEITE ', 'marcela@consorciolambari.sc.gov.br', 73, 1),
(29, 'FERNANDA BALDISSARELLI FONTANA', 'fernanda@consorciolambari.sc.gov.br', 73, 1),
(30, 'SABRINE DA SILVA', 'sabrine@consorciolambari.sc.gov.br', 73, 1),
(31, 'RENATE MOSER FACCIN', 'renate@amauc.org.br', 9, 1),
(32, 'ADM CISAMAUC', 'saude@cisamauc.org.br', 1, 1);

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

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`set_cod`, `set_nome`, `set_responsavel`, `set_descricao`, `set_situacao`) VALUES
(1, 'CONTABILIDADE', 1, 'O setor de contabilidade registra, analisa e interpreta os dados financeiros da empresa para garantir conformidade legal e sucesso nos negócios.', 1),
(2, 'PROCESSOS SELETIVOS E CONCURSO', 2, 'O setor de processos seletivos e concursos é responsável por planejar, organizar e executar todas as etapas do processo de seleção de candidatos para vagas de emprego ou cargos públicos, utilizando critérios claros e objetivos para avaliar as habilidades e competências dos candidatos e garantir a escolha dos mais qualificados.\r\n', 1),
(3, 'SERVIÇO SOCIAL', 3, 'O Serviço Social é responsável por promover o bem-estar social, atuando em áreas como saúde, educação, assistência social e justiça. Os profissionais dessa área realizam atendimento, orientação, acompanhamento e intervenções para garantir direitos e melhorar as condições de vida das pessoas em situação de vulnerabilidade social, utilizando técnicas e estratégias específicas para cada caso.', 1),
(4, 'COMUNICAÇÃO', 4, 'O setor de comunicação é responsável por planejar, desenvolver e executar estratégias de comunicação interna e externa da empresa, utilizando diferentes meios e canais para transmitir informações, ideias e valores da organização. Ele atua na criação de campanhas publicitárias, gerenciamento de redes sociais, produção de conteúdo e relacionamento com a imprensa, visando promover a imagem da empresa, fortalecer a sua marca e estabelecer uma comunicação eficiente com seus públicos.', 1),
(5, 'ENGENHARIA', 5, 'O setor de engenharia é responsável por desenvolver projetos, soluções e inovações para atender às necessidades técnicas e operacionais da empresa. Ele abrange diferentes áreas da engenharia, como civil, elétrica, mecânica, química e de produção, e utiliza ferramentas e tecnologias avançadas para projetar, construir, manter e otimizar os processos e equipamentos da empresa. O setor de engenharia também trabalha na garantia da segurança e qualidade das atividades desenvolvidas, além de buscar melhorias contínuas nos processos e produtos.', 1),
(6, 'ARQUITETURA', 6, 'O setor de arquitetura é responsável por projetar e gerenciar a construção de edificações, espaços e ambientes que atendam às necessidades e expectativas da empresa. Ele atua na concepção dos projetos, desde a análise do espaço e suas possibilidades, passando pela elaboração dos desenhos e especificações técnicas, até o acompanhamento da obra. O setor de arquitetura também trabalha na busca por soluções sustentáveis e inovadoras para os projetos, visando a harmonia com o meio ambiente e a eficiência energética.', 1),
(7, 'TOPOGRAFIA', 7, 'O setor de topografia é responsável por realizar levantamentos e medições de terrenos, áreas e construções, utilizando técnicas e equipamentos específicos para garantir a precisão das informações coletadas. Ele atua no mapeamento do terreno, elaboração de plantas e mapas, além de fornecer informações importantes para a elaboração de projetos de engenharia e arquitetura. O setor de topografia também trabalha na identificação e correção de possíveis problemas relacionados ao terreno, como desnivelamentos e irregularidades, visando garantir a segurança e qualidade das construções realizadas.', 1),
(8, 'INFORMÁTICA', 8, 'O setor de informática é responsável por gerenciar a infraestrutura de tecnologia da informação da empresa, incluindo hardware, software, redes e sistemas. Ele atua no desenvolvimento, manutenção e suporte técnico aos sistemas de informação, garantindo a segurança, confiabilidade e disponibilidade das informações utilizadas pelos usuários da empresa.', 1),
(9, 'MOVIMENTO ECONÔMICO', 9, 'O setor de movimento econômico é responsável por gerenciar as atividades financeiras da empresa, como contas a pagar e receber, fluxo de caixa, orçamento e investimentos. Ele atua no controle e análise dos dados financeiros da empresa, buscando identificar oportunidades de redução de custos, aumento de receitas e melhorias nos resultados financeiros. O setor de movimento econômico também trabalha no planejamento financeiro de curto, médio e longo prazo da empresa, visando a sua sustentabilidade e crescimento.', 1),
(72, 'FINANCEIRO', 10, 'FINANCEIRO', 1),
(73, 'CONSORCIO LAMBARI', 1, 'O CONSÓRCIO LAMBARI É CONSTITUÍDO COMO UMA ASSOCIAÇÃO PÚBLICA, COM PERSONALIDADE JURÍDICA DE DIREITO PÚBLICO, SEM FINS LUCRATIVOS, COM AUTONOMIA ADMINISTRATIVA, FINANCEIRA E PATRIMONIAL, REGENDO-SE PELO PRESENTE ESTATUTO, PELA LEI Nº 11.107/2005, PELO DECRETO FEDERAL Nº 6.017/07 E DEMAIS LEGISLAÇÕES PERTINENTES A MATÉRIA. A SEDE DO CONSÓRCIO LAMBARI É NO MUNICÍPIO DE CONCÓRDIA, ESTADO DE SANTA CATARINA, LOCALIZADO À RUA MARECHAL DEODORO, 772, 12º ANDAR – EDIFÍCIO MIRAGE OFFICE – CENTRO.', 1),
(74, 'CISAMAUC', 32, 'CRIADO NO ANO DE 2005 O CONSÓRCIO INTERMUNICIPAL DE SAÚDE DO ALTO URUGUAI CATARINENSE - CIS/AMAUC, VEIO COM O OBJETIVO DE ASSEGURAR A PRESTAÇÃO DE SERVIÇOS DE SAÚDE ESPECIALIZADOS, DE REFERÊNCIA E DE MAIOR COMPLEXIDADE EM NÍVEL AMBULATORIAL PARA A POPULAÇÃO DOS MUNICÍPIOS CONSORCIADOS, DE CONFORMIDADE COM AS DIRETRIZES DO SUS, ASSEGURANDO O ESTABELECIMENTO DE UM SISTEMA DE REFERÊNCIA E CONTRARREFERÊNCIA EFICIENTE E EFICAZ.', 1);

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

--
-- Extraindo dados da tabela `solicitacao`
--

INSERT INTO `solicitacao` (`sol_cod`, `set_cod`, `cli_cod`, `sol_solicitante`, `sol_cargo`, `sol_data`, `sol_status`, `sol_descricao`, `sol_urgencia`, `sol_anexo`) VALUES
(1, 8, 2, 'ISRAEL', 'TI', '2023-05-02', 2, 'Gostaria de uma formatação no meu computador', 3, 'arquivos/solicitacao/_20230502080442image5050.png'),
(2, 5, 31, 'LINDOMAR PRITSCH', 'ACESSOR DE GESTÃO ADMINISTRATIVA', '2023-05-08', 1, 'Confecção de mapa para responder a INFORMAÇÃO TÉCNICA nº 1886/2023 do IMA no processo VEG/85932/CAU. Obs.: Consultar Marcela Leite - Consórcio Lambari.', 3, ''),
(4, 73, 31, 'LINDOMAR PRITSCH', 'ACESSOR DE GESTÃO ADMINISTRATIVA', '2023-05-08', 1, 'Licenciamento Ambiental Ponte/Calha sobre Rio Engano na divisa entre Itá e Seara.', 0, ''),
(5, 73, 36, 'THIZA FERREIRA ', 'SECRETARIA DE URBANISMO E OBRAS', '2023-05-08', 1, 'licenciamento ambiental do cemitério municipal, os alinhamentos foram apontados na reunião do 03/05.', 2, ''),
(6, 6, 36, 'THIZA FERREIRA ', 'SECRETARIA DE URBANISMO E OBRAS', '2023-05-08', 1, 'Projeto urbanístico e outros para complementação do licenciamento ambiental do cemitério municipal, conforme alinhado em reunião no dia 03/05/2023', 2, ''),
(7, 7, 36, 'THIZA FERREIRA ', 'SECRETARIA DE URBANISMO E OBRAS', '2023-05-08', 0, 'Levantamento topográfico e cadastral via imagem de drone de ruas e passeios (projeto arquitetônico) para fins de projeto de capeamento asfáltico.\r\nBairro Pacífico Matias\r\nBairro Santo Antonio \r\nBairro Sto Marcon\r\nConforme as ruas passadas para Guttemberg em 03/05.', 2, ''),
(8, 5, 36, 'THIZA FERREIRA ', 'SECRETARIA DE URBANISMO E OBRAS', '2023-05-09', 1, 'levantamento topográfico da capela mortuária para fins de licenciamento ambiental ', 3, ''),
(9, 7, 32, 'VOLNEI', 'SECRETÁRIO DE OBRAS', '2023-05-11', 0, 'Topografia para locação de terraplanagem com os grades de corte e aterro pra futura pavimentação asfáltica . O projeto encontra-se pronto o serviço é de locação e piqueteamento pra execução do serviço com as máquinas do Município. Primeiro trecho urgente 600m e em seguida mais 1,60Km', 3, ''),
(10, 6, 39, 'MARIANA', 'DIRETORA DE CULTURA E EVENTOS', '2023-05-15', 0, 'Elaboração de um projeto de um Centro Cultural para o município.', 3, ''),
(11, 73, 42, 'VINICIUS FAZOLO', 'ENGENHEIRO CIVIL', '2023-05-19', 1, 'Bom dia, \r\n\r\nSolicito o pessoal do Consórcio Lambaria para emissão de certidão de atividade não constante, perante ao IMA, da Ponte de Volta Grande. A existente venceu. Obrigado.', 2, ''),
(12, 6, 43, 'EDENICE RAUSCHKOLB', 'EDUCAÇÃO - SECRETARIA', '2023-05-22', 0, 'bom dia,\r\nSegue em anexo solicitação de ampliação de salas do Grupo Escolar Paulo Freire do Município de Arabutã', 3, '');

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
(1, 0, 'ADMINISTRADOR GERAL', 'admin', 'd65daf2143d132e2b78ef71318fdf4d3', 'contato@raisweb.com.br', 0, 1, 0, 1),
(2, 1, 'ADM CONTABILIDADE', 'contabilidade', '21232f297a57a5a743894a0e4a801fc3', 'contabilidade@amauc.com.br', 0, 2, 1, 1),
(3, 2, 'ADM PROCESSOS SELETIVOS E CONCURSOS', 'processos', '21232f297a57a5a743894a0e4a801fc3', 'processoseletivo@amauc.com.br', 0, 2, 2, 1),
(4, 3, 'ADM SERVIÇO SOCIAL', 'servico', '21232f297a57a5a743894a0e4a801fc3', 'servicosocial@amauc.com.br', 0, 2, 3, 1),
(5, 4, 'ADM COMUNICAÇÃO', 'comunicacao', '21232f297a57a5a743894a0e4a801fc3', 'comunicacao@amauc.com.br', 0, 2, 4, 1),
(6, 5, 'ADM ENGENHARIA', 'engenharia', '21232f297a57a5a743894a0e4a801fc3', 'engenharia@amauc.com.br', 0, 2, 5, 1),
(7, 6, 'ADM ARQUITETURA', 'arquitetura', '21232f297a57a5a743894a0e4a801fc3', 'arquitetura@amauc.com.br', 0, 2, 6, 1),
(8, 7, 'ADM TOPOGRAFIA', 'topografia', '21232f297a57a5a743894a0e4a801fc3', 'topografia@amauc.com.br', 0, 2, 7, 1),
(9, 8, 'ADM INFORMÁTICA', 'informatica', '729db9e6d059383fcc69dddc1f38f9d6', 'informatica@amauc.com.br', 0, 2, 8, 1),
(10, 9, 'MOVIMENTO ECONÔMICO', 'movimento', '21232f297a57a5a743894a0e4a801fc3', 'movimentoeconomico@amauc.com.br', 0, 2, 0, 1),
(11, 0, 'RAISWEB', 'raisweb', '4983a0ab83ed86e0e7213c8783940193', 'contato@raisweb.com.br', 1, 3, 0, 1),
(12, 0, 'DIEGO GIROTTO', 'Diego.Amauc', 'e95dd5ee7df29ba477c9eb4ec809796b', 'diego@amauc.org.br', 0, 2, 8, 1),
(13, 0, 'CICERO MAGARINOS', 'cicero.amauc', '6816b4fde83e109d80f850ac243345ae', 'cicero@amauc.org.br', 0, 2, 8, 1),
(14, 0, 'VANDERLEI PICININI', 'vanderlei.amauc', 'e10adc3949ba59abbe56e057f20f883e', ' vanderlei@amauc.org.br', 0, 1, 1, 1),
(15, 10, 'ADM FINANCEIRO', 'ADMFINANCEIRO.AMAUC', 'e10adc3949ba59abbe56e057f20f883e', 'SECRETARIA@AMAUC.ORG.BR', 0, 2, 72, 1),
(16, 11, 'IVANETE PEREIRA GRENDENE', 'IVANETE.AMAUC', 'e10adc3949ba59abbe56e057f20f883e', 'SECRETARIA@AMAUC.ORG.BR', 0, 2, 72, 1),
(17, 12, 'RAFAEL NICOLLI', 'rafael.amauc', 'e10adc3949ba59abbe56e057f20f883e', 'rh@amauc.org.br', 0, 2, 1, 1),
(18, 13, 'NEUSA POLETTO PUCCI', 'neusa.amauc', 'e10adc3949ba59abbe56e057f20f883e', 'social@amauc.org.br', 0, 2, 3, 1),
(19, 14, 'LUCIANE VERONA ROTTA', 'luciane.cisamauc', 'e10adc3949ba59abbe56e057f20f883e', 'recepcao@amauc.org.br', 0, 2, 74, 1),
(20, 15, 'ROSANGELA ZANELLA', 'rosangela.amauc', 'fc25e2b4c98b5b9b1c89386c2245d621', 'rosangela@amauc.org.br', 0, 2, 2, 1),
(21, 16, 'ANDREIA DALBOSCO', 'andreia.amauc', '2d1efbaf895b3b1607c5df2daee503b9', 'andreia@amauc.org.br', 0, 2, 2, 1),
(22, 17, 'MARLON CANDEIA', 'marlon.cisamauc', 'e80d5b3e92f973a87fbdf5afcda68ba8', 'saude@cisamauc.org.br', 0, 2, 74, 1),
(23, 18, 'IRENE M. G. HEPP', 'irene.amauc', 'a2ad72e2e6631d978d6f5ae730ea7aaa', 'irene@amauc.org.br', 0, 2, 6, 1),
(24, 19, 'VANESSA FRANCZAK', 'vanessa.amauc', 'e10adc3949ba59abbe56e057f20f883e', 'vanessa@amauc.org.br', 0, 2, 6, 1),
(25, 20, 'ELAINE DE SOUZA BEZERRA', 'elaine.amauc', '640f560edf8ead278d1d2ced35220443', 'elaine@amauc.org.br', 0, 2, 6, 1),
(26, 21, 'RAPHAEL PARODE', 'raphael.amauc', 'e10adc3949ba59abbe56e057f20f883e', 'raphael@amauc.org.br', 0, 2, 6, 1),
(27, 22, 'EDILSON BIANCHI', 'edilson.amauc', '6dd9aa0b0606270d0875acb21546bedb', 'edilson@amauc.org.br', 0, 2, 5, 1),
(28, 23, 'GUTTEMBERG', 'guttemberg.amauc', '0156eb326fc7b7110d2ee15b094326ca', 'guttemberg@amauc.org.br', 0, 2, 5, 1),
(29, 24, 'NILSON KLITCHE', 'nilson.amauc', 'ee50bf5d0ae11f1f22af71c65667e377', 'nilson.klitche@amauc.org.br', 0, 2, 7, 1),
(30, 25, 'MARCELO SCHUMANN', 'marcelo.amauc', '0ee212b2064ebbdf63901b44960f09b9', 'marcelo.schumann@amauc.org.br', 0, 2, 7, 1),
(31, 26, 'MARCIO DA SILVA', 'marcio.amauc', 'c6de37a1859f74a806349fd74f529767', 'marcio@amauc.org.br', 0, 2, 7, 1),
(32, 0, 'ADM CONSORCIO LAMBARI', 'consorciolambari', '1d4e55e51492243a4bd1b4be69e8ee77', 'lambari@consorciolambari.sc.gov.br', 0, 2, 73, 1),
(33, 27, 'CLAUDIA ELIS SCHIAVINI', 'claudia.lambari', '71aed26977521f44dcb98af2b7a7fe71', 'lambari@consorciolambari.sc.gov.br', 0, 2, 73, 1),
(34, 28, 'MARCELA ADRIANA DE SOUZA LEITE ', 'marcela.lambari', '38e49931ee66c096a3416df7bf60981e', 'marcela@consorciolambari.sc.gov.br', 0, 2, 73, 1),
(35, 29, 'FERNANDA BALDISSARELLI FONTANA', 'fernanda.lambari', '810da8744f94d04e9ce324c961e6f20e', 'fernanda@consorciolambari.sc.gov.br', 0, 2, 73, 1),
(36, 30, 'SABRINE DA SILVA', 'sabrine.lambari', 'eb02eeed4e8d69981acfd80a9fdf2789', 'sabrine@consorciolambari.sc.gov.br', 0, 2, 73, 1),
(37, 31, 'RENATE MOSER FACCIN', 'renate.amauc', 'e10adc3949ba59abbe56e057f20f883e', 'renate@amauc.org.br', 0, 2, 9, 1),
(38, 32, 'ADM CISAMAUC', 'cisamauc', '1d4e55e51492243a4bd1b4be69e8ee77', 'saude@cisamauc.org.br', 0, 2, 74, 1),
(39, 0, 'PREFEITURA MUNICIPAL DE ALTO BELA VISTA ', 'altobelavista', '010cd4a00736e9ccb85ddfc47ca1afd9', 'prefeitura@altobelavista.sc.gov.br', 2, 3, 0, 1),
(40, 0, 'PREFEITURA MUNICIPAL DE ARABUTA', 'arabuta', '8016887666c857f76aa4106758f1d162', 'administracao@arabuta.sc.gov.br', 3, 3, 0, 1),
(41, 0, 'PREFEITURA MUNICIPAL DE CONCÓRDIA', 'concordia', '0dba02cd129e000749f52e55829571e8', 'solicitacao@concordia.sc.gov.br', 4, 3, 0, 0),
(42, 0, 'PREFEITURA MUNICIPAL DE IPIRA', 'ipira', 'ec9a1589978c6e4c64e3c681c94dd178', 'prefeitura@ipira.sc.gov.br', 5, 3, 0, 1),
(43, 0, 'PREFEITURA MUNICIPAL DE IPUMIRIM', 'ipumirim', '4fb45acc4d6a97e9f12ac770dd9a2f4c', 'prefeitura@ipumirim.sc.gov.br', 6, 3, 0, 1),
(44, 0, 'PREFEITURA MUNICIPAL DE IRANI', 'irani', '8692b8b1e7a81757b8b84a4b9f8b1fcd', 'prefeitura@irani.sc.gov.br', 7, 3, 0, 1),
(45, 0, 'PREFEITURA MUNICIPAL DE ITÁ', 'ita', '72be1c5e7f01ae530db2f4b590cc76db', 'ita@ita.sc.gov.br', 8, 3, 0, 1),
(46, 0, 'PREFEITURA MUNICIPAL DE JABORÁ', 'jabora', '5f1c7c3ff14db55b3c0d98ea51f7cbda', 'prefeitura@jabora.sc.gov.br', 9, 3, 0, 1),
(47, 0, 'PREFEITURA MUNICIPAL DE LINDOIA DO SUL', 'lindoiadosul', '689be962ebd9800a22cf693875914539', 'prefeiturea@lindoiadosul.sc.gov.br', 10, 3, 0, 1),
(48, 0, 'PREFEITURA MUNICIPAL DE PERITIBA', 'peritiba', '8603a272ac36f0ba151f4e462818b65b', 'prefeitura@peritiba.sc.gov.br', 11, 3, 0, 1),
(49, 0, 'PREFEITURA MUNICIPAL DE PRESIDENTE CASTELLO BRANCO', 'castellobranco', 'e80aac4763cbfe51134640a07fe9f300', 'prefeitura@castellobranco.sc.gov.br', 12, 3, 0, 1),
(50, 0, 'PREFEITURA MUNICIPAL DE SEARA', 'seara', '69f26b76b69990b1fbdb8148af171d17', 'contato@seara.sc.gov.br', 13, 3, 0, 1),
(51, 0, 'PREFEITURA MUNICIPAL DE XAVANTINA', 'xavantina', '170ae369faf0efbf42c408c991bf99ba', 'prefeitura@xavantina.sc.gov.br', 14, 3, 0, 1),
(52, 0, 'PREFEITURA MUNICIPAL DE PIRATUBA', 'piratuba', 'c2d9e340090e7e59bdb516d618f7588f', 'prefeitura@piratuba.sc.gov.br', 15, 3, 0, 1),
(53, 0, 'CISAMAUC', 'cisamauc', '4badaee57fed5610012a296273158f5f', 'saude@cisamauc.sc.gov.br', 16, 3, 0, 1),
(54, 0, 'AMAUC', 'amauc', 'e10adc3949ba59abbe56e057f20f883e', 'secretaria@amauc.org.br', 17, 3, 0, 1),
(55, 0, 'CONSORCIO LAMBARI', 'lambari', '3fe3c36e6180240038997d08a42c4349', 'lambari@consorciolambari.sc.gov.br', 18, 3, 0, 1),
(56, 0, 'CONSORCIO INTERMUNICIPAL DO SERVICO SOCIOASSISTENCIAL DE ALTA COMPLEXIDADE - MODALIDADE ABRIGO INSTI', 'abrigoita', '095d4d8c43d40b4eca1b63b52ed96428', 'acolhimento@seara.sc.gov.br', 19, 3, 0, 1),
(57, 0, 'ABRIGO CASA LAR', 'casalar', '07b4fe87691b8c444cc1fbc9b7089aef', 'rh@amauc.org.br', 20, 3, 0, 1),
(58, 0, 'CONSORCIO INTERGRAR', 'integrar', '297a0115c653137a0956c22ed5485a9a', 'rh@amauc.org.br', 21, 3, 0, 1),
(59, 0, 'PCB - VANESSA CERVELIN ', 'vanessa.pcb', 'c9a140d1a756e793ea9a6927c070b6c7', 'financeiro@castellobranco.sc.gov.br', 22, 3, 0, 1),
(60, 0, 'PCB - VILMAR SECO', 'vilmar.pcb', 'a384b6463fc216a5f8ecb6670f86456a', 'vilmar@castellobranco.s.gov.br', 23, 3, 0, 1),
(61, 0, 'IPIRA - MARILENE', 'marilene.ipira', '531806ec5df29bc5fe8eed22eb1cf2ff', 'rh@ipira.sc.gov.br', 24, 3, 0, 1),
(62, 0, 'XAVANTINA - MAIRA ', 'maira.xavantina', '9cc5ebc96bb69284e8af6face223caf8', 'tributacao@xavantina.sc.gov.br', 25, 3, 0, 1),
(63, 0, 'RENAN MARCOS MURARO', 'renan.castellobranco', '858915f1d2d425959fd4da867ba6b599', 'engenharia@castellobranco.sc.gov.br', 26, 3, 0, 1),
(64, 0, 'CÂMARA MUNICIPAL DE VEREADORES DE CONCÓRDIA', 'camara.concordia', 'e80aac4763cbfe51134640a07fe9f300', 'cvc@cvc.sc.gov.br', 27, 3, 0, 1),
(65, 0, 'CIDAUC', 'CIDAUC', 'e10adc3949ba59abbe56e057f20f883e', 'cidauc@cidauc.org.br', 28, 3, 0, 1),
(66, 0, 'PCB - LUCILEI FRIGO', 'lucilei.castellobranco', '7963a14a381c1224c1c464c19ca8fd0b', 'projetos@castellobranco.sc.gov.br', 29, 3, 0, 1),
(67, 0, 'PCB - LUCILEI GROTO', 'lucilei.castellobranco', '7963a14a381c1224c1c464c19ca8fd0b', 'projetos@castellobranco.sc.gov.br', 30, 3, 0, 1),
(68, 0, 'LINDOMAR PRITSCH', 'lindomar.ita', '17146b8d316d277fb912cb06169f309c', 'meioambiente@ita.sc.gov.br', 31, 3, 0, 1),
(69, 0, 'MARTA BENDER SARTORETTO', 'marta.ita', 'e10adc3949ba59abbe56e057f20f883e', 'engenharia@ita.sc.gov.br', 32, 3, 0, 1),
(70, 0, 'ALINE VARGAS', 'aline.irani', 'e10adc3949ba59abbe56e057f20f883e', 'planejamento@irani.sc.gov.br', 33, 3, 0, 1),
(71, 0, 'TAÍS SHNEIDER', 'tais.irani', 'e10adc3949ba59abbe56e057f20f883e', 'plan', 34, 3, 0, 1),
(72, 0, 'THALIA DE MARCO', 'thalia.irani', 'e10adc3949ba59abbe56e057f20f883e', 'planejamento@irani.sc.gov.br', 35, 3, 0, 1),
(73, 0, 'THIZA FERREIRA', 'thiza.irani', 'e10adc3949ba59abbe56e057f20f883e', 'planejamento@irani.sc.gov.br', 36, 3, 0, 1),
(74, 0, 'CAMARA DE VEREADORES DE PRESIDENTE CASTELLO BRANCO ', 'camara.pcb', '328ad02625c548219eab77fb5ed2af25', 'camara@castellobranco.sc.gov.br', 37, 3, 0, 1),
(75, 0, 'CÂMARA DE VEREADORES DE JABORÁ', 'cvjabora.amauc', 'ef0c980c6f32a80cb818c0219c8fe1b3', 'camara@jabora.sc.gov.br', 38, 3, 0, 1),
(76, 0, 'PIRATUBA - LIANA CRISTINA FREITAG', 'liana.piratuba', '4372a56f8cf77d7382dae5cd50270b41', 'liana@piratuba.com.br', 39, 3, 0, 1),
(77, 0, 'CAMARA DE VEREADORES DE IPIRA', 'camara.ipira', 'dc645a789be64893f71a885fda63b587', 'camara@ipira.sc.gov.br', 40, 3, 0, 1),
(78, 0, 'ALTO BELA VISTA - VINI', 'AltoBelaVista.Vini', '6287dd71967dcd5a2272db685f87883e', 'prefeitura@altobelavista.sc.gov.br', 41, 3, 0, 1),
(79, 0, 'ALTO BELA VISTA - VINI', 'AltoBelaVista.Vini', '6287dd71967dcd5a2272db685f87883e', 'prefeitura@altobelavista.sc.gov.br', 42, 3, 0, 1),
(80, 0, 'ARABUTA - POLYANA M. FEIOCK', 'polyana.arabuta', 'e10adc3949ba59abbe56e057f20f883e', 'engenharia@arabuta.sc.gov.br', 43, 3, 0, 1),
(81, 0, 'CAMARA DE VEREADORES DE ALTO BELA VISTA ', 'camara.altobelavista', '7c084cdbd8acfb7ef7fdaf02c87ec7ec', 'legislativo@camaraaltobelavista.sc.gov.br', 44, 3, 0, 1);

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
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`vei_cod`, `vei_nome`, `vei_placa`, `vei_situacao`, `agt_cod`) VALUES
(1, 'FIESTA SEDAN', 'MFR5687', 1, 1),
(2, 'HB20 - 32', 'RXS0D32', 1, 1),
(3, 'HB20 - 52', 'RXS0D52', 1, 1),
(4, 'UNO CISAMAUC', 'MJA2744', 1, 1),
(5, 'UNO LAMBARI', 'MJA1524', 1, 1),
(6, 'ONIX LAMBARI', 'QJH4253', 1, 1);

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
  MODIFY `age_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `agenda_tipo`
--
ALTER TABLE `agenda_tipo`
  MODIFY `agt_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `ati_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=806;

--
-- AUTO_INCREMENT de tabela `atividade_forma`
--
ALTER TABLE `atividade_forma`
  MODIFY `afr_cod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `atividade_tipo`
--
ALTER TABLE `atividade_tipo`
  MODIFY `atp_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cid_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `con_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `conta_anexo`
--
ALTER TABLE `conta_anexo`
  MODIFY `can_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `fun_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `set_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `sol_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `td_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `usuario_permissao`
--
ALTER TABLE `usuario_permissao`
  MODIFY `upe_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `vei_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
