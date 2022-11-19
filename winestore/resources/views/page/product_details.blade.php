@extends('home')
@section('content')
    <style>
        #product {
            min-height: 100vh;
        }

        /*product background*/
        #product-background {
            object-fit: contain;
            width: 100%;
            height: 56.24vw;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        @media (min-width: 512px) {
            #product-background {
                height: 60vw;
            }
        }

        @media (min-width: 768px) {
            #product-background {
                height: 45vw;
            }
        }

        @media (min-width: 992px) {
            #product-background {
                height: 35vw;
            }
        }

        /* Product Description Header */
        #product-description-header {
            position: relative;
        }

        #product-description-display {
            margin-right: unset;
        }

        #product-cart {
            border: 1px solid rgb(24, 23, 23);
            display: flex;
            flex-direction: column;
            position: relative;
            justify-content: space-between;
            width: 100%;
            background-color: var(--sub-color);
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 2px;
            background: #f8f9fa;
        }

        @media (min-width: 768px) {
            #product-description-display {
                margin-right: 300px;
            }

            #product-cart {
                position: absolute;
                width: fit-content;
                height: 125px;
                bottom: 1rem;
                right: 0px;
                margin-bottom: 0rem;
                padding: 2rem 1rem 2rem 1rem;
            }
        }

        .product-cart-price {
            /* flex: 1 1 auto; */
            margin-bottom: 1rem;
        }

        @media (min-width: 768px) {
            .product-cart-price {
                margin-bottom: 0rem;
            }
        }

        .product-cart-discount {
            font-size: 1rem !important;
        }

        .product-cart-final-price {
            font-size: 1.2rem;
        }

        .product-cart-discount-price {
            font-size: 1.2rem;
        }

        /*table product description  */
        .product-table td {
            border-top: 0px !important;
            padding-left: 0px !important;
            color: white !important;
        }

        .details-content {
            height: 38px;
        }

        .product-description .nav-item a {
            color: white !important;
        }

        .product-description .nav-item a:hover {
            color: black !important;
            background-color: white !important;
        }

        .product-description .nav-tabs .nav-link.active {
            color: black !important;
        }

        .details-category {
            font-weight: 600;
        }

        /*Responsive details */
        @media (max-width: 600px) {
            .title {
                font-size: 1rem !important;
            }

            #bg-product-detail {
                height: 15rem;
                grid-template-columns: 6rem auto;
                grid-template-areas:
                    "imgProduct infoProduct "
                    " priceProduct priceProduct ";
            }

            .card-price {
                width: auto;
                position: inherit !important;
            }

            .img-product img {
                width: 6rem;
            }

            .info-product {
                font-size: 15px;
            }

            .nav {
                position: sticky !important;
                top: 0 !important;
                background-color: var(--main-color);
            }

            #gamedetails .table-row {
                display: block;
            }

            .recommended-table .details-lable {
                display: block !important;
            }

            .systemrequire-table {
                display: block !important;
            }

            .button-addToCast {
                width: 100%;
            }

            .button-addToWishList {
                width: 100%;
            }
        }
    </style>
    {{-- <div class="container-md mt-4 mb-4" style="width: 80%">
        <div class="details">
            <h3 class="border-bottom">Chi tiết sản phẩm
            </h3>
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
                    <span class="fw-bold">Thể tích: </span>
                    <p class=""><?php echo $wineDetail['vol']; ?> ML</p>
                    <hr>
                    <span class="fw-bold">Nồng độ: </span>
                    <p class=""><?php echo $wineDetail['c']; ?> %</p>
                    <hr>
                    <span class="fw-bold">Năm: </span>
                    <p class=""><?php echo $wineDetail['year']; ?></p>

                </div>
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail p-3"
                    height="100%" width="100%"
                        src="{{ asset('/' . $wineDetail['images']) }}"
                        alt="description of image">
                </div>
                <div class="col-md-5">
                    <div class="mota">
                        <h3><?php echo $wineDetail['name']; ?></h3>
                        <p class="fs-4 fw-bolder"><?php echo number_format($wineDetail['price']); ?> đ</p>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['description']; ?></p>

                        <h3><?php echo $wineDetail['category'][0]['name']; ?></h3>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['category'][0]['description']; ?></p>

                        <h3><?php echo $wineDetail['brand'][0]['name']; ?></h3>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['brand'][0]['description']; ?></p>

                        <h3><?php echo $wineDetail['origin'][0]['name']; ?></h3>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['origin'][0]['description']; ?></p>
                    </div>
                    @if (session()->exists('cart.' . $wineDetail['id']))
                        <button type="button" class="btn disabled btn-primary rounded-0">Trong giỏ hàng</button>
                    @else
                        <button type="button" onclick="addtocart({{ $wineDetail['id'] }})"
                            class="btn btn-outline-primary rounded-0" id="btn{{ $wineDetail['id'] }}">Thêm vào giỏ</button>
                    @endif
                </div>
            </div>
        </div>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">Thêm thành công</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>  --}}

    <div id="product">
        <img id="product-background" src="{{ url('/' . $wineDetail['images']) }}">
        <div class="product-description text-light" style="background-color: rgb(118, 118, 118)">
            <div class="container mt-3">
                <div id="product-description-header">
                    {{-- <h1 id="product-description-display">{{ $wineDetail['name'] }}</h1> --}}
                    {{-- <h1 class="pt-3"></h1> --}}
                    <div id="product-cart">
                        <div class="product-cart-price">
                            <p class="text-dark fw-semibold">{{ $wineDetail['name'] }}</p>
                            <span class="badge p-0 pt-1 pb-2">
                                <span class="product-cart-final-price text-dark">
                                    {{ number_format($wineDetail['price'], 0, '.') }} VND </span>
                            </span>
                        </div>
                        <div class="product-confirm m-0">
                            {{-- <button data-id="{{ $wineDetail['id'] }}"
                                class="add-cart btn btn-primary w-100 font-weight-bold">
                                <i class="m-1 fa-solid fa-cart-shopping"></i>
                                <span>{{ isset(session('cart')[$wineDetail['id']]) ? 'Đã thêm vào giỏ' : 'Thêm vào giỏ' }}</span>
                            </button> --}}

                            @if (session()->exists('cart.' . $wineDetail['id']))
                                <button type="button" class="btn disabled btn-primary rounded-0 w-100">Trong giỏ
                                    hàng</button>
                            @else
                                <button type="button" data-id="{{ $wineDetail['id'] }}"
                                    class="add-cart btn btn-primary rounded-0 w-100 font-weight-bold"
                                    id="btn{{ $wineDetail['id'] }}">Thêm vào giỏ</button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs pt-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#description">Mô tả</a>
                    </li>
                    <li class="nav-item" id="productdetails">
                        <a class="nav-link" data-bs-toggle="tab" href="#gamedetails">Chi tiết</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content pb-5">
                    <div id="description" class="container tab-pane active"><br>

                        <h1>Giới thiệu sản phẩm</h1>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['description']; ?></p>

                        <h3><?php echo $wineDetail['category'][0]['name']; ?></h3>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['category'][0]['description']; ?></p>

                        <h3><?php echo $wineDetail['brand'][0]['name']; ?></h3>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['brand'][0]['description']; ?></p>

                        <h3><?php echo $wineDetail['origin'][0]['name']; ?></h3>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['origin'][0]['description']; ?></p>
                    </div>
                    <div id="gamedetails" class="container tab-pane fade"><br>
                        <div class="content-summary-section">
                            <h1 class="title">Chi tiết</h1>
                            <div class="container">
                                <div class="row row-cols-3 justify-content-between">
                                    <div class="col-md-3">
                                        <span class="fw-bold">Loại: </span>
                                        <p class=""><?php echo $wineDetail['category'][0]['name']; ?></p>
                                        <hr>
                                        <span class="fw-bold">Quốc gia: </span>
                                        <p class=""><?php echo $wineDetail['origin'][0]['name']; ?></p>
                                        <hr>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="fw-bold">Thương hiệu: </span>
                                        <p class=""><?php echo $wineDetail['brand'][0]['name']; ?></p>
                                        <hr>
                                        <span class="fw-bold">Thể tích: </span>
                                        <p class=""><?php echo $wineDetail['vol']; ?> ML</p>
                                        <hr>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="fw-bold">Nồng độ: </span>
                                        <p class=""><?php echo $wineDetail['c']; ?> %</p>
                                        <hr>
                                        <span class="fw-bold">Năm: </span>
                                        <p class=""><?php echo $wineDetail['year']; ?></p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">Thêm thành công</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.add-cart').addEventListener('click', () => {
            // console.log(document.querySelector('.add-cart').dataset.id);
            let idd = document.querySelector('.add-cart').dataset.id;
            let btn = document.querySelector('.add-cart');
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
            xhttp.open("POST", '/store-to-cart/' + idd, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();

        })
        // function addtocart(ele) {
        //     console.log(ele.dataset.id);
        //     // return;
        //     let btn = document.getElementById('btnthem');
        //     var xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             console.log(this.responseText);
        //             btn.innerText = "Trong giỏ hàng"
        //             btn.classList.add('disabled')
        //             btn.classList.add('btn-primary')
        //             btn.classList.remove('btn-outline-primary')
        //             const toastLiveExample = document.getElementById('liveToast')
        //             const toast = new bootstrap.Toast(toastLiveExample)
        //             toast.show()
        //         }
        //     };
        //     xhttp.open("POST", '/store-to-cart/' + id, true);
        //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //     xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        //     xhttp.send();
        // }
    </script>
    <script>
        document.getElementById('productdetails').addEventListener('click', (e) => {
            console.log(document.querySelector('#gamedetails'));

            var someTabTriggerEl = document.querySelector('#gamedetails');
            var tab = new bootstrap.Tab(someTabTriggerEl)
            tab.show()
        })


        // $(document).ready(function() {
        //     $(".nav-tabs a").click(function() {
        //         $(this).tab('show');
        //     });
        // });
    </script>
@endsection
