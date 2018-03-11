<!-- Enable debug using ?debug=true" -->
<?php
ob_start();
session_start();
include("db_config.php");
if (!$_SESSION["username"]){
header('Location:Login1.php?msg=1');
}
ini_set('display_errors', 0);
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Blind SQL Injection - SQL Injection Training App</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				Blind SQL Injection (via content response and time delays)</a>
				</p>
		</div>
		
<?php
if (isset($_GET["user"])){
		$user = $_GET["user"];
		$q = "Select * from users where username = '".$user."'";
		
		if (isset($_GET['debug']))
{
	if ($_GET['debug']=="true")
{
	echo "<pre>".$q."</pre><br /><br />";
	}
}

		if (!mysqli_query($con,$q))
	{
		//die('Error: ' . mysqli_error($con));
	}
		$result = mysqli_query($con,$q);
		

		$row = mysqli_fetch_array($result);
		

		if ($row){
		$_SESSION["username"] = $row[1];
		$_SESSION["name"] = $row[3];
		$_SESSION["descr"] = $row[4];
		
}
}//end if isset

?>		
		
		<div class="response">
		
			<p style="color:white">
			<table class="response">
			<form method="POST" autocomplete="off">
			
			<tr>
				<td>
					Username:  
				</td>
				<td>
					<?php echo $row[1]; ?>
				</td>
			</tr>

			<tr>
				<td>
					Name:  
				</td>
				<td>
					<?php echo $row[3]; ?>
				</td>
			</tr>

			<tr>
				<td>
					Description: 
				</td>
				<td>
					<?php echo $row[4]; ?>
				</td>
			</tr>
		<tr>
			<td>
				<br />
			</td>
		</tr>
			<tr>
				<td>
					<input type="button" value="Change Password"/>
				</td>
				
			</tr>			
			</table>
				
			</p>

		</form>
        </div>
    
        
		<br />
		
      <div class="row marketing">
        <div class="col-lg-6">

	</div>
	</div>
	  
	  
	  <div class="footer">
		<p><h4><a href="index.php">Home</a><h4></p>
      </div>
	  
	  
	  <div class="footer">
		<p>Riyaz Walikar | @riyazwalikar | karniv0re@null.co.in</p>
      </div>

	</div> <!-- /container -->
  
</body>
</html>