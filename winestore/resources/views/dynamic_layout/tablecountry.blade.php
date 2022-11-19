<div class="modal fade" id="themquocgia" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel2">Thêm quốc gia</h5>
                <button type="lbutton" class="btn-close" data-bs-dismiss="modal" aria-labe="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center justify-content-around">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label fw-semibold">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="name-country-add"
                                value="Quốc gia A">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc-country-add" placeholder="Mô tả gì đó" style="height: 10rem">Tui crush Minh Thư.</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    onclick="add({!! isset($Countries['meta']['current_page']) ? $Countries['meta']['current_page'] : 1 !!})">Thêm</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-auto">
    <input type="radio" class="btn-check" autocomplete="off">
    <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng quốc gia <span class="badge bg-danger"
            id="badge_tongdon"> {!! isset($Countries['meta']['total']) ? $Countries['meta']['total'] : 0 !!}</span></label>
</div>
<table class="table align-middle table table-hover table-sm">
    <thead class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col" style="width:70%;">Mô tả</th>
            <th scope="col">Xem</th>
            <th scope="col">Xóa</th>
        </tr>
    </thead>

    <tbody id="show-product">
        @if (isset($Countries['data']) && $Countries['meta']['total'] > 0)
            <?php $stt = ($Countries['meta']['current_page'] - 1) * 15; ?>
            @foreach ($Countries['data'] as $item)
                <tr>
                    <th scope="row"><?php echo ++$stt; ?></th>
                    <th scope="row"><?php echo $item['name']; ?></th>
                    <td><?php echo $item['description']; ?></td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#minhthu<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>">
                            <i class="fa-solid fa-eye text-primary"> </i>
                        </button>
                    </td>
                    <td>
                        <button value="<?php echo $item['id']; ?>" class="delete-btn btn btn-sm fa-solid fa-circle-xmark text-danger"
                            type="button" onclick="deleted({!! $item['id'] !!}, {!! $Countries['meta']['current_page'] !!})">
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="minhthu<?php echo $item['id']; ?>" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Sửa quốc gia</h5>
                                <button type="lbutton" class="btn-close" data-bs-dismiss="modal" aria-labe="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center justify-content-around">
                                    <div class="col-md-12">
                                        <div class="row col-md-auto">
                                            <div class="col-md-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" disabled
                                                        value="<?php echo $item['id']; ?>">
                                                    <label for="floatingInput">Mã</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-floating mb-3">
                                                    <input name="name-country-modal-<?php echo $item['id']; ?>"
                                                        id="name-country-modal-<?php echo $item['id']; ?>"
                                                        class="form-control" value="<?php echo $item['name']; ?>">
                                                    <label for="floatingInput">Tên quốc gia</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="desc-country-modal-{{ $item['id'] }}" placeholder="Mô tả gì đó"
                                                        style="height: 12rem">{{ $item['description'] }}</textarea>
                                                    <label for="floatingInput">Mô tả</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                    onclick="edit(<?php echo $item['id']; ?>, {!! $Countries['meta']['current_page'] !!})">Sửa</button>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto"
                        style="width:fit-content ;">
                        <i class="fa-regular fa-face-sad-cry display-5"></i>
                        <p class="fw-semibold mt-3 mb-3 fs-5">Không có quốc gia nào !</p>
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>
{{-- {{ $countryArray->link() }} --}}
@if (isset($Countries['data']) && $Countries['meta']['total'] > 0)
    <nav aria-label="Page navigation example" class="col-md-12 my-3">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
            @for ($i = 1; $i <= $Countries['meta']['last_page']; $i++)
                @if ($i == $Countries['meta']['current_page'])
                    <li class="page-item"><a class="page-link active">{!! $i !!}</a></li>
                @else
                    <li class="page-item"><a class="page-link"
                            onclick="phantrang(`{!! $i !!}`)">{!! $i !!}</a></li>
                @endif
            @endfor
        </ul>
    </nav>
@endif

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toast-quocgia">404</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
