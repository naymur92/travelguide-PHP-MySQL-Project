<?php include "./includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_POST['w_id'])) {
  if ($_SESSION['user_type'] != 3){
    echo "Invalid request";
    exit;
  } 
} else {
  echo "Invalid request";
  exit;
}

$wishlist_id = $_POST['w_id'];

$sql = "DELETE FROM wishlists WHERE w_id='$wishlist_id'";
$dbcon->query($sql);
if($dbcon->affected_rows==1){
  echo "Successfully removed!";
}


?>