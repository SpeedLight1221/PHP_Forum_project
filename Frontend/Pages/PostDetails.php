<?php 

    require '../Backend/Controls/db.php';
?>

<section>

    <?php 
        $post = db_Post_Select($redirArg);
        if($post->num_rows > 0)
        {
            $row = $post->fetch_assoc();

            $user = DB_User_NameFromID($row['AuthorID']);

            echo $user . "\n".$row['ID'] . ":". $row['Title']. "\n" . $row['Content'] ;
            

        }
        else
        {
            header("Location: ../../Frontend/index.php");
            die();
        }
    
    
    ?>

        <?php include 'Comments.php' ?>

</section>

