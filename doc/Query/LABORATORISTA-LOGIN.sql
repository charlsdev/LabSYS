SELECT
	laboratorista.cedula,
	laboratorista.apellidos,
	laboratorista.nombres,
	laboratorista.edad,
	laboratorista.direccion,
	laboratorista.genero,
	laboratorista.email,
	laboratorista.telefono,
	login.privilegio,
	login.estado
FROM
	login
	INNER JOIN laboratorista ON login.username = laboratorista.cedula