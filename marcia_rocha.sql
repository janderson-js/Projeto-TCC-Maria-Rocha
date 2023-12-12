-- Criação da tabela 'menu'
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL DEFAULT 'não informado',
  `descricao` varchar(300) NOT NULL DEFAULT 'não informado',
  `url_menu` text NOT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'perfil'
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL DEFAULT 'não informado',
  `descricao` varchar(300) NOT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'perfil_menu'
CREATE TABLE `perfil_menu` (
  `perfil_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`perfil_id`,`menu_id`),
  KEY `fk_perfil_has_menu_menu1_idx` (`menu_id`),
  KEY `fk_perfil_has_menu_perfil1_idx` (`perfil_id`),
  CONSTRAINT `fk_perfil_has_menu_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_menu_perfil1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'servicos'
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT 'não informado',
  `descricao` text NOT NULL DEFAULT 'não informado',
  `tipo` varchar(45) NOT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'funcionarios'
CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NUL DEFAULT 'não informado'L,
  `coffito` varchar(45) DEFAULT 'não tem',
  `matricula` varchar(45) NOT NULL DEFAULT 'não informado',
  `senha` varchar(45) NOT NULL DEFAULT 'não informado',
  `telefone` varchar(45) DEFAULT NULL DEFAULT 'não informado',
  `celular` varchar(45) NOT NULL DEFAULT 'não informado',
  `perfil_id` int(11) NOT NULL DEFAULT 'não informado',
  `idade` int(11) NOT NULL DEFAULT 'não informado',
  `genero` varchar(45) NOT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_UNIQUE` (`matricula`),
  KEY `fk_funcionarios_perfil1_idx` (`perfil_id`),
  CONSTRAINT `fk_funcionarios_perfil1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'pacientes'
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT 'não informado',
  `idade` int(11) NOT NULL DEFAULT 'não informado',
  `cpf` varchar(45) NOT NULL DEFAULT 'não informado',
  `login` varchar(45) NOT NULL DEFAULT 'não informado',
  `senha` varchar(45) NOT NULL DEFAULT 'não informado',
  `genero` varchar(45) NOT NULL DEFAULT 'não informado',
  `profissao` varchar(45) NOT NULL DEFAULT 'não informado',
  `telefone` varchar(45) DEFAULT NULL DEFAULT 'não informado',
  `celular` varchar(45) NOT NULL DEFAULT 'não informado',
  `data_nascimento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'anamnese'
CREATE TABLE `anamnese` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doencas_previas` text NOT NULL DEFAULT 'não informado',
  `cirurgias` text NOT NULL DEFAULT 'não informado',
  `alergias` text NOT NULL DEFAULT 'não informado',
  `medicamentos_em_uso` text NOT NULL DEFAULT 'não informado',
  `historico_familiar_relevante` text NOT NULL DEFAULT 'não informado',
  `tratamento_anterior` text NOT NULL DEFAULT 'não informado',
  `motivo_tratamento_anterior` text NOT NULL DEFAULT 'não informado',
  `resultado_tratamento_anterio` text NOT NULL DEFAULT 'não informado',
  `problema_fisico_recorrente` text NOT NULL DEFAULT 'não informado',
  `data_inicio_sintomas` timestamp NOT NULL DEFAULT current_timestamp(),
  `queixa_principal` text NOT NULL DEFAULT 'não informado',
  `fatores_desencadeiam_sintomas` text NOT NULL DEFAULT 'não informado',
  `nivel_dor` int(11) NOT NULL DEFAULT 'não informado',
  `localizacao_dor` varchar(300) NOT NULL DEFAULT 'não informado',
  `cpf` varchar(45) NOT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'anamnese_pacientes'
CREATE TABLE `anamnese_pacientes` (
  `anamnese_id` int(11) NOT NULL,
  `pacientes_id` int(11) NOT NULL,
  PRIMARY KEY (`anamnese_id`,`pacientes_id`),
  KEY `fk_anamnese_pacoentes_pacientes1_idx` (`pacientes_id`),
  CONSTRAINT `fk_anamnese_pacoentes_anamnese1` FOREIGN KEY (`anamnese_id`) REFERENCES `anamnese` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_anamnese_pacoentes_pacientes1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'avaliacao'
CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_avaliacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `hora_avaliacao` time NOT NULL DEFAULT curtime(),
  `observacoes` text NOT NULL DEFAULT 'não informado',
  `diagnostico_inicial` text NOT NULL DEFAULT 'não informado',
  `resultados_teste_exames` text NOT NULL DEFAULT 'não informado',
  `pacientes_id` int(11) NOT NULL DEFAULT 'não informado',
  `funcionarios_id` int(11) NOT NULL DEFAULT 'não informado',
  `servico_id` int(11) NOT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`),
  KEY `fk_avaliacao_pacientes1_idx` (`pacientes_id`),
  KEY `fk_avaliacao_funcionarios1_idx` (`funcionarios_id`),
  CONSTRAINT `fk_avaliacao_funcionarios1` FOREIGN KEY (`funcionarios_id`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_pacientes1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'consulta'
CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_consulta` timestamp NOT NULL DEFAULT current_timestamp(),
  `hora_consulta` time NOT NULL DEFAULT curtime(),
  `observacoes_especificas_consulta` text NOT NULL DEFAULT 'não informado',
  `procedimentos_tratamentos_realizado_consulta` text NOT NULL DEFAULT 'não informado',
  `pacientes_id` int(11) NOT NULL DEFAULT 'não informado',
  `funcionarios_id` int(11) NOT NULL DEFAULT 'não informado',
  `servicos_id` int(11) NOT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`),
  KEY `fk_consulta_pacientes1_idx` (`pacientes_id`),
  KEY `fk_consulta_funcionarios1_idx` (`funcionarios_id`),
  KEY `servicos_id` (`servicos_id`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`servicos_id`) REFERENCES `servicos` (`id`),
  CONSTRAINT `fk_consulta_funcionarios1` FOREIGN KEY (`funcionarios_id`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_pacientes1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Criação da tabela 'agendamentos'
CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_agendamento` varchar(45) NOT NULL DEFAULT 'não informado',
  `data_agendamento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_agendamento` time NOT NULL DEFAULT curtime(),
  `data_registro_agendamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao_agendamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `quem_registro_agendamento` varchar(45) NOT NULL DEFAULT 'não informado',
  `quem_alterou_agendamento` varchar(45) NOT NULL DEFAULT 'não informado',
  `status_agendamento` varchar(45) NOT NULL DEFAULT 'não informado',
  `cor` varchar(45) NOT NULL DEFAULT 'não informado',
  `consulta_id` int(11) DEFAULT NULL DEFAULT 'não informado',
  `avaliacao_id` int(11) DEFAULT NULL DEFAULT 'não informado',
  PRIMARY KEY (`id`),
  KEY `fk_agendamentos_consulta1_idx` (`consulta_id`),
  KEY `fk_agendamentos_avaliacao1_idx` (`avaliacao_id`),
  CONSTRAINT `fk_agendamentos_avaliacao1` FOREIGN KEY (`avaliacao_id`) REFERENCES `avaliacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendamentos_consulta1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
