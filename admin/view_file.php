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
	
	
	
	<th>
    	Edit
    </th>
	
	
	<th>
    	DELETE
    </th>
	</tr>
		<?php

include("connect.php");

$t="SELECT * FROM tournament order by id DESC; ";
$q=mysql_query($t);
while($f=mysql_fetch_array($q)){
	
	     $id=$f['id'];
		$tournament_name=$f['t_name'];
		$_SESSION['tournament_name']= $tournament_name;
		$d_from=$f['d_from'];
		$d_to=$f['d_to'];
	
		
	
		
	        ?>
<tr >

<td><a href="get_file.php?file=<?php echo $id;    ?>"><?php echo $id; ?> </a> </td>
<td><?php echo $tournament_name; ?>  </td>

<td><?php echo $d_from; ?>  </td>
<td><?php echo $d_to; ?>  </td>






<td><a href="edit_file.php?edit=<?php echo $id; ?>">Edit</a>  </td>
<td><a href="delete_file.php?del=<?php echo $id; ?>">Delete</a>  </td>
</tr>
<?php } ?>   



	</table>
	</div>
	   <?php
   include("footer.php");

?>
	
	
	