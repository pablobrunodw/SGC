		<div class="col-xs-12 col-sm-10 col-sm-offset-1 news" >
	<h2><?php echo $articles[0]['category'] ?></h2>

	<!-- Inicio del ciclo de las novedades -->
	<div class="card-deck">
		<?php foreach ($articles as $article): ?>
				<div class="card">
					<a href="articulos/<?php echo $article["alias"]; ?>">
					<div class="img" style="background: url('res/img/img_articles/<?php echo $article["img_article"]; ?>') no-repeat center; background-size: cover;"></div>
				   <div class="card-caption">
				  	<div class="card-title">
				    	<h2><?php echo $article["title"]; ?></h2>
				    	<p class="art-date">
				    		Fecha: <?php echo date("d-m-Y", $article["created_at"]); ?>
				    		
				    	</p>
				    </div>
				    <div class="card-content">
					    <p><?php echo $article["intro"]; ?></p>
					    
					</div>
					 <div class="icon-featured">
						 <?php if ($article['featured']) { ?>
			    			<i class="icon star featured"></i>
			    		<?php } else { ?>
			    			<i class="icon star outline"></i>
			    		<?php 
			    			}
			    		 ?>
		    		 </div>
				  </div>

				  </a>
				</div>
			
		<?php endforeach;  ?>
	</div>
</div>