<div class="col-12 col-md-3 mb-auto p-4 rounded-0 bg-light" style="font-size: 15px">
    <span class="fs-4">Tài khoản của tui @php echo Route::current()->getName(); @endphp</span>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link @php echo Route::currentRouteName()==='my-account' ? 'link-dark border border-dark':'link-dark' @endphp"
                href="{{ route('my-account') }}">
                <i class="bi bi-person-circle"> </i>Thông tin tài khoản</a>
        </li>
        {{-- <li>
            <a class="nav-link @php echo Route::currentRouteName()==='my-address' ? 'link-dark border border-dark':'link-dark' @endphp"
                href="{{ route('my-address') }}">
                <i class="bi bi-geo-alt"> </i> Địa chỉ cá nhân</a>
        </li> --}}
        <li>
            <a class="nav-link @php echo Route::currentRouteName()==='my-order' ? 'link-dark border border-dark':'link-dark' @endphp"
                href="{{ route('my-order') }}">
                <i class="bi bi-clock-history"> </i>Đơn hàng cá nhân</a>
        </li>
        <li>
            <a class="nav-link @php echo Route::currentRouteName()==='my-password' ? 'link-dark border border-dark':'link-dark' @endphp"
                href="{{ route('my-password') }}">
                <i class="bi bi-key"> </i>Đổi mật khẩu</a>
        </li>
        <li>
            <a class="nav-link text-danger" href="{{ route('client-logout') }}">
                <i class="bi bi-box-arrow-right"> </i>Đăng xuất</a>
        </li>
    </ul>
    <hr>
    <div class="col-md-auto">
        <div class="d-flex">
            <span class="fs-3 p-2">16</span>
            <p class="card-text">Đơn chờ xác nhận</p>
        </div>
        <hr>
        <div class="d-flex">
            <span class="fs-3 p-2">2</span>
            <p class="card-text">Đơn đã giao</p>
        </div>
        <hr>
        <div class="d-flex">
            <span class="fs-3 p-2">1</span>
            <p class="card-text">Đơn đã xác nhận</p>
        </div>
    </div>
</div>
