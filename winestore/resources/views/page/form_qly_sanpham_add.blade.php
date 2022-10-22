{{-- @extends('page.quanly_sanpham')
@section('content-them') --}}
<div class="p-5">
    <form method="get" action="{{ route('add-product-add') }}"
        class="row justify-content-center shadow p-5 bg-body rounded justify-content-between">
        <div class="col-md-5">
            <div class="col-md-auto mb-3 border" style="height: 20rem;">
                <img src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                    id="img-product" class="rounded mx-auto d-block m-5" alt="..." width="auto" height="200"
                    style="object-fit: contain;">
            </div>
            <div class="col-md-auto">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="iptIMG" name="iptIMG" onchange="uploadd()">
                </div>
            </div>

            <div class="col-md-auto">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">URL</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
            </div>

            <div class="row col-md-auto">
                <div class="col-md-4">
                    <div class="form-floating mb-3">

                        <input type="number" class="form-control" name="id-product" disabled
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
                    <textarea style="height: 15rem" class="form-control" aria-label="With textarea" id="intro-product" name="intro-product">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Loại rượu:</label>
                        <select class="form-select" id="category-product" name="category-product">
                            @foreach ($categoryArray as $item)
                                <option value="{!! $item->id !!}">{!! $item->name !!} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3"><label for="exampleInputPassword1" class="form-label">Thương
                            hiệu:</label>
                        <select class="form-select" id="brand-product" name="brand-product">
                            @foreach ($brandArray as $item)
                                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quốc gia:</label>
                        <select class="form-select" id="country-product" name="country-product">
                            @foreach ($countryArray as $item)
                                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class=" mb-3">
                        <label for="" class="form-label">Số lượng:</label>
                        <input type="number" class="form-control" value="<?php echo rand(1, 99); ?>" id="number-product"
                            name="number-product">
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
                        <input type="number" class="form-control" value="<?php echo rand(500000, 36000000); ?>" id="price-product"
                            name="price-product">
                    </div>
                </div>
            </div>
            <div class="row" style="float: right;">
                <div class="col-md-auto">
                    <a class="btn btn-secondary mx-3" href="{{ route('products') }}">Quay lại </a>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- @endsection --}}
