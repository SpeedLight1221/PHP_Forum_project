<?php

require "../Controls/db.php";
require "../../Backend/Controls/const.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['submit'] == "Ban") {

    $usr = DB_User_NameFromID($_REQUEST['id']);
    $data = db_Admin_ByUser($usr);


    if ($data->num_rows > 0) {
        header("Location: ../../Frontend/Administration.php?error=AdminBan");
        die();
    } else {
        $row = $data->fetch_assoc();

        db_Ban_user($_REQUEST['date'], $_REQUEST['id']);
        header("Location: ../../Frontend/Administration.php");
        die();
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['submit'] == "Delete") {


    db_Delete_post($_REQUEST["id"]);
    header("Location: ../../Frontend/Administration.php");
    die();
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['submit'] == "Grant Access") {


    $id= $_REQUEST['ID'];
    $code = $_REQUEST['Code'];

    $name = DB_User_NameFromID($id);
    if(db_Admin_ByUser($name)->num_rows >0 )
    {
        db_Delete_post($_REQUEST["id"]);
        header("Location: ../../Frontend/Administration.php?error=AlreadyAdmin");
        die();
    }
    else
    {
        db_Admin_Insert($id,_hash($code));
        header("Location: ../../Frontend/Administration.php?error=Granted");
        die();
    }



}