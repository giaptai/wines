<div class="header" style="background-color: #09102a; font-size: 14px">
    <div class="container p-0">
        <ul class="nav justify-content-end align-items-center">
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('login') }}">Đăng nhập</a></li>
            <div class="text-white">|</div>
            <li class="nav-item"><a class="nav-link text-light" href="/lienhe">Đăng ký</a></li>
        </ul>
    </div>
    <nav class="navbar navbar-dark navbar-expand-lg nav-masthead shadow-sm"
        style="font-family: Knockout 48 A,Knockout 48 B,sans-serif">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10"
                aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-start py-1" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item  mx-2"><a class="nav-link <?php echo str_contains(Request::url(), 'home') ? 'border text-light fw-bold' : 'text-light fw-bold'; ?>"
                            href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="nav-item mx-2"><a class="nav-link <?php echo str_contains(Request::url(), 'shop') ? 'border text-light fw-bold' : 'text-light fw-bold'; ?>" href="{{ route('shop') }}">CỬA
                            HÀNG</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link <?php echo str_contains(Request::url(), 'cart') ? 'border text-light fw-bold ' : 'text-light fw-bold'; ?> position-relative" href="{{ route('cart') }}">GIỎ HÀNG
                            {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">99<span class="visually-hidden">unread messages</span></span> --}}
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link <?php echo str_contains(Request::url(), 'account') ? 'border text-light fw-bold' : 'text-light fw-bold'; ?>" href="{{ route('my-account') }}">TÀI KHOẢN</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link <?php echo str_contains(Request::url(), 'admin') ? 'border text-light fw-bold' : 'text-light fw-bold'; ?>" href="{{ route('statistic') }}">QUẢN LÝ</a>
                    </li>
                    {{-- <li class="nav-item mx-2"><a class="nav-link text-light" href="{{ route('login') }}">Đăng nhập</a></li> --}}
                    <li class="nav-item mx-2"><a class="nav-link text-light fw-bold" href="/lienhe">LIÊN HỆ</a></li>
                </ul>
            </div>
            <form action="">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Tên sản phẩm">
                </div>
            </form>
        </div>

    </nav>
</div>
