<?php

//  require '../Backend/Controls/db.php';
?>

<section class="flex w-[80%] mt-4 flex-col  rounded-2xl mb-2 ">

    <?php
    /* $post = db_Post_Select($redirArg);
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
        }*/

    ?>

    <article class="bg-cyan-700 flex  mt-2 flex-col items-center rounded-2xl mb-[5%]  min-h-[50vh] p-[1vh]">
        <div class=" items-center w-full flex">
            <button class=" flex justify-center items-center text-2xl text-center  font-extrabold rounded-xl w-[1.5em] h-[1.5em] bg-white">+</button>
            <p class="text-center text-xl ml-4 mr-4">0</p>
            <button class=" flex items-center justify-center font-extrabold text-center text-2xl rounded-xl w-[1.5em] h-[1.5em] bg-white ">-</button>
            <h1 class=" w-[90%] ml-4 text-white font-extrabold text-3xl"><?php echo "I Love eating rocks" ?></h1>
        </div>
        <div class=" mt-4 items-center w-full flex">
            <p>Posted by: <a href='href="index.php?contentPath=User.php&contentArg=' class=" font-semibold">User</a> 
            in: <span class=" font-semibold" >Category</span>
             on <span class=" font-semibold"> 1.1.1111</span></p>
            
        </div>
        <p class=" m-5 leading-8 mt-10">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, deleniti cupiditate dolore debitis dignissimos dolores, asperiores assumenda corporis necessitatibus, voluptatem dolor consectetur error at laboriosam ea eum itaque veritatis? Aperiam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt tenetur, modi quo voluptatum, quibusdam veniam voluptatibus deleniti ipsum suscipit dignissimos porro consequatur, aspernatur libero ab. Consectetur non placeat laborum magni.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam adipisci illum at nesciunt aspernatur, amet natus eius ea neque a odio sit nemo ipsa sed nobis. Dolores, voluptates repellendus.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum soluta, veritatis porro et minus sunt aperiam amet ducimus laudantium nam esse suscipit itaque, quia maiores rem cum, dolorum numquam nesciunt!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt cupiditate suscipit tenetur ab officia a architecto porro ea at accusantium odio minima, assumenda excepturi laborum alias totam quos dolorum modi?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere, eos exercitationem! Provident libero dolorum labore eaque commodi blanditiis voluptates? Quia nihil enim quae aspernatur architecto ex vero quidem molestiae consequatur?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci dolores molestiae dicta, a ullam et ipsa perferendis consequuntur voluptatem ex iure nobis ducimus laboriosam quibusdam eveniet! Odit, accusamus quidem!
        </p>


    </article>


    <?php  include 'Comments.php' 
    ?>

</section>