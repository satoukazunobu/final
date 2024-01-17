<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
    if(isset($_POST['tuika'])){
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('insert into genre(genre_mei) values(?)');
        if(empty($_POST['genre_mei'])){
            echo 'ジャンル名を入力してください。';
        }else if($sql->execute([$_POST['genre_mei']])){
            echo '<font color="red">追加に成功しました。</font>';
        }else{
            echo '<font color="red">追加に失敗しました。</font>';
        }
    }
?>
<form action="touroku2.php" method="post">
    ジャンル名<input type="text" name="genre_mei">
    <input type="submit" value="追加" name="tuika">
</form>
<?php
echo '<br><br>';
echo 'ジャンル';
echo '<table>';
echo '<tr><th>ジャンル番号</th><th>ジャンル名</th></tr>';
$pdo=new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from genre') as $row) {
    echo '<tr>';
    echo '<td>', $row['genre_id'], '</td>';
    echo '<td>', $row['genre_mei'], '</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require 'footer.php'; ?>