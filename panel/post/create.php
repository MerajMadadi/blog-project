<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/check-login.php';

if (isset($_POST['title']) && $_POST['title'] !== ''
    && isset($_POST['category_id']) && $_POST['category_id'] !== ''
    &&  isset($_POST['body']) && $_POST['body'] !== ''
    &&  isset($_FILES['image']) && $_FILES['image']['name'] !== '') {
    global $pdo;

    $query = "SELECT * FROM categories WHERE id = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['category_id']]);
    $category = $stmt->fetch();

       $fileName = upload_image($_FILES['image']);

       if ($category !== false && $fileName !== false) {

           $query = "INSERT INTO posts SET 
                  title = ?,
                  body = ?,
                  category_id = ?,
                  image = ?,
                  created_at = NOW()
                  ";
           $statement = $pdo->prepare($query);
           $statement->execute([$_POST['title'], $_POST['body'], $category->id, $fileName]);
       }

    redirect('panel/post/index.php');
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
                <form action="<?= url('panel/post/create.php') ?>" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ..."
                               required>
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="category_id" id="cat_id" required>
                            <?php
                            global $pdo;
                            $query = "SELECT * FROM categories";
                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $categories = $statement->fetchAll();
                            foreach ($categories as $category) {
                                ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."
                                  required></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
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