<?php include "./includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_POST['p_id'])) {
  if ($_SESSION['user_type'] != 3){
    echo "not_user";
    exit;
  } 
} else {
  echo "not_logged_in";
  exit;
}

$package_id = $_POST['p_id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM wishlists WHERE user_id='$user_id' AND package_id='$package_id'";
// echo $sql;
$result = $dbcon->query($sql);
if($result->num_rows > 0){
  echo "Already in wishlist!";
} else{
  $dbcon->query("INSERT INTO wishlists VALUES(NULL, '$user_id', '$package_id', DEFAULT)");
  if($dbcon->affected_rows == 1) echo "Successfully added in wishlist!";
  else echo "Try again";
}

?>