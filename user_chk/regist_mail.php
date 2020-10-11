<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
?>

<!DOCTYPE html>
<html>

<head>
    <title>メール登録画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <div class="wrapper">
        <div class="head">
            <h1>メール登録画面</h1>
        </div>
        <div class="form-wrapper">
            <form action="regist_mail_chk.php" method="post">

                <div class="form-group mb-4">
                    <label for="mail" class="m-0">メールアドレス <span class="text-danger">*</span></label>
                    <input type="text" name="mail" id="mail" class="form-control">
                </div>

                <input type="hidden" name="token" value="<?= $token ?>">
                <input type="submit" value="登録する" class="btn btn-warning btn-block confirm-btn">

            </form>
        </div>
    </div>
</body>

</html>