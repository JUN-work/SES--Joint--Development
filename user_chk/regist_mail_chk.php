<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策のトークン判定
if ($_POST['token'] != $_SESSION['token']) {
    echo " 不正アクセスの可能性あり";
    exit();
}

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once 'pdo_connect.php';

//エラーメッセージの初期化
$errors = array();

$mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;


//メールが入力されていて、正しい形式かチェック
if (empty($mail) || !preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)) {
    $errors['mail'] = "メールアドレスを正しい形式で入力してください。";
} else {
    // 本登録テーブル重複チェック
    $stmt = $dbh->prepare("SELECT COUNT(*) AS cnt FROM users WHERE mail=:mail");
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();
    $record = $stmt->fetch();
    if ($record['cnt'] > 0) {
        $errors['mail_check'] = "既に登録されたメールアドレスです。";
    } else {
        // 仮登録テーブル重複チェック
        $stmt = $dbh->prepare("SELECT * FROM pre_users WHERE mail=:mail");
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $check = $stmt->fetch();

        if ($check) {

            $pre_date = $check['date'];
            // URLの期限が登録切れの場合、再登録の為に仮登録データ削除
            if ($pre_date < date("Y-m-d H:i:s", strtotime("-1 day"))) {
                $stmt = $dbh->prepare("DELETE FROM pre_users WHERE mail=:mail");
                $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
                $stmt->execute();
            }
            // 期限内の場合のエラー表示
            if ($pre_date > date("Y-m-d H:i:s", strtotime("-1 day"))) {
                $errors['mail_check'] = "登録手続き中のメールアドレスです。<br>送信済メールアドレスに添付されたURLから登録を行ってください。";
            }
        }
    }
}

// エラー無いなら仮登録行い、token付きURL発行しメール送信。
if (count($errors) === 0) {

    $urltoken = hash('sha256', uniqid(rand(), 1));
    //送信されるURL。自分のローカル環境でのregist.phpのパスに変えてください
    $url = "http://localhost:8000/user_chk/regist.php" . "?urltoken=" . $urltoken;

    try {
        $stmt = $dbh->prepare("INSERT INTO pre_users (urltoken,mail,date) VALUES (:urltoken,:mail,now() )");
        $stmt->bindValue(':urltoken', $urltoken, PDO::PARAM_STR);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();

        //データベース接続切断
        $dbh = null;
    } catch (PDOException $e) {
        print('Error:' . $e->getMessage());
        die();
    }

    // ここにメール送信のコードを追加予定
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>メール確認画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <div class="wrapper">
        <div class="head">
            <h1>メール確認画面</h1>
        </div>
        <div class="form-wrapper">
            <?php if (count($errors) === 0) : ?>

                <p><?= $message ?></p>

                <p>↓このURLが記載されたメールが届きます。</p>
                <a href="<?= $url ?>"><?= $url ?></a>

            <?php elseif (count($errors) > 0) : ?>

                <?php
                foreach ($errors as $value) {
                    echo "<p class='text-danger'>*" . $value . "</p>";
                }
                ?>

                <input type="button" value="戻る" onClick="history.back()" class="btn btn-danger btn-block return-btn">

            <?php endif; ?>
        </div>
    </div>
</body>

</html>