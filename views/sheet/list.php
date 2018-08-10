<div id="content">
	<h2>Листы</h2>
	<table>
		<tr>
			<th width="40">№</th>
			<th width="70">Толщина</th>
			<th width="40">Код</th>
			<th width="70">Ширина</th>
			<th width="70">Высота</th>
            <th width="60">Кол-во</th>
			<th>Наименование</th>
			<th width="100">Примечание</th>
		</tr>
		<? $num = 1; ?>
		<?foreach ($sheets as $sheet): ?>
			<tr>
				<td><?=$num?></td>
				<td><?=$sheet->thickness?></td>
				<td>M1</td>
				<td><?=$sheet->width?></td>
				<td><?=$sheet->height?></td>
                <td><?=$sheet->count?></td>
				<td class="left">Наименование</td>
                <td><?=$sheet->note?></td>
			</tr>
			<?$num++?>
		<? endforeach; ?>
	</table>
</div>


