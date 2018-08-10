<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
    <link rel="stylesheet" href="http://<?=$url?>/web/css/total/reset.css">
    <link rel="stylesheet" href="http://<?=$url?>/web/css/total/sidebar.css">
    <link rel="stylesheet" href="http://<?=$url?>/web/css/total/table.css">
    <link rel="stylesheet" href="http://<?=$url?>/web/css/total/template.css">
    <link rel="stylesheet" href="http://<?=$url?>/web/css/order.css">
    <script src="http://<?=$url?>/web/js/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div id="container">
        <!-- header -->
        <? //include_once('./views/total/header.php'); ?>

        <!-- content -->
        <div id="content-wrp">
            <? include_once('./views/'.$content) ;?>
        </div>

        <!-- footer -->
        <? include_once('./views/total/footer.php'); ?>
    </div>
    <div id="fade" class="black-overlay"></div>
</body>
</html>