@extends('home')
@section('content')
    <div class="container-md shadow my-4" style="width: 80%">
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
                                @foreach ($countryArray as $item)
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
                                @foreach ($brandArray as $item)
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
                                            placeholder="0" value="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-sm" id="last-price"
                                            placeholder="999999999" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button name="btn-submit" type="button" class="btn-submit btn btn-outline-danger w-100"
                                    onclick="filter()">Lọc sản phẩm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- Show sản phẩm --}}
            <div class="col-lg-9" id="show-product">
                <div class="d-flex flex-column mb-3 gx-5 sticky-top bg-white border p-3 justify-content-between">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <select id="dispose" class="form-select form-select-sm text-center"
                                aria-label="Default select example" style="width: 11rem">
                                <option selected="" value="">-----Xếp theo------</option>
                                <option value="ASC">Giá thấp đến cao</option>
                                <option value="DESC">Giá cao đến thấp</option>
                            </select>
                        </div>
                        <div class="col-md-auto">
                            <span class="fw-semibold text-danger mx-2" id="soluong"> (Có {!! $paginate !!} sản phẩm)</span>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @foreach ($wineArray as $item)
                        <div class="col">
                            <div class="card h-100 rounded-0" style="">
                                <div class="row g-0">
                                    <div class="col-md-4 col-sm-12">
                                        <a href="{{ route('product_details', ['id' => $item['id']]) }}">
                                            <div class="m-2"
                                                style="height: 120px; width: 90px;background-image: url({{ $item['images'] }}); background-size:contain;background-repeat: no-repeat;background-position: center;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item['name'] }}</h5>
                                            <span class="fs-5">{{ number_format($item['price']) }} đ</span>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            @if (session()->exists('cart.' . $item['id']))
                                                <button type="button" class="btn disabled btn-sm btn-primary">Trong giỏ
                                                    hàng</button>
                                            @else
                                                <button type="button" onclick="addtocart({{ $item['id'] }})"
                                                    class="btn btn-sm btn-outline-primary"
                                                    id="btn{{ $item['id'] }}">Thêm vào giỏ</button>
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
                        @for ($i = 0; $i < ceil($paginate / 15); $i++)
                            @if ($i == $currentpage - 1)
                                <li class="page-item"><a class="page-link active">{!! ($i + 1) !!}</a></li>
                            @else
                            <li class="page-item"><a class="page-link" onclick="phantrang({!! ($i + 1) !!})">{!! ($i + 1) !!}</a></li>
                            @endif
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="{{ url('./js/cuahang.js') }}"></script>
@endsection
