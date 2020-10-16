SELECT
	laboratorio.nombre_lab,
	laboratorio.direccion,
	laboratorista.cedula,
	laboratorista.apellidos,
	laboratorista.nombres,
	laboratorista.email,
	laboratorista.telefono 
FROM
	laboratorio
	INNER JOIN laboratorista ON laboratorio.cedula = laboratorista.cedula