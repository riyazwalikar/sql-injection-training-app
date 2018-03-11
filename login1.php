<!-- Enable debug using ?debug=true" -->
<?php
ob_start();
if (!session_id()){
session_start();
}
include("db_config.php");
ini_set('display_errors', 1);
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login Page 1 - SQL Injection Training App</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				Login Page 1 - Login using the credentials created using <a href="register.php">register.php</a>
				<?php if (!empty($_REQUEST['msg'])){echo "<br />Please Login to continue to searchproducts.php";} ?>
			</p>
        </div>
		
		<div class="response">
		<form method="POST" autocomplete="off">
			<p style="color:white">
				Username:  <input type="text" id="uid" name="uid"><br /></br />
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
		
      <div class="row marketing">
        <div class="col-lg-6">

<?php
//echo md5("pa55w0rd");

if (!empty($_REQUEST['uid'])) {
$username = ($_REQUEST['uid']);
$pass = $_REQUEST['password'];

$q = "SELECT * FROM users where username='".$username."' AND password = '".md5($pass)."'" ;

if (isset($_GET['debug']))
{
	if ($_GET['debug']=="true")
{
	echo "<pre>".$q."</pre><br /><br />";
	}
}

		if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}
	
	$result = mysqli_query($con,$q);

	// if (!$result) {
 //    		printf("%s\n", mysqli_error($con));
 //    		echo "error";
	// }

if (mysqli_warning_count($con)) { 
   $e = mysqli_get_warnings($con); 
   if ($e){
   do { 
       echo "Warning: $e->errno: $e->message\n"; 
   } while ($e->next()); }
} 

	echo "<br /><br />";
	$row = mysqli_fetch_array($result);

	
	if ($row){
	//$_SESSION["id"] = $row[0];
	$_SESSION["username"] = $row[1];
	$_SESSION["name"] = $row[3];
	//ob_clean();
	
	header('Location: searchproducts.php');
	}
	else{
		echo "<font style=\"color:#FF0000\">Invalid password!</font\>";
	}
}

//}
?>

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