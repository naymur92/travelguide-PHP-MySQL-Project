<?php
  include "../includes/dbcon.php";
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if (isset($_SESSION['login_status'])) {
    if($_SESSION['user_type'] == 3){
      header("Location:../user_dashboard.php");
      exit;
    }
  } else {
    header("Location:../login.php");
    exit;
  }


  if(isset($_GET['confirm_b_id'])){
    $b_id = $_GET['confirm_b_id'];
    $sql = "UPDATE bookings SET `booking_status`='Confirmed' WHERE b_id=$b_id";
  } else if(isset($_GET['cancel_b_id'])){
    $b_id = $_GET['cancel_b_id'];
    $sql = "UPDATE bookings SET `booking_status`='Cancelled' WHERE b_id=$b_id";
  } else if(isset($_GET['complete_b_id'])){
    $b_id = $_GET['complete_b_id'];
    $sql = "UPDATE bookings SET `booking_status`='Completed' WHERE b_id=$b_id";
  } else if(isset($_GET['check_b_id'])){
    $b_id = $_GET['check_b_id'];
    $sql = "UPDATE bookings SET `booking_status`='Checked' WHERE b_id=$b_id";
  }

  if(isset($sql)){
    $dbcon->query($sql);
    if($dbcon->affected_rows == 1){
      echo "<script>window.location.href='bookings.php'</script>";
    }
  }
  
?>