<?php
                SESSION_start();
              ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>File System</title>
    
    
    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" method="POST" action="user_login.php">
    <p><input type="text" name="user_name" placeholder="User name"></p>
    <p><input type="password" name="password" placeholder="Password"></p>
    <p> <input type="submit" name="update" value="Log in" ></p>
  </form><br>
  <a href="signup.php" style="color:white;"> Register as new user </a>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<?php
include("connect.php");
			
	     if(isset($_POST['update'])){
	$user_name=$_POST['user_name'];
	$user_psw=$_POST['password'];
	
	$s="select * from players where
	u_name='$user_name' AND password='$user_psw'";
	$q=mysql_query($s) ;
	$row= mysql_fetch_array($q);
		
	if(mysql_num_rows($q)>0)
	{
		$_SESSION['login']= 1;
		$_SESSION['user_name']=$user_name;
		$u_type= $row['u_type'];
		if($u_type=='admin'){
			echo "<script>window.open('admin/home.php','_self')</script>";
		}
		if($u_type=='player'){
		echo "<script>window.open('home.php','_self')</script>";
	}
		else{
			echo "<script> alert('Username or Password is incorrect')</script>";
		}
		
		 }}
?>
       
    
    
  </body>
</html>
