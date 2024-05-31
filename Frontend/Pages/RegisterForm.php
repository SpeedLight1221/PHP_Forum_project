<section class="flex w-[30%] mt-16 flex-col bg-cyan-700  rounded-2xl mb-[5%]">
<h1 class=" text-center mt-[1%] text-3xl font-bold ">Register</h1>

    <?php 
        $err = "";
        if(isset($_REQUEST['error']))
        {
            if($_REQUEST['error'] == "name")
            {
                $err = "Username can only contain Letters, numbers and undescores!";
            }
            else if ($_REQUEST['error']== "pass")
            {
                $err = "Password must contain atleast one Uppercase and a Lowercase letter, a digit and one special symbol (_#$&@*!:%)";
            }
            else if($_REQUEST['error']== "exists")
            {
                $err = "A User with this username already exists, please selected a different one";
            }
            
        }
       
    ?>


    <p id="ErrorTag"><?php print($err);?></p>
    <form id="rForm" method="post" action="../Backend/Forms/Register.php"  class=" align-middle flex flex-col items-center ">

        <label for="Username" class="font-semibold text-xl">Username:</label>
        <input type="text" minlength="4" maxlength="40" name="Username" required class=" bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]">
        <label for="Pass" class="font-semibold text-xl">Password:</label>
        <input type="password" minlength="8" name="Pass" required class=" bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]">
        <label for="PassCheck" class="font-semibold text-xl">Repeat Password:</label>
        <input type="password" minlength="8" name="PassCheck" required class=" bg-cyan-700 border-cyan-800 border-[3px] rounded-2xl w-[95%]">
        <input type="submit" class="w-[80%] font-semibold bg-cyan-600  border-cyan-800 border-[3px] rounded-2xl mb-[2%] mt-[2vh]  h-[5vh] ">
    </form>

    <script>
        let form = document.getElementById("rForm");
        form.addEventListener("submit", (e) => {
          
            let data = new FormData(form);

          

            if (data.get("Pass") == data.get("PassCheck")) 
            {
            
            } else {
                e.preventDefault();
                document.getElementById("ErrorTag").innerText = "Passwords don't match!"

            }
           
        });

       


    </script>



</section>