<?php

$mysqli = new mysqli("localhost","samacha2_practic","Practical@123","samacha2_bbc");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

