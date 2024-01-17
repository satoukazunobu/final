<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    if(isset($_POST['kousin'])){
        $sql=$pdo->prepare('update artist set artist_mei=? where artist_id=?');
        if(empty($_POST['artist_mei'])){
            echo 'アーティスト名を入力してください。';
        }else if($sql->execute([htmlspecialchars($_POST['artist_mei']),$_POST['artist_id']])){
            echo '<font color="red">更新に成功しました。</font>';
        }else{
            echo '<font color="red">更新に失敗しました。</font>';
        }
    }
    $sql=$pdo->prepare('select  * from artist where artist_id=?');
    $sql->execute([htmlspecialchars($_POST['artist_id'])]);
    $row=$sql->fetch();
?>
<form action="kousin3.php" method="post">
    <input type="hidden" name="artist_id" value="<?= $row['artist_id'] ?>">
    アーティスト名<input type="text" name="artist_mei" value="<?= $row['artist_mei'] ?>">
    <input type="submit" value="更新" name="kousin">
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