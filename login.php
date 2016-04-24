<?php
	session_start();
	include("connection.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else {
			// Define $username and $password
			$username = $_POST['username'];
			$password = $_POST['password'];
		}
			//validating information inserted in the above field matches what is expected in username field
		{
			if (isset($_POST['username']))
				$username = stripslashes(trim($_POST['username']));
				$username = strip_tags(trim($_POST['username']));
		}
			//validating information inserted in above field matches what is expected in password field
		{
			if(isset($_POST['password']))
			$password = stripslashes(trim($_POST['password']));
			$username = strip_tags(trim($_POST['password']));
		}
		
			//Check username and password from database
			$sql="SELECT userID FROM users WHERE username='$username' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC) ;
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username; // Initializing Session
				header("location: photos.php"); // Redirecting To Other Page
			}else
			{
				$error = "Incorrect username or password.";
			}

		}
	}

?>