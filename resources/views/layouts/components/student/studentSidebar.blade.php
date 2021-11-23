<ul class="nav">
    <li class="{{ request()->is('home')? 'active' : '' }}">
        <a href="{{ route('student') }}">
            <i class="nc-icon nc-bank"></i>
            <p>Home</p>
        </a>
    </li>
    <li class="{{ request()->is('student/absent-today')? 'active' : '' }}">
        <a href="{{ route('today') }}">
            <i class="nc-icon nc-single-02"></i>
            <p>Today</p>
        </a>
    </li>
    <li class="{{ request()->is('student/absent-statistik*')? 'active' : '' }}">
        <a href="{{ route('statistik', Auth::user()->nis) }}">
            <i class="nc-icon nc-vector"></i>
            <p>Statistik</p>
        </a>
    </li>
</ul>