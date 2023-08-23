<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/personal" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ Auth::user()->name }}-домашняя</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
  
        <li class="nav-item">
          <a href="{{ route('admin.user.show',Auth::user()->id) }}" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              Пользователь
            </p>
          </a>
        </li>
     
        <li class="nav-item">
          <a href="{{ route('personal.like.index') }}" class="nav-link">
            <i class="nav-icon far fa-heart fa-lg"></i>
            <p>
              Понравившиеся посты
            </p>
          </a>
        </li>
     
      <li class="nav-item">
        <a href="{{ route('personal.comment.index') }}" class="nav-link">
          <i class="nav-icon far fa-comments"></i>
          <p>
            Комментарии
          </p>
        </a>
      </li>
      
    </ul>
  </div>
  <!-- /.sidebar -->
</aside>
