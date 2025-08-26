<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/check-login.php';

global $pdo;

if (isset($_GET['post_id']) && $_GET['post_id'] !== '') {

    $sql = "SELECT * FROM posts WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch();

    if ($post === false) {
        redirect('panel/post');
    }
    $status = ($post->status == 1) ? 0 : 1;

    $query = "UPDATE posts SET status = ? WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$status, $post->id]);
    redirect("panel/post");
}
