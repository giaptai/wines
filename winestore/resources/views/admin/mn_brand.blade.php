<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

                    <div class="p-3 row row-cols-1 row-cols-md-3 sticky-top bg-light justify-content-between">
                        <div class="col-md-auto d-flex">
                            <div class="col-md-auto">
                                <input type="radio" class="btn-check" autocomplete="off" value="Tổng đơn">
                                <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng thương hiệu <span
                                        class="badge bg-danger" id="badge_tongdon"> <?php echo $pagin; ?></span></label>
                            </div>
                            <div class="col-md-auto">
                                <a class="btn btn-primary btn-sm" href="{{ route('add-product') }}">Thêm thương hiệu </a>
                            </div>
                        </div>

                        <div class="col-md-auto">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" value=""
                                    placeholder="Tên..." id="search_id">

                                <button class="btn btn-sm btn-primary" onclick="searched(this.parentElement)"
                                    type="button">Search</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="show-product">
                                <?php
                                $i=1;
                              
                                if (sizeof($brandArray) > 0) {
                                        foreach ($brandArray as $key => $value) {
                                ?>

                                <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <th scope="row"><?php echo $value['name']; ?></th>
                                    <td>
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#minhthu<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                                            <i class="bi bi-eye text-primary"> </i>
                                        </button>
                                        <button value="<?php echo $value['id']; ?>"
                                            class="delete-btn btn btn-sm bi bi-x-lg text-danger" type="button"
                                            onclick="deleted(<?php echo $value['id']; ?>)">
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="minhthu<?php echo $value['id']; ?>" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Sửa thương hiệu</h5>
                                                <button type="lbutton" class="btn-close" data-bs-dismiss="modal"
                                                    aria-labe="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center justify-content-around">
                                    
                                                    <div class="col-md-12">
                                                        <div class="row col-md-auto">
                                                            <div class="col-md-4">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" disabled
                                                                        value="<?php echo $value['id']; ?>">
                                                                    <label for="floatingInput">Mã</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-floating mb-3">
                                                                    <input
                                                                        name="name-product-modal-<?php echo $value['id']; ?>"
                                                                        id="name-product-modal-<?php echo $value['id']; ?>"
                                                                        class="form-control"
                                                                        value="<?php echo $value['name']; ?>">
                                                                    <label for="floatingInput">Tên thương hiệu</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal"
                                                    onclick="edit(<?php echo $value['id']; ?>)">Sửa</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                        ?>
                            </tbody>
                        </table>


                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
                            <li class="page-item disabled"><a class="page-link">Previous</a></li>
                            <?php
                            for ($i = 0; $i < ceil($pagin / 10); $i++) {
                                if ($i == 0) {
                                    echo '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
                                }
                            }
                            ?>
                            <li class="page-item"><a class="page-link">Next</a></li>
                        </ul>
                    </nav>
                    {{-- {!! $wineArray->currentPage() !!} so lay trang hien tai --}}
                </div>
            </div>
        </div>
        {{-- toast --}}
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="bi bi-bell text-primary"> </i>
                    <strong class="me-auto text-primary"> Bootstrap</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toast-body">
                    Xóa thành công
                </div>
            </div>
        </div>
    </div>
    {{-- toast --}}
    <div class="mt-4">
        @include('layout.footer_mn')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script>
    function getAllInput() {
        let search_id = document.getElementById('search_id').value;
        let search_name = document.getElementById('search_name').value;
        let page = 1;
        const query = [search_id, search_name, page];
        return query;
    }

    function deleted(id) {
        let arr = getAllInput();
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                // document.getElementById('show-product').innerHTML = this.responseText;
                const toastLiveExample = document.getElementById('liveToast')
                const toast = new bootstrap.Toast(toastLiveExample)
                toast.show();
            }
        }
        //cau hinh request
        xhttp.open('GET', "./products/deleted?id=" + id + "&search=" + arr[0] + "&page=" + arr[1], true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send();
    }

    function edit(id) {
        let arr = getAllInput();
        let s1 = document.getElementById('name-product-modal-' + id).value;
        let s2 = document.getElementById('description-product-modal-' + id).value;
        let s3 = document.getElementById('category-product-modal-' + id).value;
        let s4 = document.getElementById('brand-product-modal-' + id).value;
        let s5 = document.getElementById('country-product-modal-' + id).value;
        let s6 = document.getElementById('quantity-product-modal-' + id).value;
        let s7 = document.getElementById('price-product-modal-' + id).value;
        let s8 = document.getElementById('tone-product-modal-' + id).value;
        let s9 = document.getElementById('year-product-modal-' + id).value;

        let ele = document.getElementById(id).parentElement.parentElement;
        console.log(ele);

        var xhttp = new XMLHttpRequest() || ActiveXObject();
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                console.log(xhttp.responseText);

                ele.children[2].children[0].children[1].innerHTML = s1;
                ele.children[3].innerHTML = s6;
                ele.children[4].innerHTML = new Intl.NumberFormat('de-EN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(s7);
                ele.children[5].innerHTML = new Intl.NumberFormat('de-EN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(s6 * s7);
                // document.getElementById('show-product').innerHTML = xhttp.responseText;
                document.getElementById('toast-body').innerHTML = 'Sửa thành công';
                const toastLiveExample = document.getElementById('liveToast')
                const toast = new bootstrap.Toast(toastLiveExample)
                toast.show();
            }
        }
        //cau hinh request
        xhttp.open('POST', "./products/edited", true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        //cau hinh header cho request
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send(
            'id=' + id +
            '&name=' + s1 +
            '&description=' + s2 +
            '&category=' + s3 +
            '&brand=' + s4 +
            '&country=' + s5 +
            '&quantity=' + s6 +
            '&price=' + s7 +
            '&tone=' + s8 +
            '&year=' + s9 +
            '&query=' + getAllInput()
        );
    }

    function searched(val) {
        let valuee = val.children[0].value;
        let arr = getAllInput();
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        xhttp.onreadystatechange = function() {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                console.log(JSON.parse(xhttp.responseText));
                document.getElementById('show-product').innerHTML = JSON.parse(xhttp.responseText).tbody;
                document.getElementById('phantrang').innerHTML = JSON.parse(xhttp.responseText).footer;
            }
        }
        //cau hinh request
        xhttp.open('GET', "./products/searched?search_id=" + arr[0] + "&search_name=" + arr[1] + "&page=" + arr[2],
            true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
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
                console.log(xhttp.responseText);
                document.getElementById('show-product').innerHTML = JSON.parse(xhttp.responseText).tbody;
                document.getElementById('phantrang').innerHTML = JSON.parse(xhttp.responseText).footer;
            }
        }
        //cau hinh request
        xhttp.open('GET', './search-products-pagination?search_id=' + arr[0] + '&search_name=' + arr[1] + '&page=' + id,
            true);
        //cau hinh header cho request
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //gui request
        xhttp.send();
    }
</script>

</html>