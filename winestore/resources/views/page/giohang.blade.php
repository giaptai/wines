@extends('home')
@section('content')
    <div class="container-md shadow mt-4 mb-4" style="width: 80%">
        <?php
        echo 'https://provinces.open-api.vn/ dữ liệu tỉnh thành VN';
        // for ($i = 0; $i < sizeof($apiOk); $i++) {
        // echo $apiOk[$i]['name'];
        // }
        ?>
        <div class="pt-4 border-top">
            <div class="row">
                <div class="col-md-8">
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
                            <tbody id="cart-table">
                                <?php
                            $sum=0;
                            if(session()->has('cart')){ 
                                $vart = session('cart');
                                foreach (session('cart') as $key => $value) {
                                    $sum+=$value['price']*$value['quantity'];
                            ?>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <img class="img" src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg" width="90">
                                            <span class=""><?php echo $value['name']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn bi bi-dash-circle" id="btndel<?php echo $value['id']; ?>"
                                                onclick="minustocart(<?php echo $value['id']; ?>)"></button>
                                            <input id="inp<?php echo $value['id']; ?>" type="number" min="1" max="99"
                                                class="bg-white border-0 text-center" step="1" disabled
                                                value="<?php echo $value['quantity']; ?>" size="1">
                                            <button class="btn bi bi-plus-circle"
                                                onclick="addtocart(<?php echo $value['id']; ?>)"></button>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($value['price']); ?></td>
                                    <td>
                                        <div class="row">
                                            <span class="col-12"><?php echo number_format($value['price'] * $value['quantity']); ?></span>
                                            <span class="col-12 text-decoration-underline text-danger"
                                                onclick="removeItemCart(<?php echo $value['id']; ?>)"><i class="bi bi-trash3">
                                                </i></span>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                               }
                            }else echo '<tr><td colspan="4">Không có sản phẩm nào trong giỏ hàng</td></tr>';
                            ?>
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <td colspan="2" class="fw-bolder fs-5" style="text-align: right;">Tổng:</td>
                                    <td class="fs-5" id="tongtien"><?php echo number_format($sum); ?></td>
                                    <td><a class="btn btn-outline-warning btn-sm" id="deletedall">Xóa tất cả</a></td>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
                <div class="col-md-4" style="">
                    <form class="p-3 mb-3 border">
                        <h4>THÔNG TIN KHÁCH HÀNG</h4>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label fs-6">Họ và tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pay-name" name="pay-name"
                                    value="Nguyễn Thị Minh Thư">
                            </div>
                        </div>
                        <div class="row mb-3"><label for="inputPassword3" class="col-sm-4 col-form-label">Số điện
                                thoại</label>
                            <div class="col-sm-8">
                                <input type="phone" class="form-control" id="pay-phone" name="pay-phone"
                                    value="0921123435">
                            </div>
                        </div>

                        <div class="row mb-3"><label for="inputPassword3" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8"><input type="email" class="form-control" id="pay-email" name="pay-email"
                                    value="minhthu@gmail.com"></div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <select class="form-select mb-2" aria-label="Default select example" id="thanhpho"
                                    onchange="getDistric(this)">
                                    <option selected class="text-center">------Thành phố------</option>
                                    <?php
                                    for ($i = 0; $i < sizeof($apiOk); $i++) {
                                        echo '<option value="' . $apiOk[$i]['code'] . '">' . $apiOk[$i]['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <select class="form-select mb-2" aria-label="Default select example" id="quan-huyen"
                                    onchange="getBlock(this)">
                                    <option selected class="text-center">------Quận, huyện------</option>

                                </select>
                                <select class="form-select mb-2" aria-label="Default select example" id="phuong-xa">
                                    <option selected class="text-center">------Phường, xã------</option>
                                </select>
                                <textarea class="form-control" id="pay-address" id="pay-address" placeholder="Số nhà, tên đường"
                                    style="height: 50px;">99 An Dương Vương</textarea>
                            </div>

                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-4 col-form-label fw-semibold">Thanh toán</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="pay-options" name="pay-options">
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
                        <button type="button" class="btn btn-primary" onclick="codpay()">Đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getDistric(ele) {
            console.log(ele);
            var newele = document.getElementById('quan-huyen');
            var newele2 = document.getElementById('phuong-xa');
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(JSON.parse(this.responseText));
                    arrcity = JSON.parse(this.responseText);
                    newele.length = 1;
                    newele2.length = 1;
                    for (var i = 0; i < arrcity.length; i++) {
                        newele.add(new Option(arrcity[i]['name'], arrcity[i]['code']));
                    }
                }
            };

            xhttp.open("GET", "/cart/distric?id=" + ele.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }

        function getBlock(ele) {
            console.log(ele);
            var newele = document.getElementById('phuong-xa');
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(JSON.parse(this.responseText));
                    arrcity = JSON.parse(this.responseText);
                    newele.length = 1;
                    for (var i = 0; i < arrcity.length; i++) {
                        newele.add(new Option(arrcity[i]['name'], arrcity[i]['code']));
                    }
                }
            };

            xhttp.open("GET", "/cart/block?id=" + ele.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }

        function minustocart(id) {
            console.log(id);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById('cart-table').innerHTML = this.responseText;
                    // document.getElementById('pay-sum').innerHTML = JSON.parse(this.responseText).paysum;
                }
            };

            xhttp.open("GET", "/minus-to-cart/" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }

        function addtocart(id) {
            console.log(id);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    if (this.responseText == 'Vượt số lượng kho !') {
                        alert('Vượt số lượng kho !')
                    } else {
                        document.getElementById('cart-table').innerHTML = this.responseText;
                        // document.getElementById('cart-table').innerHTML = JSON.parse(this.responseText).arr1
                        // document.getElementById('pay-sum').innerHTML = JSON.parse(this.responseText).paysum;
                    }
                }
            };

            xhttp.open("GET", "/add-to-cart/" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }

        function removeItemCart(id) {
            console.log(id);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    // document.getElementById('cart-table').innerHTML = JSON.parse(this.responseText).arr1
                    // document.getElementById('pay-sum').innerHTML = JSON.parse(this.responseText).paysum;
                    document.getElementById('cart-table').innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "/del-item-cart/" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }
    </script>
@endsection
