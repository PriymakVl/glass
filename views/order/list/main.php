<?php

require_once ('./models/order.php');
$type = Param::get('type');
?>

<div id="content">
    <!-- filters of orders -->
    <? include_once('filters.php'); ?>

    <!-- order form search -->
    <? include_once('form/search.php'); ?>

    <!-- order form add -->
    <? include_once('form/add.php'); ?>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <!-- order list table data -->
    <?
        if ($type) {
            if($type == Order::TYPE_GLASS) include_once('table/glass.php');
            else if ($type == Order::TYPE_All) include_once('table/all.php');
            else if ($type == Order::TYPE_PACKET) include_once('table/packet.php');
        }
        else include_once('table/packet.php');
    ?>

    <!-- order list menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="http://<?=$url?>/web/js/order/delete.js"></script>
<script src="http://<?=$url?>/web/js/order/update.js"></script>
<script src="http://<?=$url?>/web/js/order/managment.js"></script>
<script src="http://<?=$url?>/web/js/order/filters.js"></script>
<script src="http://<?=$url?>/web/js/order/change_note_letter.js"></script>
