<?php
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
$respon = Http::get('http://127.0.0.1:8001/api/v1/products?page='.$currentpage);
$productArray = $respon['data'];
$pagin = $respon['meta']['total'];
$countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
$categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
$brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
?>

<div class="p-3 row row-cols-1 row-cols-md-3 sticky-top bg-light justify-content-between">
    <div class="row col-md-auto">
        <div class="col-md-auto">
            <input type="radio" class="btn-check" autocomplete="off" value="Tổng đơn">
            <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng sản phẩm
                <span class="badge bg-danger" id="badge_tongdon"> <?php echo $pagin; ?></span>
            </label>
        </div>
        <div class="col-md-auto">
            <a class="btn btn-primary btn-sm" href="{{ route('productspage') }}">Thêm sản phẩm </a>
        </div>
    </div>

    <div class="col-md-auto">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" value="" placeholder="Mã" id="search_id">
            <input type="text" class="form-control form-control-sm" value="" placeholder="Tên"
                id="search_name">
            <button class="btn btn-sm btn-primary" onclick="searched()" type="button">Search</button>
        </div>
    </div>
</div>

<div class="table-responsive" id="quanlysanpham">
    @include('dynamic_layout.tableproduct')
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">Thêm sản phẩm thành công</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<script src="{{ url('./js/quanly_sanpham.js') }}"></script>
