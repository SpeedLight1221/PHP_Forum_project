<?php 

require "../Backend/Controls/db.php";
        if(!isset($_SESSION['AdminAccess']))
        {
            header("Location: ../Frontend/index.php");
            die();
        }
        else if ($_SESSION['AdminAccess'] < time())
        {
            unset($_SESSION['AdminAccess']);
            header("Location: ../Frontend/index.php");
            
            die();
        }
        
    
    ?>
    
    <section class=" p-4 grid grid-cols-3 grid-rows-9 h-full w-full">
        <article style="grid-row-end: 9;" class=" overflow-scroll mr-4 row-start-1  bg-cyan-500 h-full rounded-2xl flex flex-col items-center">
            <h1 class=" ml-[2%]  h-fit text-center text-2xl font-extrabold font-sans">Recent Posts:</h1>
            <?php
            $recents = db_Post_SelectRecent();
            if($recents->num_rows > 0)
            {
                while($row =$recents->fetch_assoc())
                {
                    echo '<a href="index.php?contentPath=PostDetails.php&contentArg='.$row['ID'].'" class=" grid grid-cols-3 grid-rows-3 m-4 rounded-lg p-1 min-h-[15%] w-[90%] bg-white">
                    <h3 class="mr-4 col-start-1 col-end-2">'.$row['ID'].'</h3>
                    <h3 class=" col-start-2 col-end-4 mr-4 break-words">'.$row['Title'].'</h3>
                    <p class="mr-4 row-start-2 col-start-1 col-end-2">NSFW : '.$row['NSFW'].'</p>
                    <p class="mr-4 row-start-2 col-start-2 col-end-3"> Spoiler : '.$row['Spoiler'].'</p>
                    <p class="mr-4 row-start-2 col-start-3 col-end-4"> Author ID : '.$row['AuthorID'].'</p>
                    <p class=" row-start-3  col-start-1 col-end-4 break-words">'.$row['Content'].'</p>
                </a>';
                }
            }



            ?>
            
        </article>
        <article class=" p-4 h-fit bg-cyan-500 row-start-1 row-end-3 col-start-2 col-end-4 rounded-2xl">
        <h1 class=" ml-[2%]  h-fit text-center text-2xl font-extrabold font-sans">Ban Users:</h1>
        <p> <?php 
            if($_REQUEST['error'] == "AdminBan")
            {
                echo "This User is an Admin and Cannot be Banned";
            }
          
        ?></p>
            <form action="Administration.php" method="POST" class=" m-2 w-full h-[25%]">
            <input type="text" name="val" required>
                <label> By ID
                    <input type="radio" name="type" checked value="By ID"></label>
                <label> By Name
                    <input type="radio" name="type" value="By Name"></label>
                <input class=" bg-white p-1 ml-4" type="submit" name="submit" value="Search User">
            </form>
            <?php 
                if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['submit'] == "Search User")
                {
                    
                    $val = $_REQUEST["val"];
                    $type = $_REQUEST["type"];
                    if($type == "By ID" )
                    {   
                        if(is_numeric($val)) {
                            $usr = db_User_SelectByID($val);
                        }
                      
                    }
                    else
                    {
                        $usr = db_User_SelectByName($val);
                    }


                    if($usr->num_rows >0)
                    {
                        $row = $usr->fetch_assoc();

                        echo '<section class=" h-[75%]">
                        <div class=" bg-white min-h-[100%] rounded-lg p-2 w-full">
                            <p class=" h-[15%] text-2xl font-bold">'. $row["Username"].'</p>
                            <p class=" h-[10%] text-xl font-semibold">'. $row["Registred"].'</p>
                            <p class=" h-[10%]  font-semibold"> Banned till: '. $row["bannedTill"].'</p>
                            <form method="post" action="../Backend/Forms/Ban.php" class=" mt-4 h-[65%] flex flex-col">
                                <input type="date" name="date" class=" h-[7vh] bg-cyan-600 rounded-lg p-2">
                                <input type="text" name="id" value="'.$row['ID'].'" style="display: none;">
                                <input type="submit" name="submit" value="Ban" class="mt-2 font-semibold">
                            </form>
                        </div>
                    </section>';
                    }



                }

            
            
            
            
            ?>
        </article>


        <article class=" p-4 mt-4 bg-cyan-500 row-start-3 row-end-5 col-start-2 col-end-4 h-fit flex flex-col rounded-2xl">
        <h1 class=" ml-[2%]  h-fit text-center text-2xl font-extrabold font-sans">Delete Post:</h1>
            <form action="Administration.php" method="POST" class=" m-2 w-full ">
                <input type="text" name="ID" required>

                <input class=" bg-white p-1 ml-4" type="submit" name="submit" value="Search Post by ID">
            </form>
            <?php 
                if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['submit'] == "Search Post by ID")
                {
                    
                    $val = $_REQUEST["ID"];
                    
                    $post = db_Post_Select($val);


                    if($post->num_rows >0)
                    {
                        $row = $post->fetch_assoc();

                        echo '<section class="  ">
                        <div class="h-[20vh] overflow-scroll  flex flex-col bg-white min-h-[100%] rounded-lg p-2 w-full">
        
                            <p class=" text-2xl font-bold">'. $row['Title'].'</p>
                            <p class="  text-xl font-semibold">'. $row['Posted'].'</p>
                            <p class="  text-xl font-semibold">BY '. $row['AuthorID'].'</p>
                            <P class=" text-xl font-semibold">NSFW: '. $row['NSFW'].' --- Spoiler:'. $row['Spoiler'].' </P>
                            <p class="break-words">'. $row['Content'].' </p>
        
                        </div>
                        <form method="post" action="../Backend/Forms/Ban.php"   class=" mt-4  flex flex-col">
                            <input type="text" name="id" value="'. $row['ID'].'" style="display: none;">
                            <input type="submit" name="submit" value="Delete" class=" bg-red-200 mt-2 font-semibold">
                        </form>
                    </section>';
                    }



                }

            
            
            
            
            ?>
            
        </article>

        <article style="grid-row-end: 7; grid-row-start:5; " class=" p-4 mt-4 bg-cyan-500 row-start-5 row-end-7 col-start-2 col-end-4 h-fit flex flex-col rounded-2xl">
        <h1 class=" ml-[2%]  h-fit text-center text-2xl font-extrabold font-sans">Grant Admin Access:</h1>
        <p> <?php 
            if($_REQUEST['error'] == "AlreadyAdmin")
            {
                echo "This User is already an Admin";
            }
            elseif($_REQUEST['error'] == "Granted")
            {
                echo "Access Granted";
            }
        ?></p>
            <form action="../Backend/Forms/Ban.php" method="POST" class=" m-2 w-full ">
                <label for="ID" >User ID</label>
                <input class="m-2" type="text" name="ID" required>
                <label for="Pass" >Admin Access Code</label>
                <input class="m-2" type="text" name="Code" required>

                <input class=" bg-white p-1 ml-4" type="submit" name="submit" value="Grant Access">
            </form>
            
                
            
        </article>

    </section>