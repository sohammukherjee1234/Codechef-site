
<?php
$name=$_COOKIE["user"];



$servername = "localhost";
$username = "root";
$password = "soham";
$dbname = "CODECHEF";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, userid, title FROM POST";
$result = mysqli_query($conn, $sql);




?>


<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>DISCUSS</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		
	<nav>
    <div class="nav-wrapper">
		<img src="logo.png" width="300" height="100">
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
		  <li><span> <?php echo $name;?></span></li>
	   &nbsp;&nbsp;
		  <li><a href="post-page.php">Post</a></li>
	&nbsp;&nbsp;
        <li><a href="about_us.html">About Us</a></li>
		&nbsp;&nbsp;
        <li><a href="careers.html">Career</a></li>
		 &nbsp;&nbsp;
        <li><a href="login-page.php">Logout</a></li>
      </ul>
    </div>
  </nav>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
        
    
	<?php
	function showdata($contributor,$title,$id)
{
	echo '
	<div class="row">
	<div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">'.$contributor.'</span>
          <p>'.$title.'</p>
        </div>
        <div class="card-action">
          <a href="view.php?'.$id.'">View</a>
         
        </div>
      </div>
    </div>
	  </div>';
}
		
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        showdata($row["userid"],$row["title"],$row["id"]);
    }
} else {
    echo '
	<div class="row">
	<div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">0 results</span>
        </div>
        
      </div>
    </div>
	  </div>';
}

mysqli_close($conn);	
	?>
    

   
		<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

</html>