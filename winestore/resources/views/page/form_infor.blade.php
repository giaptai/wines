{{-- @extends('page.thongtincanhan')
@section('contentttt') --}}
<form class="col-md-7 col-12" style="padding: 0px 2rem;">
    <h3>Thông tin cá nhân</h3>
    <div class="form-floating mb-3"><input type="email" class="form-control" id="hotencanhan"
            placeholder="name@example.com" value="Nguyễn Thị Minh Thư"><label for="floatingInput">Họ và
            tên</label></div>
    <div class="form-floating mb-3"><input type="text" class="form-control" id="sdtcanhan"
            placeholder="name@example.com" value="<?php echo rand(1000000000, 9999999999); ?>"><label for="floatingInput">Số
            điện
            thoại</label></div>
    <div class="form-floating mb-3"><input type="email" class="form-control" id="emailcanhan"
            placeholder="name@example.com" value="hentaiktvn321@gmail.com"><label
            for="floatingInput">Email</label></div>
    <div class="form-floating mb-3"><input type="text" class="form-control" id="diachicanhan"
            placeholder="name@example.com" value="6 An Dương Vương, Phường 16, Quận 8"><label
            for="floatingInput">Địa chỉ mặc định</label></div>
    <div class="form-floating mb-3"><button type="button" class="btn btn-dark"
            onclick="updateInfo(100121)">Cập nhật</button>
    </div>
</form>
<div class="col-md-4">
    <div class="d-flex bg-light">
        <h1 class="card-title p-2">16</h1>
        <p class="card-text">Đơn chờ xác nhận</p>
    </div>
    <hr>
    <div class="d-flex bg-light">
        <h1 class="card-title p-2">2</h1>
        <p class="card-text">Đơn đã giao</p>
    </div>
    <hr>
    <div class="d-flex bg-light">
        <h1 class="card-title p-2">1</h1>
        <p class="card-text">Đơn đã xác nhận</p>
    </div>
    <hr>
</div>
{{-- @endsection --}}
