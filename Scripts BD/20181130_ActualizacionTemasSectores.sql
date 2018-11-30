/*
Actualización de nombres de sectores y temas de acuerdo a la última versión de la matriz de ejes


Date: 2018-11-30 11:35:33
*/
-- ----------------------------
-- Sector
-- ----------------------------

UPDATE "Sector" SET "vSector" = 'Economía' WHERE "iIdSector" =  1;
UPDATE "Sector" SET "vSector" = 'Sociales' WHERE "iIdSector" =  2;
UPDATE "Sector" SET "vSector" = 'Culturales' WHERE "iIdSector" = 3;
UPDATE "Sector" SET "vSector" = 'Ambientales' WHERE "iIdSector" = 4;
UPDATE "Sector" SET "vSector" = 'Transversal' WHERE "iIdSector" = 5;
UPDATE "Sector" SET "iActivo" = 0 WHERE "iIdSector" =  6;

-- ----------------------------
-- Tema
-- ----------------------------
UPDATE "Tema" SET "vTema" = 'Desarrollo comercial y fortalecimiento de la demanda interna' WHERE "iIdTema" = 1;
UPDATE "Tema" SET "vTema" = 'Competitividad e Inversión Extranjeta' WHERE "iIdTema" = 2;
UPDATE "Tema" SET "vTema" = 'Capital humano generador de desarrollo y trabajo decente' WHERE "iIdTema" = 3;
UPDATE "Tema" SET "vTema" = 'Desarrollo agrícola' WHERE "iIdTema" = 4;
UPDATE "Tema" SET "vTema" = 'Desarrollo pesquero' WHERE "iIdTema" = 5;
UPDATE "Tema" SET "vTema" = 'Impulso al turismo' WHERE "iIdTema" = 6;
UPDATE "Tema" SET "vTema" = 'Industrial' WHERE "iIdTema" = 7;
UPDATE "Tema" SET "vTema" = 'Fomento empresarial y al emprendedurismo' WHERE "iIdTema" = 8;
UPDATE "Tema" SET "vTema" = 'Educación integral de calidad'  WHERE "iIdTema" = 9;
UPDATE "Tema" SET "vTema" = 'Salud y bienestar' WHERE "iIdTema" = 10;
UPDATE "Tema" SET "vTema" = 'Inclusión social y atención a grupos vulnerables' WHERE "iIdTema" = 11;
UPDATE "Tema" SET "vTema" = 'Hambre cero' WHERE "iIdTema" = 12;
UPDATE "Tema" SET "vTema" = 'Seguridad social' WHERE "iIdTema" = 13;
UPDATE "Tema" SET "vTema" = 'Acceso a la vivienda' WHERE "iIdTema" = 14;
UPDATE "Tema" SET "vTema" = 'Pueblos indígenas' WHERE "iIdTema" = 15;
UPDATE "Tema" SET "vTema" = 'Acceso universal a la cultura' WHERE "iIdTema" = 16;
UPDATE "Tema" SET "vTema" = 'Fomento al deporte' WHERE "iIdTema" = 17;
UPDATE "Tema" SET "vTema" = 'Educación artística y cultural' WHERE "iIdTema" = 18;
UPDATE "Tema" SET "vTema" = 'Cultura tradicional' WHERE "iIdTema" = 19;
UPDATE "Tema" SET "vTema" = 'Bellas artes' WHERE "iIdTema" = 20;
UPDATE "Tema" SET "vTema" = 'Patrimonio histórico' WHERE "iIdTema" = 21;
UPDATE "Tema" SET "vTema" = 'Agua limpia y saneamiento' WHERE "iIdTema" = 22;
UPDATE "Tema" SET "vTema" = 'Energía asequible y no contaminante' WHERE "iIdTema" = 23;
UPDATE "Tema" SET "vTema" = 'Vida submarina y ecosistemas terrestres' WHERE "iIdTema" = 24;
UPDATE "Tema" SET "vTema" = 'Acción por el clima' WHERE "iIdTema" = 25;
UPDATE "Tema" SET "vTema" = 'Derecho a la ciudad' WHERE "iIdTema" = 26;
UPDATE "Tema" SET "vTema" = 'Conservación de recursos naturales' WHERE "iIdTema" = 27;
UPDATE "Tema" SET "vTema" = 'Ciudades y comunidades sostenibles' WHERE "iIdTema" = 28;

INSERT INTO "Tema" VALUES (29, 'Manejo integral de residuos', 4, 1);
INSERT INTO "Tema" VALUES (30, 'Movilidad sustentable', 4, 1);
INSERT INTO "Tema" VALUES (31, 'Igualdad de género', 5, 1);
INSERT INTO "Tema" VALUES (32, 'Innovación, ciencia y tecnología', 5, 1);
INSERT INTO "Tema" VALUES (33, 'Paz, justicia e instituciones sólidas', 5, 1);
INSERT INTO "Tema" VALUES (34, 'Gobierno austero, abierto, innovador y eficiente', 5, 1);
INSERT INTO "Tema" VALUES (35, 'Infraestructura y proyectos estratégicos', 5, 1);