@if (session()->has('tokenAdmin'))
    @php
        $getAdmin = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('AdminID'))['data'];
    @endphp
    @if (app('request')->all() == null)
        <?php
        $Categories = Http::get('http://127.0.0.1:8001/api/v1/categories?page=1');
        ?>
    @else
        @php
            $url = app('request')->input('name') != null ? '?name[like]=' . app('request')->input('name') . '&page=' . app('request')->input('page') : '?page=' . app('request')->input('page');
            $Categories = Http::get('http://127.0.0.1:8001/api/v1/categories' . $url);
        @endphp
    @endif
    <div style="background-color: #41484e" class="d-flex text-white justify-content-end p-3">
        <span>{!! $getAdmin['lastname'] . ' ' . $getAdmin['firstname'] !!}</span>
        <span class="mx-3">|</span>
        <a class="text-danger fw-bold" href="{{ route('logoutadmin') }}">Đăng xuất</a>
    </div>
    <div class="p-3 row row-cols-1 row-cols-md-3 bg-light justify-content-between">
        <div class="col-md-auto d-flex">

            <div class="col-md-auto">
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#themtheloai">Thêm thể loại</a>
            </div>
        </div>

        <div class="col-md-auto">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" value="" placeholder="Tên..."
                    id="search_id">
                <button class="btn btn-sm btn-primary" onclick="searched()" type="button"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>
    <div class="table-responsive" id="quanlytheloai">

        @include('dynamic_layout.tablecategory')
    </div>

    <script src="{{ url('./js/quanly_theloai.js') }}"></script>
@else
    <div class="d-flex flex-column border p-3 justify-content-center align-items-center vh-100">
        <i class="fa-solid fa-face-flushed display-4"></i>
        <p class="fw-semibold mt-3 mb-3 fs-4">Cần đăng nhập với quyền admin</p>
    </div>
@endif
