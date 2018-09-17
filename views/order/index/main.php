<?php

require_once ('./models/order.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/web/css/order/menu.css">
<link rel="stylesheet" href="/web/css/order/index.css">

<div id="content">

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <div id="order-index-wrp">
        <ul class="tabs">

            <!-- order  data -->
            <? include_once('data.php'); ?>

            <!-- progons -->
            <? include_once('progons/main.php'); ?>

            <!-- statistics -->
            <? include_once('statistics.php'); ?>

        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<!--<script src="/web/js/order/delete.js"></script>-->

