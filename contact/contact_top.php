<?php
 
session_start();  //セッションを使う
 
//入力チェック
$errorMessage = '';
if(isset($_POST['confirm'])){ //確認ボタンを押してポストしたものなら
    $error_flg = false;
    //名前の必須入力チェック
    if ($_POST['formName'] === ''){
        $errorMessage .= "お名前が入力されていません。<br>";
        $error_flg = true;
    }
    //メールアドレスの必須入力チェック
    if ($_POST['formEmail1'] === ''){
        $errorMessage .= "メールアドレスが入力されていません。<br>";
        $error_flg = true;
    }
    //タイトルの必須入力チェック
    if ($_POST['formSubject'] === ''){
      $errorMessage .= "タイトルが入力されていません。<br>";
      $error_flg = true;
    }
    //電話番号の必須入力チェック
    if ($_POST['formTel'] === ''){
      $errorMessage .= "電話番号が入力されていません。<br>";
      $error_flg = true;
    }
    //内容の必須入力チェック
    if ($_POST['formContent'] === ''){
        $errorMessage .= "お問い合わせ内容が入力されていません。<br>";
        $error_flg = true;
    }
 
    //エラーが無ければ入力内容をセッションに保存して確認画面へ
    if (!$error_flg){
        $_SESSION['inquiry'] = $_POST;
        header('Location: contact_confirm.php');
        exit();
    }
}
 
if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'rewrite'){
  $_POST = $_SESSION['inquiry'];
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>お問い合わせ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <div class="head">
        <h1>CONTACT</h1>
        </div>
      <div class=form-wrapper>
        <h2 class="sample-subtitle">お問い合わせフォーム</h2>
        
        <p style="color: red"><?php echo $errorMessage ?></p>  <!-- エラーメッセージ表示 -->
        <form class="col-lg-6 mr-lg-auto px-0" method="post" action="contact_top.php">
          <div class="form-group">
            <label for="formName">お名前 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="formName" name="formName" 
            value="<?php if(isset($_POST['formName'])) echo htmlspecialchars($_POST['formName']); ?>">
          </div>
          <div class="form-group">
            <label for="formEmail1">メールアドレス <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="formEmail1" name="formEmail1"
            value="<?php if(isset($_POST['formEmail1'])) echo htmlspecialchars($_POST['formEmail1']); ?>">
          </div>
          <div class="form-group">
            <label for="formSubject">タイトル <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="formSubject" name="formSubject"
            value="<?php if(isset($_POST['formSubject'])) echo htmlspecialchars($_POST['formSubject']); ?>">
          </div>
          <div class="form-group">
            <label for="formTel">電話番号 <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="formTel" name="formTel"
            value="<?php if(isset($_POST['formTel'])) echo htmlspecialchars($_POST['formTel']); ?>">
          </div>
          <div class="form-group">
            <label for="formContent">お問い合わせ内容 <span class="text-danger">*</span></label>
            <textarea class="form-control" id="formContent" name="formContent" rows="5"
            value="<?php if(isset($_POST['formContent'])) echo htmlspecialchars($_POST['formContent']); ?>"></textarea>
          </div>

          <div class="form-group">
          <input type="submit" class="btn btn-danger btn-block" name="confirm" value="送信する">
          </div>

        </form>
      </div>
    </div>
</body>

</html>
