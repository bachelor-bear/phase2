<?php

include("functions.php");


// ini_set("display_errors", 1);
// error_reporting(E_ALL);
// try {
//     $pdo = new PDO("mysql:host=localhost;dbname=topic_table;charset=utf8", "topic", "password");
//     $stmt = $pdo->prepare("SELECT * FROM `silent_table`");
//     $stmt->execute();
//     $result = $stmt->fetchAll();
//     print_r($result[rand(0,3)]);
// } catch (PDOException $exception) {
//     echo $exception->getMessage();
//     exit();
// }

$pdo = connect_to_db();

$sql = "SELECT topic FROM `silent_table`";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($result);
  // // echo($result[0]["topic"]);
  $lengthOfArray = count($result);
  // var_dump($lengthOfArray);

  // $lengthOfArray += -1;
  // var_dump($result[rand(0,$lengthOfArray -1)]);

  $topic = $result[rand(0,$lengthOfArray -1)]["topic"];
  // echo($topic);
  // exit();

}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./mystyle.css" type="text/css">
  </head>
  <!-- <header>Hello</header> -->
  <body>
    <h1>無言が続く場合は</h1>
    <hr>
    <div class="comment">
      <?= $topic?>
      <div class="hello">
      </div>
    <h4>
      いいね機能
    </h4> 
  </body>
</htmll>
