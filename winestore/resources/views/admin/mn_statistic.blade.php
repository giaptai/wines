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
    <div class="container-md container-fluid" style="width: 80%">
        <div class=" pt-4 border-top">
            <div class="row row-cols-md-2 row-cols-1 gy-4 justify-content-between">
                @include('layout.sidebar')
                <div class="col-md-9 col-12">
                    <div class="row row-cols-2 row-cols-md-4 g-2 mb-3 justify-content-between">
                        <div class="col-md-4 text-white ">
                            <div class="card h-100 border-0">
                                <div class="card-body bg-primary">
                                    <h2 class="card-title">@php echo isset($wines) ? sizeof($wines):0 @endphp</h2>
                                    <p class="card-text">Sản phẩm</p>
                                </div>
                                <div class="card-footer bg-primary"><a class="text-white" href="{{ route('products') }}">Danh sách
                                        sản phẩm</a></div>
                            </div>
                        </div>
                        <div class="col-md-4 text-white">
                            <div class="card h-100 border-0">
                                <div class="card-body bg-warning">
                                    <h2 class="card-title">@php echo isset($accounts) ? sizeof($accounts):0 @endphp</h2>
                                    <p class="card-text">Tài khoản</p>
                                </div>
                                <div class="card-footer bg-warning"><a class="text-white" href="{{ route('customers') }}">Danh sách tài khoản</a></div>
                            </div>
                        </div>
                        <div class="col-md-4 text-white">
                            <div class="card h-100 border-0">
                                <div class="card-body bg-danger">
                                    <h2 class="card-title">@php echo isset($orders) ? sizeof($orders):0 @endphp</h2>
                                    <p class="card-text">Đơn hàng</p>
                                </div>
                                <div class="card-footer bg-danger"><a class="text-white" href="{{ route('orders') }}">Danh sách đơn hàng</a></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        @include('layout.footer_mn')
    </div>
</body>


</html>
