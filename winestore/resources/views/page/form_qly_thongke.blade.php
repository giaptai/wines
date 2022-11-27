 @if (session()->has('tokenAdmin'))
     <?php
     $wines = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/products?page=1')['meta']['total'];
     $accounts = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers?page=1')['meta']['total'];
     $orders = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/orders?page=1')['total'];
     $staticOrders = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/statistic?year=2022');
     $staticProducts = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/countProductDetail');
     $getAdmin = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers/' . session('AdminID'))['data'];
     //  echo json_encode($staticProducts[0]['product_name']);
     //  echo var_dump($getAdmin);
     ?>
     <div style="background-color: #41484e" class="d-flex text-white justify-content-end p-3">
         <span>{!! $getAdmin['lastname'] . ' ' . $getAdmin['firstname'] !!}</span>
         <span class="mx-3">|</span>
         <a class="text-danger fw-bold" href="{{ route('logoutadmin') }}">Đăng xuất</a>
     </div>
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
     <div class="text-center">
         <h3>Doanh thu năm 2022</h3>
         <canvas id="myChart"></canvas>
     </div>
     <div class="row row-cols-2 mt-4">
         <div class="col-md-4 text-center">
             <h5>Top 5 sản phẩm được mua nhiều nhất</h5>
             <canvas id="myChartPolarArea"></canvas>
         </div>
         <div class="col-md-8 text-center">
             <h4>Đơn hàng năm 2022</h4>
             <canvas id="myChartBar"></canvas>
         </div>
     </div>

     {{-- SELECT COUNT(`product_id`), `product_name` FROM `order_details` WHERE 1 GROUP BY `product_name` ORDER BY COUNT(`product_id`) DESC; --}}
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script type="text/javascript">
         // ham lay don hang
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
         // ham lay doanh thu
         function doanhthuMoney() {
             var arr = [];
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     let res = JSON.parse(this.responseText);
                 }
             };
             xhttp.open("GET", '/admin/statistic-order', true);
             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
             xhttp.send();
             return arr;
         }

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
                     type: 'bar',
                     backgroundColor: [
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 205, 86, 0.2)',
                         'rgba(75, 192, 192, 0.2)',
                         'rgba(54, 162, 235, 0.2)',
                         'rgba(153, 102, 255, 0.2)',
                         'rgba(255, 88, 123, 0.2)',
                         'rgba(255, 148, 46, 0.2)',
                         'rgba(255, 198, 68, 0.2)',
                         'rgba(75, 182, 291, 0.2)',
                         'rgba(54, 151, 200, 0.2)',
                         'rgba(153, 201, 255, 0.2)',
                     ],
                     borderColor: 'rgb(11, 132, 165)',
                     data: {!! json_encode($staticOrders['rhino']) !!},
                 },
                 //  {
                 //      label: 'Đơn hàng',
                 //      backgroundColor: 'rgb(246, 200, 95)',
                 //      borderColor: 'rgb(246, 200, 95)',
                 //      data: {!! json_encode($staticOrders['receipts']) !!},
                 //  }
             ]
         };
         const config = {
             type: 'bar',
             data: data,
             options: {
                 scales: {
                     y: {
                         beginAtZero: true
                     }
                 }
             }
         };
         const myStatistic = document.getElementById('myChart');

         const myChart = new Chart(
             myStatistic,
             config,
         );

         // thống kê top 5 sản phẩm được mua nhiều nhất
         const data2 = {
             labels: [
                 {!! json_encode($staticProducts[0]['product_name']) !!},
                 {!! json_encode($staticProducts[1]['product_name']) !!},
                 {!! json_encode($staticProducts[2]['product_name']) !!},
                 {!! json_encode($staticProducts[3]['product_name']) !!},
                 {!! json_encode($staticProducts[4]['product_name']) !!},
             ],
             datasets: [{
                 label: 'Tổng',
                 data: [
                     {!! json_encode($staticProducts[0]['total']) !!},
                     {!! json_encode($staticProducts[1]['total']) !!},
                     {!! json_encode($staticProducts[2]['total']) !!},
                     {!! json_encode($staticProducts[3]['total']) !!},
                     {!! json_encode($staticProducts[4]['total']) !!},
                 ],
                 backgroundColor: [
                     'rgb(255, 99, 132)',
                     'rgb(75, 192, 192)',
                     'rgb(255, 205, 86)',
                     'rgb(201, 203, 207)',
                     'rgb(54, 162, 235)'
                 ]
             }]
         };

         const config2 = {
             type: 'polarArea',
             data: data2,
             options: {}
         };

         const myChart2 = new Chart(
             document.getElementById('myChartPolarArea'),
             config2,
         );
         // thống kê top 5 sản phẩm được mua nhiều nhất

         // thống kê đơn hàng
         const data3 = {
             labels: labels,
             datasets: [{
                 label: 'Đơn hàng',
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(255, 159, 64, 0.2)',
                     'rgba(255, 205, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 88, 123, 0.2)',
                     'rgba(255, 148, 46, 0.2)',
                     'rgba(255, 198, 68, 0.2)',
                     'rgba(75, 182, 291, 0.2)',
                     'rgba(54, 151, 200, 0.2)',
                     'rgba(153, 201, 255, 0.2)',
                 ],
                 borderColor: 'rgb(246, 200, 95)',
                 data: {!! json_encode($staticOrders['receipts']) !!},
             }]
         };
         const config3 = {
             type: 'line',
             data: data3,
             options: {}
         };
         const myChart3 = new Chart(
             document.getElementById('myChartBar'),
             config3,
         );
         // thống kê đơn hàng
     </script>
 @else
     <div class="d-flex flex-column border p-3 justify-content-center align-items-center vh-100">
         <i class="fa-solid fa-face-flushed display-5"></i>
         <p class="fw-semibold mt-3 mb-3 fs-5">Cần đăng nhập với quyền admin</p>
     </div>
 @endif
