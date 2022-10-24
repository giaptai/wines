<div class="p-3 row justify-content-between sticky-top bg-light">
    <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
            value="Tổng đơn"><label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng tài khoản <span
                class="badge bg-danger" id="badge_tongdon"><?= sizeof($accounts) ?></span></label></div>
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="Email" id="email">
            <input type="tel" class="form-control form-control-sm" placeholder="Số điện thoại" id="phone">
            <button class="btn btn-sm btn-primary" type="button" onclick="searchAccounts()">Tìm</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    @include('dynamic_layout.tableclient')
</div>
