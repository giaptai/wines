<table class="table table-hover table-sm">
    <thead class="table table-striped table-sm">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã đơn</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col" style="width:12% ;">Thao tác</th>
        </tr>
    </thead>
    <tbody id="show-order">
        @if (isset($Orders['data']) && $Orders['total'] > 0)
            <?php $stt = ($Orders['current_page'] - 1) * 15; ?>

            <button type="button" class="btn btn-primary">
                Tổng đơn: <span class="badge text-bg-light">{!! $Orders['total'] !!} </span>
            </button>
            @foreach ($Orders['data'] as $item)
                <tr>
                    <th scope="row">{!! ++$stt !!}</th>
                    <th>{!! $item['id'] !!}</th>
                    <td><?php echo date_format(new DateTime($item['created_at']), 'd/m/Y h:i:s'); ?></td>
                    <td><?php echo number_format($item['total']); ?></td>
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
                            <button class="btn btn-sm fa-solid fa-check-double text-success" data-status="1"
                                onclick="updateOrder(<?php echo $item['id']; ?>, 1, {!! $Orders['current_page'] !!})">
                            </button>
                            <button class="btn btn-sm fa-solid fa-trash text-danger" data-status="2"
                                onclick="updateOrder(<?php echo $item['id']; ?>, 3, {!! $Orders['current_page'] !!})">
                            </button>
                            <a class="btn btn-sm fa-solid fa-receipt text-primary"
                                href="{{ route('order-details', ['id' => $item['id']]) }}"></a>
                        @elseif($item['status'] == 1)
                            <button class="btn btn-sm fa-solid fa-circle-check text-primary" data-status="1"
                                onclick="updateOrder(<?php echo $item['id']; ?>, 2, {!! $Orders['current_page'] !!})">
                            </button>
                            <a class="btn btn-sm fa-solid fa-receipt text-primary"
                                href="{{ route('order-details', ['id' => $item['id']]) }}"></a>
                        @else
                            <a class="btn btn-sm fa-solid fa-receipt text-primary"
                                href="{{ route('order-details', ['id' => $item['id']]) }}"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">
                    <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto"
                        style="width:fit-content ;">
                        <i class="fa-regular fa-face-sad-tear display-5"></i>
                        <p class="fw-semibold mt-3 mb-3 fs-5">Không có đơn hàng</p>
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>

{{-- {{ $countryArray->link() }} --}}
@if (isset($Orders['data']) && $Orders['total'] > 0)
    <nav aria-label="Page navigation example" class="col-md-12 my-3">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
            @for ($i = 1; $i <= $Orders['last_page']; $i++)
                @if ($i == $Orders['current_page'])
                    <li class="page-item"><a class="page-link active">{!! $i !!}</a></li>
                @else
                    <li class="page-item"><a class="page-link"
                            onclick="phantrang({!! $i !!})">{!! $i !!}</a></li>
                @endif
            @endfor
        </ul>
    </nav>
@endif
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toast-donhang">Cập nhật đơn hàng thành công</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
