<?php
  include "../includes/dbcon.php";
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if (isset($_SESSION['login_status'])) {
    if (($_SESSION['user_type'] == 3)) {
      header("Location:../user_dashboard.php");
      exit;
    }
  } else {
    header("Location:../login.php");
    exit;
  }

  if(isset($_GET['close_id'])) {
    $id = $_GET['close_id'];
    $sql = "UPDATE packages SET p_status='Closed' WHERE p_id=$id";
  } else if(isset($_GET['publish_id'])) {
    $id = $_GET['publish_id'];
    $sql = "UPDATE packages SET p_status='Available' WHERE p_id=$id";
  } else{
    header("Location:packages.php");
    exit;
  }
  $dbcon->query($sql);
  if($dbcon->affected_rows>0) header("Location:packages.php");

?>