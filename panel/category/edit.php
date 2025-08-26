<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/check-login.php';

global $pdo;

if (!isset($_GET['category_id'])) {
    redirect('panel/category/index.php');
}

$query = "SELECT * FROM categories WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_GET['category_id']]);
$category = $stmt->fetch();
if ($category === false) {
    redirect('panel/category/index.php');
}

if (isset($_POST['name']) && $_POST['name'] !== '') {
    $name = sanitize($_POST['name']);
    $query = "UPDATE categories SET name = ?, updated_at = NOW() WHERE id = ? ;";
    $statement = $pdo->prepare($query);
    $statement->execute([$name, $category->id]);

    redirect("panel/category/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>" media="all" type="text/css">
</head>
<body>
<section id="app">
    <?php require_once '../layouts/top-nav.php' ?>
    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?php require_once '../layouts/sidebar.php' ?>
            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/category/edit.php?category_id=' . $category->id)?>" method="post">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name ..." value="<?= $category->name?>">
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </section>
                </form>

            </section>
        </section>
    </section>

</section>

<script src="<?= asset('js/jquery.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
</body>
</html>
