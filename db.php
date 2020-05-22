<?php


function db_connect($db_name) { 

  $server = 'localhost';
  $user = 'root';
  $pass = '';
  $db = $db_name;

  $database = new mysqli($server, $user, $pass, $db) or die('unable to connect to MySQL database');
  return $database;
  

}

function db_read($db_name, $sql_query) {

  $database = db_connect($db_name);
  $result = $database -> query($sql_query);
  $data = array();

  if ($result -> num_rows > 0) {

    //fetch_assoc() returns each row as an associative array
    while ($row = $result -> fetch_assoc()) {
      // echo '<pre>', print_r($row), '</pre>';
      array_push($data, $row);
    }
  }
  // else {
  //   echo "No results";
  // }

  $database -> close();
  return $data;
}


// INSERT INTO `todo_list_0` (`id`, `date`, `value`, `completion`) 
// VALUES (NULL, '2020-05-21', 'testing 3rd manual entry', '0');

function db_write($db_name, $date, $value, $completion) {

  $database = db_connect($db_name);
  $value = addslashes($value);
  $date = addslashes($date);
  $sql_query = "insert into todo_list_0(id, date, value, completion) values(null, '$date', '$value', '$completion')";
  
  
  

  $result = mysqli_query($database, $sql_query);
  if ($result) {
    echo "db write was successful";
  } else {
    echo "error in db write";
    echo mysqli_error($database);
  }
  

  $database->close(); 

}

function db_delete($db_name, $id_delete) {
  print_r("hello");
  $database = db_connect($db_name);
  $sql_query = "delete from todo_list_0 where todo_list_0.id = $id_delete";
  $result = mysqli_query($database, $sql_query);
  if ($result) {
    echo "db delete was successful";
  } else {
    echo "db delete had error";
  }

  $database -> close();

}

?>