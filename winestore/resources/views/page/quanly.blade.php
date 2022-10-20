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

<body class="vh-100">
    <div class="row vh-100">
        <div class="col-md-3 col-lg-2 d-md-block d-flex flex-column bg-light p-4 rounded-0" style="height: 100%">
            <span class="fs-4">Quản lý statistic</span>
            <hr>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link link-light bg-dark" href="http://127.0.0.1:8000/admin/statistic">
                        <i class="bi bi-bar-chart-line"> </i>Thống kê</a>
                </li>
                <li>
                    <a class="nav-link link-dark" href="http://127.0.0.1:8000/admin/products">
                        <i class="bi bi-cup-straw"> </i>Sản phẩm</a>
                </li>
                <li>
                    <a class="nav-link link-dark" href="http://127.0.0.1:8000/admin/orders">
                        <i class="bi bi-receipt"> </i>Đơn hàng</a>
                </li>
                <li>
                    <a class="nav-link link-dark" href="http://127.0.0.1:8000/admin/accounts">
                        <i class="bi bi-file-earmark-person"> </i>Khách hàng</a>
                </li>
                <li>
                    <a class="nav-link link-dark" href="http://127.0.0.1:8000/admin/categories">
                        <i class="bi bi-tags"> </i>Thể loại</a>
                </li>
                <li>
                    <a class="nav-link link-dark" href="http://127.0.0.1:8000/admin/brands">
                        <i class="bi bi-alipay"> </i>Thương hiệu</a>
                </li>
            </ul>
            <hr>
            <div class="dropdown"><a href="#"
                    class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false"><img src="https://github.com/mdo.png" alt=""
                        width="32" height="32" class="rounded-circle me-2"><strong>mdo</strong></a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-lg-9">
            d
        </div>
    </div>
    
    {{-- layout cứng không thay đổi --}}
    {{-- @include('layout.menubar') --}}

    {{-- layout có thay đổi --}}
    {{-- @yield('content') --}}

    {{-- layout cứng không thay đổi --}}
    {{-- <div class="row vh-100">
        
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row row-cols-2 row-cols-md-4 g-2 mb-3 justify-content-between">
                <div class="col-md-4 text-white ">
                    <div class="card h-100 border-0">
                        <div class="card-body bg-primary">
                            <h2 class="card-title">20</h2>
                            <p class="card-text">Sản phẩm</p>
                        </div>
                        <div class="card-footer bg-primary"><a class="text-white"
                                href="http://127.0.0.1:8000/admin/products">Danh sách
                                sản phẩm</a></div>
                    </div>
                </div>
                <div class="col-md-4 text-white">
                    <div class="card h-100 border-0">
                        <div class="card-body bg-warning">
                            <h2 class="card-title">12</h2>
                            <p class="card-text">Tài khoản</p>
                        </div>
                        <div class="card-footer bg-warning"><a class="text-white"
                                href="http://127.0.0.1:8000/admin/customers">Danh sách tài
                                khoản</a></div>
                    </div>
                </div>
                <div class="col-md-4 text-white">
                    <div class="card h-100 border-0">
                        <div class="card-body bg-danger">
                            <h2 class="card-title">20</h2>
                            <p class="card-text">Đơn hàng</p>
                        </div>
                        <div class="card-footer bg-danger"><a class="text-white"
                                href="http://127.0.0.1:8000/admin/orders">Danh sách đơn
                                hàng</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <canvas id="myChart" style="display: block; box-sizing: border-box;"></canvas>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const labels = [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                ];

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'My First dataset',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 10, 5, 2, 20, 30, 45],
                    }]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            </script>

        </div>
    </div> --}}

    {{-- @include('layout.footer_mn') --}}
</body>

</html>
