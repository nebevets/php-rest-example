<?php

$type = $_GET['type'];

echo '<h1>This is the test file</h1>';

echo "<h1>Request Type: $type</h1>";

if(isset($_GET['id'])){
    echo "<h1>We have an ID: $_GET[id]</h1>";
}
