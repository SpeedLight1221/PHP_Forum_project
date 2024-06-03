


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
$catgory_selectByID = $conn->prepare("SELECT * FROM category where ID= ?");

$post_SelectAllByCategory = $conn->prepare("SELECT * FROM post WHERE CategoryID = ? ORDER BY Posted desc");
$post_SelectAllByCategory_Rating = $conn->prepare("SELECT * FROM post LEFT JOIN postrating on post.ID = postrating.PostID WHERE post.CategoryID = ? GROUP BY post.ID ORDER BY SUM(postrating.Val) desc");
$post_insert = $conn->prepare("INSERT INTO post (Title,Content,Posted,NSFW,Spoiler,AuthorID,CategoryID) VALUES (?,?,?,?,?,?,?)");
$post_select = $conn->prepare("SELECT * FROM post  WHERE ID = ?");
$post_selectRecent = $conn->prepare("SELECT * FROM post ORDER BY posted LIMIT 5");
$post_countByCategory = $conn->prepare("SELECT COUNT(post.ID) FROM post WHERE CategoryID = ?");

$post_selectByUser = $conn->prepare("SELECT * FROM post WHERE AuthorID = ? ORDER BY Posted desc");
$post_SelectAllByUser_Rating = $conn->prepare("SELECT * FROM post LEFT JOIN postrating on post.ID = postrating.PostID WHERE post.AuthorID = ? GROUP BY post.ID ORDER BY SUM(postrating.Val) desc");

$front_DevLatest = $conn->prepare("SELECT * FROM post WHERE CategoryID = 1 ORDER BY Posted desc LIMIT 1 ");
$front_TopPost = $conn->prepare("SELECT *, post.ID as MainID FROM post LEFT JOIN postrating on post.ID = postrating.PostID GROUP BY post.ID ORDER BY SUM(postrating.Val) desc LIMIT 1" );
$front_TopCategory = $conn->prepare("SELECT *,category.Title as MainTitle, category.ID as MainID, Count(post.ID) as count FROM category LEFT JOIN post on category.ID = post.CategoryID GROUP BY category.ID ORDER BY Count(post.ID) desc LIMIT 1");

$comments_selectAllByPost = $conn->prepare("SELECT * FROM comment INNER JOIN users on comment.AuthorID = users.ID  WHERE comment.PostID = ? ORDER BY comment.Rating");
$comment_insert = $conn->prepare("INSERT INTO comment (Content, AuthorID, PostID, Posted) VALUES (?,?,?,?)");

$rating_selectByPost = $conn->prepare("SELECT * FROM postrating WHERE PostID = ?");
$rating_SelectByUserPost = $conn->prepare("SELECT * FROM postrating WHERE PostID = ? AND AuthorID = ?");
$rating_update = $conn->prepare("UPDATE postrating SET Val = ? WHERE PostID = ? AND AuthorID = ?");
$rating_insert = $conn->prepare("INSERT INTO postrating (Val,AuthorID,PostID) VALUES (?,?,?)");


$admin_SelectByUser = $conn->prepare("SELECT *, administration.Hash as Code FROM administration INNER JOIN users on administration.AccountID = users.ID WHERE users.Username = ?");

$ban_user = $conn->prepare("UPDATE `users` SET bannedTill = ? WHERE id = ?");
$delete_post = $conn->prepare("DELETE FROM `post` WHERE ID = ? ");
$admin_Insert = $conn->prepare("INSERT INTO administration(AccountID, Hash) VALUES (?,?)");
$admin_Select = $conn->prepare("SELECT * FROM administration WHERE AccountID = ?");

if($conn->connect_error){
    die("Connection failed:". $connection->connect_error);
}


function db_Admin_SelectByID($id)
{
    global $admin_Select;
    $admin_Select->bind_param("i",$id);
    $admin_Select->execute();
    return $admin_Select->get_result();
}

function DB_IsAdmin($id) : bool
{
    if(db_Admin_SelectByID($id)->num_rows >0)
    {
        return true;
    }
    else
        return false;
}

function db_Admin_Insert($uid,$hash)
{
    global $admin_Insert;
    $admin_Insert->bind_param("is",$uid,$hash);
    $admin_Insert->execute();
}

function db_Ban_user($val,$id)
{
    global $ban_user;
    $ban_user->bind_param("si",$val,$id);
    $ban_user->execute();
}

function db_Delete_post($id)
{
    global $delete_post;
    $delete_post->bind_param("i",$id);
    $delete_post->execute();
}


