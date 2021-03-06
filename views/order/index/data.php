<li>
    <input type="radio" name="tabs" id="tab-1" checked>
    <label for="tab-1">Данные</label>
    <div class="tab-content">
        <table>
            <tr>
                <th width="30">№</th>
                <th width="200">Наименование</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>1</th>
                <td>Номер заказа</th>
                <td><?=$order->number?></th>
            </tr>
            <tr>
                <td>2</th>
                <td>Состояние</th>
                <td><?=$order->stateName?> с <?=date('d.m.y', $order->date_state)?></th>
            </tr>
            <tr>
                <td>3</th>
                <td>Срок выполнения</th>
                <td><? if ($order->date_exec) echo date('d.m.y', $order->date_exec); ?></th>
            </tr>
            <? if ($order->note): ?>
                <tr>
                    <td>4</th>
                    <td>Примечание</th>
                    <td class="left red"><?=$order->note?></th>
                </tr>
            <? endif; ?>
            <tr>
                <td>5</th>
                <td>Текст письма</th>
                <td class="left"><?=$order->letter?></th>
            </tr>
        </table>
    </div>
</li>