@if (session()->exists('UserEmail'))
    {!! session('UserEmail') . '---' . session('tokenUser') !!}
    <?php
    $getUser = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/customers?email[eq]=' . session('UserEmail'))['data'][0];
    echo $getUser['user_id'];
    ?>
@endif
<div style="text-align: center; border: dotted;" class="col">
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm địa chỉ</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Địa chỉ mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAddr">
                        <div class="form mb-3 row">
                            <div class="col-md-6">
                                <input type="text" class="form-control rounded-0" placeholder="Họ và lót"
                                    id="lastname">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control rounded-0" id="firstname" placeholder="Tên">
                            </div>
                        </div>
                        <div class="form mb-3 row">
                            <div class="col-md-6">
                                <input type="number" class="form-control rounded-0" id="phone"
                                    placeholder="Số điện thoại">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                    id="thanhpho" name="thanhpho" onchange="getDistric(this)">
                                    <option selected class="text-center">------Thành phố------</option>
                                    <?php
                                    $respon = Http::get('https://api.mysupership.vn/v1/partner/areas/province');
                                    $apiOk = $respon['results'];
                                    for ($i = 0; $i < sizeof($apiOk); $i++) {
                                        echo '<option value="' . $apiOk[$i]['code'] . '_' . $apiOk[$i]['name'] . '">' . $apiOk[$i]['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form mb-3 row">
                            <div class="col-md-6">
                                <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                    id="quan-huyen" name="quan-huyen" onchange="getBlock(this)">
                                    <option selected class="text-center">------Quận, huyện------</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                    id="phuong-xa" name="phuong-xa">
                                    <option selected class="text-center">------Phường, xã------</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-0" id="sonha-duong"
                                placeholder="Số nhà, tên đường">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addAddress()">Thêm</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="addruser" class="mt-3">
    <i class="mt-3">Lưu ý: Mỗi tài khoản tối đa 5 địa chỉ</i>
    <div class="item mt-3" style="border: 1px ridge;">
        <div class="d-flex justify-content-between p-2">
            <div class="info">
                <div class="name">Nguyễn Thị Minh Thư<a class="text-success text-decoration-none fs-6"> <i
                            class="fa-solid fa-circle-check"></i>Địa chỉ mặc định</a></div>
                <div class="address"><span>Địa chỉ: </span>6 An Dương Vương, Phường 16, Quận 8
                </div>
                <div class="phone"><span>Điện thoại: </span>0922201315</div>
            </div>
            <div>
                <a class="btn btn-sm text-primary btn-sm bi bi-info-circle fs-5"></a>
                <a class="btn btn-sm text-danger btn-sm bi bi-x fs-5"></a>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('./js/taikhoan_canhan.js') }}"></script>
