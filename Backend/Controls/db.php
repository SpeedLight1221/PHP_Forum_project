


<?php 
define('DBHOST',"localhost");
define('DBNAME',"21ib25");
define('DBUSER',"21ib25");
define('DBPASS', "31808719");


$conn = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);




$users_ins = $conn->prepare("INSERT INTO users (Username,Hash,UUID,Registred) VALUES (?, ?, ?, ?)");
$users_selelectAll = $conn->prepare("SELECT * FROM users");
$users_selectByName = $conn->prepare("SELECT * FROM users WHERE Username = ?");
$users_selectByID = $conn->prepare("SELECT * FROM users WHERE ID = ?");

$category_selectAll = $conn->prepare("SELECT * FROM category");
$catgory_IDfromName = $conn->prepare("SELECT ID FROM category where Title= ?");
$category_insert = $conn->prepare("INSERT INTO category (Title,Description) VALUES (?,?)");

$post_SelectAllByCategory = $conn->prepare("SELECT * FROM post WHERE CategoryID = ?");
$post_insert = $conn->prepare("INSERT INTO post (Title,Content,Posted,NSFW,Spoiler,AuthorID,CategoryID,Rating) VALUES (?,?,?,?,?,?,?,?)");
$post_select = $conn->prepare("SELECT * FROM post WHERE ID = ?");



$comments_selectAllByPost = $conn->prepare("SELECT * FROM comment WHERE  PostID = ?");
$comment_insert = $conn->prepare("INSERT INTO comment (Content, AuthorID, PostID) VALUES (?,?,?)");

if($conn->connect_error){
    die("Connection failed:". $connection->connect_error);
}
else
print "Db connected!";



function db_User_Insert($name,$pass,$UUID,$reg)
{
    global $users_ins;
    $users_ins->bind_param("ssss",$name,$pass,$UUID,$reg);
    $users_ins->execute();
    $users_ins->close();
}

function db_User_SelectAll()
{
    global $users_selelectAll;
    $users_selelectAll->execute();
    return $users_selelectAll->get_result();
}

function db_User_SelectByName($name)
{
    global $users_selectByName;
    $users_selectByName->bind_param("s",$name);
    $users_selectByName->execute();
    return $users_selectByName->get_result();

}
function db_User_SelectByID($id)
{
    global $users_selectByID;
    $users_selectByID->bind_param("i",$id);
    $users_selectByID->execute();
    return $users_selectByID->get_result();

}

function DB_user_IDFromName($name)
{
    $usr = db_User_SelectByName($name);
    if($usr->num_rows >0)
    {
        return $usr->fetch_assoc()['ID'];
    }
    else
    {
        return -1;
    }
}

function DB_User_NameFromID($id)
{
    $usr = db_User_SelectByID($id);
    if($usr->num_rows >0)
    {
        return $usr->fetch_assoc()['Username'];
    }
    else
    {
        return 'N/A';
    }
}





function db_Category_SelectAll()
{

    global $category_selectAll;
    $category_selectAll->execute();
    return $category_selectAll->get_result();
}

function db_Category_GetID($name)
{
    global $catgory_IDfromName;
    $catgory_IDfromName->bind_param('s',$name);
    $catgory_IDfromName->execute();
    return $catgory_IDfromName->get_result(); 
}

function db_Category_Insert($title,$desc){
    global $category_insert;
    $category_insert->bind_param("ss",$title,$desc);
    $category_insert->execute();
    return $category_insert->insert_id;
}





function db_Post_SelectAllByCategory($catID)
{
    global $post_SelectAllByCategory;
    $post_SelectAllByCategory->bind_param("i",$catID);
    $post_SelectAllByCategory->execute();
    return $post_SelectAllByCategory->get_result();
}
function db_Post_Insert($Title,$Content,$Posted,$NSFW,$Spoiler,$AuthorID,$CategoryID,$rating)
{

    global $post_insert;
    $post_insert->bind_param("sssiiiii",$Title,$Content,$Posted,$NSFW,$Spoiler,$AuthorID,$CategoryID,$rating);
    $post_insert->execute();
    return $post_insert->insert_id;
}

function db_Post_Select($ID){
    global $post_select;
    $post_select->bind_param("i",$ID);
    $post_select->execute();
    return $post_select->get_result();

}



function db_comment_SelectAllByPost($id)
{
    global $comments_selectAllByPost;
    $comments_selectAllByPost->bind_param("i",$id);
    $comments_selectAllByPost->execute();
    return $comments_selectAllByPost->get_result();
}


function db_comment_Insert($post,$author,$Content){
    global $comment_insert;
    $comment_insert->bind_param("sii",$Content,$author,$post);
    $comment_insert->execute();
    return $comment_insert->insert_id;
}

?>










































