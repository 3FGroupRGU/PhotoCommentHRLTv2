<?php
$msg = "";
if(isset($_POST["submit"]))
{
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $username=mysqli_real_escape_string ($db, $name);
    $password=mysqli_real_escape_string ($db, $password);
    $email=mysqli_real_escape_string ($db, $email);

    $sql="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
        $msg = "Sorry...This email already exists...";
    }
    else
    {
        //echo $name." ".$email." ".$password;
        $query = mysqli_query($db, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')")or die(mysqli_error($db));
        if($query)
        {
            $msg = "Thank You! you are now registered. click <a href='index.php'>here</a> to login";
        }

    }
}
?>