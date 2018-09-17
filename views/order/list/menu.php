<? if ($username == 'admin'): ?>
    <div id="menu-order-wrp">
        <ul>
            <li><a href="#" id="order-highlight" kind="<?=Order::KIND_HIGHLIGHT?>">Выделить</a></li>
            <li><a href="/order/highlight?kind=<?=Order::KIND_HIGHLIGHT?>">Показать выделенные</a></li>
            <li><a href="#" id="order-problem" kind="<?=Order::KIND_PROBLEM?>">Есть вопросы</a></li>
            <li><a href="#" id="order-progon" state="<?=OrderState::WORK?>">Выдать в работу</a></li>
            <br>
            <li><a href="#" id="show-add-form">Добавить заказ</a></li>
            <li><a href="#" id="order-update">Редактировать заказ</a></li>
            <li><a href="#" id="order-delete">Удалить заказ</a></li>
            <br>
            <li><a href="/main/login">Выйти</a></li>
        </ul>
    </div>
<? endif; ?>