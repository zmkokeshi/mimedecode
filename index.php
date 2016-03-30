<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> エンベロープを快適に見よう</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<section class="row col-xs-8 col-xs-offset-2">
<h1 class='text-center'>エンベロープ</h1>
<form action = "index.php" method = "post">
    <textarea name="decode" cols=200 rows=10>

    </textarea>
    <button type="submit" class="btn btn-info center-block btn-lg">でこーど</button>

<?php


function keyloop($input)

{


    foreach($input as $key1=>$key2) {
        if (is_array($key2)||is_object($key2) ){

            echo "<h1 class='text-center'>";
            echo $key1;
            echo "</h1>";
            echo "</br>";
            keyloop($key2);
        }
        else {
            echo "<h2 class='text-center'>";
            echo $key1;
            echo "</h2>";
            echo "</br>";
            echo "<div class='text-center'>";
            echo $key2;
            echo "</div>";
//            var_dump($key2);
            echo "</br>";

        }
    }

}

$comment = $_POST['decode'];

//メールをMimeデコードをして分解
//MimeDecodeに渡す際にDcodeの項目等をtureにしておく
// /usr/share/pear/Mail/mimeDecode.php　詳細はこのファイルで

require_once 'Mail/mimeDecode.php';
$params['include_bodies'] = true;
$params['decode_bodies']  = true;
$params['decode_headers'] = true;
$params['input'] = $comment;
$params['crlf'] = "\r\n";


//デコード
$mail_data = Mail_mimeDecode::decode($params);

//mime_Decodoで帰ってきたオブジェクトにアクセスし値を取得。

echo "</br>";
echo "</br>";

$From=$mail_data->headers['from'];
#var_dump($From);
echo('<pre>');
var_dump($mail_data);
echo('</pre>');
echo '</br>';
echo '</br>';
echo '</br>';
echo '==============================[元のオブジェクト]=============================';

keyloop($mail_data);


?>
</form>
</section>
</body>
</html>
