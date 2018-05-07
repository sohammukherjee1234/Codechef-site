<?php
$name=$_COOKIE["user"];
$title="";
$content="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(!empty($_POST["title"]))
		$title=$_POST["title"];
	if(!empty($_POST["postcontent"]))
		$content=$_POST["postcontent"];
}

if($title=="" || $content=="")
	echo "Error please enter data";
else
{
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

$sql = "INSERT INTO POST (userid,title,likes,dislikes,content)
VALUES ('$name','$title',0,0,'$content')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
	header('Location:main.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


	
}
	

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>POST</title>
	
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
		  <li><a href="main.php">Home</a></li>
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
<form class="write_post" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s6">
			
          <input placeholder="Placeholder" id="title" type="text" class="validate" name="title" required>
          <label for="title">Title</label>
        </div>
        
		</div>
    </div>
  </div>
       
		
        
		 <div class="form-group">
 
  			<textarea class="form-control" rows="20" id="postcontent" name="postcontent" required></textarea>
			 <button type="submit" class="btn btn-primary right" >POST</button>
		</div> 
		</form>
   
		<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

</html>