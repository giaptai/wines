@extends('home')
@section('content')
<div class="container-md shadow my-4" style="width: 80%">


        <div class='d-flex flex-column mt-4 gx-5 sticky-top bg-white border p-3 justify-content-between'>
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

            <div class="collapse show col-lg-3 col-md-12">
                <div class="d-flex align-items-center">
                    <button class="btn text-white fw-semibold px-4 rounded-0 w-100" type="button" style="background-color: #bf0c2b">BỘ LỌC TÌM NHANH </button>
                </div>

                <div class="card card-body rounded-0 border-0">
                    <div class="mb-3">
                        <label for="inputEmail3" class="col-sm-12 col-form-label fw-bold">Loại rượu</label>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="list-group ">
                                <li class="form-check">
                                    <input class="input-checkbox form-check-input me-1" type="checkbox" value="" checked
                                        id="wine">
                                    <label class="form-check-label" for="wine">Tất cả</label>
                                </li>
                                <?php
                                foreach($categoryArray as $value){
                                    echo '
                                    <li class="form-check">
                                    <input class="input-checkbox form-check-input me-1" type="checkbox" value="'.$value->name.'"
                                        id="wine'.$value->id.'">
                                    <label class="form-check-label" for="wine'.$value->id.'">'.$value->name.'</label>
                                </li>
                                    ';
                                }
                                ?>
                          
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
                                    id="brand">
                                <label class="form-check-label" for="brand">Tất cả</label>
                            </div>
                            <?php
                                $i=1;
                                foreach($brandArray as $value){
                                    echo '
                                    <div class="form-check">
                                <input class="input-brand form-check-input me-1" type="radio" value="'.$value->name.'" name="brand" 
                                    id="brand'.$value->id.'">
                                <label class="form-check-label" for="brand'.$value->id.'">'.$value->name.'</label>
                            </div>';
                                }
                            ?>
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
                                    <div class="card-footer bg-white border-0">
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
    {{-- </div> --}}
</div>
@endsection