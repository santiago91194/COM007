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
         <form method="POST" action="insert.php" enctype="multipart/form-data" class="container">
		
		 <table  class="table table-striped table-hover">  
		 <th colspan="2" style="color:white; background-color:black; text-align:center;">Create Match</th>
		
			
			<tr><td> Select Tournament   </td><td>
            <select  
			  name="subid" required='required'>
		  <option value="no" required='required'>Select Tournament  </option>
<?php include("connect.php");
$rs=mysql_query("Select * from tournament order by id DESC");
	  while($row=mysql_fetch_array($rs))
{


echo "<option value='$row[1]'>$row[1]</option>";

}
?>
               </select>			</td></tr>
			   <!--
			  <tr> <td> Select Tournament Type </td> 
			<td>  <Select name="t_type">  
             <option value="no">   Select Type  </option>  
			 <option value="football">   Football  </option>
			 <option value="baseball">   Baseball  </option>
			 <option value="cricket">   Cricket  </option>
			 <option value="table_tennis">   Table Tennis  </option>
			 <option value="basket_ball">   Basket Ball  </option>
			 <option value="Boxing">   Boxing  </option>
			</select></td>
			--->
			<tr><td> Enter Match Name   </td> <td>
            <input type="text" name="m_name" placeholder=" Match Name" required='required' ></td></tr>
            <td> Select Tournament Date   </td>
			<td>
            <input type="date" id="date" name="date" required='required'></td></tr>
            <tr><td> Enter Tournament Time   </td>		<td>	
			<input type="time" id="time" name="time" required='required'> 
			</td></tr>
			<tr><td colspan="2">
          <center>  <input type="submit" name="update" value="Submit "  class="btn btn-primary"></center>  </td></tr>	
		 		
			
		 </table>
		 </form>
   </div>
   <?php
        include("connect.php");
		if(isset($_POST['update'])){
			 
		 
		 $m_name=$_POST['m_name'];
		// $t_type= $_POST['t_type'];
		 $date=$_POST['date'];
		 $time=$_POST['time'];
	
	   $t_id=$_POST['subid'];

		$rs=mysql_query("select * from matches where m_name='$m_name' AND t_id='$t_id'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Match against selected tournament is Already Exists</div>";
	exit;
}
		
		  $query= "insert into matches (t_id, m_name, date, time)
			  VALUES ('$t_id','$m_name','$date', '$time')" ;
			  
			  If( $run =mysql_query($query)){
			 
			
     
				 header("location:insert.php?number=Match Created Successfully!");
			
			
			
		//echo "<script> window.open('insert.php?number=Match Created successfully!,'_self')  </script>";
		
			}
		else{ echo "error"; } }
			
			  
		
   
		 
   ?>
      <?php
   include("footer.php");

?>
</body>
</html>