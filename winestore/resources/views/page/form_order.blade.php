@if (session()->has('UserID'))
    {{-- {!! session('UserID') !!} --}}
    @php
        $getId = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/customers?email[eq]=' . session('UserEmail'))['data'][0];
        $OrderClient = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/orders?customerId[eq]=' . session('UserID'));
    @endphp

    <div class=" p-3 row row-cols-1 row-cols-md-4 justify-content-between">
        <div class="col-md-auto row">
            <div class="col-md-auto">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="-1" checked>
                <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng đơn
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
            <div class="col-md-auto">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="0">
                <label class="btn btn-outline-primary btn-sm" for="btnradio2">Chờ xác nhận
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
            <div class="col-md-auto">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="1">
                <label class="btn btn-outline-primary btn-sm" for="btnradio3">Đã xác nhận
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
            <div class="col-md-auto">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" value="2">
                <label class="btn btn-outline-primary btn-sm" for="btnradio4">Đã giao
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
            <div class="col-md-auto">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" value="3">
                <label class="btn btn-outline-primary btn-sm" for="btnradio5">Đã hủy
                    {{-- <span class="badge bg-danger" id="badge_tongdon">14</span> --}}
                </label>
            </div>
        </div>

        <div class="col-md-auto">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" placeholder="Mã đơn.." id="search_id">
                <button class="btn btn-sm btn-primary" type="button" onclick="searched()"> <i
                        class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
    <div class="table-responsive" id="donhangcanhan">
        @include('dynamic_layout.tableorderclient');
    </div>
    <script src="{{ url('./js/taikhoan_canhan.js') }}"></script>
@else
    <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto" style="width:100%;">
        <i class="bi bi-emoji-dizzy display-5"></i>
        <p class="fw-semibold mt-3 mb-3 fs-6">Yêu cầu đăng nhập !</p>
    </div>
@endif
