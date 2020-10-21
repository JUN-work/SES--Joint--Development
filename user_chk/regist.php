<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once 'pdo_connect.php';
require_once 'function.php';

//エラーメッセージの初期化
$errors = array();

if (empty($_GET)) {
    // メールに添付されたURL(token付き)からのみアクセス可能。
    header("Location: regist_mail.php");
    exit();
} else {
    //[式1 ? 式2 : 式3] 式1がtrueの場合は式2を、falseの場合は式3を返します
    $urltoken = isset($_GET['urltoken']) ? $_GET['urltoken'] : NULL;
    //メール入力判定
    if ($urltoken == '') {
        $errors['urltoken'] = "もう一度登録をやりなおして下さい。";
    } else {
        try {
            //例外処理を投げる（スロー）ようにする
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //flagが0の未登録者・仮登録日から24時間以内
            $stmt = $dbh->prepare("SELECT mail FROM pre_users WHERE urltoken=(:urltoken) AND flag =0 AND date > now() - interval 24 hour");
            $stmt->bindValue(':urltoken', $urltoken, PDO::PARAM_STR);
            $stmt->execute();

            //レコード件数取得
            $row_count = $stmt->rowCount();

            //24時間以内に仮登録され、本登録されていないトークンの場合
            if ($row_count == 1) {
                $mail_array = $stmt->fetch();
                $mail = $mail_array['mail'];
                $_SESSION['mail'] = $mail;
            } else {
                $errors['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎた等の問題があります。もう一度登録をやりなおして下さい。";
            }

            //データベース接続切断
            $dbh = null;
        } catch (PDOException $e) {
            print('Error:' . $e->getMessage());
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>会員登録画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/user.css" />
</head>

<body>
    <div class="wrapper">
        <div class="head">
            <h1>会員登録画面</h1>
        </div>
        <div class="form-wrapper">
            <?php if (count($errors) === 0) : ?>

                <form action="regist_chk.php" method="post">
                    <div class="form-group">
                        <p class="small m-0">メールアドレス <span class="text-danger">*</span></p>
                        <p><?= h($mail); ?></p>
                    </div>

                    <div class="form-group">
                        <label for="mail" class="small m-0">ユーザーネーム <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group mb-4">
                        <label for="mail" class="small m-0">パスワード <span class="text-danger">*</span></label>
                        <input type="text" name="password" class="form-control">
                    </div>

                    <input type="hidden" name="token" value="<?= $token ?>">
                    <input type="submit" value="確認する" class="btn btn-warning btn-block confirm-btn">
                </form>

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