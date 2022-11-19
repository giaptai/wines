<div class="d-flex flex-column mb-3 gx-5 sticky-top bg-white border p-3 justify-content-between">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <select id="dispose" class="form-select form-select-sm rounded-0 text-center"
                aria-label="Default select example" style="width: 11rem">
                <option selected value="">------Xếp theo------</option>
                <option {!! app('request')->input('dispose')!=null && $dispose == 'ASC' ? 'selected' : '' !!} value="ASC">Giá thấp đến cao</option>
                <option {!! app('request')->input('dispose')!=null && $dispose == 'DESC' ? 'selected' : '' !!} value="DESC">Giá cao đến thấp</option>
            </select>
        </div>
        <div class="col-md-auto">
            <span class="fw-semibold text-danger mx-2" id="soluong"> (Có {!! $Wines['meta']['total'] !!} sản phẩm)</span>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 g-3 bg-light">
    @if (isset($Wines['data']) && $Wines['meta']['total'] > 0)
        @foreach ($Wines['data'] as $item)
            <div class="col">
                <div class="card h-100 rounded-0 p-0 product-infor"
                    onmouseover="
                    // this.style.transition= 'transform .4s'; this.style.transform= 'scale(0.95)'; 
                    this.style.borderRight = '5px solid #801517';"
                    onmouseout="
                    // this.style.transition= 'transform .4s'; this.style.transform= 'scale(1)'; 
                    this.style.borderRight= 'none';"
                    >
                    <div class="row g-0">
                        <div class="col-md-4 col-sm-12">
                            <a href="{{ route('product_details', ['id' => $item['id']]) }}">
                                <img class="image-product" src="{{ $item['images'] }}"
                                    style="height: 90%; width: 90%;
                        background-size:cover;background-repeat: no-repeat;background-position: center;"
                                   onmouseover="this.style.transition= 'transform .4s'; this.style.transform= 'scale(0.9)';"
                            onmouseout="this.style.transition= 'transform .4s'; this.style.transform= 'scale(1)'; " 
                            />
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="card-body">
                                <span class="fs-6 fw-semibold text-danger">{{ $item['name'] }}</span><br>
                                <span class="fs-5 fw-semibold"
                                    style="color: #990d23">{{ number_format($item['price']) }} đ</span>
                                <div style="font-size: 14px">
                                    <p class="text-dark">
                                        {{ $item['category'][0]['name'] }},
                                        {{ $item['brand'][0]['name'] }},
                                        {!! $item['origin'][0]['name'] !!}
                                    </p>
                                </div>
                                @if (session()->exists('cart.' . $item['id']))
                                    <button type="button" class="btn rounded-0 disabled btn-sm btn-danger">Trong giỏ
                                        hàng</button>
                                @else
                                    <button type="button" onclick="addtocart({{ $item['id'] }})"
                                        class="btn rounded-0 btn-sm btn-outline-danger" id="btn{{ $item['id'] }}">Thêm
                                        vào giỏ</button>
                                @endif
                            </div>
                            <div class="card-footer bg-white border-0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="card vh-100 m-auto align-items-center justify-content-center w-100">
            <i class="bi bi-heartbreak display-4"></i>
            <span class="fs-5 fw-semibold" style="color: #990d23">Không có bất kì sản phẩm nào</span>
        </div>
    @endif

</div>

@if (isset($Wines['data']) && $Wines['meta']['total'] > 0)
    <nav aria-label="Page navigation example" class="col-md-12 my-3">
        <ul class="pagination pagination-sm justify-content-end" id="phantrang">
            @for ($i = 1; $i <= $Wines['meta']['last_page']; $i++)
                @if ($i == $Wines['meta']['current_page'])
                    <li class="page-item"><a class="page-link active">{!! $i !!}</a></li>
                @else
                    <li class="page-item">
                        <a class="page-link"  onclick="phantrang({!! $i !!})">{!! $i !!}</a>
                    </li>
                @endif
            @endfor
        </ul>
    </nav>
@endif
