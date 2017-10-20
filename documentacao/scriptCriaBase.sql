CREATE DATABASE `escolas` /*!40100 DEFAULT CHARACTER SET utf8 */;



CREATE TABLE usuario (
                codigo INT NOT NULL,
                usuario VARCHAR(45) NOT NULL,
                nome VARCHAR(255) NOT NULL,
                senha VARCHAR(255) NOT NULL,
                diretoria VARCHAR(45),
                PRIMARY KEY (codigo)
);


CREATE TABLE escolas_cadastro (
                codigo_escola INT AUTO_INCREMENT NOT NULL,
                codigo_mec VARCHAR(45) NOT NULL,
                nome VARCHAR(255) NOT NULL,
                municipio VARCHAR(255) NOT NULL,
                diretoria VARCHAR(45) NOT NULL,
                PRIMARY KEY (codigo_escola)
);


CREATE TABLE escolas_wifi (
                codigo_escola_wifi INT NOT NULL,
                codigo INT NOT NULL,
                qtd_ap_router INT NOT NULL,
                qtd_ap INT NOT NULL,
                PRIMARY KEY (codigo_escola_wifi, codigo)
);


CREATE TABLE escolas_diario (
                codigo_escola_diario INT NOT NULL,
                codigo INT NOT NULL,
                qtd_tablet INT NOT NULL,
                PRIMARY KEY (codigo_escola_diario, codigo)
);


CREATE TABLE escolas_administrativo (
                codigo_escola_administrativo INT NOT NULL,
                codigo INT NOT NULL,
                qtd_computadores INT NOT NULL,
                qtd_impressoras INT NOT NULL,
                qtd_estabilizadores INT NOT NULL,
                qtd_scanner INT NOT NULL,
                PRIMARY KEY (codigo_escola_administrativo, codigo)
);


CREATE TABLE escolas_laboratorio (
                codigo INT NOT NULL,
                codigo_escola_laboratorio INT NOT NULL,
                ultimo_pregao VARCHAR(128) NOT NULL,
                cap_max_computadores INT NOT NULL,
                qtd_computadores INT NOT NULL,
                qtd_impressoras INT NOT NULL,
                qtd_estabilizadores INT NOT NULL,
                PRIMARY KEY (codigo, codigo_escola_laboratorio)
);

ALTER TABLE escolas_laboratorio MODIFY COLUMN codigo INTEGER COMMENT 'codigo do Laboratório';

ALTER TABLE escolas_laboratorio MODIFY COLUMN cap_max_computadores INTEGER COMMENT 'Capacidade Máxima Computadores';

ALTER TABLE escolas_laboratorio MODIFY COLUMN qtd_computadores INTEGER COMMENT 'Quantidade de computadores no LTE';


ALTER TABLE escolas_laboratorio ADD CONSTRAINT escolas_cadastro_escolas_laboratorio_fk
FOREIGN KEY (codigo_escola_laboratorio)
REFERENCES escolas_cadastro (codigo_escola)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE escolas_administrativo ADD CONSTRAINT escolas_cadastro_escolas_administrativo_fk
FOREIGN KEY (codigo_escola_administrativo)
REFERENCES escolas_cadastro (codigo_escola)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE escolas_diario ADD CONSTRAINT escolas_cadastro_escolas_diario_fk
FOREIGN KEY (codigo_escola_diario)
REFERENCES escolas_cadastro (codigo_escola)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE escolas_wifi ADD CONSTRAINT escolas_cadastro_escolas_wifi_fk
FOREIGN KEY (codigo_escola_wifi)
REFERENCES escolas_cadastro (codigo_escola)
ON DELETE NO ACTION
ON UPDATE NO ACTION;