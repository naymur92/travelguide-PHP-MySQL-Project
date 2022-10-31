<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_POST['new_price'])) {
  if ($_SESSION['user_type'] == 3){
    echo "Invalid request";
    exit;
  } 
} else {
  echo "Invalid request";
  exit;
}

$new_price = $_POST['new_price'];
$booking_id = $_POST['booking_id'];
// echo $new_price;
// echo $booking_id;

$sql = "UPDATE payments SET total_amount='$new_price' WHERE booking_id='$booking_id'";
$dbcon->query($sql);
if($dbcon->affected_rows==1){
  echo "Successfully Updated!";
}


?>