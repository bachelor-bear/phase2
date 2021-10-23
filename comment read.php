<?php
include('functions.php');
$pdo = connect_to_db();

$sql = "SELECt * FROM comment_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
$error = $stmt->errorInfo();
echo json_encode(["error_msg" => "{$error[2]}"]);
exit();
}else {
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
    $output .= "
        <tr>
        <td>{$record["id"]}</td>
        <td>{$record["comment"]}</td>
        <td>
            <a href='todo_edit.php?id={$record["id"]}'>edit</a>
        </td>
        <td>
            <a href='todo_delete.php?id={$record["id"]}'>delete</a>
        </td>
        </tr>
    ";
    }
unset($record);
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
    <h1>過去の話題</h1>
<hr>
    </div>
    </h4> 
    <form action="comment create.php" method="POST">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>話題一覧</title>
</head>
<body>
<div style="background-color: #fceff2; border: 4px double #ff6699; font-size: 100%; padding: 20px;">
    <legend>話題一覧</legend>
    <a href="comment input.php">入力画面</a>
    <table>
    <thead>
        <tr>
        <th>id</th>
        <th>comment</th>
        </tr>
</div>
    </thead>
    <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output?>
    </tbody>
    </table>
</body>

</html>