<?php
session_start();  //セッションを使う
$formName = htmlspecialchars($_SESSION['inquiry']['formName'],ENT_QUOTES, 'UTF-8');
$formMail = htmlspecialchars($_SESSION['inquiry']['formEmail1'],ENT_QUOTES, 'UTF-8');
$formSubject = htmlspecialchars($_SESSION['inquiry']['formSubject'],ENT_QUOTES, 'UTF-8');
$formTel = htmlspecialchars($_SESSION['inquiry']['formTel'],ENT_QUOTES, 'UTF-8');
$formContent = htmlspecialchars($_SESSION['inquiry']['formContent'],ENT_QUOTES, 'UTF-8');
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
        <h2 class="sample-subtitle">入力内容の確認</h2>
        <form class="col-lg-6 mr-lg-auto px-0 contact-form" name="contact-form" method="post" action="sendgridjp-php-example/sendgrid-php-example.php">
          <div class="form-group">
            <label for="formName">お名前 <span class="text-danger">*</span></label><br>
            <p id="contact-name"><?php echo $formName ?></p>
          </div>
          <div class="form-group">
            <label for="formEmail1">メールアドレス <span class="text-danger">*</span></label><br>
            <p id="contact-email"><?php echo  $formMail ?></p>
          </div>
          <div class="form-group">
            <label for="formSubject">タイトル <span class="text-danger">*</span></label><br>
            <p id="contact-subject"><?php echo  $formSubject ?></p>
          </div>
          <div class="form-group">
            <label for="formTel">電話番号 <span class="text-danger">*</span></label><br>
            <p id="contact-tel"><?php echo  $formTel ?></p>
          </div>
          <div class="form-group">
            <label for="formContent">お問い合わせ内容 <span class="text-danger">*</span></label><br>
            <p id="contact-message"><?php echo  $formContent ?></p>
          </div>
          <button type="submit" name="submit" class="btn btn-danger btn-block">送信</button>
        </form>

          <div><button class="btn btn-secondary btn-block mt-2"><a href="contact_top.php?action=rewrite" class="text-light">書き直す</a></button>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="./contact.js"></script>
</body>
</html>
