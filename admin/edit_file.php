<?php
session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
?>
<?php
include("connect.php");
$edit_id= @$_GET['edit'];
$query="select * from tournament where id='$edit_id'";
  $run=mysql_query($query);

 while($f=mysql_fetch_array($run)){
	     $edit_id1 =$f['id'];
		
		$t_name=$f['t_name'];
		$d_from=$f['d_from'];
		$d_to=$f['d_to'];
		
		


?>
<?php
   include("header.php");

?>
 
		
<form method="POST" action="edit_file.php?edit_form=<?php echo $edit_id1; ?>" class="container">
<table  class="table table-striped table-hover">
<tr>
<th colspan="2" style="color:white; background-color:black; text-align:center;">Edit Tornament </th>

</tr>
<tr>
<td> Tornament name</td> <td> 
<input type="text" name="t_name"  value="<?php echo $t_name; ?>"  >
</td>
</tr>

<tr>
<td> From</td> <td> 
<input type="date" name="d_from"  value="<?php echo $d_from; ?>" required="required" >
</td>
</tr>
<tr>
<td> To</td> <td> 
<input type="date" name="d_to"  value="<?php echo $d_to; ?>" required="required" >
</td>
</tr>
<tr><td colspan="2">
<center><br>
<input type="submit" name="update" value="Update" class="btn btn-primary" />
</center>
</td></tr>


<?php
}
?>
</table>
</form>
</html>
</body>
<?php
           if(isset($_POST['update'])){
			  $update_id=$_GET['edit_form']; 
			   $tor_name=$_POST['t_name'];
			   $date_from=$_POST['d_from'];
			   $date_to=$_POST['d_to'];
					$rs=mysql_query("select * from tournament where t_name='$tor_name'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><center>Tournamentis Already Exists</center>";
	exit;
}  
			   
      	
	$update_query="update tournament set   t_name='$tor_name', d_from='$date_from', d_to='$date_to' where id='$update_id'"	;
			   if(mysql_query($update_query)){
				   echo "<script> window.open('view_file.php','_self');     </script> ";
				   
				   
			   }
			   
			   
			   
		   }

               





?>

 <?php
   include("footer.php");

?>