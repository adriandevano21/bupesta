<div class="d-flex">
    <button class="toggle-btn" type="button">
        <img src="{{ asset('fitral/') }}/img/favicon.png" alt="">
    </button>
</div>

<ul class="sidebar-nav">
    <li class="sidebar-item">
        <a href="/dashboard-kinerja" class="sidebar-link">
            <i class="fa fa-tachometer-alt"></i>
            <span>&nbsp Dashboard</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-bowl-rice"></i>
            <span>&nbsp BuPeSta</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-calendar-days"></i>
            <span>&nbsp Historis</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-mug-hot"></i>
            <span>&nbsp QnA</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="entri-kinerja" class="sidebar-link">
            <i class="fa-solid fa-edit"></i>
            <span>&nbsp Entri Kinerja</span>
        </a>
    </li>
</ul>
<div class="sidebar-footer">
    <a href="#" class="sidebar-link">
        <i class="fa fa-user"></i>
        <span>&nbsp Profil</span>
    </a>
    <a class="sidebar-link">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit"><i class="fa fa-right-from-bracket sidebar-link"></i>
                <span class="nav-text">
                    &nbsp Logout
                </span>
            </button>
        </form>
    </a>
</div>
<br>
