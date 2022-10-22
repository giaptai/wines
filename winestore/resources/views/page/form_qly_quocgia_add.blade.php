{{-- @extends('page.quanly_sanpham')
@section('content-them') --}}
<div class="p-5">
    <form method="get" action="{{ route('add-product-add') }}"
        class="row justify-content-center shadow p-5 bg-body rounded justify-content-between">
        <h4 class="title" >Thêm quốc gia</h4>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label fw-semibold">Tên</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="name-country" value="Việt Nam Cộng Hòa">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold">Mô tả</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="desc-country" placeholder="Mô tả gì đó" style="height: 12rem">Rượu vang đỏ hay còn gọi là vang đỏ hay rượu nho đỏ là một dạng phổ biến của rượu vang được làm từ những loại nho đậm màu.  Vang đỏ thường có màu đậm pha trộn giữa màu đỏ, đen và tím.  Quá trình làm rượu vang đỏ thì vỏ nho cũng được nghiền nát cùng với ruột để tạo ra nước ép rồi lên men thành rượu.</textarea>
            </div>
        </div>
        <div class="d-flex gx-2">
            <a type="button" class="btn btn-secondary me-3" href="{{ route('countries') }}" >Quay lại</a>
            <a type="button" class="btn btn-primary">Thêm</a>
        </div>
    </form>
</div>

{{-- @endsection --}}
