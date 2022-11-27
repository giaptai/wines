@extends('home')
@section('content')
    <div class="container-md mt-4 mb-4" style="width: 80%">
        <div class="row row-cols-md-2 row-cols-1 gy-4 justify-content-between">
            @include('layout.sidebar_client')
            <div class="col-md-9 col-12">
                @include('page.form_infor')
                {{-- @yield('contentttt') --}}
            </div>
        </div>
    </div>
   
@endsection
