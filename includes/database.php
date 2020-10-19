<?php
session_start();
$conn= mysqli_connect("localhost", "root","","ipDiscuss-forum");
if(!$conn)
{
    echo "Failed to connect";
}
?>