<?php
session_start();
header("Content-type: text/html; charset=utf-8");
header('X-FRAME-OPTIONS: SAMEORIGIN');

/* 未ログイン状態ならトップへリダイレクト */
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../pdo_connect.php';

// ログイン状態で、かつ退会ボタンを押した
if (isset($_POST['user_delete']) && $_POST['user_delete'] === '1') {

    $mail = $_SESSION['user']['mail'];

    // 本登録テーブルから削除
    $stmt = $dbh->prepare('DELETE FROM users WHERE mail =:mail');
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();

    // 仮登録テーブルから削除
    $stmt = $dbh->prepare('DELETE FROM pre_users WHERE mail =:mail');
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();

    // セッション削除
    $_SESSION = array();
    session_destroy();

    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>退会画面 -Study English Site for Engineers-</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/user.css">
    <link rel="stylesheet" href="../styles/top.css">
</head>

<body>
    <div class="wrapper">

        <div class="head">
            <h1>退会画面</h1>
        </div>

        <div class="form-wrapper">
            <p class="lead mb-4">会員情報を削除しますか？</p>
            <form action="" method="POST">
                <input type="hidden" name="user_delete" value="1">
                <input type="submit" id="delete" value="退会する" class="btn btn-light btn-block">
            </form>
            <hr class="my-3">
            <a href="../index.php" class="btn btn-danger btn-block return-btn">戻る</a>
        </div>
    </div>

    <?php include("../footer.php"); ?>
    <script>
        $('#delete').click(function() {
            if (!confirm('入力に間違いは無いですか？')) {
                return false; // 「キャンセル」をクリックしても何も起きない
            }
        });
    </script>
</body>

</html>