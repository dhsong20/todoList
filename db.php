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










// $user = 'root';
// $pass = '';
// $db = 'hello';

// $db = new mysqli('localhost',$user,$pass,$db) or die("unable to connect");

// $sql = "SELECT * FROM users";
// $result = $db->query($sql);

// $data = array();

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " Name: " . $row["name"]. " age:" . $row["age"]. "<br>";
//         array_push($data,$row);
//     }
// } else {
//     echo "0 results";
// }

// print_r($data);
// $db->close();
?>