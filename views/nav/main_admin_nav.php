
<nav class="navbar navbar-admin">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <i class="icon sidebar"></i>
    </button>
    <a class="navbar-brand" href="/admin"><img src="http://pablobrunodw.com/img/CMSLogo.png" alt="CMS Logo"></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="cogs icon"></i>
    Sistema</a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/admin">Panel de Control</a></li>
          <li><a href="configs">Configuración del Sitio</a></li>
          
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="book icon"></i>
    Contenido</a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="articles">Artículos</a></li>
          <li><a href="add-article">Nuevo Artículo</a></li>
          <li class="divider"></li>
          <li><a href="categories">Categorías</a></li>
          <li><a href="add-category">Nueva Categoría</a></li>
        </ul>
      </li>
      <li>
        <a href="sliders" class="item">
          <i class="code branch icon"></i>
          Sliders
        </a>
      </li>
      <li>
        <a href="pages" class="item">
          <i class="th list icon"></i>
          Menú
        </a>
      </li>
      <li>
        <a href="users" class="item">
          <i class="users icon"></i>
          Usuarios
        </a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="/" target="_blank"><i class="external icon"></i> 
          Ver Sitio
        </a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="user icon"></i><span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#"><?php echo $profile[0]['username']; ?></a></li>
          <li class="divider"></li>
          <li>
            <a href="log-out" class="item">
            <i class="sign out icon"></i>
            Cerrar Sesión
            </a>
          </li>
          
        </ul>
      </li>
      <li>
        
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
