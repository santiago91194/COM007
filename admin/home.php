<?php
session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
?>

<?php
   include("header.php");

?>
<center> <h3> Welcome, Respected Admin! </h3>
</center></div> 

   <?php
   include("footer.php");

?>
</body>
</html>