<div id="order-form-update-wrp">
    <form action="/order/update" method="post">
        <!-- first row -->
        <div class="form-add-first-row">
            <!-- number -->
            <div class="form-number-wrp">
                <label>Номер заказа:</label>
                <input type="text" name="number" value="<?=$order->number?>">
            </div>

            <!-- type orders-->
            <div class="form-type-wrp">
                <label>Тип заказа:</label>
                <select name="type">
                    <option value="<?=Order::TYPE_PACKET?>" <? if ($order->type == Order::TYPE_PACKET) echo 'selected' ?>>Пакет</option>
                    <option value="<?=Order::TYPE_GLASS?>" <? if ($order->type == Order::TYPE_GLASS) echo 'selected' ?>>Стекло</option>
                    <option value="<?=Order::TYPE_TERM?>" <? if ($order->type == Order::TYPE_TERM) echo 'selected' ?>>Закалка</option>
                </select>
            </div>

            <!-- date -->
            <div class="form-date-wrp">
                <label>Срок выполнения:</label>
                <input type="text" name="date_exec" id="datepicker" value="<?=date('d.m.y', $order->date_exec)?>">
            </div>

            <!-- state -->
            <div class="form-state-wrp">
                <label>Состояние:</label>
                <select id="filter-state" name="state">
                    <option value="<?=OrderState::PREPARATION?>">В подготовке</option>
                    <option value="<?=OrderState::WORK?>" <? if ($order->state == OrderState::WORK) echo 'selected' ?>>Выдан</option>
                    <option value="<?=OrderState::MADE?>" <? if ($order->state == OrderState::MADE) echo 'selected' ?>>Готов</option>
                </select>
            </div>
        </div><!--.form-add-first-row-->

        <!-- two row-->
        <div id="form-add-two-row">
            <!-- count packets-->
            <div class="form-count-packet-wrp">
                <label>Количество пакетов:</label>
                <input  type="text" name="count_pack" value="<?=$order->count_pack?>">
            </div>

            <!-- type packets-->
            <div class="form-type-packet-wrp">
                <label>Тип пакета:</label>
                <select name="type-packet">
                    <option value="">Без обработки</option>
                    <option value="">С обработкой</option>
                </select>
            </div>
        </div>

        <!-- three row-->
        <div id="form-add-three-row">
            <label>чертеж:</label>
            <input type="checkbox" id="note-dwg">&nbsp;&nbsp;&nbsp;&nbsp;
            <label>рекламация:</label>
            <input type="checkbox" id="note-repair">&nbsp;&nbsp;&nbsp;&nbsp;
            <hr>
            <!-- note -->
            <label>Примечание:</label>
            <textarea name="note"><?=$order->note?></textarea>
        </div>

        <!-- four row-->
        <div id="form-add-four-row">
            <!-- text of letter -->
            <label>Текст письма:</label>
            <textarea name="letter" id="text-letter"><?=$order->letter?></textarea>
        </div>

        <!-- order id -->
        <input type="hidden" name="order_id" value="<?=$order->id?>">
        <input type="submit" value="Сохранить" name="update">
    </form>
</div>