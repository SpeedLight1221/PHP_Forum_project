
<?php 
    session_start(); ?>
<!DOCTYPE html>
<html lang="en" class=" h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styles/output.css" rel="stylesheet">
    <title>Admin panel</title>
</head>

<body class="bg-cyan-800 h-full">
<header class="h-[15vh] z-10">
        <div class=" items-center  m-0 h-full bg-cyan-800 flex">
            <p class=" ml-[2%]  h-fit text-center text-5xl font-extrabold font-sans"><span class=" text-cyan-500 ">OPEN</span>FORUMS<span class=" text-4xl "> Admin Panel</span></p>

        </div>
        <hr class=" stroke-4 border-4">
    </header>
    <article class="flex flex-col items-center">
        <?php 
            if(isset($_SESSION['AdminAccess']))
            {
                include  "Pages/AdminPanel.php";
            }
            else
            {
                include "Pages/PanelAccess.php";
            }
        
        ?>
        </article>
</body>

</html>