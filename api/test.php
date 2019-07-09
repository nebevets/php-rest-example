<?php

  if(isset($_GET['type'])){
    $type = $_GET['type'];
    echo "<h1>request made with type=$type</h1>";
  }
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo "<h1>request made with type=$id</h1>";
  }
  

  echo "<h1>this is the test file in /api/test.php</h1>"

?>