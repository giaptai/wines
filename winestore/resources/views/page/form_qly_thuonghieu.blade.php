@if (session()->has('tokenAdmin'))
    @if (app('request')->all() == null)
        <?php
        $Brands = Http::get('http://127.0.0.1:8001/api/v1/brands?page=1');
        ?>
    @else
        @php
            $url = app('request')->input('name') != null ? '?name[like]=' . app('request')->input('name') . '&page=' . app('request')->input('page') : '?page=' . app('request')->input('page');
            $Brands = Http::get('http://127.0.0.1:8001/api/v1/brands' . $url);
        @endphp
    @endif
    <div class="p-3 row row-cols-1 row-cols-md-3 bg-light justify-content-between">
        <div class="col-md-auto d-flex">

            <div class="col-md-auto">
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#themthuonghieu"> Thêm thương
                    hiệu
                </a>
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

    <div class="table-responsive" id="quanlythuonghieu">
        @include('dynamic_layout.tablebrand')
    </div>

    <script src="{{ url('./js/quanly_thuonghieu.js') }}"></script>
@else
    <div class="d-flex flex-column border p-3 justify-content-center align-items-center vh-100">
        <i class="fa-solid fa-face-flushed display-4"></i>
        <p class="fw-semibold mt-3 mb-3 fs-4">Cần đăng nhập với quyền admin</p>
    </div>
@endif
