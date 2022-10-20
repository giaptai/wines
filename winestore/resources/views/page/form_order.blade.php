<div class=" p-3 row row-cols-1 row-cols-md-4">
    <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio1"
            autocomplete="off" value="Tổng đơn"><label class="btn btn-outline-primary btn-sm"
            for="btnradio1">Tổng đơn <span class="badge bg-danger"
                id="badge_tongdon">14</span></label></div>
    <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio2"
            autocomplete="off" value="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm"
            for="btnradio1">Chờ xác nhận <span class="badge bg-danger"
                id="badge_tongdon">14</span></label></div>
    <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio2"
            autocomplete="off" value="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm"
            for="btnradio1">Đã xác nhận <span class="badge bg-danger"
                id="badge_tongdon">14</span></label></div>
    <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio2"
            autocomplete="off" value="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm"
            for="btnradio1">Đã hủy <span class="badge bg-danger"
                id="badge_tongdon">14</span></label></div>
    <div class="col-md-auto">
        <div class="input-group"><input type="text" class="form-control form-control-sm"
                placeholder="Search"><button class="btn btn-sm btn-success"
                type="submit">Go</button></div>
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
                <th scope="col">Chi tiết</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row">20</th>
                <td>20220517103447</td>
                <td>17-05-2022 10:34:47</td>
                <td>12,040,000 đ</td>
                <td>Chờ xác nhận</td>
                <td><i class="bi bi-x-lg text-danger"> </i><i
                        class="bi bi-exclamation-circle-fill text-primary"></i></td>
            </tr>
        </tbody>
    </table>
    {{-- {!! $orders !!} --}}
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm justify-content-end">
            <li class="page-item disabled"><a class="page-link">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>