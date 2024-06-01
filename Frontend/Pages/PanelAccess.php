<section class="flex w-[30%] mt-4 flex-col  rounded-2xl mb-2 ">
    <form id="aForm" method="post" action="../Backend/Forms/AdminAccess.php" class="  align-middle flex flex-col items-center ">

        <label for="Username" class="font-semibold text-xl">Username:</label>
        <input class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]  h-[5vh]" type="text" minlength="4" maxlength="40" name="Username" required>
        <label for="Pass" class="font-semibold text-xl">Password:</label>
        <input class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]  h-[5vh]" type="password" minlength="8" name="Pass" required>
        <label for="Pass" class="font-semibold text-xl">Access Code:</label>
        <input class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]  h-[5vh]" type="password"  name="Code" required>
        <input type="submit" value="Access" class="w-[80%] font-semibold bg-cyan-600  border-cyan-800 border-[3px] rounded-2xl mb-[2%] mt-[2vh]  h-[5vh] ">
    </form>
</section>