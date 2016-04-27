<?php
include("check.php");
include("addphoto.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Photo</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h4>Welcome <?php echo $login_user;?> <a href="photos.php" style="font-size:18px">Photos</a>||<a href="searchphotos.php" style="font-size:18px">Search</a>||<a href="logout.php" style="font-size:18px">Logout</a></h4>

<div class="main">

<div class="formbox">
    <form method="post" action="" enctype="multipart/form-data">
        <label>Title</label><br>
        <input type="text" name="title" placeholder="title" /><br><br>
        <label>Description:</label><br>
        <textarea name="desc" cols="40" rows="5"  ></textarea><br><br>
        <!-- conversion of html tags-->
    <?php
    if (isset($_POST['desc']))
        $desc=htmlentities(trim($_POST['desc']), ENT_NOQUOTES);
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    ?>
        <label>Image File:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <?php
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        ?>
        <input type="submit" name="submit" value="Submit Photo" />
    </form>
    <div class="msg"><?php echo $msg;?></div>
</div>
    </div>
</body>
</html>