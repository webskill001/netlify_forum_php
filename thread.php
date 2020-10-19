<?php
include "includes/header.php";
include "includes/navbar.php";

$id=$_GET['thd'];
$sql="select * from threads where thread_id='$id'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
    $title=$row['thread_title'];
    $desc=$row['thread_content'];
    $q_id=$row['user_id'];
    $sql2="select username from users where user_id='$q_id'";
    $res2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($res2);
    $q_username=$row2['username'];

echo '<!-- jumbostrem bootstrap -->
<div class="container">
<div class="jumbotron">
  <h1 class="display-4">'.ucwords($title).'?</h1>
  <p class="lead">'.ucwords($desc).'</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <i><p class="text-muted mb-0">Produced by </i><b>'.$q_username.'</b>.
</div>
</div>
<!--questions media objects-->
<div class="container">';

$commentSuccess="false";
if(isset($_POST['comment']))
{
    $user_id=$_SESSION['id'];
    $c_desc=$_POST['cdesc'];
    $c_desc=str_replace("<","&lt;",$c_desc);
    $c_desc=str_replace(">","&gt;",$c_desc);

    $sql="INSERT INTO `comments` (`user_id`, `comment_desc`, `thread_id`, `comment_time`) VALUES ('$user_id', '$c_desc', '$id', current_timestamp())";
    $res=mysqli_query($conn,$sql);
    echo $res;
    if($res)
    {
        $commentSuccess="true";
    }
}

echo '<!-- add new comment -->
<div class="container mb-3">
    <h3>Add New Comment</h3>';
    if(isset($_SESSION['loggedin']))
    {
        if($commentSuccess=="true")
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Comment has been added succesfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        
        echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-group">
                <label for="cdescription">Comment description</label>
                <textarea class="form-control" minlength=5 maxlength=20000 name="cdesc" id="cdescription" rows="3" required></textarea>
            </div>
            <button type="submit" name="comment" class="btn btn-success">Add question</button>
            </form>';
    }
    else
    {
        echo '<h5>You are not logged In ,login to continue</h5>';
    }
echo '</div>
</div>

<!--comments media objects-->
<div class="container">

<h3 class="mb-3">Questions</h3>';
$sql="select * from comments where thread_id='$id'";
$res=mysqli_query($conn,$sql);
if( mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $comment_desc=$row['comment_desc'];
        $comment_time=$row['comment_time'];
        $comment_user_id=$row['user_id'];
        $sql2="select username from users where user_id='$comment_user_id'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        $comment_username=$row2['username'];
        echo '<div class="media mb-2">
                <img src="images/profile.png" width="60px" class="mr-3" alt="...">
            <div class="media-body">
            
            <p class="mt-0 d-inline">'.ucfirst($comment_desc).'</p>
            <p class="d-inline text-dark text-muted float-right "> sent by '.$comment_username.' at '.$comment_time.'</p>
            </div>
            </div>';
    }
}
else
{
    echo '<div class="jumbotron">
    <h1 class="display-5">No any comments in database.</h1>
    <p class="lead">Be the first person to ask a comment.</p>
  </div>';
}
echo '</div>';
}
include "includes/footer.php";
?>