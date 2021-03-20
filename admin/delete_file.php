<?php

session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
include("connect.php");
$delete_id= @$_GET['del'];
$delete_query="delete from tournament where id='$delete_id'";
if(mysql_query($delete_query)){
$delete_queryy="delete from matches where t_id='$_SESSION[tournament_name]'"or die(mysql_error());
$run=mysql_query($delete_queryy);
	echo "<script>window.open ('view_file.php','_self');               </script>  ";
	
}







?>