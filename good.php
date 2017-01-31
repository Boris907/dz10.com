<?php

require_once('connect_bd.php');

$good_id = $_GET['id_item'];

if (!isset($_COOKIE['viewed'])) {
    setcookie('viewed', $good_id, time() + 3600 * 24 * 30);
} else if (isset($_COOKIE['viewed'])) {
    $ids = explode(" ", $_COOKIE['viewed']);

    if (!is_numeric(array_search($good_id, $ids))) {
        $_COOKIE['viewed'] .= " " . $good_id;
        setcookie('viewed', $_COOKIE['viewed']);
        if (count($ids) == 4) {
            unset($ids[0]);
            $ids[] = $good_id;
            $_COOKIE['viewed'] = implode(' ', $ids);
            setcookie('viewed', $_COOKIE['viewed']);
        }

    }

}

try {
    $sql = "SELECT `id_good`, `title`, `price`, `description`, `link` FROM `goods` WHERE `id_good` = " . $good_id;
    $result = $pdo->query($sql);

} catch (PDOException $e) {
    echo "Ошибка при извлечении записей 1<br>";
    echo $e->getMessage();
}

if (!empty($ids)) {
    try {
        $str = '';
        foreach ($ids as $id) {
            $str .= $id . ",";
        }
        $str = substr($str, 0, -1);
        $sqlCookie = "SELECT `id_good`,`title`,`link` FROM `goods` WHERE `id_good` IN (" .$str.")";
        $resultCookie = $pdo->query($sqlCookie);

    } catch (PDOException $e) {
        echo "Ошибка при извлечении записей 2<br>";
        echo $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заказать</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/my.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="page-header">
        <a href="index.php"><h1>Магазин нужных товаров</h1></a>
    </div>
</div>
<div class="container-fluid">
    <?php foreach ($result as $row): ?>
    <div class="row">
        <div class="col-xs-offset-4 col-xs-4">
            <div class="thumbnail">
                <? echo "<a href='good.php?id_item=" . $row['id_good'] . "'><img width='50%' src=" . $row['link'] . "></a>"; ?>
                <div class="caption">
                    <h3><?= $row['title'] ?></h3>
                    <p><?= $row['description'] ?></p>
                    <p><? echo "<a href='buy_good.php?id_item=" . $good_id . "' class=\"btn btn-primary\">Купить</a>"; ?>
                        <a href="index.php" class="btn btn-default" role="button">Назад</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<div class="panel panel-primary">
    <div class="panel-body">
        Недавно просмотренные
    </div>
    <div class="panel-footer">
        <?php if(!empty($ids)):?>
        <?php foreach ($resultCookie as $good): ?>
            <div class="thumbnail" style="width: 100px; display: inline-block;">
                <p><?= $good['title'] ?></p>
                <? echo "<a href='good.php?id_item=" . $good['id_good'] . "'><img width='50%' src=" . $good['link'] . "></a>"; ?>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>