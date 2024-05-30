<section>
<br>
            
        <?php 
            require '../Backend/Controls/db.php';

            $posts = db_Post_SelectAllByCategory($redirArg);


            if ($posts->num_rows > 0) {


                while ($row = $posts->fetch_assoc()) {
    
                    echo '<a href="index.php?contentPath=Post.php&contentArg='.$row['ID'].'"><h1>'. $row['Title'] .'</h1></a>';
                }
            }
        
        ?>   
        
</section>