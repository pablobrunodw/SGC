<div class="col-xs-12 admin-header">
	<h3>
		<i class="dashboard icon"></i> Panel de Control
	</h3>
</div>

<div class="col-xs-12 col-md-2 side-bar">
	<div class="panel panel-default">
		<div class="panel-heading">CONTENIDO</div>
		<div class="panel-body">
			<ul>
				<li><a href="add-article"><i class="icon pencil alternate"></i> Nuevo Artículo</a></li>
				<li><a href="articles"><i class="icon file text outline"></i> Artículos</a></li>
				<li><a href="categories"><i class="icon folder outline"></i>Categorías</a></li>
			</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">ESTRUCTURA</div>
		<div class="panel-body">
			<ul>
				<li><a href="pages"><i class="icon th list"></i> Menú</a></li>
				
			</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">USUARIOS</div>
		<div class="panel-body">
			<ul>
				<li><a href="users"><i class="icon users"></i> Usuarios</a></li>
			</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">CONFIGURACIÓN</div>
		<div class="panel-body">
			<ul>
				<li><a href="configs"><i class="icon cogs"></i> Configuración</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="col-xs-12 col-md-9 main-admin">
	<a href="users">
		<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
			<div class="resume-inner user col-xs-12">
				<div class="col-xs-6">
					<h1><?php echo $usersCount; ?></h1>
					<h3>Usuarios</h3>
				</div>
				<div class="col-xs-6"><i class="icon user circle"></i></div>
			</div>
		</div>
	</a>

	<a href="articles">
		<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
			<div class="resume-inner articles col-xs-12">
				<div class="col-xs-6">
					<h1><?php echo $artCount; ?></h1>
					<h3>Artículos</h3>
				</div>
				
				<div class="col-xs-6"><i class="icon file text outline"></i></div>
			</div>
		</div>
	</a>

	<!--<a href="sliders">
		<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
			<div class="resume-inner sliders col-xs-12">
				<div class="col-xs-6">
					<h1><?php echo $sliderCount; ?></h1>
					<h3>Sliders</h3>
				</div>
				
				<div class="col-xs-6"><i class="icon code"></i></div>
			</div>
		</div>
	</a>-->

	<a href="pages">
		<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
			<div class="resume-inner pages col-xs-12">
				<div class="col-xs-6">
					<h1><?php echo $pageCount; ?></h1>
					<h3>Páginas</h3>
				</div>
				
				<div class="col-xs-6"><i class="icon file"></i></div>
			</div>
		</div>
	</a>

	<a href="#">
		<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
			<div class="resume-inner visitors col-xs-12">
				<div class="col-xs-6">
					<h1><?php echo $visitorCount; ?></h1>
					<h3>Visitantes</h3>
				</div>
				
				<div class="col-xs-6"><i class="icon users"></i></div>
			</div>
		</div>
	</a>


	

</div>
<div class="col-xs-12 col-md-9 main-admin">
	<div class="panel panel-default">
		<div class="panel-heading">ARTÍCULOS POPULARES</div>
			<div class="panel-body">
				<table class="ui stackable table tblArticles">
					
					<tbody>
						<?php foreach ($popularArticles as $article) { ?>
							<tr>
								<td width="50" class="visits"><div class="ui horizontal huge label"><?php echo $article["art_visits"]; ?></div></td>
								<td class="btnEditArticle"  data-articleId="<?php echo $article['art_id']; ?>" ><?php echo $article["title"]; ?></td>
								<td width="140"><i class="icon calendar outline"></i> <?php echo date('d-M-Y',$article["last_visit"]); ?> </td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
	</div>
</div>