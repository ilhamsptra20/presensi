<ul class="nav">
    <li class="{{ request()->is('home')? 'active' : '' }}">
        <a href="{{ route('student') }}">
            <i class="nc-icon nc-bank"></i>
            <p>Home</p>
        </a>
    </li>
    <li class="{{ request()->is('absent-today')? 'active' : '' }}">
        <a href="{{ route('today') }}">
            <i class="nc-icon nc-single-02"></i>
            <p>Today</p>
        </a>
    </li>
    <li class="{{ request()->is('absent-statistik*')? 'active' : '' }}">
        <a href="{{ route('statistik')}}">
            <i class="nc-icon nc-vector"></i>
            <p>Statistik</p>
        </a>
    </li>
    <li class="{{ request()->is('library*')? 'active' : '' }}">
        <a href="{{ route('library') }}">
            <i class="nc-icon nc-book-bookmark"></i>
            <p>Library</p>
        </a>
    </li>
</ul>