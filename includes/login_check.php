<?php

include "database.php";
if(isset($_POST['login']))
{
    
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $sql="select password,user_id from users where username='$user'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==1)
    {
        $row=mysqli_fetch_assoc($res);
        $pass_hash=$row['password'];
        $id=$row['user_id'];
        if(password_verify($pass,$pass_hash))
        {
            $_SESSION['loggedin']=$user;
            $_SESSION['id']=$id;
            $_SESSION['loginSuccessMessage']='<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                                <strong>Success!</strong> Login successfully.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>';
            header("Location: ../index.php?st=loginsuccess");
        }
        else
        {
            $_SESSION['loginUnsuccessMessage']='<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                <strong>Sorry!</strong> Credientials do not match.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>';
            header("Location: ../index.php");
        }
    }
    else
    {
        $_SESSION['loginUnsuccessMessage']='<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <strong>Sorry!</strong> Credientials do not match.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
            header("Location: ../index.php");
    }
    
}

?>