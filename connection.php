<?php
//define('DB_SERVER', 'eu-cdbr-azure-north-e.cloudapp.net');
//define('DB_USERNAME', 'b007c3ffbd1a09');
//define('DB_PASSWORD', 'e4d0b324');
//define('DB_DATABASE', 'rgutest_cmm503_HRLT');
//$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

//prepared procedure 'Login1'
$mysqli = new mysqli("eu-cdbr-azure-north-e.cloudapp.net","b007c3ffbd1a09", "e4d0b324", "rgutest_cmm503_HRLT");
if($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}{
    if(!$mysqli->query("DROP PROCEDURE IF EXISTS Login1") ||
        !$mysqli->query("CREATE PROCEDURE Login1(IN id_val INT) BEGIN INSERT INTO test(id) VALUES(id_val); END;"))
        {
        echo "Stored procedure creation failed:(".$mysqli->connect_errno.")".$mysqli->error;
        }
      //  }
//prepared statements - possible use within coursework
//if(!($stmt=$mysqli->prepare("INSERT INTO test(id) VALUES(?)"))) {
  //  echo "Prepare Failed: (".$mysqli->connect_errno.")".$mysqli->error;
    /*binding the parameters*/
    //$id=1;
    //if (!$stmt->bind_param("i", $id)) {
      //  echo "Binding parameters failed: (",$stmt->errno.")".$stmt->error;
    //}
    //if(!$stmt->execute()){
      //  echo "Execute failed: (".$stmt->errno. ")".$stmt->error;
   // }
}
?>