function db_Admin_ByUser($name)
{
    global $admin_SelectByUser;
    $admin_SelectByUser->bind_param("s",$name);
    $admin_SelectByUser->execute();
    return $admin_SelectByUser->get_result();
}



function db_Front_DevLatest()
{
    global $front_DevLatest;
    $front_DevLatest->execute();
    return $front_DevLatest->get_result();
}

function db_Front_TopPost()
{
    global $front_TopPost;
    $front_TopPost->execute();
    return $front_TopPost->get_result();
}

function db_Front_TopCat()
{
    global $front_TopCategory;
    $front_TopCategory->execute();
    return $front_TopCategory->get_result();
}


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

function db_Category_SelectByID($id)
{
    global $catgory_selectByID;
    $catgory_selectByID->bind_param('i',$id);
    $catgory_selectByID->execute();
    return $catgory_selectByID->get_result(); 
}

function DB_Category_NameFromID($id)
{
    $cat = db_Category_SelectByID($id);
    if($cat->num_rows >0)
    {
        return $cat->fetch_assoc()['Title'];
    }
    else
    {
        return "error";
    }
}

function db_Post_ByUser($id)
{
    global $post_selectByUser;
    $post_selectByUser->bind_param("i",$id);
    $post_selectByUser->execute();
    return $post_selectByUser->get_result();
}

function db_Post_ByUserOrderByRating($id)
{
    global $post_SelectAllByUser_Rating;
    $post_SelectAllByUser_Rating->bind_param("i",$id);
    $post_SelectAllByUser_Rating->execute();
    return $post_SelectAllByUser_Rating->get_result();
}

function db_Post_SelectAllByCategory($catID)
{
    global $post_SelectAllByCategory;
    $post_SelectAllByCategory->bind_param("i",$catID);
    $post_SelectAllByCategory->execute();
    return $post_SelectAllByCategory->get_result();
}
function db_Post_Insert($Title,$Content,$Posted,$NSFW,$Spoiler,$AuthorID,$CategoryID)
{


    global $post_insert;
    $post_insert->bind_param("sssiiii",$Title,$Content,$Posted,$NSFW,$Spoiler,$AuthorID,$CategoryID);
    $post_insert->execute();
    return $post_insert->insert_id;
}

function db_Post_Select($ID){
    global $post_select;
    $post_select->bind_param("i",$ID);
    $post_select->execute();
    return $post_select->get_result();

}

function db_Post_SelectRecent()
{
    global $post_selectRecent;
    $post_selectRecent->execute();
    return $post_selectRecent->get_result();
}

function db_Post_CountyByCategory($cat)
{
    global $post_countByCategory;
    $post_countByCategory->bind_param("i",$cat);
    $post_countByCategory->execute();
    return $post_countByCategory->get_result();
}

function db_Post_SelectByCategory_OrderByRating($cat)
{
    global $post_SelectAllByCategory_Rating;
    $post_SelectAllByCategory_Rating->bind_param("i",$cat);
    $post_SelectAllByCategory_Rating->execute();
    return $post_SelectAllByCategory_Rating->get_result();
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
    $comment_insert->bind_param("siis",$Content,$author,$post,date("Y-m-d"));
    $comment_insert->execute();
    return $comment_insert->insert_id;
}


function db_rating_ByPost($id)
{
    global $rating_selectByPost;
    $rating_selectByPost->bind_param("i",$id);
    $rating_selectByPost->execute();
    return $rating_selectByPost->get_result();
}

function db_rating_ByUserPost($uid,$pid)
{
    global $rating_SelectByUserPost;
    $rating_SelectByUserPost->bind_param("ii",$pid,$uid);
    $rating_SelectByUserPost->execute();
    return $rating_SelectByUserPost->get_result();
}

function db_rating_update($uid,$pid,$val)
{
    global $rating_update;
    $rating_update->bind_param("iii",$val,$pid,$uid);
    $rating_update->execute();
}

function db_rating_insert($uid,$pid,$val)
{
    global $rating_insert;
    $rating_insert->bind_param("iii",$val,$uid,$pid);
    $rating_insert->execute();
    
}



function DB_Post_Rating($id)
{
    $val =0;
    $s =db_rating_ByPost($id);
    if($s->num_rows >0)
    {
        while($r = $s->fetch_assoc())
        {
            $val += $r['Val'];
        }
    }

    return $val;
}


?>










































