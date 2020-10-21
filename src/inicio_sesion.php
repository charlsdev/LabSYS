<?php
	include_once '../includes/user.php';
	include_once '../includes/user_session.php';

	$userSession = new UserSession();
	$user = new User();

	if(isset($_SESSION['user']) && isset($_SESSION['priv'])){

		//echo "hay sesion";
		$user->setUser($userSession->getCurrentUser(), $userSession->getCurrentPriv());
		if ($userSession->getCurrentPriv() == 'Laboratorista')
		{
			include_once 'laboratorista.php';
		}
		else
		{
			if($userSession->getCurrentPriv() == 'Administrador')
			{
				include_once 'admin.php';
			}
			else
			{
				if($userSession->getCurrentPriv() == 'Usuario')
				{
					include_once 'user.php';
				}
			}
		}


	}else if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['privilegio'])){

		$userForm = $_POST['username'];
		$passForm = $_POST['password'];
		$privForm = $_POST['privilegio'];
		$estForm = 'Enabled';

		//$user = new User();
		if($user->userExists($userForm, $passForm, $privForm, $estForm)) {
			
			//echo "Existe el usuario";
			$userSession->setCurrentUser($userForm);
			$userSession->setCurrentPriv($privForm);
			// $userSession->setCurrentPriv($estForm);
			
			//Muestra el resultado de las funciones del archivo user.php
			$user->setUser($userForm, $privForm);
			if ($privForm == 'Laboratorista' )
			{
				include_once 'laboratorista.php';
			}
			else
			{
				if ($privForm == 'Administrador')
				{
					include_once 'admin.php';
				}
				else
				{
					if ($privForm == 'Usuario')
					{
						include_once 'user.php';
					}
				}
			}
			/*include_once 'vistas/home.php';*/
		}else{
			// echo '<script type="text/javascript">
         //          alert("Datos insertados incorrectos");
         //       </script>';

         $errorLogin = "User y/o password incorrecto";
         include_once 'login.php';

			// echo '<script type="text/javascript">
         //          swal({
         //             title: "Good job!",
         //             text: "You clicked the button!",
         //             icon: "success",
         //             button: "Aww yiss!",
         //          });
         //       </script>';

			echo "<script type='text/javascript'>
                  Swal.fire(
                     'DATOS INCORRECTOS',
                     'User y/o password incorrectos!',
                     'warning'
                  )
               </script>";
			// echo "No existe el usuario";
		}
	}else{
		//echo "login";
		include_once 'login.php';
	}
	
?>