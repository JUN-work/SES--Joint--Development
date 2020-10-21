<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once 'function.php';

$errors = [];

if (isset($_POST['login'])) {
    $mail = $_POST['mail'];

    if (checkEmail($mail)) {
        $user = getUserByEmail($mail);
        if (empty($user)) {
            $errors['mail'] = '<p class="text-danger">*登録されていないメールアドレスです</p>';
        } elseif (verifyPassword($user)) {
            $_SESSION['name'] = $user['name'];
            header('Location: ../index.php');
            exit();
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = '<p class="text-danger">*パスワードは必須項目です</p>';
    }
}

// メールの入力形式チェック。問題無い場合trueを返す
function checkEmail($mail)
{
    global $errors;

    if (empty($mail)) {
        $errors['mail'] = '<p class="text-danger">*メールアドレスは必須項目です</p>';
        return false;
    }

    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)) {
        $errors['mail'] = '<p class="text-danger">*メールアドレスは正しい形式で入力してください</p>';
        return false;
    }
    return true;
}

// 入力されたメールアドレスを用いて、本登録テーブルからデータを取得
function getUserByEmail($mail)
{
    // ここでDB接続ファイル読み込み
    require_once 'pdo_connect.php';
    $stmt = $dbh->prepare('SELECT * FROM users WHERE mail = :mail');
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

// パスワードチェック
function verifyPassword($user)
{
    global $errors;

    if (password_verify($_POST['password'], $user['password']) == false) {
        $errors['password'] = '<p class="text-danger">*パスワードが間違えています</p>';
        return false;
    }
    return true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="../styles/user.css" />
</head>

<body>
    <?php include("../header.php"); ?>
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
                    <label for="mail" class="m-0 small">メールアドレス <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="mail" name="mail" value="<?= h($mail); ?>">
                    <?= $errors['mail']; ?>
                </div>

                <div class="form-group mb-4">
                    <label for="password" class="m-0 small">パスワード <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= h($_POST['password']); ?>">
                    <?= $errors['password']; ?>
                </div>

                <input type="submit" name="login" value="Log in" class="btn btn-warning btn-block confirm-btn">
            </form>

            <hr class="my-3">
            <input type="button" onclick="location.href='../index.php'" value="戻る" class="btn btn-danger btn-block return-btn">
        </div>
    </div>
</body>

</html>