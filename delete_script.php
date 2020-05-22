<?php

  include "db.php";
  include 'ChromePhp.php';


  ChromePhp::log($data);
  $data = $_POST['id'];
  
  print_r($data);
  db_delete("todo", $data);

?>