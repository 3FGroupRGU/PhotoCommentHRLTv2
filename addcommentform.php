<?php
include("check.php");
include("addcomment.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Comment</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h4>Welcome <?php echo $login_user;?> <a href="photos.php" style="font-size:18px">Photos</a>||<a href="searchphotos.php" style="font-size:18px">Search</a>||<a href="logout.php" style="font-size:18px">Logout</a></h4>

<div class="main">

<div class="formbox">
    <form method="post" action="">
        <label>Comment:</label><br>
        <textarea name="desc" cols="40" rows="5"  ></textarea><br><br>
        <!-- conversion of html tags-->
       <?php
        if (isset($_POST['desc']))
        $desc=htmlentities(trim($_POST['desc']), ENT_NOQUOTES);
        //check string length in comment box
        if (strlen($_POST['desc'])<=256)
       $desc=htmlentities(trim($_POST['desc']), ENT_NOQUOTES);
        ?>
        <label>Photo:</label>
        <input type="text" name="photoID" value="<?php echo $_GET['id'] ?>" /><br><br>
        <!-- validating that no excess code has been added to the Photo name box -->
        <?php
        if (isset($_POST['photoID']))
        $photoID=htmlentities(trim($_POST['photoID']), ENT_NOQUOTES);
        ?>
        <input type="submit" name="submit" value="Submit Comment" />
    </form>
    <div class="msg"><?php echo $msg;?></div>
</div>
    </div>
</body>
</html>