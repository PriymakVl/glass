<?php

require_once ('./models/order.php');

?>

<div id="content">
    <h2>Перечень заказов соответствующих запросу</h2>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <!-- order  list -->
    <? include_once('list.php'); ?>


</div><!-- id content -->

<!-- js files -->
<!--<script src="/web/js/order/delete.js"></script>-->