<section>

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
    <form id="rForm" method="post" action="../Backend/Forms/Register.php">

        <label for="Username">Username:</label><br>
        <input type="text" minlength="4" maxlength="40" name="Username" required><br>
        <label for="Pass">Password:</label><br>
        <input type="password" minlength="8" name="Pass" required><br>
        <label for="PassCheck">Repeat Password:</label><br>
        <input type="password" minlength="8" name="PassCheck" required><br>
        <input type="submit"><br>
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