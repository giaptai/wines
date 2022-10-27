<div class="{!! (session()->has('cart')==true && sizeof(session('cart')) > 0) ? 'col-md-8' : 'col-md-12' !!}">
    <div class="">
        <table class="table table-sm align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col" style="width:20%">Sản phẩm</th>
                    <th scope="col" class="col-md-2">Số lượng</th>
                    <th scope="col" class="col-md-2">Giá</th>
                    <th scope="col" class="col-md-2">Tổng</th>
                </tr>
            </thead>
            <?php $sum = 0; ?>
            @if (session()->has('cart')==true && sizeof(session('cart')) > 0)
                @foreach (session('cart') as $item)
                    <?php $sum += $item['price'] * $item['quantity']; ?>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <img class="img"
                                    src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                                    width="90"><span class="">{!! $item['name'] !!}</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <button class="btn bi bi-dash-circle" id="btndel{{ $item['id'] }}"
                                    onclick="minustocart({{ $item['id'] }})"></button>
                                <input id="inp{{ $item['id'] }}" type="number" min="1" max="99"
                                    class="bg-white border-0 text-center" step="1" disabled
                                    value="<?php echo $item['quantity']; ?>" size="1">
                                <button class="btn bi bi-plus-circle" onclick="addtocart({{ $item['id'] }})"></button>
                            </div>
                        </td>
                        <td>{{ number_format($item['price']) }}</td>
                        <td>
                            <div class="row">
                                <span class="col-12">{{ number_format($item['price'] * $item['quantity']) }}</span>
                                <span class="col-12 text-decoration-underline text-danger"
                                    onclick="removeItemCart({{ $item['id'] }})"><i class="bi bi-trash3"></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto"
                            style="width:fit-content ;">
                            <i class="bi bi-basket display-6"></i>
                            <p class="fw-semibold">Không có sản phẩm nào trong giỏ hàng</p>
                            <div class="d-grid gap-2">
                                <hr>
                                <a class="btn btn-primary" type="button" href="{{ route('shop') }}">Mua hàng</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endif
        </table>
    </div>
</div>
<div class="col-md-4" style="display: {!! (session()->has('cart')==true && sizeof(session('cart')) > 0)  ? 'block' : 'none' !!}">
    <form class="p-3 mb-3 border">
        <h4>THÔNG TIN KHÁCH HÀNG</h4>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label-sm fw-semibold">Họ và tên</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="pay-name" name="pay-name" value="Nguyễn Thị Minh Thư">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Số điện thoại</label>
            <div class="col-sm-8">
                <input type="phone" class="form-control form-control-sm" id="pay-phone" name="pay-phone" value="0921123435">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control form-control-sm" id="pay-email" name="pay-email" value="minhthu@gmail.com">
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Địa chỉ</label>
            <div class="col-sm-8">
                <select class="form-select form-select-sm mb-2" aria-label="Default select example" id="thanhpho"
                    onchange="getDistric(this)">
                    <option selected class="text-center">------Thành phố------</option>
                    <?php
                    $respon = Http::get('https://provinces.open-api.vn/api/p');
                    $apiOk = $respon->json();
                    for ($i = 0; $i < sizeof($apiOk); $i++) {
                        echo '<option value="' . $apiOk[$i]['code'] . '">' . $apiOk[$i]['name'] . '</option>';
                    }
                    ?>
                </select>
                <select class="form-select form-select-sm mb-2" aria-label="Default select example" id="quan-huyen"
                    onchange="getBlock(this)">
                    <option selected class="text-center">------Quận, huyện------</option>

                </select>
                <select class="form-select form-select-sm mb-2" aria-label="Default select example" id="phuong-xa">
                    <option selected class="text-center">------Phường, xã------</option>
                </select>
                <textarea class="form-control form-select-sm" id="pay-address" id="pay-address" placeholder="Số nhà, tên đường"
                    style="height: 50px;">99 An Dương Vương</textarea>
            </div>

        </div>
        <hr>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Thanh toán</label>
            <div class="col-sm-8">
                <select class="form-select form-select-sm" id="pay-options" name="pay-options">
                    <option value="COD" selected>Thanh toán trực tiếp</option>
                    <option>Thanh toán quá VNPAY</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label fw-bold">Tổng</label>
            <div class="col-sm-8">
                <span class="form-control fw-semibold bg-white" id="pay-sum"><?php echo number_format($sum); ?></span>
                <span class="form-control fw-semibold bg-white" id="pay-sum2"
                    style="display: none"><?php echo $sum; ?></span>
            </div>
        </div>
        <a type="button" class="btn btn-primary" href="{{ route('checkout') }}" >Đặt hàng</a>
    </form>
</div>
