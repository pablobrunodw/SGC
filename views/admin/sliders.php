<div class="col-xs-12 admin-header">
	<h3 class="col-xs-6 col-sm-3 col-md-2">
		<i class="code icon"></i> Sliders
	</h3>
	<a href="add-slider" class="ui inverted button"><i class="add icon"></i> Nuevo</a>
</div>


<!-- Muestra todos los artículos existentes -->

<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form">
	<table class="ui unstackable table tblSliders">
		<thead>
			<tr>
				<th class="hidden-phone">Imagen</th>
				<th>Slider</th>
				<th width="125">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($sliders as $slider) { ?>
				<tr>
					<td width="160" class="hidden-phone"><img style="width: 150px;" src='../res/img/img_articles/<?php echo $slider["img_article"]; ?>.png'></td>
					<td><?php echo $slider['title']; ?></td>
					<td><?php if ($slider['published']) {?>
							<i class="toggle on icon btnUnPublishArticle" style="color: green;" data-articleId="<?php echo $slider['art_id']; ?>" title="Despublicar"></i>
						<?php } else { ?>
							<i class="toggle off icon btnPublishArticle" style="color: red;" data-articleId="<?php echo $slider['art_id']; ?>" title="Publicar"></i>
						<?php } ?>
						<i class="edit icon btnEditSlider" data-sliderId="<?php echo $slider['art_id']; ?>" title="Editar"></i><i class="trash outline icon btnRemoveSlider" data-sliderId="<?php echo $slider['art_id']; ?>" title="Eliminar"></i></td>
				</tr>
			<?php } ?>
			<tr></tr>
		</tbody>
	</table>
</div>