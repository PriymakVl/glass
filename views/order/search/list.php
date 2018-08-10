<div id="search-list-orders-wrp">
    <ul>
        <? foreach ($orders as $order): ?>
            <li>
                <a href="/order?order_id=<?=$order->id?>"><?=$order->number?></a>
            </li>
        <? endforeach; ?>
    </ul>
</div>