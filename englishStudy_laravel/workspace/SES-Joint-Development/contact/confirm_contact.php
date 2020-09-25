<?php
session_start();  //セッションを使う
?>

<!doctype html>
<html>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="UTF-8">
<title>ページ名 | サイト名</title>
<meta name="description" content="サイトの説明文">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- OGP設定 -->
<meta property="og:type" content="website">
<meta property="og:url" content="あなたのサイトURL">
<meta property="og:image" content="SNSで表示させたい画像のパス">
<meta property="og:site_name" content="サイト名">
<meta property="og:description" content="サイトの説明文">
<!-- Facebook用設定 -->
<meta property="fb:app_id" content="facebookのApp ID">
<meta property="article:publisher" content="FacebookページのURL">
<!-- Twitter用設定 -->
<meta name="twitter:card" content="Twitterカードの種類">
<meta name="twitter:site" content="@ユーザー名">
<link rel="canonical" href="あなたのサイトURL">
<link rel="icon" type="image/png" href="ファビコンのパス">
<!-- スタイルシートはここから -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body id="page">
<!----------------------------------------------->
<header>
  <nav id="nav01">
    <div class="container navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand mr-auto" href="../index.html"><img src="../img/logo.png" alt="サイト名" height="50"></a>
      <ul class="nav mr-3 align-self-lg-end justify-content-lg-end d-none d-lg-flex">
        <li class="nav-item"><a href="#" class="nav-link p-2"><i class="fa fa-chevron-right mr-1 small"></i>LINK01</a></li>
        <li class="nav-item"><a href="#" class="nav-link p-2"><i class="fa fa-chevron-right mr-1 small"></i>LINK02</a></li>
      </ul>
      <form class="form-inline mr-3 d-none d-lg-flex align-self-lg-end">
        <input class="form-control" type="text" placeholder="サイト内を検索" aria-label="Search">
      </form>
      <a href="./index.html" class="btn btn-warning mr-1 d-none d-lg-inline-block text-white">無料体験<br>レッスン</a>
      <a href="./index.html" class="btn btn-primary d-none d-lg-inline-block">資料請求<br>はこちら</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav><!-- /# nav01 -->
  <nav class="navbar navbar-expand-lg navbar-light p-0" id="nav02">
    <div class="container">
      <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
        <ul class="navbar-nav nav-fill py-lg-3">
          <li class="nav-item d-block d-lg-none">
            <form class="px-4 pb-3">
              <input class="form-control" type="text" placeholder="サイト内を検索" aria-label="Search">
            </form>
          </li>
          <li class="nav-item"><a href="../sample/index.html" class="nav-link p-3 p-lg-0">MENU</a></li>
          <li class="nav-item"><a href="../sample/index.html" class="nav-link p-3 p-lg-0">MENU</a></li>
          <li class="nav-item"><a href="../sample/index.html" class="nav-link p-3 p-lg-0">MENU</a></li>
          <li class="nav-item"><a href="../sample/index.html" class="nav-link p-3 p-lg-0">MENU</a></li>
          <li class="nav-item last-list-md"><a href="../sample/index.html" class="nav-link p-3 p-lg-0">MENU</a></li>
          <li class="nav-item d-block d-lg-none link-secondary"><a href="#" class="nav-link p-3 p-lg-0"><i class="fa fa-chevron-right mr-2"></i>LINK01</a></li>
          <li class="nav-item d-block d-lg-none link-secondary"><a href="#" class="nav-link p-3 p-lg-0"><i class="fa fa-chevron-right mr-2"></i>LINK02</a></li>
        </ul>
      </div>
    </div>
  </nav><!-- /# nav02 -->
  <nav aria-label="パンくずリスト" class="bg-primary w-100">
    <ol class="breadcrumb mb-0 rounded-0 text-white container bg-primary">
      <li class="breadcrumb-item"><a href="#" class="text-white">HOME</a></li>
      <li class="breadcrumb-item active text-white" aria-current="page">CONTACT</li>
    </ol>
  </nav>

</header>
<!----------------------------------------------->

