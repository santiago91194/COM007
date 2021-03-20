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
         <form method="POST" action="view_team.php" enctype="multipart/form-data" class="container">
		
		 <table  class="table table-striped table-hover">  
		 <th colspan="2" style="color:white; background-color:black; text-align:center;">View Team</th>
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
			
			<!--<tr><td> Select Player Type  </td><td>
            <select  
			  name="subid" >
		  <option value="no">Select Player Type  </option>
		  <option value="football">   Football  </option>
			 <option value="baseball">   Baseball  </option>
			 <option value="cricket">   Cricket  </option>
			 <option value="table_tennis">   Table Tennis  </option>
			 <option value="basket_ball">   Basket Ball  </option>
			 <option value="Boxing">   Boxing  </option>-->
<?php //include("connect.php");
//$rs=mysql_query("Select * from matches order by id DESC");
	//  while($row=mysql_fetch_array($rs))
{


//echo "<option value='$row[0]'>$row[2]-->$row[1]</option>";

}
?>
               </select>			</td></tr>
			   <tr><td colspan="2">
          <center>  <input type="submit" name="update" value="Submit"  class="btn btn-primary"></center>  </td></tr>	
		 		
			
			
            
			
			
		 
		 </form>
   </div><form method="POST" action="view_team.php" enctype="multipart/form-data" class="container">
   <?php
        include("connect.php");
		if(isset($_POST['update'])){
	 $m_name=$_POST['match_name'];
	 $t_name=$_POST['t_name'];
	  $_SESSION['m_name']=$m_name;
	   $_SESSION['t_name']=$t_name;
	  
		$rs=mysql_query("select * from matches where t_id='$t_name' AND m_name='$m_name' ");
       $row=mysql_fetch_array($rs);
$id= $row['id'];
if($row['team']==''){

	echo "<h3>No Team Found Against Selected Match Or Tournament!!!   </h3>";
	exit;
}
	
			  

?>
 
	<tr><td><b>Players Name In Team:</b></td>
	<td><?php echo $row['team'];?></td></tr>
	<tr><td colspan='2'>
	<a href="edit_team.php?edit=<?php echo $id; ?>">Edit Team</a>
	</td>
	</tr>
	
	  
	
	


			  
<?php  
		}
		
   
	


?></table></form>
</body>
</html>