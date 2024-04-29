

<?php 

if(isset($_REQUEST['contentPath']))
{
    $redirPath ='Pages/'. $_REQUEST['contentPath'];
}
else
{
    $redirPath = 'Templates/test.html';
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
    
    <section class=" justify-center flex  z-[0] min-h-[75vh] h-[75vh] bg-gradient-to-tr from-cyan-900 to-cyan-600  ">

        <div class=" h-full bg-black bg-opacity-20 w-[85%] min-h-full">
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
