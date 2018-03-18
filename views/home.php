<head>
	<title><?php echo $config[0]['site_name']; ?></title>
</head>


<?php if ($config[0]['video_name'] != "" && $_SESSION['screen_width'] > 600) { ?>
	<video autoplay="" muted="" loop="" preload="auto">
				<source src="<?php echo $config[0]['video_name']; ?>" type="video/mp4">
			</video>
<?php }else { ?>
	<div class="col-xs-12 cel-header no-card" style="background: url('<?php echo $config[0]["img_frontend"]; ?>') no-repeat center; background-size: cover;">
</div>
<?php } ?>
<?php if ($sliders[0] != "") { ?>
<div class="col-xs-12 no-card">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
		
		<?php $i = 0;
		foreach ($sliders as $slider): ?>

      <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {echo "class='active'";} ?> ></li>
      <?php $i = $i + 1;
   	 endforeach; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    	<?php $j = 0;
		foreach ($sliders as $slider): ?>
      <div class="item <?php if ($j == 0) {echo 'active';} ?> ">
      	<div class="carousel-img" style="background: url('res/img/img_articles/<?php echo $slider["img_article"]; ?>.png') no-repeat center; background-size: cover;">
      		
      	</div>
			<div class="carousel-caption">
	        <h3><?php echo $slider["title"]; ?></h3>
	        <p><?php echo $slider["intro"]; ?></p>
			<a href="articulos/<?php echo $slider["alias"]; ?>">Leer más...</a>
	      </div>
      </div>
   	<?php $j=$j+1;
   	endforeach; ?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <i class="icon angle left"></i>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <i class="icon angle right"></i>
    </a>
  </div>
</div>
<?php } ?>



<?php switch ($menuType[0]["mtype_id"]) {
	case '1': 
		include_once 'category.php';
		break;
	case '2':
		include_once 'article.php';
		break;
	case '7': 
		include_once 'featured.php';
		break;
	default:
		# code...
		break;
} ?>
