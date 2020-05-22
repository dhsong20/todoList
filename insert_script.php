<?php
  include "db.php";
  $data = $_POST['new_todo'];
  db_write("todo", Date("Y/m/d"), $data, 0);
  echo("hello");
?>