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
  
  <h2 class="login-header">Sign Up</h2>

  <form class="login-container" method="POST" action="signup.php">
    <p><input type="text" name="first_name" placeholder="First name"></p>
	<p><input type="text" name="last_name" placeholder="Last name"></p>
	<p><input type="text" name="user_name" placeholder="User name"></p>
	<p><input type="email" name="email" placeholder="Email"></p>
	<p><input type="text" name="p_type" placeholder="Player type"></p>
    <p><input type="password" name="password" placeholder="Password"></p>
    <p> <input type="submit" name="update" value="Sign Up " ></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<?php
include("connect.php");
			
	     if(isset($_POST['update'])){
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$user_name=$_POST['user_name'];
	$email=$_POST['email'];
	$p_type=$_POST['p_type'];
	$user_psw=$_POST['password'];
	
	$rs=mysql_query("select * from players where u_name='$user_name'");
    if (mysql_num_rows($rs)>0)
{
	echo "<h3><center> User name already exists!!!</center> </h3>";
	exit;
}	$ra=mysql_query("select * from players where email='$email'");
    if (mysql_num_rows($ra)>0)
{
	echo "<h3> Email already exists!!! </h3>";
	exit;
}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo "<h3> Incorrect Email Format!!! </h3>";
	exit;
}	
 $t="INSERT INTO players(f_name,l_name,u_name,email,password,p_type,u_type)
	 VALUES('$first_name','$last_name','$user_name','$email','$user_psw','$p_type','player')"or die(mysql_error());
	if( $run=mysql_query($t)){
		echo "<script>window.open('user_login.php','_self')</script>";
	} else { echo "error"; }
}
?>
          
    
    
    
  </body>
</html>
