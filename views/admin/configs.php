
<!-- Header -->
<div class="col-xs-12 admin-header">
	<h3>
		<i class="cogs icon"></i> Editar Configuraciones
	</h3>
</div>

<!-- Formulario de carga -->
<form enctype="multipart/form-data" id="article_form" class="ui form col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form" method="POST">
	
	<!-- Título de la noticia -->
	<h4>Nombre del sitio</h4>
	<div class="ui left icon input">
		<input type="text" name="txtSiteName" id="txtSiteName" class="txtSiteName" value="<?php echo $config[0]['site_name'] ?>">
		<i class="write icon"></i>
	</div>
	<input type="text" name="txtId" class="txtId" value="<?php echo $config[0]['config_id'] ?>" style="display: none;">


	<!-- Categoría de la noticia -->
	<!--<h4>Categoría</h4>
	<div class="ui left icon field">
		<select class="txtCategory" name="txtCategory" id="txtCategory">
			
			<?php foreach ($categories as $category): ?>
				<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>-->
	

	<div class="col-xs-12">
		<div class="col-xs-12 col-sm-4 col-sm-offset-0">
			<h4>Logo Actual</h4>
			<img style="max-width: 100%" src="<?php echo $config[0]['logo_img']; ?>">
		</div>
		
		<div class="col-xs-12 col-sm-8 col-sm-offset-0">

			<h4 class="col-xs-12">Nuevo Logo</h4>
			<div class="ui left icon input">
				<input type="file" name="logo_file" class="logo_file" id="logo_file">
				<i class="image icon"></i>
			</div>
		</div>
	</div>

	
	<div class="col-xs-12">
		<div class="col-xs-12 col-sm-4 col-sm-offset-0">
			<h4>Video Actual</h4>
			<video controls="" autoplay="" muted="" loop="" preload="auto">
				<source src="<?php echo $config[0]['video_name']; ?>" type="video/mp4">
			</video>
		</div>
	
		<!-- Portada de la Noticia -->
		<div class="col-xs-12 col-sm-8 col-sm-offset-0">
			<h4 class="col-xs-12">Nuevo Video	</h4>
			<div class="ui left icon input">
				<input type="file" name="video_file" class="video_file" id="video_file">
				<i class="film icon"></i>
			</div>
		</div>
	</div	>

	<div class="col-xs-12">
		<div class="col-xs-12 col-sm-4 col-sm-offset-0">
			<h4>Portada Actual</h4>
			<img style="max-width: 100%" src="<?php echo $config[0]['img_frontend']; ?>">
		</div>
		
		<div class="col-xs-12 col-sm-8 col-sm-offset-0">

			<h4 class="col-xs-12">Nueva Portada</h4>
			<div class="ui left icon input">
				<input type="file" name="frontend_file" class="frontend_file" id="frontend_file">
				<i class="image icon"></i>
			</div>
		</div>
	</div>

	<!-- Contenido de la noticia -->
	<script>
		function charcount(txtSiteDesc,counter){
			var len=document.getElementById('txtSiteDesc').value.length;
			document.getElementById('counter').innerHTML = len;
		}
	</script>
	<h4>Descripción del sitio</h4>
	<div class="ui left icon input">
		<textarea name="txtSiteDesc" class="txtSiteDesc" maxlength="150" id="txtSiteDesc" onkeyup="charcount('txtSiteDesc','counter')" onkeydown="charcount('txtSiteDesc','counter')" onmouseout="charcount('txtSiteDesc','counter')"><?php echo $config[0]['meta_desc'] ?></textarea>
	</div>
	<p class="char-count">El máximo para la descripción es de 150 caracteres: <span id="counter">0</span>/150</p>



	<h4 >Palabras Claves</h4>
	<div class="ui left icon input">
		<textarea name="txtSiteKW" class="txtSiteKW" id="txtSiteKW"><?php echo $config[0]['meta_keys'] ?></textarea>
	</div>


	<!--<h4>Cuerpo</h4>
	<div class="ui left icon input">
		<textarea name="txtArtBody" id="bodyeditor"><?php echo $article[0]['body'] ?></textarea>
	</div>-->


	
	<!-- Botones -->
	<div class="ui buttons pull-right">
	  <button class="ui positive button btnUpdateSiteConfig">Guardar</button>
	  <div class="or" data-text="O"></div>
	  <a href='/admin' class="ui button btnCancelSiteConfig" >Cancelar</a>
	</div>

	<div class="progress">
	  <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
	    
	  </div>
	</div>
	<h5>Progreso</h5>

	<!--<div class="ui progress">
	  <div class="bar">
	    <div class="progress" id="progress"></div>
	  </div>
	  <div class="label">Uploading Files</div>
	</div>-->

</form>
