<?php
session_start();
​
// <!------------------------------ 変更 ------------------------------------>
// 問題途中でトップページに戻って、またここに戻ってきた場合に問題データをリセット
if (!empty($_GET['type']) && !empty($_SESSION['type'])) {
  $_SESSION['type'] = NULL;
  $_SESSION['monme'] = NULL;
  $_SESSION['seikai'] = NULL;
  $_SESSION['rand'] = NULL;
  $_SESSION['rireki'] = NULL;
}
// <!----------------------------- ここまで ----------------------------------->
​
//最初に1〜100から10個の数字を選んだ乱数配列を生成し、その数字に対応した問題No.($id)の情報を正解としてセット。
if (!isset($_SESSION['rand'])) {
  $rand = range(1, 25);
  shuffle($rand);
  for ($i = 0; $i < 10; $i++) {
    $_SESSION['rand'] = $rand;
  }
}
​
$monme = $_SESSION['monme'];
if (isset($monme)) {
  $monme++;
  $i = $monme;
  $id = $_SESSION['rand'][$i - 1];
} else {
  $monme = 1;
  $i = $monme;
  $id = $_SESSION['rand'][$i - 1];
}
​
//DB情報の設定・接続チェック
require_once dirname(__FILE__) . '/dbinfo.php';
​
// <!------------------------------ 変更 ------------------------------------>
// urlパラメータでcssかjsか判断しセッションに格納。この値で処理を分岐させる。
if ($_GET['type'] == 'css') {
  $type = 'css';
  $_SESSION['type'] = $type;
} elseif ($_GET['type'] == 'js') {
  $type = 'js';
  $_SESSION['type'] = $type;
} else {
  $type = $_SESSION['type']; //answer.phpから戻ってきた場合
}
​
if ($type == 'css') {
  $sql = "SELECT question,answer,explanation,url FROM css_questions WHERE id=:id;";
} elseif ($type == 'js') {
  $sql = "SELECT question,answer,explanation,url FROM js_questions WHERE id=:id;";
}
// <!----------------------------- ここまで ---------------------------------->
​
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$question = $row['question'];
$answer = $row['answer'];
$explanation = $row['explanation'];
$url = $row['url'];
$_SESSION['monme'] = $monme;
$_SESSION['seikai']['id'] = $id;
$_SESSION['seikai']['question'] = $question;
$_SESSION['seikai']['answer'] = $answer;
$_SESSION['seikai']['explanation'] = $explanation;
$_SESSION['seikai']['url'] = $url;
​
//正解以外の選択肢を生成。
//正解の$id(問題No.)を除いた1〜100の数字の配列を生成して順番をランダムにし、その配列の初めから3つを不正解の選択肢としてchoices[1],[2],[3]に格納する。
//現在、一時的に1〜10の範囲からの選択としています。
$rand2 = range(1, 25);
if (in_array($id, $rand2)) {
  $rand2_no = array_search("$id", $rand2);
  unset($rand2[$rand2_no]);
  $rand2 = array_values($rand2);
  shuffle($rand2);
}
​
for ($i = 1; $i <= 3; $i++) {
  $sql = 'SELECT answer FROM js_questions WHERE id=:id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $rand2[$i - 1]);
  $stmt->execute();
  $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
  $choices[$i] = $row2['answer'];
}
​
//$choices['0']に正解を格納後、選択肢をシャッフルして正解の位置が固定されないようにする。
$choices['0'] = $row['answer'];
shuffle($choices);
​
//正解の場合は$_SESSION['kotae']にidを格納、不正解の場合は0を格納する。後で結果表示に使う。
for ($i = 0; $i <= 3; $i++) {
  if ($choices[$i] === $answer) {
    $kotae[$i] = $id;
  } else {
    $kotae[$i] = 0;
  }
}
$_SESSION['kotae'] = $kotae;
​
?>
​
<!DOCTYPE html>
<html lang="en">
​
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8" />
  <!-------------------------------- 変更 ---------------------------------->
  <?php if ($type == 'css') : ?>
    <title>CSS - 選択式</title>
  <?php elseif ($type == 'js') : ?>
    <title>JavaScript - 選択式</title>
  <?php endif; ?>
  <!----------------------------- ここまで ---------------------------------->
  <meta name="description" content="サイトの説明文" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
​
  <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../styles/account.css" />
  <link rel="stylesheet" href="../styles/top.css" />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../styles/style_answer.css">
</head>
​
<body id="page-top">
  <!----------------------------------------------->
  <header>
    <nav>
      <div class="container navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand mr-auto" href="index.php">
          <img src="../img/SE2.png" alt="サイト名" height="70" />
        </a>
        <a href="../register.php" class="btn btn-secondary btn-lg mr-1 text-white">新規登録</a>
        <a href="../login.php" class="btn btn-primary btn-lg mr-1 text-white">ログイン</a>
      </div>
    </nav>
  </header>
  <!----------------------------------------------->
  <div class="subheader">
    <!-------------------------------- 変更 ---------------------------------->
    <?php if ($type == 'css') : ?>
      <h2>CSS - 選択式</h2>
    <?php elseif ($type == 'js') : ?>
      <h2>JavaScript - 選択式</h2>
    <?php endif; ?>
    <!----------------------------- ここまで ---------------------------------->
  </div>
  <section class="questions">
    <h2 class="main-title">Test your English</h2>
    <p class="sub-title">
      問題と意味が一致するものを1つ選んで「回答する」を押してください。
    </p>
    <div class="questions__sentence">
      <strong class="questions__number"><?php print $monme; ?></strong>
      <span><?php print htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
    <div class="questions__item">
      <form action="answer.php" method="POST" class="">
        <ul>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1a" name="kotae" type="radio" value="<?php echo $kotae['0']; ?>" checked>
              <label for="radio1a" class="radio-label"><?php print $choices['0']; ?></label>
            </div>
          </li>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1b" name="kotae" type="radio" value="<?php echo $kotae['1']; ?>">
              <label for="radio1b" class="radio-label"><?php print $choices['1']; ?></label>
            </div>
          </li>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1c" name="kotae" type="radio" value="<?php echo $kotae['2']; ?>">
              <label for="radio1c" class="radio-label"><?php print $choices['2']; ?></label>
            </div>
          </li>
          <li class="questions__choice">
            <div class="radio">
              <input id="radio1d" name="kotae" type="radio" value="<?php echo $kotae['3']; ?>">
              <label for="radio1d" class="radio-label"><?php print $choices['3']; ?></label>
            </div>
          </li>
          <ul>
    </div>
    <button class="questions__btn slide-bg">
      回答する
    </button>
    </form>
  </section>
​
  <!-- javascript はここから -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="../scripts/main.js"></script>
</body>
​
</html>