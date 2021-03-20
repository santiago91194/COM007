<?php

session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
include("connect.php");
$delete_id= @$_GET['del'];
$delete_query="delete from matches where id='$delete_id'";
if(mysql_query($delete_query)){
$delete_queryy="delete from available where m_available='$_SESSION[match_name]'"or die(mysql_error());
$run=mysql_query($delete_queryy);
	echo "<script>window.open ('view_matches.php','_self');               </script>  ";
	
}







?>