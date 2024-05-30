<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{


$direction = htmlspecialchars($_POST['Direction']);
   
    if(isset($direction))
    {

        if($direction == 'Categories')
        {
            header("Location: ../../Frontend/index.php?contentPath=CategoriesList.php");
            die();
        }   
        else if ($direction == 'Home')
        {
            header("Location: ../../Frontend/index.php");
            die();
        }
        else if($direction == 'Post')
        {
            header("Location: ../../Frontend/index.php?contentPath=Post.php");
            die();
        }
        else if($direction == 'DBTEST')
        {
            header("Location: ../../Frontend/index.php?contentPath=Category.php");
            die();
        }
        else if($direction == 'Register')
        {
            header("Location: ../../Frontend/index.php?contentPath=RegisterForm.php");
            die();
        }
        else if($direction == 'Login')
        {
            header("Location: ../../Frontend/index.php?contentPath=LoginForm.php");
            die();
        }
        else if($direction == 'Log Out')
        {
            header("Location: ../Forms/LogOut.php");
            die();
        }
        else if($direction == 'New Category')
        {
            header("Location: ../../Frontend/index.php?contentPath=NewCategory.php");
            die();
        }



        print $direction;
    }
}


?>