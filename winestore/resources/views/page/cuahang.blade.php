@extends('home')
@section('content')
    @if (app('request')->all() == null)
        <?php
        $Wines = Http::get('http://127.0.0.1:8001/api/v1/products');
        ?>
    @else
        @php
            $collection = app('request')->input('arr') == null ? '' : '[' . app('request')->input('arr') . ']'; // category
            $collection2 = app('request')->input('arr2') == null ? '' : '[' . app('request')->input('arr2') . ']'; //country
            $collection3 = app('request')->input('arr3') == null ? '' : '[' . app('request')->input('arr3') . ']'; //brand
            $collection4 = '[' . str_replace('-', ',', app('request')->input('arr4')) . ']'; //tone
            $firstprice = app('request')->input('firstprice') == null ? 0 : app('request')->input('firstprice'); //first-price
            $lastprice = app('request')->input('lastprice') == null ? 9999999999 : app('request')->input('lastprice'); //first-price
            $price = '[' . $firstprice . ',' . $lastprice . ']';
            $page = app('request')->input('page') == null ? 1 : app('request')->input('page'); //page
            $dispose = app('request')->input('dispose') == null ? 'ASC' : app('request')->input('dispose'); //ASC - DESC
            $url = 'cateId[in]=' . $collection . '&originId[in]=' . $collection2 . '&brandId[in]=' . $collection3 . '&price[between]=' . $price . '&c[between]=' . $collection4 . '&price[sort]=' . $dispose . '&page=' . $page . '';
            $Wines = Http::get('http://127.0.0.1:8001/api/v1/products?' . $url);
        @endphp
    @endif

    <div class="container-md shadow my-4" style="width: 80%">
        <div class='products my-3 row'>
            <div class="collapse show col-lg-3 col-md-12" style="font-size: 14px">
                <div class="d-flex align-items-center">
                    <button class="btn text-white fw-semibold rounded-0 w-100" type="button"
                        style="background-color: #bf0c2b">LỌC SẢN PHẨM </button>
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

                                    @foreach ($categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'] as $item)
                                        <li class="form-check">
                                            <input class="input-checkbox form-check-input me-1" type="checkbox"
                                                name="cat" value="{{ $item['id'] }}" id="wine{{ $item['id'] }}">
                                            <label class="form-check-label"
                                                for="wine{{ $item['id'] }}">{!! $item['name'] !!}</label>
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
                                        name="country" checked id="country">
                                    <label class="form-check-label" for="country">Tất cả</label>
                                </div>
                                @foreach ($countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'] as $item)
                                    <div class="form-check">
                                        <input class="input-country form-check-input me-1" type="radio"
                                            value="{{ $item['id'] }}" name="country" id="country{{ $item['id'] }}">
                                        <label class="form-check-label"
                                            for="country{{ $item['id'] }}">{!! $item['name'] !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Thương hiệu</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-check">
                                    <input class="input-brand form-check-input me-1" type="radio" value=""
                                        name="brand" checked id="brand">
                                    <label class="form-check-label" for="brand">Tất cả</label>
                                </div>
                                @foreach ($brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'] as $item)
                                    <div class="form-check">
                                        <input class="input-brand form-check-input me-1" type="radio"
                                            value="{{ $item['id'] }}" name="brand" id="brand{{ $item['id'] }}">
                                        <label class="form-check-label"
                                            for="brand{{ $item['id'] }}">{!! $item['name'] !!}</label>
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
                                            checked name="nongdo" id="nongdo">
                                        <label class="form-check-label" for="nongdo">Tất cả</label>
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

                        <div class="mb-2">
                            <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Giá</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-sm" id="first-price"
                                            min="0" max="999999999" step="1" placeholder="0"
                                            value="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-sm" id="last-price"
                                            min="1" max="999999999" step="1" placeholder="999999999"
                                            value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button name="btn-submit" type="button"
                                    class="btn-submit btn btn-outline-danger rounded-0 w-100" onclick="filter()">Lọc sản
                                    phẩm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- Show sản phẩm --}}
            <div class="col-lg-9" id="show-product">
                @include('dynamic_layout.tableshop')
            </div>
        </div>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">Thêm vào giỏ thành công</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('./js/cuahang.js') }}"></script>
@endsection
