<?php

session_start();

$monme=$_SESSION['monme'];
$id=$_SESSION['seikai']['id'];
$question=$_SESSION['seikai']['question'];
$answer=$_SESSION['seikai']['answer'];
$explanation=$_SESSION['seikai']['explanation'];
$url=$_SESSION['seikai']['url'];
$ok_count=$_SESSION['seikai']['ok_count'];

if($_POST['kotae']===$_SESSION['seikai']['id']){
    $hantei="正解";
  if(isset($_SESSION['seikai']['ok_count'])){
    $ok_count++;
  }else{
    $ok_count=1;
  }
  $_SESSION['seikai']['ok_count']=$ok_count;
}elseif(!isset($_SESSION['seikai']['ok_count'])){
  $hantei="不正解";
  $ok_count=0;
}else{
  $hantei="不正解";
  $ok_count=$_SESSION['seikai']['ok_count'];
}

$_SESSION['rireki']['question'][$monme]=$question;
$_SESSION['rireki']['answer'][$monme]=$answer;
$_SESSION['rireki']['kekka'][$monme]=$hantei;
?>

<!DOCTYPE html>
<html lang="en">
<head
    prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#"
  >
    <meta charset="UTF-8" />
    <title>JavaScript - 選択式</title>
    <meta name="description" content="サイトの説明文" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="canonical" href="あなたのサイトURL" />
    <link rel="icon" type="image/png" href="ファビコンのパス" />
    <!-- OGP設定 -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="あなたのサイトURL" />
    <meta property="og:image" content="SNSで表示させたい画像のパス" />
    <meta property="og:title" content="ページタイトル" />
    <meta property="og:description" content="サイトの説明文" />
    <!-- Facebook用設定 -->
    <meta property="fb:app_id" content="facebookのApp ID" />
    <meta property="article:publisher" content="FacebookページのURL" />
    <!-- Twitter用設定 -->
    <meta name="twitter:card" content="Twitterカードの種類" />
    <meta name="twitter:site" content="@ユーザー名" />
    <!-- スタイルシートはここから -->
  <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
      crossorigin="anonymous"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap"
      rel="stylesheet"
    />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../styles/style_answer.css">
</head>
<body id="page-top">
  <!----------------------------------------------->
  <header>
      <nav>
        <div class="container navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand mr-auto" href="index.html"
            ><img src="../img/logo.png" alt="サイト名" height="50"
          /></a>
          <a
            href="register.html"
            class="btn btn-secondary btn-lg mr-1 text-white"
            >新規登録</a
          >
          <a href="login.html" class="btn btn-primary btn-lg mr-1 text-white"
            >ログイン</a
          >
        </div>
      </nav>
    </header>
    <!----------------------------------------------->
    <div class="subheader">
      <h2>JavaScript - 選択式</h2>
    </div>
    <section class="questions">
      <h2 class="main-title">Test your English</h2>
      <br>
      <div class="questions__sentence">
        <strong class="questions__number"><?php print$monme;?></strong>
        <span><?php print$question;?></span>
      </div>
      <div class="questions__item">
        <p><span class="labeling">判定</span><br>
        <div class="sentence answers__item">
          <?php echo"<div class='hantei'>$hantei</div>";?></p>
        </div>
        <br>
        <!--<dd>問題No.<?php print$id;?></dd>-->
        <p><span class="labeling">正解</span><br>
        <div class="sentence answers__item">
          <?php echo"<div class='answer'>$answer</div>";?></p>
          <?php echo"<div class='explanation'>$explanation</div>";?>
        </div>
        <br>
        <p><span class="labeling">詳細</span>
        <div class="sentence answers__item">
          <?php echo"<div class='explanation'><a href='$url' target='_blank' rel='noopener noreferrer'>$url</a></div>";?>
          </p>
        </div>
      </div>
     
      <?php
      if($monme>=10){
        echo"<button class='questions__btn slide-bg'><a href='result.php'>結果ページへ</a></button>";
      }else{
        echo"<button class='questions__btn slide-bg'><a href='index.php'>次の問題へ</a></button>";
      }
      ?>
      <!--<p>現在、<?php echo $monme;?>問中<?php echo $ok_count;?>問正解しています</p>-->
    </section> 
  <!----------------------------------------------->
  <footer id="footer" class="bg-light py-5">
      <!--display-4→display-5、py-5→py-1に変更-->
      <h2 class="display-5 text-center font-patrick py-1">
        Production Staff's SNS
      </h2>
      <div class="container py-4 py-md-5">
        <div id="footer-index" class="row pt-1">
          <!--pt-4→pt-1に変更-->
          <ul class="col list-unstyled">
            <li>JUN</li>
            <li>
              <ul class="list-unstyled">
                <li>
                  <a href="https://twitter.com/JUN_work_life">Twitter</a>
                </li>
                <li><a href="https://github.com/JUN-work">GitHub</a></li>
              </ul>
            </li>
          </ul>
          <ul class="col list-unstyled">
            <li>Yuki.Ishizaki</li>
            <li>
              <ul class="list-unstyled">
                <li><a href="https://twitter.com/zakky0519">Twitter</a></li>
                <li>
                  <a href="https://github.com/YukiIshizaki0525">GitHub</a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="col list-unstyled">
            <li>そってぃ</li>
            <li>
              <ul class="list-unstyled">
                <li><a href="https://twitter.com/sohhprog">Twitter</a></li>
                <li><a href="https://github.com/sohh85">GitHub</a></li>
              </ul>
            </li>
          </ul>
          <ul class="col list-unstyled">
            <li>綾</li>
            <li>
              <ul class="list-unstyled">
                <li><a href="https://twitter.com/yanagi4939">Twitter</a></li>
                <li>
                  <a href="https://github.com/AYA-kurokiri09">GitHub</a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="col list-unstyled">
            <li><a href="./contact/index.php">お問い合わせはこちら</a></li>
            <!--contactフォルダ内のindex.php(お問い合わせページ)に飛びます-->
          </ul>
        </div>
        <!-- /.footer-index -->

        <div id="footer-logo" class="mt-2 mt-sm-4">
          <div class="text-center d-sm-flex align-items-sm-center">
            <a class="mr-4" href="index.html"
              ><img src="../img/logo.png" alt="サイト名" height="50"
            /></a>
            <p class="mb-0">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor.
            </p>
          </div>
        </div>
        <!-- .row -->
      </div>
      <!-- .container -->
    </footer>

    <div class="text-white bg-primary">
      <p class="text-center mb-0 py-2">
        <small>Copyright (C) サイト名. All Rights Reserved.</small>
      </p>
    </div>
    <!----------------------------------------------->
  <!-- javascript はここから -->  
  <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <script src="../scripts/main.js"></script>
</body>
</html>
