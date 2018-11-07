/*
Navicat PGSQL Data Transfer

Source Server         : local
Source Server Version : 100500
Source Host           : localhost:5432
Source Database       : ConsultaCiudadana
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 100500
File Encoding         : 65001

Date: 2018-11-07 12:35:33
*/
-- ----------------------------
-- Table structure for Parametro
-- ----------------------------
DROP TABLE IF EXISTS "public"."Parametro";
CREATE TABLE public."Parametro"
(
    "iIdParametro" serial NOT NULL,
    "vParametro" character varying(60) NOT NULL,
    "vDescripcion" character varying(150) NOT NULL,
    "vValor" character varying(50) NOT NULL,
    "vId" character varying(50) NOT NULL,
    "iActivo" smallint NOT NULL DEFAULT 1,
    PRIMARY KEY ("iIdParametro")
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."Parametro"
    OWNER to postgres;

COMMENT ON COLUMN public."Parametro"."vParametro"
    IS 'Nombre del parámetro';

COMMENT ON COLUMN public."Parametro"."vDescripcion"
    IS 'Descripción del parámetro, objetivo o función';

COMMENT ON COLUMN public."Parametro"."vValor"
    IS 'Valor del parámetro, puede ser de cualquier tipo según se requiera';

COMMENT ON COLUMN public."Parametro"."vId"
    IS 'Campo para identificar el parámetro desde código';

COMMENT ON COLUMN public."Parametro"."iActivo"
    IS '0=Activo, 1Inactivo';

-- ----------------------------
-- Records of Parametro
-- ----------------------------
INSERT INTO "public"."Parametro" VALUES ('1', 'InicioCapturaPropuestas', 'Fecha de inicio de camptura de propuestas', '2018-03-21', 'INI_CAP_PRO', '1');
INSERT INTO "public"."Parametro" VALUES ('2', 'FinCapturaPropuestas', 'Fecha límite para la captura de propuestas', '2018-01-02', 'FIN_CAP_PRO', '1');
INSERT INTO "public"."Parametro" VALUES ('3', 'InicioIntegracion', 'Fecha de inicio para la integración de propuestas', '2018-01-03', 'INI_INT_PRO', '1');
INSERT INTO "public"."Parametro" VALUES ('4', 'FinIntegracion', 'Fecha límite para integrar propuestas', '2018-10-31', 'FIN_INT_PRO', '1');
INSERT INTO "public"."Parametro" VALUES ('5', 'InicioCapturaComentarios', 'Fecha de inicio para la captura de comentarios de usuarios en las propuestas', '2018-11-01', 'INI_CAP_COM', '1');
INSERT INTO "public"."Parametro" VALUES ('6', 'FinCapturaComentarios', 'Fecha de límite para la captura de comentarios de usuarios en las propuestas', '2018-11-30', 'FIN_CAP_COM', '1');
INSERT INTO "public"."Parametro" VALUES ('7', 'InicioVotacion', 'Fecha de inicio de votaciones', '20118-11-01', 'INI_VOT', '1');
INSERT INTO "public"."Parametro" VALUES ('8', 'FinVotacion', 'Fecha límite de votaciones', '2018-11-30', 'FIN_VOT', '1');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table Parametro
-- ----------------------------

