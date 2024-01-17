<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    if(isset($_POST['kousin'])){
        $sql=$pdo->prepare('update genre set genre_mei=? where genre_id=?');
        if(empty($_POST['genre_mei'])){
            echo 'ジャンル名を入力してください。';
        }else if($sql->execute([htmlspecialchars($_POST['genre_mei']),$_POST['genre_id']])){
            echo '<font color="red">更新に成功しました。</font>';
        }else{
            echo '<font color="red">更新に失敗しました。</font>';
        }
    }
    $sql=$pdo->prepare('select  * from genre where genre_id=?');
    $sql->execute([htmlspecialchars($_POST['genre_id'])]);
    $row=$sql->fetch();
?>
<form action="kousin2.php" method="post">
    <input type="hidden" name="genre_id" value="<?= $row['genre_id'] ?>">
    ジャンル名<input type="text" name="genre_mei" value="<?= $row['genre_mei'] ?>">
    <input type="submit" value="更新" name="kousin">
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