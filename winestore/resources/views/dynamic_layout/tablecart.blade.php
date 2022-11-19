<?php
if (session()->exists('UserID')) {
    $getUser = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('UserID'))['data'];
}
?>
@if (isset($_GET['message']) && $_GET['message'] == 'success')
    <table class="table table-sm align-middle">
        <tr>
            <td colspan="4">
                <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto"
                    style="width:fit-content ;">
                    <i class="bi bi-emoji-heart-eyes-fill display-4 text-success"></i>
                    <p class="fw-semibold mt-3 mb-3 fs-5 text-success">Đặt hàng thành công, đã gửi thông tin đến email !</p>
                    <div class="d-grid gap-2">
                        <hr>
                        <a class="btn btn-primary rounded-0" type="button" href="{{ route('shop') }}">Tiếp tục Mua hàng</a>
                    </div>
                </div>
            </td>
        </tr>
    </table>
@else
    <div class="{!! session()->has('cart') == true && sizeof(session('cart')) > 0 ? 'col-md-8' : 'col-md-12' !!}">
        <div class="" style="font-size: 14px">
            <table class="table table-sm align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width:38%">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col" class="text-end">Tổng</th>
                    </tr>
                </thead>
                <?php $sum = 0; ?>
                @if (session()->has('cart') == true && sizeof(session('cart')) > 0)
                    @foreach (session('cart') as $item)
                        <?php $sum += $item['price'] * $item['quantity']; ?>
                        <tr>
                            <td>
                                <div class="">
                                    <a href="{{ route('product_details', ['id' => $item['id']]) }}">
                                        <img class="img pe-2" src="{!! $item['images'] !!}" height="35%"
                                            width="35%" alt="{!! $item['name'] !!}">
                                    </a>
                                    {{-- <div> --}}
                                    <span class="">{!! $item['name'] !!}</span>
                                    {{-- </div> --}}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-sm bi bi-dash-circle" id="btndel{{ $item['id'] }}"
                                        onclick="minustocart({{ $item['id'] }})"></button>
                                    <input id="inp{{ $item['id'] }}" type="number" min="1" max="99"
                                        class="bg-white border-0 text-center" step="1" disabled
                                        value="<?php echo $item['quantity']; ?>" style="width: 2.5rem; text-align:center">
                                    <button class="btn btn-sm bi bi-plus-circle"
                                        onclick="addtocart({{ $item['id'] }})"></button>
                                </div>
                            </td>
                            <td>{{ number_format($item['price']) }}</td>
                            <td>
                                <div class="row px-2 text-end">
                                    <span class="col-12">{{ number_format($item['price'] * $item['quantity']) }}</span>
                                    <span class="col-12 text-decoration-underline text-danger"
                                        onclick="removeItemCart({{ $item['id'] }})"><button class="btn p-0"><i
                                                class="bi bi-trash3"></i></button>
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
                                <i class="bi bi-basket display-5"></i>
                                <p class="fw-semibold mt-3 mb-3 fs-6">Không có sản phẩm nào trong giỏ hàng</p>
                                <div class="d-grid gap-2">
                                    <hr>
                                    <a class="btn btn-primary rounded-0" type="button" href="{{ route('shop') }}">Mua hàng</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    <div class="col-md-4" style="display: {!! session()->has('cart') == true && sizeof(session('cart')) > 0 ? 'block' : 'none' !!}">
        @if (session()->exists('UserID'))
            <form class="p-3 mb-3 border" action="/vnpay/vnpay_payment" method="POST">
                @csrf
                <h4>THÔNG TIN KHÁCH HÀNG</h4>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label-sm fw-semibold">Họ và tên</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="pay-name" name="pay-name"
                            value="{!! session()->has('UserID') ? $getUser['lastname'] . ' ' . $getUser['firstname'] : 'Nguyễn Thị Minh Thư' !!}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Số điện thoại</label>
                    <div class="col-sm-8">
                        <input type="phone" class="form-control form-control-sm" id="pay-phone" name="pay-phone"
                            placeholder="số điện thoại" value="{!! session()->has('UserID') ? $getUser['phone'] : '00xxx' !!}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control form-control-sm" id="pay-email" name="pay-email"
                            value="{!! session()->has('UserID') ? $getUser['email'] : 'example@gmail.com' !!}">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Địa chỉ</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm mb-2" aria-label="Default select example"
                            id="thanhpho" name="thanhpho" onchange="getDistric(this)">
                            <option selected class="text-center">------Thành phố------</option>
                            <?php
                            $respon = Http::get('https://api.mysupership.vn/v1/partner/areas/province');
                            $apiOk = $respon['results'];
                            for ($i = 0; $i < sizeof($apiOk); $i++) {
                                // if($getUser['city']==$apiOk[$i]['name']){
                                // echo '<option selected value="' . $apiOk[$i]['code'] . '_' . $apiOk[$i]['name'] . '">' . $apiOk[$i]['name'] . '</option>';
                                // }else
                                echo '<option value="' . $apiOk[$i]['code'] . '_' . $apiOk[$i]['name'] . '">' . $apiOk[$i]['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <select class="form-select form-select-sm mb-2" aria-label="Default select example"
                            id="quan-huyen" name="quan-huyen" onchange="getBlock(this)">
                            <option selected class="text-center">------Quận, huyện------</option>
                        </select>
                        <select class="form-select form-select-sm mb-2" aria-label="Default select example"
                            id="phuong-xa" name="phuong-xa">
                            <option selected class="text-center">------Phường, xã------</option>
                        </select>
                        <textarea class="form-control form-select-sm" id="pay-address" name="pay-address" placeholder="Số nhà, tên đường"
                            style="height: 50px;">99 An Dương Vương</textarea>
                    </div>

                </div>
                <hr>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label-sm fw-semibold">Thanh toán</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" id="pay-options" name="pay-options">
                            <option value="COD" selected>Thanh toán trực tiếp</option>
                            <option value="VNPAY">Thanh toán quá VNPAY</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label fw-bold">Tổng</label>
                    <div class="col-sm-8">
                        <input class="form-control fw-semibold bg-white" id="pay-sum" value="<?php echo number_format($sum); ?>"
                            disabled />
                        <input class="form-control fw-semibold bg-white" id="pay-sum2" name="pay-sum2"
                            value="<?php echo $sum; ?>" style="display: none" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary rounded-0" name="redirect">Đặt hàng</button>
            </form>
        @else
            <div class="p-3 mb-3 border text-center" >
                <a  class="btn btn-primary rounded-0" href="{{ route('register') }}">Đăng nhập</a>
            </div>
        @endif

    </div>
@endif
