<?php
session_start();
require_once 'functions/pdo_connection.php';
require_once 'functions/helpers.php';
?>
<link rel="stylesheet" href="<?= asset('css/bootstrap.min.css')?>" media="all" type="text/css">
<link rel="stylesheet" href="<?= asset('css/style.css')?>" media="all" type="text/css">
<nav class="navbar navbar-expand-lg navbar-dark bg-blue ">

    <a class="navbar-brand " href="<?= url('panel')?>">PHP tutorial</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse " data-target="#navbarSupportedContent "
            aria-controls="navbarSupportedContent " aria-expanded="false" aria-label="Toggle navigation ">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent ">
        <ul class="navbar-nav mr-auto ">
            <?php
            if ($_SERVER['REQUEST_URI'] === '/blog-project/index.php'){
            ?>
        <li class="nav-item active">
        <?php
        }
        else{
        ?>
            <li class="nav-item">
                <?php
                }
                ?>
                <a class="nav-link " href="<?= url('index.php') ?>">Home <span class="sr-only ">(current)</span></a>
            </li>
            <?php
            global $pdo;
            $query = "SELECT * FROM categories";
            $statement = $pdo->prepare($query);
            $statement->execute();
            $categories = $statement->fetchAll();
            foreach ($categories as $category) {
                if ($_SERVER['REQUEST_URI'] === '/blog-project/category.php?category_id=' . $category->id) {
                    ?>
                    <li class="nav-item active">
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                    <?php
                }
                ?>
                <a class="nav-link "
                   href="<?= url('category.php?category_id=' . $category->id) ?>"><?= $category->name ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>

    <section class="d-inline ">
        <?php
        if (isset($_SESSION['user'])) {
            ?>
            <a class="text-decoration-none text-white px-2 " href="<?= url('auth/logout.php') ?>">logout</a>
            <?php
        } else {
            ?>
            <a class="text-decoration-none text-white px-2 " href="<?= url('auth/register.php') ?>">register</a>
            <a class="text-decoration-none text-white " href="<?= url('auth/login.php') ?>">login</a>
            <?php
        }
        ?>
    </section>
</nav>