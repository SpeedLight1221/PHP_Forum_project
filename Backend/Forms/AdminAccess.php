<?php 
session_start();
require "../Controls/db.php";
require "../../Backend/Controls/const.php";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $usr = $_REQUEST['Username'];
    $pass = $_REQUEST['Pass'];
    $code = $_REQUEST['Code'];


    $data = db_Admin_ByUser($usr);
    
        if($data->num_rows > 0){

            $row = $data->fetch_assoc();

            if($row['Hash'] != _hash($pass))
            {
                header("Location: ../../Frontend/index.php");
                die();
            }


            if($row['Code'] != _hash($code))
            {
                header("Location: ../../Frontend/index.php");
                die();
            }

            $_SESSION['AdminAccess'] = time()+1800;
            header("Location: ../../Frontend/Administration.php");
                die();
        }
        else
        {
            header("Location: ../../Frontend/index.php");
                die();
        }
    

}


?>