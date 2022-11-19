<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ZippoStore </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

{{-- <body style="background-color: rgb(223, 223, 223, 0.6)">
    <nav class="d-flex align-items-center justify-content-between bg-light">
        <div class="" style="margin-left: 1rem">
            <h4 class="m-0 font-weight-bold">Đơn hàng #1</h4>
            <p class="m-0">{{ date('d-m-Y h:i:s') }}</p>
        </div>
        <div>
            <button class="btn btn-sm bg-info text-light" style="margin-right: 1rem" onclick="window.print()">Xuất hóa
                đơn</button>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12 bg-light rounded shadow p-3">
                    <div>
                        <h5 class="">Sản phẩm đã đặt</h5>
                    </div>
                    <hr>
                    @foreach ($OrderDetails['data']['orderDetails'] as $item)
                        <div class="row mb-3">
 
                            <div class="col-sm-6 d-flex flex-column" style="justify-content:center">
                                <h5>{!! $item['productName'] !!}</h5>
                                <span>Mã: {!! $item['id'] !!}</span>
                            </div>
                            <div class="col-sm-1 d-flex justify-content-center align-items-center">
                                <span class="" style="">{!! $item['quantity'] !!} chai</span>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center flex-column align-items-center">
                                <h6 class="m-0" style="">{!! number_format($item['price']) !!}</h6>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center flex-column align-items-center">
                                <h6 class="m-0" style="">{!! number_format($item['price'] * $item['quantity']) !!}</h6>
                            </div>
                        </div>
                    @endforeach

                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-5 d-flex justify-content-center flex-column">
                            
                            <div class="row">
                                <h3 class="col-sm-6" style="">Tổng: </h3>
                                <h3 class="col-sm-6" style="text-align: end;">{!! number_format($OrderDetails['data']['total']) !!} VND</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12 bg-light rounded shadow p-3">
                    <div>
                        <h5 class="">Trang thai</h5>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-start align-items-center">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="bi bi-hourglass-split display-5"></i>
                        </div>
                        <div class="col-md-8">
                            <h6 class="m-0">
                                Chờ xác nhận
                                <i class="fa-solid fa-check bg-success rounded-circle text-light"></i>
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center col-md-4">
                            <span style="height: 2rem; border-left: 2px dotted rgb(55, 148, 228)"></span>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start align-items-center">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="bi bi-bag-check-fill display-5"></i>
                        </div>
                        <div class="col-md-8">
                            <h6 class="m-0">
                                Đã xác nhận
                                <i class="fa-solid fa-check bg-success rounded-circle text-light"></i>
                            </h6>
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center col-md-4">
                            <span style="height: 2rem; border-left: 2px dotted black"></span>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start align-items-center">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="bi bi-clipboard2-check-fill display-5 text-success"></i>
                        </div>
                        <div class="col-md-8">
                            <h6 class="m-0 text-success">Đã giao</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="col-md-12 bg-light p-3 rounded shadow mb-3">
                    <div>
                        <h5 class="">Chi tiết khách hàng</h5>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <i class="fa-regular fa-user"></i>
                            <span>{!! $OrderDetails['data']['fullname'] !!}</span>
                        </div>
                        <div class="col-md-6">
                            <span>{!! $addressCus[1] !!}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <i class="fa-solid fa-envelope"></i>
                            <span>{!! $OrderDetails['data']['email'] !!}</span>
                        </div>
                        <div class="col-md-6">
                            <span>{!! $addressCus[2] !!}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <i class="fa-solid fa-phone-flip"></i>
                            <span>{!! $OrderDetails['data']['phone'] !!}</span>
                        </div>
                        <div class="col-md-6">
                            <span>{!! $addressCus[0] !!}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <i class="fa-solid fa-credit-card"></i>
                            <span>Thẻ tín dụng</span>
                        </div>
                        <div class="col-md-6">
                            <span>{!! $addressCus[3] !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body> --}}

<body style="background-color: rgb(223, 223, 223, 0.6)">
    <nav class="d-flex align-items-center justify-content-between bg-light">
        <div class="" style="margin-left: 1rem">
            <h4 class="m-0 font-weight-bold">Đơn hàng #{!! $OrderDetails['data']['id'] !!}</h4>
            <p class="m-0">{!! date_format(new DateTime($OrderDetails['data']['created_at']), 'd/m/Y h:i:s') !!}</p>
        </div>
        <div>
            <button class="btn btn-sm bg-info text-light" style="margin-right: 1rem" onclick="window.print()">Xuất hóa
                đơn</button>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="col-md-12 bg-light rounded shadow p-3">
                    <div>
                        <h3 class="text-center">Chi tiết hóa đơn</h3>
                    </div>
                    <hr>

                    <div class="col-md-12 bg-light rounded">
                        <h5 class="">Thông tin khách hàng</h5>
                        <div class="border p-3">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <span class="fw-semibold">Họ và tên: </span>
                                    <span>{!! $OrderDetails['data']['fullname'] !!}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <span class="fw-semibold">Email: </span>
                                    <span>{!! $OrderDetails['data']['email'] !!}</span>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <span class="fw-semibold">Số điện thoại: </span>
                                    <span>{!! $OrderDetails['data']['phone'] !!}</span>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <span class="fw-semibold">Địa chỉ: </span>
                                    <span>{!! $OrderDetails['data']['address'] !!}</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="fw-semibold">Trạng thái: </span>
                                        @if ($OrderDetails['data']['status'] == 0)
                                            <span class="fw-semibold text-danger">Chờ xác nhận</span>
                                        @elseif($OrderDetails['data']['status'] == 1)
                                            <span class="fw-semibold text-danger">Đã xác nhận</span>
                                        @elseif($OrderDetails['data']['status'] == 2)
                                            <span class="fw-semibold text-success">Đã giao</span>
                                        @else
                                            <span class="fw-semibold text-danger">Đã hủy</span>
                                        @endif
                                </div>
                            </div>                      
                        </div>
                    </div>
                    <hr>
                    <h5>Thông tin đơn hàng</h5>
                    <div class="border p-3">
                        @foreach ($OrderDetails['data']['orderDetails'] as $item)
                            <div class="row mb-3">
                                <div class="col-sm-6 d-flex flex-column" style="justify-content:center">
                                    <h6>{!! $item['productName'] !!}</h6>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center align-items-center">
                                    <span class="" style="">X {!! $item['quantity'] !!}</span>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center flex-column align-items-center">
                                    <h6 class="m-0" style="">{!! number_format($item['price']) !!}</h6>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center flex-column align-items-center">
                                    <h6 class="m-0" style="">{!! number_format($item['price'] * $item['quantity']) !!}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-center flex-column">

                            <div class="row" style="font-size:18px">
                                <span class="col-sm-6 fw-semibold" style="">Tổng thanh toán: </span>
                                <span style="text-align: end;" class="col-sm-6 fw-semibold">{!! number_format($OrderDetails['data']['total']) !!}
                                    VND</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
