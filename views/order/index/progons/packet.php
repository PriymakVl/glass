<table>
    <tr>
        <th width="30">№</th>
        <th width="200">Стеклопакеты</th>
        <th width="200">Закалка</th>
        <th width="200">Эмалит</th>
    </tr>
    <!-- progons 1 -->
    <tr>
        <td>1</td>
        <td><? getProgonByType($progons_0,Progon::TYPE_PACKET); ?></td>
        <td><? getProgonByType($progons_0,Progon::TYPE_TEMP_PACKET); ?></td>
        <td><? getProgonByType($progons_0,Progon::TYPE_EMALIT); ?></td>
    </tr>
    <!-- progons 2 -->
    <? if ($progons_1): ?>
        <tr>
            <td>2</td>
            <td><? getProgonByType($progons_1,Progon::TYPE_PACKET); ?></td>
            <td><? getProgonByType($progons_1,Progon::TYPE_TEMP_PACKET); ?></td>
            <td><? getProgonByType($progons_1,Progon::TYPE_EMALIT); ?></td>
        </tr>
    <? endif; ?>
    <!-- progons 3 -->
    <? if ($progons_2): ?>
        <tr>
            <td>3</td>
            <td><? getProgonByType($progons_2,Progon::TYPE_PACKET); ?></td>
            <td><? getProgonByType($progons_2,Progon::TYPE_TEMP_PACKET); ?></td>
            <td><? getProgonByType($progons_2,Progon::TYPE_EMALIT); ?></td>
        </tr>
    <? endif; ?>
    <!-- progons 4 -->
    <? if ($progons_3): ?>
        <tr>
            <td>4</td>
            <td><? getProgonByType($progons_3,Progon::TYPE_PACKET); ?></td>
            <td><? getProgonByType($progons_3,Progon::TYPE_TEMP_PACKET); ?></td>
            <td><? getProgonByType($progons_3,Progon::TYPE_EMALIT); ?></td>
        </tr>
    <? endif; ?>
    <!-- progons 5 -->
    <? if ($progons_4): ?>
        <tr>
            <td>5</td>
            <td><? getProgonByType($progons_4,Progon::TYPE_PACKET); ?></td>
            <td><? getProgonByType($progons_4,Progon::TYPE_TEMP_PACKET); ?></td>
            <td><? getProgonByType($progons_4,Progon::TYPE_EMALIT); ?></td>
        </tr>
    <? endif; ?>
    <!-- progons 6 -->
    <? if ($progons_5): ?>
        <tr>
            <td>6</td>
            <td><? getProgonByType($progons_5,Progon::TYPE_PACKET); ?></td>
            <td><? getProgonByType($progons_5,Progon::TYPE_TEMP_PACKET); ?></td>
            <td><? getProgonByType($progons_5,Progon::TYPE_EMALIT); ?></td>
        </tr>
    <? endif; ?>
</table>