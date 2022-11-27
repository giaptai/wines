@if (session()->has('tokenAdmin'))
    <?php
    $Customers = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers');
    $getAdmin = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('AdminID'))['data'];
    ?>
    <div style="background-color: #41484e" class="d-flex text-white justify-content-end p-3">
        <span>{!! $getAdmin['lastname'] . ' ' . $getAdmin['firstname'] !!}</span> 
        <span class="mx-3">|</span>
        <a class="text-danger fw-bold" href="{{ route('logoutadmin') }}">Đăng xuất</a>
    </div>
    <div class="p-3 row justify-content-between sticky-top bg-light">
        <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                value="Tổng đơn"><label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng tài khoản <span
                    class="badge bg-danger" id="badge_tongdon">{!! isset($Customers['meta']['total']) ? $Customers['meta']['total'] : 0 !!}</span></label></div>
        <div class="col-md-5">
            <div class="input-group">
                <input type="email" class="form-control form-control-sm" placeholder="Email" id="email_id">
                <input type="tel" class="form-control form-control-sm" placeholder="Số điện thoại"
                    id="phone_id">
                <button class="btn btn-sm btn-primary" type="button" onclick="searched()"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>
    <div class="table-responsive" id="quanlytaikhoan">
        @include('dynamic_layout.tableaccount')
    </div>
    <script src="{{ url('./js/quanly_taikhoan.js') }}"></script>
@else
    <div class="d-flex flex-column border p-3 justify-content-center align-items-center vh-100">
        <i class="fa-solid fa-face-flushed display-4"></i>
        <p class="fw-semibold mt-3 mb-3 fs-4">Cần đăng nhập với quyền admin</p>
    </div>
@endif
