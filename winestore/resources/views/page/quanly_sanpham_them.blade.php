@extends('page.quanly')
@section('content_quanly')
    <div class="col-md-9 col-lg-10">
        zwsnnkstqcikvjwh
        <?php
        $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        $brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
        ?>
        <div class="container-md p-0">
            @include('page.form_qly_sanpham_add')
        </div>
    </div>
@endsection
