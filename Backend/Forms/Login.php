<?php 
session_start();

require "../../Backend/Controls/const.php";
require "../Controls/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['Username']);
    $pass = htmlspecialchars($_POST['Pass']);
   


    $hashed = _hash($pass);

    $found = db_User_SelectByName($name);

    if($found->num_rows >0)
    {
      

        while($row = $found->fetch_assoc())
        {
           
            if($row['Hash'] == $hashed)
            {
                
                if($row['bannedTill'] > date("Y-m-d"))
                {
                    header("Location: ../../Frontend/index.php?contentPath=LoginForm.php&error=ban&till=".$row['bannedTill']);
                die();
                }

                $_SESSION['Logged_User'] = $row['Username'];
                $_SESSION['Logged_UUID'] = $row['UUID'];
                echo $row['Username'];
                header("Location: ../../Frontend/index.php");
                die();
                break;
            }
            else
            {
                header("Location: ../../Frontend/index.php?contentPath=LoginForm.php&error=password");
                die();
            }
        }
    }
    header("Location: ../../Frontend/index.php?contentPath=LoginForm.php&error=user");
    die();



}


?>