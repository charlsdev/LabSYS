SELECT
informacion_examen.id_paciente,
informacion_examen.cedula_pac,
informacion_examen.cod_laboratorio,
informacion_examen.medico_ref,
informacion_examen.fech_examen,
informacion_examen.cedula_lab,
laboratorio.nombre_lab,
laboratorio.direccion,
laboratorista.apellidos,
laboratorista.nombres,
informacion_examen.observaciones
FROM
informacion_examen
INNER JOIN laboratorio ON informacion_examen.cod_laboratorio = laboratorio.cod_laboratorio
INNER JOIN laboratorista ON informacion_examen.cedula_lab = laboratorista.cedula
WHERE
informacion_examen.cedula_pac = '1316650512'
