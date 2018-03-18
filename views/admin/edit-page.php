
<!-- Header -->
<div class="col-xs-12 admin-header">
	<h3>
		<i class="add icon"></i> Editar Página
	</h3>
</div>

<!-- Formulario de carga -->
<form enctype="multipart/form-data" id="page_form" class="ui form col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form" method="POST">
	<div class="col-xs-12 col-sm-6">
		<!-- Título de la noticia -->
		<h4>Título</h4>
		<div class="ui left icon input">
			<input type="text" name="txtTitle" class="txtTitle" value="<?php echo $page[0]['title'] ?>" id="txtTitle">
			<i class="write icon"></i>
		</div>
	</div>

	<input type="text" name="txtId" class="txtId" id="txtId" value="<?php echo $page[0]['menu_id'] ?>" style="display: none;">

	<div class="col-xs-12 col-sm-6">
		<h4>Alias</h4>
		<div class="ui left icon input">
			<input type="text" name="txtAlias" id="txtAlias" class="txtAlias"  value="<?php echo $page[0]['alias'] ?>">
			<i class="write icon"></i>
		</div>
	</div>
<script>
	   $(document).ready(function () {

        function onchange() {
            //Since you have JQuery, why aren't you using it?
            var box1 = $('#txtTitle');
            box3 = box1.val().replace(/\s+/g,'-');
            box3 = box3.replace('---','-');
            box3 = box3.toLowerCase();
            box3 = box3.replace(/[áàäâå]/,'a');
            box3 = box3.replace(/[éèëê]/,'e');
            box3 = box3.replace(/[íìïî]/,'i');
            box3 = box3.replace(/[óòöô]/,'o');
            box3 = box3.replace(/[úùüû]/,'u');
            box3 = box3.replace(/[ñ]/,'n');
            var box2 = $('#txtAlias');
            box2.val(box3);
        }
        $('#txtTitle').on('change', onchange);
    });

	</script>

	<div class="col-xs-12 col-sm-6">
		<!-- Categoría de la noticia -->
		<h4 >Tipo de menú</h4>
		<div class="ui left icon field">
			<select class="txtTypeMenu" name="txtTypeMenu" id="txtTypeMenu">
				<option value="0">-- SELECCIONAR --</option>
				<?php foreach ($menu_types as $menu_type): ?>
					<option value="<?php echo $menu_type['mtype_id']; ?>" <?php if ($menu_type['mtype_id'] == $page[0]['mtype_id']) {
					?> selected <?php
				} ?>><?php echo $menu_type['type']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h4 >Menú Padre</h4>
		<div class="ui left icon field">
			<select class="txtParent" name="txtParent" id="txtParent">
				<option value="0">Raiz</option>
				<?php foreach ($parents_menus as $parents_menu): ?>
					<option value="<?php echo $parents_menu['menu_id']; ?>" <?php if ($parents_menu['parent_id'] == $page[0]['menu_id']) {
					?> selected <?php
				} ?>><?php echo $parents_menu['title']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

	<div id="changingArea" class="col-xs-12">
	    <div id="Categoría" class="selectable-field">
	    	
			<h4 >Seleccionar una categoría</h4>
			<div class="ui left icon field">
				<select class="txtCategories" name="txtCategories" id="txtCategories">
					<option value="0">-- SELECCIONAR --</option>
					<?php foreach ($categories as $category): ?>
						<option value="<?php echo $category['category_id']; ?>" <?php if ($category['category_id'] == $page[0]['element_id']) {
					?> selected <?php
				} ?>><?php echo $category['category']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			
	    </div>
	    <div id="Artículo" class="selectable-field">
			
			<h4 >Seleccionar un artículo</h4>
			<div class="ui left icon field">
				<select class="txtArticles" name="txtArticles" id="txtArticles">
					<option value="0">-- SELECCIONAR --</option>
					<?php foreach ($articles as $article): ?>
						<option value="<?php echo $article['art_id']; ?>" <?php if ($article['art_id'] == $page[0]['element_id']) {
					?> selected <?php
				} ?>><?php echo $article['title']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		
	    </div>
	    <div id="Galería" class="selectable-field">Poll</div>
	</div>

	<script>
		$(function(){
	      $('.txtTypeMenu').change(function(){
	        var selected = $(this).find(':selected').text();
	        //alert(selected);
	        $(".selectable-field").hide();
	         $('#' + selected).show();
	      }).change()
		 });
	</script>




	
	<!-- Botones -->
	<div class="ui buttons pull-right">
	  <button class="ui positive button btnUpdatePage">Guardar</button>
	  <div class="or" data-text="O"></div>
	  <a href='pages' class="ui button btnCancelPage" >Cancelar</a>
	</div>

	<div class="progress" style="display: none;">
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