<main>
  <article class="py-5">
    <section class="py-5">
      <div class="container">
        <h2 class="sample-subtitle">入力内容の確認</h2>
        <p style="color: red"><?php echo $message ?></p>
        <form class="col-lg-6 mr-lg-auto px-0" method="post" action="submit_contact.php">
          <div class="form-group">
            <label for="formName">お名前 <span class="text-danger">*</span></label><br>
            <?php echo htmlspecialchars($_SESSION['inquiry']['formName'],ENT_QUOTES, 'UTF-8'); ?>
          </div>
          <div class="form-group">
            <label for="formEmail1">メールアドレス <span class="text-danger">*</span></label><br>
            <?php echo htmlspecialchars($_SESSION['inquiry']['formEmail1'],ENT_QUOTES, 'UTF-8'); ?>
          </div>
          <div class="form-group">
            <label for="formSubject">タイトル <span class="text-danger">*</span></label><br>
            <?php echo htmlspecialchars($_SESSION['inquiry']['formSubject'],ENT_QUOTES, 'UTF-8'); ?>
          </div>
          <div class="form-group">
            <label for="formTel">電話番号 <span class="text-danger">*</span></label><br>
            <?php echo htmlspecialchars($_SESSION['inquiry']['formTel'],ENT_QUOTES, 'UTF-8'); ?>
          </div>
          <div class="form-group">
            <label for="formContent">お問い合わせ内容 <span class="text-danger">*</span></label><br>
            <?php echo htmlspecialchars($_SESSION['inquiry']['formContent'],ENT_QUOTES, 'UTF-8'); ?>
          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="　送信　">
        </form>

        <div><button class="btn btn-secondary mt-2"><a href="index.php?action=rewrite" class="text-light">書き直す</a></button><!--戻るボタン-->
      </div><!-- /.container -->
    </section>
  </article>
  <!----------------------------------------------->
  <!--無料体験・資料請求部分を消去-->
  <!----------------------------------------------->
</main>

<footer id="footer" class="bg-light py-5">
  <div class="container py-4 py-md-5">
    <div id="footer-sns" class="row align-items-center border-bottom">
      <div class="col-6 col-lg-3 pb-4">
        <a href="./" target="_blank" rel="nofollow" class="d-flex align-items-center"><img src="../img/sns.svg" alt="Official Facebook Page"><span>Official Facebook Page</span></a>
      </div>
      <div class="col-6 col-lg-3 pb-4">
        <a href="./" target="_blank" rel="nofollow" class="d-flex align-items-center"><img src="../img/sns.svg" alt="Official Twitter"><span>Official Twitter</span></a>
      </div>
      <div class="col-6 col-lg-3 pb-4">
        <a href="./" target="_blank" rel="nofollow" class="d-flex align-items-center"><img src="../img/sns.svg" alt="Official LINE"><span>Official LINE Account</span></a>
      </div>
      <div class="col-6 col-lg-3 pb-4">
        <a href="./" target="_blank" rel="nofollow" class="d-flex align-items-center"><img src="../img/sns.svg" alt="Official Instagram"><span>Official Instagram</span></a>
      </div>
    </div><!-- .footer-sns -->

    <div id="footer-index" class="row pt-4">
      <ul class="col list-unstyled">
        <li><a href="#">MENU</a></li>
        <li>
          <ul class="list-unstyled">
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
          </ul>
        </li>
      </ul>
      <ul class="col list-unstyled">
        <li><a href="#">MENU</a></li>
        <li>
          <ul class="list-unstyled">
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
          </ul>
        </li>
      </ul>
      <ul class="col list-unstyled">
        <li><a href="#">MENU</a></li>
        <li>
          <ul class="list-unstyled">
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
          </ul>
        </li>
      </ul>
      <ul class="col list-unstyled">
        <li><a href="#">MENU</a></li>
        <li>
          <ul class="list-unstyled">
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
          </ul>
        </li>
      </ul>
      <ul class="col list-unstyled">
        <li><a href="#">MENU</a></li>
        <li>
          <ul class="list-unstyled">
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
            <li><a href="#">SUBMENU</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.footer-index -->

    <div id="footer-logo" class="mt-2 mt-sm-4">
      <div class="text-center d-sm-flex align-items-sm-center">
        <a class="mr-4" href="../index.html"><img src="../img/logo.png" alt="サイト名" height="50"></a>
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
      </div>
    </div><!-- .row -->
  </div><!-- .container -->
</footer>

<div class="text-white bg-primary">
  <p class="text-center mb-0 py-2"><small>Copyright (C) サイト名. All Rights Reserved.</small></p>
</div>
<!----------------------------------------------->
<!-- javascript はここから -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!----------------------------------------------->
</body>

</html>
