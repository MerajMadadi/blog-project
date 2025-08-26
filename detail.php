<?php
require_once 'functions/helpers.php';
require_once 'functions/pdo_connection.php';
if (!isset($_GET['post_id']) || $_GET['post_id'] == '') {
    redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>" media="all" type="text/css">
</head>
<body>
<section id="app">
    <?php require_once "layouts/top-nav.php" ?>
    <section class="container my-5">
        <!-- Example row of columns -->
        <section class="row">
            <section class="col-md-12">
                <?php
                global $pdo;
                $query = "SELECT posts.*, categories.name AS categoryName FROM posts JOIN categories ON posts.category_id = categories.id WHERE posts.id = ? AND posts.status = 1";
                $statement = $pdo->prepare($query);
                $statement->execute([$_GET['post_id']]);
                $post = $statement->fetch();
                if ($post !== false) {
                    ?>
                    <h1><?= $post->title ?></h1>
                    <h5 class="d-flex justify-content-between align-items-center">
                        <a href="<?= url('category.php?category_id=' . $post->category_id)?>"><?= $post->categoryName ?></a>
                        <span class="date-time"><?= $post->created_at ?></span>
                    </h5>
                    <article class="bg-article p-3">
                        <img class="float-right mb-2 ml-2" style="width: 18rem;"
                             src="<?= asset('images/posts/' . $post->image) ?>" alt="No image">
                        <?= $post->body ?></article>
                    <?php
                } else {
                    ?>
                    <section>post not found!</section>
                    <?php
                }
                ?>
            </section>

        </section>
    </section>

</section>
<script src="<?= asset('js/jquery.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
</body>
</html>