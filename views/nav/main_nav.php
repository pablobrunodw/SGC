
<nav class="navbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <i class="icon sidebar"></i>
      </button>
      <a href="/"><img src="<?php echo $config[0]['logo_img']; ?>" alt="<?php echo $config[0]['site_name']; ?>"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <?php foreach ($pages as $page): ?>
          <li>
          <a <?php if ($page['home'] == 1){?> href="/" <?php }else{ ?> href="/seccion/<?php echo $page['alias']; ?>" <?php } ?>  class="item">
            <?php echo $page["title"]; ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['user'])) { ?>
          <li>
            <a href="/log-out" class="item">
              <i class="sign out alternate icon"></i>
              Cerrar Sesión
            </a>
          </li>
        <?php }else{ ?>
          <li><a href="/user/log-in" class="item">
            <i class="sign in alternate icon"></i>
            Iniciar Sesion
          </a>
          </li>
          <li><a href="/user/register" class="item">
              <i class="add user icon"></i>
              Registrarse
            </a>
          </li>
        <?php } ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>
