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
        @php
            $i = 0;
            if (sizeof($accounts) > 0) {
                foreach ($accounts as $key => $value) {
                    echo '<tr>
                        <th scope="row">' .
                        ++$i .
                        '</th>
                        <td>' .
                        $value['name'] .
                        '</td>
                        <td>' .
                        $value['email'] .
                        '</td>
                        <td>' .
                        $value['phone'] .
                        '</td>
                        <td>' .
                        ($value['status'] == 1 ? 'Mở' : 'Khóa') .
                        '</td>
                        <td><i class="bi bi-lock-fill"></i></td>
                    </tr>';
                }
            }
        @endphp
    </tbody>
</table>
{!! $accounts !!}