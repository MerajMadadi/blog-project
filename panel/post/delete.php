<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/check-login.php';
global $pdo;

if (isset($_GET['post_id']) && ($_GET['post_id']) !== '') {

//    check for exists post id
    $query = "SELECT * FROM posts WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch();
    if ($post === false) {
        redirect('panel/post');
    }
   delete_image($post->image);

    global $pdo;
    $query = "DELETE FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['post_id']]);
}
redirect("panel/post");