$(document).ready(function() {

	//Creo la raiz del proyecto
	var root = "/";
	
	//Editor de textos
	try{
		CKEDITOR.replace( 'bodyeditor' );

	}catch(e){}

	//Log In
	$(".btnAdminLogIn").on("click" , function(){
		var email = $(".txtEmailLogin").val().trim(),
			pass = $(".txtPassLogin").val().trim();


		$.ajax({
			type: "POST",
			url: root + 'res/php/admin_actions/login.php',
			data: {
				email: email,
				pass: pass
			},
			success: function(data){
				if(data == "true"){
					window.location.href = "/admin";
				}else if(data == "false"){
					alert("Sus credenciales no son válidas. Por favor intente nuevamente");
				}
			}
		});
	});

	//Trabajando con categorias

	//Guardar nueva categoría
	$(".btnSaveCategory").on("click", function(){
		var category = $('.txtCatName').val().trim();

		self = this;

		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/save_category.php",
			data: {
				category: category
			},
			beforeSend: function(){
				$(self).addClass("loading");
			},
			success: function(data){
				$(self).removeClass("loading");
				if (data >0) {
					alert("Se guardó con éxito");
					$('.txtCatName').val("");
				}else{
					alert("Hubo un inconveniente al guardar la categoría")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	//Eliminar categoria
	$(".tblCategories").on("click", ".btnRemoveCategory", function(){
		var category_id = $(this).attr("data-categoryId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/delete_category.php",
			data: {
				category_id: category_id
			},
			success: function(data){
				if (data >0) {
					$(self).parent().parent().remove();
					alert('Categoría eliminada correctamente.')
				}else{
					alert("Hubo un inconveniente al eliminar la categoría")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});


	//Trabajando con Articulos

	//Guardar Artículos
	$(".btnSaveArticle").on("click", function(e){
		e.preventDefault;
		var artBody 	= CKEDITOR.instances.bodyeditor.getData(),
			title			=  $('.txtTitle').val().trim(),
			alias			=  $('.txtAlias').val().trim(),
			artIntro		=  $('.txtArtIntro').val().trim(),
			category_id		= $('.txtCategory').val().trim(),
			self			= this;

		if (artBody !== "" && alias !== "" && artIntro !== "" && title !== "" && category_id > 0) {
			//Ajax para subir la publicación.
			var formData = new FormData($("#article_form")[0]);
			formData.append("artBody",artBody);
			var $this = $(this);
  			e.preventDefault();
			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener("progress", function(evt){
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							percentComplete = parseInt(percentComplete * 100);
							$('#progress-bar').css("width", percentComplete);
						} 
					},false,false);
					return xhr;
				},
				type: "POST",
				url: root + "res/php/admin_actions/new_article.php",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$(self).addClass("loading");

				},
				success:function(data){
					console.log(data);
					alert('Artículo Guardado');
					window.location.href = "/admin/articles";
				},
				error: function(){
					alert('Error...');
				}
			});

		} else {
			alert ('Por favor complete todos los datos')
		}
		    

	});

	//Eliminar Articulo
	$(".tblArticles").on("click", ".btnRemoveArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/delete_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					$(self).parent().parent().remove();
					alert('Artículo eliminado correctamente.')
				}else{
					alert("Hubo un inconveniente al eliminar el artículo")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	//Publicar Artículo
	$(".tblArticles").on("click", ".btnPublishArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/publish_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al publicar el artículo")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});


	//Despublicar Artículo
	$(".tblArticles").on("click", ".btnUnPublishArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/unpublish_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al despublicar el artículo")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	//Destacar Artículo
	$(".tblArticles").on("click", ".btnFeaturedArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/featured_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al publicar el artículo")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});


	//Despublicar Artículo
	$(".tblArticles").on("click", ".btnUnFeaturedArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/unfeatured_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al despublicar el artículo")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	//Publicar Pagina
	$(".tblArticles").on("click", ".btnEditArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;

		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/edit_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				
				window.location.href = "/admin/edit-article";

				/*if (data >0) {
					//$(self).parent().parent().remove();
					alert('Página publicado correctamente.');
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al publicar la página")
				}*/
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	//Actualizar Articulo
	$(".btnUpdateArticle").on("click", function(e){
		e.preventDefault;
		var artBody 	= CKEDITOR.instances.bodyeditor.getData(),
			title			=  $('.txtTitle').val().trim(),
			alias			=  $('.txtAlias').val().trim(),
			category_id		= $('.txtCategory').val().trim(),
			artIntro		=  $('.txtArtIntro').val().trim(),
			art_id		=$('.txtId').val().trim(),
			self			= this;

		if (artBody !== "" && alias !== "" && title !== "" && category_id > 0) {
			//Ajax para subir la publicación.
			var formData = new FormData($("#article_form")[0]);
			formData.append("artBody",artBody);
			var $this = $(this);
  			e.preventDefault();
			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener("progress", function(evt){
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							percentComplete = parseInt(percentComplete * 100);
							$('.progress-bar').css("width", percentComplete);
							//console.log(percentComplete);
						} 
					},false,false);
					return xhr;
				},
				type: "POST",
				url: root + "res/php/admin_actions/update_article.php",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$(self).addClass("loading");
				},
				success:function(data){
					$(self).removeClass("loading");
					alert('Artículo Guardado');
					window.location.href = "/admin/articles";
				},
				error: function(){
					$(self).removeClass("loading");
					alert('Error...');
				}
			});

		} else {
			alert ('Por favor complete todos los datos')
		}
	});



	//Trabajando con Sliders

	//Guardar Slider
	$(".btnSaveSlider").on("click", function(e){
		e.preventDefault;
		var artBody 	= CKEDITOR.instances.bodyeditor.getData(),
			title			=  $('.txtTitle').val().trim(),
			artIntro		=  $('.txtArtIntro').val().trim(),
			category_id		= $('.txtCategory').val().trim(),
			self			= this;

		if (artBody !== "" && artIntro !== "" && title !== "" && category_id > 0) {
			//Ajax para subir la publicación.
			var formData = new FormData($("#article_form")[0]);
			formData.append("artBody",artBody);
			var $this = $(this);
  			e.preventDefault();
			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener("progress", function(evt){
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							percentComplete = parseInt(percentComplete * 100);
							$('.progress-bar').css("width", percentComplete);
							//console.log(percentComplete);
						} 
					},false,false);
					return xhr;
				},
				type: "POST",
				url: root + "res/php/admin_actions/new_slider.php",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$(self).addClass("loading");
				},
				success:function(data){
					alert('Slider Guardado');
					window.location.href = "/admin/sliders";
				},
				error: function(){
					alert('Error...');
				}
			});

		} else {
			alert ('Por favor complete todos los datos')
		}
		    

	});

	//Eliminar Slider
	$(".tblSliders").on("click", ".btnRemoveSlider", function(){
		var art_id = $(this).attr("data-sliderId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/delete_slider.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					$(self).parent().parent().remove();
					alert('Slider eliminado correctamente.')
				}else{
					alert("Hubo un inconveniente al eliminar el slider")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	//Publicar Artículo
	$(".tblSliders").on("click", ".btnPublishArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/publish_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al publicar el slider")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});


	//Despublicar Artículo
	$(".tblSliders").on("click", ".btnUnPublishArticle", function(){
		var art_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/unpublish_article.php",
			data: {
				art_id: art_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al despublicar el slider")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});




	//Eliminar Usuario
	$(".tblUsers").on("click", ".btnRemoveUser", function(){
		var user_id = $(this).attr("data-userId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/delete_user.php",
			data: {
				user_id: user_id
			},
			success: function(data){
				if (data >0) {
					$(self).parent().parent().remove();
					alert('Usuario eliminado correctamente.')
				}else{
					alert("Hubo un inconveniente al eliminar el usuario")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});


	//Trabajando con paginas
	//Guardar Pagina
	$(".btnSavePage").on("click", function(e){
		e.preventDefault;
		var 	title					=  $('.txtTitle').val().trim(),
				alias					= $('.txtAlias').val().trim(),
				mtype_id			= $('.txtTypeMenu').val().trim(),
				parent_id			= $('.txtParent').val().trim(),
				element_id			= $('.txtArticles').val().trim(),
				self					= this;

				if (mtype_id == 1){
					element_id = $('.txtCategories').val().trim()
				}else{
					element_id			= $('.txtArticles').val().trim()
				}

		if (title !== "" && mtype_id > 0 && element_id > 0) {
			//Ajax para subir la publicación.
			var formData = new FormData($("#page_form")[0]);
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: root + "res/php/admin_actions/new_page.php",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$(self).addClass("loading");
				},
				success:function(data){
					alert('Página Guardado');
					window.location.href = "/admin/pages";
				},
				error: function(){
					$(self).removeClass("loading");
					alert('Error...');
				}
			});

		} else {
			alert ('Por favor complete todos los datos')
		}
	});


	//Actualizar Pagina
	$(".btnUpdatePage").on("click", function(e){
		e.preventDefault;
		var 	title					= $('.txtTitle').val().trim(),
				alias					= $('.txtAlias').val().trim(),
				mtype_id				= $('.txtTypeMenu').val().trim(),
				parent_id			= $('.txtParent').val().trim(),
				element_id			= $('.txtArticles').val().trim(),
				menu_id				= $('.txtId').val().trim(),
				self					= this;

				if (mtype_id == 1){
					element_id = $('.txtCategories').val().trim()
				}else{
					element_id			= $('.txtArticles').val().trim()
				}

		if (title !== "" && mtype_id > 0 && element_id > 0) {
			//Ajax para subir la publicación.
			console.log(title);
			console.log(alias);
			console.log(mtype_id);
			console.log(parent_id);
			console.log(element_id);
			console.log(menu_id);
			var formData = new FormData($("#page_form")[0]);
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: root + "res/php/admin_actions/update_page.php",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$(self).addClass("loading");
				},
				success:function(data){
					console.log(data);
					alert('Página Guardado');
					window.location.href = "/admin/pages";
				},
				error: function(){
					$(self).removeClass("loading");
					alert('Error...');
				}
			});

		} else {
			alert ('Por favor complete todos los datos')
		}
	});


	//Publicar Pagina
	$(".tblPages").on("click", ".btnEditPage", function(){
		var menu_id = $(this).attr("data-articleId"),
		self=this;

		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/edit_page.php",
			data: {
				menu_id: menu_id
			},
			success: function(data){
				
				window.location.href = "/admin/edit-page";

				/*if (data >0) {
					//$(self).parent().parent().remove();
					alert('Página publicado correctamente.');
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al publicar la página")
				}*/
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	$(".tblPages").on("click", ".btnRemovePage", function(){
		var menu_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/delete_page.php",
			data: {
				menu_id: menu_id
			},
			success: function(data){
				if (data >0) {
					$(self).parent().parent().remove();
					
				}else{
					alert("Hubo un inconveniente al eliminar la página")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});

	//Publicar Pagina
	$(".tblPages").on("click", ".btnPublishPage", function(){
		var menu_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/publish_page.php",
			data: {
				menu_id: menu_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al publicar la página")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});


	//Despublicar Pagina
	$(".tblPages").on("click", ".btnUnPublishPage", function(){
		var menu_id = $(this).attr("data-articleId"),
		self=this;


		$.ajax({
			type: "POST",
			url: root + "res/php/admin_actions/unpublish_page.php",
			data: {
				menu_id: menu_id
			},
			success: function(data){
				if (data >0) {
					//$(self).parent().parent().remove();
					window.location.reload();
				}else{
					alert("Hubo un inconveniente al despublicar pa página")
				}
			},
			error: function(){
				alert("Se ha producido un error");
			}
		});
	});


	//Actualizar Configuración
	$(".btnUpdateSiteConfig").on("click", function(e){
		var 	site_name	=  $('.txtSiteName').val().trim(),
				meta_desc	=  $('.txtSiteDesc').val().trim(),
				meta_keys	=  $('.txtSiteKW').val().trim(),
				config_id	=  $('.txtId').val().trim(),
			 	file_data 	= $('#logo_file').prop('files')[0],
				self			= this;

		if (meta_desc !== "" && meta_keys !== "" && site_name !== "") {
			//Ajax para subir la publicación.
			var formData = new FormData($("#article_form")[0]);
			formData.append('file', file_data);
    		var $this = $(this);
  			e.preventDefault();
			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener("progress", function(evt){
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							percentComplete = parseInt(percentComplete * 100);
							$('.progress-bar').css("width", percentComplete);
							//console.log(percentComplete);
						} 
					},false,false);
					return xhr;
				},
				type: "POST",
				url: root + "res/php/admin_actions/update_configs.php",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$(self).addClass("loading");
				},
				success:function(data){
					$(self).removeClass("loading");
					alert('Configuración guardada con éxito');
					window.location.href = "/admin";
				},
				error: function(){
					$(self).removeClass("loading");
					alert('Error...');
				}
			});

		} else {
			alert ('Por favor complete todos los datos')
		}
	});

});