<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./mystyle.css" type="text/css">
</head>
<body>
    <h1>話題を投稿</h1>
<hr>
    </div>
    </h4> 
    <form action="comment create.php" method="POST">
    <div style="background-color: #fceff2; border: 4px double #ff6699; font-size: 100%; padding: 20px;">
    <div class="h6">
    </div>
    おすすめの話題
    <a href="comment read.php">過去の投稿</a>
    <div>
        ニックネーム: <input type="text" name="id">
    </div>
    <div>
    ジャンル：<select name= "topic">
    <option value = "すべるお話">すべるお話</option>
    <option value = "場の空気が和むお話">場の空気が和むお話</option>
    <option value = "世間話">世間話</option>
    <option value = "笑いをとるお話">笑いをとるお話</option>
    <option value = "相手の話を遮るお話">相手の話を遮るお話</option>
    </select>
    </div>
    <div>
    話題:<input type="text" name="topic">
    </div>
        <button>提出</button>
    </div>
</div>
</form>

</body>
</body>