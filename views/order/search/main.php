<?php

require_once ('./models/order.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/web/css/order.css">

<div id="content">
    <h2>Перечень заказов соответствующих запросу</h2>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <!-- order  list -->
    <? include_once('list.php'); ?>


</div><!-- id content -->

<!-- js files -->
<!--<script src="/web/js/order/delete.js"></script>-->