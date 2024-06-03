<section class="flex w-[100%] mt-4 flex-col  rounded-2xl mb-2 ">
    <div class=" mt-6 mb-6  grid place-items-center bg-cyan-700 pt-[5%] pr-[10%] pl-[10%] rounded-2xl">
        <form id="cForm" method="post" action="../Backend/Forms/CommentForm.php" class="w-[90%]  grid place-items-center">
            <textarea style="width: 100%; height: 20vh;" name="contentInput" class="rounded-2xl p-2"></textarea>
            <input type="text" name="PostID" value="<?php echo $redirArg ?>" style="display: none;">
            <input type="submit" value="Comment" class="w-[80%] font-semibold bg-cyan-600  border-cyan-800 border-[3px] rounded-2xl mb-[2%] mt-[2vh]  h-[5vh] ">
        </form>
        <p id="ErrorTag"></p>
        <script>
            let form = document.getElementById("cForm");
            form.addEventListener("submit", (e) => {

                let data = new FormData(form);

                if ('<?php echo $_SESSION['Logged_UUID'] ?>' == '') {
                    document.getElementById("ErrorTag").innerText = "You must log in in order to post comments!"
                    e.preventDefault();
                }



            });
        </script>


       

        <section class="w-[95%]">
            <?php

            $comments = db_comment_SelectAllByPost($redirArg);
                if($comments->num_rows >0)
                {
                    while($row = $comments->fetch_assoc())
                    {
                        echo ' <article class=" mt-8 mb-8 flex-col flex min-h-[10vh] border-l-8 pl-6">
                        <a href="index.php?contentPath=UserPage.php&contentArg='.$row['Username'].'"><h2 class=" text-xl font-semibold">'.$row['Username'] .' says:</h2></a>
                        <p>'. $row['Content'] .'</p>
                        <p class=" mt-2 text-sm">'. $row['Posted'].'</p>
                        </article>';
                    }
                }
            ?>

           
       

        </section> 
    </div>




</section>