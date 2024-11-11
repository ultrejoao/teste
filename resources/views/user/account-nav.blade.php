<ul class="account-nav">
    <li><a href="{{ route('user.index') }}" class="menu-link menu-link_us-s">Painel</a></li>
    <li><a href="{{ route('user.edit')}}" class="menu-link menu-link_us-s">Alterar Informações</a></li>

    <li>
        <form method="post" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <a href="{{ route('logout') }}" class="menu-link menu-link_us-s" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sair</a>
        </form>
    </li>
  </ul>
