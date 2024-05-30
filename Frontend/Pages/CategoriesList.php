<section>
    <form method="POST" action="../Backend/Controls/Redirect.php">
        <input type="submit" name="Direction" value="New Category">
    </form>

    <div>
        <?php
        require '../Backend/Controls/db.php';

        $categories = db_Category_SelectAll();
        
  

        if ($categories->num_rows > 0) {


            while ($row = $categories->fetch_assoc()) {

                echo '<a href="index.php?contentPath=Category.php&contentArg='.$row['ID'].'"><h1>'. $row['Title'] .'</h1></a>';
            }
        }
        ?>


    </div>

</section>