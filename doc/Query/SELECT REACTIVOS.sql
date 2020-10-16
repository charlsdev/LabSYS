SELECT
	laboratorio.cedula,
	parametros_reactivo.cod_ensayo,
	parametros_reactivo.tipo,
	parametros_reactivo.ensayo,
	parametros_reactivo.ref_menor,
	laboratorio.nombre_lab,
	parametros_reactivo.ref_mayor,
	parametros_reactivo.referencia 
FROM
	parametros_reactivo
	INNER JOIN laboratorio ON parametros_reactivo.cod_laboratorio = laboratorio.cod_laboratorio 
WHERE
	laboratorio.cedula = '0951332774'