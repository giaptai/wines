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
            <input type="text" class="form-control form-control-sm" value="" placeholder="Tên..." id="search_id">
            <button class="btn btn-sm btn-primary" onclick="searched(this.parentElement)" type="button">Search</button>
        </div>
    </div>
</div>

<div class="table-responsive" id="quanlytheloai">
    @include('dynamic_layout.tablecategory')
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">Thêm thành công</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<script src="{{ url('./js/quanly_theloai.js') }}"></script>
