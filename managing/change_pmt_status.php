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


  if(isset($_GET['confirm_pmt_id'])){
    $pmt_id = $_GET['confirm_pmt_id'];
    $sql = "UPDATE payments SET `payment_status`='Confirmed' WHERE pmt_id=$pmt_id";
  } else if(isset($_GET['partial_pmt_id'])){
    $pmt_id = $_GET['partial_pmt_id'];
    $sql = "UPDATE payments SET `payment_status`='Partial' WHERE pmt_id=$pmt_id";
  } else if(isset($_GET['invalid_pmt_id'])){
    $pmt_id = $_GET['invalid_pmt_id'];
    $sql = "UPDATE payments SET `payment_status`='Invalid' WHERE pmt_id=$pmt_id";
  }

  if(isset($sql)){
    $dbcon->query($sql);
    if($dbcon->affected_rows == 1){
      echo "<script>window.location.href='payments.php'</script>";
    }
  }
  
?>