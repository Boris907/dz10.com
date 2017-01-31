<?php 

require_once ('connect_bd.php');


try{
	$sql = "SELECT `id_good`, `title`, `price`, `description`,`link` FROM `goods` WHERE 1";
	$result =$pdo->query($sql);

}catch(PDOException $e){
	echo "Ошибка при извлечении записей<br>";
	echo $e->getMessage();
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
		<div class="container-fluid">
		<div class="row">
				<?php foreach($result as $row): ?>
				<div class="col-xs-3">
					<h3><?=$row['title']?></h3>
					<div class="thumbnail">
					     <?echo "<a href='good.php?id_item=".$row['id_good']."'><img width='50%' src=".$row['link']."></a>";?>
					<div class="caption">
					<p>Цена: <?=$row['price']?> грн</p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
</div>
</body>
</html>