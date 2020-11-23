<?php
session_start();

require_once 'function.php';

// POSTに値入ってるか確認。フォーム送られた時だけエラーチェックはしらせる
if (!empty($_POST)) {

    if ($_POST['name'] === '') {
        $error['name'] = 'blank';
    }

    if ($_POST['email'] === '') {
        $error['email'] = 'blank';
    } elseif (!preg_match('/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $_POST['email'])) {
        $error['email'] = 'unfit';
    }

    if ($_POST['password'] === '') {
        $error['password'] = 'blank';
        // 半角英数字8文字以上
    } elseif (!preg_match('/[a-zA-Z0-9]{8,}$/', $_POST['password'])) {
        $error['password'] = 'unfit';
    }


    //ifで正しい値が入力されたか確認。
    //その後、membersテーブルから全ての登録されたemailを取得し、重複していないかチェック
    if (empty($error)) {
        $member = $pdo->prepare('SELECT COUNT(*) AS cnt FROM users WHERE email=?');
        $member->execute(array($_POST['email']));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }

    if (empty($error)) {
        // エラー無いこと確認したら、セッションのjoinに値渡して、入力内容確認フォームへ
        // これすることで確認フォーム側で登録内容表示できる
        $_SESSION['join'] = $_POST;
        header('Location: check_register.php');
        exit();
    }
}

// URLパラメータにrewriteがあった場合（入力内容確認フォームで「書き直す」が押されたら）、セッションの値表示
if ($_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])) {
    $_POST = $_SESSION['join'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>会員登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body class="main-top">
    <div class="wrapper">

        <div class="head">
            <h1>会員登録</h1>
        </div>

        <div class="form-wrapper">
            <p>次のフォームに必要事項をご記入ください</p>
            <form action="" method="post">

                <div class="form-group">
                    <label for="name" class="m-0">ニックネーム <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo (h($_POST['name'])); ?>">
                    <?php if ($error['name'] === 'blank') : ?>
                        <p class="text-danger">*ニックネームを入力してください</p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email" class="m-0">メールアドレス <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo (h($_POST['email'])); ?>">
                    <?php if ($error['email'] === 'blank') : ?>
                        <p class="text-danger">*メールアドレスを入力してください</p>
                    <?php endif; ?>
                    <?php if ($error['email'] === 'unfit') : ?>
                        <p class="text-danger">*メールアドレスは正しい形式で入力してください</p>
                    <?php endif; ?>
                    <?php if ($error['email'] === 'duplicate') : ?>
                        <p class="text-danger">*指定されたメールアドレスは既に登録されています</p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password" class="m-0">パスワード <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php if ($error['password'] === 'blank') : ?>
                        <p class="text-danger">*パスワードを入力してください</p>
                    <?php elseif ($error['password'] === 'unfit') : ?>
                        <p class="text-danger">*半角英数字8文字以上に設定してください</p>
                    <?php endif; ?>
                </div>

                <div>
                    <input type="submit" value="送信する" class="btn btn-info btn-block">
                </div>

            </form>

            <div>
                <hr class="my-3">
            </div>

            <div>
                <a href="index.php" class="btn btn-secondary btn-block">戻る</a>
            </div>

        </div>
    </div>
</body>

</html>