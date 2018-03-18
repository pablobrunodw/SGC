<div class="col-xs-12 admin-header">
	<h3 class="col-xs-6 col-sm-3 col-md-2">
		<i class="th list icon"></i> Menú
	</h3>
	<a href="add-page" class="ui inverted button"><i class="add icon"></i> Nuevo</a>
</div>


<!-- Muestra todos los artículos existentes -->

<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form">
	<table class="ui unstackable table tblPages">
		<thead>
			<tr>
				<th>Nombre</th>
				<th width="125">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pages as $page) { ?>
				<tr>
					<td><?php echo $page['title']; ?></td>
					<td>
						
						<?php if ($page['menu_id'] != 1){
						 if ($page['published']) {?>
							<i class="toggle on icon btnUnPublishPage" style="color: green;" data-articleId="<?php echo $page['menu_id']; ?>" title="Despublicar"></i>
						<?php } else { ?>
							<i class="toggle off icon btnPublishPage" style="color: red;" data-articleId="<?php echo $page['menu_id']; ?>" title="Publicar"></i>
						<?php } 
						}?>

						<?php if ($page['menu_id'] != 1){ ?><i class="trash outline icon btnRemovePage" data-articleId="<?php echo $page['menu_id']; ?>" title="Eliminar"></i> <?php } ?><i class="edit icon btnEditPage" data-articleId="<?php echo $page['menu_id']; ?>" title="Editar"></i></td>
				</tr>
			<?php } ?>
			<tr></tr>
		</tbody>
	</table>
</div>