<?php
session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
?>
<?php
include("connect.php");
$edit_id= @$_GET['edit'];
$query="select * from result where id='$edit_id'";
  $run=mysql_query($query);

 while($f=mysql_fetch_array($run)){
	     $edit_id1 =$f['id'];
		
		
		$t_name=$f['t_name'];
		$m_name=$f['m_name'];
		$winner_team=$f['winner_team'];
		$winner_team_score=$f['winner_team_score'];
		$looser_team=$f['looser_team'];
		$looser_team_score=$f['looser_team_score'];
		
	
		
		


?>
<?php
   include("header.php");

?>
 
		
<form method="POST" action="edit_result.php?edit_form=<?php echo $edit_id1; ?>" class="container">
<table  class="table table-striped table-hover">
<tr>
<th colspan="2" style="color:white; background-color:black; text-align:center;">Edit Result </th>

</tr>
<tr>
<td> Tornament name</td> <td> 
<input type="text" name="t_name"  value="<?php echo $t_name; ?>"  >
</td>
</tr><tr>
<td> Match name</td> <td> 
<input type="text" name="m_name"  value="<?php echo $m_name; ?>"  >
</td>
</tr>

<tr>
<td> Winner Team</td> <td> 
<input type="text" name="winner_team"  value="<?php echo $winner_team; ?>" required="required" >
</td>
</tr><tr>
<td> Winner Team Score</td> <td> 
<input type="text" name="winner_team_score"  value="<?php echo $winner_team_score; ?>" required="required" >
</td>
</tr><tr>
<td> Looser Team</td> <td> 
<input type="text" name="looser_team"  value="<?php echo $looser_team; ?>" required="required" >
</td>
</tr><tr>
<td> Looser Team Score</td> <td> 
<input type="text" name="looser_team_score"  value="<?php echo $looser_team_score; ?>" required="required" >
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
			   $match_name=$_POST['m_name'];
			   $winner_t=$_POST['winner_team'];
			   $looser_t=$_POST['looser_team'];
			   $winner_t_score=$_POST['winner_team_score'];
			   $looser_t_score=$_POST['looser_team_score'];
			
			 
			   
      	
	$update_query="update result set t_name='$tor_name', m_name='$match_name', winner_team='$winner_t',winner_team_score='$winner_t_score',looser_team='$looser_t',looser_team_score='$looser_t_score' where id='$update_id'"	;
			   if(mysql_query($update_query)){
				   echo "<script> window.open('view_result.php','_self');     </script> ";
				   
				   
			   }
			   
			   
			   
		   }

               





?>

 <?php
   include("footer.php");

?>