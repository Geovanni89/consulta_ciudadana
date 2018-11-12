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
ALTER TABLE public."PropuestaAdjunto"
    ADD COLUMN "iActivo" smallint NOT NULL DEFAULT 1;

COMMENT ON COLUMN public."PropuestaAdjunto"."iActivo"
    IS '0=No, 1=Si'; */
