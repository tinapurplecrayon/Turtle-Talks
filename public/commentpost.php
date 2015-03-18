<?php require_once("../incudes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    /*if(isset($_POST["comment"])) {
        $comment = $_POST['comment'];
        if(empty($comment)) {
            $message = "Invalid comment";
        } else {
            $query = "INSERT INTO comments (content, user_id, post_id) VALUES ('{$comment}', '{$_SESSION['user_id']}', '{$_SESSION['post_id']}')"; //the id's are not working, can not access them from the users/post table
            $result = mysqli_query($connect, $query); 
            if($result) {
                $message = "Success, your comment was added!";   
            } else {
                $message = "Sorry, something went wrong!"; 
            }
            $comment = "";
            $user_id= "";
            $post_id= "";
        }
    }*/
?> 
