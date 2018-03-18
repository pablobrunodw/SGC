<div class="col-xs-12 admin-header">
	<h3 class="col-xs-6 col-sm-3 col-md-2">
		<i class="file text outline icon"></i> Artículos
	</h3>
	<a href="add-article" class="ui inverted button"><i class="add icon"></i> Nuevo</a>
</div>


<!-- Muestra todos los artículos existentes -->

<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form">
	<table class="ui unstackable table tblArticles">
		<thead>
			<tr>
				<th class="hidden-phone">Imagen</th>
				<th>Artículo</th>
				<th>Destacado</th>
				<th width="125">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($articles as $article) { ?>
				<tr>
					<td width="160" class="hidden-phone"><img style="width: 150px;" src='../res/img/img_articles/<?php echo $article["img_article"]; ?>'></td>
					<td><?php echo $article['title']; ?></td>
					<td>
						<?php if ($article['featured']) {?>
							<i class="star icon btnUnFeaturedArticle" style="color: rgb(0,155,255);" data-articleId="<?php echo $article['art_id']; ?>" title="No destacado"></i>
						<?php } else { ?>
							<i class="star empty icon btnFeaturedArticle" style="color: gray;" data-articleId="<?php echo $article['art_id']; ?>" title="Destacar"></i>
						<?php } ?>
					</td>
					<td>
						<?php if ($article['published']) {?>
							<i class="toggle on icon btnUnPublishArticle" style="color: green;" data-articleId="<?php echo $article['art_id']; ?>" title="Despublicar"></i>
						<?php } else { ?>
							<i class="toggle off icon btnPublishArticle" style="color: red;" data-articleId="<?php echo $article['art_id']; ?>" title="Publicar"></i>
						<?php } ?>
						

						<i class="edit icon btnEditArticle" data-articleId="<?php echo $article['art_id']; ?>" title="Editar"></i><i class="trash outline icon btnRemoveArticle" data-articleId="<?php echo $article['art_id']; ?>" title="Eliminar"></i></td>
				</tr>
			<?php } ?>
			<tr></tr>
		</tbody>
	</table>
</div>