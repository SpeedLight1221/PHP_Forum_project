<section class="flex w-[80%] flex-col ">
    <h1 class=" text-center mt-[5%] text-3xl font-bold ">Create a Post</h1>
    <p id="ErrorTag" class=" text-center mt-[5%] font-bold ">
        
    
    <?php 
    if($redirArg == "ExistsError")
    echo "This category already exists";
    elseif($redirArg == "userError")
    echo "You need to be logged in";



?>
</p>

    <form id="pForm" class=" align-middle flex flex-col items-center " method="post" action="../Backend/Forms/CategoryForm.php">

        <input type="text" name="CategoryInput" class=" m-[5%] bg-white w-[80%]"></input>

        <label for="TitleInput" class=" text-xl">Category name: </label>
        <input type="text" name="TitleInput" class="w-[80%]  h-[5%]">

        <label for="ContentInput" class="text-xl mt-[5%]">Description: </label>
        <textarea  type="text" name="ContentInput" class="w-[80%]  h-[50vh] text-start align-top content-start  "></textarea>


        <div class="mt-[1%] mb-[5%] flex flex-row w-[80%] align-middle">
            <div class=" w-auto h-[3vh] bg-cyan-600 rounded-2xl p-2 content-center ">
                <label for="SpoilerCheck" class=" font-bold">Mark as a Spoiler? :</label>
                <input type="checkbox" name="SpoilerCheck">
            </div>

            <div class=" ml-5ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff w-auto h-[3vh] bg-cyan-600 rounded-2xl p-2 content-center ">
                <label for="NSFWCheck" class=" font-bold">Mark as NSFW? :</label>
                <input type="checkbox" name="NSFWCheck">
            </div>
        </div>


        <input type="submit" value="Post" class="w-[80%]  h-[5%]">
    </form>

    <script>
        let form = document.getElementById("pForm");
        form.addEventListener("submit", (e) => {
          
            let data = new FormData(form);

          

            if (data.get("TitleInput").length < 4) 
            {
                e.preventDefault();
                document.getElementById("ErrorTag").innerText = "Title must be atleast 4 characters long!"
                return;
            } 


            if (data.get("ContentInput").length < 25)
            {
                e.preventDefault();
                document.getElementById("ErrorTag").innerText = "Description must be atleast 25 characters long!"
                return;
            }
           
        });

       


    </script>
</section>