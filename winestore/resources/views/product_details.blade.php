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
        <div class="details">
            <h3 class="pt-4 border-bottom">Chi tiết sản phẩm <?php
            if(!isset($winedetail)){
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
            <div class="row row-cols-2 row-cols-md-4 mb-3 justify-content-between text-center mt-3">
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body bg-light">
                            <h1 class="card-text"><i class="bi bi-emoji-laughing" style="font-size: 100px"></i></h1>
                            <p class="card-text">Nhiều năm kinh nghiệm trong lĩnh vực nhập khẩu, 
                                phân phối rượu vang cùng kiến thức sản phẩm chuyên sâu, 
                                cam kết mang đến Quý Khách hàng sự hài lòng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body bg-light">
                            <h1 class="card-title"><i class="bi bi-coin" style="font-size: 100px"></i></h1>
                            <p class="card-text">Giá thành sản phẩm được tính toán, so sánh với thị trường để đảm bảo lợi ích của Quý Khách hàng 
                                và giá trị thật của từng sản phẩm rượu vang tuyệt hảo.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body bg-light">  
                            <h1 class="card-title"><i class="bi bi-patch-check" style="font-size: 100px"></i></h1>
                            <p class="card-text">Cam kết ượu vang chất lượng quý khách được trả hoặc đổi nếu không hài lòng về chất lượng sản phẩm, dịch vụ của chúng tôi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body bg-light">
                            <h1 class="card-title"><i class="bi bi-telephone-outbound" style="font-size: 100px"></i></h1>
                            <p class="card-text">Quý Khách hàng có thể liên hệ qua tất cả các kênh: Website, Facebook, Zalo, Hotline,… TM Wine sẵn sàng phục vụ bạn bất kể khi nào bạn có nhu cầu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footerbar')
</body>

</html>
