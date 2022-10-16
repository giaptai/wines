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
    <div class="container" style="width: 80%">
        <ul class="nav justify-content-end bg-light mb-5">
            <li class="nav-item">
                <a class="nav-link active fs-5" aria-current="page" href="{{ route('products') }}">Quay lại</a>
            </li>
        </ul>
        <form method="get" action="{{ route('add-product-add') }}"
            class="row justify-content-center shadow p-5 mb-5 bg-body rounded justify-content-between">
            <div class="col-md-5">
                <div class="col-md-auto border" style="height: 18rem;">
                    <img src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                        id="img-product" class="rounded mx-auto d-block m-5" alt="..." width="auto"
                        height="200" style="object-fit: cover;">
                </div>
                <div class="col-md-auto">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="iptIMG" name="iptIMG" onchange="uploadd()">
                    </div>
                </div>
                <div class="row col-md-auto">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">

                            <input type="number" class="form-control" name="id-product"
                                value="@php echo rand(1, 6554) @endphp" id="id-product">

                            <label for="floatingInput">Mã sản phẩm</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name-product" id="name-product"
                                value="<?php
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $charactersLength = strlen($characters);
                                $randomString = '';
                                for ($i = 0; $i < 15; $i++) {
                                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                                }
                                echo $randomString;
                                ?>">
                            <label for="floatingInput">Tên sản phẩm</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h2>Thêm sản phẩm</h2>
                <hr>
                <div class="col-md-auto">
                    <div class="mb-3">
                        <label class="form-label">Giới thiệu:</label>
                        <textarea style="height: 180px" class="form-control" aria-label="With textarea" id="intro-product" name="intro-product">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                        </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Loại rượu:</label>
                            <select class="form-select" id="category-product" name="category-product">
                                <option value="Zippo Armor">Vang đỏ</option>
                                <option value="Zippo Armor">Vang trắng</option>
                                <option value="Zippo Armor">Champange</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3"><label for="exampleInputPassword1" class="form-label">Thương
                                hiệu:</label>
                            <select class="form-select" id="brand-product" name="brand-product">
                                <option value="Château-Gruaud-Larose">Château Gruaud-Larose</option>
                                <option value="Hennessy">Hennessy</option>
                                <option value="Lucente">Lucente</option>
                                <option value="Urbina">Urbina</option>
                                <option value="San_Marzano">San Marzano</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Quốc gia:</label>
                            <select class="form-select" id="country-product" name="country-product">
                                <option value="phap">Pháp</option>
                                <option value="y">Ý</option>
                                <option value="tay_ban_nha">Tây Ban Nha</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class=" mb-3">
                            <label for="" class="form-label">Số lượng:</label>
                            <input type="number" class="form-control" value="<?php echo rand(1, 99); ?>"
                                id="number-product" name="number-product">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" mb-3">
                            <label for="" class="form-label">Nồng độ:</label>
                            <input type="number" class="form-control" value="<?php echo rand(5, 20); ?>" id="tone-product"
                                name="tone-product">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" mb-3">
                            <label for="" class="form-label">Năm:</label>
                            <input type="number" class="form-control" value="<?php echo date('Y'); ?>" id="year-product"
                                name="year-product">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Giá:</label>
                            <input type="number" class="form-control" value="<?php echo rand(500000, 36000000); ?>"
                                id="price-product" name="price-product">
                        </div>
                    </div>
                </div>
                <div class="row" style="float: right;">
                    <div class="col-md-auto">
                        <a class="btn btn-secondary mx-3">Quay lại </a>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="mt-4">
        @include('layout.footer_mn')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script>
    function uploadd() {
        var s = document.getElementById("iptIMG");
        console.log(s);
        var ss = s.value.replace(/C:\\fakepath\\/, '');
        console.log(document.getElementById("img-product").src);
        document.getElementById("img-product").src =
            "https://ladofoods.vn/wp-content/uploads/2018/10/Vang-Excellence-White-Wine-2.png";
    }

    // function add() {
    //     var p1 = document.getElementById("id-product").value;
    //     var p2 = document.getElementById("name-product").value;
    //     var p3 = document.getElementById("intro-product").value;
    //     var p4 = document.getElementById("category-product").value;
    //     var p5 = document.getElementById("brand-product").value;
    //     var p6 = document.getElementById("country-product").value;
    //     var p7 = document.getElementById("number-product").value;
    //     var p8 = document.getElementById("price-product").value;
    //     console.log(p1, p2, p3, p4, p5, p6, p7, p8);
    // }
</script>


</html>
