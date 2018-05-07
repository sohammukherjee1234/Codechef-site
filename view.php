<?php
$servername = "localhost";
$username = "root";
$password = "soham";
$dbname = "CODECHEF";
$name=$_COOKIE["user"];
$id=$_SERVER["QUERY_STRING"];
$postid=(int)$id;

function postcomment($conn,$comment,$pid,$uid,$date_now)
{
echo $pid;
$sql = "INSERT INTO COMMENTS (postid,userid, comment,date)
VALUES ($pid,'$uid','$comment','$date_now')";
if ($conn->query($sql) === TRUE) {
    echo "New comment created successfully at postid=".$pid;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["commenthere"]))
		echo "Please enter a comment!";
	else
	{
		$comment=$_POST["commenthere"];
		$date_now=date("Y/m/d");
		echo $postid;
		postcomment($conn,$comment,$postid,$name,$date_now);
		
		//header('Location:main.php');
	}
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



$sql = "SELECT userid, comment, date FROM COMMENTS WHERE postid=".$postid;
$result = mysqli_query($conn, $sql);


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
      <form role="form" method="post" action="<?php echo "view.php?".$postid;?>">
        <div class="form-group">
          <textarea class="form-control" name="commenthere" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
		 
		  <?php
		 function showdata($who,$commentdate,$maincomment){
		echo '
         <div class="col-sm-10">
          <h4>'. $who.'<small>'.$commentdate.'</small></h4>
          <p>'.$maincomment.'</p>
		  <br>
        </div>
		';
			  }
		  
		  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        showdata($row["userid"],$row["date"],$row["comment"]);
    }
		  }
		  else
		  {
			  echo '<div class="col-sm-10">
          
          <p>No comments found.</p>
		  <br>
        </div>';
		  }
		  
		  $conn->close();
			  ?>
    </div>
		</div>
   
		<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

</html>