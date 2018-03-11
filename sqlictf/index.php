<?php
ob_start();
include("db_config.php");
ini_set('display_errors', 1);
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CTF Login! - SQL Injection Training App</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead"><h2 style="color:white">
				CTF Login! - SQL Injection Training App
			</p>
        </div>
		
		<div class="searchheader">
			<p class="lead" style="color:black">
				Complete the following challenges!
				<li>1. Login into the application as a user with admin privs (is_admin flag is set to 'yes')</li>
				<li>2. Login into the application as the user with password 'dracarys'</li>
				<li>3. Extract the value of column 'filename' from table 'diskinfo'</li>
				<li>4. Read the contents of the file obtained from Challenge 3 using load_file</li>
				<li>5. What is the uptime of the server hosting the CTF</li>
				
			</p>
        </div>
		
		<div class="response">
		<form method="POST" autocomplete="off">
			<p style="color:white">
				Username:  <input type="text" id="uid" name="uid" value="bob"><br /></br />
				Password: <input type="password" id="password" name="password">
			</p>
			<br />
			<p>
			<input type="submit" value="Submit"/> 
			<input type="reset" value="Reset"/>
			</p>
		</form>
        </div>
    
        
		<br />

<?php

if (!empty($_REQUEST['uid'])) {
session_start();
$username = ($_REQUEST['uid']);
$pass = $_REQUEST['password'];
//echo md5($pass)."<br />";

$q = "SELECT * FROM users where (username='".$username."') AND (password = '".md5($pass)."')" ;
//echo $q;
	if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}
	
	$e = mysqli_get_warnings($con);
	if ($e){
	do { 
		echo "Warning: $e->errno: $e->message<br />"; 
	} while ($e->next()); }
	
	$result = mysqli_query($con,$q);
	$row = mysqli_fetch_array($result);
	
	if ($row){
	//$_SESSION["id"] = $row[0];
	$_SESSION["username"] = $row[1];
	$_SESSION["name"] = $row[3];
	//ob_clean();
	header('Location:home.php?user='.$row[1]);
	}
	else{
		echo "<font style=\"color:#FF0000\">Invalid password!</font\>";
	}
}
//}
?>

	
	  
	  <div class="footer">
		<p>Riyaz Walikar | @riyazwalikar | karniv0re@null.co.in</p>
      </div>

	</div> <!-- /container -->
  
</body>
</html>