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

    <div class="container-md" style="width: 80%">
        <div class="CarouselFade mt-3">
            <div class="carousel slide carousel-fade carousel-dark">
                <div class="carousel-indicators"><button type="button" data-bs-target="" aria-label="Slide 1"
                        aria-current="true" class="active"></button><button type="button" data-bs-target=""
                        aria-label="Slide 2" aria-current="false"></button></div>
                <div class="carousel-inner">
                    <div class="h-90 active carousel-item"><img class="d-block w-100"
                            src="https://finewinestore.vn/img/z2864642542458_ffae5b098813a055ee258bb88c3878cb-385-1.jpg"
                            alt="Second slide">
                        <div class="carousel-caption">
                            <h3>Second slide label</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item"><img class="d-block w-100"
                            src="https://finewinestore.vn/img/homepage-min-386-1.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h3>Third slide label</h3>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div><a class="carousel-control-prev" role="button" tabindex="0" href="#"><span
                        aria-hidden="true" class="carousel-control-prev-icon"></span><span
                        class="visually-hidden">Previous</span></a><a class="carousel-control-next" role="button"
                    tabindex="0" href="#"><span aria-hidden="true"
                        class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
            </div>
        </div>
        <div class="suggetsforu border-top">
            <div class="align-items-center justify-content-evenly row row-cols-md-1 row-cols-1 pt-3">
                {{-- <h2 class="col-md-auto text-center">Thể loại rượu</h2> --}}
                <div class="d-flex align-items-center justify-content-center text-center mt-3 mb-3">
                    <hr class="col-md-5" />
                    <span class="border p-1 col-md-2 fs-3 fw-semibold">Thể loại rượu</span>
                    <hr class="col-md-5" />
                </div>
                <div class="cd-flex">
                    <div class="row row-cols-md-3 row-cols-2 p-3">
                        <div class="text-center col">
                            <figure class="figure m-0"><img
                                    src="https://tmwine.vn/wp-content/uploads/2022/01/vang-do-2-min.jpg"
                                    class="figure-img" width="220" alt="...">
                                <figcaption class="figure-caption text-center fw-semibold fs-4">Vang đỏ</figcaption>
                            </figure>
                        </div>
                        <div class="text-center col">
                            <figure class="figure m-0"><img
                                    src="https://tmwine.vn/wp-content/uploads/2022/01/Vang-Trang-3-min.jpg"
                                    class="figure-img " width="220" alt="...">
                                <figcaption class="figure-caption text-center fw-semibold fs-4">Vang trắng</figcaption>
                            </figure>
                        </div>
                        <div class="text-center col">
                            <figure class="figure m-0"><img
                                    src="https://tmwine.vn/wp-content/uploads/2022/01/vang-sui-2-min.jpg"
                                    class="figure-img" width="220" alt="...">
                                <figcaption class="figure-caption text-center fw-semibold fs-4">Champange</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 mb-3">
                <div class="d-flex align-items-center justify-content-center text-center p-0">
                    <hr class="col-5" />
                    <span class="border p-1 col-md-2 fs-3 fw-semibold">Sản phẩm</span>
                    <hr class="col-5" />
                </div>
            </div>
            <div class="g-0 row row-cols-md-4 row-cols-sm-2 row-cols-1">
                @php
                    for ($i = 0; $i < 8; $i++) {
                        echo '<div class="col">
                        <div class="p-2 card m-3 border-0 h-90">
                            <img class="card-img mx-auto d-block"
                                src="https://tmwine.vn/wp-content/uploads/2020/10/TMWine-San-pham-34-300x300.jpg"
                                style="object-fit: cover; width: 12rem; height: 13rem;">
                            <div class="card-body">
                                <div class="card-title h6">Wine Quinta das Arcas, Conde Villar Rose, 2019</div>
                                <small class="mb-2 card-text text-muted">Ý, Vang đỏ, Papale Primitivo di Manduria</small>
                                <p class="card-text fw-bold">12, 000, 000 đ</p>
                                <span class="btn btn-outline-primary btn-sm rounded-0 m-0">Thêm vào giỏ</span>                
                            </div>
                        </div>
                    </div>';
                    }
                @endphp
            </div>
            <div class="introduces row row-cols-md-1 row-cols-1 justify-content-evenly p-3">
                <div class="mt-3 mb-3">
                    <div class="d-flex align-items-center justify-content-center text-center p-0">
                        <hr class="col-md-4" />
                        <span class="border p-1 col-md-4 fs-3 fw-semibold">Về LuxuryWine Flix</span>
                        <hr class="col-md-4" />
                    </div>
                </div>
                <div class="introducesText col-md-7 mb-2">

                    <span class="lh-lg">Thương hiệu Winemart được thành lập vào năm
                        2015 với mục tiêu đem lại cho người tiêu dùng những dịch vụ và sản phẩm tốt nhất. Winemart
                        chuyên cung cấp các loại rượu vang, rượu mạnh, bia nhập khẩu cùng với các loại thực phẩm cao
                        cấp khác như Chocolate, trà, cà phê, mứt, trái cây sấy khô,… từ các nhãn hiệu cao cấp, thiết
                        kế riêng phục vụ từng đối tượng khách hàng.
                    </span>
                </div>
                <div class="introducesImg col-md-4"><img class="card-img-top"
                        src="https://www.itourvn.com/images/easyblog_articles/644/b2ap3_large_buy-wine-hcm-cover.jpg">
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-4 mb-3 justify-content-between text-center m-3 shadow-sm">
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <h1 class="card-text"><i class="bi bi-emoji-laughing" style="font-size: 80px"></i></h1>
                            <p class="card-text">Nhiều năm kinh nghiệm trong lĩnh vực nhập khẩu,
                                phân phối rượu vang cùng kiến thức sản phẩm chuyên sâu,
                                cam kết mang đến Quý Khách hàng sự hài lòng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <h1 class="card-title"><i class="bi bi-coin" style="font-size: 80px"></i></h1>
                            <p class="card-text">Giá thành sản phẩm được tính toán, so sánh với thị trường để đảm bảo
                                lợi ích của Quý Khách hàng
                                và giá trị thật của từng sản phẩm rượu vang tuyệt hảo.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <h1 class="card-title"><i class="bi bi-patch-check" style="font-size: 80px"></i></h1>
                            <p class="card-text">Cam kết ượu vang chất lượng quý khách được trả hoặc đổi nếu
                                không hài lòng về chất lượng sản phẩm, dịch vụ của chúng tôi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <h1 class="card-title"><i class="bi bi-telephone-outbound" style="font-size: 80px"></i>
                            </h1>
                            <p class="card-text">Quý Khách hàng có thể liên hệ qua tất cả các kênh: Website, Facebook,
                                Zalo, Hotline,… TM Wine sẵn sàng phục vụ bạn bất kể khi nào bạn có nhu cầu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    @include('layout.footerbar')
</body>

</html>
