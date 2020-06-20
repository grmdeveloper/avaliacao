<?php


//NEED START SESSION BEFORE USE SOME METHOD OFF THIS CLASS
class Auth{
	public function isValid($password,$verify){

		if($password == $verify){
			$_SESSION['auth']=true;
			return header('location:dashboard.php');
		}
		return header('refresh');
	}

	public function isLogged(){

		if(isset($_SESSION['auth']))
			return true;
		else 
			return false;
	}

	public function logOut(){
		unset($_SESSION['auth']);
		header('refresh');
	}
}