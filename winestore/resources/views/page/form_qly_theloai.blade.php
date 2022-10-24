<div class="p-3 row row-cols-1 row-cols-md-3 sticky-top bg-light justify-content-between">
    <div class="col-md-auto d-flex">
        <div class="col-md-auto">
            <input type="radio" class="btn-check" autocomplete="off" value="Tổng đơn">
            <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng thể loại <span class="badge bg-danger"
                    id="badge_tongdon"> <?php echo $pagin; ?></span></label>
        </div>
        <div class="col-md-auto">
            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#themtheloai">Thêm thể loại </a>
        </div>
    </div>

    <div class="col-md-auto">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" value="" placeholder="Tên..."
                id="search_id">

            <button class="btn btn-sm btn-primary" onclick="searched(this.parentElement)" type="button">Search</button>
        </div>
    </div>
</div>

<div class="modal fade" id="themtheloai" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel2">Thêm thể loại</h5>
                <button type="lbutton" class="btn-close" data-bs-dismiss="modal" aria-labe="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center justify-content-around">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label fw-semibold">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="name-category-add"
                                value="Thương hiệu A">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc-category-add" placeholder="Mô tả gì đó" style="height: 10rem">Rượu vang đỏ hay còn gọi là vang đỏ hay rượu nho đỏ là một dạng phổ biến của rượu vang được làm từ những loại nho đậm màu.  Vang đỏ thường có màu đậm pha trộn giữa màu đỏ, đen và tím.  Quá trình làm rượu vang đỏ thì vỏ nho cũng được nghiền nát cùng với ruột để tạo ra nước ép rồi lên men thành rượu.</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="add()">Thêm</button>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">Thêm thành công</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="table-responsive" id="quanlytheloai">
    @include('dynamic_layout.tablecategory')
</div>
{{-- <nav aria-label="Page navigation example">
    <ul class="pagination pagination-sm justify-content-end" id="phantrang">
        <li class="page-item disabled"><a class="page-link">Previous</a></li> --}}
<?php
// for ($i = 0; $i < ceil($pagin / 10); $i++) {
//     if ($i == 0) {
//         echo '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
//     } else {
//         echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
//     }
// }
?>
{{-- <li class="page-item"><a class="page-link">Next</a></li>
    </ul>
</nav> --}}
<script src="{{ url('./js/quanly_theloai.js') }}"></script>
