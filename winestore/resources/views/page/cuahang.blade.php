@extends('home')
@section('content')
    <div class="container-md shadow my-4" style="width: 80%">


        <div class='d-flex flex-column mt-4 gx-5 sticky-top bg-white border p-3 justify-content-between'>
            <div class="row justify-content-between">
                <div class="col-md-5 ">
                    <div class="d-flex align-items-center">
                        <select class="form-select text-center" aria-label="Default select example" style="width: 11rem">
                            <option selected>-----Xếp theo------</option>
                            <option value="1">Giá thấp đến cao</option>
                            <option value="2">Giá cao đến thấp</option>
                        </select>
                        <span class="fw-semibold text-danger mx-2" id="soluong"> (Có <?php echo $paginate; ?> sản phẩm)
                        </span>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." id="search_name" />
                        <button class="btn text-white" type="button" style="background-color: #bf0c2b"
                            onclick="searchName()">Tìm</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class='products mb-5 mt-4'> --}}
        <div class='products my-3 row'>

            <div class="collapse show col-lg-3 col-md-12">
                <div class="d-flex align-items-center">
                    <button class="btn text-white fw-semibold px-4 rounded-0 w-100" type="button"
                        style="background-color: #bf0c2b">BỘ LỌC TÌM NHANH </button>
                </div>
                <form action="{{ route('filter_shop') }}" method="GET" id="formOk">
                    <div class="card card-body rounded-0 border-0">
                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Loại rượu</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="list-group ">
                                    <li class="form-check">
                                        <input class="input-checkbox form-check-input me-1" type="checkbox" value=""
                                            checked id="wine">
                                        <label class="form-check-label" for="wine">Tất cả</label>
                                    </li>

                                    @foreach ($categoryArray as $item)
                                        <li class="form-check">
                                            <input class="input-checkbox form-check-input me-1" type="checkbox"
                                                name="cat" value="{{ $item->id }}" id="wine{{ $item->id }}">
                                            <label class="form-check-label"
                                                for="wine{{ $item->id }}">{!! $item->name !!}</label>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Quốc gia</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-check">
                                    <input class="input-country form-check-input me-1" type="radio" value=""
                                        name="country" @checked(true) id="country">
                                    <label class="form-check-label" for="country">Tất cả</label>
                                </div>
                                @foreach ($countryArray as $item)
                                    <div class="form-check">
                                        <input class="input-country form-check-input me-1" type="radio"
                                            value="{{ $item->id }}" name="country" id="country{{ $item->id }}">
                                        <label class="form-check-label"
                                            for="country{{ $item->id }}">{!! $item->name !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Thương hiệu</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-check">
                                    <input class="input-brand form-check-input me-1" type="radio" value=""
                                        name="brand" @checked(true) id="brand">
                                    <label class="form-check-label" for="brand">Tất cả</label>
                                </div>
                                @foreach ($brandArray as $item)
                                    <div class="form-check">
                                        <input class="input-brand form-check-input me-1" type="radio"
                                            value="{{ $item->id }}" name="brand" id="brand{{ $item->id }}">
                                        <label class="form-check-label"
                                            for="brand{{ $item->id }}">{!! $item->name !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Nồng độ</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="list-group">
                                    <li class="form-check">
                                        <input class="input-tone form-check-input me-1" type="radio" value="0-100"
                                            @checked(true) name="nongdo" id="nongdo">
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
                                        <input class="input-tone form-check-input me-1" type="radio" value="11.5-13.49"
                                            name="nongdo" id="nongdo2">
                                        <label class="form-check-label" for="nongdo2">11.5 - 13.5%</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="input-tone form-check-input me-1" type="radio" value="13.5-13.9"
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
                                        <input type="number" class="form-control" id="first-price" placeholder="0"
                                            value="">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="last-price"
                                            placeholder="999999999" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button name="btn-submit" type="button" class="btn-submit btn btn-outline-danger w-100"
                                    onclick="filter()">Lọc sản phẩm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-9">
                <div class="row row-cols-1 row-cols-md-2 g-3" id="show-product">
                    @foreach ($wineArray as $item)
                        <div class="col">
                            <div class="card h-100 rounded-0" style="">
                                <div class="row g-0">
                                    <div class="col-md-4 col-sm-12">
                                        {{-- <a href="{{ route('product_details', ['id'=>$item->id]) }}">
                                        <img width="115" src="{{ $item->image }}" class="img-fluid rounded-end"
                                        alt="...">
                                    </a> --}}
                                        <a href="{{ route('product_details', ['id' => $item->id]) }}">
                                            <div class="m-2"
                                                style="height: 120px; width: 90px;background-image: url({{ $item->image }}); background-size:contain;background-repeat: no-repeat;background-position: center;">
                                            </div>
                                        </a>

                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <span class="fs-5">{{ number_format($item->price) }} đ</span>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            @if (session()->exists('cart.' . $item->id))
                                                <button type="button" class="btn disabled btn-sm btn-primary">Trong giỏ
                                                    hàng</button>
                                            @else
                                                <button type="button" onclick="addtocart({{ $item->id }})"
                                                    class="btn btn-sm btn-outline-primary"
                                                    id="btn{{ $item->id }}">Thêm
                                                    vào giỏ</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="col-md-12 my-3">
                    <ul class="pagination pagination-sm justify-content-end" id="phantrang">

                        {{-- @for ($i = 0; $i < ceil($paginate / 12); $i++)
                            @if ($i == 0)
                                <li class="page-item"><a class="page-link active">{!! ($i + 1) !!}</a></li>
                            @else
                            <li class="page-item"><a class="page-link" onclick="phantrang({!! ($i + 1) !!})">{!! ($i + 1) !!}</a></li>
                            @endif
                        @endfor --}}
                        <?php
                        for ($i = 0; $i < ceil($paginate / 12); $i++) {
                            if ($i == 0) {
                                echo '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>

        </div>

        {{-- </div> --}}
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">Đã thêm vào giỏ</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        data-bs-delay='{"show":0,"hide":150}' aria-label="Close"></button>
                </div>
            </div>
        </div>

    </div>


    <script>
        function addtocart(id) {
            let btn = document.getElementById('btn' + id);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    btn.innerText = "Trong giỏ hàng"
                    btn.classList.add('disabled')
                    btn.classList.add('btn-primary')
                    btn.classList.remove('btn-outline-primary')
                    const toastLiveExample = document.getElementById('liveToast')
                    const toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()
                }
            };
            xhttp.open("POST", '/store-to-cart/' + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }

        // document.querySelector('.btn-submit').addEventListener("click",(event)=>{
        //     event.preventDefault();
        //     console.log(formOk.submit());
        // });

        function filter(id) {
            let btn = document.getElementById('btn' + id);
            let arr = [];
            let arr2 = [];
            let arr3 = [];
            let arr4 = [];

            var chbox = document.querySelectorAll('.input-checkbox');
            var country = document.querySelectorAll('.input-country');
            var brand = document.querySelectorAll('.input-brand');
            var tone = document.querySelectorAll('.input-tone');

            var firstprice = document.getElementById('first-price').value;
            var lastprice = document.getElementById('last-price').value;


            for (var i = 0; i < chbox.length; i++) {
                if (chbox[i].checked) {
                    // arr.push(chbox[i].id.replace('wine', ''));
                    arr.push(chbox[i].value);

                }
            }

            for (var i = 0; i < country.length; i++) {
                if (country[i].checked) {
                    arr2.push(country[i].value);

                }
            }

            for (var i = 0; i < brand.length; i++) {
                if (brand[i].checked) {
                    arr3.push(brand[i].value);

                }
            }

            for (var i = 0; i < tone.length; i++) {
                if (tone[i].checked) {
                    arr4.push(tone[i].value);

                }
            }
            console.log('ok:=' + arr4);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(JSON.parse(this.responseText));
                    // console.log(this.responseText);

                    document.getElementById('show-product').innerHTML = JSON.parse(this.responseText).showproduct;
                    document.getElementById('phantrang').innerHTML = JSON.parse(this.responseText).pagin;

                }
            };
            xhttp.open(formOk.method, '/shop/filter?arr=' + arr +
                '&arr2=' + arr2 +
                '&arr3=' + arr3 +
                '&arr4=' + arr4 +
                '&firstprice=' + firstprice +
                '&lastprice=' + lastprice,
                true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }
    </script>
@endsection