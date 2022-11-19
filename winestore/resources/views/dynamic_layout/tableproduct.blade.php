<div class="col-md-auto">
    <input type="radio" class="btn-check" autocomplete="off">
    <label class="btn btn-outline-primary btn-sm">Tổng sản phẩm
        <span class="badge bg-danger" id="badge_tongdon"> {!! isset($Products['meta']['total']) ? $Products['meta']['total'] : 0 !!}</span>
    </label>
</div>

<div class="modal fade" id="minhthu" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm sản phẩm</h5>
                <button type="lbutton" class="btn-close" data-bs-dismiss="modal" aria-labe="Close">
                </button>
            </div>
            <form id="formAdd" method="POST" {{-- action="{{ route('products-edit', ['id'=>$Products['meta']['current_page']]) }}"  --}} enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row justify-content-center justify-content-around">
                        <div class="col-md-4">
                            <div class="col-md-auto border" style="height: 24rem;">
                                <img class="rounded mx-auto d-block" width="80%" height="80%" id="showimage"
                                    style="object-fit: cover;" src="">
                            </div>
                            <div class="col-md-auto mt-3">
                                <div class="input-group mb-3">
                                    <input type="file" {{-- onchange="uploadAnh()" --}} class="form-control"
                                        id="image-product-modal" name="image-product-modal" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row col-md-auto">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input name="name-product-modal" id="name-product-modal" class="form-control"
                                            value="">
                                        <label for="floatingInput">Tên sản phẩm</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Giới thiệu:</label>
                                    <textarea name="desc-product-modal" id="desc-product-modal" style="height: 161px" class="form-control">ok</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Loại rượu:</label>
                                        <select class="form-select" name="category-product-modal"
                                            id="category-product-modal">
                                            @foreach ($categoryArray as $item)
                                                <option value="{!! $item['id'] !!}">{!! $item['name'] !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Thương hiệu:</label>
                                        <select class="form-select" name="brand-product-modal" id="brand-product-modal">
                                            @foreach ($brandArray as $item)
                                                <option value="{!! $item['id'] !!}">{!! $item['name'] !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Quốc gia:</label>
                                        <select class="form-select" name="country-product-modal"
                                            id="country-product-modal">
                                            @foreach ($countryArray as $item)
                                                <option value="{!! $item['id'] !!}">{!! $item['name'] !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class=" mb-3">
                                        <label for="" class="form-label">Số lượng:</label>
                                        <input type="number" class="form-control" id="quantity-product-modal"
                                            name="quantity-product-modal" value="1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class=" mb-3">
                                        <label for="" class="form-label">Thể tích:</label>
                                        <input type="number" class="form-control" id="vol-product-modal"
                                            name="vol-product-modal" value="750">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class=" mb-3">
                                        <label for="" class="form-label">Nồng độ:</label>
                                        <input type="number" class="form-control" id="tone-product-modal"
                                            name="tone-product-modal" value="12">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class=" mb-3">
                                        <label for="" class="form-label">Năm:</label>
                                        <input type="number" class="form-control" id="year-product-modal"
                                            name="year-product-modal" value="{!! rand(1897, 2022) !!}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Giá:</label>
                                        <input type="number" class="form-control" id="price-product-modal"
                                            name="price-product-modal" value="2500000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btnsubmit" class="btn btn-primary" data-bs-dismiss="modal"
                    onclick="add({!! $Products['meta']['current_page'] !!})">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table align-middle table-hover table-sm">
    <thead class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Tổng</th>
            <th scope="col">Xem</th>
            <th scope="col">Xóa</th>
        </tr>
    </thead>
    <tbody id="show-product">
        @if (isset($Products['data']) && $Products['meta']['total'] > 0)
            <?php $stt = ($Products['meta']['current_page'] - 1) * 10; ?>
            @foreach ($Products['data'] as $value)
                <tr>
                    <th scope="row">{!! ++$stt !!}</th>
                    <th scope="row">{!! $value['id'] !!}</th>
                    <td>
                        <div class="d-flex align-items-center">
                            <img class="img" src="{{ asset('/' . $value['images']) }}" width="75">
                            <span>{!! $value['name'] !!}</span>
                        </div>
                    </td>
                    <td>{!! $value['quantity'] !!}</td>
                    <td>{!! number_format($value['price']) !!}</td>
                    <td>{!! number_format($value['price'] * $value['quantity']) !!}</td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#minhthu{!! $value['id'] !!}" id="{!! $value['id'] !!}">
                            <i class="fa-solid fa-eye text-primary"></i>
                        </button>
                    </td>
                    <td>
                        <button value="{!! $value['id'] !!}"
                            class="delete-btn btn btn-sm fa-solid fa-trash-can text-danger" type="button"
                            onclick="deleted({!! $value['id'] !!}, {!! $Products['meta']['current_page'] !!})">
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">
                    <div class="d-flex flex-column text-center border p-3 justify-content-center m-auto"
                        style="width:fit-content ;">
                        <i class="fa-solid fa-face-grin-squint-tears display-5"></i>
                        <p class="fw-semibold mt-3 mb-3 fs-5">Không có sản phẩm nào !</p>
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>

@foreach ($Products['data'] as $value)
    <div class="modal fade" id="minhthu{!! $value['id'] !!}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labe="Close"></button>
                </div>
                <form id="formOkk{!! $value['id'] !!}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-center justify-content-around">
                            <div class="col-md-4">
                                <div class="col-md-auto border" style="height: 24rem;">
                                    <img class="rounded mx-auto d-block" width="80%" height="80%"
                                        style="object-fit: cover;" src="{{ asset('/' . $value['images']) }}">
                                </div>
                                <div class="col-md-auto mt-3">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control"
                                            id="image-product-modal-{!! $value['id'] !!}"
                                            name="image-product-modal" value="{!! $value['images'] !!}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row col-md-auto">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="id-product-modal"
                                                readonly value="{!! $value['id'] !!}">
                                            <label for="floatingInput">Mã</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating mb-3">
                                            <input name="name-product-modal"
                                                id="name-product-modal-{!! $value['id'] !!}" class="form-control"
                                                value="{!! $value['name'] !!}">
                                            <label for="floatingInput">Tên sản phẩm</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Giới thiệu:</label>
                                        <textarea name="desc-product-modal" id="desc-product-modal-{!! $value['id'] !!}" style="height: 161px"
                                            class="form-control">{!! $value['description'] !!}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Loại rượu:</label>
                                            <select class="form-select" name="category-product-modal"
                                                id="category-product-modal-{!! $value['id'] !!}">
                                                @foreach ($categoryArray as $item)
                                                    <option value="{!! $item['id'] !!}" {!! $value['category'][0]['id'] == $item['id'] ? 'selected' : '' !!}>
                                                        {!! $item['name'] !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label">Thương hiệu:</label>
                                            <select class="form-select" name="brand-product-modal"
                                                id="brand-product-modal-{!! $value['id'] !!}">
                                                @foreach ($brandArray as $item)
                                                    <option value="{!! $item['id'] !!}" {!! $value['brand'][0]['id'] == $item['id'] ? 'selected' : '' !!}>
                                                        {!! $item['name'] !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Quốc gia:</label>
                                            <select class="form-select" name="country-product-modal"
                                                id="country-product-modal-{!! $value['id'] !!}">
                                                @foreach ($countryArray as $item)
                                                    <option value="{!! $item['id'] !!}" {!! $value['origin'][0]['id'] == $item['id'] ? 'selected' : '' !!}>
                                                        {!! $item['name'] !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class=" mb-3">
                                            <label for="" class="form-label">Số lượng:</label>
                                            <input type="number" class="form-control"
                                                id="quantity-product-modal-{!! $value['id'] !!}"
                                                name="quantity-product-modal" value="{!! $value['quantity'] !!}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class=" mb-3">
                                            <label for="" class="form-label">Thể tích:</label>
                                            <input type="number" class="form-control"
                                                id="vol-product-modal-{!! $value['id'] !!}"
                                                name="vol-product-modal" value="{!! $value['vol'] !!}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class=" mb-3">
                                            <label for="" class="form-label">Nồng độ:</label>
                                            <input type="number" class="form-control"
                                                id="tone-product-modal-{!! $value['id'] !!}"
                                                name="tone-product-modal" value="{!! $value['c'] !!}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class=" mb-3">
                                            <label for="" class="form-label">Năm:</label>
                                            <input type="number" class="form-control"
                                                id="year-product-modal-{!! $value['id'] !!}"
                                                name="year-product-modal" value="{!! $value['year'] !!}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Giá:</label>
                                            <input type="number" class="form-control"
                                                id="price-product-modal-{!! $value['id'] !!}"
                                                name="price-product-modal" value="{!! $value['price'] !!}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btnsubmit" class="buttonSubmit btn btn-primary"
                            data-bs-dismiss="modal"
                            onclick="edit({!! $value['id'] !!} ,{!! $Products['meta']['current_page'] !!})">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@if (isset($Products['data']) && $Products['meta']['total'] > 0)
    <nav aria-label="Page navigation example" class="col-md-12 my-3">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
            @for ($i = 1; $i <= $Products['meta']['last_page']; $i++)
                @if ($i == $Products['meta']['current_page'])
                    <li class="page-item"><a class="page-link active">{!! $i !!}</a></li>
                @else
                    <li class="page-item">
                        <a class="page-link"
                            onclick="phantrang(`{!! $i !!}`)">{!! $i !!}</a>
                    </li>
                @endif
            @endfor
        </ul>
    </nav>
@endif

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toast-sanpham">Thêm sản phẩm thành công</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
