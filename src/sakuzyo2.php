<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('delete from genre where genre_id=?');
    if($sql->execute([$_POST['genre_id']])){
        echo '<font color="red">削除に成功しました。</font>';
    }else{
        echo '<font color="red">削除に成功しました。</font>';
    }
?>
<?php require 'footer.php'; ?>