<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
echo '曲';
echo '<a href="touroku.php">曲登録</a>';
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
    echo '<td><form action="kousin.php" method="POST"><input type="submit" value="更新"><input type="hidden" name="music_id" value="',$row['music_id'],'"></form></td>';
    echo '<td><form action="sakuzyo.php" method="POST"><input type="submit" value="削除"><input type="hidden" name="music_id" value="',$row['music_id'],'"></form></td>';
    echo '</tr>';
}
echo '</table>';
echo '<br><br>';
echo 'ジャンル';
echo '<a href="touroku2.php">ジャンル登録</a>';
echo '<table>';
echo '<tr><th>ジャンル番号</th><th>ジャンル名</th></tr>';
$pdo=new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from genre') as $row) {
    echo '<tr>';
    echo '<td>', $row['genre_id'], '</td>';
    echo '<td>', $row['genre_mei'], '</td>';
    echo '<td><form action="kousin2.php" method="POST"><input type="submit" value="更新"><input type="hidden" name="genre_id" value="',$row['genre_id'],'"></form></td>';
    echo '<td><form action="sakuzyo2.php" method="POST"><input type="submit" value="削除"><input type="hidden" name="genre_id" value="',$row['genre_id'],'"></form></td>';
    echo '</tr>';
}
echo '</table>';
echo '<br><br>';
echo 'アーティスト';
echo '<a href="touroku3.php">アーティスト登録</a>';
echo '<table>';
echo '<tr><th>アーティスト番号</th><th>アーティスト名</th></tr>';
$pdo=new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from artist') as $row) {
    echo '<tr>';
    echo '<td>', $row['artist_id'], '</td>';
    echo '<td>', $row['artist_mei'], '</td>';
    echo '<td><form action="kousin3.php" method="POST"><input type="submit" value="更新"><input type="hidden" name="artist_id" value="',$row['artist_id'],'"></form></td>';
    echo '<td><form action="sakuzyo3.php" method="POST"><input type="submit" value="削除"><input type="hidden" name="artist_id" value="',$row['artist_id'],'"></form></td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require 'footer.php'; ?>