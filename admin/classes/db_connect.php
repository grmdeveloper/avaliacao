<?php 
public class Db_connect {
	
	public $con;

	function __construct($host,$user,$pass,$bd){
		$this->$con= new mysqli($host,$user,$pass,$bd);
	}

}
?>