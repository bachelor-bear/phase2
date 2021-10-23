<?php

// var_dump($_GET);
// exit();

include('functions.php');

$topic_id=$_GET['topic_id'];
$name_table=$_GET['name_table'];

// var_dump($topic_id);
// var_dump($name_table);
// exit();
$pdo=connect_to_db();
$sql='SELECT COUNT(*)FROM favorite_table WHERE topic_id=:topic_id AND name_table=:name_table';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':topic_id',$topic_id,PDO::PARAM_INT);
$stmt->bindValue(':name_table',$name_table,PDO::PARAM_STR);
$status=$stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $favorite_count = $stmt->fetchColumn();
  //fetchColumn returns boolen, if the column that exists in the given situation
  // // まずはデータ確認
//   var_dump($favorite_count);
//   exit();
}
if($favorite_count!=0){
    $sql='UPDATE favorite_table SET favorite= favorite + 1 WHERE topic_id=:topic_id AND name_table=:name_table';

}else{$sql='INSERT INTO favorite_table(id,name_table,topic_id,favorite)VALUES(NULL,:name_table,:topic_id,1)';
}
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':topic_id',$topic_id,PDO::PARAM_INT);
$stmt->bindValue(':name_table',$name_table,PDO::PARAM_STR);
$status=$stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}else {
    header("Location:feelbad.php");
    exit();
}
?>