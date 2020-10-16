SELECT
resultado_examen.id_paciente,
parametros_reactivo.tipo,
resultado_examen.cod_ensayo,
parametros_reactivo.ensayo,
parametros_reactivo.ref_menor,
parametros_reactivo.ref_mayor,
resultado_examen.resultado,
resultado_examen.observaciones
FROM
resultado_examen
INNER JOIN parametros_reactivo ON resultado_examen.cod_ensayo = parametros_reactivo.cod_ensayo
WHERE
resultado_examen.id_paciente = 'PAC0001'
ORDER BY
parametros_reactivo.tipo DESC