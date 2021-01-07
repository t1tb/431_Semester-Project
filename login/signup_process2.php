<?php
session_cache_limiter('private, must-revalidate');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'ljw5390';
$password = 'Group18';
$host = 'localhost';
$dbname = 'group18_431W';

if(!isset($_SESSION))
{
	SESSION_START();
}

?>

<!DOCTYPE HTML>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<style type=text/css>

html{margin:0 auto;max-width:50em}
body{font-family:'Century Gothic', sans-serif;background:#272727;color:#94D4F5;}
h1{font-size:150%;font-weight:700;text-transform:uppercase;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;}
h2{font-size:150%;font-weight:700;text-transform:capitalize;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;}
h3{text-align: center;}
h4{font-size:200%;font-weight:700;text-transform:uppercase;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;color:#E1E1E1;}
h5{font-size:130%;font-weight:700;color:#E1E1E1;}
p{font-size:120%;color:#E1E1E1;text-transform:capitalize;}
/*a:visited{color: #E1E1E1;}*/

</style>
</head>

<h4>Account Creation</h4>

<body>
    <h2><?php
        $sql = 'INSERT INTO user(userID, first_name, last_name, country, email, Program_hobby, university, password) ';
        $sql = $sql . 'VALUES ("'.$_POST["userID"] . '","' . $_POST["first_name"] . '","' . $_POST["last_name"] . '","' . $_POST["country"] . '","' . $_POST["email"] . '","' . $_POST["Program_hobby"] . '","' . $_POST["university"] . '","' . $_POST["password"] . '")';
    ?></h2>
    <h3><?php
        try {
          $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "Your account has been successfully registered";
        ?>
        <br><br><br><p>You will be redirected back to the login page momentarily</p>
				<script>
					var timer = setTimeout(function() {
						window.location='User_login.html'
					}, 5000);
				</script>
			<?php
				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
        ?></h3>
</body>




</html>