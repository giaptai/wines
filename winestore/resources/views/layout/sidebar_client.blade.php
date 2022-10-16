<div class="col-12 col-md-3 bg-light mb-auto p-4 rounded-4 sticky-md-top">
    <span class="fs-4">Tài khoản của tui  @php echo Route::current()->getName(); @endphp</span>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link @php echo Route::currentRouteName()==='my-account' ? 'link-light bg-dark':'link-dark' @endphp" href="{{route('my-account')}}">
                <i class="bi bi-person-circle"> </i>Thông tin tài khoản</a>
        </li>
        <li>
            <a class="nav-link @php echo Route::currentRouteName()==='my-address' ? 'link-light bg-dark':'link-dark' @endphp" href="{{ route('my-address') }}">
                <i class="bi bi-geo-alt"> </i> Địa chỉ cá nhân</a>
        </li>
        <li>
            <a class="nav-link @php echo Route::currentRouteName()==='my-order' ? 'link-light bg-dark':'link-dark' @endphp" href="{{ route('my-order') }}">
                <i class="bi bi-clock-history"> </i>Đơn hàng cá nhân</a>
        </li>
        <li>
            <a class="nav-link text-danger" href="">
                <i class="bi bi-box-arrow-right"> </i>Đăng xuất</a>
        </li>
    </ul>
</div>