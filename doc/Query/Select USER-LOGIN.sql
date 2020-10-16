SELECT
	`user`.cedula,
	`user`.apellidos,
	`user`.nombres,
	`user`.edad,
	`user`.direccion,
	`user`.genero,
	`user`.telefono,
	`user`.email,
	`user`.codigo,
	login.privilegio,
	login.estado 
FROM
	`user`
	INNER JOIN login ON `user`.cedula = login.username