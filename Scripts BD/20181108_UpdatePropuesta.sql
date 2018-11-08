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
ALTER TABLE public."Propuesta" DROP COLUMN "iIdMunicpio";

ALTER TABLE public."Propuesta"
    ADD COLUMN "iIdMunicipio" integer DEFAULT 0;