@extends('home')
@section('content')
<div class="container" style="width: 80%">
    <div class="pt-4 border-top">
        <div class="row row-cols-md-2 row-cols-1 gy-4 justify-content-between">
            @include('layout.sidebar_client')
            <div class="col-md-9 col-12">
                <div style="text-align: center; border: dotted;"><button type="button" class="btn"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm địa chỉ</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Địa chỉ mới</h5><button
                                        type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAddr">
                                        <div class="form-floating mb-4"><input type="text" class="form-control"
                                                id="dc_hoten" placeholder="Nguyen Van A"><label
                                                for="floatingInput">Họ và
                                                tên</label></div>
                                        <div class="form-floating mb-4"><input type="text" class="form-control"
                                                id="dc_sdt" placeholder="09001201"><label for="floatingInput">Số
                                                điện thoại</label></div>
                                        <div class="form-floating mb-3"><input type="text" class="form-control"
                                                id="dc_diachi" placeholder="Enter password"><label
                                                for="floatingInput">Địa
                                                chỉ</label></div>
                                    </form>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button><button type="button"
                                        class="btn btn-primary">Thêm</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="addruser" class="mt-3"><i class="mt-3">Lưu ý: Mỗi tài khoản tối đa 5 địa
                        chỉ</i>
                    <div class="item mt-3" style="border: 1px ridge;">
                        <div class="d-flex justify-content-between p-2">
                            <div class="info">
                                <div class="name">Nguyễn Thị Minh Thư<a
                                        class="text-success text-decoration-none fs-6"> <i
                                            class="fa-solid fa-circle-check"></i>Địa chỉ mặc định</a></div>
                                <div class="address"><span>Địa chỉ: </span>6 An Dương Vương, Phường 16, Quận 8
                                </div>
                                <div class="phone"><span>Điện thoại: </span>0922201315</div>
                            </div>
                            <div><a class="text-primary text-decoration-none fa-solid fa-pen-to-square fs-5"
                                    href="./sua_diachi.php?id_addr=2893"></a><a
                                    class="btn text-danger btn-sm fa-solid fa-xmark fs-5"></a></div>
                        </div>
                    </div>
                    <div class="item mt-3" style="border: 1px ridge;">
                        <div class="d-flex justify-content-between p-2">
                            <div class="info">
                                <div class="name">Lê Ngọc Toàn</div>
                                <div class="address"><span>Địa chỉ: </span>23 Phạm Ngũ Lão, Phuong 4, Too3,
                                    Quận 3, TP Hồ Chí Minh</div>
                                <div class="phone"><span>Điện thoại: </span>0921151456</div>
                            </div>
                            <div><a class="text-primary text-decoration-none fa-solid fa-pen-to-square fs-5"
                                    href="./sua_diachi.php?id_addr=5094"></a><a
                                    class="btn text-danger btn-sm fa-solid fa-xmark fs-5"></a></div>
                        </div>
                    </div>
                    <div class="item mt-3" style="border: 1px ridge;">
                        <div class="d-flex justify-content-between p-2">
                            <div class="info">
                                <div class="name">Nguyễn Dương Yến Như</div>
                                <div class="address"><span>Địa chỉ: </span>99 An Dương Vương, Phường 16, Quận 8
                                </div>
                                <div class="phone"><span>Điện thoại: </span>0921141711</div>
                            </div>
                            <div><a class="text-primary text-decoration-none fa-solid fa-pen-to-square fs-5"
                                    href="./sua_diachi.php?id_addr=7652"></a><a
                                    class="btn text-danger btn-sm fa-solid fa-xmark fs-5"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection