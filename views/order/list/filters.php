<div id="order-filters-wrp">
    <? if ($state == OrderState::PREPARATION): ?>
        <span>Заказы в подготовке</span>
    <? elseif ($state == OrderState::WORK): ?>
        <span>Заказы в работе</span>
    <? elseif ($state == OrderState::ALL): ?>
        <span>Все заказы</span>
    <? elseif ($kind == Order::KIND_HIGHLIGHT): ?>
        <span>Выделенные заказы</span>
    <? else: ?>
        <span>Заказы в подготовке</span>
    <? endif; ?>
    &nbsp;|&nbsp;
    <select id="filter-type">
        <option value="<?=Order::TYPE_PACKET?>">Пакеты</option>
        <option value="<?=Order::TYPE_GLASS?>"  <? if ($type == Order::TYPE_GLASS) echo 'selected' ?>>Стекло</option>
        <option value="<?=Order::TYPE_TERM?>" <? if ($type == Order::TYPE_TERM) echo 'selected' ?>>Закалка</option>
        <option value="<?=Order::TYPE_All?>" <? if ($type == Order::TYPE_All) echo 'selected' ?>>Все</option>
    </select>
    &nbsp;|&nbsp;
</div>