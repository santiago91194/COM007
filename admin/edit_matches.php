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

 while($f=mysql_fetch_array($run)){
	     $edit_id1 =$f['id'];
		$_SESSION['t_name1']=$f['t_id'];
	
		$m_name=$f['m_name'];
		$date=$f['date'];
		$time=$f['time'];
		
		


?>
<?php
   include("header.php");

?>
 
		
<form method="POST" action="edit_matches.php?edit_form=<?php echo $edit_id1; ?>" class="container">
<table  class="table table-striped table-hover">
<tr>
<th colspan="2" style="color:white; background-color:black; text-align:center;">Edit Tornament </th>

</tr>
<tr>
<td> Match name</td> <td> 
<input type="text" name="m_name"  value="<?php echo $m_name; ?>"  >
</td>
</tr>

<tr>
<td> Date</td> <td> 
<input type="date" name="date"  value="<?php echo $date; ?>" required="required" >
</td>
</tr>
<tr>
<td> Time</td> <td> 
<input type="time" name="time"  value="<?php echo $time; ?>" required="required" >
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
			   $match_name=$_POST['m_name'];
			   $d=$_POST['date'];
			   $t=$_POST['time'];
			 		$rs=mysql_query("select * from matches where m_name='$match_name' AND t_id='$_SESSION[t_name1]' ");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><center>Match against selected tournament is Already Exists</center>";
	exit;
}
			   
      	
	$update_query="update matches set   m_name='$match_name', date='$d', time='$t' where id='$update_id'"	;
			   if(mysql_query($update_query)){
				   echo "<script> window.open('view_matches.php','_self');     </script> ";
				   
				   
			   }
			   
			   
			   
		   }

               





?>

 <?php
   include("footer.php");

?>