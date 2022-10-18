<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    @include('layout.menubar')
    <div class="container" style="width: 80%">
        <?php
        if (session()->has('cart')) {
            echo 'ok cart.blade.php';
        } else {
            echo 'not ok';
        }
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
                                if(session()->has('cart')){ $vart = session('cart');
                                    foreach (session('cart') as $key => $value) {
                                        $sum+=$value['price']*$value['quantity'];
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column align-items-center">
                                            <img class="img"
                                                src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                                                width="82"><span class=""><?php echo $value['name']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn bi bi-dash-circle"
                                                onclick="minustocart(<?php echo $value['id']; ?>)"></button>
                                            <input type="text" min="1" max="99" step="1" disabled
                                                class="btn" value="<?php echo $value['quantity']; ?>"
                                                style="text-align: center; width: 3rem;">
                                            <button class="btn bi bi-plus-circle"
                                                onclick="addtocart(<?php echo $value['id']; ?>)"></button>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($value['price']); ?></td>
                                    <td>
                                        <div class="row">
                                            <span class="col-12"><?php echo number_format($value['price'] * $value['quantity']); ?></span>
                                            <span class="col-12 text-decoration-underline text-danger"
                                                onclick="deletedItem(<?php echo $value['id']; ?>)">Xóa</span>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                   }
                                }else echo '<tr><td colspan="4">Không có sản phẩm nào trong giỏ hàng</td></tr>';
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="fw-bolder fs-5" style="text-align: right;">Tổng:</td>
                                    <td class="fs-5" id="tongtien"><?php echo number_format($sum); ?></td>
                                    <td><a class="btn btn-outline-warning btn-sm" id="deletedall"
                                            href="{{ route('add_to_cart', ['id' => 74]) }}">Xóa tất cả</a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-4" style="">
                    <form class="p-3 border">
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
                            <div class="col-sm-8"><input type="email" class="form-control" id="pay-email"
                                    name="pay-email" value="minhthu@gmail.com"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="pay-address" id="pay-address"
                                    placeholder="99 An Dương Vương, Phường 16, Quận 8, TP HCM" style="height: 100px;">99 An Dương Vương, Phường 16, Quận 8, TP HCM</textarea>
                            </div>
                        </div>
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
                                <span class="form-control fw-semibold bg-white" id="pay-sum2" style="display: none"><?php echo $sum; ?></span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="codpay()">Đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footerbar')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script>
    function addtocart(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            document.getElementById('cart-table').innerHTML = JSON.parse(xhttp.responseText).arr1;
            document.getElementById('tongtien').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum2').innerHTML = JSON.parse(xhttp.responseText).arr3;

        }
    }
    //cau hinh request
    xhttp.open('GET', './add-to-cart/' + id, true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send();
}

function minustocart(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            document.getElementById('cart-table').innerHTML = JSON.parse(xhttp.responseText).arr1;
            document.getElementById('tongtien').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum2').innerHTML = JSON.parse(xhttp.responseText).arr3;

        }
    }
    //cau hinh request
    xhttp.open('GET', './minus-to-cart/' + id, true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send();
}

function codpay() {
    var s1 = document.getElementById('pay-name').value;
    var s2 = document.getElementById('pay-phone').value;
    var s3 = document.getElementById('pay-email').value;
    var s4 = document.getElementById('pay-address').value;
    var s5 = document.getElementById('pay-options').value;
    var s6 = document.getElementById('pay-sum2').innerHTML;
    console.log(s1, s2, s3, s4, s5, s6);

    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            setTimeout(() => {
                window.location.href = 'https://www.youtube.com/watch?v=SoZaHKud2i4';
            }, 3000)
        }
    }
    //cau hinh request
    xhttp.open('POST', './pay-cod', true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send(
        'fullname=' + s1 +
        '&phone=' + s2 +
        '&email=' + s3 +
        '&address=' + s4 +
        '&total_money=' + s6 +
        '&pay_method=' + s5
    );
}

function deletedItem(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            document.getElementById('cart-table').innerHTML = JSON.parse(xhttp.responseText).arr1;
            document.getElementById('tongtien').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum2').innerHTML = JSON.parse(xhttp.responseText).arr3;

        }
    }
    //cau hinh request
    xhttp.open('GET', './del-item-cart/' + id, true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send();
}
</script>
</html>
