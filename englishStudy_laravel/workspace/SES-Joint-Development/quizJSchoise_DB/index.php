<?php
session_start();
//DBに登録されている問題(id=1〜10)をランダムで1問選択
if(!isset($rand)){
  $rand=range(1,10);
  shuffle($rand);
    for($i=1;$i<=10;$i++){
      $mondai[$i]=$rand[$i];
    }
  }

//DB情報の設定・接続チェック
  define('DB_HOST', 'mysql');
  define('DB_USER', 'default');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'mysql');
  try {
    $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  }
  catch(PDOException $e){
    print('接続エラーが発生しました。:'.$e->getMessage());
    exit;
  }

//選択された問題の情報を取得、取得した問題のカラムに入っている答え(answer)を正解としてセット。
$id=$mondai['1'];
$monme=$_SESSION['monme'];
if(empty($_SESSION['monme'])){
  $monme = 1;
}
$sql="SELECT question,answer FROM js_questions WHERE id=:id;";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$question=$row['question'];
$answer=$row['answer'];
$_SESSION['monme']=$monme;
$_SESSION['seikai']['id']=$id;
$_SESSION['seikai']['question']=$question;
$_SESSION['seikai']['answer']=$answer;

//正解以外の選択肢を生成。
$rand=range(1,10);
shuffle($rand);
for($i=1;$i<=3;$i++){
  $sql="SELECT answer FROM js_questions WHERE id=:id;";
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':id',$rand[$i-1]);
  $stmt->execute();
  $row2=$stmt->fetch(PDO::FETCH_ASSOC);
  $choices[$i]=$row2['answer'];
  if($choices[$i]===$row['answer']){
    $i=$i-1;
  }
}

//$answer['0']に正解を格納後、選択肢をシャッフルして正解の位置が固定されないようにする。
$choices['0']=$row['answer'];
shuffle($choices);

//正解の場合は$_SESSION['kotae']にidを格納、不正解の場合は0を格納する。後で結果表示に使う予定。
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
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>選択式クイズ　JavaScript</title>
</head>
<body>
  <h1>第<?php print$monme;?>問</h1>
  <p class="">問題と意味が一致するものを1つ選んで回答してください。</p>
  <dl>
    <dd class="big">問題No.<?php print$id;?></dd>
    <dd><?php print$question;?></dd>
  </dl>
  <form action="answer.php" method="POST" class="">
    <input type="radio" name="kotae" id="kotae" value="<?php echo$kotae['0'];?>" checked><?php print$choices['0'];?><br>
    <input type="radio" name="kotae" id="kotae" value="<?php echo$kotae['1'];?>"><?php print$choices['1'];?><br>
    <input type="radio" name="kotae" id="kotae" value="<?php echo$kotae['2'];?>"><?php print$choices['2'];?><br>
    <input type="radio" name="kotae" id="kotae" value="<?php echo$kotae['3'];?>"><?php print$choices['3'];?><br>
    <input type="submit" value="回  答">
  </form>
</body>
</html>