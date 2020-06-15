<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?= site_url("home") ?>">Simply Forms
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mon compte <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?= site_url("dashboard") ?>">Formulaires</a></li>
              <li><a href="<?= site_url("param") ?>">Paramètre</a></li>
              <li class="divider"></li>
              <li><a href="<?= site_url("auth/logout") ?>">Déconnexion</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
