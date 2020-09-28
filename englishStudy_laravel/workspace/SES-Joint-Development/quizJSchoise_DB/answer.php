<?php

session_start();

$monme=$_SESSION['monme'];
$id=$_SESSION['seikai']['id'];
$question=$_SESSION['seikai']['question'];
$answer=$_SESSION['seikai']['answer'];
$ok_count=$_SESSION['seikai']['ok_count'];

if($_POST['kotae']===$_SESSION['seikai']['id']){
    $hantei="正解!";
  if(isset($_SESSION['seikai']['ok_count'])){
    $ok_count++;
  }else{
    $ok_count=1;
  }
  $_SESSION['seikai']['ok_count']=$ok_count;
}else{
  $hantei="不正解!";
  $ok_count=$_SESSION['seikai']['ok_count'];
}

$_SESSION['rireki']['question'][$monme]=$question;
$_SESSION['rireki']['answer'][$monme]=$answer;
$_SESSION['rireki']['kekka'][$monme]=$hantei;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選択式クイズ　JavaScript</title>
</head>
<body>
    <h1>回答</h1>
    <h2><?php echo$hantei;?></h2>
    <dl class="grayback" id="answer">
    <dt>第<?php print$monme;?>問の正解</dt>
    <dd>問題No.<?php print$id;?><br><?php print$question;?><br><?php print$answer;?></dd>
    </dl>
    <p><a href='index.php'>次の問題へ</a></p>
    <p>現在、<?php echo$monme;?>問中<?php echo$ok_count;?>問正解しています</p>
</body>
</html>
