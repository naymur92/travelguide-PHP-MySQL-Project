<?php
  // Initialize base url
  if(!defined('base_url')) define('base_url','http://localhost/travelguide-v2/');

  // create database connection
  define("HOST", "localhost");
  define("USER", "root");
  define("PASS", "");
  define("DB_NAME", "travelguide_v2");

  $dbcon = new mysqli(HOST, USER, PASS, DB_NAME);

?>