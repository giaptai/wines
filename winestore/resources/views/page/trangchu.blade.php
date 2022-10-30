@extends('home')
@section('content')
    <div class="CarouselFade">

        <div class="carousel slide carousel-fade carousel-dark">
            <div class="carousel-indicators"><button type="button" data-bs-target="" aria-label="Slide 1" aria-current="true"
                    class="active"></button><button type="button" data-bs-target="" aria-label="Slide 2"
                    aria-current="false"></button></div>
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
            </div><a class="carousel-control-prev" role="button" tabindex="0" href="#"><span aria-hidden="true"
                    class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a
                class="carousel-control-next" role="button" tabindex="0" href="#"><span aria-hidden="true"
                    class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
        </div>
    </div>
    <div class="container-md" style="width: 80%">

        <div class="suggetsforu border-top">
            <div class="align-items-center justify-content-evenly row row-cols-md-1 row-cols-1 pt-3">
                {{-- <h2 class="col-md-auto text-center">Thể loại rượu</h2> --}}
                <div class="d-flex align-items-center justify-content-center text-center mt-3 mb-3">
                    <hr class="col-md-5" />
                    <span class="border border-dark p-1 col-md-2 fs-3 fw-semibold">Thể loại rượu</span>
                    <hr class="col-md-5" />
                </div>

                <div class="row row-cols-1 row-cols-lg-3 gy-2 align-items-stretch">
                    <div class="col">
                        <div class="card h-100  text-bg-dark rounded-4 shadow-lg"
                            style="background-image: url('https://ruouvang24h.vn/wp-content/uploads/2020/07/Top-10-Chai-R%C6%B0%E1%BB%A3u-Vang-%C4%90%E1%BB%8F.jpg');background-size: 100% 100%; background-repeat: no-repeat; background-position: center; min-height: 234px;">
                            <div class="d-flex h-100 p-5  text-white text-shadow-1 align-items-center align-self-center">
                                <h3 class="display-6 lh-1 fw-bold"> {!! $categoryArray[0]['name'] !!}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100  text-bg-dark rounded-4 shadow-lg"
                            style="background-image: url('https://besthqwallpapers.com/Uploads/17-5-2020/133048/thumb2-glass-of-white-wine-wine-concepts-white-wine-black-background-wine.jpg'); background-size: 100% 100%; background-position: center; min-height: 234px;">
                            <div class="d-flex h-100 p-5  text-white text-shadow-1 align-items-center align-self-center">
                                <h3 class="display-6 lh-1 fw-bold"> {!! $categoryArray[1]['name'] !!}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100  text-bg-dark rounded-4 shadow-lg"
                            style="background-image: url('https://img.freepik.com/premium-photo/top-view-wine-bottle-with-slate-background_23-2148243150.jpg'); background-size: 100% 100%; background-position: center;min-height: 234px;">
                            <div class="d-flex h-100 p-5  text-white text-shadow-1 align-items-center align-self-center">
                                <h3 class="display-6 lh-1 fw-bold"> {!! $categoryArray[2]['name'] !!}</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-4 mb-4">
                <div class="d-flex align-items-center justify-content-center text-center p-0">
                    <hr class="col-5" />
                    <span class="border border-dark p-1 col-md-2 fs-3 fw-semibold">Tìm hiểu</span>
                    <hr class="col-5" />
                </div>
            </div>
            <div class="g-0 row row-cols-md-2 row-cols-sm-1 row-cols-1 gy-2">
                {{-- @php
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
            @endphp --}}

                <div class="col col-md-6 bg-dark pt-3 pt-md-5 px-md-5 text-center text-white"
                    style="background-size: cover;
background-image: url('https://images.fineartamerica.com/images/artworkimages/mediumlarge/2/red-wine-on-a-dark-background-maryana-kankulova.jpg');
">
                    <div class="my-3 py-3">
                        <h2 class="display-5">{!! $brandArray[0]['name'] !!}</h2>
                        <p class="lead">{!! $brandArray[0]['description'] !!}</p>
                    </div>
                    <div class="shadow-sm mx-auto" style="width: 80%; height: 8rem;">
                        <button class="btn btn-outline-light">Tìm hiểu thêm</button>
                    </div>
                </div>
                <div class="col col-md-6 bg-dark pt-3 pt-md-5 px-md-5 text-center text-white "
                    style="background-size: cover;
