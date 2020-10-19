<?php

include "database.php";
if(isset($_POST['signup']))
{
    
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $sql="select * from users where username='$user'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==0)
    {
        
        if($pass===$cpass)
        {
            $pass=password_hash($pass,PASSWORD_BCRYPT);
            $sql="INSERT INTO `users` (`username`,`user_email`, `password`, `timestamp`) VALUES ('$user','$email', '$pass', current_timestamp())";
            $res=mysqli_query($conn,$sql);
            echo $res;
            if($res)
            {
                $_SESSION['successmessage']='<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                            <strong>Success! </strong>Signup successfuly, Login to continue.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                header("Location: ../index.php?status=signupsuccess");
            }
        }
        else
        {
            $_SESSION['passnotmatchmessage']='<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <strong>Failed!</strong> passwords do not match.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
        header("Location: ../index.php");    
        }
    }
    else
    {
        $_SESSION['emailExistmessage']='<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Failed!</strong> Username already exists. Please try with different email address.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        header("Location: ../index.php");
    }
}

?>