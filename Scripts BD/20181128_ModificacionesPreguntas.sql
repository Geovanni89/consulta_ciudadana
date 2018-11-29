CREATE TABLE public."Encuesta"
(
    "iIdEncuesta" serial NOT NULL,
    "vTitulo" character varying(200) NOT NULL,
    "vTabla" character varying(100) NOT NULL,
    "iIdTabla" integer NOT NULL,
    "iActivo" smallint NOT NULL DEFAULT 0,
    PRIMARY KEY ("iIdEncuesta")
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."Encuesta"
    OWNER to postgres;

ALTER TABLE public."Pregunta" DROP COLUMN "iIdTabla";

ALTER TABLE public."Pregunta" DROP COLUMN "vTabla";

ALTER TABLE public."Pregunta"
    ADD COLUMN "iIdEncuesta" integer NOT NULL;
ALTER TABLE public."Pregunta"
    ADD CONSTRAINT "FKPreguntaEncuesta" FOREIGN KEY ("iIdEncuesta")
    REFERENCES public."Encuesta" ("iIdEncuesta") MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;

ALTER TABLE public."Pregunta"
    ADD COLUMN "iOrden" integer NOT NULL DEFAULT 1;

COMMENT ON COLUMN public."Pregunta"."iOrden"
    IS 'Indica el orden en que muestran las preguntas';

ALTER TABLE public."Respuesta"
    ADD COLUMN "iOrden" integer NOT NULL DEFAULT 1;

ALTER TABLE public."UsuarioRespuesta"
    ALTER COLUMN "vRespuesta" TYPE character varying (150) COLLATE pg_catalog."default";
ALTER TABLE public."UsuarioRespuesta"
    ALTER COLUMN "vRespuesta" DROP NOT NULL;