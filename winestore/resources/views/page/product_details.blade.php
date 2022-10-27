@extends('home')
@section('content')
    <div class="container-md mt-4 mb-4" style="width: 80%">
        <div class="details">
            <h3 class="border-bottom">Chi tiết sản phẩm 
            </h3>
            {{-- {!! $wineDetail !!} --}}
            <div class="row row-cols-md-3 row-cols-1 g-3 border-bottom">
                <div class="col-md-3">
                    <span class="fw-bold">Loại: </span>
                    <p class=""><?php echo $wineDetail['category'][0]['name']; ?></p>
                    <hr>
                    <span class="fw-bold">Quốc gia: </span>
                    <p class=""><?php echo $wineDetail['origin'][0]['name']; ?></p>
                    <hr>
                    <span class="fw-bold">Thương hiệu: </span>
                    <p class=""><?php echo $wineDetail['brand'][0]['name']; ?></p>
                    <hr>
                    <span class="fw-bold">Nồng độ: </span>
                    <p class=""><?php echo $wineDetail['c']; ?> %</p>
                    <hr>
                    <span class="fw-bold">Năm: </span>
                    <p class=""><?php echo $wineDetail['year']; ?></p>

                </div>
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail p-3" src="https://random.imagecdn.app/330/360
                    {{-- <?php echo $winedetail->image; ?> --}}
                    " alt="description of image">
                </div>
                <div class="col-md-5">
                    <div class="mota">
                        <h3><?php echo $wineDetail['name']; ?></h3>
                        <p class="fs-4 fw-bolder"><?php echo number_format( $wineDetail['price']); ?> đ</p>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo  $wineDetail['description']; ?></p>
                    </div>
                    <button class="btn btn-outline-primary rounded-0">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
