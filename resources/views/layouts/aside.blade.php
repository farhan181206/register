<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          </ul>
        </li>
        <li class="menu-header">Starter</li>
        <li class="nav-item dropdown {{ Route::is('category.*') ? 'active' : '' }}">
          <a href="{{route('category.index')}}" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Catgory</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Route::is('category.index') ? 'active' : '' }}"><a class="nav-link" href="{{route('category.index')}}">All Data</a></li>
            <li class="{{ Route::is('category.create') ? 'active' : '' }}"><a class="nav-link " href="{{route('category.create')}}">Create</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown {{ Route::is('article.*') ? 'active' : '' }}">
          <a href="{{route('article.index')}}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Article</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Route::is('article.index') ? 'active' : '' }}"><a class="nav-link" href="{{route('article.index')}}">All Data</a></li>
            <li class="{{ Route::is('article.create') ? 'active' : '' }}"><a class="nav-link" href="{{route('article.create')}}">Create</a></li>
          </ul>
        </li>
  </aside>