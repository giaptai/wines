<div class="p-3 row row-cols-1 row-cols-md-4 sticky-top bg-light">
    <div class="col-md-auto">
        <input checked type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
            item="Tổng"><label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng
            <span class="badge bg-danger" id="badge_tongdon">14</span></label>
    </div>
    <div class="col-md-auto">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"
            item="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm" for="btnradio2">Chờ xác nhận <span
                class="badge bg-danger" id="badge_tongdon">14</span></label>
    </div>
    <div class="col-md-auto">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off"
            item="Đã xác nhận"><label class="btn btn-outline-primary btn-sm" for="btnradio3">Đã
            xác nhận <span class="badge bg-danger" id="badge_tongdon">14</span></label>
    </div>
    <div class="col-md-auto">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off"
            item="Đã hủy"><label class="btn btn-outline-primary btn-sm" for="btnradio4">Đã hủy
            <span class="badge bg-danger" id="badge_tongdon">14</span></label>
    </div>
    <div class="col-md-auto">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="Mã đơn" id="search">
            <button class="btn btn-sm btn-primary" type="button"
                onclick="searchOrder(this.parentElement)">Tìm</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    @include('dynamic_layout.tableorder')
</div>
