ALTER TABLE "Comentario" DISABLE TRIGGER ALL;
ALTER TABLE "ComentarioLike" DISABLE TRIGGER ALL;
ALTER TABLE "PresupuestoUsuario" DISABLE TRIGGER ALL;
ALTER TABLE "Propuesta" DISABLE TRIGGER ALL;
ALTER TABLE "PropuestaAdjunto" DISABLE TRIGGER ALL;
ALTER TABLE "PresupuestoUsuario" DISABLE TRIGGER ALL;
ALTER TABLE "VotoPropuesta" DISABLE TRIGGER ALL;
ALTER TABLE "PropuestaOrigen" DISABLE TRIGGER ALL;

TRUNCATE "ComentarioLike","Comentario","PresupuestoUsuario","PropuestaAdjunto","PresupuestoUsuario","VotoPropuesta","PropuestaLike","PropuestaOrigen","Propuesta";

ALTER TABLE "Comentario" ENABLE TRIGGER ALL;
ALTER TABLE "ComentarioLike" ENABLE TRIGGER ALL;
ALTER TABLE "PresupuestoUsuario" ENABLE TRIGGER ALL;
ALTER TABLE "Propuesta" ENABLE TRIGGER ALL;
ALTER TABLE "PropuestaAdjunto" ENABLE TRIGGER ALL;
ALTER TABLE "PresupuestoUsuario" ENABLE TRIGGER ALL;
ALTER TABLE "VotoPropuesta" ENABLE TRIGGER ALL;
ALTER TABLE "PropuestaOrigen" ENABLE TRIGGER ALL;