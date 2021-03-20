<?php
session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
?>
<html>
<?php
   include("header.php");

?>
	<form  method="POST" action="pass.php" class="container" >
	<table class="table table-striped table-hover">

<tr><td> Enter Old Password</td><td>
	<input type="password" name="old" required="required"></td>
	<tr><td> Enter New Password</td><td>
	<input type="password" name="new" required="required"></td>
	<tr><td> Renter New Password</td><td>
	<input type="password" name="renew" required="required"></td>
</tr><td colspan="2">
	<center><input type="submit" name="submit" value="Set New Password" class="btn btn-primary"></center></td>
</tr>	
	</table>
	</form>
	<?php
  include("connect.php");
  if (isset($_POST['submit'])){
	  

	  $old = $_POST['old'];
	  $renew = $_POST['renew'];
	  $new = $_POST['new'];
	 $name= $_SESSION['user_name'];
	  $q="select * from players where u_name='$name'";
	  $r= mysql_query($q);
	  $s=mysql_fetch_array($r);
	  $pass = $s['password'];
	
    if($old!=$pass){
		echo "<div class='alert alert-danger'><center>Old Password is incorrect </center> </div>";
		
		
		include("footer.php");
		exit();
		
	}if($renew!=$new){
		
		echo "<div class='alert alert-danger'><center>New Password is not matched </center> </div>";
		
		
		
		exit();
		
	}
		 if($old==$pass){			
	$update_query="update players set password='$new'	where u_name='$name'";				
					 			   if(mysql_query($update_query)){
							echo "<div class='alert alert-success'><center>Password reset successfully </center> </div>"; }	   
  }
 
  
  }  
   

  

?>

	   <?php
   include("footer.php");

?>
	
	</body>
	</html>