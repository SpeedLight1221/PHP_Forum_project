<section class="flex w-[80%] mt-16 flex-col bg-cyan-700  rounded-2xl mb-[5%] ">
    <h1 class=" text-center mt-[1%] text-3xl font-bold ">Create a Category</h1>
    <p id="ErrorTag" class=" text-center mt-[5%] font-bold ">


        <?php
        if ($redirArg == "ExistsError")
            echo "This category already exists";
        elseif ($redirArg == "userError")
            echo "You need to be logged in";



        ?>
    </p>

    <form id="pForm" class=" align-middle flex flex-col items-center mb-[5%] " method="post" action="../Backend/Forms/PostForm.php">

        <label for="TitleInput" class=" self-start ml-[2.5%] mt-[5%] font-semibold text-xl">Category Name:</label>
        <input type="text" name="TitleInput" class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]  h-[5%]">

        <label for="ContentInput" class=" self-start ml-[2.5%] font-semibold text-xl mt-[5%]">Category Description:</label>
        <textarea type="text" name="ContentInput" class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl  w-[95%]   h-[50vh] text-start align-top content-start  "></textarea>


        <input type="submit" value="Post" class="w-[80%] font-semibold bg-cyan-600  border-cyan-800 border-[3px] rounded-2xl mb-[2%] mt-[2%] h-[5%]">
    </form>

    <script>
        let form = document.getElementById("pForm");
        form.addEventListener("submit", (e) => {

            let data = new FormData(form);



            if (data.get("TitleInput").length < 4) {
                e.preventDefault();
                document.getElementById("ErrorTag").innerText = "Title must be atleast 4 characters long!"
                return;
            }


            if (data.get("ContentInput").length < 25) {
                e.preventDefault();
                document.getElementById("ErrorTag").innerText = "Description must be atleast 25 characters long!"
                return;
            }

        });
    </script>
</section>