<?php 
require 'localdatabase.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'ljw5390';
$password = 'Group18';
$host = 'localhost';
$dbname = 'group18_431W';
$ID = $_SESSION["userID"]; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT first_name, last_name FROM user WHERE userID = "' . $_SESSION['userID'] . '"';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $sql = 'SELECT P.postID AS postID, U.userID AS userID, first_name, last_name, post_title, post_text FROM user U, user_post UP, post P WHERE U.userID = UP.userID AND UP.postID = P.postID';
    $posts = $pdo->query($sql);
    $posts->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>

<script>
  function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<!DOCTYPE HTML>

<head>
	
<title>User Homepage</title>		
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type=text/css>


html{margin:0 auto;}
body{font-family:'Century Gothic', sans-serif;background:#272727;color:#E1E1E1;}
h1{font-size:200%;font-weight:700;text-transform:uppercase;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;}
h2{font-size:130%;font-weight:700;}
p{font-size:120%;}
/*a:visited{color: #E1E1E1;}*/

.vv {
  margin: 1em 0;
  min-width: 300px;
}
.vv tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.vv th {
  display: none;
}
.vv td {
  display: block;
}
.vv td:first-child {
  padding-top: .5em;
}
.vv td:last-child {
  padding-bottom: .5em;
}
.vv td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .vv td:before {
    display: none;
  }
}
.vv th, .vv td {
  text-align: left;
}
@media (min-width: 480px) {
  .vv th, .vv td {
    display: table-cell;
    padding: .25em .5em;
  }
  .vv th:first-child, .vv td:first-child {
    padding-left: 0;
  }
  .vv th:last-child, .vv td:last-child {
    padding-right: 0;
  }
}

.vv {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.vv tr {
  border-color: #46637f;
}
.vv th, .vv td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .vv th, .vv td {
    padding: 1em !important;
  }
}
.vv th, .vv td:before {
  color: #dd5;
}

/* Dropdown Button */
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}



</style>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://cmpsc431-s3-g-18.vmhost.psu.edu/">Group 18</a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://cmpsc431-s3-g-18.vmhost.psu.edu/login/userhome.php">HomePage<span class="sr-only">(current)</span></a></li>
        <li><a href="http://cmpsc431-s3-g-18.vmhost.psu.edu/login/userhome_more.php">More</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Your Profile</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="/login/profile.php">User Profile</a>
    <a href="/login/friendList.php">Friend List</a>
    <a href="/login/groupList.php">Group List</a>
  </div>
</div>
      </ul>
    </div>
  </div>
</nav>

    <div class="header">
    <h1><?php $row = $q->fetch();
    echo "Welcome " . $row['first_name'] . " " . $row['last_name']  . "!"; ?></h1><br>
    </div>
    


    <div class = "container" style='width: 900px; margin:0 auto;'>
    <div class="page-header page-heading">
    <h1 class="pull-left">Forums</h1>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a>Forums</a></li>
      <li class="active">List of topics</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <table class="table forum table-striped">
    <thead>
      <tr>
        <th class="cell-stat"></th>
        <th>
          <h3>Topics</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Post ID</th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Replies</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Posted By</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $posts->fetch()): ?>
      
      <tr>
        <td class="text-center"><i class="fa fa-exclamation fa-2x text-danger"></i></td>
        <td>
          <h4><a><?php echo htmlspecialchars($row['post_title']); ?></a><br><small><?php echo htmlspecialchars($row['post_text']); ?></small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a><?php echo htmlspecialchars($row['postID']); ?></a></td>
        <td class="text-center hidden-xs hidden-sm"><a><?php
        $sql = 'SELECT COUNT(*) AS count FROM reply WHERE postID = "' . $row['postID'] . '" GROUP BY postID ';
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q = $q->fetch();
        if(!isset($q) || $q == null)
        {
          echo "0";
        }
        else
        {
          echo htmlspecialchars($q['count']);
        }
        
        ?>
        </a></td>
        <td class="hidden-xs hidden-sm"><a><?php echo '<form action="profile_other.php" method="post"><input class="hidden-xs hidden-sm" type="submit" value="' .htmlspecialchars($row['first_name']).' ' .htmlspecialchars($row['last_name']). '"><input type="hidden" name="userID" value="' . htmlspecialchars($row['userID']) . '"></form>'; ?></a><br></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

	  
    </body>
	
	</div>



</body>

</html>