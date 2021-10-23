<?php
if (
    !isset($_POST['id']) || $_POST['id']=='' ||
    !isset($_POST['select_tabke']) || $_POST['select_table']=='' ||
    !isset($_POST['topic']) || $_POST['topic']==''
) {
    exit('ParamError');
}

$id=$_POST['id'];
$topic=$_POST['topic'];
$select_table=$_POST['select_table'];

$pdo=connect_to_db();
$sql='INSERT INTO comment_table(id,topic,se.ect_table)VALUES(id,:topic,:select_table';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_STR);
$stmt->bindValue(':topic',$topic,PDO::PARAM_STR);
$stmt->bindValue(':select_table',$select_table,PDO::PARAM_STR);
$status=$stmt->execute();

/* if ($status == false) {
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

 */