


<section class="flex w-[80%] mt-4 flex-col  rounded-2xl mb-2 ">
    <?php require '../Backend/Controls/db.php'; 
        $User = "User";
        $UID = 0;
        if(isset($_REQUEST['order']))
        {
            $order = $_REQUEST['order'];
        }
        else
        {
            $order = "Date";
        }

       
        $usr = db_User_SelectByName($redirArg);
        $User = $redirArg;

        if($usr->num_rows > 0)
        {
            while($row = $usr->fetch_assoc())
            {
                
                $UID = $row['ID'];
              
            }
        }
        else
        {
           $User = "Error User not found";
        }

    
    
    ?>

    <div class="bg-cyan-700 flex  mt-2 flex-col items-center rounded-2xl mb-[5%] w-full  min-h-[25vh] p-[1vh]">
        <h1 class=" text-white font-extrabold text-4xl"><?php echo $User ?></h1>
        
    </div>

    <div class="bg-cyan-700 flex  mt-2 flex-col items-center rounded-2xl mb-[5%]  min-h-[50vh] p-[2vw]">
        
        <form class="flex bg-cyan-500 w-full font-semibold rounded-lg" method="post" action='index.php?contentPath=Category.php&contentArg=<?php echo $redirArg ?>'>
            <label  class=" m-2">Order By:</label>
            <input type="submit" name="order" id="DateBtn" value="Date" class=" m-2" class="">
            <input type="submit" name="order" id="RatingBtn" value="Rating" class=" m-2" >
        </form>
        <script>
            let order = "<?php echo $order ?>";
            console.log(order);
            if(order == "Rating")
            {
                document.getElementById("RatingBtn").classList.add("font-bold");
                
            }
            else
            {
                document.getElementById("DateBtn").classList.add("font-bold");
               
            }
        </script>
        <?php

            if($order == "Rating")
            {
                $posts = db_Post_ByUserOrderByRating($UID);
            }
            else
            {
                $posts = db_Post_ByUser($UID);
            }

          


            if ($posts->num_rows > 0) {


                while ($row = $posts->fetch_assoc()) {
    
                    $t = $row['Title'];
                    $r = DB_Post_Rating($row['ID']);
                    $a = DB_Category_NameFromID($row['CategoryID']);  
                    $nsfw = $row['NSFW'];
                    $spoiler= $row['Spoiler'];

                    if($spoiler ==1 && $nsfw == 1)
                    {
                        echo  '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=PostDetails.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl"><span class="font-extrabold text-purple-600">Marked as NSFW</span>+<span class=" text-red-700 font-extrabold"> !![[SPOILERS]]!!-------------</span> '.$t.' </p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                        continue;
                    }
                    else if($spoiler == 1)
                    {
                        echo  '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=PostDetails.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl"><span class=" text-red-700 font-extrabold"> !![[SPOILERS]]!!-------------</span> '.$t.'</p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                        continue;
                    }
                    else if($nsfw == 1)
                    {
                         echo '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=PostDetails.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl"><span class="font-extrabold text-purple-600">Marked as NSFW </span> '.$t.' </p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                    }
                    else
                    {
                        echo '<a class=" mt-2 mb-2 bg-white w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 grid-rows-1 rounded-2xl" href="index.php?contentPath=PostDetails.php&contentArg=' . $row['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-xl">'.$t.' </p><p class=" text-end  col-start-2 row-start-1">'.$a.' </p>
                        <p class=" row-start-2 row-end-3 col-start-1 col-end-2">' . $r . '</p><p class="  text-end row-start-2 row-end-3 col-start-2 col-end-3"></p>
                        </a>';
                    }

                  


                }
            }
        
        ?>



    </div>

    



</section>
