<div class="col-12 col-md-3 bg-light mb-auto p-4 rounded-4 sticky-md-top">
    <span class="fs-4">Quản lý  @php echo Route::currentRouteName(); @endphp</span>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link @php echo Route::currentRouteName()=='statistic' ? 'link-light bg-dark':'link-dark' @endphp" href="{{route('statistic')}}">
                <i class="bi bi-bar-chart-line"> </i>Thống kê</a>
        </li>
        <li>
            <a class="nav-link @php echo Route::currentRouteName()=='products' ? 'link-light bg-dark':'link-dark' @endphp" href="{{ route('products') }}">
                <i class="bi bi-cup-straw"> </i>Sản phẩm</a>
        </li>
        <li>
            <a class="nav-link @php echo Route::currentRouteName()=='orders' ? 'link-light bg-dark':'link-dark' @endphp" href="{{ route('orders') }}">
                <i class="bi bi-receipt"> </i>Đơn hàng</a>
        </li>
        <li>
            <a class="nav-link @php echo Route::currentRouteName()=='customers' ? 'link-light bg-dark':'link-dark' @endphp" href="{{ route('customers') }}">
                <i class="bi bi-file-earmark-person"> </i>Khách hàng</a>
        </li>
    </ul>
    <hr>
    <div class="dropdown"><a href="#"
            class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2"><strong>mdo</strong></a>
        <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>

