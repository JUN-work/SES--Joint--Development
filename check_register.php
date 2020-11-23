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
    // 内容確認完了しDBに値を格納
    $statement = $pdo->prepare('INSERT INTO users SET name=?, email=?, password=?, created_at=NOW()');
    echo $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        // sha1関数使ってパスワードをハッシュ化
        sha1($_SESSION['join']['password']),
    ));
    // dbに格納後はセッションの値削除
    $_SESSION['email'] = $_SESSION['join']['email'];
    unset($_SESSION['join']);
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>入力内容確認</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body class="main-top">
    <div class="wrapper">

        <div class="head">
            <h1>会員登録</h1>
        </div>

        <div class="form-wrapper">
            <p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
            <form action="" method="post">
                <input type="hidden" name="action" value="submit">
                <div>
                    <div>

                        <p><span class="small">ニックネーム</span><br>
                            <?php echo (h($_SESSION['join']['name'])); ?>
                        </p>

                        <p><span class="small">メールアドレス</span><br>
                            <?php echo (h($_SESSION['join']['email'])); ?>
                        </p>

                        <p><span class="small">パスワード</span><br>
                            【表示されません】</p>

                    </div>
                </div>

                <div>
                    <a href=" register.php?action=rewrite" class="btn btn-secondary">&laquo;&nbsp;書き直す</a> | <input type="submit" class="btn btn-info" value="登録する">
                </div>

            </form>
        </div>

    </div>
</body>

</html>