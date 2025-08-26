<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/check-login.php';

if (isset($_GET['category_id']) && ($_GET['category_id']) !== "") {
    global $pdo;
    $query = "DELETE FROM categories WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['category_id']]);

}

redirect("panel/category/index.php");
