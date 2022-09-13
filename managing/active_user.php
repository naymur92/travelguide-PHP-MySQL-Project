<?php
  include "../includes/dbcon.php";
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if (isset($_SESSION['login_status']) && isset($_GET['id'])) {
    if ($_SESSION['user_type'] == 3){
      header("Location:../user_dashboard.php");
      exit;
    }
  } else {
    header("Location:../login.php");
    exit;
  }

  $res = $dbcon->query("SELECT status FROM users WHERE id={$_GET['id']}");
  $output = $res->fetch_array();
  if($output[0] == "Disabled"){
    header("Location:users.php");  // Deny set status Active to disabled users
    exit;
  }
 
  $id = $_GET['id'];
  $dbcon->query("UPDATE users SET status='Active' WHERE id=$id");
  if($dbcon->affected_rows>0){
    header("Location:users.php");
    exit;
  }
  
?>