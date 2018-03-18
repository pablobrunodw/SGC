<head>
	<title><?php echo $article[0]["title"]; ?></title>
</head>

<div class="col-xs-12 art-header no-card" style="background: url('../res/img/img_articles/<?php echo $article[0]["img_article"]; ?>') no-repeat center; background-size: cover;">
</div>
<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 art-body">
	<h1><?php echo $article[0]["title"]; ?></h1>
	<h5>Fecha: <?php echo date("d-m-Y", $article[0]["created_at"]); ?></h5>
	<?php echo $article[0]["body"]; ?>
</div>