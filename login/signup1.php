<?php 
	require 'localdatabase.php';
	if(isset($_SESSION['userID']))
	{
		unset($_SESSION['userID']);
	}
?>
<!DOCTYPE HTML>

<head>
	
<title>User Login</title>		
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<style type=text/css>


html{margin:0 auto;max-width:50em}
body{font-family:'Century Gothic', sans-serif;background:#272727;color:#E1E1E1;}
h1{font-size:200%;font-weight:700;text-transform:uppercase;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;}
h2{font-size:130%;font-weight:700;}
p{font-size:120%;}
/*a:visited{color: #E1E1E1;}*/

</style>
</head>

<body>
  
	<h1>Sign Up</h1>

	<div style = 'width:300px; margin:0 auto; margin-top:7em;'>
	<p style = "text-transform:Capitalize;">Please enter the User ID you wish to register:</p>
	<form action="signup_process.php" method="post">

		<div class="form-group">
			<h2></h2>
			<input class = "form-control" type="text" id="uid" name="uid" placeholder="User ID" value="" required>
			<!-- <h2>Your Email Address*</h2>
			<input class = "form-control" type="text" id="email" name="email" value="">
			<h2>Your First Name*</h2>
			<input class = "form-control" type="text" id="first_name" name="first_name" value="">
			<h2>Your Last Name*</h2>
			<input class = "form-control" type="text" id="userID" name="userID" value="">

			<h2>Password*</h2>
			<input class = "form-control" type="password" id="password" name="password" value="">
			<h2>Re-Enter Password*</h2>
			<input class = "form-control" type="password" id="passwordre" name="passwordre" value=""> -->
		</div>
		<a href = 'User_login.html'><input class="btn btn-default" type="button" value="Back"></a>
		<input class="btn btn-primary" align = "right" style  = "float: right;"type = "submit" value = "Next" >
		<!-- <button class="btn btn-default">btn btn-default</button>
		<button class="btn btn-secondary">btn btn-secondary</button>
        <button class="btn btn-primary">btn btn-primary</button>
        <button class="btn btn-link">btn btn-link</button>
        <button class="btn btn-success">btn btn-success</button>
        <button class="btn btn-info">btn btn-info</button>
        <button class="btn btn-warning">btn btn-warning</button>
        <button class="btn btn-danger">btn btn-danger</button> -->
	</form>
	</div>



</body>

</html>