<nav class="navbar navbar-expand-lg nav-masthead shadow-sm"
    style="background-color: #1c252a; font-family: Knockout 48 A,Knockout 48 B,sans-serif">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10"
            aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center py-2" id="navbarsExample10">

            <ul class="navbar-nav">
                <li class="nav-item  mx-2"><a class="nav-link <?php echo str_contains(Request::url(), 'home') ? 'text-decoration-underline text-light' : 'text-light'; ?>" href="{{ route('home') }}">HOME</a>
                </li>
                <li class="nav-item mx-2"><a class="nav-link <?php echo str_contains(Request::url(), 'shop') ? 'text-decoration-underline text-light' : 'text-light'; ?>" href="{{ route('shop') }}">CỬA
                        HÀNG</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo str_contains(Request::url(), 'cart') ? 'text-decoration-underline text-light' : 'text-light'; ?> position-relative" href="{{ route('cart') }}">
                        GIỎ HÀNG
                        {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">99<span class="visually-hidden">unread messages</span></span> --}}
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo str_contains(Request::url(), 'account') ? 'text-decoration-underline text-light' : 'text-light'; ?>" href="{{ route('my-account') }}">TÀI KHOẢN</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo str_contains(Request::url(), 'admin') ? 'text-decoration-underline text-light' : 'text-light'; ?>" href="{{ route('statistic') }}">QUẢN LÝ</a>
                </li>
                <li class="nav-item mx-2"><a class="nav-link text-light" href="{{ route('login') }}">Đăng nhập</a></li>
                <li class="nav-item mx-2"><a class="nav-link text-light" href="/lienhe">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</nav>
