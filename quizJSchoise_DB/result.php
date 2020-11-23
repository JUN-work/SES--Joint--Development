<?php
session_start();
​
// <!------------------------------ 変更 ----------------------------------->
$type = $_SESSION['type']; //セッション（CSS or JS）を変数に格納
// <!----------------------------- ここまで --------------------------------->
​
$ok_count = $_SESSION['seikai']['ok_count'];
?>
​
<!DOCTYPE html>
<html lang="en">
​
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8" />
  <!-------------------------------- 変更 ---------------------------------->
  <?php if ($type == 'css') : ?>
    <title>結果発表 CSS - 選択式</title>
  <?php elseif ($type == 'js') : ?>
    <title>結果発表 JavaScript - 選択式</title>
  <?php endif; ?>
  <!----------------------------- ここまで ---------------------------------->
  <meta name="description" content="サイトの説明文" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="canonical" href="あなたのサイトURL" />
  <link rel="icon" type="../image/png" href="ファビコンのパス" />
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
    <!------------------------------- ここまで --------------------------------->
  </div>
  <section class="questions">
    <div id="container">
      <h1>Results</h1>
      <p>10問中<?php echo $ok_count; ?>問正解です。</p>
      <table class="grayback">
        <tr>
          <th>No.</th>
          <th class="figure_qes_th">設問</th>
          <th>判定</th>
          <th class="figure_qes_th">正解</th>
        </tr>
        <?php
        for ($i = 1; $i <= 10; $i++) {
          $rireki['question'][$i] = $_SESSION['rireki']['question'][$i];
          $rireki['kekka'][$i] = $_SESSION['rireki']['kekka'][$i];
          $rireki['answer'][$i] = $_SESSION['rireki']['answer'][$i];
          echo "<tr><td class='figure_qes_td'>" . $i . "</td>";
          echo "<td>" . $rireki['question'][$i] . "</td>";
          echo "<td class='figure_qes_td'>" . $rireki['kekka'][$i] . "</td>";
          echo "<td>" . $rireki['answer'][$i] . "</td></tr>";
        }
        ?>
      </table>
      <!-------------------------------- 変更 ---------------------------------->
      <button class='questions__btn slide-bg'><a href='../index.php?qs_session=delete'>トップへ戻る</a></button>
      <!------------------------------- ここまで --------------------------------->
    </div>
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