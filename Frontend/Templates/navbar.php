
    
    <nav class=" z-[9] bg-cyan-800 h-[7vh] sticky  grid grid-rows-1 grid-cols-2 font-bold border-gray-300  border-t-[5px] " >
        <div class=" flex flex-nowrap  bg-white col-start-1 col-end-2">
            <form method="POST" action="../Backend/Controls/Redirect.php">
                <input id="home" type="submit" value="Home" name="Direction" class="text-base align-middle h-full text-center w-[10vw] ">
                <input id="categories" type="submit" value="Categories" name="Direction" class="text-base align-middle h-full  text-center w-[10vw]">
                <input id="Post" type="submit" value="Post" name="Direction" class="text-base align-middle h-full  text-center w-[10vw]">
                
            </form>


        </div>
        <div class=" text-base flex-row-reverse flex flex-nowrap  bg-white col-start-2 col-end-3">
            <form method="POST" action="../Backend/Controls/Redirect.php">
            <?php 
            if(!isset($_SESSION['Logged_UUID']))
            {
                echo '<input id="register" type="submit" name="Direction" value="Register" class=" text-base h-full align-middle text-center w-[10vw]">';
                echo '<input id="login" type="submit" value="Login" name="Direction" class="text-base h-full align-middle text-center w-[10vw]">';
            }
            else
            {
                echo '<input type="submit" name="Direction" value="' . $_SESSION['Logged_User'].'" class=" text-base align-middle text-center w-[10vw]">';
                echo '<input type="submit" value="Log Out" name="Direction" class="text-base align-middle text-center w-[10vw]">';
            }
            
            ?>
        </form>
        </div>


        <script>
            let sel = '<?php echo $redirPath ?>';
            switch(sel)
            {
                case 'Pages/Home.php':
                    document.getElementById('home').classList.add("bg-cyan-800");
                    break;
                case 'Pages/Category.php':
                case 'Pages/CategoriesList.php':
                case 'Pages/NewCategory.php':
                    document.getElementById('categories').classList.add("bg-cyan-800");
                    break;
                case 'Pages/Post.php':
                case 'Pages/PostDetails.php': 
                    document.getElementById('Post').classList.add("bg-cyan-800");
                    break;
                case 'Pages/LoginForm.php':
                    try{document.getElementById('login').classList.add("bg-cyan-800");}
                    catch(err){}
                    break;
                    case 'Pages/RegisterForm.php':
                    try{document.getElementById('register').classList.add("bg-cyan-800");}
                    catch(err){}
                    break;
            }

        
        
        </script>

    </nav>
