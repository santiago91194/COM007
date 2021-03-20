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
    	<th>Match Name
    </th>
	<th>Tournament Name
    </th>
	<th>Date.
    </th>
	<th>Time
    </th>
	<th>
    	Team
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

$t="SELECT * FROM matches order by t_id; ";
$q=mysql_query($t);
while($f=mysql_fetch_array($q)){
	$i=0;
	     $id=$f['id'];
		$m_name=$f['m_name'];
		$_SESSION['match_name']=$m_name;
		$t_name= $f['t_id'];
		$date=$f['date'];
		$time=$f['time'];
			$team=$f['team'];
	
		
	        ?>
<tr >

<td><a href="view_matches.php?file=<?php echo $id;    ?>"><?php echo $id; ?> </a> </td>
<td><?php echo $m_name; ?>  </td>
<td><?php echo $t_name; ?>  </td>
<td><?php echo $date; ?>  </td>
<td><?php echo $time; ?>  </td>
<td><?php echo $team; ?>  </td>



<td><a href="edit_matches.php?edit=<?php echo $id; ?>">Edit</a>  </td>
<td><a href="delete_matches.php?del=<?php echo $id; ?>">Delete</a>  </td>
</tr>
<?php } ?>   



	</table>
	</div>
	   <?php
   include("footer.php");

?>
	
	
	