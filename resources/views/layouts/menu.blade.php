<li class="nav-item">
    <a href="{{ route('bts.index') }}"
       class="nav-link {{ Request::is('bts*') ? 'active' : '' }}">
        <p>Bts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('fotos.index') }}"
       class="nav-link {{ Request::is('fotos*') ? 'active' : '' }}">
        <p>Fotos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('jenis.index') }}"
       class="nav-link {{ Request::is('jenis*') ? 'active' : '' }}">
        <p>Jenis</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('kondisis.index') }}"
       class="nav-link {{ Request::is('kondisis*') ? 'active' : '' }}">
        <p>Kondisis</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('konfigurasis.index') }}"
       class="nav-link {{ Request::is('konfigurasis*') ? 'active' : '' }}">
        <p>Konfigurasis</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('kuesioners.index') }}"
       class="nav-link {{ Request::is('kuesioners*') ? 'active' : '' }}">
        <p>Kuesioners</p>
    </a>
</li>


