<?php 
session_start();


require "../../Backend/Controls/const.php";
require "../Controls/db.php";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $content = $_REQUEST['contentInput'];
    $post = $_REQUEST['PostID'];

    echo $content;
    echo $post;

    if(db_Post_Select($post) == null)
    {
        header("Location: ../../Frontend/index.php");
            die();
    }

    $author = DB_user_IDFromName($_SESSION['Logged_User']);
    echo $author;
    

    db_comment_Insert($post,$author,$content);

    header("Location: ../../Frontend/index.php?contentPath=PostDetails.php&contentArg=" . $post);
    die();

}


?>