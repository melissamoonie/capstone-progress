<?php  
include("../../config/config.php");
include("../classes/User.php");
include("../classes/Post2.php");

$limit = 10; //Number of posts to be loaded per call

$posts = new Post($con, $_REQUEST['userLoggedIn']);
$posts->loadPostsFriends($_REQUEST, $limit);
?>