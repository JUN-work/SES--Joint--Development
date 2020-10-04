<?php
session_start();

//最初に1〜20から10個の数字を選んだ乱数配列を生成し、その数字に対応した問題No.($id)の情報を正解としてセット。
//現在、一時的に1〜10の範囲からの選択としています。
if(!isset($_SESSION['rand'])){
  $rand=range(1,10);
  shuffle($rand);
  for($i=1;$i<=10;$i++){
    $_SESSION['rand'][$i-1] = $rand[$i-1];
  }
}
    
$monme=$_SESSION['monme'];
  if(isset($monme)){
    $monme++;
    $i=$monme;
    $mondai[$i-1]=$_SESSION['rand'][$i-1];
    $id=$mondai[$i-1];
  }else{
    $monme=1;
    $i=$monme;
    $mondai[$i-1]=$_SESSION['rand'][$i-1];
    $id=$mondai[$i-1];
  }

//DB情報の設定・接続チェック
require dirname(__FILE__) . '/dbinfo.php';

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
//正解の$id(問題No.)を除いた配列を生成して順番をランダムにし、その配列の初めから3つを不正解の選択肢としてchoices[1],[2],[3]に格納する。
//現在、一時的に1〜10の範囲からの選択としています。
$rand2=range(1,10);
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
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>選択式クイズ　JavaScript</title>
</head>
<body>
  <h1>第<?php print$monme;?>問</h1>
  <p class="">問題と意味が一致するものを1つ選んで回答してください。</p>
  <dl>
    <!--<dd>問題No.<?php print$id;?></dd>-->
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
