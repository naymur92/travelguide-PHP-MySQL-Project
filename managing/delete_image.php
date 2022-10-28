<?php include "../includes/dbcon.php" ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_status']) && isset($_GET['id'])) {
  if ($_SESSION['user_type'] == 3) header("Location:../user_dashboard.php");
} else {
  header("Location:../login.php");
}

$id = $_GET['id'];
$image = $_GET['image'];
// echo $id;
$result = $dbcon->query("SELECT p_thumb FROM packages WHERE p_id=$id");
$row = $result->fetch_assoc();

$newImages = [];
$images = explode("|", $row['p_thumb']);
foreach ($images as $img) {
  if($img == $image) unlink("../img/packages/$image");
  else $newImages[] = $img;
}

$newImages = implode('|', $newImages);
$dbcon->query("UPDATE packages SET p_thumb='$newImages' WHERE p_id=$id");
if($dbcon->affected_rows==1) echo 'Successfully Deleted';

?>