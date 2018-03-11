<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SQL Injection</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>

    <div class="container-narrow">
        <div class="jumbotron">
			<h1 style="color:white">SQL Injection - Training App</h1>
			<p class="lead" style="color:white">
				Practical hands on session for manual detection and exploitation of SQL Injection flaws
			</p>
        </div>
		<br />
		
      <div class="row marketing">
        <div class="col-lg-6">
		  <h4><a href="register.php" style="color:#B31D14">register.php - user registration page</a></h4>
          <p>This page can be used to create users that will be used throughout the session. Create atleast 3 users.</p>
		
          <h4><a href="login1.php" style="color:#B31D14">login1.php - basic injection page</a></h4>
          <p>This page contains the most simplistic form of SQL injection flaw. Verbose errors, can be used to enumerate columns and bypass user authentication altogether</p>

		  <h4><a href="login2.php" style="color:#B31D14">login2.php - basic injection page with brackets</a></h4>
          <p>This page contains the most simplistic form of SQL injection flaw. Verbose errors, can be used to enumerate columns and bypass user authentication altogether. Backend query uses brackets to enclose variables. Very common on the Internet.</p>
		  
          <h4><a href="searchproducts.php" style="color:#B31D14">searchproducts.php - multiple exercises</a></h4>
          <p>Page contains code that fetches multiple entries from the DB, can be abused to extract arbitrary data</p>

          <h4><a href="secondorder_register.php" style="color:#B31D14">secondorder_register.php - allows registration with quotes</a></h4>
          <p>Page allows user registration even with quotes. Quotes are nullified by appending a second quote to make them literals. Data is stored to backend tables without being verified if data was clean or not. The problem with doubling-up approach arises in more complex situations where the same item of data passes through several SQL queries, being written to the database and then read back more than once.</p>
		  		  
		  <h4><a href="secondorder_changepass.php" style="color:#B31D14">secondorder_changepass.php - allows users to change their password</a></h4>
          <p>Page doesn't function as advertised. Only used to show second order SQLi</p>
		  
		  <h4><a href="blindsqli.php?user=voldemort"  style="color:#B31D14">blindsqli.php - vulnerable to content and time based blind SQLi</a></h4>
          <p>Page is vulnerable to blind sql injection using both changes in content as well as response times. Data can be extracted using true and false statements.</p>
		  
		  <h4><a href="os_sqli.php?user=frodo" style="color:#B31D14">os_sqli.php - can be used to interact with the filesystem and the OS via MySQL databases</a></h4>
          <p>Can be used to interact with the OS, including reading and writing of files and other tasks.</p>
		  
      <h4><a href="examtime.php" style="color:#B31D14">Challenge questions to play around :)</p>
		  	  		  
        </div>


      </div>

      <div class="footer">
		<p>Riyaz Walikar | @riyazwalikar | karniv0re@null.co.in</p>
      </div>

    </div> <!-- /container -->

  

</body></html>