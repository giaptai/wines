 @if (session()->has('tokenAdmin'))
     <?php
     $wines = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/products?page=1')['meta']['total'];
     $accounts = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers?page=1')['meta']['total'];
     $orders = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/orders?page=1')['total'];
     ?>
     <div class="row row-cols-2 row-cols-md-4 justify-content-between mt-2">
         <div class="col-md-4 text-white ">
             <div class="card h-100 border-0">
                 <div class="card-body bg-primary">
                     <h2 class="card-title">@php echo $wines @endphp</h2>
                     <p class="card-text">Sản phẩm</p>
                 </div>
                 <div class="card-footer rounded-0 bg-primary">
                     <a class="text-white" href="{{ route('products') }}">Danh sách sản phẩm</a>
                 </div>
             </div>
         </div>
         <div class="col-md-4 text-white">
             <div class="card h-100 border-0">
                 <div class="card-body bg-warning">
                     <h2 class="card-title">@php echo $accounts @endphp</h2>
                     <p class="card-text">Tài khoản</p>
                 </div>
                 <div class="card-footer bg-warning rounded-0">
                     <a class="text-white" href="{{ route('customers') }}">Danh sách tài khoản</a>
                 </div>
             </div>
         </div>
         <div class="col-md-4 text-white">
             <div class="card h-100 border-0">
                 <div class="card-body bg-danger">
                     <h2 class="card-title">@php echo $orders @endphp</h2>
                     <p class="card-text">Đơn hàng</p>
                 </div>
                 <div class="card-footer bg-danger rounded-0">
                     <a class="text-white" href="{{ route('orders') }}">Danh sách đơn hàng</a>
                 </div>
             </div>
         </div>
     </div>
     <div>
         <canvas id="myChart"></canvas>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script type="text/javascript">
         function doanhthuOrder() {
             let arr = [];
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     let res = JSON.parse(this.responseText);
                     for (var i = 0; i < res.length; i++) {
                         arr.push(res[i]['receipts']);
                     }
                     //  res.forEach(element => {
                     //      arr.push(element['receipts']);
                     //  });
                 }
             };
             xhttp.open("GET", '/admin/statistic-order', true);
             xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
             xhttp.send();
             return arr;
         }

         function doanhthuMoney() {
             var arr = [];
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     let res = JSON.parse(this.responseText);
                     res.forEach(element => {
                         arr.push(element['rhino']);
                     });
                 }
             };
             xhttp.open("GET", '/admin/statistic-order', true);
             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
             xhttp.send();
             return arr;
         }
         const data1 = doanhthuOrder()
         const data2 = doanhthuMoney()

         const labels = [
             'Tháng 1',
             'Tháng 2',
             'Tháng 3',
             'Tháng 4',
             'Tháng 5',
             'Tháng 6',
             'Tháng 7',
             'Tháng 8',
             'Tháng 9',
             'Tháng 10',
             'Tháng 11',
             'Tháng 12',
         ];

         const data = {
             labels: labels,
             datasets: [{
                     label: 'Doanh thu',
                     backgroundColor: 'rgb(11, 132, 165)',
                     borderColor: 'rgb(11, 132, 165)',
                     data: data2,
                 },
                 {
                     label: 'Đơn hàng',
                     backgroundColor: 'rgb(246, 200, 95)',
                     borderColor: 'rgb(246, 200, 95)',
                     //  data: [1, 20, 10, 9, 56, 30, 74, 85, 27, 33, 65, 210],
                     data: data1,
                 }
             ]
         };

         const config = {
             type: 'line',
             data: data,
             options: {}
         };

         const myStatistic = document.getElementById('myChart');
         //  window.onload = (event) => {
         //  console.log("page is fully loaded");
         const myChart = new Chart(
             myStatistic,
             config,
         );
         //  };
     </script>
 @else
     <div class="d-flex flex-column border p-3 justify-content-center align-items-center vh-100">
         <i class="fa-solid fa-face-flushed display-5"></i>
         <p class="fw-semibold mt-3 mb-3 fs-5">Cần đăng nhập với quyền admin</p>
     </div>
 @endif
