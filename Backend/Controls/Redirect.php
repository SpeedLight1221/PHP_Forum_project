<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{


$direction = htmlspecialchars($_POST['Direction']);
   
    if(isset($direction))
    {

        if($direction == 'Categories')
        {
            header("Location: /Frontend/index.php?contentPath=CategoriesList.php");
            die();
        }
        else if ($direction == 'Home')
        {
            header("Location: /Frontend/Templates/test.html");
            die();
        }
        else if($direction == 'Post')
        {
            header("Location: /Frontend/index.php?contentPath=Post.php");
            die();
        }
    }
}


?>