<table>
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
        <?foreach ($orders as $order): ?>
            <tr style="background: <?=$order->bgColor?>">
                <td <? if ($order->id == $light_id) echo 'style="background: #00F!important"'?>>
                    <input type="checkbox" name="order" order_id="<?=$order->id?>">
                </td>
                <td>
                    <a href="../../../../index.php"><?=$order->cutNum?></a>
                </td>
                <td><?=$order->date_exec?></td>
                <td><?=$order->count_pack?></td>
                <td><?=$order->customer ? $order->customer->name : 'Не определен'?></td>
                <td class="note-letter left" note="<?=$order->note?>" letter="<?=$order->letter?>" state="<?= $order->note ? 'note' : 'letter'?>">
                    <? if ($order->note): ?>
                        <span class="red"><?=$order->note?></span>
                    <? else: ?>
                        <?=$order->letter?>
                    <? endif; ?>
                </td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="7" style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>