<head>
<title> Sport Manager  </title>

<link rel="icon" href="images/icon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
</head>
<body>
<div >
<nav class="navbar navbar-inverse" >
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Admin Pannel</a>
    </div>
    <ul class="nav navbar-nav" >
      <li ><a href="home.php">Home</a></li>
      <li><a href="file.php">  Create Tournament</a></li>
      <li><a href="view_file.php">View Tournamnet(<?php include("connect.php");
        $result=mysql_query("SELECT count(*) as total from tournament");
$data=mysql_fetch_array($result);
echo $data['total'];

	  ?>)
	  </a></li>
		  <li><a href="insert.php"> Create Match</a></li>
		   <li><a href="view_matches.php">View Matches(<?php include("connect.php");
        $result=mysql_query("SELECT count(*) as total from matches");
$data=mysql_fetch_array($result);
echo $data['total'];

	  ?>)
	  </a></li>
	  
			  <li> <a href="team.php"> Create Team </a></li>
			  <li> <a href="view_team.php"> View Team </a></li>
			  <li> <a href="result.php"> Create Result </a></li>
			  <li> <a href="view_result.php"> View Result </a></li>
			  <li> <a href="pass.php"> Change password </a></li>
		  <li><a href="logout.php"> Logout </a></li>
    </ul><div style="float:right;  ;" ><br>
	<b style="color:white;">(Online) <?php echo $name= $_SESSION['user_name']; ?></b>
	
	
	</div>
  </div>
</nav>
  
 
	</div>
	