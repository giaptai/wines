<table class="table align-middle table-hover table-sm">
    <thead class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Email</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <?php $stt = ($currentpage - 1) * 15; ?>
        @php
                foreach ($customerArr as $key => $value) {
                    echo '<tr>
                        <th scope="row">' .++$stt .'</th>
                        <td>' .$value['lastname'] ." ".$value['firstname'].'</td>
                        <td>' .$value['email'] .'</td>
                        <td>' .$value['phone'] .'</td>
                        <td>' .($value['type'] == 1 ? 'Mở' : 'Khóa') .'</td>
                        <td><i class="bi bi-lock-fill"></i></td>
                    </tr>';
                }
        @endphp
    </tbody>
</table>
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