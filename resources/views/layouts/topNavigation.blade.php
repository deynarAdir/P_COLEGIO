<nav class="navbar-user-top full-reset">
    <ul class="list-unstyled full-reset">
        <figure>
           <img src="{!! asset('assets/assets/img/user01.png') !!}" alt="user-picture" class="img-responsive img-circle center-box">
        </figure>
        <li style="color:#fff; cursor:default;">
            <span class="all-tittles">{{ Auth::user()->name}}</span>
        </li>
        <li  class="tooltips-general" data-placement="bottom" title="Salir del sistema">

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="zmdi zmdi-power"></i></a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
        </li>
        <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
            <i class="zmdi zmdi-search"></i>
        </li>
        <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
            <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
        </li>
        <li class="mobile-menu-button visible-xs" style="float: left !important;">
            <i class="zmdi zmdi-menu"></i>
        </li>
    </ul>
</nav>