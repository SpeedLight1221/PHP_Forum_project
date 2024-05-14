
    <hr class=" border-0 h-2 m-0 bg-slate-600" />
    <nav class=" z-[9] bg-cyan-800 h-[5vh] sticky  grid grid-rows-1 grid-cols-2">
        <div class=" flex flex-nowrap bg-purple-800 col-start-1 col-end-2">
            <form method="POST" action="/Backend/Controls/Redirect.php">
                <input type="submit" value="Home" name="Direction" class="text-base align-middle text-center w-[10vw]">
                <input type="submit" value="Categories" name="Direction" class="text-base align-middle  text-center w-[10vw]">
                <input type="submit" value="Post" name="Direction" class="text-base align-middle  text-center w-[10vw]">
            </form>


        </div>
        <div class=" text-base flex-row-reverse flex flex-nowrap bg-purple-200 col-start-2 col-end-3">
            <form>
        <input type="submit" class=" text-base align-middle text-center w-[10vw]">
        <input type="submit" class="text-base align-middle text-center w-[10vw]">
        </form>
        </div>

    </nav>
