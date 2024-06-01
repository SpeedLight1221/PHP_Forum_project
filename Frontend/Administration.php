<!DOCTYPE html>
<html lang="en" class=" h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styles/output.css" rel="stylesheet">
    <title>Admin panel</title>
</head>

<body class="bg-cyan-800 h-full">
    <header class="h-[15vh] z-10">
        <div class=" items-center  m-0 h-full bg-cyan-800 flex">
            <p class=" ml-[2%]  h-fit text-center text-5xl font-extrabold font-sans"><span class=" text-cyan-500 ">OPEN</span>FORUMS<span class=" text-4xl "> Admin Panel</span></p>

        </div>
        <hr class=" stroke-4 border-4">
    </header>
    <section class=" p-4 grid grid-cols-3 grid-rows-4 h-full w-full">
        <article class=" mr-4 row-start-1 row-end-5 bg-cyan-500 h-full rounded-2xl flex flex-col items-center">
            <?php
            /*$recents = db_Post_SelectRecent();
            if($recents->num_rows > 0)
            {
                while($row =$recents->fetch_assoc())
                {

                }
            }*/



            ?>
            <a href="index.php?contentPath=Category.php&contentArg='.id'" class=" grid grid-cols-3 grid-rows-3 m-4 rounded-lg p-1 min-h-[15%] w-[90%] bg-white">
                <h3 class="mr-4 col-start-1 col-end-2">IDDDD </h3>
                <h3 class=" col-start-2 col-end-4 mr-4 break-words">TItleeeeeeeeeeeeeeeeeeeeeeeee</h3>
                <p class="mr-4 row-start-2 col-start-1 col-end-2">NSFW :</p>
                <p class="mr-4 row-start-2 col-start-2 col-end-3"> Spoiler:</p>
                <p class="mr-4 row-start-2 col-start-3 col-end-4">by ID</p>
                <p class=" row-start-3  col-start-1 col-end-4 break-words">ssssssssssssssssssssss</p>
            </a>
        </article>
        <article class=" p-4 bg-cyan-500 row-start-1 row-end-3 col-start-2 col-end-4 rounded-2xl">
            <form action="Administration.php" method="POST" class=" w-full h-[25%]">
                <input type="text" name="srch">
                <label> By ID
                    <input type="radio" name="type" value="By ID"></label>
                <label> By Name
                    <input type="radio" name="type" value="By Name"></label>
                <input class=" bg-white p-1 ml-4" type="submit" name="submit" value="Search User">
            </form>
            <section class=" h-[75%]">
                <div class=" bg-white min-h-[100%] rounded-lg p-2 w-full">
                    <p class=" h-[15%] text-2xl font-bold">User</p>
                    <p class=" h-[10%] text-xl font-semibold">2000-25-25</p>
                    <form class=" mt-4 h-[75%] flex flex-col">
                        <input type="date" name="date" class=" h-[7vh] bg-cyan-600 rounded-lg p-2">
                        <input type="text" name="id" style="display: none;">
                        <input type="submit" name="submit" value="Ban" class="mt-2 font-semibold">
                    </form>
                </div>
            </section>
        </article>


        <article class=" p-4 mt-4 bg-cyan-500 row-start-3 row-end-5 col-start-2 col-end-4 h-full flex flex-col rounded-2xl">
            <form action="Administration.php" method="POST" class=" m-2 w-full ">
                <input type="text" name="srch">

                <input class=" bg-white p-1 ml-4" type="submit" name="submit" value="Search Post by ID">
            </form>
            <section class="  ">
                <div class="h-[20vh] overflow-scroll  flex flex-col bg-white min-h-[100%] rounded-lg p-2 w-full">

                    <p class=" text-2xl font-bold">Title</p>
                    <p class="  text-xl font-semibold">2000-25-25</p>
                    <p class="  text-xl font-semibold">BY iddddd</p>
                    <P class=" text-xl font-semibold">NSFW: --- Spoiler: </P>
                    <p class="break-words"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo minima aperiam debitis illum quibusdam esse, totam voluptatibus, exercitationem sint nesciunt distinctio, recusandae itaque doloribus voluptates asperiores! Tempore sequi perferendis laudantium. </p>

                </div>
                <form class=" mt-4  flex flex-col">
                    <input type="text" name="id" style="display: none;">
                    <input type="submit" name="submit" value="Delete" class=" bg-red-200 mt-2 font-semibold">
                </form>
            </section>
        </article>

    </section>
</body>

</html>