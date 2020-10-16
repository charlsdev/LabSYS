SELECT
	administrador.cedula,
	administrador.apellidos,
	administrador.nombres,
	administrador.edad,
	administrador.direccion,
	administrador.genero,
	administrador.telefono,
	administrador.email,
	administrador.codigo,
	login.privilegio,
	login.estado 
FROM
	login
	INNER JOIN administrador ON administrador.cedula = login.username