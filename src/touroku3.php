<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
    if(isset($_POST['tuika'])){
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('insert into artist(artist_mei) values(?)');
        if(empty($_POST['artist_mei'])){
            echo 'アーティスト名を入力してください。';
        }else if($sql->execute([$_POST['artist_mei']])){
            echo '<font color="red">追加に成功しました。</font>';
        }else{
            echo '<font color="red">追加に失敗しました。</font>';
        }
    }
?>
<form action="touroku3.php" method="post">
    アーティスト名<input type="text" name="artist_mei">
    <input type="submit" value="追加" name="tuika">
</form>
<?php
echo '<br><br>';
echo 'アーティスト';
echo '<table>';
echo '<tr><th>アーティスト番号</th><th>アーティスト名</th></tr>';
$pdo=new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from artist') as $row) {
    echo '<tr>';
    echo '<td>', $row['artist_id'], '</td>';
    echo '<td>', $row['artist_mei'], '</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require 'footer.php'; ?>