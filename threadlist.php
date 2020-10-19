<?php
include "includes/header.php";
include "includes/navbar.php";

$id=$_GET['catid'];
$sql="select * from category where category_id='$id'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
    $title=$row['category_name'];
    $desc=$row['category_content'];

echo '<!-- jumbostrem bootstrap -->
<div class="container">
<div class="jumbotron">
  <h1 class="display-4">ipDiscuss '.$title.' forum</h1>
  <p class="lead">'.$desc.'</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
</div>
</div>';

$questionSuccess="false";
if(isset($_POST['que']))
{
    
    $q_title=$_POST['question'];
    $q_title=str_replace("<","&lt;",$q_title);
    $q_title=str_replace(">","&gt;",$q_title);

    $q_desc=$_POST['desc'];
    $q_desc=str_replace("<","&lt;",$q_desc);
    $q_desc=str_replace(">","&gt;",$q_desc);

    $user_id=$_SESSION['id'];
    $sql="INSERT INTO `threads` (`thread_title`, `thread_content`, `category_id`, `user_id`, `time&date`) VALUES ('$q_title', '$q_desc', '$id', '$user_id', current_timestamp());";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        $questionSuccess="true";
    }
}

echo '<!-- add new question -->
<div class="container mb-3">
    <h3>Add New Question</h3>';
    
    if(isset($_SESSION['loggedin']))
    {
        if($questionSuccess=="true")
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Question has been added succesfully. Wait until user reply.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
    
        echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
        <div class="form-group">
          <label for="question">Write a question</label>
          <input type="text" class="form-control" name="question" id="question"  minlength=5 maxlength=255 required aria-describedby="questionHelp">
          <small id="questionHelp" class="form-text text-muted">Question must be short and crisp.</small>
        </div>
        <div class="form-group">
            <label for="Qdescription">Question description</label>
            <textarea class="form-control" name="desc"   minlength=5 maxlength=20000 required  id="Qdescription" rows="3"></textarea>
        </div>
        <button type="submit" name="que" class="btn btn-success">Add question</button>
      </form>';
    }
    else
    {
        echo '<h5>You are not logged In ,login to continue</h5>';
    }
echo '</div>



<!--questions media objects-->
<div class="container">

<h3 class="mb-3">Questions</h3>';
$sql="select * from threads where category_id='$id'";
$res=mysqli_query($conn,$sql);
if( mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $thread_id=$row['thread_id'];
        $thread_title=$row['thread_title'];
        $thread_desc=$row['thread_content'];
        $thread_time=$row['time&date'];
        $thread_user_id=$row['user_id'];
        $sql2="select username from users where user_id='$thread_user_id'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        $thread_username=$row2['username'];

        echo '<div class="media mb-2">
                <img src="images/profile.png" width="60px" class="mr-3" alt="...">
            <div class="media-body">
            
            <h5 class="mt-0 d-inline"><a href="thread.php?thd='.$thread_id.'" class="text-dark">'.ucfirst($thread_title).'?</a> </h5>
            <p class="d-inline text-dark text-muted float-right "> sent by '.$thread_username.' at '.$thread_time.'</p>
              <p class="d-block text-dark">  '.ucfirst($thread_desc).'</p>
            </div>
            </div>';
    }
}
else
{
    echo '<div class="jumbotron">
    <h1 class="display-5">No any questions in the database.</h1>
    <p class="lead">Be the first person to ask a question</p>
  </div>';
}

echo '</div> ';
}
include "includes/footer.php";
?>