@if (session()->has('UserID'))
    {!! session('UserID') . '---' . session('tokenUser') !!}
    <?php
    $getUser = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('UserID'))['data'];
    ?>
    <form class="col-md-12 col-12 p-5 border" method="POST" enctype="multipart/form-data">
        <h2>Thông tin cá nhân</h2>
        <hr>
        <div class="mb-3 row ">
            <div class="row col-md-6">
                <label for="exampleFormControlInput1" class="col-md-4 col-form-label">Họ và lót</label>
                <div class="col-sm-auto">
                    <input type="text" class="form-control" placeholder="Nguyễn Thị Minh"
                        value="{{ $getUser['lastname'] }}" id="lastname">
                </div>
            </div>
            <div class="row col-md-6">
                <label for="exampleFormControlInput1" class="col-sm-auto col-form-label">Tên</label>
                <div class="col-sm-auto">
                    <input type="text" class="form-control" placeholder="Thư" value="{{ $getUser['firstname'] }}"
                        id="firstname">
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control-plaintext" placeholder="minhthu@gmail.com" id="email"
                    value="{{ $getUser['email'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Số điện thoại:</label>
            <div class="col-sm-auto">
                <input type="phone" class="form-control-plaintext" id="phone" placeholder="<?php echo rand(1000000000, 9999999999); ?>"
                    value="{{ $getUser['phone'] }}">
            </div>
        </div>
        <div class="form-floating mb-3">
            <button type="button" class="btn btn-dark" onclick="updateInfo({!! session('UserID') !!})">Lưu</button>
        </div>
    </form>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toast-info">Cập nhật tài khoản thành công</div>
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
