<?php $sum = 0; ?>
@if (sizeof($result) > 0)
    @foreach ($result as $item)
        <?php $sum += $item['price'] * $item['quantity']; ?>
        <tr>
            <td>
                <div class="d-flex">
                    <img class="img"
                        src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                        width="90"><span class="">{!! $item['name'] !!}</span>
                </div>
            </td>
            <td>
                <div class="d-flex">
                    <button class="btn bi bi-dash-circle" id="btndel{{ $item['id'] }}"
                        onclick="minustocart({{ $item['id'] }})"></button>
                    <input id="inp{{ $item['id'] }}" type="number" min="1" max="99"
                        class="bg-white border-0 text-center" step="1" disabled value="<?php echo $item['quantity']; ?>"
                        size="1">
                    <button class="btn bi bi-plus-circle" onclick="addtocart({{ $item['id'] }})"></button>
                </div>
            </td>
            <td>{{ number_format($item['price']) }}</td>
            <td>
                <div class="row">
                    <span class="col-12">{{ number_format($item['price'] * $item['quantity']) }}</span>
                    <span class="col-12 text-decoration-underline text-danger"
                        onclick="removeItemCart({{ $item['id'] }})"><i class="bi bi-trash3"></i>
                    </span>
                </div>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4" class="fw-semibold">Không có sản phẩm nào !</td>
    </tr>
@endif
