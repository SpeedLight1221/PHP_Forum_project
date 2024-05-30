<?php

session_start();


require "../../Backend/Controls/const.php";
require "../Controls/db.php";

if (!isset($_SESSION['Logged_UUID']) && is_null($_SESSION['Logged_UUID'])) {
    header("Location: ../../Frontend/index.php?contentPath=NewCategory.php&contentArg=userError");
    die();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $title = $_REQUEST['TitleInput'];
    $content = $_REQUEST['ContentInput'];

    $ed = db_Category_GetID($title);
    if($ed->num_rows >0)
    {
        header("Location: ../../Frontend/index.php?contentPath=NewCategory.php&contentArg=ExistsError" );

        die();
    }


    



    $id = db_Category_Insert($title, $content);

    header("Location: ../../Frontend/index.php?contentPath=NewCategory.php&contentArg=" . $id);

    die();
}
