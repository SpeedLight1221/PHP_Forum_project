<?php
    require 'db.php';
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $User = $_REQUEST['uid'];
        $Post = $_REQUEST['pid'];
        $Val = $_REQUEST['val'];

        error_log($User."__".$Val."___".$Post);
       
    }


    $current = db_rating_ByUserPost($User,$Post);

    if($current->num_rows >0)
    {
        db_rating_update($User,$Post,$Val);
    }
    else
    {
        db_rating_insert($User,$Post,$Val);
    }

?>