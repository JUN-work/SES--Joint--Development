<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once 'pdo_connect.php';
require_once 'function.php';


//送信ボタン押されたら各項目チェック
if (isset($_POST['login'])) {
    $mail = $_POST['mail'];

    // メールアドレスチェック
    if (empty($mail)) {
        $errors['mail'] = 'blank_mail';
    } elseif (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)) {
        $errors['mail'] = 'unfit';
    } else {
        $stmt = $dbh->prepare('SELECT COUNT(*) AS cnt FROM users WHERE mail=:mail');
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $record = $stmt->fetch();
        if ($record['cnt'] < 1) {
            $errors['mail'] = 'failed_mail';
        }
    }

    // パスワードチェック
    if (!empty($mail) && !empty($_POST['password'])) {
        $stmt = $dbh->prepare('SELECT * FROM users WHERE mail = :mail');
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        // メールアドレスが正しい場合は次の処理に
        if ($user) {
            // password_hash関数でハッシュ化したものと一致するかチェック
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['name'] = $user['name'];
                header('Location: ../index.php');
                exit();
            } else {
                $errors['password'] = 'failed_password';
            }
        }
    } elseif (empty($_POST['password'])) {
        $errors['password'] = 'blank_password';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <div class="wrapper">
        <div class="head">
            <h1>ログインする</h1>
        </div>
        <div class="form-wrapper">
            <p>メールアドレスとパスワードを記入してログインしてください。<br>
                入会手続きがまだの方はこちらからどうぞ。</p>
            <p>&raquo;<a href="regist_mail.php">入会手続きをする</a></p>

            <form action="" method="post">
                <div class="form-group">
                    <label for="mail" class="small m-0">メールアドレス <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="mail" name="mail" value="<?= h($mail); ?>">

                    <?php if ($errors['mail'] === 'blank_mail') : ?>
                        <p class="text-danger">*メールアドレスを入力してください。</p>
                    <?php endif; ?>
                    <?php if ($errors['mail'] === 'unfit') : ?>
                        <p class="text-danger">*メールアドレスは正しい形式で入力してください。</p>
                    <?php endif; ?>
                    <?php if ($errors['mail'] === 'failed_mail') : ?>
                        <p class="text-danger">*登録されていないメールアドレスです。</p>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-4">
                    <label for="password" class="small m-0">パスワード <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= h($_POST['password']); ?>">

                    <?php if ($errors['password'] === 'blank_password') : ?>
                        <p class="text-danger">*パスワードを入力してください。</p>
                    <?php endif; ?>
                    <?php if ($errors['password'] === 'failed_password') : ?>
                        <p class="text-danger">*正しいパスワードを入力してください。</p>
                    <?php endif; ?>
                </div>

                <input type="submit" name="login" value="Log in" class="btn btn-warning btn-block confirm-btn">
            </form>

            <hr class="my-3">
            <!-- <a href="../index.php" class="btn btn-danger btn-block">戻る</a> -->
            <input type="button" onclick="location.href='../index.php'" value="戻る" class="btn btn-danger btn-block return-btn">
        </div>
    </div>
</body>

</html>