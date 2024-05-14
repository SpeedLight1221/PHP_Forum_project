<section class="flex w-[80%] flex-col ">
    <h1 class=" text-center mt-[5%] text-3xl font-bold ">Create a Post</h1>

    <form class=" align-middle flex flex-col items-center " method="post" action="/Backend/Controls/PostControl.php">

        <select class=" m-[5%] bg-white w-[80%]"></select>

        <label for="TitleInput" class=" text-xl">Title:</label>
        <input type="text" name="TitleInput" class="w-[80%]  h-[5%]">

        <label for="ContentInput" class="text-xl mt-[5%]">Text:</label>
        <textarea type="text" name="ContentInput" class="w-[80%]  h-[50vh] text-start align-top content-start  "></textarea>


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



    </form>


</section>