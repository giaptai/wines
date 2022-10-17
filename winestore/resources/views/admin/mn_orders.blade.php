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
                    <div class="p-3 row row-cols-1 row-cols-md-4 sticky-top bg-light">
                        <div class="col-md-auto">
                            <input checked type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                autocomplete="off" value="Tổng"><label class="btn btn-outline-primary btn-sm"
                                for="btnradio1">Tổng
                                <span class="badge bg-danger" id="badge_tongdon">14</span></label>
                        </div>
                        <div class="col-md-auto">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"
                                value="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm"
                                for="btnradio2">Chờ xác nhận <span class="badge bg-danger"
                                    id="badge_tongdon">14</span></label>
                        </div>
                        <div class="col-md-auto">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off"
                                value="Đã xác nhận"><label class="btn btn-outline-primary btn-sm" for="btnradio3">Đã
                                xác nhận <span class="badge bg-danger" id="badge_tongdon">14</span></label>
                        </div>
                        <div class="col-md-auto">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off"
                                value="Đã hủy"><label class="btn btn-outline-primary btn-sm" for="btnradio4">Đã hủy
                                <span class="badge bg-danger" id="badge_tongdon">14</span></label>
                        </div>
                        <div class="col-md-auto">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Mã đơn"
                                    id="search">
                                <button class="btn btn-sm btn-primary" type="button"
                                    onclick="searchOrder(this.parentElement)">Tìm</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã đơn</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $i=0;
                                if(sizeof($orders)>0){
                                    foreach ($orders as $key => $value) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo ++$i; ?></th>
                                    <td><?php echo $value->id; ?></td>
                                    <td><?php echo date_format(new DateTime($value->date), 'd/m/Y h:i:s'); ?></td>
                                    <td><?php echo number_format($value->total_money); ?></td>
                                    <td><span><?php echo $value->status; ?></span></td>
                                    <td>
                                        <?php
                                            if($value->status=='Chờ xác nhận'){
                                        ?>
                                        <button class="bi bi-check-circle-fill text-success"
                                            onclick="updateOrder(<?php echo $value->id; ?>, `Đã xác nhận`, this.parentElement.parentElement)">
                                        </button>
                                        <button class="bi bi-x-lg text-danger"
                                            onclick="updateOrder(<?php echo $value->id; ?>, `Đã hủy`, this.parentElement.parentElement)">
                                        </button>
                                        <button class="bi bi-exclamation-circle-fill text-primary"></button>
                                        <?php
                                            }elseif ($value->status=='Đã xác nhận' || $value->status=='Đã hủy') {
                                        ?>
                                        <button class="bi bi-exclamation-circle-fill text-primary"></button>
                                        <?php
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-end" id="phantrang">
                                <li class="page-item disabled"><a class="page-link">Previous</a></li>
                                <?php
                                for ($i = 0; $i < ceil($pagin / 15); $i++) {
                                    echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
                                }
                                ?> 
                                <li class="page-item"><a class="page-link" >Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        {!! $orders->currentPage() !!}
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
        let search = document.getElementById('search').value;
        let page = {!! $orders->currentPage() !!};
        let btnradio = document.querySelectorAll('input[type="radio"]');
        for (let i = 0; i < document.querySelectorAll('input[type="radio"]').length; i++) {
            if (document.querySelectorAll('input[type="radio"]')[i].checked) {
                btnradio = document.querySelectorAll('input[type="radio"]')[i].value;
                break;
            }
        }
        const query = [search, page, btnradio];
        return query;
    }

    function updateOrder(id, str, inp) {
        console.log(id, str, inp.children[5]);
        let query = getAllInput()
        console.log(query);
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        //Bat su kien thay doi trang thai cuar request
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                console.log(xhttp.responseText);
                if (str == 'Đã xác nhận') {
                    inp.children[5].children[0].remove();
                    inp.children[5].children[0].remove();
                    inp.children[4].innerHTML = 'Đã xác nhận';
                } else {
                    inp.children[5].children[0].remove();
                    inp.children[5].children[0].remove();
                    inp.children[4].innerHTML = 'Đã hủy';
                }
            }
        }
        //cau hinh request
        xhttp.open('POST', './status-order', true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //gui request
        xhttp.send(
            'id=' + id +
            '&str=' + str +
            '&page=' + query[1] +
            '&search=' + query[0] +
            '&status=' + query[2]
        );
    }

    // lọc loại đơn hàng
    for (let i = 0; i < document.querySelectorAll('input[type="radio"]').length; i++) {
        document.querySelectorAll('input[type="radio"]')[i].addEventListener('click', function() {
            let query = getAllInput()
            console.log(document.querySelectorAll('input[type="radio"]')[i].value);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    // console.log(JSON.parse(xhttp.responseText).footer);
                    document.getElementById('tbody').innerHTML = JSON.parse(xhttp.responseText).tbody;
                    document.getElementById('phantrang').innerHTML = JSON.parse(xhttp.responseText).footer;
                    // const nextURL = './quanly_donhang.php?trangthai=' + val;
                    // const nextTitle = 'My new page title';
                    // const nextState = {
                    //     additionalInformation: 'Updated the URL with JS'
                    // };
                    // //window.history.pushState(nextState, nextTitle, nextURL);
                    // window.history.replaceState(nextState, nextTitle, nextURL);
                    // arr1 = JSON.parse(this.responseText).arr1;
                    // arr2 = JSON.parse(this.responseText).arr2;
                    // document.getElementById('table_tbody_donhang').innerHTML = arr1;
                    // document.getElementById('table_tfoot_donhang').innerHTML = arr2;
                }
            }
            //cau hinh request
            xhttp.open('POST', './filter-order', true);
            xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send(
                'page=1' +
                '&status=' + query[2]
            );
        })
    }

    //tìm kiếm mã đơn hàng
    function searchOrder(str) {
        let arr = getAllInput();
        var str = str.children[0].value
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
        xhttp.open('POST', './search-order', true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //gui request
        xhttp.send('search=' + str +'&status=' + arr[2]);
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
                console.log(xhttp.responseText);
                document.getElementById('tbody').innerHTML = JSON.parse(xhttp.responseText).tbody;
                document.getElementById('phantrang').innerHTML = JSON.parse(xhttp.responseText).footer;
            }
        }
        //cau hinh request
        xhttp.open('GET', './search-orders-pagination?status=' + arr[2] + '&page=' + id, true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //gui request
        xhttp.send();
    }
</script>

</html>
