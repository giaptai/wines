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
                @include('layout.sidebar')
                <div class="col-md-9 col-12">
                    <div class="p-3 row justify-content-between sticky-top bg-light">
                        <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                autocomplete="off" value="Tổng đơn"><label class="btn btn-outline-primary btn-sm"
                                for="btnradio1">Tổng tài khoản <span class="badge bg-danger"
                                    id="badge_tongdon"><?= sizeof($accounts) ?></span></label></div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Email"
                                    id="email">
                                <input type="tel" class="form-control form-control-sm"
                                    placeholder="Số điện thoại" id="phone">
                                <button class="btn btn-sm btn-primary" type="button"
                                    onclick="searchAccounts()">Tìm</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @php
                                    $i = 0;
                                    if (sizeof($accounts) > 0) {
                                        foreach ($accounts as $key => $value) {
                                            echo '<tr>
                                                <th scope="row">' .
                                                ++$i .
                                                '</th>
                                                <td>' .
                                                $value['fullname'] .
                                                '</td>
                                                <td>' .
                                                $value['email'] .
                                                '</td>
                                                <td>' .
                                                $value['phone'] .
                                                '</td>
                                                <td>' .
                                                ($value['status'] == 1 ? 'Mở' : 'Khóa') .
                                                '</td>
                                                <td><i class="bi bi-lock-fill"></i></td>
                                            </tr>';
                                        }
                                    }
                                @endphp
                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-end" id="phantrang">
                                {{-- <li class="page-item disabled"><a class="page-link">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" @disabled(true)>...</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                                <?php
                                for ($i = 0; $i < ceil($pagin / 10); $i++) {
                                    if ($i==0) {
                                        echo '<li class="page-item"><a class="page-link active" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
                                    } else {
                                        echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        @include('layout.footer_mn')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script>
    function getAllInput() {
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let page = {!! $accounts->currentPage() !!};
        const query = [email, phone, page];
        return query;
    }

    //tìm kiếm email vaf so dien thoai
    function searchAccounts() {
        let arr = getAllInput();
        // if(arr[0]=='' && arr[1]==''){
        //     alert('Cần nhập ít nhất 1 trong 2 !');
        //     return;
        // }
        // var str = str.children[0].value
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        //Bat su kien thay doi trang thai cuar request
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                console.log(xhttp.responseText);
                document.getElementById('tbody').innerHTML = JSON.parse(xhttp.responseText).tbody;
                document.getElementById('phantrang').innerHTML = JSON.parse(xhttp.responseText).footer;
            }
        }
        //cau hinh request
        xhttp.open('GET', './search-accounts?email=' + arr[0] + '&phone=' + arr[1] + '&page=' + 1, true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //gui request
        xhttp.send();
    }

    function phantrang(id) {
        let arr = getAllInput();
        // var str = str.children[0].value
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        //Bat su kien thay doi trang thai cuar request
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                console.log(JSON.parse(xhttp.responseText));
                document.getElementById('tbody').innerHTML = JSON.parse(xhttp.responseText).tbody;
                document.getElementById('phantrang').innerHTML = JSON.parse(xhttp.responseText).footer;
            }
        }
        //cau hinh request
        xhttp.open('GET', './search-accounts-pagination?email=' + arr[0] + '&phone=' + arr[1] + '&page=' + id, true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //gui request
        xhttp.send();
    }
</script>

</html>
