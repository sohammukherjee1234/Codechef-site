<?php

$id=$_SERVER["QUERY_STRING"];
$postid=(int)$id;
$servername = "localhost";
$username = "root";
$password = "soham";
$dbname = "CODECHEF";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT userid,title,content FROM POST where ID=".$postid;
$result = $conn->query($sql);
$contributor="";
$title="";
$content="";
if ($result->num_rows > 0) {
    
  
    while($row = $result->fetch_assoc()) {
        $contributor=$row["userid"];
		$title=$row["title"];
		$content=$row["content"];
    }
    
} else {
    echo "0 results";
}
$conn->close();
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
        <li><a href="about_us.html">About Us</a></li>
        <li><a href="careers.html">Career</a></li>
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
        
		 <div class="col-sm-9">
      <hr>
      <h2><?php echo $title;?></h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by <?php echo $contributor;?></h5>
      <h5><span class="label label-danger">tag1</span> <span class="label label-primary">tag2</span></h5><br>
			 <p><?php echo $content;?></p>
		  <br><br>
		  
<input type="image" src="like.png" alt="Like" width="50" height="50">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="image" src="dislike.jpg" alt="Dislike" width="50" height="50">			 
      
     <hr>

      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
        </div>
        <div class="col-sm-2 text-center">
          <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
          <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
          <p><span class="badge">1</span> Comment:</p><br>
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-xs-10">
              <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
              <p>Me too! WOW!</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
 
   
		<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

</html>