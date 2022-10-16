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
        <div class="pt-4 border-top">
            <div class="row row-cols-md-2 row-cols-1 gy-4 justify-content-between">
                {{-- <div class="col-12 col-md-3 bg-light mb-auto p-4 rounded-4 sticky-md-top"><span class="fs-4">{{ $text1 }}</span>
                    <hr>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a class="nav-link link-light bg-dark" href="/taikhoan/thongtincanhan"><i
                                    class="bi bi-person-circle"> </i>{{ $text1 }}</a></li>
                        <li><a class="nav-link link-dark" href="/taikhoan/diachicanhan"><i class="bi bi-geo-alt">
                                </i>{{ $text2 }}</a></li>
                        <li><a class="nav-link link-dark" href="/taikhoan/donhangcanhan"><i class="bi bi-clock-history">
                                </i>{{ $text3 }}</a></li>
                        <li><a class="nav-link link-danger" href="/dangxuat"><i class="bi bi-box-arrow-right">
                                </i>{{ $text4 }}</a></li>
                    </ul>
                </div> --}}
                @include('layout.sidebar_client')
                <div class="col-md-9 col-12 row p-4">
                    <form class="col-md-7 col-12" style="padding: 0px 2rem;">
                        <h3>Thông tin cá nhân</h3>
                        <div class="form-floating mb-3"><input type="email" class="form-control" id="hotencanhan"
                                placeholder="name@example.com" value="Nguyễn Thị Minh Thư"><label
                                for="floatingInput">Họ và
                                tên</label></div>
                        <div class="form-floating mb-3"><input type="text" class="form-control" id="sdtcanhan"
                                placeholder="name@example.com" value="<?php echo rand(1000000000, 9999999999); ?>"><label for="floatingInput">Số
                                điện
                                thoại</label></div>
                        <div class="form-floating mb-3"><input type="email" class="form-control" id="emailcanhan"
                                placeholder="name@example.com" value="hentaiktvn321@gmail.com"><label
                                for="floatingInput">Email</label></div>
                        <div class="form-floating mb-3"><input type="text" class="form-control" id="diachicanhan"
                                placeholder="name@example.com" value="6 An Dương Vương, Phường 16, Quận 8"><label
                                for="floatingInput">Địa chỉ mặc định</label></div>
                        <div class="form-floating mb-3"><button type="button" class="btn btn-dark" onclick="updateInfo(100121)">Cập nhật</button>
                        </div>
                    </form>
                    <div class="col-md-4">
                        <div class="d-flex bg-light">
                            <h1 class="card-title p-2">16</h1>
                            <p class="card-text">Đơn chờ xác nhận</p>
                        </div>
                        <hr>
                        <div class="d-flex bg-light">
                            <h1 class="card-title p-2">2</h1>
                            <p class="card-text">Đơn đã giao</p>
                        </div>
                        <hr>
                        <div class="d-flex bg-light">
                            <h1 class="card-title p-2">1</h1>
                            <p class="card-text">Đơn đã xác nhận</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footerbar')
</body>
<script>
    function updateInfo(id) {
        s1 = document.getElementById('hotencanhan').value;
        s2 = document.getElementById('sdtcanhan').value;
        s3 = document.getElementById('emailcanhan').value;
        s4 = document.getElementById('diachicanhan').value;
        console.log(id, s1, s2, s3, s4);

        var xhttp = new XMLHttpRequest() || ActiveXObject();
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                console.log(xhttp.responseText);
            }
        }
        //cau hinh request
        xhttp.open('POST', './my-account/update', true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //gui request
        xhttp.send(
            'name=' + s1 +
            '&phone=' + s2 +
            '&email=' + s3 +
            '&addr=' + s4
        );
    }
</script>

</html>
