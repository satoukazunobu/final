<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
    if(isset($_POST['tuika'])){
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('insert into music(music_mei,genre_id,artist_id,url) values(?,?,?,?)');
        if(empty($_POST['music_mei'])){
            echo '曲名を入力してください。';
        }else if($sql->execute([$_POST['music_mei'],$_POST['genre_id'],$_POST['artist_id'],$_POST['url']])){
            echo '<font color="red">追加に成功しました。</font>';
        }else{
            echo '<font color="red">追加に失敗しました。</font>';
        }
    }
?>
<form action="touroku.php" method="post">
    曲名<input type="text" name="music_mei">
    ジャンル<input type="text" name="genre_id">
    アーティスト名<input type="text" name="artist_id">
    URL<input type="text" name="url">
    <input type="submit" value="追加" name="tuika">
</form>
<?php
echo '<br><br>';
echo '曲';
echo '<table>';
echo '<tr><th>音楽番号</th><th>曲名</th><th>ジャンル</th><th>アーティスト</th><th>URL</th></tr>';
$pdo=new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from music') as $row) {
    echo '<tr>';
    echo '<td>', $row['music_id'], '</td>';
    echo '<td>', $row['music_mei'], '</td>';
    echo '<td>', $row['genre_id'], '</td>';
    echo '<td>', $row['artist_id'], '</td>';
    echo '<td>', $row['url'], '</td>';
    echo '</tr>';
}
echo '</table>';
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