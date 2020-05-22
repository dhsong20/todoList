<?php
  include "db.php";
  include 'ChromePhp.php';

  $data = $_POST['new_todo'];
  ChromePhp::log($data);
  db_write("todo", Date("Y/m/d"), $data, 0);
  echo("hello");
?>