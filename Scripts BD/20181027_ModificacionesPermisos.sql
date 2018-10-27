/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : PostgreSQL
 Source Server Version : 100005
 Source Host           : localhost:5432
 Source Catalog        : ConsultaCiudadana
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100005
 File Encoding         : 65001

 Date: 27/10/2018 12:46:29
*/


-- ----------------------------
-- Table structure for UsuarioPermiso
-- ----------------------------
DROP TABLE IF EXISTS "public"."UsuarioPermiso";
CREATE TABLE "public"."UsuarioPermiso" (
  "iIdUsuario" int4 NOT NULL,
  "iIdPermiso" int4 NOT NULL,
  "iTipoAcceso" int2 NOT NULL
);
COMMENT ON COLUMN "public"."UsuarioPermiso"."iTipoAcceso" IS '0=Denegado, 1=Lectura, 2=Escritura';

-- ----------------------------
-- Primary Key 
-- ----------------------------
ALTER TABLE "public"."UsuarioPermiso" ADD CONSTRAINT "PKiIdUsuarioiIdPermiso" PRIMARY KEY ("iIdUsuario", "iIdPermiso");

-- ----------------------------
-- Foreign Keys 
-- ----------------------------
ALTER TABLE "public"."UsuarioPermiso" ADD CONSTRAINT "FKUsuarioPermisoPermiso" FOREIGN KEY ("iIdPermiso") REFERENCES "public"."Permiso" ("iIdPermiso") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."UsuarioPermiso" ADD CONSTRAINT "FKUsuarioPermisoUsuario" FOREIGN KEY ("iIdUsuario") REFERENCES "public"."Usuario" ("iIdUsuario") ON DELETE NO ACTION ON UPDATE NO ACTION;


-- ----------------------------
-- Creación campo TipoAcceso para la tabla RolPermiso
-- ----------------------------
ALTER TABLE "public"."RolPermiso" ADD COLUMN "iTipoAcceso" smallint;

COMMENT ON COLUMN public."RolPermiso"."iTipoAcceso" IS '0=Denegado, 1=Lectura, 2=Escritura';

UPDATE "public"."RolPermiso" SET "iTipoAcceso" = 2;

-- ----------------------------
-- Actualización contraseña SHA1 ('123456')
-- ----------------------------
UPDATE "public"."Usuario" 	SET "vCorreo" = 'admin', "vContrasenia"= '7c4a8d09ca3762af61e59520943dc26494f8941b'	WHERE "iIdUsuario" = 1;
