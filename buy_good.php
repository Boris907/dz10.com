<?php 

$good_id=$_GET['id_item'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Заказ</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/my.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<div class="page-header">
		<a href="index.php"><h1>Магазин нужных товаров</h1></a>
	</div>
</div>
<form class="form-horizontal" action="end_order.php" method="post">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Имя</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="name" id="name" placeholder="Имя">
    </div>
  </div>
  <div class="form-group">
    <label for="telephone" class="col-sm-2 control-label">Телефон</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="telephone" id="telephone" placeholder="777-55-55">
    </div>
  </div>
  <div class="form-group">
    <label for="e_mail" class="col-sm-2 control-label">E-mail</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="e_mail" id="e_mail" placeholder="def@gmail.com">
    </div>
  </div>
  <div class="form-group">
    <label for="number" class="col-sm-2 control-label">Количество</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="number" id="number" placeholder="0">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="addbutton">Отправить заказ</button>
    </div>
  </div>
  <?php echo "<input type=\"hidden\" name=\"good_id\" value=$good_id>";?>
</form>
	
</body>
</html>