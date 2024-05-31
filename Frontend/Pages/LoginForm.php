<section class="flex w-[30%] mt-16 flex-col bg-cyan-700  rounded-2xl mb-[5%]">
<h1 class=" text-center mt-[1%] text-3xl font-bold ">Login</h1>
<?php 
        $err = "";
        if(isset($_REQUEST['error']))
        {
            if($_REQUEST['error'] == "user")
            {
                $err = "An Account with this username doesn't exist";
            }
            else if ($_REQUEST['error']== "password")
            {
                $err = "Incorrect password";
            }
        
            
        }

        
       
    ?>



<p id="ErrorTag"><?php print($err);?></p>
    <form id="lForm" method="post" action="../Backend/Forms/Login.php" class=" align-middle flex flex-col items-center ">

        <label for="Username"  class="font-semibold text-xl" >Username:</label>
        <input class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]  h-[5vh]" type="text" minlength="4" maxlength="40" name="Username" required>
        <label for="Pass" class="font-semibold text-xl">Password:</label>
        <input class="bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]  h-[5vh]" type="password" minlength="8" name="Pass" required>
        <input type="submit" class="w-[80%] font-semibold bg-cyan-600  border-cyan-800 border-[3px] rounded-2xl mb-[2%] mt-[2vh]  h-[5vh] ">
    </form>
</section>