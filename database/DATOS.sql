-- Insertar semestres
INSERT INTO semestres (semestre, fecInicio, fecFinal, estado, created_at, updated_at)
VALUES 
('2025-I', '2025-03-01', '2025-07-15', 1, NOW(), NOW()),
('2025-II', '2025-08-01', '2025-12-15', 1, NOW(), NOW());

-- Insertar cursos
INSERT INTO cursos (codCursos, nomCursos, especialidad, sisEvaluacion, horTeoria, horPractica, horLaboratorio, creditos, preRequisitos, verCurricular, created_at, updated_at)
VALUES 
('CURS001', 'Matemática I', '01', 'T', 3, 2, 0, 4, NULL, 1, NOW(), NOW()),
('CURS002', 'Programación Básica', '01', 'T', 2, 2, 2, 5, NULL, 1, NOW(), NOW()),
('CURS003', 'Comunicación', '01', 'T', 2, 0, 0, 2, NULL, 1, NOW(), NOW()),
('CURS004', 'Estadística', '01', 'T', 2, 2, 0, 4, NULL, 1, NOW(), NOW()),
('CURS005', 'Algoritmos', '01', 'T', 2, 3, 1, 5, 'CURS002', 1, NOW(), NOW());



-- Asignar cursos a docentes
INSERT INTO curso_docente (curso_id, docente_id, seccion, created_at, updated_at)
VALUES
  (1, 1, 'A', NOW(), NOW()),
  (2, 2, 'A', NOW(), NOW()),
  (3, 3, 'A', NOW(), NOW()),
  (4, 1, 'B', NOW(), NOW()),
  (5, 2, 'B', NOW(), NOW());

-- Insertar aulas
INSERT INTO aulas (codAula, nombreAula, capacidad, tipSilla, tipEntrada, taburete, tipPizarra, proyector, pcAlumno, pcDocente, canPuertas, equVentilacion, observacion, created_at, updated_at)
VALUES 
('AULA01', 'Aula A-101', 40, 'Individual', 'Frontal', false, 'Blanca', true, 10, 1, 1, NULL, NULL, NOW(), NOW()),
('AULA02', 'Aula B-202', 35, 'Ergonómica', 'Lateral', false, 'Acrílica', false, 15, 1, 2, NULL, NULL, NOW(), NOW());

-- Insertar horarios
INSERT INTO horarios (codHorario, curso_docente_id, aula_id, dia, hora, tipo_sesion, tope, estado, created_at, updated_at)
VALUES
('H001', 6, 1, 'LU', '08:00', 'T', 40, true, NOW(), NOW()),
('H002', 7, 1, 'MA', '10:00', 'L', 40, true, NOW(), NOW()),
('H003', 8, 2, 'MI', '14:00', 'P', 35, true, NOW(), NOW()),
('H004', 9, 2, 'JU', '16:00', 'T', 35, true, NOW(), NOW()),
('H005', 10, 1, 'VI', '09:00', 'L', 40, true, NOW(), NOW());



-- Insertar matrículas (para semestres)
INSERT INTO matriculas (semestre_id, fec_ingreso, ciclo, created_at, updated_at)
VALUES 
(1, '2025-03-05 09:00:00', 'I', NOW(), NOW()),
(2, '2025-08-10 10:00:00', 'II', NOW(), NOW());


-- Matricular alumnos
INSERT INTO matricula_alumnos (alumno_id, matricula_id, created_at, updated_at)
VALUES 
(1, 1, NOW(), NOW()),
(2, 1, NOW(), NOW()), 
(3, 1, NOW(), NOW()),
(4, 2, NOW(), NOW()),
(5, 2, NOW(), NOW());

-- Asignar cursos (horarios) a alumnos mediante matrícula_cursos
-- Alumno 1 y 2 en horarios 1, 2, 3
-- Alumno 3 en horarios 2, 3, 4
-- Alumno 4 y 5 en horarios 3, 4, 5


INSERT INTO matricula_cursos (matricula_id, horario_id, created_at, updated_at)
VALUES
(1, 6, NOW(), NOW()),
(1, 7, NOW(), NOW()),
(1, 8, NOW(), NOW()),
(1, 7, NOW(), NOW()),
(1, 8, NOW(), NOW()),
(1, 9, NOW(), NOW()),
(2, 8, NOW(), NOW()),
(2, 9, NOW(), NOW()),
(2, 10, NOW(), NOW()),
(2, 8, NOW(), NOW()),
(2, 9, NOW(), NOW()),
(2, 10, NOW(), NOW());


-- Insertar direcciones
INSERT INTO direcciones (alumno_id, direccion, referencia, distrito, provincia, departamento, created_at, updated_at)
VALUES
(1, 'Av. Lima 123', 'Frente al parque principal', 'Lima', 'Lima', 'Lima', NOW(), NOW()),
(2, 'Jr. Arequipa 456', 'Cerca al hospital central', 'Miraflores', 'Lima', 'Lima', NOW(), NOW()),
(3, 'Calle Amazonas 789', 'Al costado de la iglesia', 'San Miguel', 'Lima', 'Lima', NOW(), NOW()),
(4, 'Av. Universitaria 321', 'Frente a la UNI', 'Los Olivos', 'Lima', 'Lima', NOW(), NOW()),
(5, 'Pasaje Los Pinos 654', 'A espaldas del mercado', 'San Juan de Lurigancho', 'Lima', 'Lima', NOW(), NOW());

-- Insertar info familiar
INSERT INTO info_familiars (alumno_id, nomPadre, ocuPadre, gradoPadre, telPadre, nomMadre, ocuMadre, gradoMadre, telMadre, created_at, updated_at)
VALUES
(1, 'Carlos Ramos', 'Comerciante', 'Secundaria completa', '987654321', 'Ana López', 'Ama de casa', 'Primaria incompleta', '987654322', NOW(), NOW()),
(2, 'Luis Pérez', 'Ingeniero', 'Universitaria completa', '987654323', 'María Torres', 'Administradora', 'Universitaria completa', '987654324', NOW(), NOW()),
(3, 'Miguel Quispe', 'Chofer', 'Secundaria completa', '987654325', 'Carmen Rojas', 'Costurera', 'Secundaria incompleta', '987654326', NOW(), NOW()),
(4, 'Alberto Díaz', 'Agricultor', 'Primaria completa', '987654327', 'Rosa Salazar', 'Vendedora ambulante', 'Primaria completa', '987654328', NOW(), NOW()),
(5, 'José García', 'Contador', 'Universitaria completa', '987654329', 'Elena Chávez', 'Secretaria', 'Tecnico', '987654330', NOW(), NOW());

-- Insertar info profesional
INSERT INTO info_profesionals (alumno_id, centroTrabajo, direccionCentroTrabajo, telCentroTrabajo, cargo, created_at, updated_at)
VALUES
(1, 'Ninguno', NULL, NULL, NULL, NOW(), NOW()),
(2, 'TechSolutions SAC', 'Av. Grau 200', '999111222', 'Soporte Técnico', NOW(), NOW()),
(3, 'DigitalNet', 'Calle Real 150', '999333444', 'Asistente TI', NOW(), NOW()),
(4, 'Grupo Inversiones Perú', 'Av. Venezuela 880', '999555666', 'Recepcionista', NOW(), NOW()),
(5, 'Consultores S.A.', 'Jr. Independencia 300', '999777888', 'Analista de datos', NOW(), NOW());


