<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
    } else {
        echo "اسم المستخدم أو كلمة المرور غير صحيحة!";
    }
}
?>
