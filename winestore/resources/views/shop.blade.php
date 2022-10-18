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

    <div class="container shadow" style="width: 80%">

        <div class='border-top'>
            <div class='d-flex flex-column mt-4 gx-5 sticky-top bg-light p-3 justify-content-between'>
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <button class="btn text-white fw-semibold rounded-0" type="button">
                                <span class="fw-semibold text-danger" id="soluong"> (Có <?php echo $table; ?> sản phẩm) </span>
                            </button>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..."
                                id="search_name" />
                            <button class="btn text-white" type="button" style="background-color: #bf0c2b"
                                onclick="searchName()">Tìm</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class='products mb-5 mt-4'> --}}
            <div class='products my-3 row'>

                <div class="collapse show col-lg-3 col-md-12" id="collapseExample">
                    <div class="d-flex align-items-center">
                        <button class="btn text-white fw-semibold px-4 rounded-0 w-100" type="button"
                            data-bs-toggle="collapse" style="background-color: #bf0c2b"
                            data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                            BỘ LỌC TÌM NHANH </button>
                    </div>

                    <div class="card card-body rounded-0">
                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Loại rượu</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="list-group ">
                                    <li class="form-check">
                                        <input class="input-checkbox form-check-input me-1" type="checkbox" value="" checked
                                            id="wine">
                                        <label class="form-check-label" for="wine">Tất cả</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-checkbox form-check-input me-1" type="checkbox" value="Vang trắng"
                                            id="wine1">
                                        <label class="form-check-label" for="wine1">Vang trắng</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-checkbox form-check-input me-1" type="checkbox" value="Vang đỏ"
                                            id="wine2">
                                        <label class="form-check-label" for="wine2">Vang đỏ</label>
                                    </li>

                                    <li class="form-check">
                                        <input class="input-checkbox form-check-input me-1" type="checkbox" value="Vang ngọt"
                                            id="wine3">
                                        <label class="form-check-label" for="wine3">Vang ngọt</label>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Quốc gia</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-check">
                                    <input class="input-country form-check-input me-1" type="radio" value="" name="country" @checked(true)
                                        id="country">
                                    <label class="form-check-label" for="country">Tất cả</label>
                                </div>
                                <div class="form-check">
                                    <input class="input-country form-check-input me-1" type="radio" value="Pháp" name="country"
                                        id="country1">
                                    <label class="form-check-label" for="country1">Pháp</label>
                                </div>

                                <div class="form-check">
                                    <input class="input-country form-check-input me-1" type="radio" value="Ý" name="country"
                                        id="country2">
                                    <label class="form-check-label" for="country2">Ý</label>
                                </div>

                                <div class="form-check">
                                    <input class="input-country form-check-input me-1" type="radio" value="Chile" name="country"
                                        id="country3">
                                    <label class="form-check-label" for="country3">Chile</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Thương hiệu</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-check">
                                    <input class="input-brand form-check-input me-1" type="radio" value="" name="brand" @checked(true)
                                        id="brand1">
                                    <label class="form-check-label" for="brand1">Tất cả</label>
                                </div>
                                <div class="form-check">
                                    <input class="input-brand form-check-input me-1" type="radio" value="Gruaud-Larose" name="brand" 
                                        id="brand2">
                                    <label class="form-check-label" for="brand2">Gruaud-Larose</label>
                                </div>
                                <div class="form-check">
                                    <input class="input-brand form-check-input me-1" type="radio" value="Lucente" name="brand" 
                                        id="brand3">
                                    <label class="form-check-label" for="brand3">Lucente</label>
                                </div>
                                <div class="form-check">
                                    <input class="input-brand form-check-input me-1" type="radio" value="Concha Y Toro" name="brand" 
                                        id="brand4">
                                    <label class="form-check-label" for="brand4">Concha Y Toro</label>
                                </div>
                                <div class="form-check">
                                    <input class="input-brand form-check-input me-1" type="radio" value="Urbina" name="brand"
                                        id="brand5">
                                    <label class="form-check-label" for="brand5">Urbina</label>
                                </div>
                                {{-- <ul class="list-group">
                                    <li class="form-check">
                                        <input class="input-brand form-check-input me-1" type="radio" value="" @checked(true)
                                            name="brand" id="brand1">
                                        <label class="form-check-label" for="brand1">Tất cả</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-brand form-check-input me-1" type="radio" value="Gruaud-Larose"
                                            name="brand" id="brand2">
                                        <label class="form-check-label" for="brand1">Gruaud-Larose</label>
                                    </li>

                                    <li class="form-check">
                                        <input class="input-brand form-check-input me-1" type="radio" value="Lucente"
                                            name="brand" id="brand3">
                                        <label class="form-check-label" for="brand2">Lucente</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-brand form-check-input me-1" type="radio" value="Concha Y Toro"
                                            name="brand" id="brand4">
                                        <label class="form-check-label" for="brand3">Concha Y Toro</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-brand form-check-input me-1" type="radio" value="Urbina"
                                            name="brand" id="brand4">
                                        <label class="form-check-label" for="brand4">Urbina</label>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Nồng độ</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="list-group">
                                    <li class="form-check">
                                        <input class="input-tone form-check-input me-1" type="radio" value="0-100" @checked(true)
                                            name="nongdo" id="nongdo">
                                        <label class="form-check-label" for="nongdo">
                                           Tất cả</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-tone form-check-input me-1" type="radio" value="0-11.5"
                                            name="nongdo" id="nongdo1">
                                        <label class="form-check-label" for="nongdo1">
                                            < 11.5%</label>
                                    </li>

                                    <li class="form-check">
                                        <input class="input-tone form-check-input me-1" type="radio" value="11.5-13.5"
                                            name="nongdo" id="nongdo2">
                                        <label class="form-check-label" for="nongdo2">11.5 - 13.5%</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-tone form-check-input me-1" type="radio" value="13.5-14"
                                            name="nongdo" id="nongdo3">
                                        <label class="form-check-label" for="nongdo3">13.5 - 14%</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-tone form-check-input me-1" type="radio" value="14-100"
                                            name="nongdo" id="nongdo4">
                                        <label class="form-check-label" for="nongdo4">> 14%</label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Giá</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="first-price" placeholder="0" value="">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="last-price" placeholder="999999999" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-outline-danger w-100" onclick="search()">Lọc sản phẩm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row row-cols-1 row-cols-md-2 g-3" id="show-product">
                        <?php
                        if (sizeof($wineArray) > 0) {
                            foreach ($wineArray as $key => $value) {
                        ?>
                        <div class="col">
                            <div class="card h-100 rounded-0" style="">
                                <div class="row g-0">
                                    <div class="col-md-4 col-sm-12">
                                        {{-- <a href="{{ route('product_details', ['id'=>$value->id]) }}">
                                            <img width="115" src="{{ $value->image }}" class="img-fluid rounded-end"
                                            alt="...">
                                        </a> --}}
                                        <a href="{{ route('product_details', ['id' => $value->id]) }}">
                                            <div class="m-2"
                                                style="height: 120px; width: 90px;background-image: url({{ $value->image }}); background-size:contain;background-repeat: no-repeat;background-position: center;">
                                            </div>
                                        </a>

                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $value->name }}</h5>
                                            <p class="card-text"><small>{{ $value->country }}, {{ $value->category }}, {{ $value->tone }}%,
                                                    {{ $value->year }}</small>
                                            </p>
                                            <span class="fs-5">{{ number_format($value->price) }} đ</span>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <?php 
                                            if(session()->exists('cart.'.$value->id)){
                                               echo '<button type="button" class="btn disabled btn-sm btn-primary">Trong giỏ hàng</button>';
                                            }else {
                                        ?>
                                            <button type="button" onclick="addtocart({{ $value->id }}, this)"
                                                class="btn btn-sm btn-outline-primary" id="liveToastBtn">Thêm vào
                                                giỏ</button>
                                            <?php  
        
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    }
                         ?>
                    </div>
                </div>
            </div>

            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body"> Đã thêm vào giỏ</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <div class='d-grid gap-3'>
                {{-- <button type="button" class="btn btn-outline-primary btn-lg">Xem tiếp</button> --}}
                {!! $wineArray->links() !!}
            </div>
        </div>
    </div>
    @include('layout.footerbar')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
{{-- <script src="../resources/js/shop_js.js"></script> --}}
<script>
    function addtocart(id, btn) {
        console.log(btn);
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        //Bat su kien thay doi trang thai cuar request
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                // console.log(xhttp.responseText);
                if (JSON.parse(xhttp.responseText).arr1 == 'Tối đa 10 sản phẩm') {
                    arlet('Tối đa 10 sản phẩm');
                } else {
                    const toastLiveExample = document.getElementById('liveToast')
                    const toast = new bootstrap.Toast(toastLiveExample)
                    toast.show();
                    btn.innerText = "Trong giỏ hàng"
                    btn.classList.add('disabled')
                    btn.classList.add('btn-primary')
                    btn.classList.remove('btn-outline-primary')
                }
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


    function searchName() {
        let valuee = document.getElementById('search_name').value;
        // console.log(valuee);
        // let arr=getAllInput();
        if(valuee==''){
            alert('Yeu cau nhap ten san pham can tim !');
            return;
        }
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                console.log(xhttp.responseText);
                document.getElementById('show-product').innerHTML = JSON.parse(xhttp.responseText).arr1;
                document.getElementById('soluong').innerHTML = '(Có '+JSON.parse(xhttp.responseText).soluong+' sản phẩm)';

            }
        }
        //cau hinh request
        xhttp.open('GET', "./shop/search?search_name=" + valuee + "&page=1", true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send();
    }

    function search() {
        let arrcheckbok = [];
        let arrcountry = [];
        let arrbrand = [];
        let arrtone = [];


        var radioArr = document.querySelectorAll('.input-checkbox');
        var radioArr2 = document.querySelectorAll('.input-country');
        var radioArr3 = document.querySelectorAll('.input-brand');
        var radioArr4 = document.querySelectorAll('.input-tone');

        var firstprice = document.getElementById('first-price').value;
        var lastprice = document.getElementById('last-price').value;

        for (let i = 0; i < radioArr.length; i++) {
            if (radioArr[i].checked) {
                arrcheckbok.push(radioArr[i].value);
            }
        }
        for (let i = 0; i < radioArr2.length; i++) {
            if (radioArr2[i].checked) {
                arrcountry.push(radioArr2[i].value);
            }
        }
        for (let i = 0; i < radioArr3.length; i++) {
            if (radioArr3[i].checked) {
                arrbrand.push(radioArr3[i].value);
            }
        }
        for (let i = 0; i < radioArr4.length; i++) {
            if (radioArr4[i].checked) {
                arrtone.push(radioArr4[i].value);
            }
        }

        console.log(arrcheckbok,arrcountry, arrbrand, arrtone );
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                console.log(JSON.parse(this.responseText));
                document.getElementById('show-product').innerHTML = JSON.parse(xhttp.responseText).arr1;
                document.getElementById('soluong').innerHTML = '(Có '+(JSON.parse(xhttp.responseText).soluong+1)+' sản phẩm)';
            }
        }
        //cau hinh request
        xhttp.open('GET', "./shop/filter?search_checkbox=" + arrcheckbok +"&search_country=" + arrcountry + 
                                                                        "&search_brand=" + arrbrand +
                                                                        "&search_tone=" + arrtone +
                                                                        "&first_price=" + firstprice +
                                                                        "&last_price=" + lastprice +
        "&page=1", true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send();
    }
</script>

</html>
