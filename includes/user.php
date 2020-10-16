<?php
	include 'db.php';

	class User extends DB {
		private $nombre;
		private $apellidos;
		private $cedula;
		private $privilegio;
		private $estado;

		//Si existe mi usuario en la BD
		public function userExists($user, $pass, $priv, $est){
			$md5pass = md5($pass);
			$query = $this->connect()->prepare('SELECT * FROM login WHERE username = :user AND password = :pass AND privilegio = :priv AND estado = :est');
			$query->execute(['user' => $user, 'pass' => $md5pass, 'priv' => $priv, 'est' => $est]);

			if($query->rowCount()){
					return true;
			}else{
					return false;
			}
		}

		public function setUser($user, $priv) {
			
			if(strcmp($priv, 'Laboratorista') == 0)
			{
				$query = $this->connect()->prepare('SELECT * FROM laboratorista WHERE cedula = :user');
			$query->execute(['user' => $user]);
				$query1 = $this->connect()->prepare('SELECT * FROM login WHERE privilegio = :priv');
				$query1->execute(['priv' => $priv]);
				
				foreach ($query as $currentUser) {
					//Extraigo el dato de mi columna
					$this->nombre = $currentUser['nombres'];
					$this->apellidos = $currentUser['apellidos'];
					$this->cedula = $currentUser['cedula'];
				}
				
				foreach ($query1 as $currentPriv) {
					//Extraigo el dato de mi columna
					$this->privilegio = $currentPriv['privilegio'];
					$this->estado = $currentPriv['estado'];
				}
			}
			else
			{
				if(strcmp($priv, 'Administrador') == 0)
				{
					$query = $this->connect()->prepare('SELECT * FROM administrador WHERE cedula = :user');
					$query->execute(['user' => $user]);

					$query1 = $this->connect()->prepare('SELECT * FROM login WHERE privilegio = :priv');
					$query1->execute(['priv' => $priv]);

					foreach ($query as $currentUser) {
						//Extraigo el dato de mi columna
						$this->nombre = $currentUser['nombres'];
						$this->apellidos = $currentUser['apellidos'];
						$this->cedula = $currentUser['cedula'];
					}

					foreach ($query1 as $currentPriv) {
						//Extraigo el dato de mi columna
						$this->privilegio = $currentPriv['privilegio'];
						$this->estado = $currentPriv['estado'];
					}
				}
				else
				{
					if(strcmp($priv, 'Usuario') == 0)
					{
						$query = $this->connect()->prepare('SELECT * FROM user WHERE cedula = :user');
						$query->execute(['user' => $user]);
						$query1 = $this->connect()->prepare('SELECT * FROM login WHERE privilegio = :priv');
						$query1->execute(['priv' => $priv]);

						foreach ($query as $currentUser) {
							//Extraigo el dato de mi columna
							$this->nombre = $currentUser['nombres'];
							$this->apellidos = $currentUser['apellidos'];
							$this->cedula = $currentUser['cedula'];
						}

						foreach ($query1 as $currentPriv) {
							//Extraigo el dato de mi columna
							$this->privilegio = $currentPriv['privilegio'];
							$this->estado = $currentPriv['estado'];
						}
					}
				}
			}
			
		}

		public function getNombre(){
			return $this->nombre . " " . $this->apellidos;
		}
		
		public function getCedula(){
			return $this->cedula;
		}
		
		public function getPrivilegio(){
			return $this->privilegio;
		}

		public function getEstado(){
			return $this->estado;
		}
			
	}
?>