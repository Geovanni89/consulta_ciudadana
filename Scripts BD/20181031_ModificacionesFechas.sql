/*
	Se corrije el tipo de dato para las columnas que guardan las fechas de registro 'aaaa-mm-dd hh:mm:ss'
	Anteriomente el tipo de dato era timezone ahora timestamp
*/

-- ----------------------------
-- Tabla usuario
-- ----------------------------

ALTER TABLE public."Usuario" DROP COLUMN "dFechaRegistro";

ALTER TABLE public."Usuario"
	ADD COLUMN "dFechaRegistro" timestamp without time zone;

-- ----------------------------
-- Tabla Comentario
-- ----------------------------
ALTER TABLE public."Comentario" DROP COLUMN "dFecha";

ALTER TABLE public."Comentario"
	ADD COLUMN "dFecha" timestamp without time zone;

-- ----------------------------
-- Tabla ComentarioLike
-- ----------------------------
ALTER TABLE public."ComentarioLike" DROP COLUMN "dFecha";

ALTER TABLE public."ComentarioLike"
	ADD COLUMN "dFecha" timestamp without time zone;

-- ----------------------------
-- Tabla Propuesta
-- ----------------------------
ALTER TABLE public."Propuesta"
	ADD COLUMN "dFecha" timestamp without time zone;

-- ----------------------------
-- Tabla PropuestaAdjunto
-- ----------------------------
ALTER TABLE public."PropuestaAdjunto" DROP COLUMN "dFecha";

ALTER TABLE public."PropuestaAdjunto"
	ADD COLUMN "dFecha" timestamp without time zone;

-- ----------------------------
-- Tabla PropuestaLike
-- ----------------------------
ALTER TABLE public."PropuestaLike" DROP COLUMN "dFecha";

ALTER TABLE public."PropuestaLike"
	ADD COLUMN "dFecha" timestamp without time zone;

-- ----------------------------
-- Tabla VotoPropuesta
-- ----------------------------
ALTER TABLE public."VotoPropuesta" DROP COLUMN "dFecha";

ALTER TABLE public."VotoPropuesta"
	ADD COLUMN "dFecha" timestamp without time zone;