background-image: url('https://images.unsplash.com/photo-1606767208159-1a5fb0a87841?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8d2hpdGUlMjB3aW5lfGVufDB8fDB8fA%3D%3D&w=1000&q=80');
">
                    <div class="my-3 py-3">
                        <h2 class="display-5">{!! $brandArray[1]['name'] !!}</h2>
                        <p class="lead">{!! $brandArray[1]['description'] !!}</p>
                    </div>
                    <div class="shadow-sm mx-auto" style="width: 80%; height: 8rem;">
                        <button class="btn btn-outline-light">Tìm hiểu thêm</button>

                    </div>
                </div>
                <div class="col col-md-12 bg-dark pt-3 pt-md-5 px-md-5 text-center text-white "
                    style="background-size: 100% 100%; background-repeat: no-repeat;
                            background-image: url('https://as1.ftcdn.net/v2/jpg/04/65/48/30/1000_F_465483015_X2H2GuDGJhZFoK1DyGtmjFsqFAuApO8r.jpg');">
                    <div class="my-3 py-3">
                        <h2 class="display-5">{!! $brandArray[2]['name'] !!}</h2>
                        <p class="lead">{!! $brandArray[2]['description'] !!}</p>
                        <div class="shadow-sm mx-auto" style="width: 80%; height: 9em;">
                            <button class="btn btn-light">Tìm hiểu thêm</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-4 mb-4">
                <div class=" mb-3 bg-white">
                    <div class="d-flex justify-content-center text-center p-0">    
                        <span class="fs-3 fw-semibold">Gợi ý</span>
                    </div>
                    <hr>
                </div>
                <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row row-cols-2 row-cols-md-4 g-0 justify-content-center">
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="card h-100 rounded-0 border-0 text-center" style="width: 16rem;">
                                        <div class="">
                                            <img src="{!! $productArray[$i]['images'] !!}"
                                                class="img"style="background-size: contain;" width="60%"
                                                height="160rem" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <p class="fw-semibold">{!! $productArray[$i]['name'] !!}</p>
                                            <p class="fw-semibold">{!! number_format($productArray[$i]['price']) !!}</p>
                                        </div>
                                        <div class="card-footer bg-white rounded-0 border-0">
                                            <a class="btn btn-sm btn-outline-primary"
                                            href="{{ route('product_details', ['id' => $productArray[$i]['id']]) }}">Xem sản phẩm</a>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row row-cols-2 row-cols-md-4 g-0 justify-content-center">
                                @for ($i = 4; $i < 8; $i++)
                                    <div class="card h-100 rounded-0 border-0 text-center" style="width: 16rem;">
                                        <div class="">
                                            <img src="{!! $productArray[$i]['images'] !!}"
                                                class="img"style="background-size: contain;" width="60%"
                                                height="160rem" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <p class="fw-semibold">{!! $productArray[$i]['name'] !!}</p>
                                            <p class="fw-semibold">{!! number_format($productArray[$i]['price']) !!}</p>
                                        </div>
                                        <div class="card-footer bg-white rounded-0 border-0">
                                            <a class="btn btn-sm btn-outline-primary"
                                            href="{{ route('product_details', ['id' => $productArray[$i]['id']]) }}">Xem sản phẩm</a>
                                        </div>
                                    </div>
                                @endfor                            
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>


            <div class="introduces row row-cols-md-1 row-cols-1 justify-content-between p-3 mt-3">
                <div class=" mb-3 bg-white">
                    <div class="d-flex align-items-center justify-content-center text-center p-0">
                        <hr class="col-md-4" />
                        <span class="border border-dark p-1 col-md-4 fs-3 fw-semibold">Về LuxuryWine Flix</span>
                        <hr class="col-md-4" />
                    </div>
                </div>
                <div class="introducesText col-md-7 mb-2">
                    <span class="lh-lg lead">Thương hiệu Winemart được thành lập vào năm
                        2015 với mục tiêu đem lại cho người tiêu dùng những dịch vụ và sản phẩm tốt nhất. Winemart
                        chuyên cung cấp các loại rượu vang, rượu mạnh, bia nhập khẩu cùng với các loại thực phẩm cao
                        cấp khác như Chocolate, trà, cà phê, mứt, trái cây sấy khô,… từ các nhãn hiệu cao cấp, thiết
                        kế riêng phục vụ từng đối tượng khách hàng.
                    </span>
                </div>
                <div class="introducesImg col-md-5"><img class="card-img-top"
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
@endsection
