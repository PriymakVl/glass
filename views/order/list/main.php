<?php

require_once ('./models/order.php');

$type = Param::get('type');
$username = $_COOKIE['username'];
$light_id = Param::get('light_id');
$kind = Param::get('kind');
$state = Param::get('state');
?>

<!-- css files -->
<link rel="stylesheet" href="/web/css/order/list.css">
<link rel="stylesheet" href="/web/css/order/menu.css">
<link rel="stylesheet" href="/web/css/order/list_search.css">
<link rel="stylesheet" href="/web/css/form/order.css">

<div id="content">
    <!-- filters of orders -->
    <? include_once('filters.php'); ?>

    <!-- order form search -->
    <? include_once('form/search.php'); ?>

    <!-- order form add -->
    <? include_once('form/add.php'); ?>

    <!-- order form progon -->
    <? include_once('form/progons_packet.php'); ?>
    <? include_once('form/progons_glass.php'); ?>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <!-- order list table data -->
    <?
        if ($type) {
            if($type == Order::TYPE_GLASS) include_once('table/glass.php');
            else if ($type == Order::TYPE_All) include_once('table/all.php');
            else if ($type == Order::TYPE_PACKET) include_once('table/packet.php');
            else if ($type == Order::TYPE_TERM) include_once('table/term.php');
        }
        else if ($kind == Order::KIND_HIGHLIGHT) include_once('table/highlight.php');
        else include_once('table/packet.php');
    ?>

    <!-- order list menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/web/js/order/list/delete.js"></script>
<script src="/web/js/order/list/update.js"></script>
<script src="/web/js/order/list/managment.js"></script>
<script src="/web/js/order/list/filters.js"></script>
<script src="/web/js/order/list/change_note_letter.js"></script>
<script src="/web/js/order/list/progon.js"></script>
<script src="/web/js/order/list/show_add_form.js"></script>
<script src="/web/js/order/list/add_order.js"></script>
<script src="/web/js/order/total/add_default_note_form.js"></script>
<script src="/web/js/order/list/letter_parse.js"></script>
<script src="/web/js/datepicker.js"></script>

