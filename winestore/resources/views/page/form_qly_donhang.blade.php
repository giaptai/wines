<?php
    $respon = Http::get('http://127.0.0.1:8001/api/v1/orders?page=1');
    $orderArray = $respon['data'];
    $pagin = $respon['total'];
    $currentpage = 1;
?>
<div class="p-3 row row-cols-1 row-cols-md-4 sticky-top bg-light justify-content-between">
    <div class="col-md-auto row">
        <div class="col-md-auto">
            <input checked type="radio" class="btnradio btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                value="-1">
            <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng<span class="badge bg-danger"
                    id="badge_tongdon">14</span>
            </label>
        </div>
        <div class="col-md-auto">
            <input type="radio" class="btnradio btn-check" name="btnradio" id="btnradio2" autocomplete="off"
                value="0"><label class="btn btn-outline-primary btn-sm" for="btnradio2">Chờ xác nhận <span
                    class="badge bg-danger" id="badge_tongdon">14</span></label>
        </div>
        <div class="col-md-auto">
            <input type="radio" class="btnradio btn-check" name="btnradio" id="btnradio3" autocomplete="off"
                value="1"><label class="btn btn-outline-primary btn-sm" for="btnradio3">Đã xác nhận <span
                    class="badge bg-danger" id="badge_tongdon">14</span></label>
        </div>
        <div class="col-md-auto">
            <input type="radio" class="btnradio btn-check" name="btnradio" id="btnradio4" autocomplete="off"
                value="2"><label class="btn btn-outline-primary btn-sm" for="btnradio4">Đã hủy
                <span class="badge bg-danger" id="badge_tongdon">14</span></label>
        </div>
    </div>

    <div class="col-md-auto">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="Mã đơn" id="search_id">
            <button class="btn btn-sm btn-primary" type="button" onclick="searched(this.parentElement)">Tìm</button>
        </div>
    </div>
</div>
<div class="table-responsive" id="quanlydonhang">
    @include('dynamic_layout.tableorder')
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">Cập nhật đơn hàng thành công</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<script src="{{ url('./js/quanly_donhang.js') }}"></script>
