<?php include "./includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_POST['p_id'])) {
  if ($_SESSION['user_type'] != 3){
    header("Location:./managing/index.php");
    exit;
  } 
} else {
  header("Location:login.php");
  exit;
}

$package_id = $_POST['p_id'];
$user_id = $_SESSION['user_id'];

// echo $package_id;
// echo $user_id;

?>