<table class="table align-middle table-hover table-sm">
    <thead class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Email</th>
            <th scope="col">Điện thoại</th>
            {{-- <th scope="col">Chức vụ</th> --}}
            {{-- <th scope="col">Số nhà, đường</th>
            <th scope="col">Quận/ huyện</th>
            <th scope="col">Phường/ xã</th>
            <th scope="col">Thành phố/ tỉnh</th> --}}

        </tr>
    </thead>
    <tbody id="tbody">
        @if (isset($Customers['data']) && $Customers['meta']['total'] > 0)
            <?php $stt = ($Customers['meta']['current_page'] - 1) * 15; ?>
            @foreach ($Customers['data'] as $item)
            <tr>
                <th scope="row">{!!++$stt!!}</th>
                <td>{!!$item['lastname'].' '.$item['firstname']!!}</td>
                <td>{!!$item['email']!!}</td>
                <td>{!!$item['phone']!!}</td>
                {{-- <td>{!! $item['type'] $item['phone']!!}</td> --}}
                {{-- <td>{!!$item['address']!!}</td>
                <td>{!!$item['district']!!}</td>
                <td>{!!$item['wards']!!}</td>
                <td>{!!$item['city']!!}</td> --}}
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">
                    <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto"
                        style="width:fit-content ;">
                        <i class="fa-regular fa-face-sad-tear display-5"></i>
                        <p class="fw-semibold mt-3 mb-3 fs-5">Không có tài khoản</p>
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>
@if (isset($Customers['data']) && $Customers['meta']['total'] > 0)
    <nav aria-label="Page navigation example" class="col-md-12 my-3">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
            @for ($i = 1; $i <= $Customers['meta']['last_page']; $i++)
                @if ($i == $Customers['meta']['current_page'])
                    <li class="page-item"><a class="page-link active">{!! $i !!}</a></li>
                @else
                    <li class="page-item"><a class="page-link"
                            onclick="phantrang({!! $i !!})">{!! $i !!}</a></li>
                @endif
            @endfor
        </ul>
    </nav>
@endif
