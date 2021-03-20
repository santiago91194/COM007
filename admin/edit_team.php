<?php
session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
?>
<?php
include("connect.php");
$edit_id= @$_GET['edit'];
$query="select * from matches where id='$edit_id'";
  $run=mysql_query($query);

$f=mysql_fetch_array($run);
	     $edit_id1 =$f['id'];
		
	
		$_SESSION['team']=$f['team'];
		
		
		


?>
<?php
   include("header.php");

?>
 
		
<form method="POST" action="edit_team.php?edit_form=<?php echo $edit_id1; ?>" class="container">
<table  class="table table-striped table-hover">
<tr>
<th colspan="2" style="color:white; background-color:black; text-align:center;">Edit Team </th>



 <?php
		            if(isset($_GET['number'])){
						 $num= $_GET['number'];
						 
						 echo "<center><h3 class='alert alert-success'> $num  </h3></center>";
						
					}
		 ?>
         <form method="POST" action="edit_team.php" enctype="multipart/form-data" class="container">
		
		 <table  class="table table-striped table-hover">  
		 
		<tr><td> Select a Tournament:  </td><td>
            <select  
			  name="t_name" >
		  <option value="no">Select a Tournament  </option>
		  
<?php include("connect.php");
$rs=mysql_query("Select * from tournament order by id DESC");
	 while($row=mysql_fetch_array($rs))
{


echo "<option value='$row[1]'>$row[1]</option>";

}
?>
               </select>			</td></tr>
			   <tr><td> Select a Match:  </td><td>
            <select  
			  name="match_name" >
		  <option value="no">Select a Match  </option>
		  
<?php include("connect.php");
$rs=mysql_query("Select * from matches order by id DESC");
	 while($row=mysql_fetch_array($rs))
{


echo "<option value='$row[2]'>$row[2]</option>";

}
?>
               </select>			</td></tr>
			
	
			   <tr><td colspan="2">
          <center>  <input type="submit" name="update" value="Submit"  class="btn btn-primary"></center>  </td></tr>	
		 		
			
			
            
			
			
		 </table>
		 </form>
   </div><form method="POST" action="edit_team.php" enctype="multipart/form-data" class="container">
   <?php
        include("connect.php");
		if(isset($_POST['update'])){
	 $m_name=$_POST['match_name'];
	 $t_name=$_POST['t_name'];
	  $_SESSION['m_name']=$m_name;
	   $_SESSION['t_name']=$t_name;
	  
		$rs=mysql_query("select u_name from available where m_available='$_SESSION[m_name]' AND t_name='$_SESSION[t_name]' ")or die(mysql_error());
if(mysql_num_rows($rs)<1)
{
	echo "<h3>No Player Found Against Selected Match Or Tournament!!!   </h3>";
	exit;
}
		


  $query= mysql_query("select DISTINCT u_name, p_type from available where m_available LIKE '%$m_name%' AND t_name='$t_name' ") ;
			  
while( $row=mysql_fetch_array($query)){
?>
  <tr> 
	<td><table class="table table-hover ">
	<tr><td colspan="2"><center>
	<input type="checkbox" class="checkbox" name="sport[]" value="<?php echo $row['u_name'] ?>" ></center>
	</td><tr>
	<tr><td><b>Player Nick Name:</b></td>
	<td><?php echo $row['u_name'];?></td></tr>
	<tr><td> <b>Player Type:</b></td><td><?php echo $row['p_type'] ?></td> </tr>
  <tr><td><b>Availability:</b> </td><td><?php echo "Yes, I'm Available!"  ;?></td>
</tr></table></td>
</tr>
	
	  
	
	

<?php

 }
?>
			   <tr><td colspan="2">
			   
<center><input type="submit" name="ok" value="Submit" ></center></td></tr>
<?php  
		 
		}		if(isset($_POST['ok'])){
	
	$check=$_POST['sport'];
     $checkstr= implode(',', $check); 
	
	
	 
		  
		  $q=mysql_query("update matches set team='$checkstr' where m_name='$_SESSION[m_name]' AND t_id='$_SESSION[t_name]' ") or die(mysql_error());
		  echo "<center><h3>Team Updated Successfully!!!</h3></center>";
		  
		}

	
			  
		 
   


?></form>