<?php
session_start();

require_once 'function.php';

// クッキーに前回ログインの値保存されていたらそれを表示
if ($_COOKIE['email'] !== '') {
    $email = $_COOKIE['email'];
}

if (!empty($_POST)) {
    // email上書き。クッキーの値を更新
    $email = $_POST['email'];
    // emailとパスワード両方に値入っていたら
    if ($_POST['email'] !== '' && $_POST['password'] !== '') {
        $login = $dbh->prepare('SELECT * FROM members WHERE email=? AND password=?');
        $login->execute(array(
            $_POST['email'],
            // sha1関数でパスワードをハッシュ化
            sha1($_POST['password'])
        ));
        // fetchメソッドを使って$memberに結果セット取得
        $member = $login->fetch();

        // ログインに成功している場合は次の処理に
        if ($member) {
            $_SESSION['id'] = $member['id'];
            // ログイン時の時間をセッションに
            $_SESSION['time'] = time();

            // クッキー入ったデータを四日間保持
            if ($_POST['save'] === 'on') {
                setcookie('email', $_POST['email'], time() + 60 * 60 * 24 * 4);
            }

            // ログイン成功したらトップページへ
            header('Location: index.html');
            exit();
        } else {
            $error['login'] = 'failed';
        }
    } else {
        $error['login'] = 'blank';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <div class="wrapper">
        <div class="head">
            <h1>ログインする</h1>
        </div>
        <div class="form-wrapper">
            <div>
                <p>メールアドレスとパスワードを記入してログインしてください。<br>
                    入会手続きがまだの方はこちらからどうぞ。</p>
                <p>&raquo;<a href="register.php">入会手続きをする</a></p>
            </div>
            <form action="" method="post">

                <?php if ($error['login'] === 'blank') : ?>
                    <P class="text-danger">*メールアドレスとパスワードを入力してください</P>
                <?php endif; ?>
                <?php if ($error['login'] === 'failed') : ?>
                    <P class="text-danger">*ログインに失敗しました。正しく入力してください</P>
                <?php endif; ?>

                <div class="form-group">
                    <label for="email" class="m-0">メールアドレス <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php print h($email); ?>">
                </div>

                <div class=" form-group">
                    <label for="password" class="m-0">パスワード <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php print h($_POST['password']); ?>">
                </div>

                <div class="mb-3">
                    <p class="m-0">ログイン情報の記録</p>
                    <div class="form-check">
                        <input class="form-check-input" id="save" type="checkbox" value="on">
                        <label class="form-check-label" for="save">次回からは自動的にログインする</label>
                    </div>
                </div>

                <input type="submit" value="Log in" class="btn btn-light btn-block yellow-btn">
            </form>
            <div>
                <hr class="my-3">
            </div>
            <div>
                <a href="index.php" class="btn btn-danger btn-block">戻る</a>
            </div>
        </div>
    </div>
</body>

</html>