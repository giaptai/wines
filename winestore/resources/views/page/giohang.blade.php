@extends('home')
@section('content')
    <div class="container-md shadow mt-4 mb-4" style="width: 80%">
        <?php
        echo 'https://docs.developers.supership.vn/guide/areas.html#lay-thong-tin-tinh-thanh-pho/ dữ liệu tỉnh thành VN';
        ?>
        <div class="pt-4 border-top">
            <div class="row" id="my-cart">
                @include('dynamic_layout.tablecart')
            </div>
        </div>
    </div>
    <script src="{{ url('./js/cart.js') }}"></script>
@endsection
