<?php
  include "../includes/dbcon.php";
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if (isset($_SESSION['login_status']) && isset($_GET['id'])) {
    if (($_SESSION['user_type'] == 3)){
      header("Location:../user_dashboard.php");
      exit;
    }
  } else {
    header("Location:../login.php");
    exit;
  }
  $id = $_GET['id'];
  $dbcon->query("UPDATE users SET status='Muted' WHERE id=$id");
  if($dbcon->affected_rows>0) header("Location:users.php");

?>