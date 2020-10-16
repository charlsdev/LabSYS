SELECT
	resultado_examen.id_paciente,
	resultado_examen.resultado,
	resultado_examen.observaciones,
	parametros_reactivo.tipo,
	parametros_reactivo.ensayo 
FROM
	parametros_reactivo
	INNER JOIN resultado_examen ON resultado_examen.cod_ensayo = parametros_reactivo.cod_ensayo