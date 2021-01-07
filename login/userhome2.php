<?php 
	require 'localdatabase.php';


	try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT first_name, last_name, post_title, post_text FROM user U, user_post UP, post P WHERE U.userID = UP.userID AND UP.postID = P.postID AND U.userID = 2';
    $q = $pdo->query($sql);

    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

$pass = $q->fetch();

 ?>
<!DOCTYPE HTML>

<head>
	
<title>User Login</title>		
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

</style>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  
	<h1>Sign Up</h1>

	<div style = 'width:300px; margin:0 auto; margin-top:7em;'>
	<p><table class = 'vv' ><!-- border=1 cellspacing=5 cellpadding=5 -->
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Posts</th>
                        <th>First name</th>
                        <th>Last name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['post_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['post_text']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table></p>
	<p style = "text-transform:Capitalize;">Please enter the User ID you wish to register:</p>
	
	</div>



</body>

</html>