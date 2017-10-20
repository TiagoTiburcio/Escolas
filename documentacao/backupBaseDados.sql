-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: escolas
-- ------------------------------------------------------
-- Server version	5.5.50-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `escolas_administrativo`
--

DROP TABLE IF EXISTS `escolas_administrativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escolas_administrativo` (
  `codigo_escola_administrativo` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `qtd_computadores` int(11) NOT NULL,
  `qtd_impressoras` int(11) NOT NULL,
  `qtd_estabilizadores` int(11) NOT NULL,
  `qtd_scanner` int(11) NOT NULL,
  PRIMARY KEY (`codigo_escola_administrativo`,`codigo`),
  CONSTRAINT `escolas_cadastro_escolas_administrativo_fk` FOREIGN KEY (`codigo_escola_administrativo`) REFERENCES `escolas_cadastro` (`codigo_escola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escolas_administrativo`
--

LOCK TABLES `escolas_administrativo` WRITE;
/*!40000 ALTER TABLE `escolas_administrativo` DISABLE KEYS */;
/*!40000 ALTER TABLE `escolas_administrativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escolas_cadastro`
--

DROP TABLE IF EXISTS `escolas_cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escolas_cadastro` (
  `codigo_escola` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_mec` varchar(45) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `diretoria` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_escola`)
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escolas_cadastro`
--

LOCK TABLES `escolas_cadastro` WRITE;
/*!40000 ALTER TABLE `escolas_cadastro` DISABLE KEYS */;
INSERT INTO `escolas_cadastro` VALUES (1,'28032578','Centro de Excelência Professora Maria das Graças Azevedo Melo','Aracaju','DEA'),(2,'28018486','Centro de Excelência Professora Maria Ivanda de Carvalho Nascimento','Aracaju','DEA'),(3,'28018478','Centro de Excelência Professor José Carlos de Sousa','Aracaju','DEA'),(4,'28017315','Centro de Referência de E.J.A Prof.ºSeverino Uchôa','Aracaju','DEA'),(5,'28026730','Centro Est. de Educ. Profissional José de Figueiredo Barreto','Aracaju','DEA'),(6,'28017838','Colégio Estadual Atheneu Sergipense','Aracaju','DEA'),(7,'28018435','Colégio Estadual Barão de Mauá','Aracaju','DEA'),(8,'28018451','Colégio Estadual Dom. Luciano José Cabral Duarte','Aracaju','DEA'),(9,'28031911','Colégio Estadual  Dr. Jugurta Barreto de Lima','Aracaju','DEA'),(10,'28018419','Colégio Estadual Gov. Augusto Franco','Aracaju','DEA'),(11,'28028783','Colégio Estadual Gov. Djenal Tavares de Queiróz','Aracaju','DEA'),(12,'28018125','Colégio Estadual Ivo do Prado','Aracaju','DEA'),(13,'28017846','Colégio Estadual Jackson de Figueirêdo','Aracaju','DEA'),(14,'28018397','Colégio Estadual José Rollemberg Leite','Aracaju','DEA'),(15,'28018460','Colégio Estadual Leandro Maciel','Aracaju','DEA'),(16,'28018761','Colégio Estadual Leonor Teles de Menezes','Aracaju','DEA'),(17,'28019067','Colégio Estadual Ministro Petrônio Portela','Aracaju','DEA'),(18,'28018494','COLÉGIO ESTADUAL NELSON MANDELA','Aracaju','DEA'),(19,'28018818','Colégio Estadual Olavo Bilac','Aracaju','DEA'),(20,'28018745','Colégio Estadual Profª Judite Oliveira','Aracaju','DEA'),(21,'28018915','Colégio Estadual Profª Ofenísia S. Freire','Aracaju','DEA'),(22,'28018508','Colégio Estadual Prof. Arício Fortes','Aracaju','DEA'),(23,'28017862','COLÉGIO ESTADUAL PROFESSOR JOÃO COSTA','Aracaju','DEA'),(24,'28017854','COLÉGIO ESTADUAL PROFESSOR PAULO FREIRE','Aracaju','DEA'),(25,'28018400','Colégio Estadual Prof. Gonçalo Rollemberg Leite','Aracaju','DEA'),(26,'28018320','Colégio Estadual Prof. Joaquim Vieira Sobral','Aracaju','DEA'),(27,'28018940','Colégio Estadual Santos Dumont','Aracaju','DEA'),(28,'28018389','Colégio Estadual Secretário Francisco Rosa Santos','Aracaju','DEA'),(29,'28018516','Colégio Estadual Tobias Barreto','Aracaju','DEA'),(30,'28033477','Colégio Estadual Vitória de Santa Maria','Aracaju','DEA'),(31,'28032705','Conservatório de Música de Sergipe','Aracaju','DEA'),(32,'28017285','Escola de Educação Especial João Cardoso Nascimento Júnior','Aracaju','DEA'),(33,'28018540','Escola Estadual 11 de Agosto','Aracaju','DEA'),(34,'28018559','Escola Estadual 15 de Outubro','Aracaju','DEA'),(35,'28018567','Escola Estadual 17 de Março','Aracaju','DEA'),(36,'28018575','Escola Estadual 24 de Outubro','Aracaju','DEA'),(37,'28018583','Escola Estadual 8 de Julho','Aracaju','DEA'),(38,'28018591','Escola Estadual Alceu Amoroso Lima','Aracaju','DEA'),(39,'28019911','Escola Estadual Augusto Maynard','Aracaju','DEA'),(40,'28019717','Escola Estadual Cel. Francisco de Souza Porto','Aracaju','DEA'),(41,'28019040','Escola Estadual Clodoaldo de Alencar','Aracaju','DEA'),(42,'28021746','Escola Estadual Coelho Neto','Aracaju','DEA'),(43,'28019024','Escola Estadual Desemb. João Bosco de Andrade Lima','Aracaju','DEA'),(44,'28018648','Escola Estadual Dr. Manoel Luiz','Aracaju','DEA'),(45,'28027795','Escola Estadual D. Vicente Távora','Aracaju','DEA'),(46,'28018656','Escola Estadual Embaixador Bilac Pinto','Aracaju','DEA'),(47,'28019725','Escola Estadual General Siqueira','Aracaju','DEA'),(48,'28018672','Escola Estadual General Valadão','Aracaju','DEA'),(49,'28018290','Escola Estadual Jacintho de Figueiredo Martins','Aracaju','DEA'),(50,'28018680','Escola Estadual João Paulo II','Aracaju','DEA'),(51,'28019164','Escola Estadual John Kennedy','Aracaju','DEA'),(52,'28018702','Escola Estadual Jornalista Paulo Costa','Aracaju','DEA'),(53,'28018729','Escola Estadual José Augusto Ferraz','Aracaju','DEA'),(54,'28019741','Escola Estadual José da Silva Ribeiro Filho','Aracaju','DEA'),(55,'28018737','Escola Estadual José de Alencar Cardoso','Aracaju','DEA'),(56,'28019750','Escola Estadual Lourival Baptista','Aracaju','DEA'),(57,'28019172','Escola Estadual Manoel Dionízio de Santana','Aracaju','DEA'),(58,'28027817','Escola Estadual Mestre Euclides','Aracaju','DEA'),(59,'28026845','Escola Estadual Min.Geraldo Barreto Sobral CAIC','Aracaju','DEA'),(60,'28018796','Escola Estadual Monsenhor Carlos Camélio Costa','Aracaju','DEA'),(61,'28018800','Escola Estadual Monteiro Lobato','Aracaju','DEA'),(62,'28018826','Escola Estadual Olímpia Bittencourt','Aracaju','DEA'),(63,'28019180','Escola Estadual Paulino Nascimento','Aracaju','DEA'),(64,'28018842','Escola Estadual Poeta Garcia Rosa','Aracaju','DEA'),(65,'28018931','Escola Estadual Profª Áurea Melo','Aracaju','DEA'),(66,'28018869','Escola Estadual Prof. Acrísio Cruz','Aracaju','DEA'),(67,'28019350','Escola Estadual Profª Lucila Moraes Chaves','Aracaju','DEA'),(68,'28020111','Escola Estadual Profª Myriam de Oliveira Santos Melo','Aracaju','DEA'),(69,'28019768','Escola Estadual Prof. Artur Fortes','Aracaju','DEA'),(70,'28018117','Escola Estadual Prof. Benedito Oliveira','Aracaju','DEA'),(71,'28018885','Escola Estadual Prof. Francisco Portugal','Aracaju','DEA'),(72,'28018893','Escola Estadual Prof. Manoel Franco Freire','Aracaju','DEA'),(73,'28018923','Escola Estadual Prof. Ruy Eloy','Aracaju','DEA'),(74,'28019059','Escola Estadual Prof. Valnir Chagas','Aracaju','DEA'),(75,'28019784','Escola Estadual Rodrigues Dórea','Aracaju','DEA'),(76,'28018958','Escola Estadual São Cristóvão','Aracaju','DEA'),(77,'28020235','Escola Estadual São José','Aracaju','DEA'),(78,'28018974','Escola Estadual Sen. Leite Neto','Aracaju','DEA'),(79,'28018982','Escola Estadual Sen. Lourival Fontes','Aracaju','DEA'),(80,'28021096','Escola Estadual Wolney Leal de Melo','Aracaju','DEA'),(81,'28019938','Escola Euvaldo Diniz Gonçalves','Aracaju','DEA'),(82,'28027930','Escola Frei Esmeraldo Silva de Menezes','Aracaju','DEA'),(83,'28018966','Escola São Lourenço','Aracaju','DEA'),(84,'28019520','Escolas Reunidas 8 de Maio','Aracaju','DEA'),(85,'28019806','Instituto de Educação Ruy Barbosa','Aracaju','DEA'),(86,'28031407','Instituto Educ. Sta Terezinha do Menino Jesus','Aracaju','DEA'),(87,'28021797','Colégio Estadual Manuel Bomfim','Arauá','DRE01'),(88,'28022394','Colégio Estadual Leonardo G. de Carvalho Leite','Cristinápolis','DRE01'),(89,'28022440','Escola Estadual Cel. Otávio de Souza Leite','Cristinápolis','DRE01'),(90,'28024419','Centro de Referência de Educação de Jovens e Adultos Jorge Amado','Estância','DRE01'),(91,'28024532','Colégio Estadual Arabela Ribeiro','Estância','DRE01'),(92,'28024559','Colegio Estadual Gumercindo Bessa','Estância','DRE01'),(93,'28024540','Colégio Estadual Prof. Gilson Amado','Estância','DRE01'),(94,'28024524','Colégio Estadual Senador Walter Franco','Estância','DRE01'),(95,'28024990','Escola Estadual Constâncio Vieira','Estância','DRE01'),(96,'28025032','Escola Estadual Gilberto Amado','Estância','DRE01'),(97,'28025326','Centro de Excelência Arquibaldo Mendonça','Indiaroba','DRE01'),(98,'28025180','Escola Estadual Dionísio Machado','Indiaroba','DRE01'),(99,'28029577','Colégio Estadual Prefeito Joaldo Lima de Carvalho','Itabaianinha','DRE01'),(100,'28022645','Escola Estadual Monsenhor Olímpio Campos','Itabaianinha','DRE01'),(101,'28023277','Colégio Estadual Dr. Jessé Fontes','Pedrinhas','DRE01'),(102,'28023153','Escola Estadual Profª Josefina Leite Campos','Pedrinhas','DRE01'),(103,'28025903','Colégio Estadual Comendador Calazans','Santa Luzia do Itanhy','DRE01'),(104,'28032080','Colégio Estadual Pedro de Balbino','Tomar do Geru','DRE01'),(105,'28023730','Escola Estadual Dom. José Vicente Távora','Tomar do Geru','DRE01'),(106,'28024150','Colégio Estadual Dr. Antonio Garcia Filho','Umbaúba','DRE01'),(107,'28028562','Colégio Estadual Prefeito Anfilófio Fernandes Viana','Umbaúba','DRE01'),(108,'28035100','CEEP Maria Fontes de Faria','Boquim','DRE02'),(109,'28022033','Colégio Estadual Cleonice Soares Fonseca','Boquim','DRE02'),(110,'28022025','Colégio Estadual Severiano Cardoso','Boquim','DRE02'),(111,'28022378','Escola Estadual Pe. José Gumercindo dos Santos','Boquim','DRE02'),(112,'28011058','Colégio Estadual Luiz Alves de Oliveira','Lagarto','DRE02'),(113,'28011104','Colégio Estadual Prof. Abelardo Romero Dantas','Lagarto','DRE02'),(114,'28032225','Colégio Estadual Professor Jose Claudio Monteiro','Lagarto','DRE02'),(115,'28011082','Colégio Estadual Silvio Romero','Lagarto','DRE02'),(116,'28026667','Escola Estadual Dom Mario Rino Sivieri','Lagarto','DRE02'),(117,'28012054','Escola Estadual Dr. Evandro Mendes','Lagarto','DRE02'),(118,'28026969','Escola Estadual Luzia Dória de Carvalho','Lagarto','DRE02'),(119,'28011074','Escola Estadual Monsenhor Juarez Santos Prata','Lagarto','DRE02'),(120,'28012100','Escola Estadual Monsenhor Marinho','Lagarto','DRE02'),(121,'28012062','Escola Estadual Nossa Senhora da Piedade','Lagarto','DRE02'),(122,'28012119','Escola Estadual Sen. Leite Neto','Lagarto','DRE02'),(123,'28011945','Escola Rotary Clube','Lagarto','DRE02'),(124,'28008677','Colégio Estadual Prof. João de Oliveira','Poço Verde','DRE02'),(125,'28009134','Colégio Estadual São José','Poço Verde','DRE02'),(126,'28008731','Escola Estadual Antonio Muniz de Souza','Poço Verde','DRE02'),(127,'28008782','Escola Estadual Epifanio Dórea','Poço Verde','DRE02'),(128,'28009223','Escola Estadual Sebastião da Fonseca','Poço Verde','DRE02'),(129,'28012151','Colégio Estadual Antônio Fontes Freitas','Riachão do Dantas','DRE02'),(130,'28012542','Colégio Estadual Doutor Osman Hora Fontes','Riachão do Dantas','DRE02'),(131,'28012143','Escola Estadual Lourival Fontes','Riachão do Dantas','DRE02'),(132,'28026250','UPE Tia Mª Isabel','Riachão do Dantas','DRE02'),(133,'28023315','Colégio Estadual Alencar Cardoso','Salgado','DRE02'),(134,'28040201','Colégio Estadual Deputado Joaldo Vieira Barbosa','Salgado','DRE02'),(135,'28023323','Escola Estadual José Conrado de Araújo','Salgado','DRE02'),(136,'28023331','Escola Estadual Raimundo Araújo','Salgado','DRE02'),(137,'28009266','Centro de Referência de Ed. de J. e A. ProfºMarcos Ferreira','Simão Dias','DRE02'),(138,'28009398','Colégio Estadual Dr. Milton Dortas','Simão Dias','DRE02'),(139,'28009487','Colégio Estadual Sen. Lourival Batista','Simão Dias','DRE02'),(140,'28009401','Escola Estadual Aristeu Carlos Valadares','Simão Dias','DRE02'),(141,'28031644','Escola Estadual Carmem do Prado Dantas Amaral','Simão Dias','DRE02'),(142,'28009851','Escola Estadual Fausto Cardoso','Simão Dias','DRE02'),(143,'28010060','Escola Estadual João Ferreira de Matos','Simão Dias','DRE02'),(144,'28009894','Escola Estadual João Mattos de Carvalho','Simão Dias','DRE02'),(145,'28009916','Escola Estadual Joaquim Gregório Bispo','Simão Dias','DRE02'),(146,'28009533','Escola Estadual José de Carvalho Déda','Simão Dias','DRE02'),(147,'28009380','Escola Estadual Maria de Lourdes S. Leite','Simão Dias','DRE02'),(148,'28009363','Escola Estadual Pedro Valadares','Simão Dias','DRE02'),(149,'28009541','Escola Rural AGL de Sítios Jacaré','Simão Dias','DRE02'),(150,'28009576','Escola Vereador Manoel Sobrinho','Simão Dias','DRE02'),(151,'28010132','Colégio Estadual Abelardo Barreto do Rosário','Tobias Barreto','DRE02'),(152,'28010450','Colégio Estadual Maria Rosa de Oliveira','Tobias Barreto','DRE02'),(153,'28010728','Escola Estadual João Antônio Cesar','Tobias Barreto','DRE02'),(154,'28010817','Escola Estadual Presidente Castelo Branco','Tobias Barreto','DRE02'),(155,'28010868','Escola Estadual Rosinha Felipe','Tobias Barreto','DRE02'),(156,'28031814','Escola Estadual Rural Engenheiro José Carvalho','Tobias Barreto','DRE02'),(157,'28010825','Escola Estadual Tobias Barreto','Tobias Barreto','DRE02'),(158,'28006542','Colégio Estadual Deputado Guido Azevedo','Areia Branca','DRE03'),(159,'28006569','Escola Estadual Pedro Diniz Gonçalves','Areia Branca','DRE03'),(160,'28006739','Colégio Estadual Roque José de Souza','Campo do Brito','DRE03'),(161,'28030753','Escola Estadual Dep. Francisco da Paixão','Campo do Brito','DRE03'),(162,'28006720','Escola Estadual Guilherme Campos','Campo do Brito','DRE03'),(163,'28003551','Colégio Estadual Prof. Artur Fortes','Carira','DRE03'),(164,'28032586','Escola Estadual Antonio Dutra Sobrinho','Carira','DRE03'),(165,'28004060','Colégio Estadual Prof. Gentil Tavares da Mota','Frei Paulo','DRE03'),(166,'28004256','Escola Estadual Martinho Garcez','Frei Paulo','DRE03'),(167,'28007166','Colégio Estadual Dr. Augusto César Leite','Itabaiana','DRE03'),(168,'28007816','Colégio Estadual Eduardo Silveira','Itabaiana','DRE03'),(169,'28007000','Colégio Estadual Murilo Braga','Itabaiana','DRE03'),(170,'28007140','Colégio Estadual Padre Mendonça','Itabaiana','DRE03'),(171,'28007840','Escola Estadual Deputado Manoel Teles','Itabaiana','DRE03'),(172,'28007158','Escola Estadual Dr. Airton Teles','Itabaiana','DRE03'),(173,'28007832','Escola Estadual Eliezer Porto','Itabaiana','DRE03'),(174,'28007204','Escola Estadual Guilhermino Bezerra','Itabaiana','DRE03'),(175,'28007603','Escola Estadual Maria da Conceição','Itabaiana','DRE03'),(176,'28007182','Escola Estadual Monsenhor Mario de O. Reis','Itabaiana','DRE03'),(177,'28007174','Escola Estadual Profª Izabel E. de Freitas','Itabaiana','DRE03'),(178,'28007190','Escola Estadual Prof. Nestor Carvalho Lima','Itabaiana','DRE03'),(179,'28006950','Escola Estadual Vicente Machado Menezes','Itabaiana','DRE03'),(180,'28007425','Escola Rotary Dr. Carlos Melo','Itabaiana','DRE03'),(181,'28007565','Escola Rural Pov. Mangabeira','Itabaiana','DRE03'),(182,'28007867','Colégio Estadual Marcolino Cruz Santos','Macambira','DRE03'),(183,'28008227','Colégio Estadual José Joaquim Cardoso','Malhador','DRE03'),(184,'28008057','Escola Estadual São José','Malhador','DRE03'),(185,'28008235','Colégio Estadual  Djenal Tavares de Queiróz','Moita Bonita','DRE03'),(186,'28008243','Colégio Estadual Profª Maria da Glória Costa','Moita Bonita','DRE03'),(187,'28004264','Escola Estadual João Salonio','Nossa Senhora Aparecida','DRE03'),(188,'28004582','Colégio Estadual  Augusto Franco','Pedra Mole','DRE03'),(189,'28004701','Colégio Estadual Professor Genaro Dantas Silva','Pinhão','DRE03'),(190,'28004809','Colégio Estadual Abdias Bezerra','Ribeirópolis','DRE03'),(191,'28030095','Colégio Estadual João XXIII','Ribeirópolis','DRE03'),(192,'28005023','Escola Estadual Deputado Baltazar Santos','Ribeirópolis','DRE03'),(193,'28005155','Escola Estadual Josué Passos','Ribeirópolis','DRE03'),(194,'28004817','Escola Estadual Profª Maria do Carmo Santos','Ribeirópolis','DRE03'),(195,'28005104','Escola Estadual Profª Maria Melânia Mendonça','Ribeirópolis','DRE03'),(196,'28008421','Colégio Estadual Emiliano Ribeiro','São Domingos','DRE03'),(197,'28006356','Escola Estadual Miguel das Graças','São Miguel do Aleixo','DRE03'),(198,'28014146','Colégio Estadual Edélzio Vieira de Melo','Capela','DRE04'),(199,'28014138','Colégio Estadual Irmã Maria Clemencia','Capela','DRE04'),(200,'28014553','Escola Estadual Coelho e Campos','Capela','DRE04'),(201,'28014170','Escola Estadual Profª Mª Berenice B. Alves','Capela','DRE04'),(202,'28014081','Escola Mons. Eraldo Barbosa de Almeida','Capela','DRE04'),(203,'28014219','UPE Criança Feliz','Capela','DRE04'),(204,'28035585','CEEP Gov. Marcelo Déda Chagas','Carmópolis','DRE04'),(205,'28016165','Colégio Estadual Poeta José Sampaio','Carmópolis','DRE04'),(206,'28016300','Colégio Estadual Maria Conceição de Santana','General Maynard','DRE04'),(207,'28029569','Colégio Estadual José de Matos Teles','Japaratuba','DRE04'),(208,'28015002','Escola Estadual Sen. Gonçalo Rollemberg','Japaratuba','DRE04'),(209,'28016637','Colégio Estadual Dr. Alcides Pereira','Maruim','DRE04'),(210,'28029275','Colégio Felipe Tiago Gomes','Maruim','DRE04'),(211,'28005848','Colégio Estadual Almirante Barroso','Muribeca','DRE04'),(212,'28015983','Colégio Estadual José Amaral Lemos','Pirambu','DRE04'),(213,'28016890','Escola Estadual Leandro Maciel','Rosário do Catete','DRE04'),(214,'28005651','Colégio Estadual Alcebíades Paes','Cumbe','DRE05'),(215,'28014693','Colégio Estadual Dr. João de Melo Prado','Divina Pastora','DRE05'),(216,'28000951','Colégio Estadual Manoel Alcino do Nascimento','Gracho Cardoso','DRE05'),(217,'28006330','Colégio Estadual General Calazans','Nossa Senhora das Dores','DRE05'),(218,'28006046','Colégio Estadual Prof. Fernando Azevedo','Nossa Senhora das Dores','DRE05'),(219,'28014839','Colégio Estadual Cel José J. Barbosa','Siriri','DRE05'),(220,'28012631','Colégio Estadual Manoel Joaquim de Oliveira Campos','Amparo de Sao Francisco','DRE06'),(221,'28005163','Colégio Estadual Francisco Figueirêdo','Aquidabã','DRE06'),(222,'28005198','Escola Estadual Milton Azevedo','Aquidabã','DRE06'),(223,'28005201','Escola Estadual Nações Unidas','Aquidabã','DRE06'),(224,'28012739','Colegio Estadual Amelia Lima Machado','Brejo Grande','DRE06'),(225,'28012720','Colégio Estadual Dr. Luiz Garcia','Brejo Grande','DRE06'),(226,'28012755','Escola Estadual Manoel Alves Cavalcante','Brejo Grande','DRE06'),(227,'28012836','Colégio Estadual São Francisco de Assis','Canhoba','DRE06'),(228,'28012933','Escola Estadual Aristides Gomes de Andrade','Canhoba','DRE06'),(229,'28012984','Escola Estadual Dr. Eronides de Carvalho','Canhoba','DRE06'),(230,'28013018','Colégio Estadual Manuel Dantas','Cedro de São João','DRE06'),(231,'28013077','Escola Estadual Dr. João Lima','Cedro de São João','DRE06'),(232,'28013093','Colégio Estadual Dr. Jessé Trindade','Ilha das Flores','DRE06'),(233,'28013212','Escola Estadual Manoel Antonio Pereira','Ilha das Flores','DRE06'),(234,'28013158','Escola Estadual Prof. Antonio C. F. Cruz','Ilha das Flores','DRE06'),(235,'28026268','Assoc. Manten. da Esc. Familia Agrícola de Ladeirinhas','Japoatã','DRE06'),(236,'28015355','Colégio Estadual Josino Menezes','Japoatã','DRE06'),(237,'28032195','Colégio Estadual Josino Menezes(Anexo)','Japoatã','DRE06'),(238,'28015479','Colégio Estadual Profª Roberta Ramalho de Souza','Japoatã','DRE06'),(239,'28015452','Escola Estadual Júlio Silva','Japoatã','DRE06'),(240,'28015460','Escola Estadual Manoel Reinaldo dos Santos','Japoatã','DRE06'),(241,'28015444','Escola Estadual Otávio Bezerra','Japoatã','DRE06'),(242,'28005759','Colégio Estadual Emiliano Guimarães','Malhada dos Bois','DRE06'),(243,'28041801','Centro Estadual de Educação Profissional Agonalto Pacheco da Silva','Neópolis','DRE06'),(244,'28013247','Colégio Estadual Caldas Júnior','Neópolis','DRE06'),(245,'28013298','Colégio Estadual Mal. Pereira Lobo','Neópolis','DRE06'),(246,'28013379','Escola de Ensino Fundamental Carmélia Lemos Serra Dantas','Neópolis','DRE06'),(247,'28013476','Escola de Ensino Fundamental Sagrada Família','Neópolis','DRE06'),(248,'28030940','Escola Estadual Aminthas Diniz de Aguiar Dantas','Neópolis','DRE06'),(249,'28013310','Escola Estadual Gov. Manoel de Miranda','Neópolis','DRE06'),(250,'28013301','Escola Estadual Zeca Pereira','Neópolis','DRE06'),(251,'28015622','Colégio Estadual Dr. Leandro Maciel','Pacatuba','DRE06'),(252,'28015762','Escola Estadual Nossa Senhora Santana','Pacatuba','DRE06'),(253,'28013700','Colégio Estadual Cel João Fernandes de Brito','Propriá','DRE06'),(254,'28013719','Colégio Estadual Joana de Freitas Barbosa','Propriá','DRE06'),(255,'28013840','Escola Estadual D. Antonio dos S. Cabral','Propriá','DRE06'),(256,'28013913','Escola Estadual Drª Maria do Carmo Alves','Propriá','DRE06'),(257,'28013867','Escola Estadual Graccho Cardoso','Propriá','DRE06'),(258,'28013875','Escola Estadual Prof. Cezário Siqueira','Propriá','DRE06'),(259,'28013921','Colégio Estadual Antonio Mathias Barroso','Santana do São Francisco','DRE06'),(260,'28013972','Escola Estadual Prof. Gomes Neto','Santana do São Francisco','DRE06'),(261,'28016106','Colégio Estadual João Dias Guimarães','São Francisco','DRE06'),(262,'28013980','Colégio Estadual José Guimarães Lima','Telha','DRE06'),(263,'28027736','Colégio Estadual José Augusto da R. Lima','Gararu','DRE07'),(264,'28000897','Colégio Estadual Nelson R. de Albuquerque','Gararu','DRE07'),(265,'28000749','Escola Estadual Monsenhor Rangel','Gararu','DRE07'),(266,'28001150','Colégio Estadual Profª Maria da G. M. Moura','Itabi','DRE07'),(267,'28001290','Escola Estadual Profª Maria Pureza Aragão','Itabi','DRE07'),(268,'28013620','Colégio Estadual Almirante Tamandaré','Nossa Senhora de Lourdes','DRE07'),(269,'28013514','Colegio Estadual Monsenhor Fernando Graça Leite','Nossa Senhora de Lourdes','DRE07'),(270,'28039408','Escola Estadual Professora Eulina Batista de Melo','Nossa Senhora de Lourdes','DRE07'),(271,'28026705','Colégio Estadual Gov. Lourival Baptista','Porto da Folha','DRE07'),(272,'28003047','Colégio Estadual Pedro Alves de Souza','Porto da Folha','DRE07'),(273,'28033884','Colégio Estadual Professora Clemência Alves da Silva','Porto da Folha','DRE07'),(274,'28026543','Colégio Estadual Professora Maria Zenite dos Santos','Porto da Folha','DRE07'),(275,'28003055','Colégio Estadual Quilombola 27 de Maio','Porto da Folha','DRE07'),(276,'28003535','Colégio Indigena Estadual Dom José Brandão de Castro','Porto da Folha','DRE07'),(277,'28003071','Escola Estadual Cel Maynard Gomes','Porto da Folha','DRE07'),(278,'28020308','Colégio Estadual Dr. Carlos Firpo','Barra dos Coqueiros','DRE08'),(279,'28020340','Escola Estadual Prof. José Franklin','Barra dos Coqueiros','DRE08'),(280,'28020367','Escola Reunidas Coelho Neto','Barra dos Coqueiros','DRE08'),(281,'28025423','Colégio Estadual Felisbello Freire','Itaporanga dAjuda','DRE08'),(282,'28028317','Colégio Estadual Helio Wanderley Sobral Carvalho','Itaporanga dAjuda','DRE08'),(283,'28025849','Escola Estadual Francisco Sales Sobral','Itaporanga dAjuda','DRE08'),(284,'28025873','Escola Estadual José Sobral Garcez','Itaporanga dAjuda','DRE08'),(285,'28025733','Escola Estadual Pedro Almeida Valadares','Itaporanga dAjuda','DRE08'),(286,'28016319','Colégio Estadual Profª Zizinha Guimarães','Laranjeiras','DRE08'),(287,'28016360','Escola Estadual Conego Filadelfo Oliveira','Laranjeiras','DRE08'),(288,'28016335','Escola Estadual João Ribeiro','Laranjeiras','DRE08'),(289,'28016440','Escola Estadual Prof. Antonio Nobre de Almeida','Laranjeiras','DRE08'),(290,'28016521','Escola Rural Povoado Mussuca','Laranjeiras','DRE08'),(291,'28027744','CAIC Jornalista Joel Silveira','Nossa Senhora do Socorro','DRE08'),(292,'28035631','CEEP Gov. Seixas Dória','Nossa Senhora do Socorro','DRE08'),(293,'28032306','Centro de Excelência Deputado Jonas Amaral','Nossa Senhora do Socorro','DRE08'),(294,'28020464','Colégio Estadual Alfredo Montes','Nossa Senhora do Socorro','DRE08'),(295,'28026853','Colégio Estadual Gilberto Freire','Nossa Senhora do Socorro','DRE08'),(296,'28020766','Colégio Estadual João Batista Nascimento','Nossa Senhora do Socorro','DRE08'),(297,'28020529','Colégio Estadual Poeta José Sampaio','Nossa Senhora do Socorro','DRE08'),(298,'28020480','Colégio Estadual Pres. Juscelino Kubitschek','Nossa Senhora do Socorro','DRE08'),(299,'28020456','Colégio Estadual Prof. Antônio Fontes Freitas','Nossa Senhora do Socorro','DRE08'),(300,'28020421','Colégio Estadual Prof. José Barreto Fontes','Nossa Senhora do Socorro','DRE08'),(301,'28020448','Colégio Estadual Prof. Leão Magno Brasil','Nossa Senhora do Socorro','DRE08'),(302,'28020502','Escola Estadual Frei Inocencio','Nossa Senhora do Socorro','DRE08'),(303,'28020510','Escola Estadual João Arlindo de Jesus','Nossa Senhora do Socorro','DRE08'),(304,'28020472','Escola Estadual Jorge Amado','Nossa Senhora do Socorro','DRE08'),(305,'28020995','Escola Estadual Jornalista Célio Nunes','Nossa Senhora do Socorro','DRE08'),(306,'28020871','Escola Estadual José Freire da Costa Pinto','Nossa Senhora do Socorro','DRE08'),(307,'28020774','Escola Estadual Marinalva Alves','Nossa Senhora do Socorro','DRE08'),(308,'28020499','Escola Estadual Poeta João Freire Ribeiro','Nossa Senhora do Socorro','DRE08'),(309,'28020987','Escola Estadual Profª Agda Fontes Ferreira','Nossa Senhora do Socorro','DRE08'),(310,'28020537','Escola Estadual Profª Julia Teles','Nossa Senhora do Socorro','DRE08'),(311,'28020804','Escola Estadual Profª Maria Herminia Caldas','Nossa Senhora do Socorro','DRE08'),(312,'28021002','Escola Estadual Prof. Cecinha Melo Costa','Nossa Senhora do Socorro','DRE08'),(313,'28020979','Escola Estadual Prof. Diomedes S. da Silva','Nossa Senhora do Socorro','DRE08'),(314,'28020723','Escola Estadual Prof. Francisco José Gomes','Nossa Senhora do Socorro','DRE08'),(315,'28029003','Escola Estadual Zumbi dos Palmares','Nossa Senhora do Socorro','DRE08'),(316,'28020715','Escola Rural Paulo Freire','Nossa Senhora do Socorro','DRE08'),(317,'28028384','Colégio Estadual Professora Maria de Lourdes Góis','Riachuelo','DRE08'),(318,'28016750','Escola Estadual Francisco Leite','Riachuelo','DRE08'),(319,'28014812','Colégio Estadual Dr. Edelzio Vieira de Melo','Santa Rosa de Lima','DRE08'),(320,'28016971','Colégio Estadual Prof. Rogaciano M Leão Brasil','Santo Amaro das Brotas','DRE08'),(321,'28016980','Escola Estadual Esperidião Monteiro','Santo Amaro das Brotas','DRE08'),(322,'28017129','Escola Menino Jesus de Sion','Santo Amaro das Brotas','DRE08'),(323,'28021177','Colégio Estadual Armindo Guaraná','São Cristovão','DRE08'),(324,'28021045','Colégio Estadual Deputado Elisio Carmelo','São Cristovão','DRE08'),(325,'28021223','Colégio Estadual Pe Gaspar Lourenço','São Cristovão','DRE08'),(326,'28021142','Colégio Estadual Profª Glorita Portugal','São Cristovão','DRE08'),(327,'28021231','Colégio Estadual Profª Olga Barreto','São Cristovão','DRE08'),(328,'28032640','Colégio Estadual Prof. Hamilton Alves Rocha','São Cristovão','DRE08'),(329,'28030559','Escola de 1º grau Cap. Manoel Batista Santos','São Cristovão','DRE08'),(330,'28021754','Escola Estadual Luiz Guimarães','São Cristovão','DRE08'),(331,'28021568','Escola Estadual Profª Neyde Mesquita','São Cristovão','DRE08'),(332,'28021100','Escola Estadual Professor dos Manoel Passos de Oliveira Tele','São Cristovão','DRE08'),(333,'28021770','Escola Estadual Prof. Normelia Araujo Melo','São Cristovão','DRE08'),(334,'28021215','Escola Estadual Sen. Paulo Sarasate','São Cristovão','DRE08'),(335,'28021673','Escola Reunidas Adelaide Garcez Caldas Barreto','São Cristovão','DRE08'),(336,'28021517','Escola Rural Povoado Cabrita','São Cristovão','DRE08'),(337,'28021525','Escola Rural Povoado Feijão','São Cristovão','DRE08'),(338,'28021533','Escola Rural Povoado Rita Cacete','São Cristovão','DRE08'),(339,'28021541','Escola Rural Vitória Miranda','São Cristovão','DRE08'),(340,'28027434','Colégio Estadual Delmiro de M. Britto','Canindé de São Francisco','DRE09'),(341,'28000013','Colégio Estadual Dom Juvencio de Brito','Canindé de São Francisco','DRE09'),(342,'28000315','Colégio Estadual Maria Montessori','Feira Nova','DRE09'),(343,'28001400','Colégio Estadual 28 de Janeiro','Monte Alegre de Sergipe','DRE09'),(344,'28001630','Escola Estadual José Inácio de Farias','Monte Alegre de Sergipe','DRE09'),(345,'28001680','Colégio Estadual Cícero Bezerra','Nossa Senhora da Glória','DRE09'),(346,'28001699','Colégio Estadual Manoel Messias Feitosa','Nossa Senhora da Glória','DRE09'),(347,'28002229','Escola Estadual Professora Evangelina Azevedo','Nossa Senhora da Glória','DRE09'),(348,'28002199','Escola Padre Leon Gregório','Nossa Senhora da Glória','DRE09'),(349,'28033086','Centro Estadual de Educação Prof. Dom José Brandão de Castro','Poço Redondo','DRE09'),(350,'28002245','Colégio Estadual Justiniano de Melo e Silva','Poço Redondo','DRE09'),(351,'28032730','Colégio Estadual Profª Noêmia de Souza','Poço Redondo','DRE09'),(352,'28029364','Escola Estadual Durval Rodrigues Rosa','Poço Redondo','DRE09'),(353,'28002261','Escola Estadual Profª Josefa Marques','Poço Redondo','DRE09'),(354,'28002865','Escola Estadual Teotonio Alves China','Poço Redondo','DRE09');
/*!40000 ALTER TABLE `escolas_cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escolas_diario`
--

DROP TABLE IF EXISTS `escolas_diario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escolas_diario` (
  `codigo_escola_diario` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `qtd_tablet` int(11) NOT NULL,
  PRIMARY KEY (`codigo_escola_diario`,`codigo`),
  CONSTRAINT `escolas_cadastro_escolas_diario_fk` FOREIGN KEY (`codigo_escola_diario`) REFERENCES `escolas_cadastro` (`codigo_escola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escolas_diario`
--

LOCK TABLES `escolas_diario` WRITE;
/*!40000 ALTER TABLE `escolas_diario` DISABLE KEYS */;
/*!40000 ALTER TABLE `escolas_diario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escolas_laboratorio`
--

DROP TABLE IF EXISTS `escolas_laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escolas_laboratorio` (
  `codigo` int(11) NOT NULL DEFAULT '0' COMMENT 'codigo do Laboratório',
  `codigo_escola_laboratorio` int(11) NOT NULL,
  `ultimo_pregao` varchar(128) NOT NULL,
  `cap_max_computadores` int(11) DEFAULT NULL COMMENT 'Capacidade Máxima Computadores',
  `qtd_computadores` int(11) DEFAULT NULL COMMENT 'Quantidade de computadores no LTE',
  `qtd_impressoras` int(11) NOT NULL,
  `qtd_estabilizadores` int(11) NOT NULL,
  PRIMARY KEY (`codigo`,`codigo_escola_laboratorio`),
  KEY `escolas_cadastro_escolas_laboratorio_fk` (`codigo_escola_laboratorio`),
  CONSTRAINT `escolas_cadastro_escolas_laboratorio_fk` FOREIGN KEY (`codigo_escola_laboratorio`) REFERENCES `escolas_cadastro` (`codigo_escola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escolas_laboratorio`
--

LOCK TABLES `escolas_laboratorio` WRITE;
/*!40000 ALTER TABLE `escolas_laboratorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `escolas_laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escolas_wifi`
--

DROP TABLE IF EXISTS `escolas_wifi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escolas_wifi` (
  `codigo_escola_wifi` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `qtd_ap_router` int(11) NOT NULL,
  `qtd_ap` int(11) NOT NULL,
  PRIMARY KEY (`codigo_escola_wifi`,`codigo`),
  CONSTRAINT `escolas_cadastro_escolas_wifi_fk` FOREIGN KEY (`codigo_escola_wifi`) REFERENCES `escolas_cadastro` (`codigo_escola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escolas_wifi`
--

LOCK TABLES `escolas_wifi` WRITE;
/*!40000 ALTER TABLE `escolas_wifi` DISABLE KEYS */;
/*!40000 ALTER TABLE `escolas_wifi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `diretoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'tiagoc','Tiago Tiburcio','40bd001563085fc35165329ea1ff5c5ecbdbbeef',''),(2,'jerffsons','Jerffson Souza ','40bd001563085fc35165329ea1ff5c5ecbdbbeef',''),(4,'silviat','Silvia Teles','41e387b2dc81b8fd93f3fa006931b33d434b6672',''),(5,'agnaldof','Agnaldo Filho','7c222fb2927d828af22f592134e8932480637c0d',''),(6,'Adilsona','Adilson Andrade','9a1a8f1195a2d04bd437c18da666b13d7517b845',''),(7,'alessandroo','Alessandro Oliveira','1357785a19c8c7d95f9de74aee821056f81702e1',''),(8,'adelsol','Adelso Alessandro','7c222fb2927d828af22f592134e8932480637c0d','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-20 17:00:27
