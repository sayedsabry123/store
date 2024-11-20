<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO products (user_id, product_name, description, price, image) VALUES ('$user_id', '$product_name', '$description', '$price', '$image')";
    if (mysqli_query($conn, $query)) {
        echo "تم رفع المنتج بنجاح!";
    } else {
        echo "خطأ في رفع المنتج!";
    }
}
?>
