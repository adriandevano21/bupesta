<nav class="main-menu">
    <ul class="logo-sidebar">
        <li>
            <img src="{{ asset('fitral/') }}/img/favicon.png" alt="">
        </li>
    </ul>
    <hr>
    <br>
    <ul>

        <li>
            <a href="/dashboard-kinerja">
                <i class="fa fa-tachometer-alt nav-icon"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="/bupesta.php">
                <i class="fa-solid fa-bowl-rice nav-icon"></i>
                <span class="nav-text">BuPeSta</span>
            </a>
        </li>

        <li>
            <a href="/timelinesemuakegiatan.php">
                <i class="fa-solid fa-calendar-days nav-icon"></i>
                <span class="nav-text">Historis</span>
            </a>
        </li>

        <li>
            <a href="/tentangbupesta.php">
                <i class="fa-solid fa-mug-hot nav-icon"></i>
                <span class="nav-text">QnA</span>
            </a>
        </li>

        <li>
            <a href="/entri-kinerja">
                <i class="fa-solid fa-edit nav-icon"></i>
                <span class="nav-text">Entri Kinerja</span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li>
            <a href="#">
                <i class="fa fa-user nav-icon"></i>
                <span class="nav-text">Profil</span>
            </a>
        </li>

        <li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"><i class="fa fa-right-from-bracket nav-icon"></i>
                    <span class="nav-text">
                        Logout
                    </span>
            </form>
        </li>
        <br>
    </ul>
</nav>
