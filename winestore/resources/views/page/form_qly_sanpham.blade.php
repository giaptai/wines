@if (session()->has('tokenAdmin'))
    <?php
    $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
    $brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
    $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
    $getAdmin = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('AdminID'))['data'];
    ?>
    @if (app('request')->all() == null)
        <?php
        $Products = Http::get('http://127.0.0.1:8001/api/v1/products');
        ?>
    @else
        @php
            if (app('request')->input('nameqr') == null && app('request')->input('id') == null) {
                $url = '?page=' . app('request')->input('page');
            } elseif (app('request')->input('nameqr') != null && app('request')->input('id') == null) {
                $url = '?name[like]=' . app('request')->input('nameqr') . '&page=' . app('request')->input('page');
            } elseif (app('request')->input('nameqr') == null && app('request')->input('id') != null) {
                $url = '?id[eq]=' . app('request')->input('id') . '&page=' . app('request')->input('page');
            } else {
                $url = '?name[like]=' . app('request')->input('nameqr') . '&id[eq]=' . app('request')->input('id') . '&page=' . app('request')->input('page');
            }
            $Products = Http::get('http://127.0.0.1:8001/api/v1/products' . $url);
        @endphp
    @endif
    <div style="background-color: #41484e" class="d-flex text-white justify-content-end p-3">
        <span>{!! $getAdmin['lastname'] . ' ' . $getAdmin['firstname'] !!}</span>
        <span class="mx-3">|</span>
        <a class="text-danger fw-bold" href="{{ route('logoutadmin') }}">Đăng xuất</a>
    </div>
    <div class="p-3 row row-cols-1 row-cols-md-3 sticky-top bg-light justify-content-between">
        <div class="row col-md-auto">
            <div class="col-md-auto">
                {{-- <a class="btn btn-primary btn-sm" href="{{ route('productspage') }}">Thêm sản phẩm </a> --}}
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#minhthu">Thêm
                    sản phẩm</button>
            </div>
        </div>

        <div class="col-md-auto">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" value="" placeholder="Mã"
                    id="search_id">
                <input type="text" class="form-control form-control-sm" value="" placeholder="Tên"
                    id="search_name">
                <button class="btn btn-sm btn-primary fa-solid fa-magnifying-glass" onclick="searched()"
                    type="button"></button>
            </div>
        </div>
    </div>

    <div class="table-responsive" id="quanlysanpham">
        @include('dynamic_layout.tableproduct')
    </div>
@else
    <div class="d-flex flex-column border p-3 justify-content-center align-items-center vh-100">
        <i class="fa-solid fa-face-flushed display-4"></i>
        <p class="fw-semibold mt-3 mb-3 fs-4">Cần đăng nhập với quyền admin</p>
    </div>
@endif
<script src="{{ url('./js/quanly_sanpham.js') }}"></script>
