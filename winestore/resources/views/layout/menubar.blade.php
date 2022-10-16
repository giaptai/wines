
 <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center py-2" id="navbarsExample10">

            <ul class="navbar-nav">
                <li class="nav-item fw-semibold mx-2"><a class="nav-link <?php echo str_contains(Request::url(), 'home') ? 'link-light bg-primary':'text-dark' ?>" href="{{route('home')}}">Trang chủ</a>
                </li>
                <li class="nav-item fw-semibold mx-2"><a class="nav-link <?php echo str_contains(Request::url(), 'shop') ? 'link-light bg-primary':'text-dark' ?>" href="{{route('shop')}}">Cửa hàng</a>
                </li>
                <li class="nav-item fw-semibold mx-2">
                    <a class="nav-link <?php echo str_contains(Request::url(), 'cart') ? 'link-light bg-primary':'text-dark' ?> position-relative" href="{{route('cart')}}">
                      Giỏ hàng
                      {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">99<span class="visually-hidden">unread messages</span></span> --}}
                    </a>
                </li>
                <li class="nav-item fw-semibold mx-2">
                    <a class="nav-link <?php echo str_contains(Request::url(), 'account') ? 'link-light bg-primary':'text-dark' ?>" href="{{route('my-account')}}">Tài khoản</a></li>
                <li class="nav-item fw-semibold mx-2"><a class="nav-link text-dark" href="{{route('login')}}">Đăng nhập</a></li>
                <li class="nav-item fw-semibold mx-2" ><a class="nav-link text-dark" href="/lienhe">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</nav>