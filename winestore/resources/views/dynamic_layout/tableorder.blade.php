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
{!! $orders !!}