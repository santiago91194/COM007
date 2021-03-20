<?php
session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
?>

<?php
   include("header.php");

?>
</center> <br>

       <div><center>
	      <h3>  Welcome <b><?php echo $_SESSION['user_name']; ?></b> To Sports Management System </h3>
	   
</center></div> 


</body>
</html>