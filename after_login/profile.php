<?php
session_start();
header("Content-type: text/html; charset=utf-8");
header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once '../function.php';

// ログイン済みでない場合は、トップページへリダイレクト
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

$name = $_SESSION['user']['name'];
$mail = $_SESSION['user']['mail'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile -Study English Site for Engineers-</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/user.css">
    <link rel="stylesheet" href="../styles/top.css">
</head>

<body>
    <div class="wrapper">

        <div class="head">
            <h1>Profile</h1>
        </div>

        <div class="form-wrapper">
            <ul class="list-group mb-5">
                <li class="list-group-item list-group-item-secondary">Name ： <?= h($name); ?></li>
                <li class="list-group-item list-group-item-secondary">Email ： <?= h($mail); ?></li>
            </ul>

            <div>
                <a href="../user_chk/login.php?logout">ログアウト</a> /
                <a href="delete_user.php">退会</a>
                <hr class="my-3">
                <a href="../index.php" class="btn btn-danger btn-block return-btn">戻る</a>
            </div>
        </div>

    </div>

    <?php include("../footer.php"); ?>
</body>

</html>