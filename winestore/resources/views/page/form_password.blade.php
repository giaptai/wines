@if (session()->has('UserID') && session()->has('tokenUser'))
    {!! session('tokenUser') !!}
    <?php
    $getUser = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('UserID'));
    ?>

    <form class="col-md-12 col-12 p-5 border" action="{{ route('change-password') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <h2>Đổi mật khẩu</h2>
        <hr>

        {{-- {!! Request::get('token_change_pass') !!} --}}
        @if (Request::get('token_change_pass') != null)
            <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto text-success"
                style="width:fit-content ;">
                <i class="bi bi-check-circle-fill display-5"></i>
                <p class="fw-semibold mt-3 mb-3 fs-5">Đổi mật khẩu thành công !</p>
            </div>
        @else
            @if (Request::get('sendmail') != null)
                <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto text-success"
                    style="width:fit-content ;">
                    <i class="bi bi-check-circle-fill display-5"></i>
                    <p class="fw-semibold mt-3 mb-3 fs-5">Đã gửi link xác nhận tới email !</p>
                </div>
            @else
                <div class="mb-3 row col-md-12">
                    <div class="row col-md-12 mb-3">
                        <label class="col-md-3 col-form-label">Mật khẩu cũ</label>
                        <div class="col-md-auto">
                            <input type="password" class="form-control" placeholder="Mật khẩu cũ" id="oldpassword"
                                name="oldpass">
                        </div>
                    </div>
                    <div class="row col-md-12 mb-3">
                        <label class="col-md-3 col-form-label">Mật khẩu mới</label>
                        <div class="col-md-auto">
                            <input type="password" class="form-control" placeholder="Mật khẩu mới" id="newpassword"
                                name="newpass">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <label class="col-md-3 col-form-label">Email:</label>
                        <div class="col-md-7">
                            <div class="input-group mb-3">
                                <input type="email" id="clientemail" name="email" class="form-control"
                                    value="{{ $getUser['data']['email'] }}" placeholder="Email"
                                    aria-describedby="basic-addon2">
                                <button class="input-group-text" id="basic-addon2" type="button"
                                    onclick="changePassword()">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </form>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toast-body matkhau">Cập nhật tài khoản thành công</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
@else
    <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto" style="width:100%;">
        <i class="bi bi-emoji-dizzy display-5"></i>
        <p class="fw-semibold mt-3 mb-3 fs-6">Yêu cầu đăng nhập !</p>
    </div>
@endif

<script src="{{ url('./js/taikhoan_canhan.js') }}"></script>
