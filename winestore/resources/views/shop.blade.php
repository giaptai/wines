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

        <div class='border-top'>
            <div class='d-flex flex-column mt-4 gx-5 sticky-top bg-light p-3 justify-content-between'>
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <button class="btn text-white fw-semibold rounded-0" type="button">
                                <span class="fw-semibold text-danger"> (Có <?php echo $table; ?> sản phẩm) </span>
                            </button>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." />
                            <button class="btn text-white" type="button" style="background-color: #bf0c2b"
                                onclick="searched(this.parentElement)">Tìm</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class='products mb-5 mt-4'> --}}
            <div class='products my-3 row'>

                <div class="collapse mt-3 show col-lg-3 col-md-12" id="collapseExample">
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
                                        <input class="form-check-input me-1" type="checkbox" value="Vang trắng"
                                            id="wine1">
                                        <label class="form-check-label" for="wine1">Vang trắng</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="checkbox" value="Vang đỏ"
                                            id="wine2">
                                        <label class="form-check-label" for="wine2">Vang đỏ</label>
                                    </li>

                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="checkbox" value="Vang ngọt"
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
                                    <input class="form-check-input me-1" type="radio" value="Pháp" name="country"
                                        id="country1">
                                    <label class="form-check-label" for="country1">Pháp</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input me-1" type="radio" value="Ý" name="country"
                                        id="country2">
                                    <label class="form-check-label" for="country2">Ý</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input me-1" type="radio" value="Chile" name="country"
                                        id="country3">
                                    <label class="form-check-label" for="country3">Chile</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Thương hiệu</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="list-group">
                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="gruaud-larose" name="brand"
                                            id="brand1">
                                        <label class="form-check-label" for="brand1">Gruaud-Larose</label>
                                    </li>

                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="lucente" name="brand"
                                            id="brand2">
                                        <label class="form-check-label" for="brand2">Lucente</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="concha-y-toro" name="brand"
                                            id="brand3">
                                        <label class="form-check-label" for="brand3">Concha Y Toro</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="urbina" name="brand"
                                            id="brand4">
                                        <label class="form-check-label" for="brand4">Urbina</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Nồng độ</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="list-group">
                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="11.5" name="nongdo"
                                            id="nongdo1">
                                        <label class="form-check-label" for="nongdo1">
                                            < 11.5%</label>
                                    </li>

                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="11.5-13.5" name="nongdo"
                                            id="nongdo2">
                                        <label class="form-check-label" for="nongdo2">11.5 - 13.5%</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="13.5-14" name="nongdo"
                                            id="nongdo3">
                                        <label class="form-check-label" for="nongdo3">13.5 - 14%</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input me-1" type="radio" value="14" name="nongdo"
                                            id="nongdo4">
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
                                        <input type="number" class="form-control" id="first-price" value="0">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="last-price" value="999999">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-outline-danger w-100" onclick="search()">Lọc sản
                                    phẩm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gy-2 row row-cols-lg-2 row-cols-md-2 row-cols-ms-1 col-lg-9">
                    <?php
                    $products = $wineArray;
                    // // kiem tra ton tai
                    // echo var_dump(session()->exists('cart.8'));

                    if (sizeof($products) > 0) {
                        foreach ($products as $key => $value) {
                    ?>
                    <div class="col px-1">
                        <div class="card rounded rounded-0 h-100 justify-content-center">
                            <div class="row g-0">
                                <div class="col-md-5 col-12 m-auto">
                                    <a href="{{ route('product_details', ['id' => $value->id]) }}">
                                        <img class="rounded mx-auto d-block" src="{{ $value->image }}" width="150"
                                            alt="..." style="object-fit: contain" /> </a>
                                </div>
                                <div class="col-md-7 col-12">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0">{{ $value->name }}</h5>
                                        <p class="card-text mb-1">
                                            <small>{{ $value->country }}, {{ $value->category }},
                                                {{ $value->year }}</small>
                                        </p>
                                        <p class="card-text">
                                            <b class="text-muted">{{ number_format($value->price) }} đ</b>
                                        </p>
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

            <div class="toast-container position-fixed bottom-0 end-0 p-3" >
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
<script src="../resources/js/shop_js.js"></script>

</html>
