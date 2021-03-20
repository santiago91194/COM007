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
<div class="container">
	<table  class="table table-striped" >
<tr style="color:white; background-color:black;">
	
	<th>
    	 No
    </th>
    	
	<th>Tournament Name
    </th>
	
	<th>From
    </th>
	<th>To
    </th>
	
	
	
	</tr>
		<?php

include("connect.php");

$t="SELECT * FROM tournament order by id DESC; ";
$q=mysql_query($t);
while($f=mysql_fetch_array($q)){
	
	     $id=$f['id'];
		$t_name=$f['t_name'];
		$d_from=$f['d_from'];
		$d_to=$f['d_to'];
		$t_type=$f['t_type'];
		
	
		
	        ?>
<tr >

<td><a href="get_file.php?file=<?php echo $id;    ?>"><?php echo $id; ?> </a> </td>
<td><?php echo $t_name; ?>  </td>

<td><?php echo $d_from; ?>  </td>
<td><?php echo $d_to; ?>  </td>



<?php } ?>   



	</table>
	</div>

	
	
	