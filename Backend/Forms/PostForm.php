<?php

session_start();


require "../../Backend/Controls/const.php";
require "../Controls/db.php";

if (!isset($_SESSION['Logged_UUID']) && is_null($_SESSION['Logged_UUID'])) {
    header("Location: ../../Frontend/index.php?contentPath=Post.php&contentArg=userError");
    die();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $category = -1;
    $author = -1;
    $title = $_REQUEST['TitleInput'];
    $content = $_REQUEST['ContentInput'];
    $isNsfw = 0;
    $isSpoiler = 0;
    
    error_log("huh");
    if (isset($_REQUEST['NSFWCheck'])) {
        $isNsfw = 1;
    }
    if (isset($_REQUEST['SpoilerCheck'])) {
        $isSpoiler = 1;
    }

    $catReq = db_Category_GetID($_REQUEST['CategoryInput']);
    if ($catReq->num_rows > 0) {
        
        $category = $catReq->fetch_assoc()['ID'];
        
    } else {
        header("Location: ../../Frontend/index.php?contentPath=Post.php&contentArg=categoryError");
        die();
    }

    $usr = db_User_SelectByName($_SESSION['Logged_User']);
    if ($usr->num_rows > 0) {
        $r = $usr->fetch_assoc();
        $author = $r['ID'];
    }
    $id = db_Post_Insert($title, $content, date("Y-m-d"), $isNsfw, $isSpoiler, $author, $category,0);
    

    header("Location: ../../Frontend/index.php?contentPath=PostDetails.php&contentArg=" . $id);
    
    die();
}
