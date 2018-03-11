<!-- Enable debug using ?debug=true" -->
<?php
ob_start();
session_start();
include("db_config.php");
if (!$_SESSION["id"]){
header('Location:Login1.php?msg=1');
}
ini_set('display_errors', 1);
?>



<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Change Password Page - SQL Injection Training App</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				Non functional Change Password page - shows second order SQLi</a>
				</p>
		</div>
		
<?php
		$q = "Select * from users where username = '".$_SESSION["username"]."'";
		

		if (isset($_GET['debug']))
		{
			if ($_GET['debug']=="true")
		{
			echo "<h2><pre>".$q."</pre></h2><br /><br />";
			}
		}

		$result = mysqli_query($con,$q);
		if (!$result)
		{
			die("".mysqli_error($con));
		}
		$e = mysqli_get_warnings($con); 
		
		if ($e){
			do { 
			echo "Warning: $e->errno: $e->message<br />"; 
			} while ($e->next()); 
		}
		$row = mysqli_fetch_array($result);
	
		if ($row){
		$_SESSION["username"] = $row[1];
		$_SESSION["name"] = $row[3];
		$_SESSION["descr"] = $row[4];
}
?>		
		
		<div class="response">
		
			<p style="color:white">
			<table class="response">
			<form method="POST" autocomplete="off">
			
			<tr>
				<td>
					Enter new password:  
				</td>
				<td>
					<input type="password" id="password" name="password"><br />
				</td>
			</tr>

			<tr>
				<td>
					Repeat password: 
				</td>
				<td>
					<input type="password" id="password" name="password">
				</td>
			</tr>

			
			<td>
				<br />
			</td>
		</tr>
			<tr>
				<td>
					<input type="submit" value="Change!"/>
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