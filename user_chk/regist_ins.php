<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策のトークン判定
if ($_POST['token'] != $_SESSION['token']) {
    echo "不正アクセスの可能性あり";
    exit();
}

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once 'pdo_connect.php';

//エラーメッセージの初期化
$errors = array();

if (empty($_POST)) {
    header("Location: regist_mail.php");
    exit();
}

$mail = $_SESSION['mail'];
$name = $_SESSION['name'];

//パスワードのハッシュ化
$password_hash =  password_hash($_SESSION['password'], PASSWORD_DEFAULT);

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->beginTransaction();
    //usersテーブルに本登録
    $stmt = $dbh->prepare("INSERT INTO users (name,mail,password) VALUES (:name,:mail,:password_hash)");
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);
    $stmt->execute();

    //pre_usersのflagを1にする
    $stmt = $dbh->prepare("UPDATE pre_users SET flag=1 WHERE mail=(:mail)");
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();

    //データベース接続切断
    $dbh = null;

    //セッション変数を全て解除
    $_SESSION = array();

    if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', time() - 1800, '/');
    }
    session_destroy();
} catch (PDOException $e) {
    $dbh->rollBack();
    $errors['error'] = "登録に失敗しました。もう一度お願いします。";
    print('Error:' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>会員登録完了画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <div class="wrapper">

        <?php if (count($errors) === 0) : ?>
            <div class="head">
                <h1>会員登録完了画面</h1>
            </div>
            <div class="form-wrapper">
                <p>登録ありがとうございます。<br>下記URLからログインしてください。</p>
                <p>&raquo;<a href="login.php">ログイン画面</a></p>

            <?php elseif (count($errors) > 0) : ?>

                <?php
                foreach ($errors as $value) {
                    echo "<p class='text-danger'>*" . $value . "</p>";
                }
                ?>

            <?php endif; ?>
            </div>
    </div>
</body>

</html>