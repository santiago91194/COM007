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

	     <?php
		            if(isset($_GET['number'])){
						 $num= $_GET['number'];
						 
						 echo "<center><h3 class='alert alert-success'> $num  </h3></center>";
						
					}
		 ?>
         <form method="POST" action="result.php" enctype="multipart/form-data" class="container">
		
		 <table  class="table table-striped table-hover">  
		 <th colspan="2" style="color:white; background-color:black; text-align:center;">Create Result</th>
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
		<tr><td> Winner Team name:</td>
		<td>	<input type="text" name="winner_team" placeholder="Winer Team Name" required="required">
		</td></tr><tr><td>Winner Team score:</td>
		<td>	<input type="text" name="winner_team_score" placeholder="Winer Team Score" required="required">
		</td>	</tr><tr> <td>Looser Team Name:</td><td><input type="text" name="looser_team" placeholder="Looser Team Name" required="required">
		</td></tr><tr><td>Looser Team Score:</td><td>	<input type="text" name="looser_team_score" placeholder="Looser Team Score" required="required">
			</td></tr>

			   <tr><td colspan="2">
          <center>  <input type="submit" name="update" value="Submit"  class="btn btn-primary"></center>  </td></tr>	
		 		
			
			
            
			
			
		 </table>
		 </form>
  
   <?php
        include("connect.php");
		if(isset($_POST['update'])){
	 $m_name=$_POST['match_name'];
	 $t_name=$_POST['t_name'];
	 $winner_team=$_POST['winner_team'];
	 $winner_team_score=$_POST['winner_team_score'];
	 $looser_team=$_POST['looser_team'];
	$looser_team_score=$_POST['looser_team_score'];
	 
	 	


  $t="INSERT INTO result(t_name,m_name,winner_team,winner_team_score,looser_team,looser_team_score)
	 VALUES('$t_name','$m_name','$winner_team','$winner_team_score','$looser_team','$looser_team_score')"or die(mysql_error());
	if( $run=mysql_query($t)){
		echo "<h3><center> Result submitted Successfully!!! </center></h3>";
	} 
}
	
	


?>

</form>
</body>
</html>