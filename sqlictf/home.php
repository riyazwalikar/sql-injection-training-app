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
    <title>Home - SQL Injection Training App</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				Home! Shows account details!</a>
				</p>
		</div>
		
<?php
if (isset($_GET["user"])){
		$user = $_GET["user"];
		$q = "Select * from users where username = '".$user."'";
		//echo $q."<br /><br />";
		if (!mysqli_query($con,$q))
	{
		//die('Error: ' . mysqli_error($con));
	}
		$result = mysqli_query($con,$q);
		

		$row = mysqli_fetch_array($result);
		
		
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
					Hash:  
				</td>
				<td>
					<?php echo $row[2]; ?>
				</td>
			</tr>

			<tr>
				<td>
					is admin: 
				</td>
				<td>
					<?php echo $row[3]; ?>
				</td>
			</tr>
			<tr>
				<td>
					<br />
				</td>
			</tr>
			<tr>
				<td>
					<a href='logout.php'>Logout and Go back</a>
				</td>
			</tr>
					
			</table>
				
			</p>

		</form>
        </div>
    
        
		<br />
		
      <div class="row marketing">
        <div class="col-lg-6">

  
	  <div class="footer">
		<p>Riyaz Walikar | @riyazwalikar | karniv0re@null.co.in</p>
      </div>

	</div> <!-- /container -->
  
</body>
</html>