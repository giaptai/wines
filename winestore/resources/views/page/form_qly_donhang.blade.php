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
    <table class="table table-hover table-sm">
        <thead class="table table-striped table-sm">
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
            @foreach ($orders as $item)
            <tr>
                <th scope="row"><?php echo $item->id; ?></th>
                <td><?php echo $item->id; ?></td>
                <td><?php echo date_format(new DateTime($item->date), 'd/m/Y h:i:s'); ?></td>
                <td><?php echo number_format($item->total_money); ?></td>
                <td><span><?php echo $item->status; ?></span></td>
                <td>
                    <?php
                        if($item->status=='Chờ xác nhận'){
                    ?>
                    <button class="btn btn-sm bi bi-check-circle-fill text-success"
                        onclick="updateOrder(<?php echo $item->id; ?>, `Đã xác nhận`, this.parentElement.parentElement)">
                    </button>
                    <button class="btn btn-sm bi bi-x-lg text-danger"
                        onclick="updateOrder(<?php echo $item->id; ?>, `Đã hủy`, this.parentElement.parentElement)">
                    </button>
                    <button class="btn btn-sm bi bi-exclamation-circle-fill text-primary"></button>
                    <?php
                        }elseif ($item->status=='Đã xác nhận' || $item->status=='Đã hủy') {
                    ?>
                    <button class="btn btn-sm bi bi-exclamation-circle-fill text-primary"></button>
                    <?php
                    }
                    ?>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
            <li class="page-item disabled"><a class="page-link">Previous</a></li> --}}
            <?php
            // for ($i = 0; $i < ceil($pagin / 15); $i++) {
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
    {!! $orders !!}
</div>
