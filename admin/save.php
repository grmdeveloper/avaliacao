<?php 
require"../connection.php";
header("Content-type:text/html; charset=utf-8");

$id=$_POST['id'];
$nome=trim($_POST['unidade']);
$titulo=trim($_POST['titulo']);
$motd=trim($_POST['motd']);
$date =date('Y-m-d G:i:s');

$con->query("UPDATE configs SET nome='$nome',titulo='$titulo',motd='$motd',updated_at='$date' WHERE id='$id' ");
$con->close();

header('location:index.php');

 ?>