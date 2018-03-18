
<!-- Header -->
<div class="col-xs-12 admin-header">
	<h3>
		<i class="add icon"></i> Agregar Slider
	</h3>
</div>

<!-- Formulario de carga -->
<form enctype="multipart/form-data" id="article_form" class="ui form col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form" method="POST">
	
	<!-- Título de la noticia -->
	<h4>Título</h4>
	<div class="ui left icon input">
		<input type="text" name="txtTitle" class="txtTitle" placeholder="Título">
		<i class="write icon"></i>
	</div>

	<!-- Categoría de la noticia -->
	<h4 style="display: none;">Categoría</h4>
	<div class="ui left icon field" style="display: none;">
		<select class="txtCategory" name="txtCategory" id="txtCategory">
			
			<?php foreach ($categories as $category): ?>
				<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<!-- Portada de la Noticia -->
	<h4>Imagen</h4>
	<div class="ui left icon input">
		<input type="file" name="img_file" class="img_file" id="img_file">
		<i class="image icon"></i>
	</div>


	<!-- Contenido de la noticia -->
	<script>
		function charcount(txtArtIntro,counter){
			var len=document.getElementById('txtArtIntro').value.length;
			document.getElementById('counter').innerHTML = len;
		}
	</script>
	<h4>Resumen</h4>
	<div class="ui left icon input">
		<textarea name="txtArtIntro" class="txtArtIntro" maxlength="150" id="txtArtIntro" onkeyup="charcount('txtArtIntro','counter')" onkeydown="charcount('txtArtIntro','counter')" onmouseout="charcount('txtArtIntro','counter')"></textarea>
	</div>
	<p class="char-count">El máximo para el resumen es de 150 caracteres: <span id="counter">0</span>/150</p>

	<h4>Cuerpo</h4>
	<div class="ui left icon input">
		<textarea name="txtArtBody" id="bodyeditor"></textarea>
	</div>
	
	<!-- Botones -->
	<div class="ui buttons pull-right">
	  <button class="ui positive button btnSaveSlider">Guardar</button>
	  <div class="or" data-text="O"></div>
	  <a href='sliders' class="ui button btnCancelSlider" >Cancelar</a>
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
