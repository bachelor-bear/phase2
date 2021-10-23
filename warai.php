<?php

include("functions.php");

$pdo = connect_to_db();

$sql = "SELECT topic FROM `warau_table`";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $lengthOfArray = count($result);
  $topic = $result[rand(0,$lengthOfArray -1)]["topic"];
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
    <a href="#" class="btn-square-slant">👍</a>
    <div>
    </h4> 
  </body>
</html>