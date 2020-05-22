<?php
  include "db.php";
  include 'ChromePhp.php';

  $data = $_POST['new_todo'];
  ChromePhp::log($data);
  $dateTime = date("Y-m-d H:i:s");
  ChromePhp::log($dateTime);
  db_write("todo", $dateTime, $data, 0);
  echo("hello");
?>