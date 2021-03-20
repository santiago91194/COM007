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
	
	
	</tr>
		<?php

include("connect.php");

$t="SELECT * FROM matches order by id DESC; ";
$q=mysql_query($t);
while($f=mysql_fetch_array($q)){
	
	     $id=$f['id'];
		$m_name=$f['m_name'];
		$t_name= $f['t_id'];
		$date=$f['date'];
		$time=$f['time'];
		
	
		
	        ?>
<tr >

<td><a href="view_matches.php?file=<?php echo $id;    ?>"><?php echo $id; ?> </a> </td>
<td><?php echo $m_name; ?>  </td>
<td><?php echo $t_name; ?>  </td>
<td><?php echo $date; ?>  </td>
<td><?php echo $time; ?>  </td>

<?php } ?>   



	</table>
	</div>

	
	
	