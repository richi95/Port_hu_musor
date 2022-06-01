<?php

$connection = mysqli_connect('localhost', 'root', '12345', 'port_tv');

if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


