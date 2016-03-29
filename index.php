<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
エンベロープ：
<form action = "index.php" method = "post">
    <textarea name="decode" cols=60 rows=40>

    </textarea>
    <input type="submit" value="でこーど">
</form>
</body>
</html>

<?php


function keyloop($input)

{

    foreach($input as $key1=>$key2) {
        if (is_array($key2)||is_object($key2) ){

            echo "<h1>";
            echo $key1;
            echo "</h1>";
            echo "</br>";
            keyloop($key2);


        }elseif(is_array($key1)||is_object($key1)){
            echo "<h1>";
            echo $key1;
            echo "</h1>";
            echo "</br>";
            keyloop($key1);
           # echo "key1";

        }
        else {
            echo "<h1>";
            echo $key1;
            echo "</h1>";
            echo "</br>";
            echo $key2;
            var_dump($key2);
            echo "</br>";
            echo "--------------------------------------------------------";
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
var_dump($From);
#var_dump($mail_data);
keyloop($mail_data);




?>
