<?php
include 'db.php';


$db_data = db_read('todo', "SELECT * FROM todo_list_0");



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
  <title>To Do List</title>
</head>
<body style="background-color: #F4F5F7" >
  
  <div class="to_do_wrapper">

    <div class="to_do_title">
      <h1>To Do's</h1>
    </div>

    <div class="to_do_area">
      <!-- pull from database todo's and do a foreach() php loop -->

      <?php foreach($db_data as $data): ?>

        <div class="to_do">
          <div class="to_do_value">
            <?php 
              echo $data['value'];
            ?>
          </div>

          <!-- <div class="to_do_trash">

          </div> -->

          <div class="to_do_actions">
            <button class="complete_button">Complete</button>
            <button class="delete_button"><img class="trash_can_image" src="images/trash.svg"/></button>
          </div>
          
        </div>
        <hr/>
      <?php endforeach; ?>

      <form id="todo_form" class="new_todo_form" method="POST" onsubmit="submit_form(this.value)"> 
        <textarea name=new_to_do id="new_to_do"></textarea>
        <input type=submit value="To do" name="todoSubmit"/>
      </form> 

      <script>
        function submit_form() {
   
          var val = document.getElementById('new_to_do').value
          
          if (val.length <= 0) {
            return
          }
        
          var xhttp = new XMLHttpRequest()
          var data = "new_todo=" + val
          xhttp.open("POST", "insert_script.php", true)
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send(data)
          alert(data);
        }
      </script>

      <!-- copy and paste goes here -->


    </div>

    
      


  </div>
  
</body>
</html>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

