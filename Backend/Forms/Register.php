<?php


require "../../Backend/Controls/const.php";
require "../Controls/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['Username']);
    $pass = htmlspecialchars($_POST['Pass']);
    $check = htmlspecialchars($_POST['PassCheck']);

    print($name);
    print($pass);


    if (_checkName($name)) {
        print("name checed");
    } else {
        header("Location: ../../Frontend/index.php?contentPath=RegisterForm.php&error=name");
        die();
    }



    if (_checkPass($pass)) {
        print("Password checked");
    } else {
        header("Location: ../../Frontend/index.php?contentPath=RegisterForm.php&error=pass");
        die();
    }

    if(db_User_SelectByName($name)->num_rows >0)
    {
        header("Location: ../../Frontend/index.php?contentPath=RegisterForm.php&error=exists");
        die();
    }
    else
    {
        print("noone");
    }


    try {

        db_User_Insert($name,_hash($pass),"8f83637e-d2bf-48ac-a667-d08cab18b935",date("Y-m-d"));
        header("Location: ../../Frontend/index.php?contentPath=LoginForm.php");
                die();
    } catch (Exception $e) {
        echo "error: " . $e;
    }
}
