 <?php if(isset($_GET['empty'])){
			 $empty=@$_GET['empty']; echo "<h2>$empty</h2>";
		 } ?>

<?php
include("connect.php");
if(isset($_GET['testid'])){
  $testid=@$_GET['testid'];

$rs=mysql_query("select * from matches where t_id='$testid' ");




while( $row=mysql_fetch_array($rs)){

	echo $row['m_name'] ;
	



 }
}
?>

