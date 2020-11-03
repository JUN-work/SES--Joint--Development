<?php
session_start();

//最初に1〜100から10個の数字を選んだ乱数配列を生成し、その数字に対応した問題No.($id)の情報を正解としてセット。
//現在、一時的に1〜10の範囲からの選択としています。
if(!isset($_SESSION['rand'])){
  $rand=range(1,20);
  shuffle($rand);
  for($i=0;$i<10;$i++){
    $_SESSION['rand'] = $rand;
  }
}
    
$monme=$_SESSION['monme'];
  if(isset($monme)){
    $monme++;
    $i=$monme;
    $id=$_SESSION['rand'][$i-1];
  }else{
    $monme=1;
    $i=$monme;
    $id=$_SESSION['rand'][$i-1];
  }

//DB情報の設定・接続チェック
require_once dirname(__FILE__) . '/dbinfo.php';

//選択された問題の情報を取得、取得した問題のカラムに入っている答え(answer)を正解としてセット。
$sql="SELECT question,answer,explanation,url FROM js_questions WHERE id=:id;";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$question=$row['question'];
$answer=$row['answer'];
$explanation=$row['explanation'];
$url=$row['url'];
$_SESSION['monme']=$monme;
$_SESSION['seikai']['id']=$id;
$_SESSION['seikai']['question']=$question;
$_SESSION['seikai']['answer']=$answer;
$_SESSION['seikai']['explanation']=$explanation;
$_SESSION['seikai']['url']=$url;

//正解以外の選択肢を生成。
//正解の$id(問題No.)を除いた1〜100の数字の配列を生成して順番をランダムにし、その配列の初めから3つを不正解の選択肢としてchoices[1],[2],[3]に格納する。
//現在、一時的に1〜10の範囲からの選択としています。
$rand2=range(1,20);
if (in_array($id, $rand2)){
  $rand2_no=array_search("$id", $rand2);
  unset($rand2[$rand2_no]);
  $rand2 = array_values($rand2);
  shuffle($rand2);
}

for($i=1;$i<=3;$i++){
  $sql='SELECT answer FROM js_questions WHERE id=:id';
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':id',$rand2[$i-1]);
  $stmt->execute();
  $row2=$stmt->fetch(PDO::FETCH_ASSOC);
  $choices[$i]=$row2['answer'];
}

//$choices['0']に正解を格納後、選択肢をシャッフルして正解の位置が固定されないようにする。
$choices['0']=$row['answer'];
shuffle($choices);

//正解の場合は$_SESSION['kotae']にidを格納、不正解の場合は0を格納する。後で結果表示に使う。
for($i=0;$i<=3;$i++){
  if($choices[$i]===$answer){
    $kotae[$i]=$id;
  }else{
    $kotae[$i]=0;
  }
}
$_SESSION['kotae']=$kotae
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
  <link rel="stylesheet" href="../styles/style.css">
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
      <p class="sub-title">
      問題と意味が一致するものを1つ選んで「回答する」を押してください。
      </p>
      <div class="questions__sentence">
        <strong class="questions__number"><?php print$monme;?></strong>
        <span><?php print$question;?></span>
      </div>
      <div class="questions__item">
      <form action="answer.php" method="POST" class="">
        <ul>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1a" name="kotae" type="radio" value="<?php echo$kotae['0'];?>" checked>
              <label for="radio1a" class="radio-label"><?php print$choices['0'];?></label>
            </div>
          </li>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1b" name="kotae" type="radio" value="<?php echo$kotae['1'];?>">
              <label for="radio1b" class="radio-label"><?php print$choices['1'];?></label>
            </div>
          </li>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1c" name="kotae" type="radio" value="<?php echo$kotae['2'];?>">
              <label for="radio1c" class="radio-label"><?php print$choices['2'];?></label>
            </div>
          </li>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1d" name="kotae" type="radio" value="<?php echo$kotae['3'];?>">
              <label for="radio1d" class="radio-label"><?php print$choices['3'];?></label>
            </div>
          </li>
        <ul>
      </div>
      <button class="questions__btn slide-bg">
        回答する
      </button>
      </form>
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