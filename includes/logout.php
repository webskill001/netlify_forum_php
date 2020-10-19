<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    echo "logout";
    session_destroy();
    header("Location: ../index.php?st=loggedout");
}
else
{
    header("Location: ../index.php");
}
?>