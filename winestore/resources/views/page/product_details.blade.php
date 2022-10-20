@extends('home')
@section('content')
    <div class="container-md mt-4 mb-4" style="width: 80%">
        <div class="details">
            <h3 class="border-bottom">Chi tiết sản phẩm <?php
            if (!isset($winedetail)) {
                die();
            }
            ?>
            </h3>
            <div class="row row-cols-md-3 row-cols-1 g-3 border-bottom">
                <div class="col-md-3">
                    <span class="fw-bold">Quốc gia: </span>
                    <p class=""><?php echo $winedetail->country; ?></p>
                    <hr>
                    <span class="fw-bold">Thương hiệu: </span>
                    <p class=""><?php echo $winedetail->brand; ?></p>
                    <hr>
                    <span class="fw-bold">Loại: </span>
                    <p class=""><?php echo $winedetail->category; ?></p>
                    <hr>
                    <span class="fw-bold">Nồng độ: </span>
                    <p class=""><?php echo $winedetail->tone; ?> %</p>
                    <hr>
                    <span class="fw-bold">Năm: </span>
                    <p class=""><?php echo $winedetail->year; ?></p>

                </div>
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail p-4" src="<?php echo $winedetail->image; ?>" alt="description of image">
                </div>
                <div class="col-md-5">
                    <div class="mota">
                        <h3><?php echo $winedetail->name; ?></h3>
                        <p class="fs-4 fw-bolder"><?php echo number_format($winedetail->price); ?> đ</p>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $winedetail->description; ?></p>
                    </div>
                    <button class="btn btn-outline-primary rounded-0">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
