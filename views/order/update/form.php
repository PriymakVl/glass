<div id="order-form-update-wrp">
    <form action="/order/update" method="post">
        <!-- number -->
        <label>Номер заказ</label>
        <input type="text" name="number" value="<?=$order->number?>"><br>
        <!-- date -->
        <label>Срок выполнения</label>
        <input type="text" name="date_exec" value="<?=date('d.m.y', $order->date_exec)?>"><br>
        <!-- state -->
        <label>Состояние заказа</label>
        <select id="filter-state" name="state">
            <option value="<?=Order::STATE_NOT_ISSUED?>">Не выдан</option>
            <option value="<?=Order::STATE_ISSUED?>" <? if ($order->state == Order::STATE_ISSUED) echo 'selected' ?>>Выдан</option>
            <option value="<?=Order::STATE_MADED?>" <? if ($order->state == Order::STATE_MADED) echo 'selected' ?>>Готов</option>
        </select>
        <br>
        <!-- type -->
        <label>Тип заказа</label>
        <select id="filter-type" name="type">
            <option value="<?=Order::TYPE_PACKET?>">Пакет</option>
            <option value="<?=Order::TYPE_GLASS?>" <? if ($order->type == Order::TYPE_GLASS) echo 'selected' ?>>Стекло</option>
        </select>
        <br>
        <!-- count packet -->
        <label>Количество пакетов</label>
        <input  type="text" name="count_pack" value="<?=$order->count_pack?>">
        <br>
        <!-- text of letter -->
        <label>Примечание</label>
        <textarea name="note" style="width: 600px" name="note"><?=$order->note?></textarea>
        <br>
        <!-- text of letter -->
        <label>Текст письма</label>
        <textarea name="letter" style="width: 600px"><?=$order->letter?></textarea>
        <br>
        <!-- order id -->
        <input type="hidden" name="order_id" value="<?=$order->id?>">
        <input type="submit" value="Сохранить" name="update">
    </form>
</div>