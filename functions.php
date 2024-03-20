
<?php

function connect() {
    $conn = new mysqli('localhost', 'root', '', 'project');
    return $conn;
}

function td() {
    echo "<td>";
}