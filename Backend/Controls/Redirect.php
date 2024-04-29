<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')


$direction = htmlspecialchars( $_POST['Direction']);
   

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


?>