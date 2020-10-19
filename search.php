<?php
include "includes/header.php";
include "includes/navbar.php";

$errorMessage="true";
$search=$_GET['search'];
echo '<!-- search results -->
<div class="container p-2 px-5">
<h2>Search results for <em>"'. $search.'"</em>.</h2>';
$sql="select * from threads where match (thread_title,thread_content) against ('$search')";
$res=mysqli_query($conn,$sql);
$i=0;
while($row=mysqli_fetch_assoc($res))
{
    $i+=1;
    $id=$row['thread_id'];
    $errorMessage="false";
    $title=$row['thread_title'];
    $desc=$row['thread_content'];
    echo '<div class="pt-2 ml-3">
            <h4><a href="thread.php?thd='.$id.'" class="text-dark">'.ucwords($title).'</a></h4>
            <p>'.ucwords($desc).'</p>
          </div>';
}
echo'<h5>'. $i .' Search results found.</h5>';
if($errorMessage=="true")
{
    echo '<div class="jumbotron">
            <h2 class="display-4">No search results.</h2>
            <p class="lead">Please try with different search string.</p>
          </div>';
}
echo '</div>';

include "includes/footer.php";
?>