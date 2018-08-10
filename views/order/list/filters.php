<h2>Заказы
    |
    <?=date('d.m.y')?>
    |
    <select id="filter-state">
        <option value="<?=Order::STATE_NOT_ISSUED?>">Не выданные</option>
        <option value="<?=Order::STATE_ISSUED?>" <? if (isset($_GET['state']) && $_GET['state'] == Order::STATE_ISSUED) echo 'selected' ?>>Выданные</option>
        <option value="<?=Order::STATE_MADED?>" <? if (isset($_GET['state']) && $_GET['state'] == Order::STATE_MADED) echo 'selected' ?>>Готовые</option>
        <option value="<?=Order::STATE_ALL?>" <? if (isset($_GET['state']) && $_GET['state'] == Order::STATE_ALL) echo 'selected' ?>>Все</option>
    </select>
    |
    <select id="filter-type">
        <option value="<?=Order::TYPE_PACKET?>">Пакеты</option>
        <option value="<?=Order::TYPE_GLASS?>"  <? if (isset($_GET['type']) && $_GET['type'] == Order::TYPE_GLASS) echo 'selected' ?>>Стекло</option>
        <option value="<?=Order::TYPE_All?>" <? if (isset($_GET['type']) && $_GET['type'] == Order::STATE_ALL) echo 'selected' ?>>Все</option>
    </select>
    |
</h2>