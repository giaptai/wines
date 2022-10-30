@extends('home')
@section('content')
    <div class="container-md mt-4 mb-4" style="width: 80%">
        <div class="details">
            <h3 class="border-bottom">Chi tiết sản phẩm
            </h3>
            {{-- {!! $wineDetail !!} --}}
            <div class="row row-cols-md-3 row-cols-1 g-3 border-bottom">
                <div class="col-md-3">
                    <span class="fw-bold">Loại: </span>
                    <p class=""><?php echo $wineDetail['category'][0]['name']; ?></p>
                    <hr>
                    <span class="fw-bold">Quốc gia: </span>
                    <p class=""><?php echo $wineDetail['origin'][0]['name']; ?></p>
                    <hr>
                    <span class="fw-bold">Thương hiệu: </span>
                    <p class=""><?php echo $wineDetail['brand'][0]['name']; ?></p>
                    <hr>
                    <span class="fw-bold">Thể tích: </span>
                    <p class=""><?php echo $wineDetail['vol']; ?> ML</p>
                    <hr>
                    <span class="fw-bold">Nồng độ: </span>
                    <p class=""><?php echo $wineDetail['c']; ?> %</p>
                    <hr>
                    <span class="fw-bold">Năm: </span>
                    <p class=""><?php echo $wineDetail['year']; ?></p>

                </div>
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail p-3"
                    height="100%" width="100%"
                        src="<?php echo $wineDetail['images']; ?>"
                        alt="description of image">
                </div>
                <div class="col-md-5">
                    <div class="mota">
                        <h3><?php echo $wineDetail['name']; ?></h3>
                        <p class="fs-4 fw-bolder"><?php echo number_format($wineDetail['price']); ?> đ</p>
                        <p class="tilte lh-lg" style="font-size: 15px;"><?php echo $wineDetail['description']; ?></p>
                    </div>
                    @if (session()->exists('cart.' . $wineDetail['id']))
                        <button type="button" class="btn disabled btn-primary rounded-0">Trong giỏ hàng</button>
                    @else
                        <button type="button" onclick="addtocart({{ $wineDetail['id'] }})"
                            class="btn btn-outline-primary rounded-0" id="btn{{ $wineDetail['id'] }}">Thêm vào giỏ</button>
                    @endif
                </div>
            </div>
        </div>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">Thêm thành công</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addtocart(id) {
            let btn = document.getElementById('btn' + id);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    btn.innerText = "Trong giỏ hàng"
                    btn.classList.add('disabled')
                    btn.classList.add('btn-primary')
                    btn.classList.remove('btn-outline-primary')
                    const toastLiveExample = document.getElementById('liveToast')
                    const toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()
                }
            };
            xhttp.open("POST", '/store-to-cart/' + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }
    </script>
@endsection
