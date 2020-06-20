<?php


class Auth{


	public function isValid($password,$verify){
		if($password == $verify){
			return true;
		}
		return false;
	}

	public function logOut(){
		unset($_SESSION['auth']);
	}
}