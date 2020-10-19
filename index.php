<?php
include "includes/header.php";
include "includes/navbar.php";

if(isset($_SESSION['emailExistmessage']))
{
    echo $_SESSION['emailExistmessage'];
    unset($_SESSION['emailExistmessage']);
}

if(isset($_SESSION['passnotmatchmessage']))
{
    echo $_SESSION['passnotmatchmessage'];
    unset($_SESSION['passnotmatchmessage']);
}

if(isset($_SESSION['successmessage']))
{
    echo $_SESSION['successmessage'];
    unset($_SESSION['successmessage']);
}

if(isset($_SESSION['loginSuccessMessage']))
{
    echo $_SESSION['loginSuccessMessage'];
    unset($_SESSION['loginSuccessMessage']);
}

if(isset($_SESSION['loginUnsuccessMessage']))
{
    echo $_SESSION['loginUnsuccessMessage'];
    unset($_SESSION['loginUnsuccessMessage']);
}


echo '<!-- carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/c1.jpg" class="d-block w-100" style="height:60vh;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="images/c2.jpg" class="d-block w-100" style="height:60vh;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="images/c3.jpg" class="d-block w-100" alt="..." style="height:60vh;">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- ipDiscuss categories -->
<div class="container">
    <h3 class="text-center my-3">ipDiscuss- categories</h3>
    <div class="row">';

    $sql="select * from category";
    $res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
  $id=$row['category_id'];
  $title=$row['category_name'];
  $desc=$row['category_content'];

 echo ' <div class="mx-auto my-3" style="width:18rem;">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/card-'.$id.'.jpg">
                <div class="card-body">
                    <h5 class="card-title"><a href="threadlist.php?catid='.$id.'" class="text-dark">'.ucwords($title).'</a> </h5>
                    <p class="card-text">'.ucwords(substr($desc,0,80)).'...</p>
                    <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>';
}

  
  echo '  </div>
</div>';


include "includes/footer.php";
?>