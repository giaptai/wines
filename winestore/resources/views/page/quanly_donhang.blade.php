@extends('home')
@section('content')
<div class="container-md my-4" style="width: 80%">
    <div class="row row-cols-md-2 row-cols-1 gy-4 justify-content-between">
        @include('layout.sidebar')
        <div class="col-md-9 col-12">
            @include('page.form_qly_donhang')
        </div>
    </div>
</div>
@endsection