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

function keyloop($input){

    //var_dump($input);
    foreach($input as $key1=>$key2) {

        if (is_array($key2)) {
            //var_dump($key2);
            keyloop($key2);
            echo "arrayだったから呼び出し";
            echo "</br>";

        } else {
            echo $key1;
            echo "</br>";
            echo $key2;
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

$FromAddress = $mail_data->headers['from'];

echo "</br>";
echo "</br>";



keyloop($mail_data);


if(is_array($mail_data->headers)){

    echo" 配列だったみたい";
#var_dump($mail_data->headers);
    foreach($mail_data->headers as $Headre)
    {
        // echo key($mail_data);
        //var_dump($Headre);
        // echo ($Headre);
        echo "</br>";

    }
}

else
{
    echo "処理ができてないお";
}

?>
