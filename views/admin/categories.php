<div class="col-xs-12 admin-header">
	<h3 class="col-xs-6 col-sm-3 col-md-2">
		<i class="folder open outline icon"></i> Categorías
	</h3>
	<a href="add-category" class="ui inverted button"><i class="add icon"></i> Nueva</a>
</div>

<!-- Muestra todas las categorías existentes -->

<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form">
	<table class="ui single line table tblCategories">
		<thead>
			<tr>
				<th>Categoría</th>
				<th width="50">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($categories as $category) { ?>
				<tr>
					<td><?php echo $category['category']; ?></td>
					<td><i class="edit icon btnEditCategory" data-categoryId="<?php echo $category['category_id']; ?>" title="Editar"></i><i class="trash outline icon btnRemoveCategory" data-categoryId="<?php echo $category['category_id']; ?>" title="Eliminar"></i></td>
				</tr>
			<?php } ?>
			<tr></tr>
		</tbody>
	</table>
</div>