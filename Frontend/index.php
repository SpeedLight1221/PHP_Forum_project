

<?php 
    session_start();

if(isset($_REQUEST['contentPath']))
{
    $redirPath ='Pages/'. $_REQUEST['contentPath'];
}
else
{
    $redirPath = 'Pages/Home.php';
}

if(isset($_REQUEST['contentArg']))
{
    $redirArg = $_REQUEST['contentArg'];
}
else
{
    $redirArg = "";
}




?>





<!DOCTYPE html>
<html lang="en" class=" h-full " >
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styles/output.css" rel="stylesheet">
    <title>OpenForums</title>


   
</head>
<body class=" min-h-[100vh]">
    
    <?php
            include 'Templates/header.php';
            
            include 'Templates/navbar.php';
        ?>
    
    <section class=" justify-center flex  z-[0] min-h-[75vh] h-auto  bg-cyan-800  ">

        <div class="w-[85%] h-auto  justify-center flex">
           <?php
            include $redirPath;
           ?>
            
        </div>

    </section>

   
    <?php 
    
        include 'Templates/footer.php';
    ?>
    
    
</body>
</html>
