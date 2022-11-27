@if (session()->has('tokenAdmin'))
    @php
        $getAdmin = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('AdminID'))['data'];
    @endphp
    @if (app('request')->all() == null)
        <?php
        $Orders = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/orders?page=1');
        ?>
    @else
        @if (app('request')->input('search') != null)
            @php
                $url = '?id[eq]=' . app('request')->input('search');
                $Orders = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/orders' . $url);
            @endphp
        @else
            @php
                $url = app('request')->input('status') != -1 ? '?status[eq]=' . app('request')->input('status') . '&page=' . app('request')->input('page') : '?page=' . app('request')->input('page');
                $Orders = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/orders' . $url);
            @endphp
        @endif
    @endif
    <div style="background-color: #41484e" class="d-flex text-white justify-content-end p-3">
        <span>{!! $getAdmin['lastname'] . ' ' . $getAdmin['firstname'] !!}</span>
        <span class="mx-3">|</span>
        <a class="text-danger fw-bold" href="{{ route('logoutadmin') }}">Đăng xuất</a>
    </div>
    <div class="p-3 row row-cols-1 row-cols-md-4 sticky-top bg-light justify-content-between">
        <div class="col-md-auto row">
            <div class="col-md-auto">
                <input checked type="radio" class="btnradio btn-check" name="btnradio" id="btnradio1" value="-1">
                <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
            <div class="col-md-auto">
                <input type="radio" class="btnradio btn-check" name="btnradio" id="btnradio2" value="0">
                <label class="btn btn-outline-primary btn-sm" for="btnradio2">Chờ xác nhận
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
            <div class="col-md-auto">
                <input type="radio" class="btnradio btn-check" name="btnradio" id="btnradio3" value="1">
                <label class="btn btn-outline-primary btn-sm" for="btnradio3">Đã xác nhận
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
            {{-- <div class="col-md-auto">
                <input type="radio" class="btnradio btn-check" name="btnradio" id="btnradio4" value="2">
                <label class="btn btn-outline-primary btn-sm" for="btnradio4">Đã giao
                </label>
            </div> --}}
            <div class="col-md-auto">
                <input type="radio" class="btnradio btn-check" name="btnradio" id="btnradio5" value="3">
                <label class="btn btn-outline-primary btn-sm" for="btnradio5">Đã hủy
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
        </div>

        <div class="col-md-auto">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" placeholder="Mã đơn" id="search_id"
                    pattern="[0-9]{1}" title="Chỉ nhập số">
                <button class="btn btn-sm btn-primary" type="button" onclick="searched({!! $Orders['current_page'] !!})"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>
    <div class="table-responsive" id="quanlydonhang">
        @include('dynamic_layout.tableorder')
    </div>

    <script src="{{ url('./js/quanly_donhang.js') }}"></script>
@else
    <div class="d-flex flex-column border p-3 justify-content-center align-items-center vh-100">
        <i class="fa-solid fa-face-flushed display-4"></i>
        <p class="fw-semibold mt-3 mb-3 fs-4">Cần đăng nhập với quyền admin</p>
    </div>
@endif
