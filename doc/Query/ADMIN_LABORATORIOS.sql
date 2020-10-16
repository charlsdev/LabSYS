SELECT
	laboratorio.cod_laboratorio,
	laboratorio.cedula,
	laboratorio.nombre_lab,
	laboratorio.direccion,
	laboratorista.apellidos,
	laboratorista.nombres 
FROM
	laboratorio
	INNER JOIN laboratorista ON laboratorio.cedula = laboratorista.cedula