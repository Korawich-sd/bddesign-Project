<?php
session_start();
require_once '../config/bddesign_db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        echo "<script>alert('กรุณากรอกอีเมล')</script>";
        header("location: login.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('รูปแบบอีเมลไม่ถูกต้อง')</script>";
        header("location: login.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: login.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 8) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 8-20 ตัวอักษร';
        header("location: login.php");
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {
                if ($email == $row['email']) {
                     if (password_verify($password, $row['password'])) {
                        if ($row['is_admin'] == 1) {
                             $_SESSION['admin_login'] = $row['id'];
                            header("location: index.php");
                        } else {
                            echo "<script>alert('ไม่ใช่ Admin')</script>";
                            header("location: login.php");
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="form">
                <img src="../images/logo.webp">
                <form action="login.php" method="POST">
                    <label>BD Design - Login</label>
                    <div class="opt-group">
                        <label>E-mail</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="opt-group">
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="opt-group">

                    </div>
                    <input type="submit" name="login" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>