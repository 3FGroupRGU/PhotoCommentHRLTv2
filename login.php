<?php
	session_start();

	include("connection.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else
		{

			//get users IP
			$userIP=$_SERVER['REMOTE_ADDR'];
					// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			$clean_username=mysqli_real_escape_string ($db, $username);
			$clean_password=mysqli_real_escape_string ($db, $password);

			//Check username and password from database
			$sql="SELECT userID FROM users WHERE username='$clean_username' and password='$clean_password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC) ;
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $clean_username; // Initializing Session
				header("location: photos.php"); // Redirecting To Other Page
			}else
			{
				$error = "Incorrect username or password.";
			}

		}
	}
if (isset($_POST['submit_login'])) {

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = mysqli_real_escape_string($_POST['username']);
		$password = mysqli_real_escape_string($_POST['password']);
		// id = unique primary key
		$rs = mysqli_query('SELECT id,Username,Password,Failed_logins,IP_address FROM Users WHERE Username = '.$username.'');
		$num = mysql_num_rows($rs);
		if ($num > 0) {
			$row = mysqli_fetch_array($rs);
			if ($password == $row['Password']) {
				mysqli_query('UPDATE Users SET Failed_logins = 0 WHERE id = '.$row['id'].'');
				header('location: photos.php');
			} else {
				// Failed password check
				if ($row['Failed_logins'] > 3) {

				} else {
					$ip = $_SERVER['REMOTE_ADDR'];
					if ($row['IP_address'] != $ip) {
						// New ip adress, reset failed logins
						$failed_logins = 0;
					} else {
						// Increment failed logins
						$failed_logins = $row['Failed_logins']+1;
					}
					mysqli_query('UPDATE Users SET Failed_logins = '.$failed_logins.',IP_address = '.$ip.' WHERE id = '.$row['id'].' ');
				} // End check Failed_logins > 3
			}
		} else {
			// No such Username found in database
			$error = 'no_such_username';
		} // End username check from database

	} else {
		// Either username or password is missing
		$error = 'incomplete_form';
	} // end check for username and password

} // end main submit_login check
?>