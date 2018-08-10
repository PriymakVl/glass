<div id="content">
    <h2>Марка стекла</h2>
    <table>
        <tr>
            <th width="30%">Название</th>
            <th width="70%">Значение</th>
        </tr>
        <tr>
            <td>Название</td>
            <td><?=$brand->name?></td>
        </tr>
        <tr>
            <td>Короткое название</td>
            <td><?=$brand->alias?></td>
        </tr>
        <tr>
            <td>Производитель</td>
            <td><?=$brand->manufacturer->alias?></td>
        </tr>
        <tr>
            <td>Тип стекла</td>
            <td><?=$brand->type?></td>
        </tr>
        <tr>
            <td>Описание стекла</td>
            <td><?=$brand->description?></td>
        </tr>

    </table>
</div>