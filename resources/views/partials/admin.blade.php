<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Drodmin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ url('admin/pages') }}">Pages</a></li>
		<li><a href="{{ url('admin/categories') }}">Cetegories</a></li>
		<li><a href="{{ url('admin/menus') }}">Menús</a></li>
		<li><a href="{{ url('admin/users') }}">Users</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>