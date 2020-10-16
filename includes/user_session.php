<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

	public function setCurrentPriv($priv){
        $_SESSION['priv'] = $priv;
    }

    public function getCurrentPriv(){
        return $_SESSION['priv'];
    }

    public function setCurrentEsta($est){
        $_SESSION['est'] = $est;
    }

    public function getCurrentEsta(){
        return $_SESSION['est'];
    }
	
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>