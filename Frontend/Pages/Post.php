<section class="flex w-[80%] mt-16 flex-col bg-cyan-700  rounded-2xl mb-[5%] ">
    <h1 class=" text-center mt-[1%] text-3xl font-bold ">Create a Post</h1>
    <p id="ErrorTag" class=" text-center mt-[5%] font-bold "><?php 
    if($redirArg == "categoryError"){
        echo "The selected category doesn't exist!"; }
    else if ($redirArg == "restrictedError")
        echo "You cannot post in the selected category";
    ?></p>

    <form id="pForm" class=" align-middle flex flex-col items-center " method="post" action="../Backend/Forms/PostForm.php">
        
        <label for="CategoryInput" class=" self-start ml-[2.5%] font-semibold text-xl">Category:</label>
        <input type="text" name="CategoryInput" class=" bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]"></input>

        <label for="TitleInput" class=" self-start ml-[2.5%] mt-[5%] font-semibold text-xl">Title:</label>
        <input type="text" name="TitleInput" class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]  h-[5%]">

        <label for="ContentInput" class=" self-start ml-[2.5%] font-semibold text-xl mt-[5%]">Text:</label>
        <textarea  type="text" name="ContentInput" class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl  w-[95%]   h-[50vh] text-start align-top content-start  "></textarea>


        <div class="mt-[1%] mb-[5%] flex flex-row w-[95%] align-middle">
            <div class=" w-auto h-[3vh] bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl p-3 content-center ">
                <label for="SpoilerCheck" class=" font-semibold">Mark as a Spoiler? :</label>
                <input type="checkbox" name="SpoilerCheck">
            </div>

            <div class=" ml-2 w-auto h-[3vh] bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl p-3 content-center ">
                <label for="NSFWCheck" class=" font-semibold ">Mark as NSFW? :</label>
                <input type="checkbox" name="NSFWCheck">
            </div>
        </div>


        <input type="submit" value="Post" class="w-[80%] font-semibold bg-cyan-600  border-cyan-800 border-[3px] rounded-2xl mb-[2%]  h-[5%]">
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
                document.getElementById("ErrorTag").innerText = "Content must be atleast 25 characters long!"
                return;
            }
           
        });

       


    </script>
</section>