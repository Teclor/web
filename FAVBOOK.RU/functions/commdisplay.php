<?php
function display($bookid,$connection){
$Cquery = mysqli_query($connection, "SELECT * FROM `comments` WHERE `book_id` ='$bookid'");
$count = mysqli_query($connection,"SELECT COUNT(1) FROM `comments` WHERE `book_id` ='$bookid'");
$b = mysqli_fetch_array($count);
$n=$b[0];
for($i=0; $i<$n; ++$i) {
$comment[$i] =$Cquery->fetch_assoc();
}
$i=0;

while($i<$n){
echo'
<div style="float: top; margin-top: 10px;" class="jumbotron jumbotron-fluid">
    <div class="container" >
        <h4>'.$comment[$i]['author'].'</h4>
        <p class="lead">'.$comment[$i]['text'].'</p>
    </div>

';

    if(isset($_SESSION['user'])) {
        if($_SESSION['user'] ==1)
        echo'
        <div style="float: right; width: 100px.; margin-top: 0px;">
        <form method="post" action="handlers\commdelete.php">
        <input style="display:none" name="commid" value="'.$comment[$i]['id'].'">
        <button class="btn btn-secondary btn-lg" role="submit">
            Удалить комментарий
        </button>
        </form>
    </div>
    ';
    }
echo '</div>';
++$i;
}

}
?>