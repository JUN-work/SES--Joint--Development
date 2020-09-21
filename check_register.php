<?php
session_start();

require_once 'function.php';

// セッションに情報ない場合は登録フォームに戻す
if (!isset($_SESSION['join'])) {
    header('Location: register.php');
    exit();
}

if (!empty($_POST)) {

    header('Location: thanks.php');
    // 内容確認完了しDBに値格納
    $statement = $dbh->prepare('INSERT INTO members SET name=?, email=?, password=?, created=NOW()');
    echo $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        // sha1関数使ってパスワードをハッシュ化
        sha1($_SESSION['join']['password']),
    ));
    // dbに格納後はセッションの値削除（セキュリティ的な問題で）
    unset($_SESSION['join']);

    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>入力内容確認</title>
</head>

<body>
    <div>
        <div>
            <h1>会員登録</h1>
        </div>

        <div>
            <p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
            <form action="" method="post">
                <input type="hidden" name="action" value="submit">
                <div>
                    <div>
                        <p>ニックネーム</p>
                        <p><?php echo (h($_SESSION['join']['name'])); ?></p>
                    </div>
                    <div>
                        <p>メールアドレス</p>
                        <p><?php echo (h($_SESSION['join']['email'])); ?></p>
                    </div>
                    <div>
                        <p>パスワード</p>
                        <p>【表示されません】</p>
                    </div>
                </div>
                <div><a href=" register.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する">
                </div>
            </form>
        </div>

    </div>
</body>

</html>