<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
えべろーぶ：
<form action = "index.php" method = "get">
    <input type="text" name="decode">
    <input type="submit" value="でこーど">
<?php
echo 'test';

?>
</form>
</body>
</html>

<?php
$comment = $_GET['decode'];
echo $comment;
echo "test";
var_dump($comment);
?>
