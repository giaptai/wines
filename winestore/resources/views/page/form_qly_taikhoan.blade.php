<div class="p-3 row justify-content-between sticky-top bg-light">
    <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
            value="Tổng đơn"><label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng tài khoản <span
                class="badge bg-danger" id="badge_tongdon"><?= sizeof($accounts) ?></span></label></div>
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="Email" id="email">
            <input type="tel" class="form-control form-control-sm" placeholder="Số điện thoại" id="phone">
            <button class="btn btn-sm btn-primary" type="button" onclick="searchAccounts()">Tìm</button>
        </div>
    </div>
</div>
<div class="table-responsive">
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
    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang"> --}}
            {{-- <li class="page-item disabled"><a class="page-link">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" @disabled(true)>...</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
            <?php
            // for ($i = 0; $i < ceil($pagin / 10); $i++) {
            //     if ($i == 0) {
            //         echo '<li class="page-item"><a class="page-link active" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
            //     } else {
            //         echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
            //     }
            // }
            ?>
        {{-- </ul>
    </nav> --}}

</div>
