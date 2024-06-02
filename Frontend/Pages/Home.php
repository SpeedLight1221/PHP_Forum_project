<?php require '../Backend/Controls/db.php';  ?>


<section class="flex w-[80%] mt-4 flex-col  rounded-2xl mb-2 ">
    <article class=" flex flex-col m-2  h-[50vh]  w-full rounded-lg p-2 bg-white">
        <h1 class="  text-3xl font-bold">Dev Board :</h1>
        <?php
        $dev = db_Front_DevLatest();
        if ($dev->num_rows > 0) {
            $post = $dev->fetch_assoc();
            $a = DB_User_NameFromID($post['AuthorID']);
            echo '<a style="grid-template-rows: 35% 50% 15% " class=" mt-2 mb-2 z-10 bg-cyan-500 text-black h-[75%] w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2  rounded-2xl" href="index.php?contentPath=PostDetails.php&contentArg=' . $post['ID'] . '">
                        <p class=" col-start-1 row-start-1 font-semibold text-2xl">' . $post['Title'] . ' </p><p class=" text-xl text-end  col-start-2 row-start-1">' . $a . ' </p>

                        <p class=" text-xl break-words row-start-2 row-end-3 col-start-1 col-end-3">' . $post['Content'] . ' </p>
                        <p class=" font-semibold text-xl row-start-3 row-end-4 col-start-1 col-end-2"> Posted on: ' . $post['Posted'] . '</p>
                        </a>';
        }



        ?>


    </article>
    <article class=" flex flex-col m-2 min-h-[25%] h-[50vh] w-full rounded-lg p-2 bg-white">
        <h1 class="  text-3xl font-bold">Top Post :</h1>
        <?php
        $dev = db_Front_TopPost();
        if ($dev->num_rows > 0) {
            $post = $dev->fetch_assoc();
            $rate = DB_Post_Rating($post['MainID']);

            $a = DB_User_NameFromID($post['AuthorID']);
            echo '<a style="grid-template-rows: 35% 50% 15% " class=" mt-2 mb-2 z-10 bg-cyan-500 text-black h-[75%] w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2  rounded-2xl" href="index.php?contentPath=PostDetails.php&contentArg=' . $post['MainID'] . '">
            <p class="  col-start-1 row-start-1 font-semibold text-2xl">' . $post['Title'] . ' </p><p class=" text-xl text-end  col-start-2 row-start-1">' . $a . ' </p>

            <p class=" text-xl break-words row-start-2 row-end-3 col-start-1 col-end-3">' . $post['Content'] . ' </p>
            <p class=" font-semibold text-xl row-start-3 row-end-4 col-start-1 col-end-2"> Rating: ' . $rate . '</p>
            </a>';
        }



        ?>
    </article>
    <article class=" flex flex-col m-2 min-h-[25%] h-[50vh] w-full rounded-lg p-2 bg-white">
        <h1 class="  text-3xl font-bold">Most Active Category :</h1>
        <?php
        $cat = db_Front_TopCat();
        if ($cat->num_rows > 0) {
            $post = $cat->fetch_assoc();



            echo '<a style="grid-template-rows: 35% 50% 15% " class=" mt-2 mb-2 z-10 bg-cyan-500 text-black h-[75%] w-[100%] pl-4 pr-4 pt-2 pb-2 grid grid-cols-2 rounded-2xl" href="index.php?contentPath=Category.php&contentArg=' . $post['MainID'] . '">
                        <p class="  col-start-1 row-start-1 font-semibold text-2xl">' . $post['MainTitle'] . ' </p><p class=" text-xl text-end  col-start-2 row-start-1"> </p>
                        <p class=" text-xl break-words row-start-2 row-end-3 col-start-1 col-end-3">' . $post['Description'] . ' </p>
                        <p class=" font-semibold text-xl row-start-3 row-end-4 col-start-1 col-end-2">  Posts: ' . $post['count'] . '</p>
                        </a>';
        }



        ?>
    </article>
</section>