<section>
    <form id="cForm" method="post" action="../Backend/Forms/CommentForm.php">
        <textarea style="width: 100%; height: 20vh;" name="contentInput"></textarea>
        <input type="text" name="PostID" value="<?php echo $redirArg ?>"  style="display: none;" >
        <input type="submit">
    </form>
    <p id="ErrorTag"></p>
    <script>
        let form = document.getElementById("cForm");
        form.addEventListener("submit", (e) => {
          
            let data = new FormData(form);

            if('<?php echo $_SESSION['Logged_UUID'] ?>' == '')
            {
               document.getElementById("ErrorTag").innerText = "You must log in in order to post comments!"
                e.preventDefault();
            }

           
        
        });

    </script>


    <?php echo $redirArg; ?>

    <div>
        <?php 
        
            $comments = db_comment_SelectAllByPost($redirArg);
            if($comments->num_rows >0)
            {
                while($row = $comments->fetch_assoc())
                {
                    echo '<div><h2>'. DB_User_NameFromID($row['AuthorID']) . '<h2><br><p>' . $row['Content'] . '</p>';
                }
            }
        
        
        
        ?>

    </div>




</section>