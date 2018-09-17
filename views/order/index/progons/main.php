<?php

    function getProgonsByKey($all_progons, $key_arr) {
        $progons = [];
        foreach ($all_progons as $progon) {
            if ($progon->key_arr == $key_arr) $progons[] = $progon;
        }
        return $progons;
    }

    function getProgonByType($progons, $type) {
        foreach ($progons as $progon) {
            if ($progon->type == $type) {
                echo $progon->number;
                break;
            }
        }
    }

    $progons_0 = getProgonsByKey($order->progons, 0);
    $progons_1 = getProgonsByKey($order->progons, 1);
    $progons_2 = getProgonsByKey($order->progons, 2);
    $progons_3 = getProgonsByKey($order->progons, 3);
    $progons_4 = getProgonsByKey($order->progons, 4);
    $progons_5 = getProgonsByKey($order->progons, 5);

    ?>

<li>
    <input type="radio" name="tabs" id="tab-2">
    <label for="tab-2">Прогоны</label>
    <div id="progons-wrp" class="tab-content">
        <?
            if ($order->type == Order::TYPE_PACKET) include_once('packet.php');
            else include_once('glass.php');
        ?>
    </div>
</li>

