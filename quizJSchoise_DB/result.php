<?php
session_start();
$ok_count=$_SESSION['seikai']['ok_count'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選択式クイズ　JavaScript</title>
</head>
<body>

    <div id="container">
    <h1>結果発表</h1>
    <h2 class="black">お疲れ様でした!</h2>
    <p><?php echo$ok_count;?>問正解</p>
    <table class="grayback">
    <tr><th id="num">No.</th><th>設問</th><th>解答</th><th>結果</th></tr>
    <?php
    for($i=1;$i<=10;$i++){
    $rireki['question'][$i]=$_SESSION['rireki']['question'][$i];
    $rireki['answer'][$i]=$_SESSION['rireki']['answer'][$i];
    $rireki['kekka'][$i]=$_SESSION['rireki']['kekka'][$i];
    echo"<tr><td>".$i."</td>";
    echo"<td>".$rireki['question'][$i]."</td>";
    echo"<td>".$rireki['answer'][$i]."</td>";
    echo"<td>".$rireki['kekka'][$i]."</td></tr>";
    }
    ?>
    </table>
    
    <p><a href='index.php'>戻る</a></p>
    </div>
    
    </body>
</html>
<?php
    $_SESSION=array();
    session_destroy();
  ?>