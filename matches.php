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
<form method="POST" action="matches.php" enctype="multipart/form-data" class="container">
<table class="table table-striped table-hover">
<tr>
<th colspan="2" style="color:white; background-color:black; text-align:center;">Select Matches To Show Your avalibily </th>
</tr>
<?php
include("connect.php");

		if(isset($_POST['update'])){
 // $t_type= $_POST['t_type'];
		
	
	     $t_id=$_POST['subid'];
		 $_SESSION['t_name']=$t_id;
		 
		
		  $query= mysql_query("select * from matches where t_id='$t_id'  ") ;
		 
while( $row=mysql_fetch_array($query)){
?>
  
	<tr> 
	<td><table class="table table-hover ">
	<tr><td colspan="2"><center><input type="checkbox" class="checkbox"name="sport[]" value="<?php echo $row['m_name'] ?>" ></center>
	</td><tr>
	<tr><td><b>Match Name:</b></td>
	<td><?php echo  $row['m_name'] ?></td></tr>
	<tr><td> <b>Match Date:</b></td><td><?php echo $row['date'] ?></td> </tr>
  <tr><td><b>Match Time:</b> </td><td><?php echo $row['time']  ;?></td>
</tr></table></td>
</tr>
<?php

		 }
		  

			  
	  ?>
		<tr><td colspan="2">
          <center>  <input type="submit" name="ok" value="Submit "  class="btn btn-primary"></center>  </td></tr>
		<?php
		
		}

?>	


 </table>
   
      <?php
	  if(isset($_POST['ok'])){
	
	 $check=$_POST['sport'];
     $checkstr= implode(',', $check); 
	$query=mysql_query("select * from players where u_name='$_SESSION[user_name]'");
	$row=mysql_fetch_array($query);
	 $p_type=$row['p_type'];
		  $rs=mysql_query("select * from available where m_available='$checkstr' AND u_name='$_SESSION[user_name]'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1><center><h3>You have already showed availibily for this match </h3></center></div>";
	exit;
}
		  $q=mysql_query("insert into available (u_name,p_type,m_available,t_name)
		  VALUES ('$_SESSION[user_name]','$p_type','$checkstr','$_SESSION[t_name]')");
		  echo "<center><h3>Request Submitted Successfully</h3></center>"; 
		}
 
   
   ?>   
   </form>
   
<?php   include("footer.php"); ?>
		
</body>
</html>