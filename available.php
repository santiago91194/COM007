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
		
		 <table  class="table table-striped table-hover">  
		 <th colspan="2" style="color:white; background-color:black; text-align:center;">Select Tournament</th>
		
			
			<tr><td> Select Tournament   </td><td>
            <select  
			  name="subid" >
		  <option value="no">Select Tournament  </option>
<?php include("connect.php");
$rs=mysql_query("Select * from tournament order by id DESC");
	  while($row=mysql_fetch_array($rs))
{

echo "<option value='$row[1]'>$row[1]</option>";

}
?>
               </select>			</td></tr>
			  <!-- <tr> <td> Select Tournament Type </td> 
			<td>  <Select name="t_type">  
             <option value="no">   Select Type  </option>  
			 <option value="football">   Football  </option>
			 <option value="baseball">   Baseball  </option>
			 <option value="cricket">   Cricket  </option>
			 <option value="table_tennis">   Table Tennis  </option>
			 <option value="basket_ball">   Basket Ball  </option>
			 <option value="Boxing">   Boxing  </option>
			</select></td> -->
			
			<tr><td colspan="2">
          <center>  <input type="submit" name="update" value="Submit "  class="btn btn-primary"></center>  </td></tr>	
		 		
			
		
		 </form>
   </div>
  
 
  

		
</body>
</html>