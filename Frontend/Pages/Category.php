<section class="flex w-[80%] mt-4 flex-col  rounded-2xl mb-2 ">
    <?php require '../Backend/Controls/db.php'; 
        $CTitle = "Category";
        $CDesc = "Description";
        $cat = db_Category_SelectByID($redirArg);

        if($cat->num_rows > 0)
        {
            while($row = $cat->fetch_assoc())
            {
                $CTitle = $row['Title'];
                $CDesc = $row['Description'];
            }
        }
        else
        {
            $CTitle = "Error - Category not found";
            $CDesc = "Please return to home page";
        }

    
    
    ?>

    <div class="bg-cyan-700 flex  mt-2 flex-col items-center rounded-2xl mb-[5%] w-full  min-h-[25vh] p-[1vh]">
        <h1 class=" text-white font-extrabold text-4xl"><?php echo $CTitle ?></h1>
        <p class=" max-w-[90%] text-balance text-center break-words "><?php echo $CDesc ?></p>
    </div>

    <div class="bg-cyan-700 flex  mt-2 flex-col items-center rounded-2xl mb-[5%]  min-h-[50vh] p-[2vw]">
        <?php
       

            $posts = db_Post_SelectAllByCategory($redirArg);


            if ($posts->num_rows > 0) {


                while ($row = $posts->fetch_assoc()) {
    
                    $t = $row['Title'];
                    $r = $row['Rating'];
                    $a = DB_User_NameFromID($row['AuthorID']);
                    $nsfw = $row['NSFW'];
                    $spoiler= $row['Spoiler'];

                    if($spoiler ==1 && $nsfw == 1)
                    {
                        echo  '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=Category.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl"><span class="font-extrabold text-purple-600">Marked as NSFW</span>+<span class=" text-red-700 font-extrabold"> !![[SPOILERS]]!!-------------</span> '.$t.' </p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                        continue;
                    }
                    else if($spoiler == 1)
                    {
                        echo  '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=Category.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl"><span class=" text-red-700 font-extrabold"> !![[SPOILERS]]!!-------------</span> '.$t.'</p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                        continue;
                    }
                    else if($nsfw == 1)
                    {
                         echo '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=Category.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl"><span class="font-extrabold text-purple-600">Marked as NSFW </span> '.$t.' </p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                    }
                    else
                    {
                        echo '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=Category.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl">'.$t.' </p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                    }

                  


                }
            }
        
        ?>

<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=Category.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl">'.$t.' </p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>
       

    </div>

</section>