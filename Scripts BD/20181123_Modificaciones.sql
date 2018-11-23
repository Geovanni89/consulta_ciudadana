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

Date: 2018-11-15 10:00:33
*/
-- ----------------------------
-- Modf Usuario
-- ----------------------------
ALTER TABLE public."Usuario"
    ALTER COLUMN "vApellidoPaterno" TYPE character varying (100) COLLATE pg_catalog."default";
ALTER TABLE public."Usuario"
    ALTER COLUMN "vApellidoPaterno" DROP NOT NULL;