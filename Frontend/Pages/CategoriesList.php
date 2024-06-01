<section class="flex w-[80%] mt-4 flex-col  rounded-2xl mb-2 ">
    <form method="POST" action="../Backend/Controls/Redirect.php" class=" mt-6 mb-6  grid place-items-center">
        <input type="submit" name="Direction" value="New Category" class="w-[80%] font-semibold bg-cyan-600  border-cyan-800 border-[3px] rounded-2xl mb-[2%] mt-[2vh]  h-[5vh] ">
    </form>

    <div class="bg-cyan-700 flex  mt-2 flex-col items-center rounded-2xl mb-[5%]  min-h-[50vh] p-[2vw]">
        <?php
        require '../Backend/Controls/db.php';

        $categories = db_Category_SelectAll();



        if ($categories->num_rows > 0) {


            while ($row = $categories->fetch_assoc()) {
                $c = db_Post_CountyByCategory($row['ID']);
                if($c->num_rows > 0)
                {
                    $c = $c->fetch_row()[0];
                }

                echo ' <a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=Category.php&contentArg=' . $row['ID'] . '">
                    <p class=" col-start-1 row-start-1 font-semibold text-xl">' . $row['Title'] . '</p><p class=" text-end  col-start-2 row-start-1">'.$c.'</p>
                    <p class=" row-start-2 row-end-3 col-start-1 col-end-3">' . $row['Description'] . '</p>
                    </a>';
            }
        }
        ?>




    </div>

</section>