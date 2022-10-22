<div class="row row-cols-2 row-cols-md-4 justify-content-between mt-2">
    <div class="col-md-4 text-white ">
        <div class="card h-100 border-0">
            <div class="card-body bg-primary">
                <h2 class="card-title">@php echo isset($wines) ? sizeof($wines):0 @endphp</h2>
                <p class="card-text">Sản phẩm</p>
            </div>
            <div class="card-footer rounded-0 bg-primary"><a class="text-white" href="{{ route('products') }}">Danh sách
                    sản phẩm</a></div>
        </div>
    </div>
    <div class="col-md-4 text-white">
        <div class="card h-100 border-0">
            <div class="card-body bg-warning">
                <h2 class="card-title">@php echo isset($accounts) ? sizeof($accounts):0 @endphp</h2>
                <p class="card-text">Tài khoản</p>
            </div>
            <div class="card-footer bg-warning rounded-0"><a class="text-white" href="{{ route('customers') }}">Danh sách tài
                    khoản</a></div>
        </div>
    </div>
    <div class="col-md-4 text-white">
        <div class="card h-100 border-0">
            <div class="card-body bg-danger">
                <h2 class="card-title">@php echo isset($orders) ? sizeof($orders):0 @endphp</h2>
                <p class="card-text">Đơn hàng</p>
            </div>
            <div class="card-footer bg-danger rounded-0"><a class="text-white" href="{{ route('orders') }}">Danh sách đơn
                    hàng</a></div>
        </div>
    </div>
</div>
<div>
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
