<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策のトークン判定
if ($_POST['token'] != $_SESSION['token']) {
    header("Location: regist_mail.php");
    exit();
}

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once 'function.php';

//前後にある半角全角スペースを削除する関数
function spaceTrim($str)
{
    // 行頭
    $str = preg_replace('/^[ ]+/u', '', $str);
    // 末尾
    $str = preg_replace('/[ ]+$/u', '', $str);
    return $str;
}

//エラーメッセージの初期化
$errors = array();

if (empty($_POST)) {
    header("Location: regist_mail.php");
    exit();
} else {
    //POSTされたデータを各変数に入れる
    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    $password = isset($_POST['password']) ? $_POST['password'] : NULL;

    //前後にある半角全角スペースを削除
    $name = spaceTrim($name);
    $password = spaceTrim($password);

    //アカウント入力判定
    if ($name == '') :
        $errors['name'] = "ユーザーネームが入力されていません。";
    elseif (mb_strlen($name) > 20) :
        $errors['name_length'] = "ユーザーネームは20文字以内で入力して下さい。";
    endif;

    //パスワード入力判定
    if ($password == '') :
        $errors['password'] = "パスワードが入力されていません。";
    elseif (!preg_match('/^[0-9a-zA-Z]{5,20}$/', $_POST["password"])) :
        $errors['password_length'] = "パスワードは半角英数字を使用し、5文字以上20文字以下で入力して下さい。";
    else :
        $password_hide = str_repeat('*', strlen($password));
    endif;
}

//エラーが無ければセッションに登録
if (count($errors) === 0) {
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>メール登録画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/user.css" />
</head>

<body>
    <div class="wrapper">
        <div class="head">
            <h1>会員登録確認画面</h1>
        </div>
        <div class="form-wrapper">
            <?php if (count($errors) === 0) : ?>

                <form action="regist_ins.php" method="post">
                    <p><span class="text-muted">メールアドレス：</span><?= h($_SESSION['mail']); ?></p>
                    <p><span class="text-muted">アカウント名：</span><?= h($name); ?></p>
                    <p><span class="text-muted">パスワード：</span><?= $password_hide ?></p>

                    <input type="hidden" name="token" value="<?= $_POST['token'] ?>">
                    <input type="submit" value="登録する" class="btn btn-block btn-success">
                    <hr class="my-3">
                    <input type="button" value="戻る" onClick="history.back()" class="btn btn-danger btn-block return-btn">
                </form>

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