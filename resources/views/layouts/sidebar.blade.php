<div class="d-flex flex-column p-3">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('dashboard') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                User
            </a>
        </li>
        <li>
            <a href="{{ route('karyawan.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Karyawan
            </a>
        </li>
        <li>
            <a href="{{ route('angsuran.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Angsuran
            </a>
        </li>
        <li>
            <a href="{{ route('pinjaman.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Pinjaman
            </a>
        </li>
        <li>
            <a href="{{ route('tabungan.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Tabungan
            </a>
        </li>
        <li>
            <a href="{{ route('simpanan.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Simpanan
            </a>
        </li>
        <li>
            <a href="{{ route('departemen.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Departemen
            </a>
        </li>
        <li>
            <a href="{{ route('jabatan.index') }}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Jabatan
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
        </ul>
    </div>
</div>
