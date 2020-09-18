<?php require_once(__DIR__ . '/config.php'); 
require_once(__DIR__ . '/quiz.php');
$quiz = new MyApp\Quiz();
$data = $quiz->getCurrentQuiz();
shuffle($data['a']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./quiz_stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <title>選択式クイズ　JavaScript</title>
</head>
<body>
<div id="container">
  <h1>Q. <?= h($data['q']); ?></h1>
   <ul>
      <?php foreach ($data['a'] as $a) : ?>
        <li class="answer"><?= h($a); ?></li>
      <?php endforeach; ?>
    </ul>
    <div id="btn" class="disabled">次の質問へ</div>
</div>
<script src="quiz.js"></script>
</body>
</html>