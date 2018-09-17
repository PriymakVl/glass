<table>
    <tr>
        <th width="30">№</th>
        <th width="200">Закалка</th>
        <th width="200">Порезка</th>
        <th width="200">Что то</th>
    </tr>
    <? if ($order->progons): ?>
        <!-- progons 1 -->
        <tr>
            <td>1</td>
            <td><? getProgonByType($progons_0,Progon::TYPE_TEMP_GLASS); ?></td>
            <td><? getProgonByType($progons_0,Progon::TYPE_CUT); ?></td>
            <td></td>
        </tr>
        <!-- progons 2 -->
        <? if ($progons_1): ?>
            <tr>
                <td>2</td>
                <td><? getProgonByType($progons_0,Progon::TYPE_TEMP_GLASS); ?></td>
                <td><? getProgonByType($progons_0,Progon::TYPE_CUT); ?></td>
                <td></td>
            </tr>
        <? endif; ?>
        <!-- progons 3 -->
        <? if ($progons_2): ?>
            <tr>
                <td>3</td>
                <td><? getProgonByType($progons_0,Progon::TYPE_TEMP_GLASS); ?></td>
                <td><? getProgonByType($progons_0,Progon::TYPE_CUT); ?></td>
                <td></td>
            </tr>
        <? endif; ?>
        <!-- progons 4 -->
        <? if ($progons_3): ?>
            <tr>
                <td>4</td>
                <td><? getProgonByType($progons_0,Progon::TYPE_TEMP_GLASS); ?></td>
                <td><? getProgonByType($progons_0,Progon::TYPE_CUT); ?></td>
                <td></td>
            </tr>
        <? endif; ?>
        <!-- progons 5 -->
        <? if ($progons_4): ?>
            <tr>
                <td>5</td>
                <td><? getProgonByType($progons_0,Progon::TYPE_TEMP_GLASS); ?></td>
                <td><? getProgonByType($progons_0,Progon::TYPE_CUT); ?></td>
                <td></td>
            </tr>
        <? endif; ?>
        <!-- progons 6 -->
        <? if ($progons_5): ?>
            <tr>
                <td>6</td>
                <td><? getProgonByType($progons_0,Progon::TYPE_TEMP_GLASS); ?></td>
                <td><? getProgonByType($progons_0,Progon::TYPE_CUT); ?></td>
                <td></td>
            </tr>
        <? endif; ?>
    <? else: ?>
        <tr>
            <td colspan="4">Прогоны не указаны</td>
        </tr>
    <? endif; ?>
</table>


