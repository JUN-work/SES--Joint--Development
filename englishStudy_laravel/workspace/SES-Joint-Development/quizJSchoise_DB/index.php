<?php
if(!isset($rand)){
  $rand=range(1,10);
  shuffle($rand);
    for($i=1;$i<=10;$i++){
      $mondai[$i]=$rand[$i];
    }
  }

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

$id=$mondai['1'];
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

$choices['0']=$row['answer'];
shuffle($choices);

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
  <p class="">問題と意味が一致するものを1つ選んで回答してください。</p>
  <dl>
    <dt>第<?php print$id;?>問</dt>
    <dd class="big"><?php print$question;?></dd>
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