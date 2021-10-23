<?php

include("functions.php");

// var_dump($_GET);
// exit();




if(empty($_GET)){
  $pdo = connect_to_db();

  $sql = "SELECT * FROM `suberu_table`";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();

  if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    // exit();
    $lengthOfArray = count($result);
    $rand = rand(0,$lengthOfArray -1);
    $topic = $result[$rand]["topic"];
    $topic_id = $result[$rand]["id"];
    $name_table='suberu_table';
    // var_dump($topic);
    // var_dump($topic_id);
    // exit();
  }
  $output="
  <a href='like create.php?topic_id={$topic_id}&name_table={$name_table}'class='btn-square-slant'>👍</a>
  ";
} else{
  
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./mystyle.css" type="text/css">
  </head>
  <body>
    <h1>貴方に適した話題は</h1>
<hr>
    <div class="comment">
      <?= $topic?>
      <div class="hello">
      </div>
    <h4>
      いいね
      <?php
      $sql = "SELECT favorite FROM favorite_table WHERE favorite=favorite";
      $sth = $pdo -> query($sql);
      $count = $sth -> rowCount();
      echo $count;
?>
      <?= $output?>
    </h4> 
  </body>
</html>