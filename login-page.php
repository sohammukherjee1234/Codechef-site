<?php
$username=$password="";
$nameerr=$passerr="";
$page="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["username"]))
		$nameerr="This field cannot be blank";
	else
 		$username=$_POST["username"];
	if(empty($_POST["password"]))
		$passerr="This field cannot be blank";
	else
		$password=$_POST["password"];
}
setcookie("user",$username,time() + (86400 * 30), "/");
  if($username=="soham" && $password=="soham")
	  header('Location:main.php');
  else if($username=="admin" && $password=="admin")
	   header('Location:main.php');
  else if($username=="codechef" && $password=="codechef")
	   header('Location:main.php');
 else
	 echo "Invalid username or password";
	  
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body> <img src="logo.png"> </body>
<div class="login-page"> 
  <div class="form">
    <form class="register-form" >
      <input type="text" placeholder="name"/>
		
      <input type="password" placeholder="password"/>
		
      <input type="text" placeholder="email address"/>
			<button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" placeholder="username" name="username" required/>
	
      <input type="password" placeholder="password" name="password" required/>
	
      <button id="myBtn">login</button>
		
      <p class="message">Not registered? <a href="#">Create an account</a></p>
		
    </form>
	
  </div>
</div>
</html>