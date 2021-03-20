<?php
session_start();
if($_SESSION['login']!=1){
	  header('location:index.php');
}
?>
<?php
   include("header.php");

?><br><br><br><div class="container">
	 <form method="POST" action="file.php">
		 
		 <table class="table table-striped">  
		 <th colspan="2" style="color:white; background-color:black; text-align:center;">Create Tournament </th>
		 
			<tr><td> Enter Tournament Name   </td> <td>
			<input type="text" name="t_name" placeholder="Enter Tournament Name"  required='required'>
			</td></tr>
			
			</tr>
			<tr><td> Select Tournament Date   </td><td>
            From <input type="date" id="d_from" name="d_from" required='required'> 
			To <input type="date" id="d_to" name="d_to" required='required'>
			</td></tr>
			<tr><td colspan="2">
           <center> <input type="submit" name="update" value="Submit" class="btn btn-primary" > </center></td></tr>	
		 		
			
		 </table>
		 </form>
	<?php
	
	      include("connect.php");
			
	     if(isset($_POST['update'])){
			 
		 $t_name=$_POST['t_name'];
		 
			  $d_from=$_POST['d_from'];
			  $d_to=$_POST['d_to'];
			  $rs=mysql_query("select * from tournament where t_name='$t_name'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Tournamentis Already Exists</div>";
	exit;
}
			  $query= "insert into tournament (t_name, d_from, d_to) VALUES ('$t_name','$d_from', '$d_to') " ;
			 If( $run =mysql_query($query)){
			 echo "<center><h3 class='alert alert-success '>Tournament Created successfully!</h3></center>";
			    include("footer.php");
			 exit();
			 }
			
			   echo "<center><h3 class='alert alert-danger'>File name or file number already exist!</h3></center>";
		 }
	
	?></div>
	
	 <?php
   include("footer.php");

?>
	</body>
	</html>