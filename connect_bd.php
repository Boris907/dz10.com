<?php 


try{
	$pdo = new PDO('mysql:host=localhost;dbname=shop_db','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
	
	}
catch(PDOException $e){
	echo "Не удалось подключиться к БД<br>";
	echo $e->getMessage();
	exit();
	}

	
?>