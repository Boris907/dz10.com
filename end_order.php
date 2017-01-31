<?php

require_once ('connect_bd.php');

if (isset($_POST['addbutton'])) {
	
	$name=$_POST['name'];
	$telephone=$_POST['telephone'];
	$e_mail=$_POST['e_mail'];
	$number=$_POST['number'];
	$good_id=$_POST['good_id'];

	try{
	$sql = "INSERT INTO `orders` SET `name`=:name, `telephone`=:tel, `e_mail`=:mail, `goods_id`=:id, `number`=:number";
	$s = $pdo->prepare($sql);
	$s->bindValue(':name', $name);
	$s->bindValue(':tel', $telephone);
	$s->bindValue(':mail', $e_mail);
	$s->bindValue(':id', $good_id);
	$s->bindValue(':number', $number);
	$s->execute();

	
	}catch(PDOException $e){
	echo "Ошибка при добавлении записей<br>";
	echo $e->getMessage();
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="bootstrap/css/my.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="page-header">
        <a href="index.php"><h1>Магазин нужных товаров</h1></a>
    </div>
</div>
<div>
    <h1>Товар успешно добавлен</h1>
</div>
</body>
</html>
