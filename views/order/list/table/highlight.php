<table class="list-orders">
    <tr>
        <th width="30">
            <input type="checkbox" disabled>
        </th>
        <th width="80">№ заказа</th>
        <th width="60">Дата</th>
        <th width="60">Пакеты</th>
        <th width="150">Заказчик</th>
        <th id="change-note-letter">Примечание - Письмо</th>
    </tr>
    <? if ($orders): ?>
        <?foreach ($orders as $order):?>
            <tr>
                <td>
                    <input type="checkbox" name="order" order_id="<?=$order->id?>">
                </td>
                <td>
                    <a href="/order/index?order_id=<?=$order->id?>"><?=$order->cutNum?></a>
                </td>
                <td><?=$order->date_exec?></td>
                <td>
                    <?php
                        if ($order->type == Order::TYPE_PACKET) echo $order->count_pack;
                        else if ($order->type == Order::TYPE_GLASS) echo 'Стекло';
                        else echo 'закалка';
                    ?>
                </td>
                <td><?=$order->customer ? $order->customer->name : 'Не определен'?></td>
                <td class="note-letter left" note="<?=$order->note?>" letter="<?=$order->letter?>" state="note-letter">
                    <span class="red"><?=$order->note?></span> - <?=$order->letter?>
                </td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="7" style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>