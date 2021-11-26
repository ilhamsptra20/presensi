<ul class="nav">
    <li class="{{ request()->is('dashboard')? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
            <i class="nc-icon nc-tile-56"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="{{ request()->is('admin/student*')? 'active' : '' }}">
        <a href="{{ route('student.index') }}">
            <i class="nc-icon nc-single-02"></i>
            <p>Siswa</p>
        </a>
    </li>
    <li class="{{ request()->is('admin/rombel*')? 'active' : '' }}">
        <a href="{{ route('rombel.index') }}">
            <i class="nc-icon nc-vector"></i>
            <p>Rombel</p>
        </a>
    </li>
    <li class="{{ request()->is('admin/rayon*')? 'active' : '' }}">
        <a href="{{ route('rayon.index') }}">
            <i class="nc-icon nc-world-2"></i>
            <p>Rayon</p>
        </a>
    </li>
    <li class="{{ request()->is('admin/book*')? 'active' : '' }}">
        <a href="{{ route('book.index') }}">
            <i class="nc-icon nc-book-bookmark"></i>
            <p>Book</p>
        </a>
    </li>
</ul>