<?php

require_once ('./models/order.php');

?>

<div id="content">
	<h2>
        <a href="/order/list">Заказы</a>
    </h2>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <!-- order  data -->
    <? include_once('table.php'); ?>

    <!-- order list menu -->
    <? //include_once('menu.php'); ?>

    <!-- order form update -->
    <? //include_once('form_update.php'); ?>

</div><!-- id content -->

<!-- js files -->
<!--<script src="/web/js/order/delete.js"></script>-->

