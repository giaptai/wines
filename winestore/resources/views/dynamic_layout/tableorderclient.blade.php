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
        <button type="button" class="btn btn-sm btn-primary my-3">
            Tổng đơn cá nhân: <span class="badge text-bg-light">{!! $OrderClient['total']==null || $OrderClient['total']<=0 ? '0': $OrderClient['total'] !!} </span>
        </button>
        @if (isset($OrderClient['data']) && $OrderClient['total'] > 0)
            <?php $stt = ($OrderClient['current_page'] - 1) * 15;?>
            
            @foreach ($OrderClient['data'] as $item)
                <tr>
                    <th scope="row">{!! ++$stt !!}</th>
                    <td>{!! $item['id'] !!}</td>
                    <td>{!! date_format(new DateTime($item['created_at']), 'd/m/Y h:i:s') !!}</td>
                    <td>{!! number_format($item['total']) !!} đ</td>
                    <td>
                        @if ($item['status'] == 0)
                            <span class="text-warning fw-semibold">Chờ xác nhận</span>
                        @elseif($item['status'] == 1)
                            <span class="text-primary fw-semibold">Đã xác nhận</span>
                        @elseif($item['status'] == 2)
                            <span class="text-success fw-semibold">Đã giao</span>
                        @else
                            <span class="text-danger fw-semibold"> Đã hủy</span>
                        @endif
                    </td>
                    <td>
                        @if ($item['status'] == 0)
                            <button class="btn btn-sm bi bi-x-lg text-danger"
                                onclick="updateOrder(<?php echo $item['id']; ?>, {!! $OrderClient['current_page'] !!})">
                            </button>
                            <a class="btn btn-sm bi bi-exclamation-circle-fill text-primary"
                                href="{{ route('my-order-details', ['id' => $item['id']]) }}"></a>
                        @else
                            <a class="btn btn-sm bi bi-exclamation-circle-fill text-primary"
                                href="{{ route('my-order-details', ['id' => $item['id']]) }}"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">
                    <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto"
                        style="width:fit-content ;">
                        <i class="bi bi-emoji-smile-upside-down display-5"></i>
                        <p class="fw-semibold mt-3 mb-3 fs-6">Không có đơn hàng nào !</p>
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>

@if (isset($OrderClient['data']) && $OrderClient['total'] > 0)
    <nav aria-label="Page navigation example" class="col-md-12 my-3">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
            @for ($i = 1; $i <= $OrderClient['last_page']; $i++)
                @if ($i == $OrderClient['current_page'])
                    <li class="page-item"><a class="page-link active">{!! $i !!}</a></li>
                @else
                    <li class="page-item"><a class="page-link"
                            onclick="phantrang({!! $i !!})">{!! $i !!}</a></li>
                @endif
            @endfor 
        </ul>
    </nav>
@endif