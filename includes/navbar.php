<!-- navbar -->
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">ipDiscuss-forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Top Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                        $sql="select * from category limit 5";
                        $res=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res)>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $category_name=$row['category_name'];
                                $category_id=$row['category_id'];
                                echo '<a class="dropdown-item" href="threadlist.php?catid='.$category_id.'">'.$category_name.'</a>';
                            }
                        }
                        ?>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input class="form-control mr-sm-2 col-8"  required name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0 mx-2" type="submit">Search</button>
            </form>
            <?php
            if(isset($_SESSION['loggedin']))
            {
            ?>
            <span class="text-light mx-2"><?php echo 'Welcome, '.$_SESSION['loggedin']; ?></span>
            <a href="includes/logout.php" class="btn btn-outline-success mr-2">Logout</a>
            <?php
            }
            else
            {
            ?>
            <button class="btn btn-outline-success mx-2"  type="button" data-toggle="modal" data-target="#signupmodal">Signup</button>
            <button type="button" class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#loginmodal">Login</button>
            <?php
            }
            ?>
  
        </div>
    </nav>
</div>
<?php
    include "includes/signup.php";
    include "includes/login.php";
    ?>