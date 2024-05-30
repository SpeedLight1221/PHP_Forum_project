<section>
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
    <form id="lForm" method="post" action="../Backend/Forms/Login.php">

        <label for="Username">Username:</label><br>
        <input type="text" minlength="4" maxlength="40" name="Username" required><br>
        <label for="Pass">Password:</label><br>
        <input type="password" minlength="8" name="Pass" required><br>
        <input type="submit"><br>
    </form>
</section>