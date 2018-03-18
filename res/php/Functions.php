<?php 
	require 'init.php';

	/**
	* Acciones del usuario
	*/
	class User_Actions{

		public function getSiteConfigs(){
			global $database;

			$configs = $database->select("configs","*");

			return $configs;
		}
	


		public function userAvailable($username,$email){
			global $database;

			$user = $database->count("users",[
				"OR" =>	[
					"username"=> $username,
					"email" => $email
				]
				
			]);

			return $user;

		}

		//Registro de usuario
		public function register($name, $lastname, $username, $email, $pass ){
			global $database;

			if ($this->userAvailable($username,$email) == 0) {
				$register = $database->insert("users", [
					"name" 			=> htmlentities($name),
					"last_name"		=> htmlentities($lastname),
					"username"		=> htmlentities($username),
					"email"			=> htmlentities($email),
					"role"			=> "usuario",
					"password"		=> password_hash($pass, PASSWORD_BCRYPT),
					"created_at"	=> time()
				]);

				return $database->id();	
			} else {
				return false;
			}

			
		}

		//Logueo
		public function logIn($username_email,$pass){
			global $database;

			$data = $database->select("users",
				["password"],
				[
					"OR"=> [
						"username" => $username_email,
						"email" => $username_email
					]
				]
			);

			$password_db = $data[0]["password"];

			if(password_verify($pass, $password_db)){
				return true;
			}else{
				return false;
			}
		}

		//Contar visitantes
		public function addVisitor($ip){
			global $database;

			$visitor = $database->count("visitors", [
				"ip"
			],[
				"ip"				=> $ip
			]);

			if ($visitor == 0) {
				$database->insert("visitors",
					[
						"ip"				=> $ip,
						"created_at"	=> time()
					]);

				return $database->id();	
			} else {
				return false;
			}
			

		}

		public function addVisit($alias){
			global $database;

			$actualVisits = $database->select("articles","art_visits",[
				"alias"=>$alias
			]);

			$newVisits = (int)$actualVisits[0]["art_visits"] + 1;

			$database->update("articles",[
				"art_visits"=>$newVisits,
				"last_visit"=>time()
			],[
				"alias"=>$alias
			]);

			return $database->id();
		}

		//Recuporar artículos de la DB
		public function getRecentArticles($category_id){
			global $database;

			$articles = $database->select("articles",[
				"[>]categories" => "category_id"
			],[
				"articles.art_id",
				"articles.title",
				"articles.alias",
				"articles.intro",
				"articles.body",
				"articles.img_article",
				"articles.created_at",
				"articles.published",
				"articles.featured",
				"articles.admin_id",
				"categories.category_id",
				"categories.category"
			],[
				"AND"=>[
					"categories.category_id" => $category_id,
					"articles.published" => true
					
				],
				"ORDER" => ["articles.art_id" => "DESC"]
			]);

			return $articles;
		}

		//Recuporar sliders de la DB
		public function getRecentSlider(){
			global $database;

			$slider = $database->select("articles",[
				"[>]categories"=> ["category_id"]
			],[
				"articles.art_id",
				"articles.title",
				"articles.alias",
				"articles.intro",
				"articles.body",
				"articles.img_article",
				"articles.created_at",
				"articles.admin_id",
				"articles.category_id",
				"categories.category"
			],[
				"AND"=>[
					"categories.category" => "Slider",
					"articles.published" => true
				]
			]);

			return $slider;
		}

		public function getArticleInfo($alias){
			global $database;

			$article = $database->select("articles",
				[
					"art_id",
					"title",
					"intro",
					"body",
					"img_article",
					"created_at",
					"admin_id",
					"category_id",
					"alias"
				], [
					"alias" => $alias
				]);

			return $article;
		}
		public function getHomeArticleInfo($art_id){
			global $database;

			$article = $database->select("articles",
				[
					"art_id",
					"title",
					"intro",
					"body",
					"img_article",
					"created_at",
					"admin_id",
					"category_id",
					"alias"
				], [
					"art_id" => $art_id
				]);

			return $article;
		}




		//Recuperar Paginas de la DB
		public function getSitePages(){
			global $database;

			$pages = $database->select("menu","*",[
				"published" => true
				]);

			return $pages;
		}

		//Recuperar tipos de paginas
		public function getMenuType($alias){
			global $database;

			$menuType = $database->select("menu","*",[
				"menu_id" => 1
			]);

			return $menuType;
		}

		//Recuporar artículos Destacadosde la DB
		public function getFeatured(){
			global $database;

			$articles = $database->select("articles","*",[
				"featured" => true,
				"published" => true,
				"ORDER" => ["art_id" => "DESC"],
				"LIMIT" => "9"
			]);

			return $articles;
		}



	}




	class Admin_actions{

		//Configuraciones del sitio
		public function getSiteConfigs(){
			global $database;

			$configs = $database->select("configs","*");

			return $configs;
		}

		//Logueo
		public function logIn($username_email,$pass){
			global $database;

			$data = $database->select("users",
				["password"],
				[
					"AND"=>[
						"OR"=> [
							"username" => $username_email,
							"email" => $username_email
						],
						"role"=>"administrador"
					]
				]
			);



			$password_db = $data[0]["password"];

			if(password_verify($pass, $password_db)){
				return true;
			}else{
				return false;
			}
		}

		//Perfil del administrador
		public function getProfile($username_email){
			global $database;

			$admin = $database->select("users",[
				"user_id",
				"username"
			],
				[
					"OR"=> [
						"username" => $username_email,
						"email" => $username_email
					]
				]
			);

			return $admin;
		}


		//Datos para el main
		//Usuarios
		public function getUsersCount(){
			global $database;

			$usersCount = $database->count("users");

			return $usersCount;

		}

		//Articulos
		public function getArtCount(){
			global $database;

			$artCount1 = $database->count("articles",[
				"[>]categories"=> ["category_id"]
			],[
				"categories.category"
			],[
				"AND"=>[
					"categories.category[!]" => "Slider",
					"articles.published" => true
				]
			]);

			$artCount2 = $database->count("articles",[
				"[>]categories"=> ["category_id"]
			],[
				"category"
			],[
					"category" => "Paginas",
			]);

			$artCount = $artCount1 - $artCount2;

			return $artCount;

		}

		//Sliders
		public function getSlidersCount(){
			global $database;

			$sliderCount = $database->count("articles",[
				"[>]categories"=> ["category_id"]
			],[
				"categories.category"
			],[
				"AND"=>[
					"categories.category" => "Slider",
					"articles.published" => true
				]
			]);

			return $sliderCount;

		}

		//Sliders
		public function getPageCount(){
			global $database;

			$sliderCount = $database->count("menu",[
				"published" => true
				]
			);

			return $sliderCount;

		}

		public function getVisitsCount(){
			global $database;

			$visitorsCount = $database->count("visitors",[
				"ip"
			],[
				"ip[!]"=>""
			]);

			return $visitorsCount;

		}

		public function getLastVisitors(){
			global $database;

			$lastVisitors = $database->select("visitors","*",[
				"ORDER"=>["created_at" => "DESC"],
				"LIMIT"=>5,
			]);

			return $lastVisitors;
		}

		public function getPopularArticles(){
			global $database;

			$popularArticles = $database->select("articles","*",[
				"ORDER"=>["art_visits" => "DESC"],
				"LIMIT"=>5,
			]);

			return $popularArticles;
		}


		//Recuperar articulos de la DB
		public function getArticles(){
			global $database;

			$articles = $database->select("articles",[
				"art_id",
				"title",
				"intro",
				"body",
				"img_article",
				"created_at",
				"admin_id",
				"category_id",
				"published",
				"featured"
			],[
				"ORDER" => ["art_id" => "DESC"]
			]);

			return $articles;
		}

		//Recuperar Sliders de la DB
		public function getSliders(){
			global $database;

			$sliders = $database->select("articles",[
				"[>]categories"=> ["category_id"]
			],[
				"articles.art_id",
				"articles.title",
				"articles.intro",
				"articles.body",
				"articles.img_article",
				"articles.created_at",
				"articles.admin_id",
				"articles.category_id",
				"articles.published",
				"categories.category"
			],[
				"categories.category" => "Slider",
				"ORDER" => ["articles.art_id" => "DESC"]
			]);

			return $sliders;
		}

		//Recuperar Sliders de la DB
		public function getPages(){
			global $database;

			$pages = $database->select("menu","*");

			return $pages;
		}



		//Recuperar categorias de la DB
		public function getCategories(){
			global $database;

			$categories = $database->select("categories",[
				"category_id",
				"category"
			],[
				
				"AND #coment"=>[
					"OR #prueba"=>[
						"category[!]" => "Slider",
						"category_id"=> -1
					],
					"OR #prueba2"=>[
						"category[!]" => "Paginas",
						"category_id"=> -2
					]
					
				]
					
			]);

			return $categories;
		}

		//Recuperar categorias de la DB
		public function getSliderCategory(){
			global $database;

			$slider = $database->select("categories",[
				"category_id",
				"category"
			],[
				"category"=> "Slider"
			]);

			return $slider;
		}

		//Recuperar categorias de la DB
		public function getPageCategory(){
			global $database;

			$menu_type = $database->select("menu_type","*");

			return $menu_type;
		}

		//Recuperar categorias de la DB
		public function getParentsMenu(){
			global $database;

			$parentMenu = $database->select("menu","*",[
				"published"=>true
			]);

			return $parentMenu;
		}

		//Recuperar categorias de la DB
		public function getSliderPages(){
			global $database;

			$page = $database->select("categories",[
				"category_id",
				"category"
			],[
				"category"=> "Paginas"
			]);

			return $page;
		}



		//Guardar Categoría
		public function saveCategory($category){
			global $database;

			$database->insert("categories", [
				"category" => htmlentities($category)
			]);

			return $database->id();
		}


		//Eliminar Categoría
		public function deleteCategory($category_id){
			global $database;

			$delete = $database->delete("categories", [
				"category_id" => $category_id
			]);

			return $delete->rowCount();
		}

		//Eliminar Slider
		public function deleteSlider($art_id){
			global $database;

			$delete = $database->delete("articles", [
				"art_id" => $art_id
			]);

			return $delete->rowCount();
		}

		//Eliminar Articulo
		public function deleteArticle($art_id){
			global $database;

			$delete = $database->delete("articles", [
				"art_id" => $art_id
			]);

			return $delete->rowCount();
		}


		//Guardar nuevo artículo.
		public function saveArticle($title, $alias, $category_id, $artIntro, $artBody, $name_img, $admin_id){
			global $database;
			$database->insert("articles", [
				"title" 			=> htmlentities($title),
				"alias" 			=> htmlentities($alias),
				"category_id"	=> htmlentities($category_id),
				"intro"			=> htmlentities($artIntro),
				"body"			=> $artBody,
				"img_article"	=> $name_img,
				"admin_id"		=> $admin_id,
				"created_at"	=> time(),
				"published" 	=> true,
				"featured"	 	=> false

			]);

			return $database->id();
		}

		//Publicar artículo.
		public function publishArticle($art_id){
			global $database;

			$published = $database->update("articles", [
				"published" 	=> true
			],[
				"art_id" => $art_id
			]);

			return $published->rowCount();
		}
		
		//Desublicar artículo.
		public function unpublishArticle($art_id){
			global $database;

			$unpublished = $database->update("articles", [
				"published" 	=> false
			],[
				"art_id" => $art_id
			]);

			return $unpublished->rowCount();
		}
		
		//destacar artículo.
		public function featuredArticle($art_id){
			global $database;

			$published = $database->update("articles", [
				"featured" 	=> true
			],[
				"art_id" => $art_id
			]);

			return $published->rowCount();
		}
		
		//Desdestacar artículo.
		public function unFeaturedArticle($art_id){
			global $database;

			$unpublished = $database->update("articles", [
				"featured" 	=> false
			],[
				"art_id" => $art_id
			]);

			return $unpublished->rowCount();
		}

		//Recuperar Usuarios de la DB
		public function getUsers(){
			global $database;

			$users = $database->select("users",[
				"user_id",
				"username",
				"role",
				"email"
				
			]);

			return $users;
		}

		//Eliminar Articulo
		public function deleteUser($user_id){
			global $database;

			$delete = $database->delete("users", [
				"user_id" => $user_id
			]);

			return $delete->rowCount();
		}


		//Recuperar Sliders de la DB
		public function editPage($menu_id){
			global $database;

			$page = $database->select("menu","*",[
				"menu_id"=> $menu_id
			]);

			return $page;
		}

		public function editArticle($art_id){
			global $database;

			$page = $database->select("articles",[
				"art_id",
				"title",
				"alias",
				"intro",
				"body",
				"img_article",
				"created_at",
				"admin_id",
				"category_id",
				"published"
			],[
				"art_id"=> $art_id
			]);

			return $page;
		}

		//Guardar nuevo artículo.
		public function updateArticle($art_id,$title, $alias, $category_id, $artIntro, $artBody, $name_img, $admin_id){
			global $database;

			$database->update("articles", [
				"title" 			=> htmlentities($title),
				"alias" 			=> htmlentities($alias),
				"category_id"	=> htmlentities($category_id),
				"intro"			=> htmlentities($artIntro),
				"body"			=> $artBody,
				"img_article"	=> $name_img,
				"admin_id"		=> $admin_id,
				"created_at"	=> time(),
				"published" 	=> true
			],[
				"art_id"=>$art_id
			]);

			return $database->id();
		}

		
		//Guardar nuevo artículo.
		

		public function updateArticleNoImg($art_id,$title,$alias, $category_id, $artIntro, $artBody, $admin_id){
			global $database;

			$database->update("articles", [
				"title" 			=> htmlentities($title),
				"alias" 			=> htmlentities($alias),
				"category_id"	=> htmlentities($category_id),
				"intro"			=> htmlentities($artIntro),
				"body"			=> $artBody,
				"admin_id"		=> $admin_id,
				"created_at"	=> time(),
				"published" 	=> true
			],[
				"art_id"=>$art_id
			]);

			return $database->id();
		}

		public function updateConfigs($config_id,$site_name,$meta_desc, $meta_keys){
			global $database;

			$database->update("configs", [
				"site_name" 	=> htmlentities($site_name),
				"meta_desc" 	=> htmlentities($meta_desc),
				"meta_keys"		=> htmlentities($meta_keys),
				
			],[
				"config_id"=>$config_id
			]);

			return $database->id();
		}

		public function updateLogo($config_id,$logo_img){
			global $database;

			$database->update("configs", [
				"logo_img" 	=> $logo_img
				
			],[
				"config_id"=>$config_id
			]);

			return $database->id();
		}

		public function updateFrontEnd($config_id,$logo_img){
			global $database;

			$database->update("configs", [
				"img_frontend" 	=> $logo_img
				
			],[
				"config_id"=>$config_id
			]);

			return $database->id();
		}
		
		public function updateHomeVideos($config_id,$video_name){
			global $database;

			$database->update("configs", [
				"video_name" 	=> $video_name
			],[
				"config_id"=>$config_id
			]);

			return $database->id();
		}

		public function savePage($title,$alias,$mtype_id,$element_id,$parent_id){
			global $database;

			$database->insert("menu", [
				"title" => htmlentities($title),
				"alias" => htmlentities($alias),
				"mtype_id" => htmlentities($mtype_id),
				"element_id" => htmlentities($element_id),
				"parent_id" => htmlentities($parent_id),
				"published" => true,
				"home" => false
			]);

			return $database->id();
		}

		public function updatePage($menu_id,$title,$alias,$mtype_id,$element_id,$parent_id){
			global $database;
			echo $menu_id;
			$database->update("menu", [
				"title" => htmlentities($title),
				"alias" => htmlentities($alias),
				"mtype_id" => htmlentities($mtype_id),
				"element_id" => htmlentities($element_id),
				"parent_id" => htmlentities($parent_id),
			],[
				"menu_id"=>$menu_id
			]);

			return $database->id();
		}

		//Publicar artículo.
		public function publishPage($menu_id){
			global $database;

			$published = $database->update("menu", [
				"published" 	=> true
			],[
				"menu_id" => $menu_id
			]);

			return $published->rowCount();
		}
		
		//Desublicar artículo.
		public function unpublishpage($menu_id){
			global $database;

			$unpublished = $database->update("menu", [
				"published" 	=> false
			],[
				"menu_id" => $menu_id
			]);

			return $unpublished->rowCount();
		}

		//Eliminar Articulo
		public function deletePage($menu_id){
			global $database;

			$delete = $database->delete("menu", [
				"menu_id" => $menu_id
			]);

			return $delete->rowCount();
		}
		

	}
 ?>