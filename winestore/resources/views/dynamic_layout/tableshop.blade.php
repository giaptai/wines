<div class="d-flex flex-column mb-3 gx-5 sticky-top bg-white border p-3 justify-content-between">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <select id="dispose" class="form-select form-select-sm rounded-0 text-center"
                aria-label="Default select example" style="width: 11rem">
                <option selected value="">------Xếp theo------</option>
                <option {!! isset($dispose) && $dispose == 'ASC' ? 'selected' : '' !!} value="ASC">Giá thấp đến cao</option>
                <option {!! isset($dispose) && $dispose == 'DESC' ? 'selected' : '' !!} value="DESC">Giá cao đến thấp</option>
            </select>
        </div>
        <div class="col-md-auto">
            <span class="fw-semibold text-danger mx-2" id="soluong"> (Có {!! $paginate !!} sản phẩm)</span>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 g-3 bg-light">
    @foreach ($wineArray as $item)
        <div class="col">
            <div class="card h-100 rounded-0 p-0 product-infor" 
            onmouseover="this.style.transition= 'transform .4s'; this.style.borderRight = '5px solid #801517';" 
            onmouseout="this.style.transition= 'transform .4s'; this.style.border= 'none';">
                <div class="row g-0">
                    <div class="col-md-4 col-sm-12">
                        <a href="{{ route('product_details', ['id' => $item['id']]) }}">
                            <img class="image-product" src="{{ $item['images'] }}"
                                style="height: 100%; width: 100%;
                            background-size:cover;background-repeat: no-repeat;background-position: center;"
                                onmouseover="this.style.transition= 'transform .4s'; this.style.transform= 'scale(0.9)';" 
                                onmouseout="this.style.transition= 'transform .4s'; this.style.transform= 'scale(1)'; "/>
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <span class="fs-5">{{ number_format($item['price']) }} đ</span>
                        </div>
                        <div class="card-footer bg-white border-0">
                            @if (session()->exists('cart.' . $item['id']))
                                <button type="button" class="btn rounded-0 disabled btn-sm btn-primary">Trong giỏ
                                    hàng</button>
                            @else
                                <button type="button" onclick="addtocart({{ $item['id'] }})"
                                    class="btn rounded-0 btn-sm btn-outline-primary" id="btn{{ $item['id'] }}">Thêm
                                    vào giỏ</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<nav aria-label="Page navigation example" class="col-md-12 my-3">
    <ul class="pagination pagination-sm justify-content-end" id="phantrang">
        @for ($i = 0; $i < ceil($paginate / 10); $i++)
            @if ($i == $currentpage - 1)
                <li class="page-item"><a class="page-link active">{!! $i + 1 !!}</a></li>
            @else
                <li class="page-item"><a class="page-link"
                        onclick="phantrang({!! $i + 1 !!})">{!! $i + 1 !!}</a></li>
            @endif
        @endfor
    </ul>
</nav>
