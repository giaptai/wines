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
    <tbody id="show-order">
        <?php $stt = ($currentpage - 1) * 15;?>
        @foreach ($orderArray as $item)
        <tr>
            <th scope="row">{!!++$stt; !!}</th>
            <td>{!! $item['id']; !!}</td>
            <td><?php echo date_format(new DateTime($item['created_at']), 'd/m/Y h:i:s'); ?></td>
            <td><?php echo number_format($item['total']); ?></td>
            <td>
                <span>
                    @if ($item['status']==0)
                        Chờ xác nhận
                    @elseif($item['status']==1)
                        Đã xác nhận
                    @else
                        Đã hủy
                    @endif
                </span>
            </td>
            <td>
                <?php
                    if($item['status']==0){
                ?>
                <button class="btn btn-sm bi bi-check-circle-fill text-success"
                    onclick="updateOrder(<?php echo $item['id']; ?>, 1, this.parentElement.parentElement)">
                </button>
                <button class="btn btn-sm bi bi-x-lg text-danger"
                    onclick="updateOrder(<?php echo $item['id']; ?>, 2, this.parentElement.parentElement)">
                </button>
                <button class="btn btn-sm bi bi-exclamation-circle-fill text-primary"></button>
                <?php
                    }elseif ($item['status']>=1) {
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
{{-- {!! $orders !!} --}}
<nav aria-label="Page navigation example" class="col-md-12 my-3">
    <ul class="pagination pagination-sm justify-content-end" id="phantrang">
        @for ($i = 0; $i < ceil($pagin / 15); $i++)
            @if ($i == $currentpage-1)
                <li class="page-item"><a class="page-link active">{!! ($i + 1) !!}</a></li>
            @else
            <li class="page-item"><a class="page-link" onclick="phantrang({!! ($i + 1) !!})">{!! ($i + 1) !!}</a></li>
            @endif
        @endfor
    </ul>
</nav>