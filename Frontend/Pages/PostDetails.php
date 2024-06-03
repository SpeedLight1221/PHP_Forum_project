<?php

require '../Backend/Controls/db.php';
?>

<section class="flex w-[80%] mt-4 flex-col  rounded-2xl mb-2 ">

    <?php
    $Current_User_Rating = 0;
    $uid = DB_user_IDFromName($_SESSION['Logged_User']);
    $CUR = db_rating_ByUserPost($uid, $redirArg);
    if ($CUR->num_rows > 0) {
        $row = $CUR->fetch_assoc();
        $Current_User_Rating = $row['Val'];
    }








    $post = db_Post_Select($redirArg);
    $rate = DB_Post_Rating($redirArg);
    $content = "";
    $title = "";
    $author = "";
    $category = "";
    $date = "";
    $other = "";
    if ($post->num_rows > 0) {
        $row = $post->fetch_assoc();

        $author = DB_User_NameFromID($row['AuthorID']);

        $category = DB_Category_NameFromID($row['CategoryID']);

        $content = $row['Content'];

        $date = $row['Posted'];

        $title = $row['Title'];




        if ($row['NSFW'] == 1) {
            $other .= "This post was marked as NSFW.  ";
        }

        if ($row['Spoiler'] == 1) {
            $other .= "This post contains Spoilers.";
        }
    } else {
        header("Location: ../../Frontend/index.php");
        die();
    }

    ?>

    <article class="bg-cyan-700 flex  mt-2 flex-col items-center rounded-2xl mb-[5%]  min-h-[50vh] p-[1vh]">
        <div class=" items-center w-full flex">
            <button id="plus" class=" flex justify-center items-center text-2xl text-center  font-extrabold rounded-xl w-[1.5em] h-[1.5em] bg-white">+</button>
            <p id="rating" class="text-center text-xl ml-4 mr-4"><?php echo $rate ?></p>
            <button id="minus" class=" flex items-center justify-center font-extrabold text-center text-2xl rounded-xl w-[1.5em] h-[1.5em] bg-white ">-</button>
            <h1 class=" w-[90%] ml-4 text-white font-extrabold text-3xl"><?php echo $title; ?></h1>
        </div>
        <div class=" mt-4 items-center w-full flex ">
            <p>Posted by: <a href='href="index.php?contentPath=UserPage.php&contentArg=' class=" font-semibold"><?php echo $author; ?></a>
                in: <span class=" font-semibold"><?php echo $category; ?></span>
                on <span class=" font-semibold"><?php echo $date; ?></span> <br> <span><?php echo $other ?></span></p>

        </div>
<<<<<<< HEAD
        <p class="break-words m-5 leading-8 mt-10">
=======
        <p class=" m-5 leading-8 mt-10">
>>>>>>> 6398dfc19c91e7be9e7754e9355141f0324b0bf5
            <?php echo $content; ?>
        </p>
        <script>

            let rating = <?php echo $rate ?>;
            let usrRating = <?php echo $Current_User_Rating?>;

            let pBtn = document.getElementById("plus");
            let mBtn = document.getElementById("minus");

            let val = <?php echo $Current_User_Rating ?>;

            ChangeColors();


            pBtn.addEventListener("click",(e)=>{
                if(val ==1)
                {
                    val = 0;
                }
                else
                {
                    val = 1;
                }
                ChangeColors();
            })

            mBtn.addEventListener("click",(e)=>{
                if(val ==-1)
                {
                    val = 0;
                }
                else
                {
                    val = -1;
                }
                ChangeColors();
            })


            window.addEventListener("beforeunload", (e)=>{
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function(){}
                xhttp.open("POST","../Backend/Controls/RatingHandler.php",true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send(`uid=<?php echo $uid ?>&val=${val}&pid=<?php echo $redirArg ?>`);
                
            });





            function ChangeColors() {
                console.log(val);
                if (val == 1) {
                    pBtn.classList.remove("bg-white");
                    pBtn.classList.add("bg-cyan-500");
                    mBtn.classList.add("bg-white");
                    mBtn.classList.remove("bg-cyan-500");
                } else if (val == -1) {
                    mBtn.classList.remove("bg-white");
                    mBtn.classList.add("bg-cyan-500");
                    pBtn.classList.add("bg-white");
                    pBtn.classList.remove("bg-cyan-500");
                }
                else
                {
                    mBtn.classList.remove("bg-cyan-500");
                    pBtn.classList.remove("bg-cyan-500");
                    mBtn.classList.add("bg-white");
                    pBtn.classList.add("bg-white");
                }


                document.getElementById("rating").innerText = rating- usrRating + val ;
            }
        </script>


    </article>


    <?php include 'Comments.php'
    ?>

</section>