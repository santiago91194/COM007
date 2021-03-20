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
	
	<th>Match Name
    </th>
	<th>Winner Team
	<th>Winner Team Score
	<th>Looser Team
	<th>Looser Team Score
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

$t="SELECT * FROM result order by id DESC; ";
$q=mysql_query($t);
while($f=mysql_fetch_array($q)){
	
	     $id=$f['id'];
		$t_name=$f['t_name'];
		$m_name=$f['m_name'];
		$winner_team=$f['winner_team'];
		$winner_team_score=$f['winner_team_score'];
		$looser_team=$f['looser_team'];
		$looser_team_score=$f['looser_team_score'];
		
	
		
	
		
	
		
	        ?>
<tr >

<td><a href="get_file.php?file=<?php echo $id;    ?>"><?php echo $id; ?> </a> </td>
<td><?php echo $t_name; ?>  </td>
<td><?php echo $m_name; ?>  </td>

<td><?php echo $winner_team; ?>  </td>
<td><?php echo $winner_team_score; ?>  </td>
<td><?php echo $looser_team; ?>  </td>
<td><?php echo $looser_team_score; ?>  </td>






<td><a href="edit_result.php?edit=<?php echo $id; ?>">Edit</a>  </td>
<td><a href="delete_result.php?del=<?php echo $id; ?>">Delete</a>  </td>
</tr>
<?php } ?>   



	</table>
	</div>

	
	
	