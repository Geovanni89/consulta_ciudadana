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
-- Table structure PresupuestoUsuario
-- ----------------------------
CREATE TABLE public."PresupuestoUsuario"
(
    "iIdTema" integer NOT NULL,
    "iIdUsuario" integer NOT NULL,
    "dFecha" timestamp without time zone NOT NULL,
    PRIMARY KEY ("iIdTema", "iIdUsuario"),
    CONSTRAINT "FKPresupuestoUsuarioTema" FOREIGN KEY ("iIdTema")
        REFERENCES public."Tema" ("iIdTema") MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT,
    CONSTRAINT "FKPresupuestoUsuarioUsuario" FOREIGN KEY ("iIdUsuario")
        REFERENCES public."Usuario" ("iIdUsuario") MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."PresupuestoUsuario"
    OWNER to postgres;

COMMENT ON COLUMN public."PresupuestoUsuario"."iIdTema"
    IS 'Id a la tabla Tema para indicar el Tema al que el usuario sugiere se le destine el presupesto';

COMMENT ON COLUMN public."PresupuestoUsuario"."iIdUsuario"
    IS 'Usuario que hace la sugerencia de presupuesto';

COMMENT ON COLUMN public."PresupuestoUsuario"."dFecha"
    IS 'Fecha y hora de la sugerencia';

-- ----------------------------
-- Table structure ProyectoEstrategico
-- ----------------------------
CREATE TABLE public."ProyectoEstrategico"
(
    "iIdProyectoEstrategico" serial NOT NULL,
    "vProyectoEstrategico" character varying(100) NOT NULL,
    "iActivo" smallint NOT NULL,
    PRIMARY KEY ("iIdProyectoEstrategico")
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."ProyectoEstrategico"
    OWNER to postgres;

COMMENT ON COLUMN public."ProyectoEstrategico"."vProyectoEstrategico"
    IS 'Nombre del proyecto estratégico';

COMMENT ON COLUMN public."ProyectoEstrategico"."iActivo"
    IS '0=No, 1=Si';

-- ----------------------------
-- Table structure Pregunta
-- ----------------------------
CREATE TABLE public."Pregunta"
(
    "iIdPregunta" serial NOT NULL,
    "vPregunta" character varying(200) NOT NULL,
    "iIdTabla" integer NOT NULL DEFAULT 0,
    "vTabla" character varying(100) NOT NULL,
    "iTipo" smallint NOT NULL,
    "iActivo" smallint NOT NULL,
    PRIMARY KEY ("iIdPregunta")
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."Pregunta"
    OWNER to postgres;

COMMENT ON COLUMN public."Pregunta"."iIdTabla"
    IS 'Id de la tabla a la que esta vinculada la pregunta';

COMMENT ON COLUMN public."Pregunta"."vTabla"
    IS 'Nombre de la tabla a la que esta vinculada la pregunta';

COMMENT ON COLUMN public."Pregunta"."iTipo"
    IS 'Tipo de pregunta 1=Opción múltiple, 2=Cerrada, 3=Abierta';

COMMENT ON COLUMN public."Pregunta"."iActivo"
    IS '0=No, 1=Activo';


-- ----------------------------
-- Table structure Respuesta
-- ----------------------------
CREATE TABLE public."Respuesta"
(
    "iIdRespuesta" serial NOT NULL,
    "iIdPregunta" integer NOT NULL,
    "vRespuesta" character varying(150) NOT NULL,
    "iTipoElemento" smallint NOT NULL,
    "iActivo" smallint NOT NULL,
    PRIMARY KEY ("iIdRespuesta"),
    CONSTRAINT "RespuestaPregunta" FOREIGN KEY ("iIdPregunta")
        REFERENCES public."Pregunta" ("iIdPregunta") MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."Respuesta"
    OWNER to postgres;

COMMENT ON COLUMN public."Respuesta"."vRespuesta"
    IS 'Texto de la respuesta';

COMMENT ON COLUMN public."Respuesta"."iTipoElemento"
    IS 'Tipo de elemento HTML 1=RadioButton, 2=CheckBox, 3=CheckBox con text (R: otro__), 4=Text';

COMMENT ON COLUMN public."Respuesta"."iActivo"
    IS '0=No, 1=Si';

-- ----------------------------
-- Table structure UsuarioRespuesta
-- ----------------------------
CREATE TABLE public."UsuarioRespuesta"
(
    "iIdUsuario" integer NOT NULL,
    "iIdRespuesta" integer NOT NULL,
    "vRespuesta" character varying(150) NOT NULL,
    PRIMARY KEY ("iIdUsuario", "iIdRespuesta")
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."UsuarioRespuesta"
    OWNER to postgres;

COMMENT ON COLUMN public."UsuarioRespuesta"."vRespuesta"
    IS 'Valor de la respuesta, para los casos en los que son necesarios que el usuario  ingrese un texto ';

-- Creación de la llave froranea
ALTER TABLE public."UsuarioRespuesta"
    ADD CONSTRAINT "FKUsuarioRespuestaUsuario" FOREIGN KEY ("iIdUsuario")
    REFERENCES public."Usuario" ("iIdUsuario") MATCH SIMPLE
    ON UPDATE RESTRICT
    ON DELETE RESTRICT;

ALTER TABLE public."UsuarioRespuesta"
    ADD CONSTRAINT "FKUsuarioRespuestaRespuesta" FOREIGN KEY ("iIdRespuesta")
    REFERENCES public."Respuesta" ("iIdRespuesta") MATCH SIMPLE
    ON UPDATE RESTRICT
    ON DELETE RESTRICT;