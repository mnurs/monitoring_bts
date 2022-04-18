<li class="nav-item">
    <a href="{{ route('bts.index') }}"
       class="nav-link {{ Request::is('bts*') ? 'active' : '' }}">
        <p>Bts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('fotos.index') }}"
       class="nav-link {{ Request::is('fotos*') ? 'active' : '' }}">
        <p>Foto</p>
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
        <p>Kondisi</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('konfigurasis.index') }}"
       class="nav-link {{ Request::is('konfigurasis*') ? 'active' : '' }}">
        <p>Konfigurasi</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('kuesioners.index') }}"
       class="nav-link {{ Request::is('kuesioners*') ? 'active' : '' }}">
        <p>Kuesioner</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('kuesionerJawabans.index') }}"
       class="nav-link {{ Request::is('kuesionerJawabans*') ? 'active' : '' }}">
        <p>Kuesioner Jawaban</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('kuesionerPilihans.index') }}"
       class="nav-link {{ Request::is('kuesionerPilihans*') ? 'active' : '' }}">
        <p>Kuesioner Pilihan</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('monitorings.index') }}"
       class="nav-link {{ Request::is('monitorings*') ? 'active' : '' }}">
        <p>Monitoring</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('pemiliks.index') }}"
       class="nav-link {{ Request::is('pemiliks*') ? 'active' : '' }}">
        <p>Pemilik</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('wilayahs.index') }}"
       class="nav-link {{ Request::is('wilayahs*') ? 'active' : '' }}">
        <p>Wilayah</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>User</p>
    </a>
</li>


