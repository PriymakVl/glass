<div id="content">
	<h2>Бренды</h2>
	<table>
		<tr>
			<th width="40">№</th>
            <th width="40">Тип</th>
            <th width="70">Произв.</th>
            <th width="200">Алиас</th>
			<th>Наименование</th>
		</tr>
		<? $num = 1; ?>
		<?foreach ($brands as $brand): ?>
			<tr>
				<td><?=$num?></td>
                <td><?=$brand->type?></td>
				<td><?=$brand->manufacturer?></td>
				<td class="left"><?=$brand->alias?></td>
				<td class="left"><?=$brand->name?></td>
			</tr>
			<?$num++?>
		<? endforeach; ?>
	</table>
</div>


