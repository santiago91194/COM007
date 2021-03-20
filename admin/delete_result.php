<?php

session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
include("connect.php");
$delete_id= @$_GET['del'];
$delete_query="delete from result where id='$delete_id'";
if(mysql_query($delete_query)){

	echo "<script>window.open ('view_result.php','_self');               </script>  ";
	
}







?>